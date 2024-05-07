@php use Illuminate\Support\Facades\Auth; @endphp
<x-head/>
<x-nav-bar/>
<body class="font-sans antialiased">
<div class="container mx-auto px-4 py-8">
    <div class="flex mb-4">
        <div class="flex items-center">
            <button id="table-1-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2">Benutzer</button>
            <button id="table-2-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md mr-2">Freunde</button>
            <button id="table-3-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Anfragen</button>
        </div>
    </div>

    <div id="tables">
        <div id="table-1-container">
            <div class="mb-4">
                <input type="text" id="searchInput-1"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search by username">
            </div>
            <table id="table-1" class="min-w-full divide-y divide-gray-200">
                <tbody id="userTableBody">
                @foreach($users as $aUser)
                    @if($aUser->id !== Auth::user()->id)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">
                                {{$aUser->name}}
                            </td>
                            <td class="px-4 py-2 text-right whitespace-nowrap pb-4">
                                @if(Auth::user()->isFriendWith($aUser))
                                    <a href="/friend/remove/{{$aUser->id}}"
                                       class="px-4 py-2 bg-red-600 text-white font-bold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Remove</a>
                                @elseif(Auth::user()->hasFriendRequestFrom($aUser))
                                    <a href="/friend/accept/{{$aUser->id}}"
                                       class="px-4 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Accept</a>
                                @elseif(Auth::user()->hasSentFriendRequestTo($aUser))
                                    <a
                                       class="px-4 py-2 bg-yellow-600 text-white font-bold rounded-md" >
                                        Pending</a>
                                @else
                                    <a href="/friend/add/{{$aUser->id}}"
                                        class="px-4 py-2 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                                        add</a>
                                @endif
                                </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

        <div id="table-2-container" class="hidden">
            <div class="mb-4">
                <input type="text" id="searchInput-2"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search...">
            </div>
            <table id="table-2" class="min-w-full divide-y divide-gray-200">
                <tbody id="">
                @foreach(Auth::user()->getFriends() as $aUser)
                    @if($aUser->id !== Auth::user()->id)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">
                                {{$aUser->name}}
                            </td>
                            <td class="px-4 py-2 text-right whitespace-nowrap pb-4">
                                <a href="/friend/remove/{{$aUser->id}}"
                                   class="px-4 py-2 bg-red-600 text-white font-bold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Remove</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

        <div id="table-3-container" class="hidden">
            <div class="mb-4">
                <input type="text" id="searchInput-3"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search...">
            </div>
            <table id="table-3" class="min-w-full divide-y divide-gray-200">
                <tbody id="">
                @foreach(Auth::user()->getFriendRequests() as $aUser)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">
                                {{ App\Models\User::find($aUser->sender_id)->name}}
                            </td>
                            <td class="px-4 py-2 text-right whitespace-nowrap pb-4">
                                <a href="/friend/deny/{{$aUser->sender_id}}"
                                   class="px-4 py-2 bg-red-600 text-white font-bold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Deny</a>
                                <a href="/friend/accept/{{$aUser->sender_id}}"
                                   class="px-4 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Accept</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const tables = [
        {
            id: 'table-1',
            btn: document.getElementById('table-1-btn'),
            container: document.getElementById('table-1-container'),
            searchInput: document.getElementById('searchInput-1'),
            tableBody: document.getElementById('userTableBody')
        },
        {
            id: 'table-2',
            btn: document.getElementById('table-2-btn'),
            container: document.getElementById('table-2-container'),
            searchInput: document.getElementById('searchInput-2'),
            tableBody: document.getElementById('table-2').getElementsByTagName('tbody')[0]
        },
        {
            id: 'table-3',
            btn: document.getElementById('table-3-btn'),
            container: document.getElementById('table-3-container'),
            searchInput: document.getElementById('searchInput-3'),
            tableBody: document.getElementById('table-3').getElementsByTagName('tbody')[0]
        }
    ];

    function toggleTable(tableId) {
        tables.forEach(({id, btn, container, searchInput, tableBody}) => {
            container.classList.toggle('hidden', id !== tableId);
            btn.classList.toggle('bg-blue-500', id === tableId);
            btn.classList.toggle('text-white', id === tableId);
            btn.classList.toggle('bg-gray-200', id !== tableId);
            btn.classList.toggle('text-gray-700', id !== tableId);

            searchInput.addEventListener('input', function () {
                const searchText = this.value.toLowerCase();
                const rows = tableBody.getElementsByTagName('tr');
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const data = row.getElementsByTagName('td')[0].textContent.toLowerCase();
                    row.style.display = data.includes(searchText) ? '' : 'none';
                }
            });
        });
    }

    toggleTable('table-1');
    tables.forEach(({id, btn}) => {
        btn.addEventListener('click', () => toggleTable(id));
    });
</script>
</body>
<x-footer/>

