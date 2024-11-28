<header>
    <div class="sticky">
        <!-- Navbar -->
        <nav class="fixed inset-x-0 top-0 mx-auto w-full max-w-screen-lg border bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-full lg:max-w-screen-xl p-4 md:flex md:justify-between">
            <div class="flex justify-between items-center">
                <span class="text-3xl cursor-pointer flex items-center">
                    <img src="{{ asset('images/logo/tblogo.png') }}" alt="Logo" class="nav-logo w-12 h-auto">
                    <a href="/index.html" class="lavishly-yours-bold">TuBao Makeup Academy</a>
                </span>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block menu-icon">
                    <ion-icon name="menu-outline" onclick="toggleMenu(this)"></ion-icon>
                </span>
            </div>
            <ul class="nav-menu bg-white/80 shadow-md backdrop-blur-lg md:backdrop-blur-none md:bg-transparent md:shadow-none md:flex md:items-center md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[calc(100%+0px)] transition-all duration-500">
                <li class="mx-4 my-6 md:my-0">
                    <a href="/src/html/intro.html" class="scope-one-regular hover:text-yellow-800 duration-500">INTRODUCTION</a>
                </li>
                <li class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="/src/html/course.html" class="scope-one-regular hover:text-yellow-800 duration-500">COURSE</a>
                    <div class="dropdown-content py-2 rounded-md">
                        <a href="/src/html/course.html#personal-makeup-course" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Personal Makeup Course</a>
                        <a href="/src/html/course.html#professional-makeup-course" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Professional Makeup Course</a>
                        <a href="/src/html/course.html#bridal-makeup-course" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Bridal Makeup Course</a>
                    </div>
                </li>
                <li class="mx-4 my-6 md:my-0 relative dropdown">
                    <a href="/src/html/service.html" class="scope-one-regular hover:text-yellow-800 duration-500">SERVICE</a>
                    <div class="dropdown-content py- rounded-md">
                        <a href="/src/html/service.html#party" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Party Makeup</a>
                        <a href="/src/html/service.html#bridal" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Bridal Makeup</a>
                        <a href="/src/html/service.html#ceremony" class="scope-one-regular block px-4 py-2 hover:bg-gray-200">Ceremony Makeup</a>
                    </div>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="scope-one-regular hover:text-yellow-800 duration-500">LIBRARY</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="/src/html/blog.html" class="scope-one-regular hover:text-yellow-800 duration-500">BLOG</a>
                </li>
                <!-- Search -->
                <form method="GET" action="{{ route('courses.index') }}">
                    <div class="flex justify-between items-center space-x-4">
                        <input type="text" name="search" placeholder="" value="{{ request('search') }}" 
                        class="w-40 px-2 py-1 border border-gray-300 rounded-full">
                    </div>
                </form>
                <!-- Search -->

                <li class="lg:mx-4 md:mx-0 my-6 md:my-0">
                    <button class="bg-orange-900 text-white quicksand duration-500 px-4 py-2 hover:bg-orange-950 rounded-3xl" onclick="openModal()">Contact Us</button>
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
    <!--Open Contact Us form-->    
    <script>
        function openModal() {
            document.getElementById('contactModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('contactModal').classList.add('hidden');
        }

        function showSuccessAlert() {
            alert('Thank you for your message!');
        }
    </script>
    <!--Open Contact Us form-->  

    <!-- Modal -->
    <div id="contactModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-900 to-orange-800 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="text-white relative px-4 py-10 bg-orange-700 shadow-lg sm:rounded-3xl sm:p-20">
                <div class="text-center pb-6">
                    <h1 class="text-3xl">Contact Us!</h1>
                    <p class="text-gray-300">Fill up the form below to send us a message.</p>
                </div>

                <form onsubmit="event.preventDefault(); closeModal(); showSuccessAlert();">
                    <input
                        class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Name" name="name" required>

                    <input
                        class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="email" placeholder="Email" name="email" required>

                    <input
                        class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="tel" placeholder="Phone Number" name="phone" required>

                    <textarea
                        class="shadow mb-4 min-h-0 appearance-none border rounded h-64 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Type your message here..." name="message" style="height: 121px;" required></textarea>

                    <div class="flex justify-between">
                        <input
                            class="shadow bg-white text-orange-900 border-2 border-orange-950 hover:bg-yellow-900 hover:text-white transition duration-300 font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit" value="Send ➤">
                        <input
                            class="shadow bg-white text-orange-900 border-2 border-orange-950 hover:bg-yellow-900 hover:text-white transition duration-300 font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="reset" value="Reset">
                    </div>
                </form>
                
                <!-- Close Button -->
                <button class="absolute top-0 right-0 mt-4 mr-4 text-white font-bold" onclick="closeModal()">&times;</button>
            </div>
        </div>
    </div>
  </header>    
    <!-- Video Background Section -->
    <section>
        <div class="w-full h-400 relative bg-fixed bg-cover bg-center bg-no-repeat video-section" style="height: 470px;">
            <video class="h-full w-full object-cover rounded-lg" autoplay muted loop>
                <source src="{{ asset('images/course/coursevideo.mp4') }}" type="video/mp4"/>
                Your browser does not support the video tag.
            </video>
            <div class="absolute inset-0 flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="text-center text-white animate__animated animate__fadeIn">
                    <h1 class="charm-bold text-6xl font-bold mb-4">Welcome to Your Makeup Journey</h1>
                    <p class="satisfy-regular text-xl mb-8">Discover new skills and techniques that awaken your beauty</p>
                </div>
            </div>
        </div>
    </section>