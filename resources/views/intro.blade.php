@extends('layouts.app')

@section('content') 
        <!-- Video Background Section -->
        <section class="w-full h-400 relative bg-fixed bg-cover bg-center bg-no-repeat video-section" style="height: 470px;">
            <video class="h-full w-full object-cover rounded-lg" autoplay muted loop>
                <source src={{ asset ('images/intro/intro-video.mp4') }} type="video/mp4"/>
                Your browser does not support the video tag.
            </video>
            <div class="absolute inset-0 flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="text-center text-white animate__animated animate__fadeIn">
                    <h1 class="text-6xl lavishly-yours-bold mb-4">Welcome to Your Makeup Journey</h1>
                    <p class="text-xl mb-8">Discover new skills and technic that awake your beauty</p>
                </div>
            </div>
        </section>


        <!-- Section 1 -->
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="courgette-regular mb-4">TuBao Makeup</h1>
                <h2 class="charm-bold mb-4 text-3xl md:text-5xl divider leading-tight">WHY SHOULD CHOOSE</h2>    
                <p class="quicksand-regular text-2xl text-gray-600 leading-tight">With over 10 years of experience in the field of makeup and training students, TuBao Makeup has become influential in the professional domain and has brought significant value to the community.</p>
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="stat p-6 bg-white shadow-lg rounded-lg hover:bg-brown-700 transition duration-300 hover:text-white">
                        <h3 class="text-4xl font-bold text-gray-900 stat-number">200+</h3>
                        <p class="mt-2 text-gray-800 stat-text">student has registered</p>
                    </div>
                    <div class="stat p-6 bg-white shadow-lg rounded-lg hover:bg-brown-700 transition duration-300 hover:text-white">
                        <h3 class="text-4xl font-bold text-gray-900 stat-number">97%</h3>
                        <p class="mt-2 text-gray-800 stat-text">Client satisfaction</p>
                    </div>
                    <div class="stat p-6 bg-white shadow-lg rounded-lg hover:bg-brown-700 transition duration-300 hover:text-white">
                        <h3 class="text-4xl font-bold text-gray-900 stat-number">30+</h3>
                        <p class="mt-2 text-gray-800 stat-text">Lecturers</p>
                    </div>
                    <div class="stat p-6 bg-white shadow-lg rounded-lg hover:bg-brown-700 transition duration-300 hover:text-white">
                        <h3 class="text-4xl font-bold text-gray-900 stat-number">500+</h3>
                        <p class="mt-2 text-gray-800 stat-text">Amazing clients</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2 -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="relative">
                    <div class="deformed-circle">
                        <img src={{asset('images/intro/original.jpg')}} alt="Introduction Image" class="object-cover w-full h-full">
                    </div>
                    <div class="experience-badge">
                        <div>
                            10+ Years Experience
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <span class="text-[#8B4513] uppercase font-bold">Benefits</span>
                        <h2 class="text-4xl font-extrabold text-gray-900 mt-2">WHEN JOIN<span class="text-[#8B4513]"> TuBao Makeup</span></h2>
                    </div>
                    <p class="text-lg text-black mb-6">The curriculum is full of knowledge with lessons from basic to advanced. We continuously update the latest beauty trends today, ensuring that students after finishing the course will be fully equipped with basic knowledge and good practice of the most modern technologies.</p>
                    <ul class="text-black space-y-4 mb-6">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#30ff75] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Cosmetic support is provided during the study period
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#30ff75] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Have the opportunity to go on reality shows to improve your skills
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#30ff75] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Support in building brand image and orientation after graduation
                        </li>
                    </ul>
                    <div class="flex space-x-4">
                        <button class="bg-white text-gray-900 py-2 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition duration-300">Learn more</button>
                        <button class="bg-[#8B4513] text-white py-2 px-4 rounded-lg hover:bg-[#7B3A10] transition duration-300" onclick="openModal()">Enroll now</button>
                    </div>
                </div>
            </div>
        </section>

      
        <!--Sale banner-->
        <section class="bg-rose-600 px-6 py-3 mb-20">
            <div class="relative pr-6">
                <div class="flex flex-wrap items-center justify-center gap-4 text-center">
                    <p class="inline-flex items-center text-sm font-medium text-white lg:text-base">
                        <span class="text-lg">🔔</span>
                        Quickly receive 30% discount!! Sale ends in
                    </p>

                    <div id="countdown" class="inline-flex items-center gap-2 text-lg font-medium text-white">
                        <div class="flex flex-col items-center">
                            <span id="days" class="rounded-lg bg-rose-400 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">days</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="hours" class="rounded-lg bg-rose-400 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">hours</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="minutes" class="rounded-lg bg-rose-400 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">minutes</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="seconds" class="rounded-lg bg-rose-400 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">seconds</div>
                        </div>
                    </div>


                    <a href="javascript:void(0)" class="text-sm font-medium pl-8 text-white underline lg:text-base hover:text-yellow-300 transition-colors">
                        Register now→
                    </a>
                </div>
                <button class="absolute right-0 top-1/2 flex h-6 w-6 -translate-y-1/2 items-center justify-center text-white/50 duration-200 hover:text-white">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2390_1135)">
                            <path d="M1.14288 1.14285L8.00003 8M8.00003 8L14.8572 14.8571M8.00003 8L14.8572 1.14285M8.00003 8L1.14288 14.8571" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2390_1135">
                                <rect width="16" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
        </section>
        <!-- End sale banner-->
   

        <!--Student's Showcase-->
        <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

        <script type="module">
            import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

            const keenSlider = new KeenSlider(
                '#keen-slider',
                {
                loop: true,
                slides: {
                    origin: 'center',
                    perView: 1.25,
                    spacing: 16,
                },
                breakpoints: {
                    '(min-width: 1024px)': {
                    slides: {
                        origin: 'auto',
                        perView: 1.5,
                        spacing: 32,
                    },
                    },
                },
                },
                []
            )

            const keenSliderPrevious = document.getElementById('keen-slider-previous')
            const keenSliderNext = document.getElementById('keen-slider-next')

            const keenSliderPreviousDesktop = document.getElementById('keen-slider-previous-desktop')
            const keenSliderNextDesktop = document.getElementById('keen-slider-next-desktop')

            keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
            keenSliderNext.addEventListener('click', () => keenSlider.next())

            keenSliderPreviousDesktop.addEventListener('click', () => keenSlider.prev())
            keenSliderNextDesktop.addEventListener('click', () => keenSlider.next())
        </script>


        <section id="student">
            <section class="text-gray-600 p-6 md:p-6 bg-black/30 dark:text-gray-300 dark:bg-gray-900">
            <div class="mx-auto max-w-[1340px] px-4 py-16 sm:px-6 lg:me-0 lg:py-16 lg:pe-0 lg:ps-8 xl:py-24">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16">
                
                <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    <h1 class="text-5x1 courgette-regular font-bold tracking-tight text-central text-white sm:text-4xl">Student's Review</h1>
                    
                    <p class="mt-4 text-2xl italic text-white">What do people say about us? </p>

                    <div class="mt-8 flex justify-center gap-4 lg:hidden button-container">
                    <button
                        aria-label="Previous slide"
                        id="keen-slider-previous"
                        class="square-button bg-transparent hover:bg-white/50 w-14 h-14 rounded-full"
                    >
                        <svg
                        class="size-5 -rotate-180 transform"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
            
                    <button
                        aria-label="Next slide"
                        id="keen-slider-next"
                        class="square-button bg-transparent hover:bg-white/50 w-14 h-14 rounded-full"
                    >
                        <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                    </div>
                </div>


                <div class="-mx-6 lg:col-span-2 lg:mx-0">
                    <div id="keen-slider" class="keen-slider">
                    <div class="keen-slider__slide">
                        <blockquote
                        class="flex h-full flex-col justify-between bg-white rounded-2xl p-2 shadow-sm sm:p-8 lg:p-12"
                        >
                        <div class="profile-container">
                        <!-- Text Section -->
                        <div class="text-section">
                            <div class="flex">
                                <span class="text-yellow-500">★★★★★</span>
                                </div>
                            <h2 class="text-xl font-bold text-orange-800">Vy Julie</h2>
                            -----------------------------
                            
                            <p class="text-gray-600 text-xs mb-4">
                                TuBao Makeup Academy is a place that brings me many interesting experiences, a place where I can be free to be myself. Being able to both pursue the Makup industry and make money based on my passion is wonderful!
                            </p>
                            
                        </div>
                        <!-- Image Section -->
                        <div class="profile-image rounded-2x1">
                            <img src={{ asset('images/intro/student1.jpg') }} alt="Profile Image" class="w-60 h-65 object-cover rounded-lg shadow-lg">
                        </div>
                    </div>

                        <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                            &mdash; Graduate Professional Course &mdash;
                        </footer>
                        </blockquote>
                    </div>


                    <div class="keen-slider__slide">
                        <blockquote
                        class="flex h-full flex-col justify-between bg-white rounded-2xl p-2 shadow-sm sm:p-8 lg:p-12"
                        >
                        <div class="profile-container">
                        <!-- Text Section -->
                        <div class="text-section">
                            <div class="flex">
                                <span class="text-yellow-500">★★★★★</span>
                                </div>
                            <h2 class="text-xl font-bold text-orange-800">Phan Khánh Linh</h2>
                            -----------------------------
                            
                            <p class="text-gray-600 text-xs mb-4">
                                Two years ago, when I didn't know anything about makeup, I happened to see the makeup tips you shared. I found it very easy to understand and useful, so from then on I fell in love with TuBao Makeup Academy.
                            </p>
                            
                        </div>
                        <!-- Image Section -->
                        <div class="profile-image">
                            <img src={{ asset('images/intro/student2.jpg') }} alt="Profile Image" class="w-60 h-65 object-cover rounded-lg shadow-lg">
                        </div>
                    </div>


                        <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                            &mdash; Master Makeup Graduate &mdash;
                        </footer>
                        </blockquote>
                    </div>


                    <div class="keen-slider__slide">
                        <blockquote
                        class="flex h-full flex-col justify-between bg-white rounded-2xl p-2 shadow-sm sm:p-8 lg:p-12"
                        >
                        <div>


                            <div class="profile-container">
                            <!-- Text Section -->
                            <div class="text-section">
                                <div class="flex">
                                    <span class="text-yellow-500">★★★★★</span>
                                    </div>
                                <h2 class="text-xl font-bold text-orange-800">Nguyen Thanh Nga</h2>
                                -----------------------------
                                
                                <p class="text-gray-600 text-xs mb-4">
                                    For a lazy girl like me, deciding to learn makeup was a very hasty decision. But after 4 months of experience and learning, I know my decision was extremely wise. I have now graduated and will continue to develop my career in the future.
                                </p>
                                
                            </div>
                            <!-- Image Section -->
                            <div class="profile-image">
                                <img src={{ asset('images/intro/student3.jpg') }} alt="Profile Image" class="w-60 h-65 object-cover rounded-lg shadow-lg">
                            </div>
                        </div>


                        <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                            &mdash; Master Makeup Student &mdash;
                        </footer>
                        </blockquote>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    <!--End student's showcase-->

@endsection  