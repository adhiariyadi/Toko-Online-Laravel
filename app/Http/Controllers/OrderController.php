<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('payment_status', 'Belum Dibayar')->orderBy('created_at','DESC')->paginate(10);
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
        //
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

        return redirect()->back()->with('success', 'Order Berhasil Dikonfirmasi');
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
      $order = Order::orderBy('created_at','DESC')->onlyTrashed()->paginate(10);
      return view('admin.order.tampil_cancel', compact('order'));
    }

    public function tampil_bayar()
    {
        $order = Order::where('payment_status', 'Sudah Dibayar')->orderBy('created_at','DESC')->paginate(10);
        return view('admin.order.tampil_bayar', compact('order'));
    }

    public function tampil_pending()
    {
        $order = Order::where('payment_status', 'Dipending')->orderBy('created_at','DESC')->paginate(10);
        return view('admin.order.tampil_pending', compact('order'));
    }

    public function bayar($id)
    {
        $order = Order::findorfail($id);

        $order_data = [
          'payment_status' => 'Dipending',
        ];

        $order->update($order_data);

        return redirect()->back()->with('success', 'Pembayaran Berhasil Mohon Tunggu Konfirmasi Dari Admin');
    }
}
