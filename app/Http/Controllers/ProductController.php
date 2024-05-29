<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
{
    $this->middleware('auth')->except(['index','show']);
    //$this->middleware('auth')->only(['create','store','edit','update','destroy']);
}
    public function index()
    {
        $products= product::latest()->paginate(2);
        return view('product.index',compact('products'));//  ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd( $request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,gif|max:2048',
   
           ]);
           $store= $request->all();
           if($image=$request->file('image')){
               $imgname= time() .'.'.$image->extension();
               $image->move(public_path('images'), $imgname);
               $store['image']=$imgname ;
           }
           product::create($store);
           return redirect()->route('product.index')
           ->with('success','product created successufiy');

           /*public function store(Request $request){

            $request->validate([
                'title'=> 'required |string | max:100|min:3',
                'body'=> 'required |string |min:3',
                 'img'=>'required |file|image|max:1024|mimes:jpg,png'
            ]) ;
             $path=  storage::putFile("posts",$request->file('img'));
             
            $posts= new Posts();
            $posts->title = $request->title ;
            $posts->body = $request->body ;
            $posts->img = $path ;
            $posts->save() ;
            return redirect('posts') ;*/
    }
    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //$product= product::find($id);  
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,gif|max:2048',
   
           ]);
           $store= $request->all();
           if($image=$request->file('image')){
               $imgname= time() .'.'.$image->extension();
               $image->move(public_path('images'), $imgname);
               $store['image']=$imgname ;
           }
           $product->update( $store);
           return redirect()->route('product.index')
           ->with('success','product update successufiy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if (file_exists(public_path() . '/images/'. $product->image)) {
            unlink(public_path() . '/images/'. $product->image);
}
     
        $product->delete();
       // dd("delet".  $product->id);
           return redirect()->route('product.index')
           ->with('success','product deleted successufiy');
    }
}
