<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <form class="create-form" action="{{ route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-container">
                    <div class="form-data">
                        <div class="form-section-1">
                            <div class="form-section">
                                <input type="text" name="name" placeholder="Naam" value="{{ $product->name}}">
                            </div>
                            <div class="form-flex">
                                <div class="form-section">
                                    <input type="number" name="price" step="0.01" min="0" placeholder="Prijs" value="{{ $product->price}}">
                                </div>
                                <div class="form-section">
                                    <select style="height: 100%; padding-left: 10px; padding-right: 40px;" name="category" id="" class="custom-select">
                                        <option hidden value="" style="color: #999;" selected>Categorie</option>
                                        <option value="Supplementen" {{ $product->category == 'Supplementen' ? 'selected' : '' }}>Supplementen</option>
                                        <option value="Kleding" {{ $product->category == 'Kleding' ? 'selected' : '' }}>Kleding</option>
                                        <option value="Accessoires" {{ $product->category == 'Accessoires' ? 'selected' : '' }}>Accessoires</option>
                                    </select>
                                </div>
                                <div class="form-section">
                                    <select style="height: 100%; padding-left: 10px; padding-right: 40px;" name="brand" id="" class="custom-select">
                                        <option hidden value="" style="color: #999;" selected>Merk</option>
                                        <option value="Xxl Nutrition" {{ $product->brand == 'Xxl Nutrition' ? 'selected' : '' }}>Xxl Nutrition</option>
                                        <option value="Kosso Nutrition" {{ $product->brand == 'Kosso Nutrition' ? 'selected' : '' }}>Kosso Nutrition</option>
                                        <option value="Gymshark" {{ $product->brand == 'Gymshark' ? 'selected' : '' }}>Gymshark</option>
                                        <option value="Underarmour" {{ $product->brand == 'Underarmour' ? 'selected' : '' }}>Underarmour</option>
                                        <option value="Clean Nutrition" {{ $product->brand == 'Clean Nutrition' ? 'selected' : '' }}>Clean Nutrition</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <textarea style="padding-left: 10px" rows="10" cols="50" name="description" placeholder="Beschrijving">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-section">
                                <div class="bulletpoints">
                                    <input type="text" name="bulletpoints[]" placeholder="Bulletpoint 1">
                                    <input type="text" name="bulletpoints[]" placeholder="Bulletpoint 2">
                                    <input type="text" name="bulletpoints[]" placeholder="Bulletpoint 3">
                                    <input type="text" name="bulletpoints[]" placeholder="Bulletpoint 4">
                                </div>
                            </div>
                        </div>
                        <div class="custom-file-upload">
                            <input type="file" id="file-upload" name="image" accept="image/*">
                            <label for="file-upload">
                                <img id="uploaded-image" src="{{ asset('uploads/' . $product->image) }}" alt="Add Image">
                            </label>
                        </div> 
                    </div>
                    <button style="margin-top: 50px" class="create-btn">Product bewerken</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const fileUpload = document.getElementById('file-upload');
        const uploadedImage = document.getElementById('uploaded-image');

        fileUpload.addEventListener('change', function() {
            const file = fileUpload.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                uploadedImage.src = '{{ asset('img/add-image.png')}}'; // Terugkeren naar de standaardafbeelding als er geen bestand is geselecteerd
            }
        });
    </script>
</x-app-layout>