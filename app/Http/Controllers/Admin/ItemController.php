<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\item;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function item_home(){

        $items = item::all();
        return view('admin/view_item', ['items' => $items]);
    }

    public function item_homes(){

        $items = item::all();
        return view('admin/create_order', ['items' => $items]);
    }

    public function item_add(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'unit_price' => 'required',
            'qty' => 'required']);

        $items = new item();
        $items->name = $request->input('name');
        $items->unit_price = $request->input('unit_price');
        $items->qty = $request->input('qty');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('upload/items/',$filename);
            $items->image = $filename;
        }else{
            $items->image = '';
            return $request;
        }

        $items->save();
        return redirect('/admin/view_item')->with('info', 'item saved successfully!');
    }


    public function item_update($id){
        $items = item::find($id);
        return view('admin/update_item', ['item' => $items]);
    }

    public function item_edit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'unit_price' => 'required',
            'qty' => 'required']);
        $data = array(
            'name' => $request ->input('name'),
            'unit_price' => $request ->input('unit_price'),
            'qty' => $request ->input('qty')
        );
        item::where('id', $id)->update($data);
        return redirect('/admin/view_item')->with('info', 'update successfully!');

    }

    public function item_read($id){
        $items = item::find($id);
        return view('/admin/read_item', ['item' => $items]);
    }

    public function item_delete($id){
        item::where('id', $id)->delete();
        return redirect('/admin/view_item')->with('info', 'Delete successfully');
    }


    /**
     * @param $image
     */
    public function fetch_image($image){

    }
}
