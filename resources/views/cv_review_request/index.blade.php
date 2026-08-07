<x-layout title="CV Review Requests">
    <div class="p-5">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-800">CV Review Requests</h1>
            <form action="{{ route('cv-review-requests.index') }}" method="GET" class="mb-4 flex items-center gap-2 mt-4">
                <select name="status" class="py-2 px-3 text-xs rounded-full border-gray-300 border focus:border-[#5676ff] focus:outline-none">
                    <option value="">Semua Status</option>
                    <option value="diajukan" {{ request('status') == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit" class="py-2 px-3 text-xs rounded-full bg-[#5676ff] text-white">Filter</button>
            </form>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 ">
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Departement</th>
                            <th class="px-4 py-3">Jenis Layanan</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($cvReviewRequests as $request)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $request->nama ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->email ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->departement->name ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $request->jenis_layanan ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 leading-tight rounded-full 
                                    {{ $request->status === 'selesai' ? 'bg-green-100 text-green-700' : ($request->status === 'diproses' ? 'bg-orange-100 text-orange-700' : 'bg-gray-100 text-gray-700') }}">
                                    {{ ucfirst($request->status ?? '') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a
                                        href="{{ route('cv-review-requests.show', $request->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form action="{{ route('cv-review-requests.destroy', $request->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            class="btn-delete flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
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
