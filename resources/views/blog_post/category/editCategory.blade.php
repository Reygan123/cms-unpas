<x-layout>
  <div class="container grid px-6 mx-auto mt-8">
    <h4 class="mb-4 text-lg font-semibold text-gray-600">Edit Category</h4>

    <div class="px-6 py-6 bg-white rounded-lg shadow-md">
      <form 
        action="{{ route('category.update', $category->id) }}" 
        method="POST" 
        enctype="multipart/form-data"
      >
        @csrf
        @method('PUT')

        {{-- Input Title --}}
        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
        <input
          type="text"
          name="name"
          value="{{ old('name', $category->name) }}"
          class="w-full text-sm border-2 border-gray-300 rounded-md p-2 focus:border-[#034833] focus:outline-none mb-6"
        />

        {{-- Upload Gambar & Preview - Berdampingan --}}
        <div class="flex flex-col md:flex-row gap-6 items-start">

          {{-- Input File --}}
          <label for="dropzone-file" id="dropzone" 
                   class="relative flex flex-col items-center justify-center w-full h-48 md:h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition overflow-hidden">
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

          {{-- Preview --}}
          @if ($category->image)
            <div class="md:w-1/2 w-full mt-4 md:mt-0">
              <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar</label>
              <img src="{{ asset('storage/' . $category->image) }}" 
                   alt="Gambar Category" 
                   class="w-full h-auto max-h-64 rounded-md shadow-md object-cover">
            </div>
          @endif
        </div>

        {{-- Tombol Submit --}}
        <button
          type="submit"
          class="mt-6 px-5 py-2 text-sm font-medium text-white rounded-md hover:bg-gray-900  bg-primary transition duration-150"
        >
          Save
        </button>
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
