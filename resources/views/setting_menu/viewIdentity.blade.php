<x-layout>
    <div class="container mx-auto px-4 sm:px-6 mt-8">
        <h4 class="mb-4 text-lg font-semibold text-gray-600">
            {{ isset($identity) ? 'Update Identity' : 'Create Identity' }}
        </h4>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded-md bg-red-100 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="px-4 py-3 bg-white rounded-lg shadow-md">
            <form action="{{ isset($identity) ? route('identity.update', $identity->id) : route('identity.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @if (isset($identity))
                    @method('PUT')
                @endif

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Title</label>
                    <input name="title" type="text" value="{{ old('title', $identity->title ?? '') }}"
                        class="mt-1 w-full text-sm border-gray-300 border-2 p-2 rounded-md focus:border-[#034833] focus:outline-none" />
                </div>

                {{-- Meta --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Meta Description</label>
                    <textarea name="meta" class="w-full text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('meta', $identity->meta ?? '') }}</textarea>
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Address</label>
                    <textarea name="adress" class="w-full text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('adress', $identity->adress ?? '') }}</textarea>
                </div>

                {{-- Link Map --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Link Map</label>
                    <textarea name="link_map" class="w-full text-sm border-gray-300 border-2 p-2 rounded-md">{{ old('link_map', $identity->link_map ?? '') }}</textarea>
                </div>

                {{-- Grid: Phone & Email --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $identity->phone ?? '') }}"
                            class="mt-1 w-full h-10 border-2 border-gray-300 rounded-md shadow-sm text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $identity->email ?? '') }}"
                            class="mt-1 w-full h-10 border-2 border-gray-300 rounded-md shadow-sm text-sm" />
                    </div>
                </div>

                {{-- Grid: Sosmed --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach (['fb' => 'Facebook', 'ig' => 'Instagram', 'tiktok' => 'TikTok', 'yt' => 'YouTube'] as $field => $label)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            <input name="{{ $field }}" type="text"
                                value="{{ old($field, $identity->$field ?? '') }}"
                                class="mt-1 w-full h-10 border-2 border-gray-300 rounded-md text-sm" />
                        </div>
                    @endforeach
                </div>

                {{-- Service --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Time Service</label>
                    <input name="time_service" type="text"
                        value="{{ old('service', $identity->time_service ?? '') }}"
                        class="w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Day Service</label>
                    <input name="day_service" type="text" value="{{ old('service', $identity->day_service ?? '') }}"
                        class="w-full mt-1 text-sm border-gray-300 border-2 p-2 rounded-md" />
                </div>

                {{-- Upload Image --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ([1, 2] as $i)
                        <div>
                            <div>
                                <img id="preview-image{{ $i }}"
                                    src="{{ isset($identity->{'image' . $i}) ? asset('storage/' . $identity->{'image' . $i}) : '' }}"
                                    alt="Preview" class="w-full h-52 md:h-72 rounded-md shadow object-cover" />
                            </div>
                            <label for="dropzone-file{{ $i }}"
                                class="dropzone-label flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition mt-4">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16v-4m0 0l-3 3m3-3l3 3m0-6a4 4 0 014 4v1h2a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 012-2h2v-1a4 4 0 014-4z" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Drag and
                                            drop</span> or click to upload</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 750kb)</p>
                                </div>
                                <input id="dropzone-file{{ $i }}" type="file" class="hidden"
                                    name="image{{ $i }}" accept="image/*"
                                    onchange="previewImage(event, 'preview-image{{ $i }}')" />
                            </label>
                        </div>
                    @endforeach
                </div>

                {{-- Button --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-primary rounded-md hover:bg-gray-900 transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, targetId) {
            const reader = new FileReader();
            const image = document.getElementById(targetId);
            const file = event.target.files[0];
            if (file) {
                reader.onload = function(e) {
                    image.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-layout>
