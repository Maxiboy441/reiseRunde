<x-head/>
<x-nav-bar/>
<body class="bg-gray-100">
<main class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg">
        <div class="relative">
            <img src="{{$trip->image_link}}" alt="Trip Image"
                 class="w-full h-full object-cover rounded-lg mb-4 clip-path: inset(50% 0 0 0);">
            <div class="absolute bottom-4 right-4">
                <x-button class="py-3" text="Join" link="/trip/{{$trip->id}}/join" type="" variant="primary"/>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/4 px-4 py-4 bg-blue-100 border-l border-gray-200 rounded-3xl ml-4 mb-4">
                <h3 class="font-bold">Quick Check</h3>
                <ul class="list-disc pl-4 space-y-2">
                    <li><i class="fas fa-flag"></i> {{$trip->destination}}</li>
                    @if($trip->timespan)
                        <li>Duration: {{$trip->duration_in_days}} Days</li>
                        <li>Between: {{$trip->startDate->format('d F Y')}} - {{$trip->endDate->format('d F Y')}}</li>
                    @else
                        <li>Start: {{$trip->startDate->format('d F Y')}}</li>
                        <li>Ende: {{$trip->endDate->format('d F Y')}}</li>
                    @endif
                    <li>Transportmittel:
                        @switch($trip->vehicle)
                            @case('car')
                                <i class="fas fa-car"></i>
                                @break
                            @case('plane')
                                <i class="fas fa-plane"></i>
                                @break
                            @case('train')
                                <i class="fas fa-train"></i>
                                @break
                            @case('motorbike')
                                <i class="fas fa-motorcycle"></i>
                                @break
                            @default
                                <i class="fas fa-car"></i>
                        @endswitch
                    </li>
                    <li>Min: {{$trip->min_travelers}}</li>
                    <li>Max: {{$trip->max_travelers}}</li>
                </ul>
            </div>
            <div class="w-3/4 px-4 py-4">
                <div class="flex justify-between border-b border-gray-200 pb-4" id="head">
                    <a href="account" class="hover:underline">Username</a>
                    <p class="hover:underline">Erstellt: {{$trip->created_at->format('d F Y')}}</p>
                    <p class="hover:underline">Letztes update: {{$trip->updated_at->format('d F Y')}}</p>
                </div>
                <div id="description">
                    <h3>Beschreibung</h3>
                    <p class="text-gray-600 text-sm">
                        {{$trip->description}}
                    </p>
                </div>
                <div id="map" class="mt-4">
                    {{-- TODO: Maps einbinden mit dem geplanten trip --}}
                    <a href="{{$trip->trip_link}}">{{$trip->trip_link}}</a>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
