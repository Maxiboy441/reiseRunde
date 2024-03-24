<!DOCTYPE html>
<html lang="{{ str('app.locale') }}">
<x-head/>

<body class="font-sans antialiased bg-gray-100">

<x-nav-bar></x-nav-bar>

<main class="flex flex-col justify-center items-center pt-16">
    <h2 class="text-4xl font-bold text-center mb-8">Join the travel adventure</h2>
    <p class="text-xl text-gray-600 text-center px-12 leading-relaxed">ReiseRunde is your platform to connect with fellow travelers, discover new destinations, and plan your dream vacation.</p>
    <div class="flex justify-center mt-8">
        <x-button text="Find travel buddy"/>
        <x-button text="Explore the world" reverse="true"/>
    </div>
</main>

<x-footer></x-footer>
</body>
</html>
