<x-layout title="Edit Student Organization">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('student-organizations.update', $studentOrganization->id) }}" method="post" enctype="multipart/form-data" id="form-org">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $studentOrganization->nama) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="singkatan">Singkatan</label>
                        <input type="text" name="singkatan" value="{{ old('singkatan', $studentOrganization->singkatan) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('singkatan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">Departemen</label>
                        <select name="id_departement" id="id_departement" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Departemen --</option>
                            @php $departements = \App\Models\Departement::all(); @endphp
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->id }}" {{ old('id_departement', $studentOrganization->id_departement) == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="deskripsi_singkat">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" id="deskripsi_singkat" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('deskripsi_singkat', $studentOrganization->deskripsi_singkat) }}</textarea>
                        @error('deskripsi_singkat')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="visi">Visi</label>
                        <textarea name="visi" id="visi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('visi', $studentOrganization->visi) }}</textarea>
                        @error('visi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="misi">Misi</label>
                        <textarea name="misi" id="misi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('misi', $studentOrganization->misi) }}</textarea>
                        @error('misi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="tujuan">Tujuan</label>
                        <textarea name="tujuan" id="tujuan" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('tujuan', $studentOrganization->tujuan) }}</textarea>
                        @error('tujuan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nilai_organisasi">Nilai Organisasi</label>
                        <textarea name="nilai_organisasi" id="nilai_organisasi" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('nilai_organisasi', $studentOrganization->nilai_organisasi) }}</textarea>
                        @error('nilai_organisasi')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="ruang_lingkup">Ruang Lingkup</label>
                        <textarea name="ruang_lingkup" id="ruang_lingkup" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('ruang_lingkup', $studentOrganization->ruang_lingkup) }}</textarea>
                        @error('ruang_lingkup')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="ketua">Ketua</label>
                        <input type="text" name="ketua" value="{{ old('ketua', $studentOrganization->ketua) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('ketua')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="periode_kepengurusan">Periode Kepengurusan</label>
                        <input type="text" name="periode_kepengurusan" value="{{ old('periode_kepengurusan', $studentOrganization->periode_kepengurusan) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('periode_kepengurusan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="media_sosial">Media Sosial</label>
                        <textarea name="media_sosial" id="media_sosial" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('media_sosial', $studentOrganization->media_sosial) }}</textarea>
                        @error('media_sosial')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1 gap-5 flex flex-col">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="logo">Logo (Max : 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="logo" id="logo" accept="image/*" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="{{ old('logo') ? asset('storage/organization-logo/' . old('logo')) : (isset($studentOrganization) && $studentOrganization->logo ? asset('storage/' . $studentOrganization->logo) : '#') }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover {{ (isset($studentOrganization) && $studentOrganization->logo) ? '' : 'hidden' }} z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($studentOrganization) && $studentOrganization->logo) ? 'hidden' : '' }}">Klik untuk pilih logo</span>
                        </div>
                        @error('logo')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-organizations.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
                <button class="py-3 px-5 bg-[#5676ff] text-white rounded-xl" type="button" onclick="confirmSubmit()">Next</button>
            </div>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                    uploadText.classList.add('hidden');
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
        function removeImage() {
            const fileInput = document.getElementById('logo');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.classList.remove('hidden');
        }
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
                    document.getElementById('form-org').submit();
                }
            });
        }
    </script>
</x-layout>
