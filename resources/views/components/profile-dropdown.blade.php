<div class="relative">
    <button id="profileDropdownButton" type="button"
            class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
        <i class="fas fa-user"></i>
        @auth
            <p class="block px-4 py-2 hover:bg-gray-100 text-sm leading-5">{{ Auth::user()->name }}</p>
        @endauth
    </button>

    <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-md shadow-sm hidden">
        @auth
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
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
