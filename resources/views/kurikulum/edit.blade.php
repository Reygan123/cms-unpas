<x-layout title="Kurikulum">

    <div class="p-5 flex items-center justify-center">
        <div class="w-full bg-white p-5 rounded-xl text-sm flex flex-col">
            <form action="{{ route('kurikulum.update', $kurikulum->id) }}" method="post" enctype="multipart/form-data" id="form-kurikulum">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                <div class="col-span-1 md:col-span-2 gap-5">
                    <div class="flex flex-col gap-1 mb-5 md:col-span-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="home" id="home" value="1"
                                {{ old('home', $kurikulum->home) ? 'checked' : '' }}
                                class="text-[#5676ff] focus:ring-[#5676ff] border-gray-300 rounded" />
                            <label for="home" class="text-sm">Display At Home</label>
                        </div>
                        @error('home')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>                        
                    <hr class="my-3"> 
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="id_departement">kurikulum</label>
                        <select name="id_departement" id="id_departement"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-select border-gray-300 border-2 p-2 rounded-md">
                            @foreach ($departements as $departement)
                            @if ($kurikulum->id_departement == $departement->id)
                            <option value="{{ $departement->id }}" selected>{{ $departement->name }}</option>
                            @endif
                                <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                            @endforeach
                        </select>
                        @error('id_departement')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>                    
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $kurikulum->title }}"
                            class="block w-full mt-1 text-sm focus:border-[#5676ff] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md" />
                        @error('title')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="description">Decription</label>
                        <textarea name="description" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ $kurikulum->description }}</textarea>
                        @error('description')
                            <div>
                                <small class="text-red-500"><i>{{ $message }}</i></small>
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <div>
                <div class="flex flex-col gap-1 mb-5">
                    <label for="title1">Image (Max: 1MB)</label>
                    <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept="image/*"
                            onchange="previewImage(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        />
                
                        <!-- Preview Gambar -->
                        <img 
                            id="image-preview" 
                            src="{{ old('image') ? asset('storage/usp/' . old('image')) : (isset($kurikulum) && $kurikulum->image ? asset('storage/' . $kurikulum->image) : '#') }}" 
                            alt="Preview" 
                            class="absolute inset-0 w-full h-full object-cover {{ (isset($kurikulum) && $kurikulum->image) ? '' : 'hidden' }} z-0 rounded-md" 
                        />
                
                        <!-- Tombol Hapus -->
                        <button
                            id="remove-btn"
                            type="button"
                            onclick="removeImage()"
                            class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                        >
                            Hapus
                        </button>
                
                        <!-- Text Default -->
                        <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($kurikulum) && $kurikulum->image) ? 'hidden' : '' }}">
                            Klik untuk pilih gambar
                        </span>
                    </div>
                
                    @error('image')
                        <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                    @enderror
                </div> 
                
                <div class="col-span-1">
                    <div class="flex flex-col gap-1 mb-5">
                        <label for="icon">Icon (Max : 1MB)</label>
                        <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50 overflow-hidden">
                            <input
                                type="file"
                                name="icon"
                                id="icon"
                                {{-- accept="image/*" --}}
                                onchange="previewIcon(event)"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            />
                
                            <!-- Preview Icon -->
                            <img
                                id="icon-preview"
                                src="{{ old('icon') ? asset('storage/usp/' . old('icon')) : (isset($kurikulum) && $kurikulum->icon ? asset('storage/' . $kurikulum->icon) : '#') }}" 
                                alt="Preview" 
                                class="absolute inset-0 w-full h-full object-cover {{ (isset($kurikulum) && $kurikulum->icon) ? '' : 'hidden' }} z-0 rounded-md" 
                            />
                
                            <!-- Tombol Hapus -->
                            <button
                                id="remove-icon-btn"
                                type="button"
                                onclick="removeIcon()"
                                class="hidden absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-20"
                            >
                                Hapus
                            </button>
                
                            <!-- Text Default -->
                            <span id="upload-icon-text" class="text-gray-400 z-0 text-center px-2">Klik untuk pilih gambar</span>
                        </div>
                
                        @error('icon')
                            <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="flex items-center justify-between my-5">
                <a href="{{ route('kurikulum.index') }}" class="py-3 px-5 bg-gray-300 rounded-xl">Back</a>
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
            const fileInput = document.getElementById('image');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-btn');
            const uploadText = document.getElementById('upload-text');
    
            fileInput.value = '';
            preview.src = '#';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            uploadText.classList.remove('hidden');
        }
    </script>

<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Simpan Data?',
            text: "Pastikan semua data sudah benar.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
            buttonsStyling: false, // ini penting!
            customClass: {
                confirmButton: 'bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700',
                cancelButton: 'bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-kurikulum').submit();
            }
        });
    }
</script>

<script>
    function previewIcon(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('icon-preview');
        const uploadText = document.getElementById('upload-icon-text');
        const removeBtn = document.getElementById('remove-icon-btn');

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                uploadText.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }

        if (file.size > 1024 * 1024) {
        alert('Ukuran gambar tidak boleh lebih dari 1MB');
        event.target.value = '';
        return;
}
    }

    function removeIcon() {
        const input = document.getElementById('icon');
        const preview = document.getElementById('icon-preview');
        const uploadText = document.getElementById('upload-icon-text');
        const removeBtn = document.getElementById('remove-icon-btn');

        input.value = '';
        preview.src = '#';
        preview.classList.add('hidden');
        uploadText.classList.remove('hidden');
        removeBtn.classList.add('hidden');
    }
</script>

</x-layout>
