<x-layout title="Tuition Fee">
    <div class="p-5">
        <div class="flex items-center justify-between">
            <a href="{{ route('tuition-fees.create') }}" class="py-2 px-3 bg-[#5676ff] rounded-full flex items-center hover:bg-gray-900 text-white gap-3 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-folder-plus w-4" viewBox="0 0 16 16">
                    <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                    <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <span>Add Tuition Fee</span>
            </a>
            <form action="{{ route('tuition-fees.index') }}" method="GET" class="mb-4 flex items-center gap-2 mt-4">
                <select name="jenjang" class="py-2 px-3 text-xs rounded-full border-gray-300">
                    <option value="">Semua Jenjang</option>
                    <option value="S1" {{ request('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                    <option value="S2" {{ request('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                </select>
                <select name="jenis_program" class="py-2 px-3 text-xs rounded-full border-gray-300">
                    <option value="">Semua Program</option>
                    <option value="reguler" {{ request('jenis_program') == 'reguler' ? 'selected' : '' }}>Reguler</option>
                    <option value="hybrid" {{ request('jenis_program') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="pjj" {{ request('jenis_program') == 'pjj' ? 'selected' : '' }}>PJJ</option>
                    <option value="fast_track" {{ request('jenis_program') == 'fast_track' ? 'selected' : '' }}>Fast Track</option>
                </select>
                <button type="submit" class="py-2 px-3 text-xs rounded-full bg-[#5676ff] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search w-3" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Tahun Akademik</th>
                            <th class="px-4 py-3">Departement</th>
                            <th class="px-4 py-3">Jenjang</th>
                            <th class="px-4 py-3">Jenis Program</th>
                            <th class="px-4 py-3">Jenis Biaya</th>
                            <th class="px-4 py-3">Nominal</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($tuitionFees as $fee)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $fee->tahun_akademik ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $fee->departement->name ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $fee->jenjang ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ ucfirst($fee->jenis_program) ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $fee->jenis_biaya ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                Rp {{ number_format($fee->nominal, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a
                                        href="{{ route('tuition-fees.edit', $fee->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('tuition-fees.destroy', $fee->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            class="btn-delete flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9"></div>
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
                        text: "Data akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
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
