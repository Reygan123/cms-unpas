<x-layout title="Add Academic Service Portal">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('academic-service-portals.store') }}" method="post" enctype="multipart/form-data" id="form-portal">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_sistem">Nama Sistem</label>
                        <input type="text" name="nama_sistem" id="nama_sistem" value="{{ old('nama_sistem') }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_sistem')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="alamat_url">Alamat URL</label>
                        <input type="url" name="alamat_url" id="alamat_url" value="{{ old('alamat_url') }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('alamat_url')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="fungsi">Fungsi</label>
                        <textarea name="fungsi" id="fungsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('fungsi') }}</textarea>
                        @error('fungsi')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="urutan">Urutan</label>
                            <input type="number" name="urutan" id="urutan" value="{{ old('urutan') }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('urutan')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="segera_hadir" {{ old('status') == 'segera_hadir' ? 'selected' : '' }}>Segera Hadir</option>
                            </select>
                            @error('status')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="icon">Icon (Max : 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="icon" id="icon" accept="image/*" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                        </div>
                        @error('icon')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('academic-service-portals.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
            const fileInput = document.getElementById('icon');
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
                    document.getElementById('form-portal').submit();
                }
            });
        }
    </script>
</x-layout>