<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducerCreateRequest;
use App\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producers = Producer::all();

        return view('admin.producers.index', compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.producers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducerCreateRequest $request)
    {
        //
        $input = $request->all();

        $producer = Producer::create($input);

        Session::flash('added_producer','Producătorul a fost adăugat');

        return redirect(route('admin.producers.index'));

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
        $producer = Producer::findOrFail($id);

        return view('admin.producers.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producer = Producer::findOrFail($id);


        $input = $request->all();


        $producer->update($input);


        Session::flash('edited_producer','Producătorul a fost modificat');

        return redirect(route('admin.producers.index'));
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
        Producer::findOrFail($id)->delete();

        Session::flash('deleted_producer','Producătorul a fost șters');

        return redirect(route('admin.producers.index'));
    }
}
