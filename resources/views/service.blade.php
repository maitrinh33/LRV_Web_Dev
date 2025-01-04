@extends('layouts.app')

@section('content')
    <main class="bg-custom">

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
        <!-- Video Background Section -->

        <article class="pt-10 px-4 lg:px-20">"
        <!-- Tittle -->  

            <!-- Brief intro service starts from here -->
            <section class="m-auto max-w-6xl px-16 text-center ">
                <div class="divider">
                    <h2 class="text-orange-950 mb-5 font-bold satisfy-regular">TuBao Makeup Agency</h2>
                </div>
                <div class="text-2xl Yrsa justify-center uppercase mt-6 mb-18">As the leading beauty-focused agency in the US, we are one of the few agencies able to accommodate services of all sizes, large and small</div>
            </section>

      
            <!-- Grid Courses -->
            <div class="max-w-screen-xl 2xl:max-w-screen-2xl px-6 md:px-12 mx-auto py-12 lg:py-12">
                <!-- Starts component -->
                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-6">
                    <article class="mx-auto shadow-xl bg-cover bg-center relative border-8 border-black transform duration-500 hover:-translate-y-12 group mb-5" style="background-image: url('{{ asset('images/service/professional_makeup_service.jpg') }}');">
                        <div class="bg-black relative h-full group-hover:bg-opacity-0 flex flex-wrap flex-col pt-[30rem] hover:bg-opacity-75 transition duration-300">
                            <div class="bg-black p-8 h-full justify-end flex flex-col">
                                <h1 class="text-white text-center mt-2 text-xl mb-5 transform translate-y-20 uppercase group-hover:translate-y-0 duration-300 group-hover:text-orange-500"> 01⏤ Party Makeup Service </h1>
                                <p class="opacity-0 text-white text-center text-xl group-hover:opacity-80 transform duration-500"> Tailored party makeup to create any look</p>
                            </div>
                        </div>
                    </article>
                    <article class="mx-auto shadow-xl bg-cover bg-center relative border-8 border-black transform duration-500 hover:-translate-y-12 group mb-5" style="background-image: url('{{ asset('images/service/bridal_makeup_service.jpg') }}');">
                        <div class="bg-black relative h-full group-hover:bg-opacity-0 flex flex-wrap flex-col pt-[30rem] hover:bg-opacity-75 transition duration-300">
                            <div class="bg-black p-8 h-full justify-end flex flex-col">
                                <h1 class="text-white text-center mt-2 text-xl mb-5 transform translate-y-20 uppercase group-hover:translate-y-0 duration-300 group-hover:text-indigo-400"> 02⏤ Bridal Makeup Service</h1>
                                <p class="opacity-0 text-white text-center text-xl group-hover:opacity-80 transform duration-500"> Glow with breathtaking bridal looks for the big day</p>
                            </div>
                        </div>
                    </article>
                    <article class="mx-auto shadow-xl bg-cover bg-center relative border-8 border-black transform duration-500 hover:-translate-y-12 group mb-5" style="background-image: url('{{ asset('images/service/personal_makeup_service.jpg') }}');">
                        <div class="bg-black relative h-full group-hover:bg-opacity-0 flex flex-wrap flex-col pt-[30rem] hover:bg-opacity-75 transition duration-300">
                            <div class="bg-black p-8 h-full justify-end flex flex-col">
                            <h1 class="text-white text-center mt-2 text-xl mb-5 transform translate-y-20 uppercase group-hover:translate-y-0 duration-300 group-hover:text-cyan-400"> 03⏤ Ceremony Makeup Service </h1>
                            <p class="opacity-0 text-white text-center text-xl group-hover:opacity-80 transform duration-500">Highlighting grace, poise, and refinement beauty</p>
                            </div>
                        </div>
                    </article>
                </div> 
                <!-- ends component -->
            </div>
        <!-- Brief intro ends here-->
    

        <!-- Service start from here-->
            <article class="px-10 md:px-12 py-12 text-center ">
                <div class="divider">
                    <h2 class="text-orange-950 satisfy-regular mb-5 font-bold">Luxury, On-Location Services  ❧</h2>
                </div>
                <div class="text-2xl Yrsa justify-center uppercase mt-6 mb-18">AS YOUR PREMIERE BEAUTY DESTINATION, WE OFFER OUR SERVICES EXCLUSIVELY ON-SITE</div>
                <!-- Include the Party Service Component -->
                <x-service-card :services="$services" />

                <!-- Bridal Service start from here-->
                <section id="bridal" class="mt-12 m-auto -space-y-4 items-center justify-center flex flex-col-reverse md:flex-row md:space-y-0 md:-space-x-4 xl:w-10/12">
                    <div class="relative group md:w-11/12 lg:w-11/12">
                        <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                        <div class="relative p-8 pt-16 md:p-8 md:pl-6 md:rounded-r-2xl lg:p-16">
                            <p class="text-3xl text-gray-700 font-bold">What We Offer:</p>
                            <ul role="list" class="space-y-4 mt-2 mb-2 lg:py-6 lg:px-4 italic mx-auto text-gray-950 lg:pl-32 p-12 text-left justify-center">
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>BRIDAL MAKEUP</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>BRIDALSMAID MAKEUP</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>BRIDAL HAIR</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>BRIDALSMAID HAIR</span>
                                </li>
                            </ul>
                            <p class="flex items-center justify-center space-x-4 text-lg text-gray-950 text-center">
                                <span>Call us at</span>
                                <a href="tel:+24300" class="flex space-x-2 items-center text-orange-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                    <span class="font-semibold">+1 000 000</span>
                                </a>
                            </p>    
                            <div class="buttons flex justify-center mt-4">
                                <button class="register-btn bg-orange-700 text-white py-3 px-6 rounded-lg mr-5 hover:bg-orange-950 transition duration-300" onclick="scrollToSection()">Book Now</button>
                                <button class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-orange-900 hover:text-white transition duration-300">Explore More</button>
                            </div>
                        </div>
                    </div>
                
                    <div class="relative z-10 -mx-4 group md:w-9/12 md:mx-0 lg:w-9/12">
                        <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                        <div class="relative p-6 space-y-6 lg:p-8">
                            <h3 class="text-3xl text-gray-700 font-semibold text-center">02⏤ Bridal Makeup Service</h3>
                            <div>
                                <img src=" {{ asset('images/service/bridal1.jpg') }}" alt="Bridal Image" class="w-full h-auto rounded-2xl">
                            </div>
                            <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center mt-6">
                        </div>
                    </div>
                </section>
                

                
                <!-- Ceremony Service start from here-->
                <section id="ceremony" class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
                    <div class="relative z-10 -mx-4 group md:mx-0 lg:w-9/12">
                        <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                        <div class="relative p-6 space-y-6 lg:p-8">
                            <h3 class="text-3xl text-gray-700 font-semibold text-center">03⏤ Ceremony Makeup Service</h3>
                            <div>
                                <img src=" {{ asset('images/service/ceremony1.jpg') }}" alt="Promotional Image" class="w-full h-auto rounded-2xl">
                            </div>
                            <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center mt-6">
                        </div>
                    </div>

                    <div class="relative group md:w-11/12 lg:w-11/12 ">
                        <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                        <div class="relative p-8 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                            <p class="text-3xl text-gray-700 font-bold">What We Offer:</p>
                            <ul role="list" class="space-y-4 mt-2 mb-2 lg:py-6 lg:px-4 italic mx-auto text-gray-950 lg:pl-32 p-12 text-left justify-center">
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>MAKEUP APPLICATION</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>HAIR STYLING</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>MANICURE & PEDICURE</span>
                                </li>
                                <li class="space-x-2">
                                    <span class="text-orange-700 font-semibold">&check;</span>
                                    <span>TOUCH UPS</span>
                                </li>
                            </ul>
                            <p class="flex items-center justify-center space-x-4 text-lg text-gray-950 text-center">
                                <span>Call us at</span>
                                <a href="tel:+24300" class="flex space-x-2 items-center text-orange-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                    <span class="font-semibold">+1 000 000</span>
                                </a>
                            </p>    
                            <!-- Correct the div tag with appropriate button attributes -->
                            <div class="buttons flex justify-center mt-4">
                                <button class="register-btn bg-orange-700 text-white py-3 px-6 rounded-lg mr-5 hover:bg-orange-950 transition duration-300" onclick="scrollToSection()">Book Now</button>
                                <button class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-orange-900 hover:text-white transition duration-300">Explore More</button>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
            <!--Service ends-->
        </article>


        <!--Map & Contact Form start from here-->
        <section class="pt-10">
            <section id="contact-form-section">  
            <div class="mb-32 mt-16">
                <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8931381602997!2d108.21767827473012!3d16.07103418460873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421836b5f0b5d5%3A0xf372c18deace6db!2zVmnhu4duIE5naGnDqm4gY-G7qXUgdsOgIMSQw6BvIHThuqFvIFZp4buHdCAtIEFuaCwgxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1719549557976!5m2!1svi!2s"
                    width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="flex justify-center"> 
                <!--Contact Form start from here-->
                <div id="book-form" class="container px-6 md:px-12">
                    <div id="book-form" class="block rounded-3xl bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px] border border-gray-300">
                    <h2 class="text-black font-bold text-5xl mb-8 text-center">Book Your Appointment Here</h2>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-1/2 lg:w-1/3 md:px-3 lg:mb-0">
                        <form>
                            @csrf
                            <div class="py-0 px-6" action="" method="POST">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" type="text" placeholder="Enter your name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="phone">Phone Number</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="phone" type="tel" placeholder="Enter your phone number">
                            </div>
                            </div>
                        </form>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/3 md:px-3 lg:mb-0">
                        <form>
                            <div class="py-0 px-6" action="" method="POST">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="date">Date</label>
                                <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="date" type="date" placeholder="Select a date">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="time">Time</label>
                                <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="time" type="time" placeholder="Select a time">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="service">Service</label>
                                <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="service" name="service">
                                <option value="">Select a service</option>
                                <option value="party">Party Makeup Service</option>
                                <option value="bridal">Bridal Makeup Service</option>
                                <option value="ceremony">Ceremony Makeup Service</option>
                                <option value="workshop">Workshop</option>
                                </select>
                            </div>
                            </div>
                        </form>
                        </div>
                        <div class="w-full md:w-full lg:w-1/3 md:px-3 lg:mb-0">
                        <form>
                            <div class="py-0 px-6" action="" method="POST">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="message">Message</label>
                                <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="message" rows="4" placeholder="Enter any additional information"></textarea>
                            </div>
                            <div class="flex items-center justify-center mb-4">
                                <button
                                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-400 focus:outline-none focus:shadow-outline w-full md:w-auto"
                                type="submit">
                                Book Appointment
                                </button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section> 
            
        <!--Call to Action-->
        <div class="bg-gray-950 text-white py-24 px-10">
            <h2 class="text-5xl font-bold text-center mb-10">Ready to step into the best version of you? </h2>
            <div class="flex justify-center space-x-4">
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg">&larr; Contact Us</button>
                <button class="bg-gray-600 border hover:bg-gray-900 px-6 py-3 rounded-lg" onclick="scrollToSection()">Book Now &rarr;</button>
            </div>
        </div>
    </main>
@endsection