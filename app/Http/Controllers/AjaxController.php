<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\ClientDocuments;
use App\Producer;
use App\Products;
use App\Supplier;
use App\SupplierDocuments;
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

    public function cautaCategories()
    {
        $ss = Input::get('ss');


        $categories = Category::where('name', 'like', "%{$ss}%")->get();

        $data = "";

        $i = 1;
        foreach ($categories as $category) {
            $routeEdit = route('admin.producers.edit', $category->id);
            $routeDel = route('admin.producers.destroy', $category->id);

            $created = $category->created_at->diffForHumans();
            $updated = $category->updated_at->diffForHumans();


            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\" onclick=\"location.href='$routeEdit'\">
            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-userid=\"$routeDel\" data-nume=\"" . strtoupper($category->name) . "\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$category->name</td>
                    
                    <td>$created</td>
                    <td>$updated</td>

                </tr>";
            $i++;
        }

        return Response::json($data);
    }

    public function cautaProducts()
    {
        $ss = Input::get('ss');


        $products = Products::where('name', 'like', "%{$ss}%")
            ->orWhere('cod_produs', 'like', "%{$ss}%")->get();
        $data = "";

        $i = 1;
        foreach ($products as $product) {
            $routeEdit = route('admin.products.edit', $product->id);
            $routeDel = route('admin.products.destroy', $product->id);

            $created = $product->created_at->diffForHumans();
            $updated = $product->updated_at->diffForHumans();
            $producer = $product->producer->name;


            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\" onclick=\"location.href='$routeEdit'\">
            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-userid=\"$routeDel\" data-nume=\"" . strtoupper($product->name) . "\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$product->cod_produs</td>
                    <td>$product->name</td>
                    <td>$producer</td>
                    <td>$created</td>
                    <td>$updated</td>
                </tr>";
            $i++;
        }

        return Response::json($data);
    }

    public function cautaSupplier()
    {
        $ss = Input::get('ss');


        $suppliers = Supplier::where('name', 'like', "%{$ss}%")
            ->orWhere('supplier_code', 'like', "%{$ss}%")
            ->orWhere('cui', 'like', "%{$ss}%")
            ->orWhere('reg_com', 'like', "%{$ss}%")
            ->get();
        $data = "";

        $i = 1;
        foreach ($suppliers as $supplier) {
            $routeEdit = route('admin.suppliers.edit', $supplier->id);
            $routeDel = route('admin.suppliers.destroy', $supplier->id);

            $created = $supplier->created_at->diffForHumans();
            $updated = $supplier->updated_at->diffForHumans();

           // $suppl = $supplier->producer->name;


            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\"
                                onclick=\"location.href='$routeEdit'\">
                            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-supplierid=\"$routeDel\" data-nume=\"".strtoupper($supplier->name)."\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$supplier->name</td>
                    <td>$supplier->cui</td>
                    <td>$supplier->reg_com</td>
                    <td>$supplier->address</td>
                    <td>$supplier->supplier_code</td>
                    <td>$supplier->contact_name</td>
                    <td>$supplier->contact_position</td>
                    <td>$supplier->contact_tel</td>
                    <td>$supplier->contact_email</td>
                    <td>$supplier->due_date</td>
                    <td>$created</td>
                    <td>$updated</td>


                </tr>";
            $i++;
        }

        return Response::json($data);
    }

    public function cautaClient()
    {
        $ss = Input::get('ss');


        $clients = Client::where('name', 'like', "%{$ss}%")
            ->orWhere('client_code', 'like', "%{$ss}%")
            ->orWhere('cui', 'like', "%{$ss}%")
            ->orWhere('reg_com', 'like', "%{$ss}%")
            ->get();
        $data = "";

        $i = 1;
        foreach ($clients as $client) {
            $routeEdit = route('admin.clients.edit', $client->id);
            $routeDel = route('admin.clients.destroy', $client->id);

            $created = $client->created_at->diffForHumans();
            $updated = $client->updated_at->diffForHumans();



            $user = $client->user->name;


            $data .= "<tr>
                    <th scope=\"row\">
                        <button class=\"btn-success\"
                                onclick=\"location.href='$routeEdit'\">
                            Modifică
                        </button>
                    </th>
                    <th>
                        <button class=\"btn-danger\" data-toggle=\"modal\" data-target=\"#siguranta\"
                                data-clientid=\"$routeDel\"
                                data-nume=\"".strtoupper($client->name)."\">Sterge
                        </button>
                    </th>
                    <th>$i</th>
                    <td>$client->name</td>
                    <td>$client->cui</td>
                    <td>$client->reg_com</td>
                    <td>$client->address</td>
                    <td>$client->client_code</td>
                    <td>$client->haapia</td>
                    <td>$client->tip_client</td>
                    <td>$client->contact_name</td>
                    <td>$client->contact_position</td>
                    <td>$client->contact_tel</td>
                    <td>$client->contact_email</td>
                    <td>$user</td>
                    <td>$client->limita_de_credit</td>
                    <td>$created</td>
                    <td>$updated</td>


                </tr>";
            $i++;
        }

        return Response::json($data);
    }

    public function addSupplierDoc(Request $request)
    {



        $token = $request->token;


        $file = $request->file('doc_id');

        $name = time() . '-' . $file->getClientOriginalName();

        $file->move('documente/furnizori', $name);

        $sd = SupplierDocuments::create(['doc_id'=>$name,'token'=>$token]);

        $data = NULL;

        $data = array('tr' => '<tr id="tr' . $sd->id . '" class="tab-row"><th scope="col">' . $sd->doc_id . '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' . $sd->id . '">Sterge</button></th></tr>',
        'embed' => '<embed id="embd" data-id="' . $sd->id . '" src="/documente/furnizori/' . $sd->doc_id . '" width="500" height="700">');


        return Response::json($data);

    }

    public function updSupplierDoc(Request $request)
    {



        $supplier_id = $request->supplier_id;


        $file = $request->file('doc_id');

        $name = time() . '-' . $file->getClientOriginalName();

        $file->move('documente/furnizori', $name);

        $sd = SupplierDocuments::create(['doc_id'=>$name,'supplier_id'=>$supplier_id]);

        $data = NULL;

        $data = array('tr' => '<tr id="tr' . $sd->id . '" class="tab-row"><th scope="col">' . $sd->doc_id . '</th><th scope="col"><button class="btn-danger stergedoc upd" data-id="' . $sd->id . '">Sterge</button></th></tr>',
            'embed' => '<embed id="embd" data-id="' . $sd->id . '" src="/documente/furnizori/' . $sd->doc_id . '" width="500" height="700">');


        return Response::json($data);

    }

    public function delSupplierDoc()
    {
        $id = Input::get('id');

        $supplierDoc = SupplierDocuments::findOrFail($id);

        unlink('documente/furnizori/' . $supplierDoc->doc_id);
        $supplierDoc->delete();

    }

    public function addClientDoc(Request $request)
    {



        $token = $request->token;


        $file = $request->file('doc_id');

        $name = time() . '-' . $file->getClientOriginalName();

        $file->move('documente/clienti', $name);

        $sd = ClientDocuments::create(['doc_id'=>$name,'token'=>$token]);

        $data = NULL;

        $data = array('tr' => '<tr id="tr' . $sd->id . '" class="tab-row"><th scope="col">' . $sd->doc_id . '</th><th scope="col"><button class="btn-danger stergedoc" data-id="' . $sd->id . '">Sterge</button></th></tr>',
            'embed' => '<embed id="embd" data-id="' . $sd->id . '" src="/documente/clienti/' . $sd->doc_id . '" width="500" height="700">');


        return Response::json($data);

    }
    public function updClientDoc(Request $request)
    {



        $client_id = $request->client_id;


        $file = $request->file('doc_id');

        $name = time() . '-' . $file->getClientOriginalName();



        $file->move('documente/clienti', $name);

        $sd = ClientDocuments::create(['doc_id'=>$name,'client_id'=>$client_id]);

        $data = NULL;

        $data = array('tr' => '<tr id="tr' . $sd->id . '" class="tab-row"><th scope="col">' . $sd->doc_id . '</th><th scope="col"><button class="btn-danger stergedoc upd" data-id="' . $sd->id . '">Sterge</button></th></tr>',
            'embed' => '<embed id="embd" data-id="' . $sd->id . '" src="/documente/furnizori/' . $sd->doc_id . '" width="500" height="700">');


        return Response::json($data);

    }
    public function delClientDoc()
    {
        $id = Input::get('id');

        $clientDoc = ClientDocuments::findOrFail($id);

        unlink('documente/clienti/' . $clientDoc->doc_id);
        $clientDoc->delete();

    }
}
