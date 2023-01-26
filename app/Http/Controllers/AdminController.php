<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request )
    {
        $data = new Catagory();
        $data->catagory_name = $request->catagory_name;
        $data->save();

        return redirect()->back()->with('messageAdd', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data=catagory::find($id);
        $data->delete();

        return redirect()->back()->with('messageDelete', 'Catagory deleted Successfully');
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request )
    {
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;
        $data->catagory = $request->catagory;
        $data->quantity = $request->quantity;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->back()->with('messageAdd', 'New Product Added Successfully');
        
    }

    public function show_product()
    {
        $data=product::all();
        return view('admin.show_product',compact('data'));
    }

    public function delete_product($id)
    {
        $data=product::find($id);
        $data->delete();

        return redirect()->back()->with('messageDelete', 'Product deleted Successfully');
    }

    public function update_product($id)
    {
        # code...
        $data=product::find($id);
        $catagory=catagory::all();
        return view('admin.update_product',compact('data','catagory'));
    }

    public function update_product_confirm(Request $request, $id)
    {

        $data=product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;
        $data->catagory = $request->catagory;
        $data->quantity = $request->quantity;

        $image=$request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $data->image=$imagename;
        }
        
        $data->save();

        return redirect()->back()->with('messageUpdated', 'Product Updated Successfully');

    }
}
