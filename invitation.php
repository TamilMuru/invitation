<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Invitation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <style>
    :root {
        --primary: white;
        --bg-color: #ffffff;
        --bg-envelope-color: #f5edd1;
        --envelope-tab: #ecdeb8;
        --envelope-cover: #e6cfa7;
        --shadow-color: #1c1c1c;
        --heart-color: #c2465d;
    }
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: var(--bg-color);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        height: 100vh;
        overflow-x: hidden;
    }
    img {
        width: 100%;
        max-width: 400px;
        margin-bottom: 20px; /* Space between image and envelope */
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .envelope-wrapper {
        background: var(--bg-envelope-color);
        box-shadow: 0 0 40px var(--shadow-color);
        position: relative;
        z-index: 1;
        width: 350px;
        height: 250px;
        margin-bottom: 20px; /* Space between envelope and button */
    }
    .envelope {
        position: relative;
        width: 100%;
        height: 100%;
    }
    .envelope::before, .envelope::after {
        position: absolute;
        content: "";
    }
    .envelope::before {
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        border-top: 130px solid var(--envelope-tab);
        border-right: 175px solid transparent;
        border-left: 175px solid transparent;
        transition: all 0.5s ease-in-out 0.7s;
    }
    .envelope::after {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-top: 130px solid transparent;
        border-right: 175px solid var(--envelope-cover);
        border-bottom: 120px solid var(--envelope-cover);
        border-left: 175px solid var(--envelope-cover);
    }
    .letter {
        position: absolute;
        right: 20%;
        bottom: 0;
        width: 54%;
        height: 80%;
        background: var(--primary);
        text-align: center;
        transition: all 1s ease-in-out;
        box-shadow: 0 0 5px var(--shadow-color);
        padding: 20px 10px;
    }
    .letter .text {
        font-family: "Caveat", cursive;
        font-style: normal;
        color: var(--txt-color);
        text-align: justify;
        font-size: 11px;
        padding-right: 2px;
    }
    .text strong {
        font-size: 12px;
    }
    .heart {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 15px;
        height: 15px;
        background: var(--heart-color);
        z-index: 4;
        transform: translate(-50%, -20%) rotate(45deg);
        transition: transform 0.5s ease-in-out 1s;
        box-shadow: 0 1px 6px var(--shadow-color);
        cursor: pointer;
        animation: pulse 1s infinite;
    }
    .heart:before,
    .heart:after {
        content: "";
        position: absolute;
        width: 15px;
        height: 15px;
        background-color: var(--heart-color);
        border-radius: 50%;
    }
    .heart:before {
        top: -7.5px;
    }
    .heart:after {
        right: 7.5px;
    }
    @keyframes pulse {
        0% {
            transform: translate(-50%, -20%) rotate(45deg) scale(1);
        }
        50% {
            transform: translate(-50%, -20%) rotate(45deg) scale(1.2);
        }
        100% {
            transform: translate(-50%, -20%) rotate(45deg) scale(1);
        }
    }
    .flap .envelope::before {
        transform: rotateX(180deg);
        z-index: 0;
    }
    .flap .letter {
        bottom: 100px;
        transform: scale(1.5);
        transition-delay: 1s;
    }
    .flap .heart {
        transform: rotate(90deg);
        transition-delay: 0.4s;
        animation: none;
    }
    .button {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .button:hover {
        background-color: #45a049;
    }
    .button-container {
        text-align: center;
        margin-top: 20px;
    }
    /* Responsive design */
    @media (max-width: 600px) {
        .envelope-wrapper {
            width: 300px;
            height: 215px;
        }
        .letter {
            right: 23%;
        }
        .envelope::before {
            border-top-width: 111px;
            border-right-width: 150px;
            border-left-width: 150px;
        }
        .envelope::after {
            border-top-width: 111px;
            border-right-width: 150px;
            border-bottom-width: 103px;
            border-left-width: 150px;
        }
    }
    </style>
</head>
<body>
    <!-- Image section -->
    <img src="psm.png" alt="Your Image">

    <div class="container">
        <div class="envelope-wrapper" id="envelope">
            <div class="envelope">
                <div class="letter">
                    <div class="text">
                        <strong>Dear Lectures,</strong>
                        <p>
                            I hope you are having a good day today. I am Tamil Murugan, a BIP student, and I would like to invite you to evaluate my final year project for best of the best category. I will be at lower F2 at table 87. Really looking forward to meeting you all.
                        </p>
                        <p class='sincerely'>
                            Sincerely, Tamil <3
                        </p>
                    </div>
                </div>
            </div>
            <div class="heart"></div>
        </div>
    </div>
    <!-- Button container -->
    <div class="button-container">
        <!-- Click Here button -->
        <button class="button" onclick="redirectToForm()">Click Here for Evaluation Form</button>
    </div>
    <script>
        const envelope = document.querySelector('.envelope-wrapper');
        envelope.addEventListener('click', () => {
            envelope.classList.toggle('flap');
        });

        // Function to redirect to the Evaluation Form
        function redirectToForm() {
            window.open('https://forms.office.com/Pages/ResponsePage.aspx?id=GHWVEEzl_EqhYXZU9XR4kRk6CUnHpK9IhbhQP5q-hupUOFM4VDMwTjUwVTFKNFlWVDJBVk1TNFNVSCQlQCN0PWcu&origin=QRCode', '_blank');
        }
    </script>
</body>
</html>
