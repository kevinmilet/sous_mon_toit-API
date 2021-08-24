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
     * Return staff memebers list
     *
     * @OA\Get(
     *      path="/staff",
     *      summary="list all staff members",
     *      operationId="getAllStaff",
     *      tags={"Staff"},
     *      @OA\Response(
     *          response=200,
     *          description="A list with staff members",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="Staffs"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Unexpected error",
     *      ),
     * )
     *
     *
     * @return JsonResponse
     */
    public function getAllStaff(): JsonResponse
    {
        return response()->json(Staffs::all());
    }

    /**
     * Return a staff member
     *
     * @OA\Get(
     *      path="/staff/{id}",
     *      summary="get a staff member",
     *      operationId="getOneById",
     *      tags={"Staff"},
     *      @OA\Response(
     *          response=200,
     *          description="A staff member",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="Staffs"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Unexpected error",
     *      ),
     * )
     *
     *
     * @param $id
     * @return JsonResponse
     */
    public function getOneById($id): jsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     * Delete a staff member
     *
     * @OA\Delete (
     *      path="/staff/delete/{id}",
     *      summary="delete a staff member",
     *      operationId="delete",
     *      tags={"Staff"},
     *      @OA\Response(
     *          response=200,
     *          description="delete a staff member",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="Staffs"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Unexpected error",
     *      ),
     * )
     *
     *
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id)
    {
        Staffs::findOrFail($id)->delete();

        return response('Utilisateur supprimé avec succès', 200);
    }

    /**
     * Create a staff member
     *
     * @OA\Post  (
     *      path="/staff/create",
     *      summary="create a staff member",
     *      operationId="create",
     *      tags={"Staff"},
     *      @OA\Response(
     *          response=200,
     *          description="create a staff member",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="Staffs"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Unexpected error",
     *      ),
     * )
     *
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
     * Update a staff member
     *
     * @OA\Put   (
     *      path="/staff/update/{id}",
     *      summary="update a staff member",
     *      operationId="update",
     *      tags={"Staff"},
     *      @OA\Response(
     *          response=200,
     *          description="update a staff member",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="Staffs"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="Unexpected error",
     *      ),
     * )
     *
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
}
