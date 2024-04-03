@php use Illuminate\Support\Facades\Auth; @endphp
<x-head/>
<x-nav-bar/>
<body class="font-sans antialiased">
<div class="container mx-auto px-4 py-8">
    <div class="flex mb-4">
        <div class="flex items-center">
            <button id="list-1-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2">My Trips</button>
            <button id="list-2-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md mr-2">Joined Trips</button>
        </div>
    </div>

    <div id="lists">
        <div id="list-1-container">
            @if(!$openTripOwner->isEmpty())
                <h3>Open</h3>
                <x-trip-list :trips="$openTripOwner"/>
            @endif

            @if(!$closedTripOwner->isEmpty())
                <h3>Closed</h3>
                <x-trip-list :trips="$closedTripOwner"/>
            @endif

            @if(!$doneTripOwner->isEmpty())
                <h3>Done</h3>
                <x-trip-list :trips="$doneTripOwner"/>
            @endif
        </div>

        <div id="list-2-container" class="hidden">
            @if(!$openJoinedTrip->isEmpty())
                <h3>Open</h3>
                <x-trip-list :trips="$openJoinedTrip"/>
            @endif

            @if(!$closedJoinedTrip->isEmpty())
                <h3>Closed</h3>
                <x-trip-list :trips="$closedJoinedTrip"/>
            @endif

            @if(!$doneJoinedTrip->isEmpty())
                <h3>Done</h3>
                <x-trip-list :trips="$doneTripOwner"/>
            @endif

            @if(!$askingJoinedTrip->isEmpty())
                <h3>Joined</h3>
                <x-trip-list :trips="$askingJoinedTrip"/>
            @endif
        </div>
    </div>
</div>

<x-footer/>

<script>
    const lists = [
        {
            id: 'list-1',
            btn: document.getElementById('list-1-btn'),
            container: document.getElementById('list-1-container')
        },
        {
            id: 'list-2',
            btn: document.getElementById('list-2-btn'),
            container: document.getElementById('list-2-container')
        }
    ];

    function toggleList(listId) {
        lists.forEach(({id, btn, container}) => {
            container.classList.toggle('hidden', id !== listId);
            btn.classList.toggle('bg-blue-500', id === listId);
            btn.classList.toggle('text-white', id === listId);
            btn.classList.toggle('bg-gray-200', id !== listId);
            btn.classList.toggle('text-gray-700', id !== listId);
        });
    }

    toggleList('list-1');
    lists.forEach(({id, btn}) => {
        btn.addEventListener('click', () => toggleList(id));
    });
</script>
</body>
