<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        /* Thêm Tailwind CSS từ CDN */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            Thank you for your booking, <span class="text-blue-500">{{ $booking->name }}</span>
        </h1>
        <p class="text-gray-600 mb-4">We are pleased to confirm your booking.</p>

        <p class="text-gray-800 font-semibold">Booking Details:</p>
        <ul class="list-disc list-inside text-gray-700 mb-4">
            <li><strong>Service:</strong> {{ $booking->service }}</li>
            <li><strong>Date:</strong> {{ $booking->date }}</li>
            <li><strong>Time:</strong> {{ $booking->time }}</li>
        </ul>

        <p class="text-gray-600 mb-4">
            We will contact you shortly for further confirmation. If you have any questions, feel free to reach out to us at 
            <a href="mailto:support@example.com" class="text-blue-500 underline">support@example.com</a>.
        </p>

        <p class="text-gray-800 font-bold">Thank you for choosing our services!</p>
    </div>
</body>
</html>
