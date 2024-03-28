<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <div class="section-create-filter">
                <a class="create-btn" href="{{ route('products.create')}}">Product toevoegen</a>
            </div>
            <div class="product-grid">
                @forelse ($products as $product)
                    <div class="product">
                        <div class="product-items-1">
                            <div class="category">
                                <p>{{ $product->category}}</p>
                            </div> 
                            <img style="max-width: 200px; max-height: 200px; " src="{{ asset('uploads/' . $product->image)}}" alt="">
                        </div>
                        <div class="flex-name-price">
                            <div class="name-price-brand">
                                <p style="font-weight: normal; font-size: 14px;">{{ $product->name}}</p>
                                <p style="font-weight: normal; font-size: 13px;">{{$product->brand}}</p>
                                <p style="font-size: 16px;">€{{ $product->price}}</p>
                            </div>
                            <div class="edit-delete">
                                <div class="edit">
                                    <a href="{{ route('products.edit', $product->id)}}">
                                        <img style="width: 15px; height: 15px;" src="{{ asset('img/edit.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="delete">
                                    <form action="{{ route('products.destroy' , $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <img style="width: 15px; height: 15px; " src="{{ asset('img/delete.png')}}" alt="">
                                        </button>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                @empty
                    Geen Producten
                @endforelse 
            </div>
        </div>
    </div>
</x-app-layout>