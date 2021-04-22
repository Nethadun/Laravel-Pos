<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_home(){

        $customers = customer::all();
        return view('admin/view_customer', ['customers' => $customers]);
    }
    public function customer_homes(){

        $customers = customer::all();
        return view('admin/create_order', ['customers' => $customers]);
    }

    public function customer_add(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'nic' => 'required',
            'address' => 'required']);

        $customers = new customer;
        $customers->name = $request->input('name');
        $customers->email = $request->input('email');
        $customers->nic = $request->input('nic');
        $customers->address = $request->input('address');
        $customers->save();
        return redirect('/admin/view_customer')->with('info', 'customer saved successfully!');
    }


    public function customer_update($id){
        $customers = customer::find($id);
        return view('admin/update_customer', ['customer' => $customers]);
    }

    public function customer_edit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'nic' => 'required',
            'address' => 'required']);
        $data = array(
            'name' => $request ->input('name'),
            'email' => $request ->input('email'),
            'nic' => $request ->input('nic'),
            'address' => $request ->input('address')
        );
        customer::where('id', $id)->update($data);
        return redirect('/admin/view_customer')->with('info', 'update successfully!');

    }

    public function customer_read($id){
        $customers = customer::find($id);
        return view('/admin/read_customer', ['customer' => $customers]);
    }

    public function customer_delete($id){
        customer::where('id', $id)->delete();
        return redirect('/admin/view_customer')->with('info', 'Delete successfully');
    }
}
