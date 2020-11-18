<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        //dd($request);
        $this->request = $request;
        //$this->middleware('auth');
        //$this->middleware('auth')->only(['create','store']);
        //$this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$products = Product::all(); --pegado todos
        //$products = Product::get(); --pega todos
        //$products = Product::paginate(20);

        $products = Product::latest()->paginate(15);

        return view('admin.pages.products.index',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('ok');
        //dd($request->all());
        //dd($request->only(['name','description']));
        // dd($request->name);
        //dd($request->description);
        //$request->has('name') verificar se existe input
        //$request->input('name')
        // dd($request->input('teste','legal')); valor default para campos que não existe
        //dd($request->except('name', '_token')); // pegar todos execption o informado
        // dd($request->file('photo'));
        //$request->photo->extension()
        //$request->photo->getClientOriginalName()
        //dd($request->file('photo')->store('products'));
        //dd($request->file('photo')->storeAs('products',$nameFile));

        /*$request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);*/

        if($request->file('photo')->isValid()){
            $nameFile = $request->name.'.'.$request->photo->extension();
            dd($request->file('photo')->storeAs('products',$nameFile));
        }
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
        return view('admin.pages.products.edit',compact('id'));
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
        dd("Editando produto {$id}");
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
    }
}
