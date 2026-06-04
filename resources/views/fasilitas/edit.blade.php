<x-layout title="Update Fasilitas">

    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="post" enctype="multipart/form-data" id="form-departement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="home" id="home" value="1"
                                {{ old('home', $fasilitas->home) ? 'checked' : '' }}
                                class="text-[#5676ff] focus:ring-[#5676ff] border-gray-300 rounded" />
                            <label for="home" class="text-sm">Display At Home</label>
                        </div>
                        @error('home')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>   
                    <hr class="my-3"> 
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">Departement</label>
                        <select name="id_departement" id="id_departement"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            @foreach ($departements as $departement)
                            @if ($fasilitas->id_departement == $departement->id)
                            <option value="{{ $departement->id }}" selected>{{ $departement->name }}</option>
                            @endif
                                <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>                    
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $fasilitas->title }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="subtitle">Sub Title</label>
                        <input type="text" name="subtitle" value="{{ $fasilitas->subtitle }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('subtitle')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description">Decription</label>
                        <textarea name="description" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $fasilitas->description }}</textarea>
                        @error('description')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    
                </div>
                
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Image (Max : 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="image1"
                                id="image1"
                                accept="image/*"
                                onchange="previewImage1(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                    
                            <!-- Preview Gambar -->
                            <img 
                                id="image-preview" 
                                src="{{ old('image1') ? asset('storage/facilities/' . old('image1')) : (isset($fasilitas) && $fasilitas->image1 ? asset('storage/' . $fasilitas->image1) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image1) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                    
                            <!-- Tombol Hapus -->
                            <button
                                id="remove-btn"
                                type="button"
                                onclick="removeImage1()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                    
                            <!-- Text Default -->
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($fasilitas) && $fasilitas->image) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>

                    <label for="title1">Image2 (Max : 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image2"
                            id="image2"
                            accept="image/*"
                            onchange="previewImage2(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img id="image2-preview"src="{{ old('image2') ? asset('storage/facilities/' . old('image2')) : (isset($fasilitas) && $fasilitas->image2 ? asset('storage/' . $fasilitas->image2) : '#') }}" 
                        alt="Preview" 
                        class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image2) ? '' : 'hidden' }} z-0 rounded-md"  />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage2()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                    </div>

                    <label for="title1">Image3 (Max : 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image3"
                            id="image3"
                            accept="image/*"
                            onchange="previewImage3(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img id="image3-preview" src="{{ old('image3') ? asset('storage/facilities/' . old('image3')) : (isset($fasilitas) && $fasilitas->image3 ? asset('storage/' . $fasilitas->image3) : '#') }}" 
                        alt="Preview" 
                        class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image3) ? '' : 'hidden' }} z-0 rounded-md"  />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage3()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                    </div>

                    <label for="title1">Image4 (Max : 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image4"
                            id="image4"
                            accept="image/*"
                            onchange="previewImage4(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img id="image4-preview" src="{{ old('image4') ? asset('storage/facilities/' . old('image4')) : (isset($fasilitas) && $fasilitas->image4 ? asset('storage/' . $fasilitas->image4) : '#') }}" 
                        alt="Preview" 
                        class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image4) ? '' : 'hidden' }} z-0 rounded-md" />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage4()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                    </div>
                    
                    <label for="title1">Image5 (Max : 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image5"
                            id="image5"
                            accept="image/*"
                            onchange="previewImage5(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img id="image5-preview" src="{{ old('image5') ? asset('storage/facilities/' . old('image5')) : (isset($fasilitas) && $fasilitas->image5 ? asset('storage/' . $fasilitas->image5) : '#') }}" 
                        alt="Preview" 
                        class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image5) ? '' : 'hidden' }} z-0 rounded-md" />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage5()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                    </div>
                    
                    <label for="title1">Image6 (Max : 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image6"
                            id="image6"
                            accept="image/*"
                            onchange="previewImage6(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img id="image6-preview" src="{{ old('image6') ? asset('storage/facilities/' . old('image6')) : (isset($fasilitas) && $fasilitas->image6 ? asset('storage/' . $fasilitas->image6) : '#') }}" 
                        alt="Preview" 
                        class="absolute inset-0 w-full h-full object-cover {{ (isset($fasilitas) && $fasilitas->image6) ? '' : 'hidden' }} z-0 rounded-md" />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage6()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="yt">ID Youtube</label>
                        <input type="text" name="yt" value="{{ $fasilitas->yt }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('yt')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('fasilitas.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>


    <script>
        function previewImage1(event) {
            const fileInput = event.target;
            const preview = document.getElementById('image1-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
    
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                    uploadText.classList.add('hidden');
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    
        function removeImage1() {
            const fileInput = document.getElementById('image1');
            const preview = document.getElementById('image1-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
    
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.classList.remove('hidden');
        }
    </script>

<script>
    function previewImage2(event) {
        const fileInput = event.target;
        const preview = document.getElementById('image2-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function removeImage2() {
        const fileInput = document.getElementById('image2');
        const preview = document.getElementById('image2-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        fileInput.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
        uploadText.classList.remove('hidden');
    }
</script>

<script>
    function previewImage3(event) {
        const fileInput = event.target;
        const preview = document.getElementById('image3-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function removeImage3() {
        const fileInput = document.getElementById('image3');
        const preview = document.getElementById('image3-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        fileInput.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
        uploadText.classList.remove('hidden');
    }
</script>

<script>
    function previewImage4(event) {
        const fileInput = event.target;
        const preview = document.getElementById('image4-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function removeImage4() {
        const fileInput = document.getElementById('imag41');
        const preview = document.getElementById('image4-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        fileInput.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
        uploadText.classList.remove('hidden');
    }
</script>

<script>
    function previewImage5(event) {
        const fileInput = event.target;
        const preview = document.getElementById('image5-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function removeImage5() {
        const fileInput = document.getElementById('image5');
        const preview = document.getElementById('image5-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        fileInput.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
        uploadText.classList.remove('hidden');
    }
</script>

<script>
    function previewImage6(event) {
        const fileInput = event.target;
        const preview = document.getElementById('image6-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function removeImage6() {
        const fileInput = document.getElementById('image6');
        const preview = document.getElementById('image6-preview');
        const removeBtn = document.getElementById('remove-btn');
        const uploadText = document.getElementById('upload-text');

        fileInput.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
        uploadText.classList.remove('hidden');
    }
</script>

<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Simpan Data?',
            text: "Pastikan semua data sudah benar.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
            buttonsStyling: false, // ini penting!
            customClass: {
                confirmButton: 'bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700',
                cancelButton: 'bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-departement').submit();
            }
        });
    }
</script>

</x-layout>