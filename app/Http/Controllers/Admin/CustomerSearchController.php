<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Customer, CustomerInfo};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerSearchController extends Controller
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
        return view('admin.customer.search');
    }

    /**
     *
     */
    public function search()
    {
        //
    }

    /**
     *
     * @param  int  $id
     */
    public function searching(Request $request)
    {
        $customers = Customer::getByCondition();
        // TODO 顧客のライセンスを取得
        // TODO 顧客の本数を取得
        return view('admin.customer.list', compact('customers'));
    }

    /**
     *
     */
    public function list()
    {
        //
    }

    /**
     *
     */
    public function getCustomers(Request $request)
    {

        Log::info("CustomerSearchController:getCustomers requestDate name:" . $request->name );

        $customersQuery = Customer::where('f_name', 'like', '%' . $request->name . '%');


        if(!empty($request->whereNotInList)){
            $customersQuery = $customersQuery->whereNotIn('id',  $request->whereNotInList );
        }

        if($request->limit){
            $customersQuery = $customersQuery->limit($request->limit);
        }
        $customers = $customersQuery->get();
        Log::info("CustomerSearchController:getCustomers responseDate " . $customers );
        return $customers;
    }




}
