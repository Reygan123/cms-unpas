<x-layout title="Edit Portofolio">

    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('portofolio.update', $portofolio->id) }}" method="post" enctype="multipart/form-data" id="form-departement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="home" id="home" value="1"
                                {{ old('home', $portofolio->home) ? 'checked' : '' }} 
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
                            @if ($portofolio->id_departement == $departement->id)
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
                        <input type="text" name="title" value="{{ $portofolio->title }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 mb-5">
                        <span class="block text-sm font-semibold text-gray-800 mb-1">Media Video Inovasi (Opsional)</span>
                        <span class="block text-xs text-gray-500 mb-4">Pilih salah satu: Upload file video (.mp4/.webm) untuk autoplay di halaman inovasi, ATAU masukkan Link Instagram Reels/Post.</span>

                        @if ($portofolio->video)
                            <div class="p-3 bg-white rounded-lg border border-gray-200 mb-4">
                                <p class="text-xs font-semibold text-gray-700 mb-2">Video Saat Ini:</p>
                                @if (Str::startsWith($portofolio->video, ['http://', 'https://']))
                                    <div class="flex items-center gap-2 text-sm text-blue-600">
                                        <span class="font-medium text-gray-600">Link Video / IG:</span>
                                        <a href="{{ $portofolio->video }}" target="_blank" class="underline truncate max-w-md">{{ $portofolio->video }}</a>
                                    </div>
                                @else
                                    <video src="{{ asset('storage/' . $portofolio->video) }}" controls class="w-64 max-h-40 rounded-lg bg-black"></video>
                                @endif
                                <label class="inline-flex items-center gap-2 mt-2 text-sm text-red-600 cursor-pointer">
                                    <input type="checkbox" name="remove_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    Hapus video ini
                                </label>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="video_upload" class="text-xs font-semibold text-gray-700">Ganti File Video (Upload)</label>
                                <input type="file" name="video_upload" id="video_upload" accept="video/mp4,video/webm,video/ogg,video/quicktime"
                                    class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md bg-white" />
                                <small class="text-gray-400">Kosongkan jika tidak ingin mengubah video.</small>
                                @error('video_upload')
                                    <div>
                                        <small class="text-red-500"><i>{{ $message }}</i></small>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label for="video_url" class="text-xs font-semibold text-gray-700">Link Video Instagram / URL</label>
                                <input type="text" name="video_url" id="video_url"
                                    value="{{ old('video_url', Str::startsWith($portofolio->video, ['http://', 'https://']) ? $portofolio->video : '') }}"
                                    placeholder="https://www.instagram.com/reel/... atau https://..."
                                    class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none form-input border-gray-300 border-2 p-2 rounded-md bg-white" />
                                <small class="text-gray-400">Link Reels/Post Instagram</small>
                                @error('video_url')
                                    <div>
                                        <small class="text-red-500"><i>{{ $message }}</i></small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 pt-3 border-t border-gray-200">
                            <label for="yt" class="text-xs font-medium text-gray-600">Youtube ID / Link (Opsional alternatif)</label>
                            <input type="text" name="yt" id="yt" value="{{ old('yt', $portofolio->yt) }}"
                                placeholder="mis. opYg9QS3UXI"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none form-input border-gray-300 border-2 p-2 rounded-md bg-white" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description">Decription</label>
                        <textarea name="description" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $portofolio->description }}</textarea>
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
                                onchange="previewImage(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                    
                            <!-- Preview Gambar -->
                            <img 
                                id="image-preview" 
                                src="{{ old('image') ? asset('storage/portofolio-images/' . old('image1')) : (isset($portofolio) && $portofolio->image1 ? asset('storage/' . $portofolio->image1) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($portofolio) && $portofolio->image1) ? '' : 'hidden' }} z-0 rounded-md" 
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
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($portofolio) && $portofolio->image1) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image1')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Image 2 (Max : 1MB)</label>
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
                            <img 
                                id="image-preview-2" 
                                src="{{ old('image') ? asset('storage/portofolio-images/' . old('image2')) : (isset($portofolio) && $portofolio->image2 ? asset('storage/' . $portofolio->image2) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($portofolio) && $portofolio->image2) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                    
                            <!-- Tombol Hapus -->
                            <button
                                id="remove-btn-2"
                                type="button"
                                onclick="removeImage2()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                    
                            <!-- Text Default -->
                            <span id="upload-text-2" class="text-gray-400 z-0 text-center px-2 {{ (isset($portofolio) && $portofolio->image2) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image2')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title1">Image 3 (Max : 1MB)</label>
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
                            <img 
                                id="image-preview-3" 
                                src="{{ old('image') ? asset('storage/portofolio-images/' . old('image3')) : (isset($portofolio) && $portofolio->image3 ? asset('storage/' . $portofolio->image3) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($portofolio) && $portofolio->image3) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                    
                            <!-- Tombol Hapus -->
                            <button
                                id="remove-btn-3"
                                type="button"
                                onclick="removeImage()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                    
                            <!-- Text Default -->
                            <span id="upload-text-3" class="text-gray-400 z-0 text-center px-2 {{ (isset($portofolio) && $portofolio->image3) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                    
                        @error('image3')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('portofolio.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
        function previewImage2(event) {
            const fileInput = event.target;
            const preview = document.getElementById('image-preview-2');
            const removeBtn = document.getElementById('remove-btn-2');
            const uploadText = document.getElementById('upload-text-2');
    
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
            const fileInput = document.getElementById('image2');
            const preview = document.getElementById('image-preview-2');
            const removeBtn = document.getElementById('remove-btn-2');
            const uploadText = document.getElementById('upload-text-2');
    
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
            const preview = document.getElementById('image-preview-3');
            const removeBtn = document.getElementById('remove-btn-3');
            const uploadText = document.getElementById('upload-text-3');
    
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
            const fileInput = document.getElementById('image3');
            const preview = document.getElementById('image-preview-3');
            const removeBtn = document.getElementById('remove-btn-3');
            const uploadText = document.getElementById('upload-text-3');
    
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
