<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
      <h4 class="mb-4 text-lg font-semibold text-gray-600">Create Legal Document</h4>
  
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="{{ route('legalDocument.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @csrf
  
          {{-- Bagian kiri: Checkbox, Departement, Title, Description, Button --}}
          <div class="md:col-span-2 flex flex-col gap-4">
            {{-- Display on Home --}}
            <label class="inline-flex items-center mt-3">
          <input type="hidden" name="home" value="0">
              <input 
                type="checkbox" 
                name="home" 
                value="1" 
                class="form-checkbox h-5 w-5 text-green-600"
              >
              <span class="ml-2 text-sm text-gray-700 font-semibold">Display on Home?</span>
            </label>
  
            {{-- Departement --}}
            <label class="block text-sm">
              <span class="text-gray-700 font-semibold">Departement</span>
              <select name="id_departement" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                <option value="">-- Pilih Departement --</option>
                @foreach ($departements as $dept)
                  <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
              </select>
            </label>
  
            {{-- Title --}}
            <label class="block text-sm font-semibold text-gray-700">Title</label>
            <input name="title" type="text"
                   class="block w-full text-sm border-gray-300 border-2 p-2 rounded-md focus:border-[#034833] focus:outline-none focus:shadow-outline-purple" />
  
            {{-- Description --}}
            <label class="block text-sm font-semibold text-gray-700 mt-3">Description</label>
            <textarea name="description" id="description"
                      class="block w-full text-sm border-gray-300 border-2 p-2 rounded-md focus:border-[#034833] focus:outline-none focus:shadow-outline-purple h-32"></textarea>
  
            {{-- Submit Button --}}
            <div>
              <button type="submit"
                      class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white bg-primary hover:bg-gray-900 rounded-lg focus:outline-none focus:shadow-outline-purple">
                SAVE
              </button>
            </div>
          </div>
  
          {{-- Bagian kanan: Image Upload --}}
          <div class="md:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Image <span class="text-xs text-gray-400">(Max Size: 750kb)</span>
            </label>
            <label for="dropzone-file" id="dropzone" 
                   class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition overflow-hidden">
              <div id="dropzone-default" class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and drop</span> a file here or click</p>
                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
              </div>
              <img id="image-preview" src="#" alt="Preview Gambar" class="absolute inset-0 object-cover w-full h-full hidden" />
              <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" onchange="previewImage(event)" />
            </label>
          </div>
        </form>
      </div>
    </div>
  
    <script>
      function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const defaultContent = document.getElementById('dropzone-default');
  
        if (input.files && input.files[0]) {
          const reader = new FileReader();
  
          reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            defaultContent.classList.add('hidden');
          };
  
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
  </x-layout>
  