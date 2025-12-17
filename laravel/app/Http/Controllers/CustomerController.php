<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(Request $request){
        $customer = Customer::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthYear' => $request->birthYear,
            'gender' => $request->gender,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }
}
