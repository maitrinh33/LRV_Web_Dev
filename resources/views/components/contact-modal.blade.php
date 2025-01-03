<!-- Floating Button -->
<button id="floatingButton" class="fixed bottom-8 right-5 bg-[#3f170c] text-white quicksand text-lg w-48 rounded-full py-3 px-4 shadow-lg hover:bg-orange-950 transition duration-300" onclick="toggleModal()">
    Contact Now 🪄
</button>

<!-- Contact Modal -->
<div id="contactModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950 to-gray-900 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="text-white relative px-4 py-10 bg-orange-700 shadow-lg sm:rounded-3xl sm:p-20">
            <div class="text-center pb-6">
                <h1 class="text-3xl">Contact Us</h1>
                <p class="text-gray-300">Fill up the form below to send us a message.</p>
            </div>

            <form onsubmit="event.preventDefault(); showSuccessAlert();">
                <input class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Name" name="name" required>
                <input class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Email" name="email" required>
                <input class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" placeholder="Phone Number" name="phone" required>
                <textarea class="shadow mb-4 min-h-0 appearance-none border rounded h-64 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Type your message here..." name="message" required></textarea>
                <div class="flex justify-between">
                    <button type="submit" class="bg-white text-orange-900 border-2 border-orange-950 hover:bg-yellow-900 hover:text-white transition duration-300 font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Send</button>
                </div>
            </form>

            <!-- Close Button -->
            <button class="absolute top-0 right-0 mt-4 mr-4 text-white font-bold" onclick="closeModal()">&times;</button>
        </div>
    </div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('contactModal');
        modal.classList.toggle('hidden');
    }

    function showSuccessAlert() {
        alert('Thank you for your message!');
        closeModal(); 
    }

    function closeModal() {
        document.getElementById('contactModal').classList.add('hidden');
    }
</script>