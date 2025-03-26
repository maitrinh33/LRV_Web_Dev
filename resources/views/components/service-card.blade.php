<!-- service-card.blade.php -->
<div id="servicesContainer">
    @foreach($services as $index => $service)
        <div id="{{ $service->slug }}" class=" service-card flex justify-center items-center py-20">
            <div class="flex flex-col md:flex-row bg-white/60 rounded-2xl shadow-lg transition duration-500 group-hover:scale-105 w-full max-w-4xl">
                <!-- Left Image Section -->
                <div class="flex justify-center md:w-1/2 p-2 md:p-10 lg:w-9/12">
                    <img src="{{ asset($service->image_path) }}" alt="Promotional Image" class="rounded-2xl w-full h-auto" loading="lazy" />
                </div>
                
                <!-- Right Content Section -->
                <div class="w-full md:w-1/2 lg:w-5/6 text-black p-10 space-y-6 rounded-2xl flex justify-center items-center text-center">
                    <div class="space-y-4">
                        <h1 class="text-3xl text-gray-700 font-bold">{{ $service->name }}</h1>
                        <p class="text-lg text-gray-600 mt-2">{{ $service->description }}</p>
                        <ul class="space-y-2 text-gray-950">
                            @if ($service->offered_services)
                                @foreach(json_decode($service->offered_services) as $offered_service)
                                    <li class="flex items-center space-x-2">
                                        <span class="text-orange-700 font-semibold">&check;</span>
                                        <span class="quicksand font-semibold">{{ $offered_service }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>No services offered.</li>
                            @endif
                        </ul>
                        <p class="text-lg text-gray-950 text-center">
                            Call us at <a href="tel:+24300" class="text-orange-700 font-semibold">+1 000 000</a>
                        </p>
                        <div class="buttons flex justify-center mt-4 space-x-4">
                            <button class="register-btn bg-orange-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-950 transition duration-300" onclick="scrollToSection()">Book Now</button>
                            <button class="learn-btn bg-white text-orange-900 border-2 border-orange-950 py-3 px-6 rounded-lg hover:bg-orange-900 hover:text-white transition duration-300">Explore More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let keyword = this.value.trim();
    
        if (keyword.length >= 2) {
            fetch(/services/search?keyword=${keyword})
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = "";
                    if (data.data.length > 0) {
                        searchResults.classList.remove("hidden");
                        data.data.forEach(service => {
                            let item = document.createElement("li");
                            item.classList.add("p-2", "cursor-pointer", "hover:bg-gray-200", "border-b");
                            item.textContent = service.name;
                            item.dataset.url = /services#${service.slug};

                            item.addEventListener("click", () => {
                                window.location.href = item.dataset.url;
                                smoothScrollToSection(service.slug);
                            });

                            searchResults.appendChild(item);
                        });
                    } else {
                        searchResults.classList.remove("hidden");
                        searchResults.innerHTML = <li class="p-2 text-gray-500">No results found</li>;
                    }
                })
                .catch(error => console.error('Error fetching search results:', error));
        } else {
            searchResults.classList.add("hidden"); // Hide search results when input is cleared
            searchResults.innerHTML = ""; // Clear previous search results
        }
    });
</script>

<!--script for scrollToBookingForm-->
<script>
    function scrollToSection() {
        const bookingForm = document.getElementById('book-form');
        if (bookingForm) {
            bookingForm.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
