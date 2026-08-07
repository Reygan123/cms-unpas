<x-layout title="Add Course">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data" id="form-course">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start">
                <div class="flex flex-col gap-1 mb-5">
                    <label for="kode_mata_kuliah">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mata_kuliah" value="{{ old('kode_mata_kuliah') }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('kode_mata_kuliah')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="nama_mata_kuliah">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mata_kuliah" value="{{ old('nama_mata_kuliah') }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('nama_mata_kuliah')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="sks">SKS</label>
                    <input type="number" name="sks" value="{{ old('sks') }}" min="1" max="10" step="1"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('sks')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" value="{{ old('semester') }}" min="1" max="14" step="1"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('semester')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="program_studi">Program Studi</label>
                    <input type="text" name="program_studi" value="{{ old('program_studi') }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('program_studi')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="dosen_pengampu">Dosen Pengampu</label>
                    <input type="text" name="dosen_pengampu" value="{{ old('dosen_pengampu') }}"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('dosen_pengampu')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5 col-span-1 md:col-span-2">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md h-24">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div>
                            <small class="text-red-500"><i>{{ $message }}</i></small>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-5 col-span-1 md:col-span-2">
                    <label for="silabus">Silabus (PDF, Max : 2MB)</label>
                    <input type="file" name="silabus" id="silabus" accept=".pdf"
                        class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                    @error('silabus')
                        <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('course.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-course').submit();
                }
            });
        }
    </script>
</x-layout>
