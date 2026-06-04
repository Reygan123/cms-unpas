<x-layout>
      <div class="flex flex-col flex-1 w-full h-auto">
  <div class="container px-6 mx-auto mt-8">
  <h4
  class="mb-4 text-lg font-semibold text-gray-600 "
>
  Edit Post
</h4>
  <div    
  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md h-auto"
>


  <form 
  action="{{ route('post.update', $post->id) }}" 
  method="POST"     
  enctype="multipart/form-data" 
  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md h-auto"
>

  @method('PUT')
    @csrf

  <label class="block text-sm mt-3">
    <span class="text-gray-700 font-semibold">Title</span>
    <input
      name="title"
      type="text"
      class="block w-full mt-1 text-sm focus:border-[#034833] focus:outline-none focus:shadow-outline-purple form-input border-gray-300 border-2 p-2 rounded-md"
      value="{{ old('title', $post->title) }}"
    />
  </label>

  <label class="block text-sm mt-3">
    <span class="text-gray-700 font-semibold">Resume</span>
    <textarea name="resume" id="resume" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('resume', $post->resume) }}</textarea>
  </label>

  <label class="block text-sm mt-3">
    <span class="text-gray-700 font-semibold">Content</span>
    <textarea name="content" id="content" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('content', $post->content) }}</textarea>
  </label>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div class="mb-6 mt-4">
      <label for="id_category" class="block text-sm font-medium text-gray-700">Tipe Konten</label>
      <select
        id="id_category"
        name="id_category"
        value="{{ old('id_category', $post->id_category) }}"
        class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
      >
        <option value="1">Artikel</option>
        <option value="2">Berita</option>
      </select>
    </div>

      <div class="mb-6 mt-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select
          id="status"
          name="status"
            value="{{ old('status', $post->status) }}"
          class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
        >
          <option value="active">Active</option>
          <option value="unactive">Unactive</option>
        </select>
      </div>

 

    <div class="mb-4 mt-4">
      <label for="publish" class="block text-sm font-medium text-gray-700">Tanggal</label>
      <input
        type="date"
        name="publish"
        id="publish"
          value="{{ old('publish', $post->publish) }}"
        class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
      />
    </div>

    <div class="mb-4 mt-4">
      <label for="yt" class="block text-sm font-medium text-gray-700">YouTube URL</label>
      <input
        type="text"
        name="yt"
        id="yt"
          value="{{ old('yt', $post->yt) }}"
        placeholder="https://youtube.com/..."
        class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
      />
    </div>  
  </div>


 
  <label class="block text-sm font-medium text-gray-700 mb-2 mt-3">
    Gambar <span class="text-xs text-gray-400">(Max Size: 750kb)</span>
  </label>
  
  <div class="flex gap-6">
    {{-- Dropzone Upload --}}
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
  
    {{-- Image Preview --}}
    <div class="md:w-2/3 h-1/2 flex items-center justify-center">
      @if(isset($post) && $post->image)
        <img src="{{ asset('storage/' . $post->image) }}" 
             alt="Preview" 
             class="w-full h-80 rounded-md shadow-md object-cover" />
      @else
        <span class="text-sm text-gray-400">Belum ada gambar</span>
      @endif
    </div>
  </div>
  

  <button
    type="submit"
    class="block w-auto px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-gray-900  bg-primary border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple mb-5"
  >
    Save 
  </button>
    </div>
  </div>


 

  
</form>

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

