<?php

namespace App\Http\Controllers;
use App\Models\Contracts;
use App\Models\ContractsTypes;
use Illuminate\Database\Eloquent\Collection;

class ContractsTypesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retourne la liste des contrats
     *
     * @return Collection
     */
    public function selectAllContractsTypes(): Collection
    {
        return ContractsTypes::all();
    }

    //
}
