<x-layout title="Edit Organization Program">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <h2 class="text-xl font-bold mb-4">Edit Program for {{ $studentOrganization->nama }}</h2>
            <form action="{{ route('organization-programs.update', [$studentOrganization->id, $organizationProgram->id]) }}" method="post" id="form-program">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_program">Nama Program</label>
                        <input type="text" name="nama_program" value="{{ old('nama_program', $organizationProgram->nama_program) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_program')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pengembangan_organisasi" {{ old('kategori', $organizationProgram->kategori) == 'pengembangan_organisasi' ? 'selected' : '' }}>Pengembangan Organisasi</option>
                            <option value="kaderisasi" {{ old('kategori', $organizationProgram->kategori) == 'kaderisasi' ? 'selected' : '' }}>Kaderisasi</option>
                            <option value="keilmuan_keprofesian" {{ old('kategori', $organizationProgram->kategori) == 'keilmuan_keprofesian' ? 'selected' : '' }}>Keilmuan Keprofesian</option>
                            <option value="pengabdian_masyarakat" {{ old('kategori', $organizationProgram->kategori) == 'pengabdian_masyarakat' ? 'selected' : '' }}>Pengabdian Masyarakat</option>
                            <option value="minat_bakat" {{ old('kategori', $organizationProgram->kategori) == 'minat_bakat' ? 'selected' : '' }}>Minat Bakat</option>
                            <option value="kesejahteraan_mahasiswa" {{ old('kategori', $organizationProgram->kategori) == 'kesejahteraan_mahasiswa' ? 'selected' : '' }}>Kesejahteraan Mahasiswa</option>
                            <option value="kewirausahaan" {{ old('kategori', $organizationProgram->kategori) == 'kewirausahaan' ? 'selected' : '' }}>Kewirausahaan</option>
                            <option value="komunikasi_informasi" {{ old('kategori', $organizationProgram->kategori) == 'komunikasi_informasi' ? 'selected' : '' }}>Komunikasi Informasi</option>
                        </select>
                        @error('kategori')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi', $organizationProgram->deskripsi) }}</textarea>
                        @error('deskripsi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan', $organizationProgram->tanggal_pelaksanaan) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('tanggal_pelaksanaan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="direncanakan" {{ old('status', $organizationProgram->status) == 'direncanakan' ? 'selected' : '' }}>Direncanakan</option>
                            <option value="berjalan" {{ old('status', $organizationProgram->status) == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                            <option value="selesai" {{ old('status', $organizationProgram->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-organizations.organization-programs.index', $studentOrganization->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>
    <script>
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
                    document.getElementById('form-program').submit();
                }
            });
        }
    </script>
</x-layout>
