<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Show the notification using the component
            const notificationContainer = document.getElementById('notification-container');
            notificationContainer.innerHTML = `<x-notification type="success" message="${data.message}" />`;
            notificationContainer.style.display = 'block'; // Show the notification

            // Optionally, refresh the page after a delay
            setTimeout(() => {
                location.reload(); // Refresh the page
            }, 2000); // Adjust delay as needed
        })
        .catch(error => {
            const notificationContainer = document.getElementById('notification-container');
            notificationContainer.innerHTML = `<x-notification type="error" message="${error.message}" />`;
            notificationContainer.style.display = 'block'; // Show the notification
        });
    });
</script>
<style>
    .notification {
    transition: opacity 0.5s ease;
    margin: 1rem 0;
}

.notification.success {
    background-color: #d4edda; /* light green background */
    color: #155724; /* dark green text */
}

.notification.error {
    background-color: #f8d7da; /* light red background */
    color: #721c24; /* dark red text */
}
</style>

<div class="notification {{ $type }} fixed top-0 right-0 m-4 p-4 rounded-lg shadow-lg {{ $type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
    <strong>{{ ucfirst($type) }}!</strong> {{ $message }}
    <button class="ml-2" onclick="this.parentElement.style.display='none'">×</button>
</div>