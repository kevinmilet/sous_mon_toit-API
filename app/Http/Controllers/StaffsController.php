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
                'firstname' => 'string|required',
                'lastname' => 'string|required',
                'mail' => 'email|required|unique:App\Models\Staffs,mail',
                'phone' => 'string|min:10|max:15|required',
                'id_function' => 'numeric|required',
                'id_role' => 'numeric|required'
            ]);
    }

    /**
     * @return JsonResponse
     */
    public function getAllStaff(): JsonResponse
    {
        return response()->json(Staffs::all());
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function getOneById($id): jsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function delete($id)
    {
        Staffs::findOrFail($id)->delete();

        return response('Utilisateur supprimé avec succès', 200);
    }

    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function create(Request $request): array
    {
        $validated = $this->validation($request);

        // Set login
        $login = strtolower(substr($validated['firstname'],0 , 1)) . strtolower($validated['lastname']);
        // Set temp random password
        $rndPassword =bin2hex(random_bytes(4));
        $rndPasswordHash = password_hash($rndPassword, PASSWORD_DEFAULT);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name = uniqid('avatar_').'.'.$avatar->getClientOriginalExtension();
            $destinationPath = storage_path('/app/public/avatars/');
            $avatar->move($destinationPath, $name);
        } else {
            $name = null;
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
     * @param $id
     * @param Request $request
     * @return array
     */
    public function update($id, Request $request): array
    {
       $staff = Staffs::findOrFail($id);
       $staff->update($request->all());

        return [$staff];
    }
}
