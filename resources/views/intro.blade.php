@extends('layouts.app')

@section('content') 
 <!-- Video Background Section -->
      <main class="bg-custom">
        <div class="w-full h-400 relative bg-fixed bg-cover bg-center bg-no-repeat video-section" style="height: 470px;">
            <video class="h-full w-full object-cover rounded-lg" autoplay muted loop>
                <source src="{{ asset('images/intro/Video Welcome.mp4') }}" type="video/mp4"/>
                Your browser does not support the video tag.
            </video>
            <div class="absolute inset-0 flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="text-center text-white animate__animated animate__fadeIn">
                    <h1 class="text-6xl font-bold mb-4">Welcome to Your Makeup Journey</h1>
                    <p class="text-xl mb-8">Discover new skills and technic that awake your beauty</p>
                </div>
            </div>
        </div>

        <!-- Section 1 -->
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="subtitle">TuBao Makeup</div>
                <h2 class="section-title">WHY SHOULD CHOOSE</h2>    
                <p class="mt-4 text-2xl text-gray-800">With over 10 years of experience in the field of makeup and training students, TuBao Makeup has gradually become influential in the professional domain and has brought significant value to the community.</p>
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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="relative">
                    <div class="deformed-circle">
                        <img src={{ asset('images/intro/original.jpg') }} alt="Placeholder Image" class="object-cover w-full h-full">
                    </div>
                    <div class="experience-badge">
                        <div>
                            10+ Years Experience
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <span class="text-brown uppercase font-bold">Benefits</span>
                        <h2 class="text-4xl font-extrabold text-gray-900 mt-2">WHEN JOIN<span class="text-brown"> TuBao Makeup</span></h2>
                    </div>
                    <p class="text-lg text-black mb-6">The curriculum is full of knowledge with lessons from basic to advanced. We continuously update the latest beauty trends today, ensuring that students after finishing the course will be fully equipped with basic knowledge and good practice of the most modern technologies.</p>
                    <ul class="text-black space-y-4 mb-6">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Cosmetic support is provided during the study period
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Have the opportunity to go on reality shows to improve your skills
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Support in building brand image and orientation after graduation
                        </li>
                    </ul>
                    <div class="flex space-x-4">
                        <button class="bg-white text-gray-900 py-2 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition duration-300">Learn more</button>
                        <button class="bg-brown text-white py-2 px-4 rounded-lg hover:bg-brown transition duration-300" onclick="openModal()">Enroll now</button>
                    </div>
                </div>
            </div>
        </section>
   

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


        <article id="student">
            <section class="bg-black">
            <div class="mx-auto max-w-[1340px] px-4 py-16 sm:px-6 lg:me-0 lg:py-16 lg:pe-0 lg:ps-8 xl:py-24">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16">
                
                <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    <div class="subtitle">TuBao Makeup </div>
                    <h2 class="text-4x1 font-bold tracking-tight text-central text-white sm:text-4xl">
                    STUDENT'S REVIEW
                    </h2>
                    
                    <p class="mt-4 text-2xl italic text-white">
                    What do people say about us?
                    </p>


                    <div class="mt-8 flex justify-center gap-4 lg:hidden button-container">
                    <button
                        aria-label="Previous slide"
                        id="keen-slider-previous"
                        class="square-button"
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
                        class="square-button"
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
            </article>

            <!--end student's showcase-->


        <article class="bg-cyan-400 px-6 py-3">
            <div class="relative pr-6">
                <div class="flex flex-wrap items-center justify-center gap-4 text-center">
                    <p class="inline-flex items-center text-sm font-medium text-white lg:text-base">
                        <span class="text-lg">🔔</span>
                        Quickly receive 30% discount!! Sale ends in
                    </p>


                    <div id="countdown" class="inline-flex items-center gap-2 text-lg font-medium text-white">
                        <div class="flex flex-col items-center">
                            <span id="days" class="rounded-lg bg-blue-500 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">days</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="hours" class="rounded-lg bg-blue-500 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">hours</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="minutes" class="rounded-lg bg-blue-500 px-4 py-2 shadow-lg"></span>
                            <div class="text-sm mt-1">minutes</div>
                        </div>
                        <span>:</span>
                        <div class="flex flex-col items-center">
                            <span id="seconds" class="rounded-lg bg-blue-500 px-4 py-2 shadow-lg"></span>
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
        </article>


        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("Aug 17, 2024 00:00:00").getTime();


            // Update the countdown every 1 second
            var x = setInterval(function () {
                // Get today's date and time
                var now = new Date().getTime();


                // Find the distance between now and the count down date
                var distance = countDownDate - now;


                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                // Display the result in the corresponding elements
                document.getElementById("days").textContent = days < 10 ? '0' + days : days;
                document.getElementById("hours").textContent = hours < 10 ? '0' + hours : hours;
                document.getElementById("minutes").textContent = minutes < 10 ? '0' + minutes : minutes;
                document.getElementById("seconds").textContent = seconds < 10 ? '0' + seconds : seconds;


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>



            <!--Map & Contact Form start from here-->
            <section class="text-gray-600 body-font relative">
                <div class="my-20 container py-2 mx-auto flex sm:flex-nowrap flex-wrap">
                    <div class="lg:w-2/3 bg-gray-300 overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                            marginwidth="0" scrolling="no"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8931381602997!2d108.21767827473012!3d16.07103418460873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421836b5f0b5d5%3A0xf372c18deace6db!2zVmnhu4duIE5naGnDqm4gY-G7qXUgdsOgIMSQw6BvIHThuqFvIFZp4buHdCAtIEFuaCwgxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1sen!2s!4v1719385593947!5m2!1sen!2s"
                            style="filter: opacity(0.8);"></iframe>
                        <div class="bg-white relative flex flex-wrap lg:pl-10 lg:py-6 px-4 py-2 mx-6 rounded-2xl shadow-md">
                            <div class="w-1/2">
                                <h2 class=" font-semibold text-gray-900 tracking-widest lg:text-xs" style="font-size: 10px;">ADDRESS</h2>
                                <p class="mt-0 text-left">VN-UK Institute for Research and Executive Education - 158A Le Loi, Danang, Vietnam</p>
                            </div>
                            <div class="w-1/2 mt-0 lg:mt-4 lg-pl-6">
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
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg">Book Now &rarr;</button>
            </div>
        </div>
    </main>

@endsection  