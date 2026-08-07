<x-layout title="Pengabdian Masyarakat">
<div class="container px-6 mx-auto grid">
    <div class="flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700">
            Pengabdian Masyarakat
        </h2>
        <a href="{{ route('pengabdian.create') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#034833] rounded-lg hover:bg-[#023024] transition-colors">
            + Tambah Pengabdian
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full overflow-hidden rounded-lg shadow-xs bg-white">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Lokasi</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Prodi Terlibat</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($pengabdianMasyarakats as $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                @if ($item->gambar)
                                    <img src="{{ Str::startsWith($item->gambar, ['http://', 'https://']) ? $item->gambar : asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                        Tidak ada
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold">{{ $item->judul }}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 text-xs font-medium bg-[#034833]/10 text-[#034833] rounded-full">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->lokasi }}</td>
                            <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-3 text-sm">
                                @forelse ($item->departements as $departement)
                                    <span class="inline-block px-2 py-0.5 mb-1 mr-1 text-xs bg-gray-100 rounded">{{ $departement->name }}</span>
                                @empty
                                    <span class="text-gray-400 text-xs">-</span>
                                @endforelse
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($item->status === 'published')
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Published</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('pengabdian.edit', $item->id) }}"
                                        class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('pengabdian.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-xs font-medium text-white bg-red-500 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-400">
                                Belum ada data pengabdian masyarakat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>