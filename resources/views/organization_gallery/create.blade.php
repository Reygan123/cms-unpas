<x-layout title="Add Gallery Item">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <h2 class="text-xl font-bold mb-4">Add Gallery Item for {{ $studentOrganization->nama }}</h2>
            <form action="{{ route('student-organizations.organization-galleries.store', $studentOrganization->id) }}" method="post" enctype="multipart/form-data" id="form-gallery">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tipe">Tipe</label>
                        <select name="tipe" id="tipe" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md" onchange="toggleTipeInput()">
                            <option value="foto" {{ old('tipe') == 'foto' ? 'selected' : '' }}>Foto</option>
                            <option value="video" {{ old('tipe') == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                        @error('tipe')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" value="{{ old('caption') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('caption')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div id="video-input-group" class="flex flex-col gap-1 mb-5 {{ old('tipe') == 'video' ? '' : 'hidden' }}">
                        <label for="url">Video URL</label>
                        <input type="url" name="url" id="url" value="{{ old('url') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('url')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1" id="foto-input-group" style="{{ old('tipe') == 'video' ? 'display: none;' : '' }}">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="file">Foto (Max : 2MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="file" id="file" accept="image/*" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih foto</span>
                        </div>
                        @error('file')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-organizations.organization-galleries.index', $studentOrganization->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>
    <script>
        function toggleTipeInput() {
            const tipe = document.getElementById('tipe').value;
            const videoGroup = document.getElementById('video-input-group');
            const fotoGroup = document.getElementById('foto-input-group');
            if (tipe === 'video') {
                videoGroup.classList.remove('hidden');
                fotoGroup.style.display = 'none';
            } else {
                videoGroup.classList.add('hidden');
                fotoGroup.style.display = 'block';
            }
        }
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
            const fileInput = document.getElementById('file');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.classList.remove('hidden');
        }
        function confirmSubmit() {
            Swal.fire({
                title: 'Simpan Data?',
                text: "Pastikan semua data sudah benar.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700',
                    cancelButton: 'bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-gallery').submit();
                }
            });
        }
    </script>
</x-layout>
