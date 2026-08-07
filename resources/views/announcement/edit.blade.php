<x-layout title="Edit Announcement">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('announcements.update', $announcement->id) }}" method="post" enctype="multipart/form-data" id="form-announcement">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-5 items-start">
                <div class="flex flex-col gap-1 mb-5">
                    <label for="judul">Judul Pengumuman</label>
                    <input type="text" name="judul" value="{{ old('judul', $announcement->judul) }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('judul')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="isi">Isi Pengumuman</label>
                    <textarea name="isi" id="isi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md h-32">{{ old('isi', $announcement->isi) }}</textarea>
                    @error('isi')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="tanggal_publikasi">Tanggal Publikasi</label>
                    <input type="date" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $announcement->tanggal_publikasi) }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('tanggal_publikasi')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis', $announcement->penulis) }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('penulis')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="lampiran">Lampiran (Opsional, Max : 5MB) - Biarkan kosong jika tidak ingin mengubah</label>
                    <input type="file" name="lampiran" id="lampiran"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @if(isset($announcement) && $announcement->lampiran)
                        <div class="mt-2 text-xs">
                            <a href="{{ asset('storage/' . $announcement->lampiran) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Lampiran Saat Ini</a>
                        </div>
                    @endif
                    @error('lampiran')
                        <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('announcements.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-announcement').submit();
                }
            });
        }
    </script>
</x-layout>
