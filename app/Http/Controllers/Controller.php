<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notify($notification = null)
    {
        try {
            Message::create([
                'user_id' => Auth::user()->id,
                'subject' => $notification['subject'],
                'content' => $notification['content'],
            ]);
        } catch (\Exception $e) {
            Log::info('Cound not Notify User( ' . Auth::user()->email . ')');
        }
    }

    public function notifyUser($userId, $notification = null)
    {
        try {
            Message::create([
                'user_id' => $userId,
                'subject' => $notification['subject'],
                'content' => $notification['content'],
            ]);
        } catch (\Exception $e) {
            Log::info('Cound not Notify User( ' . $userId . ')');
        }
    }

    public function naira($amount)
    {
        return '₦' . number_format($amount, 2);
    }

    public function creditWallet($amount)
    {
        try {
            $user = User::find(Auth::user()->id);
            $user->balance = Auth::user()->balance + $amount;
            $user->save();
        } catch (\Exception $e) {
            Log::info('Cound not credit User( ' . Auth::user()->email . ' ) Wallet with N' . $amount);
        }

        return true;
    }

    public function creditUserWallet($userId, $amount)
    {
        try {
            $user = User::find($userId);
            $user->balance = $user->balance + $amount;
            $user->save();
        } catch (\Exception $e) {
            Log::info('Cound not credit User( ' . $userId . ' ) Wallet with N' . $amount);
        }

        return true;
    }

    public function debitWallet($amount)
    {
        try {
            $user = User::find(Auth::user()->id);
            $newBalance = $user->balance - $amount;
            $status = $user->update(['balance' => $newBalance >= 0 ? $newBalance : 0]);
        } catch (\Exception $e) {
            Log::info('Cound not Dedit User( ' . Auth::user()->email . ' ) Wallet with N' . $amount);
        }
        return $status;
    }

    public function debitUserWallet($userId, $amount)
    {
        try {
            $user = User::find($userId);
            $newBalance = $user->balance - $amount;
            $status = $user->update(['balance' => $newBalance >= 0 ? $newBalance : 0]);
        } catch (\Exception $e) {
            Log::info('Cound not credit User( ' . $userId . ' ) Wallet with N' . $amount);
        }
        return $status;
    }

    protected function formatPhoneNumber($msisdn)
    {
        return preg_replace('/^0/', '234', '0' . (int) $msisdn);
    }

    /**
     * generate a unique reference
     */
    protected function getUniqueReference()
    {
        return md5(env('APP_NAME') . time() . rand(1, 10000));
    }
}
