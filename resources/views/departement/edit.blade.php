<x-layout title="Departement">

    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <div class="w-full max-w-3xl mx-auto my-5">
                <!-- Stepper -->
                <div class="flex items-center justify-between">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center w-1/3">
                        <div class="w-10 h-10 rounded-full bg-[#5676ff] text-white flex items-center justify-center">1
                        </div>
                        <p class="mt-2 text-sm font-medium text-[#5676ff]">Informasi Departement</p>
                    </div>

                    <div class="flex-1 h-1 bg-[#5676ff] mx-2"></div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center text-center w-1/3">
                        <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center">2
                        </div>
                        <p class="mt-2 text-sm font-medium text-gray-700">Data Akademik</p>
                    </div>

                    <div class="flex-1 h-1 bg-gray-300 mx-2"></div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center text-center w-1/3">
                        <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center">3
                        </div>
                        <p class="mt-2 text-sm font-medium text-gray-700">Call To Acion</p>
                    </div>
                </div>
            </div>
            <hr class="my-5">
            <form action="{{ route('departement.update', $departement->id) }}" method="post" enctype="multipart/form-data" id="form-departement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                            <label for="">Departement Name</label>
                            <input type="text" name="name" value="{{ $departement->name }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('name')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="">Akreditasi</label>
                            <input type="text" name="akreditasi" value="{{ $departement->akreditasi }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('akreditasi')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="">Tagline Departement</label>
                        <input type="text" name="tagline" value="{{ $departement->tagline }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tagline')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" value="{{ $departement->instagram }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('instagram')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="tiktok">Tiktok</label>
                            <input type="text" name="tiktok" value="{{ $departement->tiktok }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tiktok')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" value="{{ $departement->facebook }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('facebook')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="youtube">Youtube Chanel</label>
                            <input type="text" name="youtube" value="{{ $departement->youtube }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('youtube')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Title</label>
                        <input type="text" name="title1" value="{{ $departement->title1 }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title1')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description1">Decription</label>
                        <textarea name="description1" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $departement->description1 }}</textarea>
                        @error('description1')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    
                </div>
                
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5 items-start">
                        <span class="text-xs p-2 bg-[#5676ff] text-white rounded-full my-5">Color Guide Departement</span>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="">
                                <label for="color" class="text-xs text-gray-700 mb-2">Primary Color</label>
                                
                                <div class="flex items-center gap-3">
                                    <input
                                        id="color"
                                        type="color"
                                        name="color1"
                                        value="{{ $departement->color1 }}"
                                        oninput="document.getElementById('color-preview').textContent = this.value"
                                        class="w-8 cursor-pointer rounded-md focus:outline-none"
                                    />
                                    <span id="color-preview" class="text-sm font-mono text-gray-800">
                                        {{ old('color1', '#4197CB') }}
                                    </span>
                                </div>
                            
                                @error('color1')
                                    <div class="bg-red-100 border border-red-300 text-red-700 text-sm rounded-md px-3 py-2 mt-2">
                                        <i>{{ $message }}</i>
                                    </div>
                                @enderror
                            </div>                                              
                            <div class="">
                                <label for="color" class="text-xs text-gray-700 mb-2">Primary Color</label>
                                
                                <div class="flex items-center gap-3">
                                    <input
                                        id="color"
                                        type="color"
                                        name="color2"
                                        value="{{ $departement->color2 }}"
                                        oninput="document.getElementById('color-preview').textContent = this.value"
                                        class="w-8 cursor-pointer rounded-md focus:outline-none"
                                    />
                                    <span id="color-preview" class="text-sm font-mono text-gray-800">
                                        {{ old('color2', '#4197CB') }}
                                    </span>
                                </div>
                            
                                @error('color2')
                                    <div class="bg-red-100 border border-red-300 text-red-700 text-sm rounded-md px-3 py-2 mt-2">
                                        <i>{{ $message }}</i>
                                    </div>
                                @enderror
                            </div>                                              
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Image (Max: 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="image1"
                                id="image1"
                                accept="image/*"
                                onchange="previewImage(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                    
                            <!-- Preview Gambar -->
                            <img 
                                id="image-preview" 
                                src="{{ old('image1') ? asset('storage/departement-image/' . old('image1')) : (isset($departement) && $departement->image1 ? asset('storage/' . $departement->image1) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($departement) && $departement->image1) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                    
                            <!-- Tombol Hapus -->
                            <button
                                id="remove-btn"
                                type="button"
                                onclick="removeImage()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                    
                            <!-- Text Default -->
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($departement) && $departement->image1) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image1')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>                    
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="yt_id">ID Youtube Vidio</label>
                        <input type="text" name="yt_id" value="{{ $departement->yt_id }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('yt_id')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('departement.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>


    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('image-preview');
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
    
        function removeImage() {
            const fileInput = document.getElementById('image');
            const preview = document.getElementById('image-preview');
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
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        const imgPreview = document.getElementById('image-preview');
        const uploadText = document.getElementById('upload-text');
        const removeBtn = document.getElementById('remove-btn');
    
        if (file) {
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.classList.remove('hidden');
                uploadText.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
    
    function removeImage() {
        document.getElementById('image1').value = '';
        const imgPreview = document.getElementById('image-preview');
        imgPreview.src = '#';
        imgPreview.classList.add('hidden');
        document.getElementById('upload-text').classList.remove('hidden');
        document.getElementById('remove-btn').classList.add('hidden');
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
