<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    //
    public function cautaUsers()
    {
        $ss = Input::get('ss');


        $users = User::where('name', 'like', "%{$ss}%")->get();

        $data = "";

        $i = 1;
        foreach ($users as $user) {
            $routeEdit = route('admin.users.edit', $user->id);
            $routeDel = route('admin.users.destroy', $user->id);
            $roles = "";
            $activ = $user->is_active == 1 ? 'Activ' : 'Dezactivat';

            $created = $user->created_at->diffForHumans();
            $updated = $user->updated_at->diffForHumans();


            foreach ($user->roles as $role)
                $roles .= $role->name . "<br/>";

            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\" onclick=\"location.href='$routeEdit'\">
            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-userid=\"$routeDel\" data-nume=\"" . strtoupper($user->name) . "\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$user->name</td>
                    <td>$user->email</td>
                    <td>
                        $roles
                    </td>

                    <td>$activ</td>
                    <td>$created</td>
                    <td>$updated</td>

                </tr>";
            $i++;
        }

        return Response::json($data);
    }
}
