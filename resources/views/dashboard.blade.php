
<x-layout>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      
      <div class="flex flex-col flex-1 w-full h-screen">
       
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700"
            >
              Dashboard
            </h2>
            
          
          
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs "
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full "
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 2L2 6v2h16V6l-8-4zm7 6H3v10h4v-4h6v4h4V8z" />
                </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600"
                  >
                    Total Departements
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700"
                  >
                    {{ $totalDepartements }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs "
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M4 2a1 1 0 00-1 1v15h2v-3h10v3h2V3a1 1 0 00-1-1H4zm2 12v-2h2v2H6zm0-4V8h2v2H6zm0-4V4h2v2H6zm4 8v-2h2v2h-2zm0-4V8h2v2h-2zm0-4V4h2v2h-2z" />
                </svg>
                
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600"
                  >
                    Total Facilities
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700"
                  >
                   {{ $totalFacilities }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs "
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 2a4 4 0 110 8 4 4 0 010-8zm0 10c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4z" />
                </svg>
                
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600"
                  >
                    Students Activities
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700"
                  >
                    {{ $totalActivities }}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs "
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full"
                >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 11l3 3 4-4m-7 1l-3 3-4-4m7-4v3m0-3a3 3 0 11-6 0 3 3 0 016 0zm6 0a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                
                
                
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600"
                  >
                    Partner
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700"
                  >
                    {{ $totalPartners }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </x-layout>
  {{-- </body>
</html> --}}
