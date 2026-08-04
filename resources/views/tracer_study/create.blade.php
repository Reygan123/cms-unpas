<x-layout title="Add Tracer Study">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('tracer-studies.store', $departement->id) }}" method="post" id="form-tracer-study">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="tahun">Tahun Lulusan (4 digit)</label>
                            <input type="text" name="tahun" value="{{ old('tahun') }}" placeholder="Contoh: 2024"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tahun')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="label">Label (Kategori)</label>
                            <input type="text" name="label" value="{{ old('label') }}" placeholder="Contoh: Bekerja, Lanjut Studi, dll"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('label')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="nilai">Nilai</label>
                            <input type="number" step="0.01" name="nilai" value="{{ old('nilai') }}" placeholder="Contoh: 85.5"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('nilai')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="satuan">Satuan</label>
                            <input type="text" name="satuan" value="{{ old('satuan') }}" placeholder="Contoh: %, Orang, Bulan"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('satuan')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('tracer-studies.index', $departement->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-tracer-study').submit();
                }
            });
        }
    </script>
</x-layout>
