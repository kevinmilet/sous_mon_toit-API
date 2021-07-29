<?php

namespace App\Http\Controllers;
use App\Models\Contracts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
     * @return Contracts[]|Collection
     */
    public function selectAllContracts()
    {
        return Contracts::all();
    }

    /**
     * Retourne un contrat
     *
     * @return Contracts[]|Collection
     */
    public function selectOneContract($id_contract)
    {
        return Contracts::findOrFail($id_contract);
    }

    /**
     * Enregistrement d'un contrat
     *
     * @return Response|ResponseFactory
     */
    public function saveNewContract(Request $request){

        //Validation du formulaire
        $this->validate($request, [
            'folder'=> '',
            'id_estate' => 'required',
            'id_customer' => 'required',
            'id_staff' => 'required',
            'id_contract_type' => 'required',
            'file' => 'required',
        ]);

        //Enregistrement du fichier dans storage
        if ($request->hasFile('file')) {
            $contrat = $request->file('file');
            $name = time().'.'.$contrat->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/documents/' . $request->folder);
            $contrat->move($destinationPath, $name);
        }

        // Enregistrement du contract en base de données
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

    /**
     * Modification d'un contrat
     * 
     * @param $id_contract
     * @return Response|ResponseFactory
     */
    public function updateContract($id_contract , Request $request){

        //Récupération du contrat a modifier
        $oldContract = Contracts::findOrFail($id_contract);

        //Validation du formulaire
        // $this->validate($request, [
            // 'folder'=> '',
            // 'id_estate' => 'required',
            // 'id_customer' => 'required',
            // 'id_staff' => 'required',
            // 'id_contract_type' => 'required',
            // 'file' => 'required',
        // ]);

        //Enregistrement du fichier dans storage ( si fichier reçu )
        if ($request->hasFile('file')) {
            $fileContract = $request->file('file');
            $name = time().'.'.$fileContract->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/documents/' . $request->folder);
            $fileContract->move($destinationPath, $name);

            var_dump('je suis dans file');
            // die();

            // Suppression de l'ancien contract
            $oldName = $oldContract->name;
            $oldDestinationPath = storage_path('/app/public/documents/' . $oldContract->folder );
            File::delete($oldDestinationPath.'/' . $oldName);

            //On enregistre le nouveau nom 
            $contract = Contracts::find($id_contract);
            $contract->name = $name;
            $contract->save();

        }

        // Enregistrement en base des données modifiées
        $oldContract->update($request->all());
        return $oldContract;
    }

    /**
     * @param $id_contract
     * @return Response|ResponseFactory
     */
    public function archiveContract($id_contract)
    {
        Contracts::findOrFail($id_contract)->delete();

        return response('Contrat archivé avec succès', 200);
    }

}
