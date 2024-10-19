<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rechtliche Hinweise und Datenschutzrichtlinie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- GitHub Banner -->
            <div class="bg-gray-800 text-white p-4 rounded-lg mb-8 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z" />
                        </svg>
                        <span class="font-bold text-lg">GitHub Repository</span>
                    </div>
                    <a href="https://github.com/Maxiboy441/reiseRunde.git" target="_blank" rel="noopener noreferrer" class="bg-white text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-200 transition duration-300">
                        View on GitHub
                    </a>
                </div>
            </div>

            <!-- Project Status Explanation -->
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8" role="alert">
                <p class="font-bold">Projekt Status</p>
                <p>ReiseRunde befindet sich derzeit in einer frühen Entwicklungsphase. Dies ist ein privates Spaßprojekt eines Auszubildenden und dient hauptsächlich Lernzwecken. Bitte beachten Sie, dass Funktionen und Inhalte sich häufig ändern können.</p>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-2xl font-bold mb-6">Impressum</h2>
                            <p class="mb-4">Informationen gemäß § 5 TMG</p>
                            <p class="mb-4">
                                Maximilian Huber <br>
                                Rümpflestr. 14/1<br>
                                71665 Horrheim <br>
                                <a href='mailto:Maxiboy44YT@gmail.com' class="text-blue-500 dark:text-blue-400 hover:underline">Maxiboy44YT@gmail.com</a>
                            </p>
                            <h3 class="text-xl font-bold mt-8 mb-4">Haftungsausschluss</h3>
                            <h4 class="text-lg font-semibold mt-4 mb-2">Haftung für Inhalte</h4>
                            <p class="mb-4">Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
                            <h4 class="text-lg font-semibold mt-4 mb-2">Haftung für Links</h4>
                            <p class="mb-4">Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.</p>
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold mb-6">Datenschutzrichtlinie</h2>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Erhobene Daten</h3>
                            <p class="mb-4">Wir erheben und verarbeiten folgende personenbezogene Daten:</p>
                            <ul class="list-disc list-inside mb-4">
                                <li>E-Mail-Adresse</li>
                                <li>Benutzername</li>
                                <li>Passwort (verschlüsselt)</li>
                                <li>Informationen zur Reisebeteiligung</li>
                                <li>Nutzergenerierte Inhalte zu Reisen</li>
                            </ul>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Zweck der Datenverarbeitung</h3>
                            <p class="mb-4">Die Erhebung und Verarbeitung der Daten dient der Benutzerauthentifizierung, dem Kontomanagement und der Erleichterung der Reiseplanung und -teilnahme über unsere Plattform.</p>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Rechtsgrundlage für die Verarbeitung</h3>
                            <p class="mb-4">Die Verarbeitung der Daten erfolgt auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO) und zur Erfüllung des Vertrags zur Nutzung der Plattform (Art. 6 Abs. 1 lit. b DSGVO).</p>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Datenweitergabe</h3>
                            <p class="mb-4">Ihre Daten werden nicht an Dritte weitergegeben, außer soweit dies zur Erbringung der Dienste der Plattform erforderlich ist (z.B. Weitergabe von Reisedetails an andere Teilnehmer).</p>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Rechte der betroffenen Person</h3>
                            <p class="mb-4">Sie haben das Recht auf Auskunft, Berichtigung, Löschung und Einschränkung der Verarbeitung Ihrer personenbezogenen Daten.</p>
                            <h3 class="text-xl font-semibold mt-4 mb-2">Datensicherheit</h3>
                            <p class="mb-4">Wir setzen technische und organisatorische Sicherheitsmaßnahmen ein, um Ihre Daten gegen Manipulation, Verlust, Zerstörung oder unbefugten Zugriff zu schützen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer/>

