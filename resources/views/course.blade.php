@extends('layouts.app')
@section('content')
<!--Main Content-->
        <!-- Video Background Section -->
        <section>
            <div class="w-full h-400 relative bg-fixed bg-cover bg-center bg-no-repeat video-section" style="height: 470px;">
                <video class="h-full w-full object-cover rounded-lg" autoplay muted loop>
                    <source src="/src/image/intro/video-intro" type="video/mp4"/>
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 flex items-center justify-center h-full bg-black bg-opacity-50">
                    <div class="text-center text-white animate__animated animate__fadeIn">
                        <h1 class="text-6xl lavishly-yours-bold mb-4">Welcome to Your Makeup Journey</h1>
                        <p class="text-xl scope-one-regular mb-8">Dive into the ocean of new skills and technic that awake your beauty</p>
                    </div>
                </div>
            </div>
          </section>

        <!-- Announcement Section -->
        <section class="relative"> 
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
        </section>
        
        <!-- Section for Courses -->
          <article class="px-16 lg:px-20">
  
            <!-- Tittle -->  
            <section class="section">
                <h2 class="text-orange-900 courgette-regular text-3xl md:text-5xl divider mb-8">ू OUR COURSES ु</h2>
                <p class="Yrsa text-base md:text-2xl uppercase text-gray-800 p-5 lg:w-full">You deserve an approach to your look & vision that's as unique and unforgettable as you are. Since the very beginning, TuBao Academy has cultivated our reputation as the leading authority for Makeup Artistry</p>  
            </section> 
            
            <!-- Search Section -->
            <form method="GET" action="{{ route('courses.index') }}" class="mb-6">
                <div class="flex justify-between items-center space-x-10">
                    <input type="text" name="search" placeholder="Search course name..." value="{{ request('search') }}" 
                    class="px-4 py-2 border border-gray-300 rounded-full">
                </div>
            </form>
            <!-- Search Section -->

            <!-- Course Cards -->
            <section id="Projects" class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 mt-10">
                @if($courses->isEmpty())
                    <p>No courses available.</p>
                @else
                    @foreach ($courses as $course)
                        <x-course-card :course="$course" />
                    @endforeach
                @endif
            </section>
            <!-- Course Cards -->
        </article>

        <!-- Founder's Quote -->
        <div class="relative mt-10 py-20 overflow-hidden bg-white/30 shadow-orange-100 shadow-2xl sm:py-24 md:py-24">
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
                                        <img class="object-cover w-24 h-24 mr-4 rounded-full" src=" {{ asset('images/course/women.jpg') }}" alt="founder">
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

@endsection
