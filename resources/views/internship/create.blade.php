<x-layout title="Add Internship">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('internships.store') }}" method="post" enctype="multipart/form-data" id="form-internship">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_lowongan">Nama Lowongan</label>
                        <input type="text" name="nama_lowongan" value="{{ old('nama_lowongan') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_lowongan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" name="perusahaan" value="{{ old('perusahaan') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('perusahaan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="persyaratan">Persyaratan</label>
                        <textarea name="persyaratan" id="persyaratan" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('persyaratan') }}</textarea>
                        @error('persyaratan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="batas_pendaftaran">Batas Pendaftaran</label>
                        <input type="date" name="batas_pendaftaran" value="{{ old('batas_pendaftaran') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('batas_pendaftaran')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('lokasi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="durasi">Durasi</label>
                        <input type="text" name="durasi" value="{{ old('durasi') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('durasi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="prodi_relevan">Prodi Relevan</label>
                        <input type="text" name="prodi_relevan" value="{{ old('prodi_relevan') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('prodi_relevan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tautan_pendaftaran">Tautan Pendaftaran</label>
                        <input type="url" name="tautan_pendaftaran" value="{{ old('tautan_pendaftaran') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tautan_pendaftaran')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="ditutup" {{ old('status') == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                        </select>
                        @error('status')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="poster">Poster (Max : 2MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="poster" id="poster" accept="image/*,application/pdf" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih file</span>
                        </div>
                        @error('poster')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('internships.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                const file = fileInput.files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        removeBtn.classList.remove('hidden');
                        uploadText.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    uploadText.innerText = file.name;
                    removeBtn.classList.remove('hidden');
                }
            }
        }
        function removeImage() {
            const fileInput = document.getElementById('poster');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.innerText = 'Klik untuk pilih file';
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
                    document.getElementById('form-internship').submit();
                }
            });
        }
    </script>
</x-layout>
