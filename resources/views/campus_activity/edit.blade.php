<x-layout title="Edit Campus Activity">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('campus-activities.update', $campusActivity->id) }}" method="post" enctype="multipart/form-data" id="form-campus-activity">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $campusActivity->nama_kegiatan) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_kegiatan')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $campusActivity->tanggal) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tanggal')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="waktu">Waktu</label>
                        <input type="time" name="waktu" value="{{ old('waktu', $campusActivity->waktu) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('waktu')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tempat">Tempat</label>
                        <input type="text" name="tempat" value="{{ old('tempat', $campusActivity->tempat) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tempat')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input type="text" name="penyelenggara" value="{{ old('penyelenggara', $campusActivity->penyelenggara) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('penyelenggara')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="seminar" {{ old('jenis', $campusActivity->jenis) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="workshop" {{ old('jenis', $campusActivity->jenis) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="lomba" {{ old('jenis', $campusActivity->jenis) == 'lomba' ? 'selected' : '' }}>Lomba</option>
                        <option value="seni_budaya" {{ old('jenis', $campusActivity->jenis) == 'seni_budaya' ? 'selected' : '' }}>Seni & Budaya</option>
                        <option value="olahraga" {{ old('jenis', $campusActivity->jenis) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="sosial" {{ old('jenis', $campusActivity->jenis) == 'sosial' ? 'selected' : '' }}>Sosial</option>
                        </select>
                        @error('jenis')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi', $campusActivity->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tautan_pendaftaran">Tautan Pendaftaran</label>
                        <input type="url" name="tautan_pendaftaran" value="{{ old('tautan_pendaftaran', $campusActivity->tautan_pendaftaran) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tautan_pendaftaran')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="poster">Poster (Max : 2MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="poster"
                                id="poster"
                                accept="image/*"
                                onchange="previewImage(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                            <img 
                                id="image-preview" 
                                src="{{ old('poster') ? asset('storage/campus-activity-poster/' . old('poster')) : (isset($campusActivity) && $campusActivity->poster ? asset('storage/' . $campusActivity->poster) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($campusActivity) && $campusActivity->poster) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                            <button
                                id="remove-btn"
                                type="button"
                                onclick="removeImage()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($campusActivity) && $campusActivity->poster) ? 'hidden' : '' }}">
                                Klik untuk pilih gambar
                            </span>
                        </div>
                        @error('poster')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('campus-activities.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
            const fileInput = document.getElementById('poster');
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
                    document.getElementById('form-campus-activity').submit();
                }
            });
        }
    </script>
</x-layout>
