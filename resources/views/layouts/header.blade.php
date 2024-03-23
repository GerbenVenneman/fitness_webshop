<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<header>
  <div class="nav-container">
    <div class="nav-sub-container">
      <a style="color: white;" class="btn btn-ghost text-xl">GV Nutrition</a>
      <div class="search">
        <div class="form-control">
          <input class="search-inside" type="text" placeholder="Zoek naar een product" class="input input-bordered w-24 md:w-auto" />
        </div>
      </div>
      <div class="links">
        <button class="btn btn-ghost">
          <a style="margin-right: 10px" href="#">Supplementen</a>
        </button>
        <button class="btn btn-ghost">
          <a style="margin-right: 10px" href="#">Kleding</a>
        </button>
        <button class="btn btn-ghost">
          <a style="margin-right: 50px" href="#">Accessoires</a>
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
      
      <button class="btn btn-ghost">
        <a href="#">
          <div style="display: flex; align-items: center;">
            <img style="width: 25px; margin-right: 10px;" src="{{ asset('img/shopping_cart.png')}}" alt="">
            <p class="test" style="color: white">0 items</p>
          </div>
        </a>
      </button>
    </div>
  </div>
</header>
</html>