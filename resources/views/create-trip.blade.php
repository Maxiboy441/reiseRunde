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
                        <input type="checkbox" name="timespan" id="timespan" class="align-middle" onchange="toggleTimespan()" value="0">
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
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Trip
                </button>
            </form>
        </div>
    </div>
</main>

<script>
    function toggleTimespan() {
        const timespanCheckbox = document.getElementById('timespan');
        const durationField = document.getElementById('durationField');
        if (timespanCheckbox.checked) {
            durationField.style.display = 'block';
            timespanCheckbox.value = 1;
        } else {
            durationField.style.display = 'none';
            timespanCheckbox.value = 0;
        }
    }
</script>
</body>
