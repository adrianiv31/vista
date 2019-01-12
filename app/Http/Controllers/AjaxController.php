<?php

namespace App\Http\Controllers;

use App\Producer;
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

    public function cautaProducers()
    {
        $ss = Input::get('ss');


        $producers = Producer::where('name', 'like', "%{$ss}%")->get();

        $data = "";

        $i = 1;
        foreach ($producers as $producer) {
            $routeEdit = route('admin.producers.edit', $producer->id);
            $routeDel = route('admin.producers.destroy', $producer->id);

            $created = $producer->created_at->diffForHumans();
            $updated = $producer->updated_at->diffForHumans();



            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\" onclick=\"location.href='$routeEdit'\">
            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-userid=\"$routeDel\" data-nume=\"" . strtoupper($producer->name) . "\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$producer->name</td>
                    
                    <td>$created</td>
                    <td>$updated</td>

                </tr>";
            $i++;
        }

        return Response::json($data);
    }
}
