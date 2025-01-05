<div id="book-form" class="container px-6 md:px-12">
    <div class="block rounded-3xl bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px] border border-gray-300">
        <h2 class="text-black font-bold text-5xl mb-8 text-center">Book Your Appointment Here</h2>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 lg:w-1/3 md:px-3 lg:mb-0">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name" type="text" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" name="email" type="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="phone">Phone Number</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="phone" name="phone" type="tel" placeholder="Enter your phone number" required>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 md:px-3 lg:mb-0">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="date">Date</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="date" name="date" type="date" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="time">Time</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="time" name="time" type="time" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="service">Service</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="service" name="service" required>
                            <option value="">---- Select Service ----</option>
                            @foreach($services as $service)
                                <option value="{{ $service->name }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full md:w-full lg:w-1/3 md:px-3 lg:mb-0">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="message">Message</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="message" name="message" rows="4" placeholder="Enter any additional information"></textarea>
                    </div>
                    <div class="flex items-center justify-center mb-4">
                        <button
                            class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-400 focus:outline-none focus:shadow-outline w-full md:w-auto"
                            type="submit">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>