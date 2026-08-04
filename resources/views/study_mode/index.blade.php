<x-layout title="Study Modes">
    <div class="p-5">
        <div class="mb-5 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-gray-700">Program Perkuliahan (Study Mode)</h1>
            <a href="{{ route('study-modes.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#5676ff] border border-transparent rounded-lg active:bg-[#5676ff] hover:bg-[#4666ef] focus:outline-none focus:shadow-outline-purple">
                Tambah Program
            </a>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Nama Program</th>
                            <th class="px-4 py-3">Ringkasan</th>
                            <th class="px-4 py-3">Durasi</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($studyModes as $mode)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm font-semibold">
                                {{ $mode->nama ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ Str::limit($mode->ringkasan, 80) }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $mode->durasi ?? '-' }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('study-modes.edit', $mode->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
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
</x-layout>
