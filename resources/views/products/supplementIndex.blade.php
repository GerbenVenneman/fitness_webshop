<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <div class="product-grid-customer">
                <div class="filter">
                    <div class="apply-reset">
                        <button id="reset-filter-btn">Filters resetten</button>
                        <button id="apply-filter-btn">Filters toepassen</button>
                    </div>
                    <!-- Prijsfilter -->
                    <div class="price-filter">
                        <p>Prijs</p>
                        <div class="price-filter-flex">
                            <input style="width: 100px" type="number" id="min-price" name="min-price" placeholder="Min" class="price-input">
                            <p style="margin-right: 10px; margin-left: 10px;">-</p>
                            <input style="width: 100px" type="number" id="max-price" name="max-price" placeholder="Max" class="price-input">
                        </div>
                    </div>
                    <div class="brand-selection">
                        <div class="selection-group">
                            <label for="">Xxl Nutrition</label>
                            <input id="xxl-checkbox" type="checkbox">
                        </div>
                        <div class="selection-group">
                            <label for="">Kosso Nutrition</label>
                            <input id="kosso-checkbox" type="checkbox">
                        </div>
                        <div class="selection-group">
                            <label for="">Clean Nutrition</label>
                            <input id="clean-checkbox" type="checkbox">
                        </div>
                    </div>
                    
                    
                    <!-- Einde Prijsfilter -->
                </div>
                <div class="products">
                    <div class="head-section">
                        <h1 style="font-size: 25px; font-weight: bold; ">Supplementen</h1>
                    </div>
                    
                    <div class="grid-product" id="product-grid">
                        @foreach ($products as $product)
                            <div class="product" data-price="{{ $product->price }}" data-brand="{{ $product->brand }}">
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

            const xxlCheckbox = document.getElementById('xxl-checkbox');
            const kossoCheckbox = document.getElementById('kosso-checkbox');
            const cleanCheckbox = document.getElementById('clean-checkbox');

            applyFilterBtn.addEventListener('click', applyFilter);
            resetFilterBtn.addEventListener('click', resetFilter);

            function applyFilter() {
                const selectedBrands = getSelectedBrands();

                if ((minPriceInput.value || maxPriceInput.value) && selectedBrands.length > 0) {
                    filterByPriceAndBrand(selectedBrands);
                } else if (minPriceInput.value || maxPriceInput.value) {
                    filterByPrice();
                } else if (selectedBrands.length > 0) {
                    filterByBrand(selectedBrands);
                } else {
                    resetFilter();
                }

                console.log("Producten worden getoond");
            }

            function getSelectedBrands() {
                const selectedBrands = [];
                if (xxlCheckbox.checked) selectedBrands.push('Xxl Nutrition');
                if (kossoCheckbox.checked) selectedBrands.push('Kosso Nutrition');
                if (cleanCheckbox.checked) selectedBrands.push('Clean Nutrition');
                return selectedBrands;
            }

            function filterByPrice() {
                let minPrice = parseFloat(minPriceInput.value);
                let maxPrice = parseFloat(maxPriceInput.value);

                if (isNaN(minPrice)) minPrice = Number.NEGATIVE_INFINITY;
                if (isNaN(maxPrice)) maxPrice = Number.POSITIVE_INFINITY;

                const products = document.querySelectorAll('.product');

                products.forEach(product => {
                    const productPrice = parseFloat(product.dataset.price);

                    const meetsPriceCriteria = (productPrice >= minPrice && productPrice <= maxPrice);

                    if (meetsPriceCriteria) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            function filterByBrand(selectedBrands) {
                const products = document.querySelectorAll('.product');

                products.forEach(product => {
                    const productBrand = product.dataset.brand;

                    const meetsBrandCriteria = selectedBrands.includes(productBrand);

                    if (meetsBrandCriteria) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            function filterByPriceAndBrand(selectedBrands) {
                const minPrice = parseFloat(minPriceInput.value);
                const maxPrice = parseFloat(maxPriceInput.value);

                const products = document.querySelectorAll('.product');

                products.forEach(product => {
                    const productPrice = parseFloat(product.dataset.price);
                    const productBrand = product.dataset.brand;

                    const meetsPriceCriteria = (productPrice >= minPrice && productPrice <= maxPrice);
                    const meetsBrandCriteria = selectedBrands.includes(productBrand);

                    if (meetsPriceCriteria && meetsBrandCriteria) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            function resetFilter() {
                minPriceInput.value = '';
                maxPriceInput.value = '';

                xxlCheckbox.checked = false;
                kossoCheckbox.checked = false;
                cleanCheckbox.checked = false;

                const products = document.querySelectorAll('.product');
                products.forEach(product => {
                    product.style.display = 'block';
                });
            }
        });
    </script>
</x-app-layout>