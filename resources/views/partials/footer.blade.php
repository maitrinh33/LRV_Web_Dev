<!--Footer start from here-->
    <footer class="w-full bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!--Grid-->
            <div class="grid grid-cols-12 gap-8 py-14 lg:grid-cols-8">
                <div class="mb-0 col-span-full lg:col-span-3 ">
                
                    <div class="flex justify-between items-center">
                        <div class="text-3xl cursor-pointer flex items-center">
                            <a href="index.html" class="flex justify-center lg:justify-start items-center">
                                <img src="{{ asset('images/logo/tblogo.png') }}" alt="Tubao Makeup" class="items-center mr-2 w-10 h-auto">
                                <a href="{{ url('/') }}" class="lavishly-yours-bold">TuBao Makeup Academy</a>
                            </a>
                        </div>
                    </div>
  
                    <p class="py-8  text-gray-500 lg:max-w-xs text-center lg:text-left">Trusted in more than 20 countries & 1 million customers. Follow us on social media.</p>
                    <div class="flex mt-4 space-x-4 justify-center lg:justify-start sm:mt-0">
                        <a href="https://www.tiktok.com/@vnuk.official" class="w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center">
                            <img src="{{ asset('images/social/icons8-tiktok-48.png') }}" alt="TikTok Icon" class="w-full h-full rounded-full">
                        </a>
                        <a href="https://www.facebook.com/vnuk.edu.vn" class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center">
                            <!-- Facebook Icon -->
                            <img src="{{ asset('images/social/icons8-facebook-48.png') }}" alt="Facebook Icon" class="w-full h-full rounded-full">
                        </a>
                        <a href="https://www.instagram.com/vnuk.edu.vn/" class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center ">
                            <!-- Instagram Icon -->
                            <img src="{{ asset('images/social/icons8-instagram-48.png') }}" alt="Facebook Icon" class="w-full h-full rounded-full">
                        </a>
                        <a href="https://www.youtube.com/@vnukdanang" class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center">
                            <!-- YouTube Icon -->
                            <img src="{{ asset('images/social/icons8-youtube-48.png') }}" alt="YouTube Icon" class="w-full h-full rounded-full">
                        </a>
                    </div>
                
                </div>
                <!--End Col-->
                <div class="w-full text-center lg:w-auto lg:text-left col-span-full sm:col-span-4 md:col-span-4 lg:col-span-2 ">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Get In Touch</h4>
                    <ul class="text-gray-600  transition-all duration-500">
                        <li class="mb-6">support@tubaomakeup.com</li>
                        <li class="mb-6">+84 123 456 789</li>
                        <li class="mb-6" >158A Le Loi street, Danang, Vietnam.</li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="w-full text-center lg:w-auto lg:text-left col-span-full sm:order-last sm:col-span-4 md:col-span-4 lg:order-none lg:col-span-1">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Home</h4>
                    <ul class="text-gray-600 transition-all duration-500  ">
                        <li class="mb-6"><a href="{{ url('/intros') }}"  class="text-gray-600 hover:text-gray-900">Introduction</a></li>
                        <li class="mb-6"><a href="{{ url('/courses') }}"  class="text-gray-600 hover:text-gray-900">Course</a></li>
                        <li class="mb-6"><a href="{{ url('/services') }}"  class="text-gray-600 hover:text-gray-900">Service</a></li>
                        <li class="mb-6"><a href="#"  class=" text-gray-600 hover:text-gray-900">Library</a></li>
                        <li class="sm:mb-6"><a href="{{ url('/blogs') }}"  class=" text-gray-600 hover:text-gray-900">Blog</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="w-full text-center lg:w-auto lg:text-left col-span-full sm:col-span-4 md:col-span-4 lg:col-span-2 ">
                    <h4 class="text-lg text-center text-gray-900 font-medium mb-7 lg:text-left">Newsletter</h4>
                    <div class="flex flex-col items-center lg:items-start">
                        <input type="text" class="w-full h-12 border border-gray-300 rounded-full py-2.5 px-5 shadow-sm text-gray-800 mb-5 text-center lg:text-left placeholder:text-gray-400 focus:outline-none focus:border-gray-500"  placeholder="Your email here.."/>
                        <button type="submit" class="h-11 py-3 px-6 bg-black transition-all duration-500 shadow-md rounded-full text-sm text-white font-semibold w-fit hover:gray-500">Subscribe</button>
                    </div>
                </div>
            
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-200">
                <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
                    <span class="text-sm text-gray-500 ">©<a href="https://tubaomakeup.com">TuBao Makeup</a> 2024, All rights reserved.</span>
                    <ul class="flex items-center gap-9 mt-4 lg:mt-0">
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Terms</a></li>
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Privacy</a></li>
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
<!--Footer ends here-->
