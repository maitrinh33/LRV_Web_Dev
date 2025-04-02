   <nav class="bg-white nav-bar bg-opacity-50 backdrop-blur-md w-full px-4 lg:px-20 text-black top-0 border-b-white">
        <div class="flex justify-between items-center h-24">

            <div class="hidden md:flex md:items-center md:space-x-8 uppercase">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex justify-between items-center">
                    <img class="h-16 w-auto" src="{{ asset('images/logo/tblogo.png') }}" alt="Logo">
                </a>

                <div class="mx-4 my-6 md:my-0">
                    <a href="{{ route('home') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        Home
                    </a>
                </div>

                <div class="mx-4 my-6 md:my-0">
                    <a href="{{ route('intros.index') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        About
                    </a>
                </div>

                <div class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="{{ route('courses.index') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        Course
                    </a>                        
                    <div class="dropdown-content py-2 rounded-md">
                        <a href="{{ url('/courses#personal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Personal Makeup Course</a>
                        <a href="{{ url('/courses#professional-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Professional Makeup Course</a>
                        <a href="{{ url('/courses#bridal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup Course</a>
                    </div>
                </div>

                <div class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="{{ route('services.index') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        Service
                    </a>                        
                    <div class="dropdown-content py-2 rounded-md">
                        <a href="{{ url('/services#personal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Personal Makeup Course</a>
                        <a href="{{ url('/services#professional-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Professional Makeup Course</a>
                        <a href="{{ url('/services#bridal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup Course</a>
                    </div>
                </div>

                @auth
                <div class="mx-4 my-6 md:my-0">
                    <a href="{{ route('chats.index') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        Chat
                    </a>
                </div>
                @endauth

                @auth
                <div class="mx-4 my-6 md:my-0">
                    <a href="{{ route('appointments.index') }}" class="text-black quicksand hover:text-yellow-800 duration-500 inline-flex items-center text-sm font-bold">
                        Appointment
                    </a>
                </div>
                @endauth

            </div>

                <div class="hidden md:ml-10 md:flex md:items-center md:space-x-4">
                    <!-- Search -->
                    @livewire('search-input')

                        @if (Route::has('login'))
                                @auth
                                        @livewire('navigation-menu') 
                                        @livewireScripts
                                @else
                                    <div class="mx-4 my-6 md:my-0">

                                        <a href="{{ route('login') }}" class="border border-orange-900 justify-center px-3 py-2 rounded-full shadow-sm text-yellow-800 quicksand hover:text-yellow-700 duration-500 inline-flex items-center text-sm font-bold" @click="open = false">Login</a>
                                    </div>
                                    @if (Route::has('register'))
                                        <div class="mx-4 my-6 md:my-0">

                                            <a href="{{ route('register') }}" class="border border-orange-800 bg-orange-800 hover:bg-orange-950 justify-center px-3 py-2 rounded-full shadow-sm text-white quicksand hover:text-white duration-500 inline-flex items-center text-sm font-bold" @click="open = false">Register</a>
                                        </div>    
                                    @endif
                                @endauth
                        @endif
                </div>
                        
                
                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden ml-4">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-black hover:bg-[#f4b299] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
        </div>


    <!-- Mobile menu, show/hide based on menu state -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('intros.index') }}" class="bg-transparent text-black hover:bg-[#f4b299] block px-3 py-2 rounded-md quicksand font-semibold">About</a>
            <div class="my-6 md:my-0 relative dropdown">
                <a href="{{ route('courses.index') }}" class="bg-transparent text-black hover:bg-[#f4b299] hover:text-black block px-3 py-2 rounded-md quicksand font-semibold">Course</a>                     
                <div class="dropdown-content py-2 rounded-md">
                    <a href="{{ url('/courses#personal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Personal Makeup Course</a>
                    <a href="{{ url('/courses#professional-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Professional Makeup Course</a>
                    <a href="{{ url('/courses#bridal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup Course</a>
                </div>
            </div>
            <div class="my-6 md:my-0 relative dropdown">
                <a href="{{ route('services.index') }}" class="bg-transparent text-black hover:bg-[#f4b299] hover:text-black block px-3 py-2 rounded-md quicksand font-semibold">Service</a>                     
                <div class="dropdown-content py-2 rounded-md">
                    <a href="{{ url('/services#personal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Personal Makeup Service</a>
                    <a href="{{ url('/services#professional-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Party Makeup Service</a>
                    <a href="{{ url('/services#bridal-makeup-course') }}" class="quicksand block px-4 py-2 hover:bg-gray-200">Bridal Makeup Service</a>
                </div>
            </div>
            @auth
                <a href="{{ route('appointments.index') }}" class="bg-transparent text-black hover:bg-[#f4b299] hover:text-black block px-3 py-2 rounded-md quicksand font-semibold">My Appointment</a>
            @endauth
        </div>
        
        <!-- Mobile search -->
        <div class="px-2 pt-2 pb-3">
            <div class="relative">
                @livewire('search-input')

            </div>
        </div>
        
        <!-- Mobile profile -->
        <div class="pt-4 pb-3 border-t border-gray-700">
                @if (Route::has('login'))
                        @auth
                                    @livewire('navigation-menu') 
                                    @livewireScripts
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" @click="open = false">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" @click="open = false">Register</a>
                                @endif
                        @endauth
                @endif
        </div>
    </div>
</nav>


<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('hidden');
    });
    
</script>
