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
                                <x-button type="" text="Add"
                                          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"/>
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
            <table id="table-2" class="table-auto w-full border border-gray-300 shadow">
                <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Header 1</th>
                    <th class="px-4 py-2 border border-gray-300">Header 2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="px-4 py-2 border border-gray-300">Data 2.1</td>
                    <td class="px-4 py-2 border border-gray-300">Data 2.2</td>
                </tr><tr>
                    <td class="px-4 py-2 border border-gray-300">Data 2.2</td>
                    <td class="px-4 py-2 border border-gray-300">Data 2.2</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div id="table-3-container" class="hidden">
            <div class="mb-4">
                <input type="text" id="searchInput-3"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search...">
            </div>
            <table id="table-3" class="table-auto w-full border border-gray-300 shadow">
                <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Header 1</th>
                    <th class="px-4 py-2 border border-gray-300">Header 2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="px-4 py-2 border border-gray-300">Data 3.1</td>
                    <td class="px-4 py-2 border border-gray-300">Data 3.2</td>
                </tr>
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
            const table = document.getElementById(id);
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
