<x-layout title="Alumni Update Submissions">
    <div class="p-5">
        <div class="flex items-center justify-between">
            <div></div> <!-- Spacer since there is no Add button for submissions usually handled by alumni -->
            <form action="{{ route('alumni-update-submissions.index') }}" method="GET" class="mb-4 flex items-center gap-2 mt-4">
                <input type="text" name="search" placeholder="Cari Data" value="{{ request('search') }}"
                    class="py-2 px-3 text-xs rounded-full w-24 md:w-full" />
                    <div class="flex gap-1">
                        <button type="submit" class="py-2 px-3 text-xs rounded-full bg-[#5676ff] text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search w-3" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                        </button>
                    </div>
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
                            <th class="px-4 py-3">No HP</th>
                            <th class="px-4 py-3">Angkatan</th>
                            <th class="px-4 py-3">Tahun Lulus</th>
                            <th class="px-4 py-3">Profesi Terkini</th>
                            <th class="px-4 py-3">Perusahaan</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($alumniUpdateSubmissions as $submission)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->nama ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->email ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->no_hp ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->angkatan ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->tahun_lulus ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->profesi_terkini ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->perusahaan ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->alamat ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $submission->status == 'approved' ? 'text-green-700 bg-green-100' : 'text-yellow-700 bg-yellow-100' }}">
                                    {{ ucfirst($submission->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    @if ($submission->status !== 'approved')
                                    <form action="{{ route('alumni-update-submissions.approve', $submission->id) }}" method="POST" class="approve-form" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="button"
                                            data-id="{{ $submission->id }}"
                                            class="btn-approve flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Approve">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('alumni-update-submissions.delete', $submission->id) }}" method="POST" class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            data-id="{{ $submission->id }}"
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
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9"
              >
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

            const approveButtons = document.querySelectorAll(".btn-approve");
            approveButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const form = this.closest("form");
                    Swal.fire({
                        title: "Setujui data ini?",
                        text: "Data alumni akan diperbarui dengan informasi yang diajukan.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#16a34a",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, setujui!",
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