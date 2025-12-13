<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class SyncCountries extends Command
{
    protected $signature = 'countries:sync';
    protected $description = 'Sincroniza los datos de países desde la API restcountries';

    public function handle()
    {
        $this->info('Iniciando sincronización de países...');

        // Limpiamos la tabla primero (ya que no permitimos crear/editar manualmente)
        Country::truncate();

        $response = Http::get('https://restcountries.com/v3.1/all', [
            'fields' => 'name,capital,population,region,flags',
        ]);

        if ($response->failed()) {
            $this->error('Error al obtener datos de la API');
            return;
        }

        $countries = $response->json();

        foreach ($countries as $countryData) {
            Country::create([
                'name'       => $countryData['name']['official'] ?? 'Sin nombre',
                'capital'    => $countryData['capital'][0] ?? null,
                'population' => $countryData['population'] ?? 0,
                'region'     => $countryData['region'] ?? 'Sin región',
                'flag'       => $countryData['flags']['png'] ?? '',
            ]);
        }

        $this->info('Sincronización completada. ' . count($countries) . ' países importados.');
    }
}