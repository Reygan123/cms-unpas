<x-layout title="Edit Academic Document">

    <div class="p-3 md:p-5 flex items-center justify-center">
        <div class="w-full bg-white p-4 md:p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('academic-documents.update', $academicDocument->id) }}" method="post" enctype="multipart/form-data" id="form-departement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $academicDocument->judul) }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('judul')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" onchange="toggleSubKategori()"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="buku_panduan" {{ old('kategori', $academicDocument->kategori) == 'buku_panduan' ? 'selected' : '' }}>Buku Panduan</option>
                                <option value="peraturan" {{ old('kategori', $academicDocument->kategori) == 'peraturan' ? 'selected' : '' }}>Peraturan</option>
                            </select>
                            @error('kategori')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-1 mb-5" id="wrap-sub-kategori">
                            <label for="sub_kategori">Sub Kategori</label>
                            <select name="sub_kategori" id="sub_kategori"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Sub Kategori --</option>
                                <option value="skripsi_ta" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'skripsi_ta' ? 'selected' : '' }}>Skripsi / Tugas Akhir</option>
                                <option value="kp_magang" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'kp_magang' ? 'selected' : '' }}>KP / Magang</option>
                                <option value="mbkm" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'mbkm' ? 'selected' : '' }}>MBKM</option>
                                <option value="perkuliahan_evaluasi" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'perkuliahan_evaluasi' ? 'selected' : '' }}>Perkuliahan & Evaluasi</option>
                                <option value="kemajuan_studi" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'kemajuan_studi' ? 'selected' : '' }}>Kemajuan Studi</option>
                                <option value="yudisium_kelulusan" {{ old('sub_kategori', $academicDocument->sub_kategori) == 'yudisium_kelulusan' ? 'selected' : '' }}>Yudisium & Kelulusan</option>
                            </select>
                            @error('sub_kategori')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">Program Studi</label>
                        <select name="id_departement" id="id_departement"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Fakultas (Semua Prodi) --</option>
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->id }}" {{ old('id_departement', $academicDocument->id_departement) == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="nomor_dokumen">Nomor Dokumen</label>
                            <input type="text" name="nomor_dokumen" id="nomor_dokumen" value="{{ old('nomor_dokumen', $academicDocument->nomor_dokumen) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('nomor_dokumen')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-1 mb-5">
                            <label for="tahun_akademik">Tahun Akademik</label>
                            <input type="text" name="tahun_akademik" id="tahun_akademik" value="{{ old('tahun_akademik', $academicDocument->tahun_akademik) }}" placeholder="2025/2026"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tahun_akademik')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-1 mb-5">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Status --</option>
                                <option value="berlaku" {{ old('status', $academicDocument->status) == 'berlaku' ? 'selected' : '' }}>Berlaku</option>
                                <option value="direvisi" {{ old('status', $academicDocument->status) == 'direvisi' ? 'selected' : '' }}>Direvisi</option>
                                <option value="dicabut" {{ old('status', $academicDocument->status) == 'dicabut' ? 'selected' : '' }}>Dicabut</option>
                                <option value="arsip" {{ old('status', $academicDocument->status) == 'arsip' ? 'selected' : '' }}>Arsip</option>
                            </select>
                            @error('status')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="tanggal_terbit">Tanggal Terbit</label>
                            <input type="date" name="tanggal_terbit" id="tanggal_terbit"
                                value="{{ old('tanggal_terbit', optional($academicDocument->tanggal_terbit)->format('Y-m-d')) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tanggal_terbit')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-1 mb-5">
                            <label for="tanggal_berlaku">Tanggal Berlaku</label>
                            <input type="date" name="tanggal_berlaku" id="tanggal_berlaku"
                                value="{{ old('tanggal_berlaku', optional($academicDocument->tanggal_berlaku)->format('Y-m-d')) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tanggal_berlaku')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi', $academicDocument->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="file">File Dokumen (PDF, Max 5MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="file" id="file" accept="application/pdf" onchange="showFileName(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <span id="file-name" class="text-gray-400 z-0 text-center px-2 break-all">
                                {{ $academicDocument->file ? basename($academicDocument->file) : 'Klik untuk pilih file PDF' }}
                            </span>
                        </div>
                        @if ($academicDocument->file)
                        <a href="{{ asset('storage/' . $academicDocument->file) }}" target="_blank" class="text-xs text-[#5676ff] mt-1">Lihat file saat ini</a>
                        @endif
                        @error('file')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('academic-documents.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Save</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(event) {
            const fileInput = event.target;
            const fileName = document.getElementById('file-name');
            if (fileInput.files && fileInput.files[0]) {
                fileName.textContent = fileInput.files[0].name;
            }
        }

        function toggleSubKategori() {
            const kategori = document.getElementById('kategori').value;
            const wrap = document.getElementById('wrap-sub-kategori');
            wrap.style.display = kategori === 'peraturan' ? 'flex' : 'none';
        }

        document.addEventListener("DOMContentLoaded", toggleSubKategori);

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
                    document.getElementById('form-departement').submit();
                }
            });
        }
    </script>

</x-layout>