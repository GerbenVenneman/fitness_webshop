<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <div class="product-grid-customer">
                <div class="show-img-container">
                    <div class="show-img">  
                        <img style="width: 600px" src="{{ asset('uploads/' . $product->image)}}" alt="">
                    </div>
                </div>
                <div class="show-info">
                    <p style="font-weight: bold; font-size: 40px;">{{ $product->name}}</p>
                    <p style="font-weight: normal; font-size: 18px;">{{$product->brand}}</p>
                    @php
                        $bulletpointsArray = json_decode($product->bulletpoints);
                    @endphp
                    <div class="show-bulletpoints-container">
                        @foreach ($bulletpointsArray as $bulletpoint)
                            <div class="show-bulletpoints">
                                <img style="width: 17px; margin-bottom: 10px" src="{{ asset('img/Add.png')}}" alt="">
                                <p style="margin-bottom: 10px; margin-left: 5px">{{ $bulletpoint }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="count-price">
                        <div class="count-product">
                            <button style="font-size: 20px" class="minus-btn"><strong>-</strong></button>
                            <input type="text" id="quantity" value="1">
                            <button style="font-size: 20px" class="plus-btn"><strong>+</strong></button>
                        </div>
                        <p id="price" style="font-weight: bold; font-size: 20px;">€{{ $product->price}}</p>
                    </div>
                    <button class="shop-btn">Aan winkelwagen toevoegen</button>
                    <p style="font-weight: bold; font-size: 25px; margin-top: 40px">Beschrijving</p>
                    <p>{{ $product->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const minusButton = document.querySelector('.minus-btn');
        const plusButton = document.querySelector('.plus-btn');
        const inputField = document.getElementById('quantity');
        const priceElement = document.getElementById('price');
        const originalPrice = parseFloat(priceElement.textContent.replace('€', ''));
    
        plusButton.addEventListener('click', function() {
            inputField.value = parseInt(inputField.value) + 1;
            updatePrice();
        });
    
        minusButton.addEventListener('click', function() {
            if (parseInt(inputField.value) > 1) {
                inputField.value = parseInt(inputField.value) - 1;
                updatePrice();
            }
        });
        inputField.addEventListener('input', function() {
            if (parseInt(inputField.value) > 0) {
                updatePrice();
            } else {
                // Als het ingevoerde getal ongeldig is, stel de waarde in op 1 en update de prijs
                inputField.value = 1;
                updatePrice();
            }
        });
    
        function updatePrice() {
            const quantity = parseInt(inputField.value);
            const totalPrice = originalPrice * quantity;
            priceElement.textContent = '€' + totalPrice.toFixed(2);
        }
    </script>
</x-app-layout>