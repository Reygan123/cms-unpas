<x-layout title="Edit Curriculum Period">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('curriculum-periods.update', [$departement->id, $curriculumPeriod->id]) }}" method="post" enctype="multipart/form-data" id="form-curriculum">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="tahun_kurikulum">Tahun Kurikulum</label>
                            <input type="text" name="tahun_kurikulum" value="{{ old('tahun_kurikulum', $curriculumPeriod->tahun_kurikulum) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tahun_kurikulum')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="jumlah_semester">Jumlah Semester</label>
                            <input type="number" name="jumlah_semester" value="{{ old('jumlah_semester', $curriculumPeriod->jumlah_semester) }}" min="1" max="14"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('jumlah_semester')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="total_sks">Total SKS</label>
                            <input type="number" name="total_sks" value="{{ old('total_sks', $curriculumPeriod->total_sks) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('total_sks')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="aktif" {{ old('status', $curriculumPeriod->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $curriculumPeriod->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="program_kampus_berdampak">Program Kampus Berdampak</label>
                        <textarea name="program_kampus_berdampak" id="program_kampus_berdampak" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('program_kampus_berdampak', $curriculumPeriod->program_kampus_berdampak) }}</textarea>
                        @error('program_kampus_berdampak')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="dokumen_file">Dokumen Kurikulum (PDF Max: 5MB)</label>
                        @if($curriculumPeriod->dokumen_file)
                            <a href="{{ asset('storage/' . $curriculumPeriod->dokumen_file) }}" target="_blank" class="text-blue-500 underline text-xs mb-2">Lihat File Saat Ini</a>
                        @endif
                        <input type="file" name="dokumen_file" id="dokumen_file" accept=".pdf"
                            class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        @error('dokumen_file')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('curriculum-periods.index', $departement->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-curriculum').submit();
                }
            });
        }
    </script>
</x-layout>
