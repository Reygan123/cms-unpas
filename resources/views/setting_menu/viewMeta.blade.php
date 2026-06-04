<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
      <div class="h-screen">
    <h4 class="mb-4 text-lg font-semibold text-gray-600">
        Meta
      </h4>

      <form 
      action="{{ route('meta.update') }} " 
      method="POST" 
      enctype="multipart/form-data"
      class="px-4 py-3 bg-white rounded-lg shadow-md"
    >
    @method('PUT')
          @csrf
    <label class="block text-sm mt-3">
        <textarea
          name="meta"
          id="meta"
          class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md"
        > {{ old('meta', $analytic->meta ?? '') }}</textarea>
      </label>
   

    <button
    type="submit"
    class="block ml-5 w-auto px-4 py-2 mt-6 text-sm font-medium text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-[#034833] hover:bg-gray-900 focus:outline-none focus:shadow-outline-purple"
  >
    Save
  </button>

</form>
</div>
</div>
</x-layout>