<x-layout title="Pengaturan Pop-up Banner">
  <div class="container grid px-6 mx-auto mt-8">
    <div class="flex items-center justify-between mb-4">
      <h4 class="text-xl font-semibold text-gray-700">
        Pengaturan Pop-up Banner / Promo
      </h4>
    </div>

    @if (session('success'))
      <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 text-sm font-medium">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="px-6 py-6 mb-8 bg-white rounded-xl shadow-xs">
      <form
        action="{{ route('popupBanner.save') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
      >
        @csrf

        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
          <div>
            <span class="block text-sm font-semibold text-gray-800">Aktifkan Pop-up Banner</span>
            <span class="block text-xs text-gray-500">Jika diaktifkan, banner ini akan muncul otomatis saat pengunjung pertama kali membuka web.</span>
          </div>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" name="is_active" value="1" class="sr-only peer"
              {{ old('is_active', $popupBanner->is_active ?? true) ? 'checked' : '' }}>
            <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#034833]"></div>
          </label>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Judul / Keterangan Banner</label>
          <input
            type="text"
            name="title"
            value="{{ old('title', $popupBanner->title ?? '') }}"
            placeholder="mis. Promo Pendaftaran Mahasiswa Baru Gelombang 2"
            required
            class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Link Tujuan / URL Promo (Opsional)</label>
          <input
            type="url"
            name="link"
            value="{{ old('link', $popupBanner->link ?? '') }}"
            placeholder="https://pmb.unpas.ac.id/ atau https://..."
            class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20"
          />
          <p class="mt-1 text-xs text-gray-500">Jika diisi, pengunjung yang mengklik banner akan diarahkan ke link ini.</p>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Banner</label>
          @if(isset($popupBanner) && $popupBanner->image)
            <div class="mb-3">
              <p class="text-xs text-gray-500 mb-1 font-medium">Banner yang aktif saat ini:</p>
              <img
                src="{{ Str::startsWith($popupBanner->image, ['http://', 'https://']) ? $popupBanner->image : asset('storage/' . $popupBanner->image) }}"
                alt="{{ $popupBanner->title }}"
                class="max-w-xs max-h-64 object-contain rounded-lg border p-1 bg-gray-50 shadow-sm"
              />
            </div>
          @endif

          <div class="relative w-full border-2 border-dashed rounded-lg p-6 flex flex-col items-center justify-center bg-gray-50 hover:bg-gray-100 transition-colors">
            <input
              type="file"
              name="image"
              id="banner-image"
              accept="image/*"
              class="absolute inset-0 opacity-0 cursor-pointer z-10"
              onchange="previewBanner(event)"
              {{ isset($popupBanner) && $popupBanner->image ? '' : 'required' }}
            />
            <div id="preview-container" class="hidden flex-col items-center mb-2">
              <img id="image-preview" src="#" alt="Preview" class="max-h-48 rounded-lg object-contain mb-2" />
              <span class="text-xs text-green-600 font-medium">Gambar baru terpilih</span>
            </div>
            <div id="upload-placeholder" class="text-center">
              <svg class="mx-auto h-10 w-10 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <p class="text-sm text-gray-600 font-medium">Klik untuk upload gambar banner</p>
              <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP maks 3MB (Format vertikal/persegi 600x800 px disarankan)</p>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end pt-4 border-t">
          <button
            type="submit"
            class="px-5 py-2.5 text-sm font-medium text-white bg-[#034833] rounded-lg hover:bg-[#023024] transition-colors shadow-sm"
          >
            Simpan Pengaturan
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function previewBanner(event) {
      const input = event.target;
      const preview = document.getElementById('image-preview');
      const previewContainer = document.getElementById('preview-container');
      const placeholder = document.getElementById('upload-placeholder');

      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          previewContainer.classList.remove('hidden');
          previewContainer.classList.add('flex');
          placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</x-layout>
