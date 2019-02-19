<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocuments;
use App\Http\Requests\ClientCreateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::get();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name','id')->all();
        return view('admin.clients.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $request)
    {
        //
        $input = $request->except(['token', 'doc_id']);
        $client = Client::create($input);

        $clientDocuments = ClientDocuments::where('token', $request->token)->get();

        foreach ($clientDocuments as $clientDocument) {


            $clientDocument->client_id = $client->id;
            $clientDocument->token = "";
            $clientDocument->save();

        }

        Session::flash('added_client', 'Clientul a fost adăugat');
        return redirect(route('admin.clients.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        $clientDocs = $client->docs;
        $users = User::pluck('name','id')->all();

        return view('admin.clients.edit', compact('client', 'clientDocs','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientCreateRequest $request, $id)
    {
        //
        $client = Client::findOrFail($id);

        $input = $request->except(['token', 'doc_id']);

        $client->update($input);

        Session::flash('edited_client', 'Clientul a fost modificat');
        return redirect(route('admin.clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id);

        foreach ($client->docs as $clientDoc){

            unlink('documente/clienti/' . $clientDoc->doc_id);

            $clientDoc->delete();

        }

        $client->delete();
        Session::flash('deleted_client', 'Clientul a fost șters');

        return redirect(route('admin.clients.index'));
    }
}
