<section id="service" class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
    @foreach($services as $service)
        <div class="relative z-10 -mx-4 group md:w-9/12 md:mx-0 lg:w-9/12">
            <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
            <div class="relative p-6 space-y-6 lg:p-8">
                <h3 class="text-3xl text-gray-700 font-semibold text-center">{{ $service->name }}</h3>
                <div>
                    <img src="{{ asset($service->image_path) }}" alt="Promotional Image" class="w-full h-auto rounded-2xl">
                </div>
            </div>
        </div>

        <div class="relative group md:w-11/12 lg:w-11/12 ">
            <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
            <div class="relative p-8 pt-16 md:p-8 md:pl-6 md:rounded-r-2xl lg:p-16">
                <p class="text-3xl justify-left text-gray-700 font-bold">What We Offer:</p>
                <p class="flex items-left text-left justify-center text-lg text-gray-600 mt-6">
                    {{ $service->description }}
                </p>
                <ul role="list" class="space-y-4 mt-2 mb-2 lg:py-6 lg:px-4 italic mx-auto text-gray-950 lg:pl-28 p-12 text-left justify-center">
                    @if ($service->offered_services)
                        @foreach(json_decode($service->offered_services) as $offered_service)
                            <li class="space-x-2">
                                <span class="text-orange-700 font-semibold">&check;</span>
                                <span>{{ $offered_service }}</span>
                            </li>
                        @endforeach
                    @else
                        <li>No services offered.</li>
                    @endif
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
    @endforeach
</section>
