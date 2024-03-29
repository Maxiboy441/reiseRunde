<!DOCTYPE html>
<html lang="en">
<x-head/>
<x-nav-bar/>
<body class="bg-gray-100">
<main class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-4 py-4">
            <h2 class="font-bold text-lg mb-4">Create a New Trip</h2>
            <div id="notification" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>
            <form id="tripForm" method="POST" action="/trip" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Trip Name</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="destination" class="block text-gray-700 font-bold mb-2">Destination</label>
                    <input type="text" name="destination" id="destination" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="startDate" class="block text-gray-700 font-bold mb-2">Start Date</label>
                    <input type="date" name="startDate" id="startDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="endDate" class="block text-gray-700 font-bold mb-2">End Date</label>
                    <input type="date" name="endDate" id="endDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="timespan" class="block text-gray-700 font-bold mb-2">
                        <span class="mr-2">Timespan</span>
                        <input type="checkbox" name="timespan" id="timespan" class="align-middle" @change="toggleDurationField">
                    </label>
                </div>
                <div class="mb-4" id="durationField" style="display: none;">
                    <label for="duration" class="block text-gray-700 font-bold mb-2">Duration (in days)</label>
                    <input type="number" name="duration_in_days" id="duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="1">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="vehicle" class="block text-gray-700 font-bold mb-2">Transportation</label>
                    <select name="vehicle" id="vehicle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Select a transportation method</option>
                        <option value="car">Car</option>
                        <option value="plane">Plane</option>
                        <option value="train">Train</option>
                        <option value="motorbike">Motorbike</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image_link" class="block text-gray-700 font-bold mb-2">Trip Image Link (Google Image URL)</label>
                    <input type="text" name="image_link" id="image_link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="trip_link" class="block text-gray-700 font-bold mb-2">Trip Link</label>
                    <input type="text" name="trip_link" id="trip_link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="max_travelers" class="block text-gray-700 font-bold mb-2">Maximum Travelers</label>
                    <input type="number" name="max_travelers" id="max_travelers" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required min="1">
                </div>
                <div class="mb-4">
                    <label for="min_travelers" class="block text-gray-700 font-bold mb-2">Minimum Travelers</label>
                    <input type="number" name="min_travelers" id="min_travelers" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required min="1">
                </div>
                <button type="submit">Test</button>
            </form>
        </div>
    </div>
</main>

<script>
    const form = document.getElementById('tripForm');
    const durationField = document.getElementById('durationField');
    const timespanCheckbox = document.getElementById('timespan');

    function toggleDurationField() {
        durationField.style.display = this.checked ? 'block' : 'none';
    }

    function validateForm(event) {
        event.preventDefault(); // Prevent form submission

        const requiredFields = form.querySelectorAll('input[required], textarea[required], select[required]');
        const missingFields = [...requiredFields].filter(field => field.value.trim() === '');

        const startDate = new Date(form.startDate.value);
        const endDate = new Date(form.endDate.value);
        const minTravelers = parseInt(form.min_travelers.value);
        const maxTravelers = parseInt(form.max_travelers.value);

        if (timespanCheckbox.checked) {
            const duration = parseInt(form.duration.value);
            if (isNaN(duration) || duration < 1) {
                displayNotification('Please enter a valid duration in days.');
                return;
            }
        }

        if (endDate < startDate) {
            displayNotification('The end date must be after the start date.');
            return;
        }

        if (minTravelers > maxTravelers) {
            displayNotification('The minimum number of travelers must be less than or equal to the maximum number of travelers.');
            return;
        }

        if (missingFields.length > 0) {
            const fieldNames = missingFields.map(field => field.labels[0].textContent.trim());
            displayNotification(`Please fill out the following fields: ${fieldNames.join(', ')}`);
            return;
        }

        // Add the CSRF token to the form data
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(form);
        formData.append('_token', csrfToken);

        // Submit the form
        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (response.ok) {
                    // Handle successful form submission
                    console.log('Form submitted successfully');
                } else {
                    // Handle form submission error
                    console.error('Form submission failed');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    }function validateForm(event) {
        event.preventDefault(); // Prevent form submission

        const requiredFields = form.querySelectorAll('input[required], textarea[required], select[required]');
        const missingFields = [...requiredFields].filter(field => field.value.trim() === '');

        const startDate = new Date(form.startDate.value);
        const endDate = new Date(form.endDate.value);
        const minTravelers = parseInt(form.min_travelers.value);
        const maxTravelers = parseInt(form.max_travelers.value);

        if (timespanCheckbox.checked) {
            const duration = parseInt(form.duration.value);
            if (isNaN(duration) || duration < 1) {
                displayNotification('Please enter a valid duration in days.');
                return;
            }
        }

        if (endDate < startDate) {
            displayNotification('The end date must be after the start date.');
            return;
        }

        if (minTravelers > maxTravelers) {
            displayNotification('The minimum number of travelers must be less than or equal to the maximum number of travelers.');
            return;
        }

        if (missingFields.length > 0) {
            const fieldNames = missingFields.map(field => field.labels[0].textContent.trim());
            displayNotification(`Please fill out the following fields: ${fieldNames.join(', ')}`);
            return;
        }

        // Submit the form
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
        })
            .then(response => {
                if (response.ok) {
                    // Handle successful form submission
                    console.log('Form submitted successfully');
                } else {
                    // Handle form submission error
                    console.error('Form submission failed');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    }


    function displayNotification(message) {
        const notificationElement = document.getElementById('notification');
        notificationElement.textContent = message;
        notificationElement.classList.remove('hidden');
        setTimeout(() => notificationElement.classList.add('hidden'), 5000);
    }

    form.addEventListener('submit', validateForm);
    timespanCheckbox.addEventListener('change', toggleDurationField);
    toggleDurationField.call(timespanCheckbox); // Initialize duration field visibility
</script>
</body>
</html>
