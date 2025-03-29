@extends('layouts.app')

@section('content') 
<!-- Hero - Homepage -->
<section class="pt-10 px-4 lg:px-20">
    <div class="flex flex-wrap lg:justify-center items-center">
        <div class="relative flex flex-col lg:flex-row w-full">
            <!-- Left Column --> 
            <div class="w-full lg:w-1/2 flex items-center">
                <div class="mb-16 lg:max-w-lg">
                    <div class="mb-6">
                        <h2 class="mb-6 text-4xl md:text-5xl lg:text-8xl tracking-tight sm:leading-snug">
                            <span class="inline-block satisfy-regular font-bold text-orange-800">TuBao Makeup Academy</span>
                        </h2>
                        <p class="text-justify quicksand-regular font-regular text-lg md:text-x1 md:pr-8 text-gray-500">
                            With over 10 years of experience in the field of makeup and training students, TuBao Makeup has gradually become influential in the professional domain and has brought significant value to the community.
                        </p>
                    </div>
                    <a href="{{ route('intros.index') }}" class="flex items-center">
                        <button class="text-white font-bold text-xs text-center self-center py-2 lg:py-4 px-4 lg:px-9 bg-orange-950 hover:bg-yellow-500 scope-one-regular rounded-tl-full rounded-br-full shadow-lg m-2">
                            ABOUT US
                        </button>
                    </a>
                </div>
            </div>
            <!-- Left Column -->

            <!-- Right Column -->
            <div class="w-full lg:ml-20 lg:w-2/6 flex justify-center lg:justify-end py-10 lg:py-0">
                <!-- Column 1 -->
                <div class="w-1/2 lg:w-auto lg:pr-4">
                    <div class="overflow-hidden pt-10 transition-transform transform hover:scale-105">
                        <img class="h-full w-full object-cover rounded-3xl" src="{{ asset('images/home/headerhome1.jpg') }}" alt="header home 1" />
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="w-1/2 md:w-full lg:w-full lg:h-auto flex justify items-center flex-col space-y-4 md:space-y-2 lg:space-y-8">
                    <div class="h-40 overflow-hidden transition-transform transform hover:scale-105">
                        <img class="h-full w-full object-cover object-bottom rounded-2xl" src="{{ asset('images/home/headerhome2.jpg') }}" alt="header home 2" />
                    </div>
                    <div class="h-40 overflow-hidden transition-transform transform hover:scale-105">
                        <img class="h-full w-full object-cover object-bottom rounded-2xl" src="{{ asset('images/home/headerhome3.jpg') }}" alt="header home 3" />
                    </div>
                    <div class="h-40 overflow-hidden rounded-xl transition-transform transform hover:scale-105">
                        <img class="h-full w-full object-cover object-bottom rounded-2xl" src="{{ asset('images/home/headerhome4.jpg') }}" alt="header home 4" />
                    </div>
                </div>
            </div>
            <!-- Right Column -->
        </div>
    </div>
        
    <!-- Horizontal Orange Line -->
    <div class="w-full border-t-2 border-white mt-10"></div>
</section>

    <!--TuBao Makeup Course-->
    <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom my-20 pb-2">
        <h1 class="text-5xl satisfy-regular font-bold text-gray-800 mb-16 text-center">TuBao Makeup Course</h1>            
            <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <!--Card 1 - Personal Make up-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40 ">
                        <img class="card-img w-full h-full object-cover" src=" {{ asset('images/home/course1.jpg') }}" alt="Personal Makeup Course">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Personal Makeup Course
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Unlock your inner artist and learn to enhance your natural beauty. This beginner-friendly course empowers you to look and feel your best every day.
                        </p>
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="openModal()" type="button">
                            Enroll Now
                        </button>
                    </div>
                </div>
                <!--Card 2 - Professional Make Up-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                        <img class="card-img w-full h-full object-cover" src=" {{ asset('images/home/course2.jpg') }}" alt="Professional Makeup Course">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Professional Makeup Course
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Take your skills to the next level and become a sought-after makeup artist. Dive into advanced techniques and gain the confidence to shine in the beauty industry.
                        </p>
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="openModal()" type="button">
                            Enroll Now
                        </button>
                    </div>
                </div>
                <!--Card 3 - Bridal Make up-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                        <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/course3.jpg') }}" alt="Bridal Makeup Course">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Bridal Makeup Course
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Master the art of bridal beauty and create unforgettable looks for every bride. Transform your passion into a profession with expert skills and hands-on practice.
                        </p>
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="openModal()" type="button">
                            Enroll Now
                        </button>
                    </div>
                </div>
            </div>
            <!--Link to the next page-->
            <div class="mt-6 text-center">
                <div class="buttons mb-8 flex justify-end">
                    <!-- Changed button to anchor tag -->
                    <a href="{{ route('courses.index') }}" class="learn-btn bg-white text-orange-950 border-2 border-orange-950 py-2 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300">
                        Explore &rarr;
                    </a>
                </div>
            </div>
    </section>


    <!--Service Section-->
    <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom my-20 pb-2">
            <h1 class="text-5xl satisfy-regular font-bold text-gray-800 mb-16 text-center">TuBao Makeup Service</h1>
            <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <!--Card 1 - Party Make up Service-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40 ">
                        <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service1.jpg') }}" alt="Party Makeup Service">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Party Makeup Service
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Be the star of the night with our Party Makeup Service. Ideal for birthdays, galas, and nights out, we create bold, head-turning looks that match your personality and event vibe, long-lasting finish.
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="scrollToSection()" type="button">
                            Book Now
                        </button>
                    </div>
                </div>
                <!--Card 2 - Bridal Makeup Service-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                        <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service2.jpg') }}" alt="Professional Makeup Course">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Bridal Makeup Service
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Look stunning on your wedding day with our Bridal Makeup Service. Our experts use high-quality products to create a flawless, radiant look that lasts all day, ensuring you shine in every photo and moment.
                        </p>
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="scrollToSection()" type="button">
                            Book Now
                        </button>
                    </div>
                </div>
                <!--Card 3 - Ceremny Makeup Service-->
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                    <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                        <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service3.jpg') }}" alt="Bridal Makeup Course">
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 scope-one-regular text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Ceremony Makeup Service
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                            Look stunning on your wedding day with our Bridal Makeup Service. Our experts use high-quality products to create a flawless, radiant look that lasts all day, ensuring you shine in every photo and moment.
                        </p>
                    </div>
                    <div class="p-6 pt-0 flex justify-between">
                        <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                            Read More
                        </button>
                        <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" onclick="scrollToSection()" type="button">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <!--Link to the next page-->
            <div class="mt-6 text-center">
                <div class="buttons mb-8 flex justify-end"> 
                    <a href="{{ route('services.index') }}" class="learn-btn bg-white text-orange-950 border-2 border-orange-950 py-2 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300">
                        Explore &rarr;
                    </a>
                </div>
            </div>
    </section>

     <!--Library Section-->
        @if(isset($makeupItems))
        <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom lg:my-20 pb-2">
            <h1 class="text-5xl satisfy-regular font-bold text-gray-800 mb-16 text-center">TuBao Makeup Library</h1>
            <div class="flex items-center justify-center h-fit ">
                <div class="flex [&:hover>div]:w-14 [&>div:hover]:w-[20rem] ">
                    @foreach($makeupItems as $item)
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src="{{ asset($item['image']) }}" alt="" />
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-sembold text-xl text-gray-100">{{ $item['title'] }}</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <!-- SVG Icons -->
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <!-- Add other SVG icons here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 text-center">
                <div class="buttons mb-8 flex justify-end"> 
                    <button class="learn-btn bg-white text-orange-950 border-2 border-orange-950 py-2 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300" onclick="explore()">Explore &rarr;</button>
                </div>
            </div>
        </section>
    @endif
    <!--Library Section-->


    <!-- Workshop section -->
    <section class="flex justify-center items-center my-20">
        <div class="container bg-white p-6 md:p-10 shadow-2xl rounded-2xl flex flex-wrap items-center w-full max-w-8xl overflow-hidden">
            <div class="content w-full lg:w-1/2 pr-5 pl-5 md:pl-10 py-5">
                <h1 class="text-2xl courgette-regular text-gray-800 text-center">TuBao Makeup Academy</h1>
                <h2 class="text-4xl charm-bold text-orange-950 mt-2 mb-5 text-center">WORKSHOP</h2>
                <p class="text-lg quicksand-regular text-gray-600 leading-relaxed mb-8 text-center">
                    Welcome to TuBao Makeup Academy! Explore and enhance your makeup skills with our expert-led workshops. Whether you're a beginner or looking to refine your artistry, join us for hands-on sessions packed with industry insights and practical techniques. Let TuBao Makeup Academy guide you to unleash your creativity and excel in the world of beauty!
                </p>
                    <div class="flex justify-between lg:m-4 -ml-4 mb-8 w-full">
                        <div class="time text-center mr-2 lg:mr-5 flex-1">
                            <div class="time-box bg-orange-900 py-4 px-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
                                <span id="hours" class="text-5xl md:text-6xl text-white font-semibold mb-2">00</span>
                                <p class="m-0 text-white font-light">HOURS</p>
                            </div>
                        </div>
                        <div class="time text-center mr-2 lg:mr-5 flex-1">
                            <div class="time-box bg-orange-900 py-4 px-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
                                <span id="minutes" class="text-5xl md:text-6xl text-white font-semibold mb-2">00</span>
                                <p class="text-base md:text-lg text-white font-light m-0">MINUTES</p>
                            </div>
                        </div>
                        <div class="time text-center mr-2 lg:mr-5 flex-1">
                            <div class="time-box bg-orange-900 py-4 px-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
                                <span id="seconds" class="text-5xl md:text-6xl text-white font-semibold mb-2">00</span>
                                <p class="m-0 text-white font-light">SECONDS</p>
                            </div>
                        </div>
                    </div>
                    <div class="buttons mb-8 flex flex-col md:flex-row justify-center"> 
                        <button class="register-btn bg-orange-700 text-white py-3 px-6 rounded-lg mb-4 md:mb-0 md:mr-5 hover:bg-orange-950 transition duration-300" onclick="registerNow()">Register Now</button>
                        <button class="learn-btn bg-white text-orange-950 border-2 border-orange-950 py-2 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300" onclick="explore()">Explore More</button>
                    </div>
                </div>
            <div class="w-full lg:max-w-lg lg:w-full pl-5 md:pl-20 pr-0">
                <img class="object-cover object-center rounded-2xl" alt="hero" src=" {{ asset('images/home/workshop.jpg') }}">
            </div>
        </div>
    </section>
@endsection