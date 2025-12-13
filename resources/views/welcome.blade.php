<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Bienvenido a Países del Mundo</h1>
                <p class="mt-4 text-gray-600">
                    Explora información de todos los países del mundo: banderas, capitales, población y más.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <!-- Botón para Iniciar sesión -->
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-6 py-4 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Iniciar sesión
                </a>

                <!-- Botón para Registrarse -->
                <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-6 py-4 border border-indigo-600 text-base font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50">
                    Registrarse (gratis)
                </a>

                <!-- Botón Dashboard (opcional, lo dejamos pero más pequeño) -->
                <div class="mt-6 text-center">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
                        O accede directamente al Dashboard →
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center text-gray-500 text-sm">
            <p>Una vez registrado, podrás:</p>
            <ul class="mt-4 space-y-2">
                <li>✓ Buscar países en tiempo real con Algolia</li>
                <li>✓ Exportar fichas individuales y listado completo a PDF</li>
                <li>✓ Resincronizar datos desde la API oficial</li>
            </ul>
        </div>
    </div>
</x-guest-layout>