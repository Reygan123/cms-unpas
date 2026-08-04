<x-layout title="Edit Learning Outcome">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('learning-outcomes.update', [$departement->id, $learningOutcome->id]) }}" method="post" id="form-learning-outcome">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="kode_cpl">Kode CPL</label>
                            <input type="text" name="kode_cpl" value="{{ old('kode_cpl', $learningOutcome->kode_cpl) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('kode_cpl')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="urutan">Urutan Tampil</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $learningOutcome->urutan) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('urutan')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="sikap" {{ old('kategori', $learningOutcome->kategori) == 'sikap' ? 'selected' : '' }}>Sikap</option>
                            <option value="pengetahuan" {{ old('kategori', $learningOutcome->kategori) == 'pengetahuan' ? 'selected' : '' }}>Pengetahuan</option>
                            <option value="keterampilan_umum" {{ old('kategori', $learningOutcome->kategori) == 'keterampilan_umum' ? 'selected' : '' }}>Keterampilan Umum</option>
                            <option value="keterampilan_khusus" {{ old('kategori', $learningOutcome->kategori) == 'keterampilan_khusus' ? 'selected' : '' }}>Keterampilan Khusus</option>
                        </select>
                        @error('kategori')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="pernyataan">Pernyataan CPL</label>
                        <textarea name="pernyataan" id="pernyataan" rows="4" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('pernyataan', $learningOutcome->pernyataan) }}</textarea>
                        @error('pernyataan')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('learning-outcomes.index', $departement->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-learning-outcome').submit();
                }
            });
        }
    </script>
</x-layout>
