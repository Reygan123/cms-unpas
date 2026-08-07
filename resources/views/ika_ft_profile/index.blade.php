<x-layout title="IKA FT Profile">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ isset($data) ? route('ika-ft-profile.update', $data->id) : route('ika-ft-profile.store') }}" method="post" enctype="multipart/form-data" id="form-ika-ft">
            @csrf
            @if(isset($data))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="struktur_pengurus">Struktur Pengurus</label>
                        <textarea name="struktur_pengurus" id="struktur_pengurus" rows="4" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('struktur_pengurus', $data->struktur_pengurus ?? '') }}</textarea>
                        @error('struktur_pengurus')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="kontak">Kontak</label>
                        <input type="text" name="kontak" value="{{ old('kontak', $data->kontak ?? '') }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('kontak')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="logo">Logo (Max : 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="logo"
                                id="logo"
                                accept="image/*,.svg"
                                onchange="previewImage(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                            <img 
                                id="image-preview" 
                                src="{{ old('logo') ? asset('storage/ika-ft-logo/' . old('logo')) : (isset($data) && $data->logo ? asset('storage/' . $data->logo) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-contain {{ (isset($data) && $data->logo) ? '' : 'hidden' }} z-0 rounded-md bg-white p-2" 
                            />
                            <button
                                id="remove-btn"
                                type="button"
                                onclick="removeImage()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($data) && $data->logo) ? 'hidden' : '' }}">
                                Klik untuk pilih logo
                            </span>
                        </div>
                        @error('logo')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end my-5">
                <button class="py-3 px-8 bg-[#5676ff] text-white rounded-xl font-medium" type="button" onclick="confirmSubmit()">{{ isset($data) ? 'Update Profile' : 'Save Profile' }}</button>
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
            const fileInput = document.getElementById('logo');
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
                    document.getElementById('form-ika-ft').submit();
                }
            });
        }
    </script>
</x-layout>
