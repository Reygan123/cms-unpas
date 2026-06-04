<header class="z-10 py-4 bg-white h-20">
    <div
      class="container flex items-center justify-between h-full px-6 mx-auto text-[#034833]"
    >
      <!-- Mobile hamburger -->
      <button
        class="p-1 mr-5 -ml-1 rounded-md md:hidden z-50 focus:outline-none focus:shadow-outline-purple "
        @click="toggleSideMenu"
        aria-label="Menu"
      >
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <!-- Search input -->
      <div class="flex justify-center flex-1 lg:mr-32">
        <div
          class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
        >
        </div>
      </div>
      <ul class="hidden md:flex items-center flex-shrink-0 space-x-6">
        <!-- Profile menu -->
        <li class="relative">
          <button
            class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
            @click="toggleButtonProfil"
            @keydown.escape="closeProfileMenu"
            aria-label="Account"
            aria-haspopup="true"
          >
          <div class="flex gap-2 items-center">
            <div class="flex flex-col items-end">
              <span class="text-xs font-bold">{{ auth()->user()->name }}</span>
              <small class="text-xs">{{ auth()->user()->email }}</small>
            </div>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" alt="Profile" class="w-10 h-10 rounded-full">
          </div>
          </button>
        </li>
      </ul>
    </div>
  </header>
