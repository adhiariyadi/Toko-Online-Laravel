<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Merek;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class MobilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $mobil = Mobil::paginate(10);
         return view('admin.mobil.index', compact('mobil'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       $merek = Merek::all();
       return view('admin.mobil.create', compact('merek'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       $this->validate($request, [
         'type' => 'required',
         'price' => 'required',
         'gambar' => 'required'
       ]);

       $gambar = $request->gambar;
       $new_gambar = time(). "_" .$gambar->getClientOriginalName();

       $mobil = Mobil::create([
         'merek_id' => $request->merek_id,
         'type' => $request->type,
         'price' => $request->price,
         'gambar' => 'uploads/mobil/'.$new_gambar,
         'stock' => 10,
       ]);

       $gambar->move('uploads/mobil/', $new_gambar);

       return redirect()->back()->with('success', 'Postingan Anda Berhasil Disimpan');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
          $mobil = Mobil::findorfail($id);
          return view('user.show', compact('mobil'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
       $mobil = Mobil::findorfail($id);
       $merek = Merek::all();
       return view('admin.mobil.edit', compact('mobil', 'merek'));
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
       $this->validate($request, [
         'price' => 'required',
         'type' => 'required'
       ]);

       $mobil = Mobil::findorfail($id);

       if ($request->gambar == true) {
         $gambar = $request->gambar;
         $new_gambar = time(). "_" .$gambar->getClientOriginalName();
         $gambar->move('uploads/mobil/', $new_gambar);
         $mobil_data = [
           'merek_id' => $request->merek_id,
           'type' => $request->type,
           'price' => $request->price,
           'gambar' => 'uploads/mobil/'.$new_gambar,
           'stock' => 10,
         ];
       }

       else {
         $mobil_data = [
           'merek_id' => $request->merek_id,
           'price' => $request->price,
           'type' => $request->type,
           'stock' => 10,
         ];
       }

       $mobil->update($mobil_data);

       return redirect()->back()->with('success', 'Postingan Anda Berhasil Diupdate');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $mobil = Mobil::findorfail($id);
       $mobil->delete();

       return redirect()->back()->with('success', 'Postingan Anda Berhasil Dihapus (Silahkan cek trashed mobil)');
     }

     public function tampil_hapus()
     {
       $mobil = Mobil::onlyTrashed()->paginate(10);
       return view('admin.mobil.tampil_hapus', compact('mobil'));
     }

     public function restore($id)
     {
       $mobil = Mobil::withTrashed()->where('id', $id)->first();
       $mobil->restore();

       return redirect()->back()->with('success', 'Postingan Anda Berhasil Direstore (Silahkan cek list mobil)');
     }

     public function kill($id)
     {
       $mobil = Mobil::withTrashed()->where('id', $id)->first();
       $mobil->forceDelete();

       return redirect()->back()->with('success', 'Postingan Anda Berhasil Dihapus Secara Permanent');
     }

     public function tambah()
     {
       $merek = Merek::all();
       return view('user.tambah', compact('merek'));
     }

     public function insert(Request $request)
     {
       $this->validate($request, [
         'type' => 'required',
         'price' => 'required',
         'gambar' => 'required'
       ]);

       $gambar = $request->gambar;
       $new_gambar = time(). "_" .$gambar->getClientOriginalName();

       $mobil = Mobil::create([
         'merek_id' => $request->merek_id,
         'type' => $request->type,
         'price' => $request->price,
         'gambar' => 'uploads/mobil/'.$new_gambar,
         'stock' => 10,
       ]);

       $gambar->move('uploads/mobil/', $new_gambar);

       return redirect()->route('home')->with('success', 'Postingan Anda Berhasil Disimpan');
     }

     public function home() {
       $mobil = Mobil::orderBy('created_at','DESC')->get();
       $car = Mobil::orderBy('created_at','DESC')->limit(5)->get();
       $merek = Merek::all();
       return view('user.index', compact('mobil', 'car', 'merek'));
     }

     public function cart() {
         $cart = session()->get('cart');
         $mobil = Mobil::paginate(10);

         $this->item['chart'] = $cart;
         $this->item['mobil'] = $mobil;
         return view('user.cart');
   	 }

     public function addToCart($id) {
         $mobil = Mobil::findorfail($id);

         if (!$mobil) {
           abort(404);
         }

         $cart = session()->get('cart');

         // if ('cart') {
         //   $cart = [
         //     $id = [
         //       "mobil_id" => $mobil->id,
         //       "name" => $mobil->type,
         //       "brand" => $merek->name,
         //       "quantity" => 1,
         //       "price" => $mobil->price,
         //       "photo" => $mobil->gambar,
         //     ]
         //   ];
         //
         //   session()->put('cart', $cart);
         //   return redirect()->back()->with('success', 'Product added to cart successfully!');
         // }

         if (isset($cart[$id])) {
           $cart[$id]['quantity']++;
           session()->put('cart', $cart);
           return redirect()->back()->with('success', 'Product added to cart successfully!');
         }

         $cart[$id] = [
           "mobil_id" => $mobil->id,
           "name" => $mobil->type,
           "brand" => $mobil->merek->name,
           "quantity" => 1,
           "price" => $mobil->price,
           "photo" => $mobil->gambar,
         ];

         session()->put('cart', $cart);
         return redirect()->back()->with('success', 'Product added to cart successfully!');
   	}

     public function update_cart(Request $request) {
         if ($request->id and $request->quantity) {
           $cart = session()->get('cart');
           $cart[$request->id]['quantity'] = $request->quantity;
           session()->put('cart', $cart);
           session()->flash('success', 'Cart updated successfully!');
         }
   	}

     public function remove(Request $request) {
         if ($request->id) {
           $cart = session()->get('cart');

           if (isset($cart[$request->id])) {
             unset($cart[$request->id]);

             session()->put('cart', $cart);
             Session::flash('success', 'Berhasil menghapus product');
           }
         }
   	}

    public function cekout() {
        $cart = session()->get('cart');
        $mobil = Mobil::paginate(10);

        $this->item['chart'] = $cart;
        $this->item['mobil'] = $mobil;

        return view('user.cekout');
    }

    public function proses_cekout(Request $request, $id)
    {
      $user = User::findorfail($id);

      $user_data = [
        'address' => $request->address,
        'kelurahan' => $request->kelurahan,
        'kabupaten' => $request->kabupaten,
        'kecamatan' => $request->kecamatan,
        'provinsi' => $request->provinsi,
        'kode_pos' => $request->kode_pos,
        'telepon' => $request->telepon,
      ];

      $user->update($user_data);

      $cart = session()->get('cart');

      foreach($cart as $id => $details)
      {
        Order::create([
          'user_id' => $request->user_id,
          'mobil_id' => $details['mobil_id'],
          'quantity' => $details['quantity'],
          'total' => $details['price'] * $details['quantity'],
          'payment_method' => $request->shipping,
          'payment_status' => 'Belum Dibayar',
        ]);
      }

  		$request->session()->forget('cart');

      return redirect()->route('pembayaran', $user['id'])->with('success', 'Pembelian Berhasil Silahkan Melakukan Pembayaran Melalui Payment Yang Anda Pilih');

      // Mail::to($request->user())
      //     ->cc($moreUsers)
      //     ->bcc($evenMoreUsers)
      //     ->send(new OrderShipped($order));
    }

    public function pembayaran($id) {
        $user = User::findorfail($id);
        $order = Order::orderBy('created_at','DESC')->paginate(10);

        return view('user.pembayaran', compact('user', 'order'));
    }
 }
