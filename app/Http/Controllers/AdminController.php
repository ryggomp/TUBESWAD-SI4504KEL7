<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\RecycleFromHome;

class AdminController extends Controller
{
    public function listVendor(){
        $vendor = User::role('vendor')->get();
        foreach($vendor as $data){
            $data->joinDate = Carbon::parse($data->created_at)->format('l, d-m-Y');
        }
        return view('admin.listVendor', compact('vendor'));
    }

    public function listRecycle(){
        $listRecycle = RecycleFromHome::all();
        return view('admin.listRecycle', compact('listRecycle'));
    }

    public function allOrder(){
        $order = Order::all();
        foreach($order as $data){
            $data->date = Carbon::parse($data->created_at)->format('l, d-m-Y');
        }
        return view('admin.allOrder', compact('order'));
    }

    public function feedback(){
        $feedback = Feedback::all();
        foreach($feedback as $data){
            $data->date = Carbon::parse($data->created_at)->format('l, d-m-Y');
        }
        return view('admin.feedback', compact('feedback'));
    }
}
