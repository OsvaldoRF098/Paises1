<x-app-layout>
    <x-slot name="header">
        {{ $country->name }}
    </x-slot>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card card-profile text-center">
                <div class="card-avatar" style="max-width: 300px; margin: 0 auto;">
                    <img class="img-fluid" src="{{ $country->flag }}" alt="Bandera de {{ $country->name }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $country->name }}</h3>
                    <p class="card-description">
                        <strong>Capital:</strong> {{ $country->capital ?? 'Sin capital' }}<br>
                        <strong>Población:</strong> {{ number_format($country->population) }} habitantes<br>
                        <strong>Región:</strong> {{ $country->region }}
                    </p>

                    <a href="{{ route('countries.index') }}" class="btn btn-primary btn-round">
                        Volver al listado
                    </a>

                    <a href="{{ route('countries.pdf', $country) }}" class="btn btn-success btn-round" target="_blank">
                        Descargar PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>