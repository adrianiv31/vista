<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppliersCreateRequest;
use App\Supplier;
use App\SupplierDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuppliersCreateRequest $request)
    {

        $input = $request->except(['token', 'doc_id']);
        $supplier = Supplier::create($input);

        $supplierDocuments = SupplierDocuments::where('token', $request->token)->get();

        foreach ($supplierDocuments as $supplierDocument) {


            $supplierDocument->supplier_id = $supplier->id;
            $supplierDocument->token = "";
            $supplierDocument->save();

        }

        Session::flash('added_supplier', 'Funizorul a fost adăugat');
        return redirect(route('admin.suppliers.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        $supplierDocs = $supplier->docs;


        return view('admin.suppliers.edit', compact('supplier', 'supplierDocs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuppliersCreateRequest $request, $id)
    {
        //
        $supplier = Supplier::findOrFail($id);

        $input = $request->except(['token', 'doc_id']);

        $supplier->update($input);

        Session::flash('edited_supplier', 'Furnizorul a fost modificat');
        return redirect(route('admin.suppliers.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Supplier::findOrFail($id);

        foreach ($supplier->docs as $supplierDoc){

            unlink('documente/furnizori/' . $supplierDoc->doc_id);

            $supplierDoc->delete();

        }

        $supplier->delete();
        Session::flash('deleted_supplier', 'Furnizorul a fost șters');

        return redirect(route('admin.suppliers.index'));
    }
}
