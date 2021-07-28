<?php

namespace App\Http\Controllers;
use App\Models\ContractsTypes;

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
     * @return Contracts[]|\Illuminate\Database\Eloquent\Collection
     */
    public function selectAllContractsTypes()
    {
        return ContractsTypes::all();
    }

    //
}