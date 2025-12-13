 @php $search = $this->search; @endphp
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Países del Mundo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <!-- El botón de resincronizar lo puedes poner aquí o donde prefieras -->
                        <div>
                            <form action="{{ route('countries.sync') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('¿Resincronizar todos los datos desde la API? Esto borrará y volverá a cargar todo.')">
                                    Resincronizar Datos
                                </button>
                            </form>
                            <a href="{{ route('countries.pdfList') . ($search ? '?search=' . urlencode($search) : '') }}" 
                            class="btn btn-info btn-round ml-2" target="_blank">
                                Exportar Listado a PDF
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                    @endif

                    <!-- Formulario de búsqueda -->
                    <form method="GET" class="mb-4">
                        <div class="col-auto">
                            <input 
                                type="text" 
                                wire:model.live="search" 
                                class="form-control" 
                                placeholder="Buscar país en tiempo real..." 
                                style="min-width: 350px;">
                        </div>
                    </form>

                    <div class="row">
                        @foreach($countries as $country)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $country->flag }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Bandera de {{ $country->name }}">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $country->name }}</h5>
                                        <p class="card-text">
                                            <strong>Capital:</strong> {{ $country->capital ?? 'Sin capital' }}<br>
                                            <strong>Población:</strong> {{ number_format($country->population) }}<br>
                                            <strong>Región:</strong> {{ $country->region }}
                                        </p>
                                        <a href="{{ route('countries.show', $country) }}" class="btn btn-primary mt-auto">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        {{ $countries->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>