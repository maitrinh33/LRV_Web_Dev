@extends('layouts.app')

@section('content') 
<!--Header - Homepage-->
    <main class="bg-custom">
        <!--Header - Homepage-->
        <article class="pt-20 px-4 lg:px-20">"
            <section class="flex flex-wrap rounded-2xl lg:flex-nowrap">
                <div class="relative flex flex-col lg:max-w-screen-xl lg:flex-row w-full">
                    <!-- Left Column --> 
                    <div class="w-full lg:w-1/2 lg:px-10">
                        <div class="mb-16 lg:max-w-lg">
                            <div class="mb-6">
                                <h2 class="mb-6 text-4xl lg:text-8xl font-bold tracking-tight text-black sm:leading-snug">
                                    Tu Bao <br />
                                    <span class="inline-block font-bold text-orange-600">Makeup Academy</span>
                                </h2>
                                <p class="text-justify text-black text-lg">
                                    With over 10 years of experience in the field of makeup and training students, TuBao Makeup has gradually become influential in the professional domain and has brought significant value to the community.
                                </p>
                            </div>
                            <div class="flex items-center">
                                <a href="/src/html/intro.html" class="inline-flex h-12 items-center justify-center rounded-xl bg-orange-600 px-6 font-medium tracking-wide text-white shadow-md outline-none transition duration-200 hover:bg-orange-400"> About Us </a>
                            </div>
                        </div>
                    </div>
                    <!-- Left Column --> 
    
                    <!-- Right Column -->
                    <div class="w-full lg:ml-20 lg:w-2/6 flex justify-center lg:justify-end py-10 lg:py-0">
                        <!-- Column 1 -->
                        <div class="w-1/2 lg:w-auto lg:pr-4">
                            <div class="overflow-hidden pt-10 rounded-lg transition-transform transform hover:scale-105">
                                <img class="h-full w-full object-contain" src=" {{ asset('images/home/headerhome1.jpg') }}" alt="hihi"/>
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="w-1/2 md::w-full lg:w-full lg:h-auto flex flex-col space-y-4 lg:space-y-8">
                            <div class="h-40 overflow-hidden rounded-xl transition-transform transform hover:scale-105">
                                <img class="h-full w-full object-contain object-bottom" src=" {{ asset('images/home/headerhome2.jpg') }}" alt=""/>
                            </div>
                            <div class="h-40 overflow-hidden rounded-xl transition-transform transform hover:scale-105">
                                <img class="h-full w-full object-contain object-bottom" src=" {{ asset('images/home/headerhome3.jpg') }}" alt=""/>
                            </div>
                            <div class="h-40 overflow-hidden rounded-xl transition-transform transform hover:scale-105">
                                <img class="h-full w-full object-contain object-bottom" src=" {{ asset('images/home/headerhome5.jpg') }}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column -->
                </div>
            </section>
    
    
            
        <!-- Horizontal Orange Line -->
        <div class="w-full border-t-2 border-white mt-10"></div>
            
    
        <!--TuBao Makeup Course-->
            <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom my-20 pb-2">
              <h1 class="text-5xl font-bold text-gray-800 mb-16 text-center">TuBao Makeup Course</h1>            
                <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!--Card 1 - Personal Make up-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40 ">
                            <img class="card-img w-full h-full object-cover" src=" {{ asset('images/home/course1.jpg') }}" alt="Personal Makeup Course"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
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
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                    <!--Card 2 - Professional Make Up-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                            <img class="card-img w-full h-full object-cover" src=" {{ asset('images/home/course2.jpg') }}" alt="Professional Makeup Course"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
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
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                    <!--Card 3 - Bridal Make up-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                            <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/course3.jpg') }}" alt="Bridal Makeup Course"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
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
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>
                <!--Link to the next page-->
                <div class="mt-6 text-center">
                    <div class="buttons mb-8 flex justify-end">
                        <!-- Changed button to anchor tag -->
                        <a href="/src/html/course.html" class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300">
                            Explore &rarr;
                        </a>
                    </div>
                </div>
            </section>
    
    
        <!--Service Section-->
            <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom my-20 pb-2">
                <h1 class="text-5xl font-bold text-gray-800 mb-16 text-center">TuBao Makeup Service</h1>
                <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!--Card 1 - Party Make up Service-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40 ">
                            <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service1.jpg') }}" alt="Party Makeup Service"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Party Makeup Service
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-justify">
                                Be the star of the night with our Party Makeup Service. Ideal for birthdays, galas, and nights out, we create bold, head-turning looks that match your personality and event vibe, ensuring a flawless, long-lasting finish.
                        </div>
                        <div class="p-6 pt-0 flex justify-between">
                            <button class="btn flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Read More
                            </button>
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Booking Now
                            </button>
                        </div>
                    </div>
                    <!--Card 2 - Bridal Makeup Service-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                            <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service2.jpg') }}" alt="Professional Makeup Service"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
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
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Booking Now
                            </button>
                        </div>
                    </div>
                    <!--Card 3 - Ceremny Makeup Service-->
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl transition-all hover:shadow-custom">
                        <div class="relative h-64 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl shadow-blue-gray-500/40">
                            <img class="card-img w-full h-full object-cover object-top" src=" {{ asset('images/home/service3.jpg') }}" alt="Bridal Makeup Service"/>
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl text-center antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
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
                            <button class="btn-secondary flex-1 mx-1 align-middle select-none font-sans font-bold text-center uppercase text-xs py-3 px-6 rounded-lg shadow-md focus:opacity-85 active:opacity-85" type="button">
                                Booking Now
                            </button>
                        </div>
                    </div>
                </div>
                <!--Link to the next page-->
                <div class="mt-6 text-center">
                    <div class="buttons mb-8 flex justify-end"> 
                        <a href="/src/html/service.html" class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300">
                            Explore &rarr;
                        </a>
                    </div>
                </div>
            </section>
    
            <!--Library Section-->
            <section class="container mx-auto p-20 bg-white shadow-lg rounded-2xl shadow-custom lg:my-20 pb-2">
                <h1 class="text-5xl font-bold text-gray-800 mb-16 text-center">TuBao Makeup Library</h1>
                <div class="flex items-center justify-center h-fit ">
                    <div class="flex [&:hover>div]:w-14 [&>div:hover]:w-[20rem] ">
                        <div class="group relative h-96 w-[20rem] cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra1.jpg') }}" alt="lib1 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-sembold text-xl text-gray-100">Personal Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                        <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra2.jpg') }}" alt="lib 2 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-sembold text-xl text-gray-100">Personal Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra3.jpg') }}" alt="lib 3 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-semibold text-xl text-gray-100">Professional Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                        <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                        <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra4.jpg') }}" alt="lib 4 image"/>>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-semibold text-xl text-gray-100">Personal Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra5.jpg') }}" alt="lib 5 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-semibold text-xl text-gray-100">Bridal Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra6.jpg') }}" alt="lib 6 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-semibold text-xl text-gray-100">Professional Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra7.jpg') }}" alt="lib 7 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-sembold text-xl text-gray-100">Bridal Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="group relative h-96 w-14 cursor-pointer overflow-hidden shadow-lg shadow-black/30 transition-all duration-200">
                            <img class="h-full object-cover transition-all group-hover:rotate-12 group-hover:scale-125" src=" {{ asset('images/home/libra8.jpg') }}" alt="lib 8 image"/>
                            <div class="invisible absolute inset-0 bg-gradient-to-b from-green-500/20 to-black group-hover:visible">
                                <div class="absolute inset-x-5 bottom-6">
                                    <div class="flex gap-3 text-white">
                                        <div>
                                            <p class="font-sembold text-xl text-gray-100">Professional Makeup</p>
                                            <p class="text-gray-300">TuBao Makeup</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 text-gray-200">
                                        <svg width="22" height="22" viewBox="0 0 512 512">
                                            <path d="M265 96c65.3 0 118.7 1.1 168.1 3.3h1.4c23.1 0 42 22 42 49.1v1.1l.1 1.1c2.3 34 3.4 69.3 3.4 104.9.1 35.6-1.1 70.9-3.4 104.9l-.1 1.1v1.1c0 13.8-4.7 26.6-13.4 36.1-7.8 8.6-18 13.4-28.6 13.4h-1.6c-52.9 2.5-108.8 3.8-166.4 3.8h-10.6.1-10.9c-57.8 0-113.7-1.3-166.2-3.7h-1.6c-10.6 0-20.7-4.8-28.5-13.4-8.6-9.5-13.4-22.3-13.4-36.1v-1.1l-.1-1.1c-2.4-34.1-3.5-69.4-3.3-104.7v-.2c-.1-35.3 1-70.5 3.3-104.6l.1-1.1v-1.1c0-27.2 18.8-49.3 41.9-49.3h1.4c49.5-2.3 102.9-3.3 168.2-3.3H265m0-32.2h-18c-57.6 0-114.2.8-169.6 3.3-40.8 0-73.9 36.3-73.9 81.3C1 184.4-.1 220 0 255.7c-.1 35.7.9 71.3 3.4 107 0 45 33.1 81.6 73.9 81.6 54.8 2.6 110.7 3.8 167.8 3.8h21.6c57.1 0 113-1.2 167.9-3.8 40.9 0 74-36.6 74-81.6 2.4-35.7 3.5-71.4 3.4-107.1.1-35.7-1-71.3-3.4-107.1 0-45-33.1-81.1-74-81.1C379.2 64.8 322.7 64 265 64z" fill="currentColor" />
                                            <path d="M207 353.8V157.4l145 98.2-145 98.2z" fill="currentColor" />
                                        </svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="currentColor" d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" /></svg>
                                        <svg width="20" height="20" viewBox="0 0 15 15"><path fill="none" stroke="currentColor" d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="mt-6 text-center">
                    <div class="buttons mb-8 flex justify-end"> 
                        <button class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-yellow-900 hover:text-white transition duration-300" onclick="explore()">Explore &rarr;</button>
                    </div>
                </div>
            </section>
    
    
        <!-- Workshop section -->
        <section class="flex justify-center items-center my-20">
            <div class="container bg-white p-6 md:p-10 shadow-2xl rounded-2xl flex flex-wrap items-center w-full max-w-8xl overflow-hidden">
                <div class="content w-full lg:w-1/2 pr-5 pl-5 md:pl-10 py-5">
                    <h1 class="text-2xl text-gray-800 text-center">TuBao Makeup Academy</h1>
                    <h2 class="text-4xl text-orange-950 mt-2 mb-5 text-center">WORKSHOP</h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-8 text-center">
                        Welcome to TuBao Makeup Academy! Explore and enhance your makeup skills with our expert-led workshops. Whether you're a beginner or looking to refine your artistry, join us for hands-on sessions packed with industry insights and practical techniques. Let TuBao Makeup Academy guide you to unleash your creativity and excel in the world of beauty!
                    </p>
                    <div class="flex justify-between lg:m-4 -ml-4 mb-8 w-full">
                        <div class="time text-center mr-2 lg:mr-5 flex-1">
                            <div class="time-box bg-orange-900 py-4 px-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
                                <span id="hours " class="text-5xl md:text-6xl text-white font-semibold mb-2">00</span>
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
                    <div class="buttons mb-8 flex flex-col md:flex-row justify-center"> <!-- Reduced margin here -->
                        <button class="register-btn bg-orange-700 text-white py-3 px-6 rounded-lg mb-4 md:mb-0 md:mr-5 hover:bg-orange-800 transition duration-300" onclick="registerNow()">Register Now</button>
                        <button class="learn-btn bg-white text-orange-900 border-2 border-orange-800 py-3 px-6 rounded-lg hover:bg-orange-700 hover:text-white transition duration-300" onclick="explore()">Explore More</button>
                    </div>
                </div>
                <div class="w-full lg:max-w-lg lg:w-full pl-5 md:pl-20 pr-0">
                    <img class="object-cover object-center rounded-2xl" src=" {{ asset('images/home/work1.jpg') }}" alt="work1"/>
                </div>
            </div>
            <script src=" {{ asset('scripts/counttime.js') }}"></script>
        </section>
    
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
        </article>
        <!--Call to Action-->
        <div class="bg-gray-950 text-white py-24 px-10">
            <h2 class="text-5xl font-bold text-center mb-10">Ready to step into the best version of you? </h2>
            <div class="flex justify-center space-x-4">
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg" onclick="openModal()">&larr; Contact Us</button>
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg" onclick="scrollToSection()" >Book Now &rarr;</button>
            </div>
        </div>
@endsection