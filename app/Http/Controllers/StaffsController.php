<?php


namespace App\Http\Controllers;

use App\Models\Staffs;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

class StaffsController extends Controller
{
    /**
     * @throws ValidationException
     */
    private function validation($request): array
    {
        return $this->validate($request,
            [
                'firstname' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'lastname' => 'string|required|regex:/^[a-zA-Z \'-]+$/',
                'mail' => 'email|unique:App\Models\Staffs,mail|required',
                'phone' => 'string|min:10|max:15|required|regex:/^[0-9 -\/\.]+$/',
                'avatar' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:2048',
                'id_function' => 'numeric|integer|required',
                'id_role' => 'numeric|integer|required'
            ]);
    }

    /**
     *  @OA\Get(
     *      path="/staff/",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get list of all staff",
     *      description="Return list of all staff",
     *      operationId="getStaffList",
     *      tags={"Staffs"},
     *      @OA\Response( 
     *          response=200, 
     *          description="A list with staffs",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Staffs"),
     *          ),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     * @return JsonResponse
     */
    public function getAllStaff(): JsonResponse
    {
        return response()->json(Staffs::all());
    }

    /**
     *  @OA\Get(
     *      path="/staff/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      summary="Get staff information",
     *      description="Return one staff",
     *      operationId="getStaff",
     *      tags={"Staffs"},
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\Response( 
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Staffs"),
     *      ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     *  )
     * 
     * @param $id
     * @return JsonResponse
     */
    public function getOneById($id): jsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     *  @OA\Delete(
     *      path="/staff/delete/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="archiveStaff",
     *      tags={"Staffs"},
     *      summary="Archive existing staff",
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
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id)
    {
        Staffs::findOrFail($id)->delete();

        return response('Utilisateur supprimé avec succès', 200);
    }

    /**
     * @OA\Post(
     *     path="/staff/create",
     *     security={
     *        {"bearerAuth": {}}
     *     },
     *     operationId="storeStaff",
     *     tags={"Staffs"},
     *     summary="Store new staff",
     *     description="Returns successful message",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Staffs"),
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Staffs")
     *     ),
     *     @OA\Response(response="400", ref="#/components/responses/400"),
     *     @OA\Response(response="401", ref="#/components/responses/401"),
     *     @OA\Response(response="403", ref="#/components/responses/403"),
     *     @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function create(Request $request): array
    {
        $validated = $this->validation($request);

        // Set login
        $login = str_replace([' ', '\'', '-'], '', strtolower(substr($validated['firstname'], 0, 1)) . strtolower($validated['lastname']));
        // Set temp random password
        $rndPassword = bin2hex(random_bytes(4));
        $rndPasswordHash = password_hash($rndPassword, PASSWORD_DEFAULT);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $name = uniqid('avatar_') . '.' . $avatar->guessExtension();
            $destinationPath = storage_path('/app/public/pictures/avatars/');
            $avatar->move($destinationPath, $name);
        } else {
            $name = 'user.png';
        }

        $staff = new Staffs;
        $response = $staff->create([
            'login' => $login,
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'updated_at' => null,
            'mail' => $validated['mail'],
            'phone' => $validated['phone'],
            'password' => $rndPasswordHash,
            'avatar' => $name,
            'alert_reader' => 0,
            'id_function' => $validated['id_function'],
            'id_role' => $validated['id_role'],
        ]);
        return [$response, 'tmp_pwd' => $rndPassword];
    }

    /**
     *  @OA\Put(
     *      path="/staff/update/{id}",
     *      security={
     *        {"bearerAuth": {}}
     *      },
     *      operationId="updateStaff",
     *      tags={"Staffs"},
     *      summary="Update existing staff",
     *      description="Returns updated staff data",
     *      @OA\Parameter(ref="#/components/parameters/id"),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Staffs")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Staffs")
     *       ),
     *      @OA\Response(response="400", ref="#/components/responses/400"),
     *      @OA\Response(response="401", ref="#/components/responses/401"),
     *      @OA\Response(response="403", ref="#/components/responses/403"),
     *      @OA\Response(response="404", ref="#/components/responses/404"),
     *      @OA\Response(response="default", ref="#/components/responses/default"),
     * )
     * 
     * @param $id
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function update($id, Request $request): array
    {
        $staff = Staffs::findOrFail($id);
        $this->validation($request);
        $staff->update($request->all());

        return [$staff];
    }
    public function getFunctionForStaff($id, Request $request): array
    {
        $staffFunction = Staffs::find($id)
            ->join('functions', 'functions.id', '=', 'staffs.id_function')
            ->where('staffs.id', '=', $id)
            ->get();

    //    $staffFunction = Staffs::find($id)->function;

        return [$staffFunction];
    }

    public function getRoleForStaff($id, Request $request): array
    {
        $staffRole = Staffs::find($id)
            ->join('roles', 'roles.id', '=', 'staffs.id_role')
            ->where('staffs.id', '=', $id)
            ->get();

    //    $staffFunction = Staffs::find($id)->function;

        return [$staffRole];
    }
    
}
