<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RecycleFromHome;

class VendorController extends Controller
{
    public function index(){
        $data = RecycleFromHome::where('vendor_id', auth()->user()->id)->get();
        return view('vendor.index', compact('data'));
    }

    public function approval(string $id){
        $dataPengiriman = RecycleFromHome::find($id);
        $dataPengiriman->update(['status' => 'Approved']);
        $pointUser = $dataPengiriman->berat * 200;
        $user = User::find($dataPengiriman->user_id);
        $user->update([
            'point' => $user->point + $pointUser,
            'historyPoint' => $user->historyPoint + $pointUser
        ]);

        return redirect()->back()->with('succes', 'Data Pengiriman berhasil diapprove');
    }
}
