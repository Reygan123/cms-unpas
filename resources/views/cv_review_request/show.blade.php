<x-layout title="View CV Review Request">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start mb-6">
                <div>
                    <h3 class="text-lg font-bold mb-4 border-b pb-2">Detail Pemohon</h3>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">Nama:</p>
                        <p>{{ $cvReviewRequest->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">Email:</p>
                        <p>{{ $cvReviewRequest->email }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">Departement:</p>
                        <p>{{ $cvReviewRequest->departement->name ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">Jenis Layanan:</p>
                        <p>{{ $cvReviewRequest->jenis_layanan }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">Catatan Pemohon:</p>
                        <div class="bg-gray-50 p-3 rounded border">{{ $cvReviewRequest->catatan_pemohon ?: 'Tidak ada catatan' }}</div>
                    </div>
                    <div class="mb-3">
                        <p class="text-gray-500 font-semibold">File Upload:</p>
                        @if($cvReviewRequest->file_upload)
                            <a href="{{ asset('storage/' . $cvReviewRequest->file_upload) }}" target="_blank" class="text-blue-600 hover:underline inline-flex items-center gap-1 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                Lihat File
                            </a>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4 border-b pb-2">Update Status & Catatan</h3>
                    <form action="{{ route('cv-review-requests.update', $cvReviewRequest->id) }}" method="post" id="form-cv-review">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="status" class="font-semibold text-gray-700">Status</label>
                            <select name="status" id="status" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="diajukan" {{ old('status', $cvReviewRequest->status) == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                                <option value="diproses" {{ old('status', $cvReviewRequest->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ old('status', $cvReviewRequest->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                                <div><small class="text-red-500"><i>{{ $message }}</i></small></div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1 mb-5">
                            <label for="catatan_admin" class="font-semibold text-gray-700">Catatan Admin / Hasil Review</label>
                            <textarea name="catatan_admin" id="catatan_admin" rows="5" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('catatan_admin', $cvReviewRequest->catatan_admin) }}</textarea>
                            @error('catatan_admin')
                                <div><small class="text-red-500"><i>{{ $message }}</i></small></div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex items-center justify-between my-5 border-t pt-5">
                <a href="{{ route('cv-review-requests.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Update Review</button>
            </div>
        </div>
    </div>
    <script>
        function confirmSubmit() {
            Swal.fire({
                title: 'Update Status?',
                text: "Pastikan data dan catatan sudah sesuai.",
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
                    document.getElementById('form-cv-review').submit();
                }
            });
        }
    </script>
</x-layout>
