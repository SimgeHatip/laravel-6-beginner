<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        
        $customers = \App\Models\Customer::all();
        
        return view('internals.customer', [
        'customer' => $customers]);

    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
         ]);
        $customer=new \App\Models\Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->save();
        
        return back();
    }
}
