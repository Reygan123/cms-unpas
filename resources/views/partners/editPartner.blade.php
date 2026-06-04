<x-layout>
    <div class="container grid px-6 mx-auto mt-8 mb-12">
        <h4 class="mb-4 text-lg font-semibold text-gray-600">Partners</h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('partner.update', $partner->id) }}" method="post" enctype="multipart/form-data"
                class="bg-white">
                @csrf
                @method('PUT')
                <div class="gird grid-col-1 md:grid-col-5 gap-5">
                    {{-- Kiri: Form --}}
                    <div class="md:col-span-3">
                        <input type="hidden" name="home" value="0">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" name="home" value="1"
                                class="form-checkbox h-5 w-5 text-green-600"
                                {{ old('home', $partner->home) == '1' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700 font-semibold">Display on Home?</span>
                        </label>

                        <label class="block text-sm mb-3 mt-2">
                            <span class="text-gray-700 font-semibold">Partner's Name</span>
                            <input name="name" value="{{ old('name', $partner->name) }}" type="text"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        </label>

                        <label class="block text-sm mb-3">
                            <span class="text-gray-700 font-semibold">Partner's Web Address</span>
                            <input name="url" value="{{ old('url', $partner->url) }}" type="text"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        </label>

                        <label class="block text-sm mb-3">
                            <span class="text-gray-700 font-semibold">Partner Description</span>
                            <textarea name="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('detail', $partner->description) }}</textarea>
                        </label>

                        <label class="block text-sm mb-3">
                            <span class="text-gray-700 font-semibold">Partnership Details</span>
                            <textarea name="detail" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('detail', $partner->detail) }}</textarea>
                        </label>

                        <label class="block text-sm mb-3">
                            <span class="text-gray-700 font-semibold">Departement</span>
                            <select name="id_departement"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Departement --</option>
                                @foreach ($departements as $dept)
                                    <option value="{{ $dept->id }}"
                                        {{ old('id_departement', $partner->id_departement) == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block text-sm mb-3">
                            <span class="text-gray-700 font-semibold">Status</span>
                            <select name="status"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Status --</option>
                                <option value="active" @selected(old('status', $partner->status ?? '') == 'active')>Active</option>
                                <option value="nonactive" @selected(old('status', $partner->status ?? '') == 'nonactive')>Nonactive</option>
                            </select>
                        </label>



                    </div>

                    {{-- Kanan: Upload Gambar --}}
                    <div class="md:col-span-2">
                      <label for="title1">Image (Max: 1MB)</label>
                      <div class="relative w-full h-40 border-2 border-dashed rounded-md flex items-center justify-center bg-gray-50">
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
                              src="{{ old('image') ? asset('storage/partner/' . old('image')) : (isset($partner) && $partner->image ? asset('storage/' . $partner->image) : '#') }}" 
                              alt="Preview" 
                              class="absolute inset-0 w-full h-full object-cover {{ (isset($partner) && $partner->image) ? '' : 'hidden' }} z-0 rounded-md" 
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
                          <span id="upload-text" class="text-gray-400 z-0 text-center px-2 {{ (isset($partner) && $partner->image) ? 'hidden' : '' }}">
                              Klik untuk pilih gambar
                          </span>
                      </div>
                  
                      @error('image')
                          <p class="text-red-500 text-sm mt-2"><i>{{ $message }}</i></p>
                      @enderror
                  </div>   


                </div>

                <button type="submit"
                    class="block mb-5 w-auto px-4 py-2 mt-6 text-sm font-medium text-white bg-primary hover:bg-gray-900 rounded-lg transition-colors">
                    Save
                </button>
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
</x-layout>