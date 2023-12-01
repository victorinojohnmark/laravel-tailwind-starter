<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class=" navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
              <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                  <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <x-heroicon-o-bars-3 class="h-6"/>
                    <span class="sr-only">Toggle sidebar</span>
                  </button>
                  <a href="#" class="flex items-center justify-between mr-4">
                    <x-heroicon-o-globe-asia-australia class="mr-3 h-8 text-green-700" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                  </a>
                  <form action="#" method="GET" class="hidden md:block md:pl-2">
                    <label for="topbar-search" class="sr-only">Search</label>
                    <div class="relative md:w-64 lg:w-96">
                      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <x-heroicon-s-magnifying-glass class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                      </div>
                      <input type="text" name="email" id="topbar-search" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search"/>
                    </div>
                  </form>
                </div>
                <div class="flex items-center lg:order-2">
                  <button type="button" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation"
                    class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">Toggle search</span>
                    <x-heroicon-s-magnifying-glass class="w-6 h-6" />
                  </button>
                  <!-- Notifications -->
                  <button type="button" data-dropdown-toggle="notification-dropdown"
                    class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <x-heroicon-s-bell class="w-6 h-6" />
                  </button>

                  <!-- Dropdown menu -->
                  <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 md:rounded-xl" id="notification-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                      Notifications
                    </div>
                    <div>
                      <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="flex-shrink-0">
                          <img class="w-11 h-11 rounded-full" src="/images/user.png" alt="Bonnie Green avatar"/>
                        </div>
                        <div class="pl-3 w-full">
                          <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from
                            <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"
                          </div>
                          <div class="text-xs font-medium text-primary-600 dark:text-primary-500">a few moments ago</div>
                        </div>
                      </a>

                      <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="flex-shrink-0">
                          <img class="w-11 h-11 rounded-full" src="/images/user.png" alt="Bonnie Green avatar"/>
                        </div>
                        <div class="pl-3 w-full">
                          <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from
                            <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"
                          </div>
                          <div class="text-xs font-medium text-primary-600 dark:text-primary-500">a few moments ago</div>
                        </div>
                      </a>

                      <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="flex-shrink-0">
                          <img class="w-11 h-11 rounded-full" src="/images/user.png" alt="Bonnie Green avatar"/>
                        </div>
                        <div class="pl-3 w-full">
                          <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from
                            <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"
                          </div>
                          <div class="text-xs font-medium text-primary-600 dark:text-primary-500">a few moments ago</div>
                        </div>
                      </a>
                      
                    </div>
                    <a href="#" class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
                      <div class="inline-flex items-center">
                        <x-heroicon-s-eye class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" />View all
                      </div>
                    </a>
                  </div>

                  <!-- Apps -->
                  <button type="button" data-dropdown-toggle="apps-dropdown"
                    class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">View Apps</span>
                    <!-- Icon -->
                    <x-heroicon-s-squares-2x2 class="w-6 h-6" />
                  </button>
                  <!-- Dropdown menu -->
                  <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 md:rounded-xl" id="apps-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">Apps</div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-shopping-bag class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Sales</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-user-group class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Users</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-inbox class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Inbox</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-user-circle class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Profile</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-cog-8-tooth class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Settings</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-archive-box class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Products</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-currency-dollar class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Pricing</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-receipt-percent class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Billing</div>
                      </a>
                      <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <x-heroicon-s-arrow-left-on-rectangle class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                        <div class="text-sm text-gray-900 dark:text-white">Logout</div>
                      </a>
                    </div>
                  </div>

                  <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/images/user.png" alt="user photo"/>
                  </button>

                  <!-- Dropdown menu -->
                  <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 md:rounded-xl" id="dropdown">
                    <div class="py-3 px-4">
                      <span class="block text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</span>
                      <span class="block text-sm text-gray-900 truncate dark:text-white">name@flowbite.com</span>
                    </div>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                      <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
                      </li>
                      <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account settings</a>
                      </li>
                    </ul>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                      <li>
                        <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><x-heroicon-s-heart class="mr-2 w-5 h-5 text-gray-400" />My likes</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><x-heroicon-s-rectangle-stack class="mr-2 w-5 h-5 text-gray-400" />Collections</a>
                      </li>
                    </ul>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                      <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
        
            <!-- Sidebar -->
        
            <aside
              class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
              aria-label="Sidenav"
              id="drawer-navigation"
            >
              <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                <form action="#" method="GET" class="md:hidden mb-2">
                  <label for="sidebar-search" class="sr-only">Search</label>
                  <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg
                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        ></path>
                      </svg>
                    </div>
                    <input
                      type="text"
                      name="search"
                      id="sidebar-search"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      placeholder="Search"
                    />
                  </div>
                </form>
                <ul class="space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                      <svg
                        aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                      </svg>
                      <span class="ml-3">Overview</span>
                    </a>
                  </li>
                  <li>
                    <button type="button" class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                      <x-heroicon-s-document-text class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                      <span class="flex-1 ml-3 text-left whitespace-nowrap">Pages</span>
                      <x-heroicon-m-chevron-down class="w-6 h-6" />
                    </button>
                    <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                      <li><a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Settings</a></li>
                      <li><a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kanban</a></li>
                      <li><a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Calendar</a></li>
                    </ul>
                  </li>

                  <li>
                    <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-heroicon-s-inbox-arrow-down class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                        <span class="flex-1 ml-3 whitespace-nowrap">Messages</span>
                        <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">4</span>
                    </a>
                  </li>
                </ul>
                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                      <x-heroicon-s-clipboard class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                      <span class="ml-3">Docs</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                      <x-heroicon-s-rectangle-stack class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                      <span class="ml-3">Components</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                      <x-heroicon-s-lifebuoy class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                      <span class="ml-3">Help</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20">
                <a href="#" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-600">
                    <x-heroicon-s-adjustments-vertical class="w-6 h-6" />
                </a>
                <a href="#" data-tooltip-target="tooltip-settings" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <x-heroicon-s-cog-8-tooth class="h-5 w-5 rounded-full mt-0.5" />
                </a>
                <div id="tooltip-settings" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                  Settings page
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button type="button" data-dropdown-toggle="language-dropdown"
                  class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:hover:text-white dark:text-gray-400 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                  <x-heroicon-s-globe-americas class="h-5 w-5 rounded-full mt-0.5" />
                </button>
                <!-- Dropdown -->
                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" id="language-dropdown">
                  <ul class="py-1" role="none">
                    <li>
                      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600" role="menuitem">
                        <div class="inline-flex items-center">
                            <x-heroicon-s-globe-europe-africa class="h-3.5 w-3.5 rounded-full mr-2" />
                            English (US)
                        </div>
                      </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600" role="menuitem">
                          <div class="inline-flex items-center">
                              <x-heroicon-s-globe-europe-africa class="h-3.5 w-3.5 rounded-full mr-2" />
                              Filipino (PH)
                          </div>
                        </a>
                      </li>
                    
                  </ul>
                </div>
              </div>
            </aside>
        
            <main class="p-4 md:ml-64 h-screen pt-20 mt-[-5rem]">
                @yield('content')
            </main>
          </div>

    </div>
</body>
</html>
