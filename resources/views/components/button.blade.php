@php
    $defaultClass = 'px-4 py-2 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500';
    $reverseClass = 'ml-4 px-4 py-2 border border-indigo-600 text-indigo-600 font-bold rounded-md hover:bg-indigo-100 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500';
@endphp

<a href="{{$link ?? '#'}}"
   class="{{ isset($reverse) && $reverse ? $reverseClass : $defaultClass }}" type="{{$type}}">
    {{ $text }}</a>
