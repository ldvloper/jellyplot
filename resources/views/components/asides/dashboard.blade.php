<div>
    <aside id="sidebar" class="absolute hidden z-20 h-full top-0 left-0 pt-48 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
        <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2">
                <div class="space-y-1">
                    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-primary-color" -->
                    <router-link to="/" class="text-gray-900 group hover:bg-primary-color hover:text-white flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">
                        <svg class="text-primary-color group-hover:text-white mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{__('Dashboard')}}
                    </router-link>

                    <router-link to="/scheduler" class="text-gray-600 hover:text-gray-900 hover:bg-primary-color group hover:text-white flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                        <!-- Heroicon name: outline/view-list -->
                        <svg class="text-primary-color group-hover:text-white mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        {{__('Planning')}}
                    </router-link>
                </div>
                <div class="mt-8">
                <!--Teams
                  <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="mobile-teams-headline">Teams</h3>
                  <div class="mt-1 space-y-1" role="group" aria-labelledby="mobile-teams-headline">
                      <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-primary-color">
                          <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                          <span class="truncate"> Engineering </span>
                      </a>

                      <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-primary-color">
                          <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                          <span class="truncate"> Human Resources </span>
                      </a>

                      <a href="#" class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-primary-color">
                          <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                          <span class="truncate"> Customer Success </span>
                      </a>
                  </div>
                  -->
                </div>
            </nav>
        </div>
    </aside>
</div>
