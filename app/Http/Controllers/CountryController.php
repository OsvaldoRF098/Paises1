<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
class CountryController extends Controller
{
    public function index(Request $request)
    {
        $query = Country::query();

        // Búsqueda simple por nombre (lo mejoraremos con Algolia más adelante)
        if ($request->has('search') && $request->search !== '') {
            $query->where('name', 'ilike', '%' . $request->search . '%');
        }

        $countries = $query->orderBy('name')->paginate(15);

        return view('countries.index', compact('countries'));
    }

    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    // Acción para resincronizar los datos (solo usuarios autenticados)
    public function sync()
    {
        // Reutilizamos la lógica del comando
        Country::truncate();

        $response = Http::get('https://restcountries.com/v3.1/all', [
            'fields' => 'name,capital,population,region,flags',
        ]);

        if ($response->failed()) {
            return redirect()->route('countries.index')->with('error', 'Error al sincronizar con la API');
        }

        $countriesData = $response->json();

        foreach ($countriesData as $data) {
            Country::create([
                'name'       => $data['name']['official'] ?? 'Sin nombre',
                'capital'    => $data['capital'][0] ?? null,
                'population' => $data['population'] ?? 0,
                'region'     => $data['region'] ?? 'Sin región',
                'flag'       => $data['flags']['png'] ?? '',
            ]);
        }

        return redirect()->route('countries.index')->with('success', 'Datos de países sincronizados correctamente');
    }
    public function pdf(Country $country)
    {
        $pdf = PDF::loadView('countries.pdf', compact('country'));

        return $pdf->download('ficha-pais-' . Str::slug($country->name) . '.pdf');
    }

    public function pdfList(Request $request)
    {
        $query = Country::query();

        if ($request->has('search') && $request->search !== '') {
            $query->where('name', 'ilike', '%' . $request->search . '%');
        }

        $countries = $query->orderBy('name')->get();

        $pdf = PDF::loadView('countries.pdf-list', compact('countries'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('listado-completo-paises.pdf');
    }
}
