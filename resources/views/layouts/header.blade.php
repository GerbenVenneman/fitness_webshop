<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<header>
  @if(Auth::check())
    <div class="nav-container">
        <div class="flex-auth">
            <a style="color: red; font-weight: bold;" class="btn btn-ghost text-xl p-0">GV Nutrition</a>
            <form style="margin: 0px; padding: 0px;" action="{{ route('logout') }}" method="POST">
              @csrf
              <button style="color: white" type="submit">Uitloggen</button>
            </form>
        </div>
    </div>
  @else
    <div class="c">
      <div id="dynamic-text" style="color: white; font-size: 14px; padding: 5px; display: flex; justify-content: center;"></div>
      <div class="nav-container">
        <div class="nav-sub-container">
          <a  href="{{ route('home')}}" style="color: red; font-weight: bold;" class="btn btn-ghost text-xl p-0">GV Nutrition</a>
          <div class="search">
            <div class="form-control">
              <input class="search-inside" type="text" placeholder="Zoek naar een product" class="input input-bordered w-24 md:w-auto" />
            </div>
          </div>
          <div class="links">
            <button class="btn btn-ghost">
              <a style="margin-right: 10px;" href="{{ route('products.supplementIndex')}}">Supplementen</a>
            </button>
            <button class="btn btn-ghost">
              <a style="margin-right: 10px" href="#">Kleding</a>
            </button>
            <button class="btn btn-ghost">
              <a style="margin-right: 50px" href="{{ route('products.accessoiresIndex')}}">Accessoires</a>
            </button>
          </div>
          <button class="btn btn-ghost">
            <a style="margin-right: 10px; color: white;" href="#">Over ons</a>
          </button>
          <button class="btn btn-ghost">
            <a style="margin-right: 10px;" href="{{ route('login')}}">
              <img style="width: 25px" src="{{ asset('img/User.png')}}" alt="">
            </a>
          </button>
          @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Uitloggen</button>
          </form>
          @endif
          <button class="btn btn-ghost p-0">
            <a href="#">
              <div style="display: flex; align-items: center;">
                <img style="width: 25px;" src="{{ asset('img/shopping_cart.png')}}" alt="">
                <p class="shopping-items">0</p>
              </div>
            </a>
          </button>
        </div>
      </div>
      </div>
    @endif
    
</header>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const dynamicText = document.getElementById('dynamic-text');
      const texts = ["✓ Voor 20:00 uur besteld, morgen in huis","✓ Gratis verzending vanaf €50", "✓ 10% korting op eerste bestelling", "✓ 24/7 klantenservice"];

      let index = 0;
      dynamicText.textContent = texts[index]; // Toon de eerste tekst meteen

      setInterval(() => {
          index = (index + 1) % texts.length; // Bepaal de index van de volgende tekst
          dynamicText.textContent = texts[index]; // Toon de volgende tekst
      }, 5000); // Wacht 5 seconden voordat de volgende tekst wordt weergegeven
  });
</script>
</html>