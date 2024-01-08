<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        footer {
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 5px;
            background-color: #2196F3; 
            position: relative;
        }

        .contact-info,
        .social-media,
        .copyright {
            flex: 1;
            padding: 10px;
            margin: 10px;
            color: black; /* Renk siyah olarak değiştirildi */
        }

        .social-media a {
            margin-right: 5px;
            color: black; /* Renk siyah olarak değiştirildi */
        }
    </style>
</head>

<body>

    <footer class="bg-info">
        <div class="contact-info">
            <h4>İletişim Bilgileri</h4>
            <p>Email: 06emka78@gmail.com</p>
            <p>Telefon: +90 555 555 55 55</p>
        </div>

        <div class="social-media">
            <h4>Sosyal Medya</h4>
            <a href="https://www.facebook.com/" target="_blank">Facebook</a>
            <a href="https://www.twitter.com/" target="_blank">Twitter</a>
            <a href="https://www.instagram.com/" target="_blank">Instagram</a>
        </div>

        <div class="copyright">
            <p> Yalapşap. Tüm hakları saklıdır.</p>
        </div>
    </footer>

</body>

</html>
