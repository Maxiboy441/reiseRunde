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
            <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                    <label for="timespan" class="block text-gray-700 font-bold mb-2">Exact Dates?</label>
                    <input type="checkbox" name="timespan" id="timespan" class="mr-2">
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
                    {{--TODO: Use cloudanary or something like that--}}
                    {{--TODO: Maybe add a tutorial how to copy good image urls--}}
                    <label for="image_link" class="block text-gray-700 font-bold mb-2">Trip Image (jpg/png/... for good resolution)</label>
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
                <div class="flex items-center justify-between mb-4">
                    <x-button text="Erstellen" type="submit" class="ml-auto"></x-button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function validateForm() {
        var requiredFields = document.querySelectorAll('input[required], textarea[required], select[required]');
        var missingFields = [];

        for (var i = 0; i < requiredFields.length; i++) {
            if (requiredFields[i].value.trim() === '') {
                missingFields.push(requiredFields[i].id);
            }
        }

        var startDate = new Date(document.getElementById('startDate').value);
        var endDate = new Date(document.getElementById('endDate').value);
        var minTravelers = parseInt(document.getElementById('min_travelers').value);
        var maxTravelers = parseInt(document.getElementById('max_travelers').value);


        if (endDate < startDate) {
            displayNotification('The end date must be after the start date.');
            return false;
        }

        if (minTravelers > maxTravelers) {
            displayNotification('The minimum number of travelers must be less than or equal to the maximum number of travelers.');
            return false;
        }

        if (missingFields.length > 0) {
            var fieldNames = missingFields.map(function(field) {
                return document.querySelector('label[for="' + field + '"]').textContent.trim();
            });
            displayNotification('Please fill out the following fields: ' + fieldNames.join(', '));
            return false;
        }

        return true;
    }

    {{--TODO: Fix alert --}}
    function displayNotification(message) {
        var notificationElement = document.getElementById('notification');
        notificationElement.textContent = message;
        notificationElement.classList.remove('hidden');
        setTimeout(function() {
            notificationElement.classList.add('hidden');
        }, 5000); // Hide the notification after 5 seconds
    }
</script>
</body>
</html>
