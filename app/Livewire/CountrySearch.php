<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use Livewire\WithPagination;

class CountrySearch extends Component
{
    use WithPagination;

    public string $search = '';

    protected $queryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (trim($this->search) !== '') {
            $countries = Country::search($this->search)->paginate(15);
        } else {
            $countries = Country::query()->orderBy('name')->paginate(15);
        }

        return view('livewire.country-search', compact('countries'));
    }
}