<x-layout title="Tambah Pengabdian Masyarakat">
<div class="container px-6 mx-auto grid" x-data="pengabdianForm()">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Tambah Pengabdian Masyarakat
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

    <form action="{{ route('pengabdian.store') }}" method="POST" enctype="multipart/form-data"
        class="p-6 bg-white rounded-lg shadow-xs space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" required list="kategori-list"
                    placeholder="mis. Pemberdayaan Ekonomi"
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
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" required
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                placeholder="mis. Desa Beber, Kecamatan Beber, Kabupaten Cirebon"
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="5" required
                class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (Upload)</label>
                <input type="file" name="gambar_upload" accept="image/*"
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                <p class="mt-1 text-xs text-gray-400">Isi salah satu: upload file ATAU URL gambar eksternal.</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (URL eksternal)</label>
                <input type="url" name="gambar_url" value="{{ old('gambar_url') }}"
                    placeholder="https://..."
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
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
                @foreach ($departements as $departement)
                    <label class="inline-flex items-center gap-2 text-sm">
                        <input type="checkbox" name="departement_ids[]" value="{{ $departement->id }}"
                            {{ in_array($departement->id, old('departement_ids', [])) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-[#034833] focus:ring-[#034833]">
                        {{ $departement->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sumber (URL berita/referensi)</label>
                <input type="url" name="sumber" value="{{ old('sumber') }}" placeholder="https://..."
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required
                    class="block w-full text-sm border-gray-300 rounded-lg focus:border-[#034833] focus:ring focus:ring-[#034833]/20">
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
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
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    function pengabdianForm() {
        return {
            dosenList: [''],
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