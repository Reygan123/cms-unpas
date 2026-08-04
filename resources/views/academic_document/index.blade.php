<x-layout title="Academic Documents">
    <div class="p-3 md:p-5">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <a href="{{ route('academic-documents.create') }}" class="py-2 px-3 bg-[#5676ff] rounded-full flex items-center justify-center hover:bg-gray-900 text-white gap-3 text-xs w-full md:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-folder-plus w-4" viewBox="0 0 16 16">
                    <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                    <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <span>Add Document</span>
            </a>
            <form action="{{ route('academic-documents.index') }}" method="GET" class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                <input type="text" name="search" placeholder="Cari Judul" value="{{ request('search') }}"
                    class="py-2 px-3 text-xs rounded-full w-full sm:w-40 border border-gray-200" />
                <select name="status" onchange="this.form.submit()" class="py-2 px-3 text-xs rounded-full border border-gray-200 w-full sm:w-auto">
                    <option value="">Semua Status</option>
                    <option value="berlaku" {{ request('status') == 'berlaku' ? 'selected' : '' }}>Berlaku</option>
                    <option value="direvisi" {{ request('status') == 'direvisi' ? 'selected' : '' }}>Direvisi</option>
                    <option value="dicabut" {{ request('status') == 'dicabut' ? 'selected' : '' }}>Dicabut</option>
                    <option value="arsip" {{ request('status') == 'arsip' ? 'selected' : '' }}>Arsip</option>
                </select>
                <button type="submit" class="py-2 px-3 text-xs rounded-full bg-[#5676ff] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search w-3" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>
        </div>

        <div class="flex flex-wrap gap-2 mt-4">
            <a href="{{ route('academic-documents.index', array_merge(request()->except('kategori'), [])) }}"
                class="px-4 py-2 text-xs rounded-full {{ request('kategori') ? 'bg-gray-100 text-gray-600' : 'bg-[#5676ff] text-white' }}">Semua</a>
            <a href="{{ route('academic-documents.index', array_merge(request()->except('kategori'), ['kategori' => 'buku_panduan'])) }}"
                class="px-4 py-2 text-xs rounded-full {{ request('kategori') == 'buku_panduan' ? 'bg-[#5676ff] text-white' : 'bg-gray-100 text-gray-600' }}">Buku Panduan</a>
            <a href="{{ route('academic-documents.index', array_merge(request()->except('kategori'), ['kategori' => 'peraturan'])) }}"
                class="px-4 py-2 text-xs rounded-full {{ request('kategori') == 'peraturan' ? 'bg-[#5676ff] text-white' : 'bg-gray-100 text-gray-600' }}">Peraturan</a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Prodi</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggal Terbit</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse ($documents as $document)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $document->judul }}</td>
                            <td class="px-4 py-3 text-sm capitalize">{{ str_replace('_', ' ', $document->kategori) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $document->departement->name ?? 'Fakultas' }}</td>
                            <td class="px-4 py-3 text-sm capitalize">{{ $document->status }}</td>
                            <td class="px-4 py-3 text-sm">{{ $document->tanggal_terbit?->format('d M Y') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    @if ($document->file)
                                    <a href="{{ asset('storage/' . $document->file) }}" target="_blank"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="View">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    @endif
                                    <a href="{{ route('academic-documents.edit', $document->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('academic-documents.destroy', $document->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-id="{{ $document->id }}"
                                            class="btn-delete flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-sm text-center text-gray-400">Belum ada dokumen.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="py-5 px-4">
                {{ $documents->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll(".btn-delete");
            deleteButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const form = this.closest("form");
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Dokumen akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700',
                            cancelButton: 'bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-layout>