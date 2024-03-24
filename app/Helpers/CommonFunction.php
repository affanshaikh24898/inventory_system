<?php 

namespace App\Helpers;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductLot;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\SendMail;
use App\Models\EmailLog;
use Carbon\Carbon;

class  CommonFunction
{

    public static function lowQty()
    {
        $LOW_QTY_COUNT = intval(env('LOW_QTY_COUNT'));
        $user_id = Auth::id();
        $today = Carbon::today();
        if(isset($user_id)){
            $user = User::where('id', $user_id)->first();
            $emailLog = EmailLog::where('user_id', $user->id)
                    ->whereDate('sent_at', $today)
                    ->where('type','qty_update_mail')
                    ->first();
            $products = Product::where('user_id',$user->id)->where('qty', '<', $LOW_QTY_COUNT)->get();
            if (!$emailLog) {
                self::sendelowQtymail($user,$products);
                EmailLog::create([
                    'user_id' => $user->id,
                    'type' => "qty_update_mail",
                    'sent_at' => now(),
                ]);
            }
                
        }else{
            $users = User::all();
            foreach ($users as $user) {
                $emailLog = EmailLog::where('user_id', $user->id)
                    ->whereDate('sent_at', $today)
                    ->where('type','qty_update_mail')
                    ->first();
                $products = Product::where('user_id',$user->id)->where('qty', '<', $LOW_QTY_COUNT)->get();
                if (!$emailLog) {
                    self::sendelowQtymail($user,$products);
                    EmailLog::create([
                        'user_id' => $user->id,
                        'type' => "qty_update_mail",
                        'sent_at' => now(),
                    ]);
                }
            }
        }
    }
    public static function expireyDate()
    {
        $EXPIREY_DATE_COUNT = intval(env('EXPIREY_DATE_COUNT'));
        $user_id = Auth::id();
        $today = Carbon::today();
        if(isset($user_id)){
            $user = User::where('id', $user_id)->first();
            $emailLog = EmailLog::where('user_id', $user->id)
                    ->whereDate('sent_at', $today)
                    ->where('type','expire_update_mail')
                    ->first();
            $products_lot = ProductLot::where('user_id',$user->id)->where('expiration_date', '<', now()->addDays($EXPIREY_DATE_COUNT))->get();
            if (!$emailLog) {
                self::sendeexpireyDatemail($user,$products_lot);
                EmailLog::create([
                    'user_id' => $user->id,
                    'type' => "expire_update_mail",
                    'sent_at' => now(),
                ]);
            }
            
        }else{
            $users = User::all();
            foreach ($users as $user) {
                $emailLog = EmailLog::where('user_id', $user->id)
                    ->whereDate('sent_at', $today)
                    ->where('type','expire_update_mail')
                    ->first();
                $products_lot = ProductLot::where('user_id',$user->id)->where('expiration_date', '<', now()->addDays($EXPIREY_DATE_COUNT))->get();
                if (!$emailLog) {
                    self::sendeexpireyDatemail($user,$products_lot);
                    EmailLog::create([
                        'user_id' => $user->id,
                        'type' => "expire_update_mail",
                        'sent_at' => now(),
                    ]);
                }
            }
        }
    }

    public static function sendelowQtymail($user,$products)
    {
        if ($products->isNotEmpty()) {
            $body = [
                'message'=>'Below are products which going to 0 inventory soon.',
                'products'=>$products,
            ];
        }else{
            $body = [
                'message'=>'no product going to 0 inventory soon.'
            ];
        }
        $to = $user['email'];
        Mail::to($to)->send(new SendMail($body));
    }

    public static function sendeexpireyDatemail($user,$products_lot)
    {
        if ($products_lot->isNotEmpty()) {
            $body = [
                'message'=>'Below are products lots which are expire soon.',
                'products_lot'=>$products_lot,
            ];
        }else{
            $body = [
                'message'=>'no product expire soon.'
            ];
        }
        $to = $user['email'];
        Mail::to($to)->send(new SendMail($body));
    }
}