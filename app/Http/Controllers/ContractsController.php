<?php

namespace App\Http\Controllers;
use App\Models\Contracts;

class ContractsController extends Controller
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
    public function selectAllContracts()
    {
        return Contracts::all();
    }


    /**
     * Retourne un contrats
     *
     * @return Contracts[]|\Illuminate\Database\Eloquent\Collection
     */
    public function selectOneContract($id_contract)
    {
        return Contracts::find($id_contract);
    }


    /**
     * @param $id_contract
     * @return Response|ResponseFactory
     */
    public function archiveContract($id_contract)
    {
        $contract = Contracts::findOrFail($id_contract);
        $contract->archived_at = date("Y-m-d H:i:s");
        $contract->save();

        return response('Contrat archivé avec succès', 200);
    }
    //
}
