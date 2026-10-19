<x-layout title="Edit Pengabdian Masyarakat">
<div class="container px-6 mx-auto grid" x-data="pengabdianForm()">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Edit Pengabdian Masyarakat
    </h2>

    @if ($errors->any())
        <div class="mb-4 px-4 py-3 text-sm text-red-700 bg-red-100 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengabdian.update', $pengabdian->id) }}" method="POST" enctype="multipart/form-data"
        class="p-6 bg-white rounded-lg shadow-xs space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $pengabdian->judul) }}" required
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $pengabdian->kategori) }}" required
                    list="kategori-list"
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                <datalist id="kategori-list">
                    <option value="Edukasi">
                    <option value="Pemberdayaan Ekonomi">
                    <option value="Lingkungan">
                    <option value="Kesehatan">
                </datalist>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($pengabdian->tanggal)->format('Y-m-d')) }}" required
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $pengabdian->lokasi) }}" required
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="5" required
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">{{ old('deskripsi', $pengabdian->deskripsi) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                @if ($pengabdian->gambar)
                    <img src="{{ Str::startsWith($pengabdian->gambar, ['http://', 'https://']) ? $pengabdian->gambar : asset('storage/' . $pengabdian->gambar) }}"
                        alt="{{ $pengabdian->judul }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                @else
                    <p class="text-sm text-gray-400 mb-2">Belum ada gambar.</p>
                @endif
                <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Upload)</label>
                <input type="file" name="gambar_upload" accept="image/*"
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                <p class="mt-1 text-xs text-gray-400">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Atau Ganti dengan URL Eksternal</label>
                <input type="url" name="gambar_url" value=""
                    placeholder="https://..."
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
            <div class="md:col-span-2">
                <span class="block text-sm font-semibold text-gray-800">Media Video (Opsional)</span>
                <span class="block text-xs text-gray-500">Pilih salah satu: Upload file video (.mp4/.webm) untuk autoplay, ATAU masukkan Link Instagram Reels/Post.</span>
            </div>

            @if ($pengabdian->video)
                <div class="md:col-span-2 p-3 bg-white rounded-lg border border-gray-200">
                    <p class="text-xs font-semibold text-gray-700 mb-2">Video Saat Ini:</p>
                    @if (Str::startsWith($pengabdian->video, ['http://', 'https://']))
                        <div class="flex items-center gap-2 text-sm text-blue-600">
                            <span class="font-medium text-gray-600">Link Video / IG:</span>
                            <a href="{{ $pengabdian->video }}" target="_blank" class="underline truncate max-w-md">{{ $pengabdian->video }}</a>
                        </div>
                    @else
                        <video src="{{ asset('storage/' . $pengabdian->video) }}" controls class="w-64 max-h-40 rounded-lg bg-black"></video>
                    @endif
                    <label class="inline-flex items-center gap-2 mt-2 text-sm text-red-600 cursor-pointer">
                        <input type="checkbox" name="remove_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                        Hapus video ini
                    </label>
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ganti File Video (Upload)</label>
                <input type="file" name="video_upload" accept="video/mp4,video/webm,video/ogg,video/quicktime"
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                <p class="mt-1 text-xs text-gray-400">Format: MP4, WebM (Maks. 50MB). Kosongkan jika tidak ingin mengubah video.</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Atau Ganti Link Instagram / URL</label>
                <input type="text" name="video_url" value="{{ old('video_url', Str::startsWith($pengabdian->video, ['http://', 'https://']) ? $pengabdian->video : '') }}"
                    placeholder="https://www.instagram.com/reel/... atau https://..."
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                <p class="mt-1 text-xs text-gray-400">Link Instagram Reels/Post atau link video online.</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Dosen Penanggung Jawab</label>
            <div class="space-y-2">
                <template x-for="(dosen, index) in dosenList" :key="index">
                    <div class="flex items-center gap-2">
                        <input type="text" :name="'dosen_penanggung_jawab[' + index + ']'" x-model="dosenList[index]"
                            placeholder="Nama lengkap beserta gelar"
                            class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                        <button type="button" @click="removeDosen(index)"
                            class="shrink-0 px-3 py-2 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100">
                            Hapus
                        </button>
                    </div>
                </template>
            </div>
            <button type="button" @click="addDosen"
                class="mt-2 px-3 py-1.5 text-xs font-medium text-[#034833] bg-[#034833]/10 rounded-lg hover:bg-[#034833]/20">
                + Tambah Dosen
            </button>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Prodi Terlibat</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @php
                    $selectedDepartementIds = old('departement_ids', $pengabdian->departements->pluck('id')->toArray());
                @endphp
                @foreach ($departements as $departement)
                    <label class="inline-flex items-center gap-2 text-sm">
                        <input type="checkbox" name="departement_ids[]" value="{{ $departement->id }}"
                            {{ in_array($departement->id, $selectedDepartementIds) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-[#034833] focus:ring-[#034833]">
                        {{ $departement->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sumber (URL berita/referensi)</label>
                <input type="url" name="sumber" value="{{ old('sumber', $pengabdian->sumber) }}"
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                    <option value="published" {{ old('status', $pengabdian->status) === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status', $pengabdian->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a href="{{ route('pengabdian.index') }}"
                class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-[#034833] rounded-lg hover:bg-[#023024]">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function pengabdianForm() {
        return {
            dosenList: @json(old('dosen_penanggung_jawab', $pengabdian->dosen_penanggung_jawab ?: [''])),
            addDosen() {
                this.dosenList.push('');
            },
            removeDosen(index) {
                if (this.dosenList.length > 1) {
                    this.dosenList.splice(index, 1);
                } else {
                    this.dosenList = [''];
                }
            },
        };
    }
</script>
</x-layout>