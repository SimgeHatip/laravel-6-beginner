<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $activeCustomers = \App\Models\Customer::where('active',1)->get();
        $inactiveCustomers= \App\Models\Customer::where('active',0)->get();
    
        return view('internals.customer',compact('activeCustomers','inactiveCustomers'));

    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required'
         ]);
        $customer=new \App\Models\Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');

        $customer->save();
        
        return back();
    }
}
