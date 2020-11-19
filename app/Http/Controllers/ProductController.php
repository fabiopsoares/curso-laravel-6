<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    protected $product;

    public function __construct(Request $request, Product $product)
    {
        //dd($request);
        $this->request = $request;
        $this->product = $product;
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

        $products = $this->product->latest()->paginate(15);

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

        /*if($request->file('photo')->isValid()){
            $nameFile = $request->name.'.'.$request->photo->extension();
            dd($request->file('photo')->storeAs('products',$nameFile));
        }*/

        $data = $request->only('name','description','price');
        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::find($id);
        //$product = Product::where('id',$id)->first();
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back();
        }else{
            return view('admin.pages.products.show',[
                'product' => $product
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back();
        }else{
            return view('admin.pages.products.edit',[
                'product' => $product
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = $this->product->find($id);

        if(!$product){
            return redirect()->back();
        }else{

            $product->update($request->all());

            return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->where('id', $id)->first();

        if(!$product){
            return redirect()->back();
        }else{

            $product->delete();
            return redirect()->route('products.index');
        }
    }

    public function search(Request $resquest)
    {
        $filters = $resquest->except('_token');
        $products = $this->product->search($resquest->filter);

        return view('admin.pages.products.index',[
            'products' => $products,
            'filters' => $filters,
        ]);

    }
}
