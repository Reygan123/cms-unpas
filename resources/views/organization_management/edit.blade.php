<x-layout title="Edit Management Member">
    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <h2 class="text-xl font-bold mb-4">Edit Management Member for {{ $studentOrganization->nama }}</h2>
            <form action="{{ route('organization-managements.update', [$studentOrganization->id, $organizationManagement->id]) }}" method="post" enctype="multipart/form-data" id="form-management">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">
                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $organizationManagement->nama) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="ketua" {{ old('jabatan', $organizationManagement->jabatan) == 'ketua' ? 'selected' : '' }}>Ketua</option>
                            <option value="wakil_ketua" {{ old('jabatan', $organizationManagement->jabatan) == 'wakil_ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                            <option value="sekretaris" {{ old('jabatan', $organizationManagement->jabatan) == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                            <option value="bendahara" {{ old('jabatan', $organizationManagement->jabatan) == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                            <option value="kepala_bidang" {{ old('jabatan', $organizationManagement->jabatan) == 'kepala_bidang' ? 'selected' : '' }}>Kepala Bidang</option>
                        </select>
                        @error('jabatan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="nama_bidang">Nama Bidang (Opsional)</label>
                        <input type="text" name="nama_bidang" value="{{ old('nama_bidang', $organizationManagement->nama_bidang) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('nama_bidang')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="periode_kepengurusan">Periode Kepengurusan</label>
                        <input type="text" name="periode_kepengurusan" value="{{ old('periode_kepengurusan', $organizationManagement->periode_kepengurusan) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('periode_kepengurusan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="urutan">Urutan</label>
                        <input type="number" name="urutan" value="{{ old('urutan', $organizationManagement->urutan) }}" class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('urutan')<div><small class="text-red-500"><i>{{ $message }}</i></small></div>@enderror
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="foto">Foto (Max : 2MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input type="file" name="foto" id="foto" accept="image/*" onchange="previewImage(event)" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                            <img id="image-preview" src="{{ old('foto') ? asset('storage/organization-management-photo/' . old('foto')) : (isset($organizationManagement) && $organizationManagement->foto ? asset('storage/' . $organizationManagement->foto) : '#') }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover {{ (isset($organizationManagement) && $organizationManagement->foto) ? '' : 'hidden' }} z-0 rounded-md" />
                            <button id="remove-btn" type="button" onclick="removeImage()" class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">Hapus</button>
                            <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($organizationManagement) && $organizationManagement->foto) ? 'hidden' : '' }}">Klik untuk pilih foto</span>
                        </div>
                        @error('foto')<p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>@enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('student-organizations.organization-managements.index', $studentOrganization->id) }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
            const fileInput = document.getElementById('foto');
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
                    document.getElementById('form-management').submit();
                }
            });
        }
    </script>
</x-layout>
