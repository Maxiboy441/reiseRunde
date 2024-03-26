<!DOCTYPE html>
<x-head/>
<x-nav-bar/>
<body class="font-sans antialiased">
<div class="container mx-auto px-4 py-8">
    <div class="flex mb-4">
        <h1 class="text-xl font-bold mr-4">Table Switcher</h1>
        <div class="flex items-center">
            <button id="table-1-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2">Table 1</button>
            <button id="table-2-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md mr-2">Table 2</button>
            <button id="table-3-btn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Table 3</button>
        </div>
    </div>

    <div id="tables">
        <table id="table-1" class="table-auto w-full border border-gray-300 shadow">
            <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-300">Header 1</th>
                <th class="px-4 py-2 border border-gray-300">Header 2</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="px-4 py-2 border border-gray-300"></td>
                <td class="px-4 py-2 border border-gray-300">Data 1.2</td>
            </tr>
            </tbody>
        </table>

        <table id="table-2" class="table-auto w-full border border-gray-300 shadow hidden">
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
            </tr>
            </tbody>
        </table>

        <table id="table-3" class="table-auto w-full border border-gray-300 shadow hidden">
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


<script>
    const table1Btn = document.getElementById('table-1-btn');
    const table2Btn = document.getElementById('table-2-btn');
    const table3Btn = document.getElementById('table-3-btn');

    const table1 = document.getElementById('table-1');
    const table2 = document.getElementById('table-2');
    const table3 = document.getElementById('table-3');

    // Function to show a specific table and hide others
    function showTable(tableToShow) {
        table1.classList.add('hidden');
        table2.classList.add('hidden');
        table3.classList.add('hidden');
        tableToShow.classList.remove('hidden');
    }

    // Set table 1 as default (already shown in HTML)
    showTable(table1);

    // Add click events to toggle buttons
    table1Btn.addEventListener('click', () => showTable(table1));
    table2Btn.addEventListener('click', () => showTable(table2));
    table3Btn.addEventListener('click', () => showTable(table3));
</script>
