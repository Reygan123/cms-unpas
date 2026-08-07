<x-layout title="Add Student Achievement">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('student-achievements.store') }}" method="post" enctype="multipart/form-data" id="form-achievement">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">Departemen</label>
                        <select name="id_departement" id="id_departement" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Departemen --</option>
                            @php $departements = \App\Models\Departement::all(); @endphp
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_kompetisi">Nama Kompetisi</label>
                        <input type="text" name="nama_kompetisi" value="{{ old('nama_kompetisi') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_kompetisi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="akademik" {{ old('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="nonakademik" {{ old('kategori') == 'nonakademik' ? 'selected' : '' }}>Non-Akademik</option>
                            <option value="penelitian" {{ old('kategori') == 'penelitian' ? 'selected' : '' }}>Penelitian</option>
                            <option value="inovasi" {{ old('kategori') == 'inovasi' ? 'selected' : '' }}>Inovasi</option>
                            <option value="pkm" {{ old('kategori') == 'pkm' ? 'selected' : '' }}>PKM</option>
                            <option value="kewirausahaan" {{ old('kategori') == 'kewirausahaan' ? 'selected' : '' }}>Kewirausahaan</option>
                            <option value="debat" {{ old('kategori') == 'debat' ? 'selected' : '' }}>Debat</option>
                            <option value="seni_budaya" {{ old('kategori') == 'seni_budaya' ? 'selected' : '' }}>Seni Budaya</option>
                            <option value="olahraga" {{ old('kategori') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="pengabdian_masyarakat" {{ old('kategori') == 'pengabdian_masyarakat' ? 'selected' : '' }}>Pengabdian Masyarakat</option>
                        </select>
                        @error('kategori')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="program_studi" {{ old('tingkat') == 'program_studi' ? 'selected' : '' }}>Program Studi</option>
                            <option value="fakultas" {{ old('tingkat') == 'fakultas' ? 'selected' : '' }}>Fakultas</option>
                            <option value="universitas" {{ old('tingkat') == 'universitas' ? 'selected' : '' }}>Universitas</option>
                            <option value="regional" {{ old('tingkat') == 'regional' ? 'selected' : '' }}>Regional</option>
                            <option value="nasional" {{ old('tingkat') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="internasional" {{ old('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                        @error('tingkat')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="peringkat">Peringkat (Opsional)</label>
                        <input type="text" name="peringkat" value="{{ old('peringkat') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('peringkat')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" value="{{ old('tahun') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tahun')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="dosen_pembimbing">Dosen Pembimbing (Opsional)</label>
                        <input type="text" name="dosen_pembimbing" value="{{ old('dosen_pembimbing') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('dosen_pembimbing')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="penyelenggara">Penyelenggara (Opsional)</label>
                        <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('penyelenggara')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi Singkat</label>
                        <textarea name="deskripsi" id="deskripsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="verified" {{ old('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                            <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1 gap-5 flex flex-col">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="foto">Foto (Max : 2MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="foto" id="foto" accept="image/*" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih foto</span>
                        </div>
                        @error('foto')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="dokumen_pendukung">Dokumen Pendukung (PDF, Max : 5MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" accept="application/pdf" onchange="previewFile(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <button id="remove-file-btn" type="button" onclick="removeFile()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-file-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih file PDF</span>
                        </div>
                        @error('dokumen_pendukung')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-achievements.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
            const fileInput = document.getElementById('foto');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.classList.remove('hidden');
        }
        function previewFile(event) {
            const fileInput = event.target;
            const removeBtn = document.getElementById('remove-file-btn');
            const uploadText = document.getElementById('upload-file-text');
            if (fileInput.files && fileInput.files[0]) {
                uploadText.innerText = fileInput.files[0].name;
                removeBtn.classList.remove('hidden');
            }
        }
        function removeFile() {
            const fileInput = document.getElementById('dokumen_pendukung');
            const removeBtn = document.getElementById('remove-file-btn');
            const uploadText = document.getElementById('upload-file-text');
            fileInput.value = '';
            removeBtn.classList.add('hidden');
            uploadText.innerText = 'Klik untuk pilih file PDF';
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
                    document.getElementById('form-achievement').submit();
                }
            });
        }
    </script>
</x-layout>
