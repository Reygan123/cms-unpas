<x-layout title="Edit Tuition Fee">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('tuition-fees.update', $tuitionFee->id) }}" method="post" id="form-tuition-fee">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">

                <div class="flex flex-col gap-1 mb-5">
                    <label for="tahun_akademik">Tahun Akademik</label>
                    <input type="text" name="tahun_akademik" value="{{ old('tahun_akademik', $tuitionFee->tahun_akademik) }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('tahun_akademik')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5">
                    <label for="id_departement">Departement</label>
                    <select name="id_departement" id="id_departement"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                        <option value="">-- Pilih Departement --</option>
                        @foreach (\App\Models\Departement::all() as $departement)
                            <option value="{{ $departement->id }}" {{ old('id_departement', $tuitionFee->id_departement) == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                        @endforeach
                    </select>
                    @error('id_departement')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5">
                    <label for="jenjang">Jenjang</label>
                    <select name="jenjang" id="jenjang"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="S1" {{ old('jenjang', $tuitionFee->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('jenjang', $tuitionFee->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                    </select>
                    @error('jenjang')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5">
                    <label for="jenis_program">Jenis Program</label>
                    <select name="jenis_program" id="jenis_program"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                        <option value="">-- Pilih Jenis Program --</option>
                        <option value="reguler" {{ old('jenis_program', $tuitionFee->jenis_program) == 'reguler' ? 'selected' : '' }}>Reguler</option>
                        <option value="hybrid" {{ old('jenis_program', $tuitionFee->jenis_program) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="pjj" {{ old('jenis_program', $tuitionFee->jenis_program) == 'pjj' ? 'selected' : '' }}>PJJ</option>
                        <option value="fast_track" {{ old('jenis_program', $tuitionFee->jenis_program) == 'fast_track' ? 'selected' : '' }}>Fast Track</option>
                    </select>
                    @error('jenis_program')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" value="{{ old('semester', $tuitionFee->semester) }}" min="1" max="14"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('semester')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5">
                    <label for="jenis_biaya">Jenis Biaya</label>
                    <input type="text" name="jenis_biaya" value="{{ old('jenis_biaya', $tuitionFee->jenis_biaya) }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('jenis_biaya')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" value="{{ old('nominal', $tuitionFee->nominal) }}" min="0" step="any"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('nominal')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" rows="3">{{ old('keterangan', $tuitionFee->keterangan) }}</textarea>
                    @error('keterangan')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between my-5">
                <a href="{{ route('tuition-fees.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Simpan</button>
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
                    document.getElementById('form-tuition-fee').submit();
                }
            });
        }
    </script>
</x-layout>
