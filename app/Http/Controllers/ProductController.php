<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('index', compact('products'));
    }

    public function Add(Request $request,$id)
    {
        // $request->session()->flush();
        // return view('add');

        $pro = Product::find($id);
        $product = [];
        $product['id'] = $id;
        //you can add all data you need like this etc...
        $product['name'] = $pro->name;
        $product['price'] = $pro->price;

        $pro = [
            'name' => $product['name'],
            'price' => $product['price']
        ];

        $request->session()->push('items', $pro);

        // $data = $request->session()->all();
        //return view('add');
        return redirect()->route('addview');


    }
    public function view(){
        return view('add');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'  => 'required',
            'price' => 'required|numeric'
        ]);

        $data=[
            'name'=>$request->name,
            'price'=>$request->price
        ];
        if( $user = Product::insert($data)){
            return redirect('/products');
        }


        return back()->with('success','product has been added');
    }

//    public function removeItem($id){
//
//        Product::destroy($id);
//        return redirect()->route('/logout');
   // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $product=Product::find($id);
//        return view('edit', compact('product','id'));
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
        $product = Product::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required|numeric'
        ]);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->save();
        return redirect('products')->with('success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')->with('success','Product has been  deleted');
    }
}
