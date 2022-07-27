<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Carbon\Carbon;

use App\Models\{Customer, CustomerInfo, CustomerLicenses, Log};

class LogController extends Controller
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
        return view('admin.log.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.log.create');
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
            'log_date' => 'required',
            'entry_time' => 'required',
            'exit_time' => 'required',
            'swim_time' => 'required',
            'entry' => 'required',
            'wether' => 'required',
            'wave' => 'required',
            'flow' => 'required',
            'wind' => 'required',
        ]);


        try {
            $log = Log::create([
                'instructor_id' => Auth::user()->id,
                'date' => $request->log_date,
                'entry_time' => $request->entry_time,
                'exit_time' => $request->exit_time,
                'swim_time' => $request->swim_time,
                'entry' => $request->entry,
                'wether' => $request->wether,
                'wave' => $request->wave,
                'flow' => $request->flow,
                'wind' => $request->wind,
                'max_water_depth' => $request->max_water_depth,
                'average_water_depth' => $request->average_water_depth,
                'start_residual_pressure' => $request->start_pressure,
                'end_residual_pressure' => $request->end_pressure,
                'amount_residual_pressure' => $request->amount_pressure,
            ]);
            $logId = $log->id;

            return redirect()->route('admin.log.list');
            return redirect()->route('admin.log.show', ['log'=> $logId] );
        } catch (Exception $e) {
            dd('異常が発生しました111', $e->getMessage());
            //throw $e;
        }
    }

    /*
    * Display the specified resource.
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function list()
    {
        $logs = Log::getByInstructor(Auth::user()->id);

        if(count($logs) == 0){
            return view('admin.log.index');
        }
        return view('admin.log.list', compact('logs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show', $id);
        $customer = Customer::getById($id);
        $logs = Log::getByCustomer($id);

        if(empty($logs)){
            return view('admin.log.index');
        }
        return view('admin.log.show', compact('customer', 'logs', 'customerLicenses'));
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
