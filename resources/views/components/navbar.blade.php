<div class="flex items-center flex-shrink-0 px-6 text-gray-900 absolute gap-3 z-30 h-[74px] ml-14 md:ml-0">
    <div>
        <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo UNPAS" class="md:h-[50px] mt-2 mx-auto mb-2 h-10" />
    </div>
    <div class="flex flex-col">
        <p class="md:text-xl font-bold text-lg">Universitas Pasundan</p>
        <small class="font-semibold "><i>Real Choice for Every Generations</i></small>
    </div>
</div>

<aside class="hidden w-64 overflow-y-auto md:block flex-shrink-0 bg-white">
    <div class="py-4 text-gray-500 mt-10">
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class=" inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 p-2"
                    href="/dashboard">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesService" @click="isPagesServiceOpen = !isPagesServiceOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesServiceOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesServiceOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 7.5A1.5 1.5 0 014.5 6h15a1.5 1.5 0 011.5 1.5V9h-18V7.5z" />
                            <path d="M21 9v9a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 18V9" />
                            <path d="M9 13.5h6" />
                        </svg>


                        </svg>
                        <span class="ml-4">Service</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesServiceOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('faculty.index') }}">Faculties</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('departement.index') }}">
                                Departments
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            {{-- <a class="w-full"
                            href="pages/forgot-password.html">
                            Registration
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  > --}}
                            <a class="w-full" href="{{ route('unggulan.index') }}">USP</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('prospek.index') }}">Prospek</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('kurikulum.index') }}">Kurikulum</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('fasilitas.index') }}">Facilities</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('achievement.index') }}">Achievement</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('organization.index') }}">Student Activities</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('testimoni.index') }}">Testimonies</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('portofolio.index') }}">Inovasi</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('suport.index') }}">Supports</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('faq.index') }}">FAQs</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('jurnal.index') }}">Jurnals</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesBlog" @click="isPagesBlogOpen = !isPagesBlogOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesBlogOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesBlogOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M7 8h10M7 12h6m-6 4h10" />
                            <path d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                        </svg>

                        <span class="ml-4">Blog & Agenda</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesBlogOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('posts.index') }}">Post</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="/view_agenda">
                                Agenda
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesProfil" @click="isPagesProfilOpen = !isPagesProfilOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesProfilOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesProfilOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            <path d="M4.5 20.25a8.25 8.25 0 0115 0" />
                        </svg>

                        <span class="ml-4">Profil</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesProfilOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">

                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 \"
                  >
                    <a class="w-full"
                            href="{{ route('ourteam.index') }}">
                            Our Teams
                            </a>
                        </li>
                        {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full"
                            href="{{ route('dataValue.index') }}">
                            Data
                            </a>
                        </li> --}}
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('legalDocument.index') }}">Legals Document</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('partner.index') }}">Partners</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('timeline.index') }}">Timeline</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black "
                    @click="togglePagesSetting" @click="isPagesSettingOpen = !isPagesSettingOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesSettingOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesSettingOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.542-.94 3.41.928 2.47 2.47a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.542-.928 3.41-2.47 2.47a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.542.94-3.41-.928-2.47-2.47a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.542.928-3.41 2.47-2.47.996.608 2.296.07 2.572-1.065z" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-4">Setting</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesSettingOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('identity.index') }}">Identity</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            {{-- <a class="w-full"
                            href="pages/create-account.html">
                            Header
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  > --}}
                            <a class="w-full" href="{{ route('sideBanner.index') }}">
                                Side Banner
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('slider.index') }}">Slider</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('meta.index') }}">Meta Pixel</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('google.index') }}">Google Analytics</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('chat.index') }}">Welcome Chat</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('users.index') }}">User</a>
                        </li>
                    </ul>
                </template>
            </li>

            <li class="relative px-6 py-3">
                <div class="bg-gray-100 p-3 rounded-2xl text-xs flex flex-col items-center justify-center gap-3">
                    <img src="{{ asset('assets/icons/out.svg') }}" alt="logout" class="w-28">
                    <span class="font-bold">Apa kamu ingin keluar?</span>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="logout-btn"
                            class="w-full px-4 py-2 text-white hover:bg-red-700 bg-red-500 rounded-md">
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

<aside class="fixed inset-y-0 z-30 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 bg-[#034833] rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-black transition-colors duration-150 hover:text-gray-800 p-2"
                    href="/dashboard">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesService" @click="isPagesServiceOpen = !isPagesServiceOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesServiceOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesServiceOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 7.5A1.5 1.5 0 014.5 6h15a1.5 1.5 0 011.5 1.5V9h-18V7.5z" />
                            <path d="M21 9v9a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 18V9" />
                            <path d="M9 13.5h6" />
                        </svg>
                        </svg>
                        <span class="ml-4">Service</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesServiceOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('faculty.index') }}">Faculties</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('departement.index') }}">
                                Departments
                            </a>
                        </li>
                        {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  >
                    <a class="w-full"
                            href="{{ route('register.index') }}">
                            Registration
                            </a>
                        </li> --}}
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('unggulan.index') }}">USP</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('prospek.index') }}">Prospek</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('kurikulum.index') }}">Kurikulum</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('fasilitas.index') }}">Facilities</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('achievement.index') }}">Achievement</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('organization.index') }}">Student Activities</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('testimoni.index') }}">Testimonies</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('portofolio.index') }}">Inovasi</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('suport.index') }}">Supports</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('faq.index') }}">FAQs</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('jurnal.index') }}">Jurnals</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesBlog" @click="isPagesBlogOpen = !isPagesBlogOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesBlogOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesBlogOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M7 8h10M7 12h6m-6 4h10" />
                            <path d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                        </svg>
                        <span class="ml-4">Blog & Agenda</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesBlogOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('posts.index') }}">Post</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('agenda.index') }}">
                                Agenda
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black"
                    @click="togglePagesProfil" @click="isPagesProfilOpen = !isPagesProfilOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesProfilOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesProfilOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            <path d="M4.5 20.25a8.25 8.25 0 0115 0" />
                        </svg>

                        <span class="ml-4">Profil</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesProfilOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  >
                    <a class="w-full"
                            href="pages/login.html">About Us</a>
                        </li> --}}
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('ourteam.index') }}">
                                Our Teams
                            </a>
                        </li>
                       
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  >
                    <a class="w-full"
                            href="{{ route('legalDocument.index') }}">Legals Document</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('partner.index') }}">Partners</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('timeline.index') }}">Timeline</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 text-black "
                    @click="togglePagesSetting" @click="isPagesSettingOpen = !isPagesSettingOpen"
                    :class="{
                        'bg-[#034833] rounded-lg p-2 text-white': isPagesSettingOpen,
                        'hover:bg-gray-200 rounded-lg p-2': !isPagesSettingOpen
                    }"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.542-.94 3.41.928 2.47 2.47a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.542-.928 3.41-2.47 2.47a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.542.94-3.41-.928-2.47-2.47a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.542.928-3.41 2.47-2.47.996.608 2.296.07 2.572-1.065z" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-4">Setting</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesSettingOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-black rounded-md shadow-inner bg-gray-100  "
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('identity.index') }}">Identity</a>
                        </li>
                        {{-- <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800"
                  >
                    <a class="w-full"
                            href="{{ route('fasilitas.index') }}">
                            Header
                            </a>
                        </li> --}}
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('sideBanner.index') }}">
                                Side Banner
                            </a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('slider.index') }}">Slider</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('meta.index') }}">Meta Pixel</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('google.index') }}">Google Analytics</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="{{ route('chat.index') }}">Welcome Chat</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                            <a class="w-full" href="pages/blank.html">User</a>
                        </li>
                    </ul>
                </template>
            </li>

            <li class="relative px-6 py-3">
                <div class="bg-gray-100 p-3 rounded-2xl text-xs flex flex-col items-center justify-center gap-3">
                    <img src="{{ asset('assets/icons/out.svg') }}" alt="logout" class="w-28">
                    <span class="font-bold">Apa kamu ingin keluar?</span>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="logout-btn"
                            class="w-full px-4 py-2 text-white hover:bg-red-700 bg-red-500 rounded-md">
                            Logout
                        </button>
                    </form>
                </div>
            </li>

        </ul>

    </div>
</aside>

<script>
    const logoutForm = document.getElementById('logout-form');
    const logoutBtn = document.getElementById('logout-btn');

    logoutBtn.addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin ingin logout?',
            text: 'Kamu akan keluar dari sistem.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded mr-2',
                cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded',
            },
            buttonsStyling: false, // <- wajib untuk pakai customClass
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>