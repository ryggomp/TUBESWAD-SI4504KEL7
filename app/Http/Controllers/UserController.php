<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\RecycleFromHome;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function recycleFromHome(){
        $vendor = User::role('vendor')->get();
        return view('user.recycleFromHome', compact('vendor'));
    }

    public function recycleFromHomeStore(Request $request){
        try{
            $request->validate([
                'nama' => 'required|string',
                'alamat' => 'required|string',
                'vendor' => 'required',
                'jenisSampah' => 'required|string',
                'berat' => 'required|integer',
                'tanggal' => 'required',
                'deskripsi' => 'required|string',
                'file' => 'required',
            ]);
            
            $filenameExt = $request->file('file')->getClientOriginalExtension();
            $filename = pathinfo($filenameExt, PATHINFO_EXTENSION);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/buktiRecycle', $filenameSave);
            
            RecycleFromHome::create([
                'user_id' => auth()->user()->id,
                'nama' => $request->nama,
                'vendor_id' => $request->vendor,
                'alamat' => $request->alamat,
                'jenisRecycle' => 'Recycle From Home',
                'jenisSampah' => $request->jenisSampah,
                'berat' => $request->berat,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'file' => $filenameSave,
                'status' => 'Processing'
            ]);
            
            return redirect()->back()->with('success', 'Anda berhasil submit form Recycle From Home');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);

        }
    }
    public function nearestRecycle(){
        $vendor = User::role('vendor')->get();
        return view ('user.nearestRecycle', compact('vendor'));
    }

    public function nearestRecycleStore(Request $request){
        try{
            $request->validate([
                'nama' => 'required|string',
                'alamat' => 'required|string',
                'vendor' => 'required',
                'jenisSampah' => 'required|string',
                'berat' => 'required|integer',
                'tanggal' => 'required',
                'deskripsi' => 'required|string',
                'file' => 'required',
            ]);
            
            $filenameExt = $request->file('file')->getClientOriginalExtension();
            $filename = pathinfo($filenameExt, PATHINFO_EXTENSION);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/buktiRecycle', $filenameSave);
            
            RecycleFromHome::create([
                'user_id' => auth()->user()->id,
                'nama' => $request->nama,
                'vendor_id' => $request->vendor,
                'alamat' => $request->alamat,
                'jenisRecycle' => 'Recycle Onsite',
                'jenisSampah' => $request->jenisSampah,
                'berat' => $request->berat,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'file' => $filenameSave,
                'status' => 'Processing'
            ]);
            
            return redirect()->back()->with('success', 'Anda berhasil submit form Recycle Onsite');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);

        }
    }

    public function dashboard(){
        $data = RecycleFromHome::where('user_id', auth()->user()->id)->get();
        return view('user.dashboard', compact('data'));
    }

    public function store(){
        $store = Store::all();
        return view('user.store', compact('store'));
    }

    public function storeBuy(Request $request){
        $request->validate([
            'quantity' => 'required|integer'
        ]);
        $barang = Store::find($request->barang_id);
        $user = Auth::user();
        $price = $request->quantity * $barang->price;
        if($user->point < $price){
            return redirect()->back()->with('warning', "You don't have enough points to purchase");
        } else{
            $userPoint = $user->point - $price;
            $user->update(['point' => $userPoint]);
            Order::create([
                'order_id' => 1,
                'user_id' => $user->id,
                'barang_id' => $request->barang_id,
                'quantity' => $request->quantity,
                'totalPrice' => $price
            ]);
            return redirect()->back()->with('success', "Your Order Success");
        }
    }

    public function myorder(){
        $myorder = Order::where('user_id', auth()->user()->id)->get();
        foreach($myorder as $data){
            $data->test = Carbon::parse($data->created_at)->format('l, d-m-Y');
        }
        return view('user.myorder', compact('myorder'));
    }
    
    public function feedback(Request $request){
        $request->validate([
            'feedback' => 'required|string'
        ]);

        Feedback::create([
            'user_id' => auth()->user()->id,
            'feedback' => $request->feedback
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback');
    }

    public function aboutus(){
        return view('user.aboutus');
    }
}
