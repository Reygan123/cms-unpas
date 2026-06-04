<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
      <div class="py-6">
        <h4 class="mb-4 text-lg font-semibold text-gray-600">Data & Value</h4>
  
        <form 
          action="{{ route('dataValue.update') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="px-6 py-4 bg-white rounded-lg shadow-md"
        >
          @method('PUT')
          @csrf
  
          {{-- DATA --}}
          <h5 class="text-md font-semibold text-gray-800 mb-2">Data </h5>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            @for ($i = 1; $i <= 4; $i++)
              <div>
                <label for="title{{ $i }}" class="block text-sm font-medium text-gray-700">Title Data {{ $i }}</label>
                <input type="text" class=" border-2 p-2 border-gray-300 rounded-md shadow-sm" name="title{{ $i }}" id="title{{ $i }}"
                  value="{{ old('title' . $i, $datavalue->{'title' . $i} ?? '') }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring focus:ring-opacity-50">
              </div>
            @endfor
          </div>
  
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            @for ($i = 1; $i <= 4; $i++)
              <div>
                <label for="data{{ $i }}" class="block text-sm font-medium text-gray-700">Data {{ $i }}</label>
                <input type="text" class=" border-2 p-2 border-gray-300 rounded-md shadow-sm" name="data{{ $i }}" id="data{{ $i }}"
                  value="{{ old('data' . $i, $datavalue->{'data' . $i} ?? '') }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring focus:ring-opacity-50">
              </div>
            @endfor
          </div>
  
          {{-- VALUES --}}
          <h5 class="text-md font-semibold text-gray-800 mb-2">Values</h5>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            @for ($i = 1; $i <= 3; $i++)
              <div>
                <label for="value{{ $i }}" class="block text-sm font-medium text-gray-700">Value {{ $i }}</label>
                <input type="text" class=" border-2 p-2 border-gray-300 rounded-md shadow-sm" name="value{{ $i }}" id="value{{ $i }}"
                  value="{{ old('value' . $i, $datavalue->{'value' . $i} ?? '') }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring focus:ring-opacity-50">
              </div>
            @endfor
          </div>
  
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @for ($i = 4; $i <= 6; $i++)
              <div>
                <label for="value{{ $i }}" class="block text-sm font-medium text-gray-700">Value {{ $i }}</label>
                <input type="text" class=" border-2 p-2 border-gray-300 rounded-md shadow-sm" name="value{{ $i }}" id="value{{ $i }}"
                  value="{{ old('value' . $i, $datavalue->{'value' . $i} ?? '') }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring focus:ring-opacity-50">
              </div>
            @endfor
          </div>
  
          <button
            type="submit"
            class="mt-6 px-5 py-2 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 transition"
          >
            Save
          </button>
  
        </form>
      </div>
    </div>
  </x-layout>
  