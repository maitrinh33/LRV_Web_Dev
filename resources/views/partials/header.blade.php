<header>
    <div class="sticky">
        <!-- Navbar -->
        <nav class="fixed inset-x-0 top-0 lg:top-4 mx-auto w-full max-w-screen-lg border bg-white/90 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-full lg:max-w-screen-xl p-4 md:flex md:justify-between">
            <div class="flex justify-between items-center">
                <span class="text-3xl cursor-pointer flex items-center">
                    <img src="{{ asset('images/logo/tblogo.png') }}" alt="Logo" class="nav-logo w-12 h-auto">
                    <a href="{{ url('/') }}" class="satisfy-regular">TuBao Academy</a>
                </span>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block menu-icon">
                    <ion-icon name="menu-outline" onclick="toggleMenu(this)"></ion-icon>
                </span>
            </div>
            <ul class="nav-menu bg-white/90 shadow-md backdrop-blur-lg md:backdrop-blur-none md:bg-transparent md:shadow-none md:flex md:items-center md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-10 md:opacity-90 opacity-0 top-[calc(100%+0px)] transition-all duration-500">
                <li class="mx-4 my-6 md:my-0">
                    <a href="{{ url('/intros') }}" class="quicksand hover:text-yellow-800 duration-500">About</a>
                </li>
                <li class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="{{ url('/courses') }}" class="quicksand hover:text-yellow-800 duration-500">Course</a>
                    <div class="dropdown-content py-2 rounded-md">
                        <a href="{{ url('/courses#personal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Personal Makeup Course</a>
                        <a href="{{ url('/courses#professional-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Professional Makeup Course</a>
                        <a href="{{ url('/courses#bridal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup Course</a>
                    </div>
                </li>
                <li class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="{{ url('/services') }}" class="quicksand hover:text-yellow-800 duration-500">Service</a>
                    <div class="dropdown-content py-2 rounded-md">
                        <a href="{{ url('/services#party') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Party Makeup</a>
                        <a href="{{ url('/services#bridal') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup</a>
                        <a href="{{ url('/services#ceremony') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Ceremony Makeup</a>
                    </div>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="quicksand hover:text-yellow-800 duration-500">Library</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="/src/html/blog.html" class="quicksand hover:text-yellow-800 duration-500">Blog</a>
                </li>
                <!-- Search -->
                <form method="GET" action="{{ route('courses.index') }}">
                    <div class="flex justify-between items-center space-x-4">
                        <input type="text" name="search" placeholder="" value="{{ request('search') }}" 
                        class="w-30 mx-4 my-6 md:my-0 px-2 py-1 border border-gray-300 rounded-full">
                    </div>
                </form>
                <!-- Search -->

                <li>
                    @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 quicksand justify-end">
                                @auth
                                    <li>
                                        @livewire('navigation-menu') 
                                        @livewireScripts

                                    </li>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                </li>
            </ul>
        </nav>
    </div>
    <!-- Toggle Menu script -->
    <script>
        function toggleMenu(icon) {
            const menu = document.querySelector('.nav-menu');
            icon.name = icon.name === 'menu-outline' ? 'close-outline' : 'menu-outline';
            if (menu.classList.contains('opacity-0')) {
                menu.classList.remove('top-[-400px]', 'opacity-0');
                menu.classList.add('top-[calc(100%+0px)]', 'opacity-100');
            } else {
                menu.classList.remove('top-[calc(100%+0px)]', 'opacity-100');
                menu.classList.add('top-[-400px]', 'opacity-0');
            }
        }
    </script>

</header>    
