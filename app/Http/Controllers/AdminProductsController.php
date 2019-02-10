<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsCreateRequest;
use App\Producer;
use App\ProductDocuments;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        $producers = Producer::pluck('name', 'id')->all();
        return view('admin.products.create', compact('categories', 'producers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsCreateRequest $request)
    {
        //
        $input = $request->all();


        $product = Products::create($input);

        if ($file = $request->file('doc_id')) {

            $name = time() . '-' . $file->getClientOriginalName();

            $file->move('documente/produse', $name);

            ProductDocuments::create(['doc_id' => $name, 'products_id' => $product->id]);
        }

        Session::flash('added_product', 'Produsul a fost adăugat');
        return redirect(route('admin.products.index'));

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
        $product = Products::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $producers = Producer::pluck('name', 'id')->all();
        return view('admin.products.edit', compact('product', 'categories', 'producers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Products::findOrFail($id);


        $input = $request->all();


        $product->update($input);

        if ($file = $request->file('doc_id')) {

            foreach ($product->docs as $doc) {

                unlink('documente/produse/' . $doc->doc_id);
                $doc->delete();

            }

            $name = time() . '-' . $file->getClientOriginalName();

            $file->move('documente/produse', $name);

            ProductDocuments::create(['doc_id' => $name, 'products_id' => $product->id]);
        }


        Session::flash('edited_product', 'Produsul a fost modificat');

        return redirect(route('admin.products.index'));
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
        $product = Products::findOrFail($id);


        foreach ($product->docs as $doc) {

            unlink('documente/produse/' . $doc->doc_id);
            $doc->delete();

        }


        $product->delete();


        Session::flash('deleted_product', 'Produsul a fost șters');

        return redirect(route('admin.products.index'));
    }
}
