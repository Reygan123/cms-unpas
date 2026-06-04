<x-layout>
    <div class="container grid px-6 mx-auto mt-8">
        <h4 class="mb-4 text-lg font-semibold text-gray-600">
            Our Team
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('ourteam.store') }}" method="POST" enctype="multipart/form-data"
                class="px-4 py-3 bg-white rounded-lg shadow-md">
                @csrf


                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <label class="inline-flex items-center mt-3 mb-3">
                    <input type="hidden" name="home" value="0">
                    <input type="checkbox" name="home" value="1" class="form-checkbox h-5 w-5 text-green-600">
                    <span class="ml-2 text-sm text-gray-700 font-semibold">Display on Home?</span>
                </label>

                {{-- Departement --}}
                <label class="block text-sm">
                    <span class="text-gray-700 font-semibold">Departement</span>
                    <select name="id_departement"
                        class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departements as $dept)
                            <option value="{{ $dept->id }}">
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                {{-- Title --}}
                <label class="block text-sm mt-3">
                    <span class="text-gray-700 font-semibold">Nama</span>
                    <input name="name" type="text"
                        class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                </label>
                <label class="block text-sm mt-3">
                    <span class="text-gray-700 font-semibold">Title</span>
                    <input name="title" type="text"
                        class="block w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                </label>

                {{-- Grid: Phone & Email --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md shadow-sm text-sm" />
                    </div>
                </div>

                {{-- Grid: Sosmed --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Facebook</label>
                        <input name="fb" type="text"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input name="ig" type="text"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">TikTok</label>
                        <input name="tiktok" type="text"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md text-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">YouTube</label>
                        <input name="yt" type="text"
                            class="mt-3 h-10 block w-full border-2 border-gray-300 rounded-md text-sm" />
                    </div>
                </div>




                <label class="block text-sm font-medium text-gray-700 mb-2 mt-3">
                    Gambar <span class="text-xs text-gray-400">(Max Size: 750kb)</span>
                </label>

                <div class="w-2/3">
                    <label for="dropzone-file" id="dropzone"
                        class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition overflow-hidden">
                        {{-- Default Content --}}
                        <div id="dropzone-default"
                            class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and drop</span> a
                                file here or click</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
                        </div>

                        {{-- Image Preview (hidden initially) --}}
                        <img id="image-preview" src="#" alt="Preview Gambar"
                            class="absolute inset-0 object-cover w-full h-full hidden" />

                        <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*"
                            onchange="previewImage(event)" />
                    </label>
                </div>



                {{-- Submit --}}
                <button type="submit"
                    class="block w-auto px-4 py-2 mt-6 text-sm font-medium text-white  rounded-lg hover:bg-gray-900  bg-primary transition-colors">
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
