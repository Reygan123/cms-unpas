<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 "
  >
    Create Category
  </h4>
    <div    
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md h-auto"
  >


  <form 
  action="{{ route('category.store') }}" 
  method="POST" 
  enctype="multipart/form-data" 
  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md h-auto"
>
  @csrf

  <label class="block text-sm mt-3">
    <span class="text-gray-700 font-semibold">Title</span>
    <input
      name="name"
      type="text"
      class="block w-full mt-1 text-sm focus:border-[#034833] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md"
      
    />
  </label>
 
  <div class="w-1/3">
    <label class="block text-sm font-medium text-gray-700 mb-2 mt-3">
 Gambar <span class="text-xs text-gray-400">(Max Size: 750kb)</span>
</label>
 <label for="dropzone-file" id="dropzone" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition overflow-hidden">
   {{-- Default Content --}}
   <div id="dropzone-default" class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
     <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
         d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z"/>
     </svg>
     <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and drop</span> a file here or click</p>
     <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
   </div>

   {{-- Image Preview (hidden initially) --}}
   <img id="image-preview" src="#" alt="Preview Gambar" class="absolute inset-0 object-cover w-full h-full hidden" />

   <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" onchange="previewImage(event)" />
 </label>
</div>

  <button
    type="submit"
    class="block w-auto px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-gray-900  bg-primary border border-transparent rounded-lg active:bg-[#034833] focus:outline-none focus:shadow-outline-purple mb-5"
  >
    Save 
  </button>
</form>

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