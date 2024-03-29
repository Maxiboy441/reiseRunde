<header class="bg-white shadow-md h-24">
    <div class="container mx-auto px-4 py-5 flex justify-between items-center">
        <a href="{{route('welcome')}}"><h1 class="text-xl font-bold w-max">ReiseRunde</h1> </a>
        <nav class="flex space-x-4 justify-center @auth lg:ml-20 @endauth ">
            <a href="{{route('trip.index')}}"
               class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                Reisen
            </a>
            <a href="{{route('user.index')}}"
               class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                Nutzer
            </a>
            <a href="{{route('trip.mytrips')}}"
               class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                Meine Trips
            </a>
        </nav>
        <x-profile-dropdown/>
    </div>
</header>
