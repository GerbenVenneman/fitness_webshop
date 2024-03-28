<x-app-layout>
    <div class="container">
        <div class="sub-container">
            <form class="create-form" action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-container">
                    <div class="form-data">
                        <div class="form-section-1">
                            <div class="form-flex">
                                <div class="form-section">
                                    <input type="text" name="name" placeholder="Naam">
                                </div>
                                <div style="width: 120px" class="form-section">
                                    <input type="number" name="price" step="0.01" min="0" placeholder="Prijs">
                                </div>
                                <div style="width: 200px" class="form-section">
                                    <select style="height: 100%; padding-left: 10px; padding-right: 40px;" name="category" id="" class="custom-select">
                                        <option hidden value="" style="color: #999;" selected>Categorie</option>
                                        <option value="Supplementen">Supplementen</option>
                                        <option value="Kleding">Kleding</option>
                                        <option value="Accessoires">Accessoires</option>
                                    </select>
                                </div>
                                <div style="width: 200px" class="form-section">
                                    <select style="height: 100%; padding-left: 10px; padding-right: 40px;" name="brand" id="" class="custom-select">
                                        <option hidden value="" style="color: #999;" selected>Merk</option>
                                        <option value="Xxl Nutrition">Xxl Nutrition</option>
                                        <option value="Kosso Nutrition">Kosso Nutrition</option>
                                        <option value="Gymshark">Gymshark</option>
                                        <option value="Underarmour">Underarmour</option>
                                        <option value="Clean Nutrition">Clean Nutrition</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <textarea style="padding-left: 10px" rows="10" cols="50" name="description" placeholder="Beschrijving"></textarea>
                            </div>
                        </div>
                        <div class="custom-file-upload">
                            <input type="file" id="file-upload" name="image" accept="image/*">
                            <label for="file-upload">
                                <img id="uploaded-image" src="{{ asset('img/add-image.png')}}" alt="Add Image">
                            </label>
                        </div> 
                    </div>
                    <button style="margin-top: 50px" class="create-btn">Product toevoegen</button>
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