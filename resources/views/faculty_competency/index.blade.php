<x-layout title="Faculty Competency">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <div class="mb-5">
                <h1 class="text-lg font-semibold text-gray-700">Kerangka Kompetensi Lulusan (Fakultas)</h1>
            </div>
            <form action="{{ $data ? route('faculty-competency.update', $data->id) : route('faculty-competency.store') }}" method="post" enctype="multipart/form-data" id="form-faculty-competency">
            @csrf
            @if($data)
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $data->title ?? '') }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description">Deskripsi Singkat</label>
                        <textarea name="description" id="description" rows="3" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('description', $data->description ?? '') }}</textarea>
                        @error('description')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="content">Konten Lengkap</label>
                        <textarea name="content" id="content" rows="8" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('content', $data->content ?? '') }}</textarea>
                        @error('content')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="document_file">Dokumen Lampiran (PDF Max: 5MB)</label>
                        @if($data && $data->document_file)
                            <a href="{{ asset('storage/' . $data->document_file) }}" target="_blank" class="text-blue-500 underline text-xs mb-2">Lihat Dokumen Saat Ini</a>
                        @endif
                        <input type="file" name="document_file" id="document_file" accept=".pdf"
                            class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        @error('document_file')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end my-5">
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
                    document.getElementById('form-faculty-competency').submit();
                }
            });
        }
    </script>
</x-layout>
