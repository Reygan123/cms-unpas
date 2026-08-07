<x-layout title="Add Organization Document">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <h2 class="text-xl font-bold mb-4">Add Document for {{ $studentOrganization->nama }}</h2>
            <form action="{{ route('student-organizations.organization-documents.store', $studentOrganization->id) }}" method="post" enctype="multipart/form-data" id="form-document">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('judul')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="periode_kepengurusan" {{ old('kategori') == 'periode_kepengurusan' ? 'selected' : '' }}>Periode Kepengurusan</option>
                            <option value="ad_art" {{ old('kategori') == 'ad_art' ? 'selected' : '' }}>AD/ART</option>
                            <option value="program_kerja" {{ old('kategori') == 'program_kerja' ? 'selected' : '' }}>Program Kerja</option>
                            <option value="laporan_kegiatan" {{ old('kategori') == 'laporan_kegiatan' ? 'selected' : '' }}>Laporan Kegiatan</option>
                            <option value="pedoman_organisasi" {{ old('kategori') == 'pedoman_organisasi' ? 'selected' : '' }}>Pedoman Organisasi</option>
                            <option value="kontak" {{ old('kategori') == 'kontak' ? 'selected' : '' }}>Kontak</option>
                        </select>
                        @error('kategori')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" value="{{ old('tahun') }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tahun')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="file">File PDF (Max : 5MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="file" id="file" accept="application/pdf" onchange="previewFile(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <button id="remove-btn" type="button" onclick="removeFile()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih file PDF</span>
                        </div>
                        @error('file')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-organizations.organization-documents.index', $studentOrganization->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>
    <script>
        function previewFile(event) {
            const fileInput = event.target;
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];
                uploadText.innerText = file.name;
                removeBtn.classList.remove('hidden');
            }
        }
        function removeFile() {
            const fileInput = document.getElementById('file');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
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
                    document.getElementById('form-document').submit();
                }
            });
        }
    </script>
</x-layout>
