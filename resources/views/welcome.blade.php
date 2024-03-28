<!DOCTYPE html>
<x-head/>

<body class="font-sans antialiased bg-gray-100">

<x-nav-bar/>

<main class="flex flex-col justify-center items-center">
    <section class="hero bg-cover bg-center py-24 w-full"
             style="background-image: url('https://images.unsplash.com/photo-1503614472-8c93d56e92ce?q=80&w=1000&auto-format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8fA%3D%3D')">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-white mb-8">Entdecke die Welt mit ReiseRunde</h1>
            <p class="text-xl text-gray-200 leading-relaxed mb-8">Verbinde dich mit Reisenden, finde einzigartige Reiseziele und plane deinen Traumurlaub - alles an einem Ort.</p>
            @auth
                <div class="flex justify-center mt-4">
                    <x-button text="Trip erstellen" link="{{route('trip.create')}}" type="" variant="primary"/>
                </div>
            @else
                <div class="flex justify-center mt-4">
                    <x-button text="Anmelden" link="{{route('login')}}" type="" variant="primary"/>
                    <span class="mx-4"></span>
                    <x-button text="Registrieren" link="{{route('register')}}" type="" variant="secondary"/>
                </div>
            @endauth
        </div>
    </section>


    <section class="about container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-8">Was ist ReiseRunde?</h2>
        <p class="text-xl text-gray-600 leading-relaxed mb-8">ReiseRunde ist eine Reise-Social-Plattform, die es dir ermöglicht, dich mit Reisenden mit ähnlichen Interessen zu verbinden, spannende Reiseziele zu entdecken und unvergessliche Abenteuer zu planen. Ob du ein erfahrener Reisender oder ein Neuling bist, ReiseRunde bietet dir die Werkzeuge und Ressourcen, um deine Reiseträume wahr werden zu lassen.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col space-y-4">
                <i class="fas fa-users text-4xl text-blue-500 mb-2"></i>
                <h3 class="font-bold text-xl">Verbinde dich mit Reisenden</h3>
                <p>Finde Reisepartner, die deine Interessen und Vorlieben teilen. Trete Gruppen bei, chatte mit Mitreisenden und baue dein Reise-Netzwerk auf.</p>
            </div>
            <div class="flex flex-col space-y-4">
                <i class="fas fa-map-marker-alt text-4xl text-orange-500 mb-2"></i>
                <h3 class="font-bold text-xl">Entdecke Reiseziele</h3>
                <p>Erkunde eine riesige Auswahl an Reisezielen auf der ganzen Welt. Finde versteckte Schätze, lerne lokale Kulturen kennen und plane deine Reiseroute mit Leichtigkeit.</p>
            </div>
            <div class="flex flex-col space-y-4">
                <i class="fas fa-calendar-alt text-4xl text-green-500 mb-2"></i>
                <h3 class="font-bold text-xl">Plane deine Reise</h3>
                <p>Nutze unsere umfassenden Planungswerkzeuge, um deinen Traumurlaub zu gestalten. Organisiere deine Reiseroute, teile Reisenotizen und buche Flüge und Unterkünfte.</p>
            </div>
            <div class="flex flex-col space-y-4">
                <i class="fas fa-calendar-alt text-4xl text-green-500 mb-2"></i>
                <h3 class="font-bold text-xl">Erlebe Abenteuer</h3>
                <p>Gehe über die typischen Touristenfallen hinaus und entdecke einzigartige Erlebnisse, die deine Reise wirklich unvergesslich machen werden. Von abgelegenen Abenteuern bis hin zu eindrucksvollen kulturellen Begegnungen, ReiseRunde verbindet dich mit Abenteuern, die deine Reiselust entfachen werden.</p>
            </div>
        </div>
    </section>

    <section class="how-it-works container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-8">Wie es funktioniert</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col items-center space-y-4">
                <div class="bg-gray-200 rounded-full p-4">
                    <i class="fas fa-user-plus text-xl text-blue-500"></i>
                </div>
                <h3 class="font-bold text-xl text-center">Erstelle ein Konto</h3>
                <p>Registriere dich kostenlos und erstelle dein ReiseRunde-Profil. Teile deine Reiseinteressen und -vorlieben.</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <div class="bg-gray-200 rounded-full p-4">
                    <i class="fas fa-search text-xl text-orange-500"></i>
                </div>
                <h3 class="font-bold text-xl text-center">Entdecke Reiseziele</h3>
                <p>Erkunde eine riesige Auswahl an Reisezielen auf der ganzen Welt. Finde versteckte Schätze, lerne lokale Kulturen kennen und plane deine Reiseroute mit Leichtigkeit.</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <div class="bg-gray-200 rounded-full p-4">
                    <i class="fas fa-search text-xl text-orange-500"></i>
                </div>
                <h3 class="font-bold text-xl text-center">Finde Reisepartner</h3>
                <p>Lade Leute ein, mit dir auf eine Reise zu gehen</p>
            </div>
        </div>
    </section>
</main>
<x-footer/>

