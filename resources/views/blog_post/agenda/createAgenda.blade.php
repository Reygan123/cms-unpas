<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
      <h4 class="mb-4 text-lg font-semibold text-gray-600">
        Create Agenda
      </h4>
  
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form 
          action="{{ route('agenda.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-6"
        >
          @csrf
  
          {{-- Title --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input 
              name="title" 
              type="text"
              class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
              placeholder="Agenda's Title"
            />
          </div>
  
                {{-- Start Date & End Date with datetime-local --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Start DateTime --}}
            <div>
            <label class="block text-sm font-medium text-gray-700">Start Date & Time</label>
            <input 
                name="start_date"
                type="datetime-local"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
            />
            </div>
        
            {{-- End DateTime --}}
            <div>
            <label class="block text-sm font-medium text-gray-700">End Date & Time</label>
            <input 
                name="end_date"
                type="datetime-local"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
            />
            </div>
        </div>
  
          {{-- Description --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea 
              name="description"
              rows="4"
              class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
              placeholder="Write the agenda description..."
            ></textarea>
          </div>
  
          {{-- Event Organizer, Location, Youtube --}}
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Event Organizer</label>
              <input 
                name="event"
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
                placeholder="Event Organizer"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Location</label>
              <input 
                name="location"
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
                placeholder="Event's Location"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Link Youtube</label>
              <input 
                name="yt"
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
                placeholder="Youtube video link"
              />
            </div>
          </div>
  
          {{-- Register Link & Contact --}}
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Register Link</label>
              <input 
                name="register_link"
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
                placeholder="Link for registration"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Contact</label>
              <input 
                name="contact"
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
                placeholder="Event contact no"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Category</label>
              <input 
                name="category" 
                type="text"
                class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring focus:border-[#034833]"
              
              />
            </div>
          </div>
  
          {{-- Upload Image --}}
          <div class="w-full">
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Image <span class="text-xs text-gray-400">(Max Size: 750kb)</span></label>
            <label for="dropzone-file" id="dropzone" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition overflow-hidden">
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
  
          {{-- Submit Button --}}
          <button
            type="submit"
            class="px-6 py-2 bg-primary text-white rounded-md hover:bg-[#022d23] transition"
          >
            Save
          </button>
  
        </form>
      </div>
    </div>
  
    {{-- Preview Image Script --}}
    <script>
      function previewImage(event) {
        const reader = new FileReader();
        const image = document.getElementById('image-preview');
        const defaultContent = document.getElementById('dropzone-default');
  
        reader.onload = function(e) {
          image.src = e.target.result;
          image.classList.remove("hidden");
          defaultContent.classList.add("hidden");
        };
  
        if (event.target.files[0]) {
          reader.readAsDataURL(event.target.files[0]);
        }
      }
    </script>
  </x-layout>
  