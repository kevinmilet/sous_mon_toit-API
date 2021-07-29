<?php

namespace App\Http\Controllers;
use App\Models\Contracts;
use Illuminate\Http\Request;


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
        return Contracts::findOrFail($id_contract);
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

    /**
     * Enregistrement d'un contrat
     * 
     * @return Response|ResponseFactory
     */
    public function saveNewContract(Request $request){

        $this->validate($request, [
            'folder'=> '',
            'id_estate' => 'required',
            'id_customer' => 'required',
            'id_staff' => 'required',
            'id_contract_type' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $contrat = $request->file('file');
            $name = time().'.'.$contrat->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/documents/' . $request->folder);
            $contrat->move($destinationPath, $name);
        }

        Contracts::create([
            'folder' => $request->folder,
            'name' => $name, // nom du fichier enregistré
            'id_estate' => $request->id_estate,
            'id_staff' => $request->id_staff,
            'id_customer' => $request->id_customer,
            'id_contract_type' => $request->id_contract_type,

        ]);
        // //Création du contrat
        // $contract = new Contracts;
        // //Set des données
        // $contract->folder = $request->folder;
        // $contract->name = $filename;
        // $contract->id_estate = $request->id_estate;
        // $contract->id_customer = $request->id_customer;
        // $contract->id_staff = $request->id_staff;
        // $contract->id_contract_type = $request->id_contract_type;
        // $contract->updated_at = null;
        // $contract->archived_at = null;
        // //Enregistrement
        // $contract->save();

    }
}
