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
     *  @OA\Get(
     *      path="/contract/",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get list of all contracts",
     *      description="Return list of all contracts",
     *      operationId="getContractsList",
     *      tags={"Contracts"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with contracts",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Contracts"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     *
     * @return Contracts[]|Collection
     */
    public function selectAllContracts()
    {
        return Contracts::all();
    }

    /**
     *  @OA\Get(
     *      path="/contract/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get contract information",
     *      description="Return one contract",
     *      operationId="getContract",
     *      tags={"Contracts"},
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response( 
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Contracts"),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     *  )
     * 
     * @return Contracts[]|Collection
     */
    public function selectOneContract($id_contract)
    {
        return Contracts::findOrFail($id_contract);
    }

    /** 
     * @OA\Post(
     *     path="/contract/saveContract",
     *     security={
     *        {"bearerAuth": {}}
     *     },
     *     operationId="storeContract",
     *     tags={"Contracts"},
     *     summary="Store new contract",
     *     description="Returns successful message",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Contracts"),
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Contracts")
     *     ),
     *     @OA\Response(response="400", ref="#/components/responses/400"),
     *     @OA\Response(response="401", ref="#/components/responses/401"),
     *     @OA\Response(response="403", ref="#/components/responses/403"),
     *     @OA\Response(response="default", ref="#/components/responses/default"),
     * )
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

    }

    /** 
     *  @OA\Put(
     *      path="/contract/update/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="updateContract",
     *      tags={"Contracts"},
     *      summary="Update existing contract",
     *      description="Returns updated contract data",
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Contracts")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Contracts")
     *       ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
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
     *  @OA\Delete(
     *      path="/contract/archive/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="archiveContract",
     *      tags={"Contracts"},
     *      summary="Delete existing contract",
     *      description="Return succesfull message",
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * @param $id_contract
     * @return Response|ResponseFactory
     */
    public function archiveContract($id_contract)
    {
        Contracts::findOrFail($id_contract)->delete();

        return response('Contrat archivé avec succès', 200);
    }

}
