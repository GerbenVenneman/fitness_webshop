<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <div class="product-grid-customer">
                <div class="filter">
                    <p style="font-size: 25px; font-weight: bold;">Filteren</p>
                    <button id="reset-filter-btn">Filters resetten</button>
                    <!-- Prijsfilter -->
                    <div class="price-filter">
                        <label for="min-price">Minimum prijs:</label>
                        <input type="number" id="min-price" name="min-price" placeholder="Minimumprijs" class="price-input" value="0">
                        <label for="max-price">Maximum prijs:</label>
                        <input type="number" id="max-price" name="max-price" placeholder="Maximumprijs" class="price-input" value="100">
                        <button id="apply-filter-btn">Filter toepassen</button>
                    </div>
                    <!-- Einde Prijsfilter -->
                </div>
                <div class="products">
                    <div class="head-section">
                        <h1 style="font-size: 25px; font-weight: bold; ">Supplementen</h1>
                    </div>
                    
                    <div class="grid-product" id="product-grid">
                        @foreach ($products as $product)
                            <div class="product" data-price="{{ $product->price }}">
                                <div class="product-items-1">
                                    <img style="max-width: 200px" src="{{ asset('uploads/' . $product->image)}}" alt="">
                                </div>
                                <div class="flex-name-price">
                                    <div class="name-price-brand">
                                        <p style="font-weight: normal; font-size: 14px;">{{ $product->name}}</p>
                                        <p style="font-weight: normal; font-size: 13px;">{{$product->brand}}</p>
                                        <p style="font-size: 16px;">€{{ $product->price}}</p>
                                    </div>
                                    <div class="shopping-cart-customer">
                                        <a href="">
                                            <img class="shopping-cart-customer-inside" style=" margin-right: 10px;" src="{{ asset('img/shopping_cart.png')}}" alt="">
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const minPriceInput = document.getElementById('min-price');
    const maxPriceInput = document.getElementById('max-price');
    const applyFilterBtn = document.getElementById('apply-filter-btn');
    const resetFilterBtn = document.getElementById('reset-filter-btn');

    applyFilterBtn.addEventListener('click', applyFilter);
    resetFilterBtn.addEventListener('click', resetFilter);

    function applyFilter() {
        let minPrice = parseFloat(minPriceInput.value);
        let maxPrice = parseFloat(maxPriceInput.value);

        // Controleer of de invoervelden leeg zijn en behandel ze dienovereenkomstig
        if (isNaN(minPrice)) minPrice = Number.NEGATIVE_INFINITY; // Als minPrice leeg is, gebruik -oneindig
        if (isNaN(maxPrice)) maxPrice = Number.POSITIVE_INFINITY; // Als maxPrice leeg is, gebruik oneindig

        // Voer hier de filterlogica uit op basis van minPrice en maxPrice
        console.log("Filter toepassen met min prijs:", minPrice, "en max prijs:", maxPrice);
    }

    function resetFilter() {
        // Maak de invoervelden leeg
        minPriceInput.value = '';
        maxPriceInput.value = '';

        // Pas de filter toe met lege waarden om alle producten weer te tonen
        applyFilter();
    }
});
    </script>
</x-app-layout>