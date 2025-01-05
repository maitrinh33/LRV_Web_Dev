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

            </article>
            <!--Service ends-->
        </article>


        <!-- Map & Contact Form start from here -->
        <section class="pt-10">
            <section id="contact-form-section">  
                <div class="mb-32 mt-16">
                    <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8931381602997!2d108.21767827473012!3d16.07103418460873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421836b5f0b5d5%3A0xf372c18deace6db!2zVmnhu4duIE5naGnDqm4gY-G7qXUgdsOgIMSQw6BvIHThuqFvIFZp4buHdCAtIEFuaCwgxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1719549557976!5m2!1svi!2s"
                            width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="flex justify-center"> 
                        <x-booking-form :services="$services" />
                    </div>
                </div>
            </section> 
        </section>

{{-- Check for flash notification --}}
@if (session()->has('notification'))
    @php $notification = session('notification'); @endphp
    <div class="{{ $notification['type'] === 'success' ? 'bg-green-500' : 'bg-red-500' }} py-2 px-4 rounded-md text-white text-center fixed top-4 right-4 flex gap-4 z-50">
        <p>{{ $notification['message'] }}</p>
        <span class="cursor-pointer quicksand font-bold" onclick="return this.parentNode.remove()"><sup>X</sup></span>
    </div>
@endif

{{-- Check for regular message --}}
@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>
@endif



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