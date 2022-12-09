<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Merek;
use App\Order;
use App\Bukti;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findorfail($id);
        $user = User::findorfail($order->user_id);
        return view('admin.order.show', compact('order', 'user'));
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
        $order = Order::findorfail($id);

        $order_data = [
            'payment_status' => 'Sudah Dibayar',
        ];

        $order->update($order_data);

        return redirect()->route('order.index')->with('success', 'Order Berhasil Dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findorfail($id);

        $order_data = [
            'payment_status' => 'Dicancel',
        ];

        $order->update($order_data);

        $order = Order::findorfail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Orderan Anda Berhasil Dicencel');
    }

    public function tampil_cancel()
    {
        $order = Order::orderBy('created_at', 'DESC')->onlyTrashed()->paginate(10);
        return view('admin.order.tampil_cancel', compact('order'));
    }

    public function history()
    {
        $user = User::findorfail(Auth::user()->id);
        $order = Order::orderBy('created_at', 'DESC')->where('user_id', $user->id)->paginate(10);
        $merek = Merek::all();

        return view('user.history', compact('order', 'merek'));
    }

    public function pembayaran($id)
    {
        $order = Order::findorfail($id);
        $merek = Merek::all();

        return view('user.pembayaran', compact('order', 'merek'));
    }

    public function proses_pembayaran(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bank' => 'required',
            'nama_pengirim' => 'required',
          ]);

        $order = Order::findorfail($id);

        $order_data = [
            'payment_status' => 'Dipending',
        ];

        $order->update($order_data);
        $gambar = $request->gambar;
        $foto = date('Ymdhis') . "_" . $gambar->getClientOriginalName();
        Bukti::create([
            'order_id' => $id,
            'foto' => 'uploads/bukti/' . $foto,
            'nama_bank' => $request->nama_bank,
            'nama_pengirim' => $request->nama_pengirim,
        ]);
        $gambar->move('uploads/bukti/', $foto);

        return redirect()->route('pembayaran.success')->with('success', 'Pembelian Berhasil Silahkan Melakukan Pembayaran Melalui Payment Yang Anda Pilih');
    }

    public function success()
    {
        $merek = Merek::all();

        return view('user.success', compact('merek'));
    }
}
