<div>
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <!-- Image with fallback -->
            <img src="{{ asset('images/course/' . $course->image_url) }}" alt="{{ $course->name }}" class="h-80 w-72 object-cover rounded-t-xl">
            <div class="px-4 py-3 w-72">
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $course->name }}</p>
                <div class="flex items-center">
                    <!-- Price -->
                    <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $course->price }}</p>
                    
                    <!-- Original Price if available -->
                    @if ($course->original_price)
                        <del>
                            <p class="text-sm text-gray-600 cursor-auto ml-2">${{ $course->original_price }}</p>
                        </del>
                    @endif
                </div>
            </div>
        </a>
    </div> 
</div>
