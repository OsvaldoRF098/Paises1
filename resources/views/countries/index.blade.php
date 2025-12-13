<x-app-layout>
    <x-slot name="header">
        Países del Mundo
    </x-slot>

    <div class="section">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    @livewire('country-search')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>