<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Sayfası</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        div {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #333;
            margin: 20px;
            display: inline-block;
            transition: color 0.3s, transform 0.3s;
        }

        img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .label {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        .social-links {
            display: flex;
            justify-content: space-around;
            max-width: 600px; /* Sayfadaki genişliği ayarlamak için */
            margin: 0 auto;
        }

        a:hover {
            color: #e44d26;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div>
        <h1>İletişim Bilgileri</h1>

        
        
        <a href="#">
                <img src="./images/images.png" alt="Telefon Numarası">
                <div class="label">Telefon  <br>0555 555 5555</div>
            </a>


        <div class="social-links">
            <a href="mailto:ornek@gmail.com">
                <img src="./images/unnamed.png" alt="Gmail">
                <div class="label">Gmail</div>
            </a>


            <a href="https://wa.me/+905446923760" target="_blank">
                <img src="./images/apps.8985.13655054093851568.1c669dab-3716-40f6-9b59-de7483397c3a.png" alt="WhatsApp">
                <div class="label">WhatsApp</div>
            </a>

            <a href="https://www.youtube.com/" target="_blank">
                <img src="./images/YouTube_social_white_square_(2017).svg.png" alt="YouTube">
                <div class="label">YouTube</div>
            </a>

            <a href="https://www.facebook.com/" target="_blank">
                <img src="./images/indir.png" alt="Facebook">
                <div class="label">Facebook</div>
            </a>

            <a href="https://www.instagram.com/" target="_blank">
                <img src="./images/instagram_logo.jpg" alt="Instagram">
                <div class="label">Instagram</div>
            </a>

            <a href="https://twitter.com/" target="_blank">
                <img src="./images/twitter-x-e1690183153269.webp" alt="Twitter">
                <div class="label">Twitter</div>
            </a>
        </div>
    </div>
</body>

</html>
