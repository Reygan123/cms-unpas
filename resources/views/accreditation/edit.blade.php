<x-layout title="Edit Accreditation">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('accreditations.update', $accreditation->id) }}" method="post" enctype="multipart/form-data" id="form-accreditation">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_public" id="is_public" value="1"
                                {{ old('is_public', $accreditation->is_public) ? 'checked' : '' }}
                                class="text-[#5676ff] focus:ring-[#5676ff] border-gray-300 rounded" />
                            <label for="is_public" class="text-sm">Is Public</label>
                        </div>
                        @error('is_public')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>     
                    <hr class="my-3"> 
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">Departement</label>
                        <select name="id_departement" id="id_departement"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Tingkat Fakultas --</option>
                            @foreach (\App\Models\Departement::all() as $departement)
                                <option value="{{ $departement->id }}" {{ old('id_departement', $accreditation->id_departement) == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="jenjang">Jenjang</label>
                            <select name="jenjang" id="jenjang"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="S1" {{ old('jenjang', $accreditation->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('jenjang', $accreditation->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                            </select>
                            @error('jenjang')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="lembaga">Lembaga</label>
                            <input type="text" name="lembaga" value="{{ old('lembaga', $accreditation->lembaga) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('lembaga')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="status">Status</label>
                            <input type="text" name="status" value="{{ old('status', $accreditation->status) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('status')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nomor_sk">Nomor SK</label>
                            <input type="text" name="nomor_sk" value="{{ old('nomor_sk', $accreditation->nomor_sk) }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('nomor_sk')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div class="flex flex-col gap-1">
                            <label for="tanggal_berlaku">Tanggal Berlaku</label>
                            <input type="date" name="tanggal_berlaku" value="{{ old('tanggal_berlaku', $accreditation->tanggal_berlaku ? $accreditation->tanggal_berlaku->format('Y-m-d') : '') }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('tanggal_berlaku')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="masa_berlaku_sampai">Masa Berlaku Sampai</label>
                            <input type="date" name="masa_berlaku_sampai" value="{{ old('masa_berlaku_sampai', $accreditation->masa_berlaku_sampai ? $accreditation->masa_berlaku_sampai->format('Y-m-d') : '') }}"
                                class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                            @error('masa_berlaku_sampai')
                                <div>
                                    <small class="text-red-500"><i>{{ $message }}</i></small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="sertifikat_file">Sertifikat File (Max : 5MB)</label>
                        @if($accreditation->sertifikat_file)
                            <a href="{{ asset('storage/' . $accreditation->sertifikat_file) }}" target="_blank" class="text-blue-500 underline text-xs mb-2">Lihat File Saat Ini</a>
                        @endif
                        <input type="file" name="sertifikat_file" id="sertifikat_file" accept=".pdf,image/*"
                            class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        @error('sertifikat_file')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="dokumen_pendukung">Dokumen Pendukung (Max : 5MB)</label>
                        @if($accreditation->dokumen_pendukung)
                            <a href="{{ asset('storage/' . $accreditation->dokumen_pendukung) }}" target="_blank" class="text-blue-500 underline text-xs mb-2">Lihat Dokumen Saat Ini</a>
                        @endif
                        <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" accept=".pdf"
                            class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        @error('dokumen_pendukung')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('accreditations.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
                    document.getElementById('form-accreditation').submit();
                }
            });
        }
    </script>
</x-layout>
