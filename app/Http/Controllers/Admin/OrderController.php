<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\customer;
use App\item;
use App\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function customer_homes(){

        $customers = customer::all();
        $items = item::all();
        return view('admin/create_order', ['customers' => $customers],['items' => $items]);
    }

    public function item_read($id){

        $items_1 = item::find($id);
        return json_encode($items_1);
       // return redirect('/admin/create_order', ['item_1' => $items_1]);
    }

    public function create_order(Request $request){

        dd($request->item_id);
    }
}
