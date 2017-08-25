<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cost;
use input;



class AppController extends Controller
{
    public function Create(){
        return view('create');
    }

    public function postProduct(Request $request){


      $data = array(
        'productname' => $request->input('productname'),
        'productprice'=>$request->input('productprice')

      );

      $pro=Product::create($data);
      if($pro->save()){
        return redirect('/show');
      }

    }
    public function showProduct(){
      $product=Product::all();
      return view('products')->with('products', $product);


    }
    public function getCost(){
      return view('cost');

    }

    public function postCost(Request $request){
      $data =array(
          'name'=>$request->input('name'),
          'productname'=>$request->input('productname'),
          'productcost'=>$request->input('productcost')


        );

        $cost=Cost::create($data);

        if($cost->save()){
          return redirect('/costshow');
        }

    }

    public function showCost(){
      $cost=Cost::all();
      return view('costshow')->with('costshow' ,$cost);
    }

    public function Deletecost($id){
      $cost=Cost::where('id', '=', $id)->first();

        $cost->delete();
         return redirect()->route('cost');
    }

    public function Deleteproduct($id){
      $product=product::where('id','=',$id)->first();

      $product->delete();
      return redirect()->route('product');
    }

}
