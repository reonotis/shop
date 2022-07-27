<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Common\CommonSchedule;
use App\Models\{Course,
                Customer,
                CustomerInfo,
                CustomerLicenses,
                CustomerSchedule,
                Log,
                Schedule,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;


class ScheduleController extends Controller
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
        return redirect()->route('admin.scheduleMonth', ['month'=> date('Ym')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scheduleMonth($selectMonth)
    {
        // 渡された年月が正しいか確認

        // 年月選択用に、過去2年から翌1年を取得
        $setMonth = date("Y-m-1",strtotime("-2 year"));
        $monthList[] = date('Ym', strtotime($setMonth));
        for($i = 0; $i < 35 ; $i++){
            $setMonth = date('Y-m-1', strtotime($setMonth . " +1 month")) ;
            $monthList[] = date('Ym', strtotime($setMonth));
        }
        $monthList = array_reverse($monthList);

        // 選択した年月の一日
        $monthFirstDay = date('Y-m-1', strtotime( wordwrap($selectMonth, 4, '-', true) . '-01'));

        // 月初の初週の初日
        $weekFirstDay = CommonSchedule::getStartWeekDay($monthFirstDay);

        // 月末日から最終週の日付を取得
        $monthLastDay = date('Y-m-d',strtotime(substr($monthFirstDay, 0, 7) . ' last day of this month'));
        $lastDay = CommonSchedule::getLastWeekDay($monthLastDay);

        $date = $weekFirstDay;
        $dayList = array();
        $key = 0;
        while($date <= $lastDay){
            $dayList[$key]['date'] = $date;
            $dayList[$key]['schedule'] = $this->getSchedule($date);

            $targetTime = strtotime($date);
            $date = date('Y-m-d', strtotime('1 day', $targetTime));
            $key ++;
        }

        $courseList = Course::get();

        return view('admin.schedule.index', compact('selectMonth', 'monthList', 'dayList', 'courseList'));
    }

    /**
     *
     * @param string $date
     * @return void
     */
    public function getSchedule($date)
    {
        $schedule = Schedule::where('date', $date)->get();
        return $schedule ;
    }

    /**
     * スケジュールを取得する
     *
     * @param int $id
     * @return object
     */
    public function getScheduleById(int $id)
    {
        $schedule = Schedule::find($id);
        $customerSchedule = new CustomerSchedule();
        $schedule->customerSchedule = $customerSchedule->getCustomerScheduleByScheduleId($id);

        return $schedule ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session()->flash('flash-message-success', ['successsuccesssuccesssuccesssuccesssuccesssuccesssuccesssuccesssuccesssuccess']);
        DB::beginTransaction();
        try {
            $schedule = Schedule::create([
                'date' => $request->date,
                'title' => $request->course_name,
                'days' => $request->days,
                'capacity' => $request->capacity,
            ]);
            $scheduleId = $schedule->id;

            $insertValue = [];
            $participantList = explode (",", $request->participantList);

            foreach ($participantList as $participantId) {
                $insertValue[] = [
                    'schedule_id' => $scheduleId,
                    'customer_id' => $participantId,
                ];
            }
            $customerSchedule = CustomerSchedule::insert($insertValue);


            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('flash-message-errors', ['異常が発生しました','11'])->withInput();
            dd('異常が発生しました', $e->getMessage());
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

