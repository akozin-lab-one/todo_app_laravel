<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    {{-- flow bite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    {{-- navbar start --}}

    <nav class="bg-white border-gray-200 dark:bg-gray-900 sticky top-0 border border-b-8  ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center">
                {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
                <span
                    class="self-center text-2xl font-extrabold whitespace-nowrap dark:text-white text-blue-600 drop-shadow-md shadow-blue-600/50">ToDoList</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>

                    @if (Auth::user()->image == null)
                    <img class="rounded-full w-10 h-10 " src="{{asset('storage/image/unknown.jpg')}}" alt="">
                    @else
                    <img class="rounded-full w-10 h-10 " src="{{asset('storage/image/pro.jpg')}}" alt="">
                    @endif
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{route('user.account.detail', Auth::user()->id)}}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Acount</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                @csrf
                                <button type="submit">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                {{-- <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button> --}}
            </div>

        </div>
    </nav>


    {{-- navbar end --}}
    <div class="container mx-auto  lg:mt-8 sm:mt-2 ">
        @yield('mainContent')
    </div>

    {{-- cdn js --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    {{-- flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
@yield('myAjax')

</html>
