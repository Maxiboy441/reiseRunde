<x-head/>
<x-nav-bar/>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-4">
    @foreach ($trips as $trip)
        <a href="{{ route('trip.show', $trip->id) }}"
           class="block rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div>
                <img src="{{ $trip->image_link }}" alt="{{ $trip->name }}" class="w-full h-64 object-cover">
            </div>
            <div class="p-4">
                <h3 class="text-xl font-bold leading-6 mb-2">
                    {{ $trip->name }}
                </h3>
                <ul class="flex items-center mb-2">
                    <li class="text-gray-600 mr-2">
                        <i class="fas fa-user"></i>
                        {{-- TODO: Add Name --}}
                        Testname
                    </li>
                    <li class="text-gray-600 mr-2">
                        <i class="fas fa-flag"></i> {{ $trip->destination }}
                    </li>
                    <li class="text-gray-600 mr-2">
                        <i class="fas fa-user"></i>
                        {{$trip->min_travelers}}/{{$trip->users->count()}}/{{$trip->max_travelers}}
                    </li>
                    <li class="text-gray-600">
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
                                <!-- Default icon if none of the above matches -->
                                <i class="fas fa-car"></i>
                        @endswitch
                    </li>
                </ul>
                <p class="text-gray-600 text-sm">
                    {{ $trip->description }}
                </p>
            </div>
        </a>
    @endforeach
</div>

<x-footer/>
