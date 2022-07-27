<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Customer, CustomerInfo, CustomerLicenses, Log};

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
        ]);

        $customer = Customer::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
        ]);
        $customerId = $customer->id;

        CustomerInfo::create([
            'customer_id' => $customerId,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.customers.show', ['customer'=> $customer->id] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::getById($id);
        $logs = Log::getByCustomer($id);
        $customerLicenses = CustomerLicenses::getByCustomer($id);

        if(empty($customer)){
            return view('admin.customer.index');
        }
        return view('admin.customer.show', compact('customer', 'logs', 'customerLicenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
