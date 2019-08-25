<?php

namespace App\Http\Controllers\Control;

use App\DataPlan;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Data;

class DatasController extends ModController
{
    protected $failureResponse = 'Operation Failed';
    protected $successResponse = 'Operation Successful';

    public function show()
    {

        $transactions = Transaction::where('class_type', 'App\Data')->whereStatus(1)->orderBy('id', 'desc')->paginate(20);

        return view('control.datas', compact('transactions'));
    }

    public function edit(Transaction $trans)
    {
        $declined = request()->has('decline');
        $completed = request()->has('completed');
        $transStatus = $trans->class->status && $trans->status;
        $declined = $declined && $transStatus ? $this->declineAndRefund($trans) : false;
        $completed =  $completed && $transStatus ? $this->markOrderAsComplete($trans) : false;
        $status = $declined || $completed ? true : false;
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    protected function markOrderAsComplete($trans)
    {
        $status = $trans->update(['status' => 2]);
        return $status ? $trans->class->update(['status' => 2]) : false;
    }

    protected function declineAndRefund($trans)
    {
        $user = $trans->user;
        $newBalance = $user->balance + $trans->amount;
        $refundStatus = $user->update(['balance' => $newBalance]);
        $status = $refundStatus ? $trans->update(['status' => 0]) : false;

        return $status ? $trans->class->update(['status' => 0]) : false;
    }


    public function settings(DataPlan $network)
    {
        $plans = $network->plans;

        return view('control.data', compact('plans', 'network'));
    }

    public function editDataPlan(Dataplan $network)
    {
        //validate request
        $this->validate(request(), [
            'amount' => 'required|numeric', 'volume' => 'required|string'
        ]);
        $status = $network->update(['volume' => request()->volume, 'amount' => request()->amount]);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    public function newDataPlan(Dataplan $network)
    {
        //validate request
        $this->validate(request(), ['amount' => 'required|numeric', 'volume' => 'required|string']);
        $status = Dataplan::create([
            'volume' => request()->volume,
            'amount' => request()->amount,
            'network' => $network->network,
            'network_id' => $network->network_id,
            'notification_phone' => $network->notification_phone,
        ]);
        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }

    public function editDataPlanNotification(Dataplan $network)
    {
        //validate request
        $this->validate(request(), [
            'email' => 'sometimes|email', 'emailNotificationStatus' => 'sometimes|string',
            'phone' => 'sometimes|string', 'phoneNotificationStatus' => 'sometimes|string',
        ]);
        // get and instance of the data plan
        $dataPlan = DataPlan::where('network_id', $network->network_id);
        //update the instance of the dataplan
        $status = $dataPlan->update([
            'phone_notification_status' => request()->has('phoneNotificationStatus'),
            'email_notification_status' => request()->has('emailNotificationStatus'),
            'notification_phone' => request()->phone ?? $dataPlan->first()->notification_phone,
            'notification_email' => request()->email ?? $dataPlan->first()->notification_email,
        ]);

        $message = $status ? $this->successResponse : $this->failureResponse;

        return back()->withNotification($this->clientNotify($message, $status));
    }
}
