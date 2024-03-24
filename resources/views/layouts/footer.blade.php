<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<header>
  <div class="footer-container">
    <div class="footer-sub-container">
      <div class="logo">  
        <a style="color: red; font-size: 30px; font-weight: bold;">GV Nutrition</a>
      </div>
      <div style="color: white" class="sitemap">
        <div style="font-size: 16px; margin-right: 180px" class="direct-links">
          <p style="font-size: 18px;"><strong>Direct naar</strong></p>
          <a href="#">Wie zijn wij?</a>
          <a href="#">Contact</a>
        </div>
        <div style="font-size: 16px;" class="company">
          <p style="font-size: 18px;"><strong>Bedrijf</strong></p>
          <p>Dordrecht</p>
          <p style="font-weight:200;">Rijksweg 1234AB, 18</p>
        </div>
        <div style="margin-left: 180px" class="socials">
          <p style="font-size: 18px;"><strong>Social media</strong></p>
          <div class="social-sub">
            <a  href="#">
              <img style=" width: 30px; margin-right: 20px" src="{{ asset('img/whatsapp.png')}}" alt="">
            </a>
            <a  href="#">
              <img style=" width: 40px; margin-right: 20px" src="{{ asset('img/tiktok.png')}}" alt="">
            </a>
            <a  href="#">
              <img style=" width: 30px;" src="{{ asset('img/instagram.png')}}" alt="">
            </a>
          </div>
        </div>
      </div>
      <p class="copyright">&copy; 2024 GV Nutrition</p>
    </div>
  </div>
</header>
</html>