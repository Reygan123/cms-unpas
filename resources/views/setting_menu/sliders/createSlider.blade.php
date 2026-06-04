<x-layout>
    <div class="container grid px-6 mx-auto mt-8 mb-12">
        <h4 class="mb-4 text-lg font-semibold text-gray-600">SLiders</h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" class="bg-white">
                @csrf

                <div class="flex flex-col lg:flex-row gap-6">

                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {{-- Kiri: Form --}}
                    <div class="w-full lg:w-2/3">
                        <input type="hidden" name="home" value="0">
                        <label class="inline-flex items-center mt-3 mb-4">
                            <input type="checkbox" name="home" value="1"
                                class="form-checkbox h-5 w-5 text-green-600">
                            <span class="ml-2 text-sm text-gray-700 font-semibold">Display on Home?</span>
                        </label>


                        {{-- Departement --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Departement</span>
                            <select name="id_departement"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                                <option value="">-- Pilih Departement --</option>
                                @foreach ($departements as $dept)
                                    <option value="{{ $dept->id }}">
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>


                        {{-- Title --}}
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-semibold">Title</span>
                            <input name="title" type="text"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        </label>

                        {{-- Description --}}
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-semibold">Description</span>
                            <textarea name="description" id="description" class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md"></textarea>
                        </label>

                        {{-- YouTube Link --}}
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-semibold">YouTube Link</span>
                            <input name="yt" type="text"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                        </label>

                        {{-- Status --}}
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 font-semibold">Status</span>
                            <select name="status"
                                class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                                <option value="active">Active</option>
                                <option value="nonactive">Nonactive</option>
                            </select>
                        </label>




                    </div>

                    {{-- Kanan: Upload Gambar --}}
                    <div class="w-full lg:w-1/3">

                        <!-- Desktop Slider -->
                        <p class="mt-4 text-sm font-medium text-gray-700">Gambar Desktop Slider (Max Size: 750kb)</p>

                        <label for="desktop-file"
                            class="relative flex flex-col items-center justify-center w-full h-44 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition mt-2">
                            <div id="desktop-default" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and drop</span> a
                                    file here or click</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
                            </div>
                            <img id="preview-desktop" src="#" alt="Preview Gambar"
                                class="absolute inset-0 w-full h-full object-cover rounded-lg hidden z-10" />
                            <input id="desktop-file" type="file" class="hidden" name="image1" accept="image/*"
                                onchange="previewImage(event, 'preview-desktop', 'desktop-default')" />
                        </label>

                        <!-- Mobile Slider -->
                        <p class="mt-4 text-sm font-medium text-gray-700">Gambar Mobile Slider (Max Size: 750kb)</p>

                        <label for="mobile-file"
                            class="relative flex flex-col items-center justify-center w-full h-44 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition mt-2">
                            <div id="mobile-default" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and drop</span> a
                                    file here or click</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
                            </div>
                            <img id="preview-mobile" src="#" alt="Preview Gambar"
                                class="absolute inset-0 w-full h-full object-cover rounded-lg hidden z-10" />
                            <input id="mobile-file" type="file" class="hidden" name="image2" accept="image/*"
                                onchange="previewImage(event, 'preview-mobile', 'mobile-default')" />
                        </label>

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
        function previewImage(event, previewId, defaultId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            const defaultContent = document.getElementById(defaultId);

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
