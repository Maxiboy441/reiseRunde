<div class="relative">
    <button id="profileDropdownButton" type="button"
            class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
        <i class="fas fa-user"></i>
    </button>

    <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-md shadow-sm hidden">
        @auth
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">Profile</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">Settings</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">Logout</a>
        @else
            <a href="{{route('login')}}" class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">Anmelden</a>
            <a href="{{route('register')}}" class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">Registrieren</a>
        @endauth
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileDropdownButton = document.getElementById('profileDropdownButton');
        const profileDropdownMenu = document.getElementById('profileDropdownMenu');

        profileDropdownButton.addEventListener('click', function () {
            profileDropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (!profileDropdownButton.contains(event.target) && !profileDropdownMenu.contains(event.target)) {
                profileDropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
