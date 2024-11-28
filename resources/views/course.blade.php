@extends('layouts.app')
@section('content')
<!--Main Content-->
    <!-- Course Title -->
        <article class="pt-10 px-6 lg:px-20">
            <div class="text-center p-10">
                <div class="divider mb-6">
                    <h2 class="satisfy-regular">OUR COURSES</h2>
                </div>
                <p class="Yrsa">You deserve an approach to your look & vision that's as unique and unforgettable as you are. Since the very beginning, TuBao Academy has cultivated our reputation as the leading authority for Makeup Artistry.</p>        
            </div>

            <!-- Search Section -->
            <form method="GET" action="{{ route('courses.index') }}" class="mb-6">
                <div class="flex justify-between items-center space-x-4">
                    <input type="text" name="search" placeholder="Search course name..." value="{{ request('search') }}" 
                    class="px-4 py-2 border border-gray-300 rounded-full">
                </div>
            </form>
            <!-- Search Section -->

            <!-- Grid Section -->
            <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 mt-10">
                @if($courses->isEmpty())
                    <p>No courses available.</p>
                @else
                    @foreach ($courses as $course)
                        <x-course-card :course="$course" />
                    @endforeach
                @endif
            </section>
            <!-- Grid Section -->

            <!-- Contact🙏🥰 -->
            <script src="https://storage.ko-fi.com/cdn/scripts/overlay-widget.js"></script>
            <script>
                kofiWidgetOverlay.draw('mohamedghulam', {
                        'type': 'floating-chat',
                        'floating-chat.donateButton.text': 'Contact Now',
                        'floating-chat.donateButton.background-color': '#323842',
                        'floating-chat.donateButton.text-color': '#fff'
                    });
            </script>
        </article>

<!-- Founder's Quote -->
<div class="relative mt-10 py-20 overflow-hidden bg-transparent shadow-orange-100 shadow-2xl sm:py-24 md:py-24">
    <div class="relative max-w-6xl px-16 mx-auto xl:px-0">
        <svg class="absolute top-0 left-0 hidden w-32 h-32 -mt-3 -ml-16 text-gray-950 opacity-50 xl:block" stroke="currentColor" fill="none" viewBox="0 0 144 144">
            <path stroke-width="2" d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"></path>
        </svg>
        <div class="relative xl:pl-32 lg:flex lg:items-center">
            <div class="relative">
                <blockquote class="relative">
                    <div class="text-xl font-bold leading-9 tracking text-gray-950 md:text-3xl mb-7">
                        <p class="charm-bold">We’ve helped 4000+ students start their own successful makeup businesses and land jobs with high-end brands like MAC, Fenty, and Sephora!<br>
                            <span class="font-extrabold text-transparent text-5xl bg-clip-text bg-gradient-to-r from-orange-500 via-yellow-700 to-red-600">reaching millions of followers</span>
                        </p>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="object-cover w-24 h-24 border-2 border-rose-400 mr-4 rounded-full" src=" {{ asset('images/course/women.jpg') }}" alt="founder">
                            </div>
                            <div class="ml-4 lg:ml-0">
                                <div class="text-base font-medium leading-6 text-gray-700">Alisan Cameron - TuBao Makeup's Founder</div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<!-- Announcement Section -->
<div class="relative mt-0"> <!-- Changed mt-10 to mt-0 to remove space between the sections -->
    <div class="bg-yellow-900">
        <div class="mx-auto max-w-7xl py-5 px-3 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between lg:flex-row lg:justify-center">
                <div class="flex flex-1 items-center lg:mr-3 lg:flex-none">
                    <p class="ml-3 text-center font-large text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true" class="mr-2 hidden h-6 w-6 lg:inline">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>
                        Every first students absolute get <span class="font-semibold">Free Makeup Tools</span> use
                        <span class="font-black">TUBAOAD</span> to get <span class="font-black">50% off</span>
                    </p>
                </div>
                <div class="mt-2 w-full flex-shrink-0 lg:mt-0 lg:w-auto">
                    <a class="flex items-center justify-center rounded-md border border-transparent bg-white px-4 py-2 text-sm font-medium text-orange-800 shadow-sm hover:bg-orange-50"
                        href="#pricing">Buy now</a>
                </div>
            </div>
        </div>
    </div>
</div>



            <!--Map & Contact Form start from here-->
        <section class="text-gray-600 body-font relative">
            <div class="my-20 container py-2 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 bg-gray-300 overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                    <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                        marginwidth="0" scrolling="no"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8931381602997!2d108.21767827473012!3d16.07103418460873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421836b5f0b5d5%3A0xf372c18deace6db!2zVmnhu4duIE5naGnDqm4gY-G7qXUgdsOgIMSQw6BvIHThuqFvIFZp4buHdCAtIEFuaCwgxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1sen!2s!4v1719385593947!5m2!1sen!2s"
                        style="filter: opacity(0.8);"></iframe>
                    <div class="bg-white relative flex flex-wrap lg:pl-10 lg:py-6 px-4 py-2 mx-6 rounded-2xl shadow-md">
                        <div class="lg:w-1/2">
                            <h2 class=" font-semibold text-gray-900 tracking-widest lg:text-xs">ADDRESS</h2>
                            <p class="mt-0 text-left lg:mr-2">VN-UK Institute for Research and Executive Education - 158A Le Loi, Danang, Vietnam</p>
                        </div>
                        <div class="w-1/2 mt-0 lg:mt-0 lg-pl-6">
                            <h2 class="font-semibold text-gray-900 tracking-widest lg:text-xs">EMAIL</h2>
                            <a class="text-gray-900 leading-relaxed">tubaomakeup@gmail.com</a>
                            <h2 class="font-semibold text-gray-900 tracking-widest lg:text-xs lg:mt-4">PHONE</h2>
                            <p class="leading-none">123-456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 px-10 rounded-2xl">
                    <h2 class="text-gray-900 text-lg mt-4 mb-1 font-medium title-font">Contact Us Now</h2>
                    <p class="leading-relaxed mb-4 text-gray-600">We will call you back!
                    </p>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <button class="text-white bg-orange-800 border-0 py-2 px-6 focus:outline-none hover:bg-orange-900 rounded text-lg">Submit</button>
                    <p class="text-xs text-gray-500 my-4">By submitting this form, you agree to receive text email from us</p>
                </div>
            </div>
        </section>
        <!--Map & Contact Form end here-->

        <!--Call to Action-->
        <div class="bg-gray-950 text-white py-24 px-10">
            <h2 class="text-5xl font-bold text-center mb-10">Ready to step into the best version of you? </h2>
            <div class="flex justify-center space-x-4">
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg" onclick="openModal()">&larr; Contact Us</button>
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg">Book Now &rarr;</button>
            </div>
        </div>
@endsection
