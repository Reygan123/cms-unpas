<x-layout title="Departement">

    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <div class="w-full max-w-3xl mx-auto my-5">
                <!-- Stepper -->
                <div class="flex items-center justify-between">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center w-1/3">
                        <div class="w-10 h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center">1
                        </div>
                        <p class="mt-2 text-sm font-medium text-gray-700">Informasi Departement</p>
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
                        <div class="w-10 h-10 rounded-full bg-[#5676ff] text-white  flex items-center justify-center">3
                        </div>
                        <p class="mt-2 text-sm font-medium text-[#5676ff]">Call To Acion</p>
                    </div>
                </div>
            </div>
            <hr class="my-5">
            <form action="{{ route('departement.update.step3', $departement->id) }}" method="post" enctype="multipart/form-data" id="form-departement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title4">Title 4</label>
                        <input type="text" name="title4" value="{{ $departement->title4 }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title4')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description4">Decription 4</label>
                        <textarea name="description4" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $departement->description4 }}</textarea>
                        @error('description4')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="address">Address</label>
                        <textarea name="address" id="detail" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $departement->address }}</textarea>
                        @error('address')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="map">Link Google Map</label>
                        <input type="text" name="map" value="{{ $departement->map }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('map')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="link1">Link 1</label>
                            <input type="text" name="link1" value="{{ $departement->link1 }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('link1')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="link2">Link 2</label>
                            <input type="text" name="link2" value="{{ $departement->link2 }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('link2')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="link3">Link 3</label>
                            <input type="text" name="link3" value="{{ $departement->link3 }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('link3')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="link4">Link 4</label>
                            <input type="text" name="link4" value="{{ $departement->link4 }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('link4')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-span-1">
                    
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Image (Max: 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="image4"
                                id="image4"
                                accept="image/*"
                                onchange="previewImage(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                    
                            <!-- Preview Gambar -->
                            <img 
                                id="image-preview" 
                                src="{{ old('image4') ? asset('storage/departement-image/' . old('image4')) : (isset($departement) && $departement->image4 ? asset('storage/' . $departement->image4) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($departement) && $departement->image4) ? '' : 'hidden' }} z-0 rounded-md" 
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
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($departement) && $departement->image4) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image4')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('departement.step2', $departement->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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