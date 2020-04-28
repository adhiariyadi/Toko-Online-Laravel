<?php

namespace App\Http\Controllers;

use App\User;
use App\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.akun.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akun.create');
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
          'name' => 'required',
          'role' => 'required',
          'email' => 'required',
          'password' => 'required|min:8',
        ]);

        if ($request->has('gambar') == true) {
          $gambar = $request->gambar;
          $new_gambar = time(). "_" .$gambar->getClientOriginalName();
          $gambar->move('uploads/akun/', $new_gambar);
          $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'gambar' => 'uploads/akun/'.$new_gambar,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ]);
        }
        else {
          $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ]);
        }


        return redirect()->back()->with('success', 'User Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Mobil::findorfail($id);
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.akun.edit', compact('user'));
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
          'name' => 'required',
          'role' => 'required',
          'email' => 'required',
          'address' => 'required',
          'kelurahan' => 'required',
          'kabupaten' => 'required',
          'kecamatan' => 'required',
          'provinsi' => 'required',
          'kode_pos' => 'required',
          'telepon' => 'required',
        ]);

        $user = User::findorfail($id);

        if ($request->gambar == true) {
          $gambar = $request->gambar;
          $new_gambar = time(). "_" .$gambar->getClientOriginalName();
          $gambar->move('uploads/mobil/', $new_gambar);

          if ($request->gambar && $request->pekerjaan == true) {

            if ($request->gambar && $request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun == true) {

              if ($request->gambar && $request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
                $user_data = [
                  'name' => $request->name,
            'role' => $request->role,
                  'email' => $request->email,
                  'address' => $request->address,
                  'kelurahan' => $request->kelurahan,
                  'kabupaten' => $request->kabupaten,
                  'kecamatan' => $request->kecamatan,
                  'provinsi' => $request->provinsi,
                  'telepon' => $request->telepon,
                  'pekerjaan' => $request->pekerjaan,
                  'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                  'password' => Hash::make($request->password),
                  'gambar' => 'uploads/akun/'.$new_gambar,
                ];
              }

              else {
                $user_data = [
                  'name' => $request->name,
            'role' => $request->role,
                  'email' => $request->email,
                  'address' => $request->address,
                  'kelurahan' => $request->kelurahan,
                  'kabupaten' => $request->kabupaten,
                  'kecamatan' => $request->kecamatan,
                  'provinsi' => $request->provinsi,
                  'telepon' => $request->telepon,
                  'pekerjaan' => $request->pekerjaan,
                  'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                  'gambar' => 'uploads/akun/'.$new_gambar,
                ];
              }
            }

            elseif ($request->gambar && $request->pekerjaan && $request->password == true) {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'pekerjaan' => $request->pekerjaan,
                'password' => Hash::make($request->password),
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }

            else {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'pekerjaan' => $request->pekerjaan,
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }
          }

          elseif ($request->gambar && $request->tanggal && $request->bulan && $request->tahun == true) {

            if ($request->gambar && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'password' => Hash::make($request->password),
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }

            else {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }
          }

          elseif ($request->gambar && $request->password == true) {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'password' => Hash::make($request->password),
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }
        }

        elseif ($request->pekerjaan == true) {

          if ($request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun == true) {

            if ($request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'password' => Hash::make($request->password),
                'pekerjaan' => $request->pekerjaan,
              ];
            }

            else {
              $user_data = [
                'name' => $request->name,
            'role' => $request->role,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'pekerjaan' => $request->pekerjaan,
              ];
            }
          }

          elseif ($request->pekerjaan && $request->password == true) {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'password' => Hash::make($request->password),
              'pekerjaan' => $request->pekerjaan,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'pekerjaan' => $request->pekerjaan,
            ];
          }
        }

        elseif ($request->tanggal && $request->bulan && $request->tahun == true) {

          if ($request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'password' => Hash::make($request->password),
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
            'role' => $request->role,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
            ];
          }
        }

        elseif ($request->password == true) {
          $user_data = [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
          ];
        }

        else {
          $user_data = [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
          ];
        }

        // dd($user_data);

        $user->update($user_data);

        return redirect()->back()->with('success', 'User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Dihapus');
    }

    public function profil($id)
    {
        $user = User::findorfail($id);
        return view('user.profile', compact('user'));
    }

    public function edit_profil($id)
    {
        $user = User::findorfail($id);
        return view('user.edit', compact('user'));
    }

    public function simpan(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'kelurahan' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'provinsi' => 'required',
        'kode_pos' => 'required',
        'telepon' => 'required',
      ]);

      $user = User::findorfail($id);

      if ($request->gambar == true) {
        $gambar = $request->gambar;
        $new_gambar = time(). "_" .$gambar->getClientOriginalName();
        $gambar->move('uploads/mobil/', $new_gambar);

        if ($request->gambar && $request->pekerjaan == true) {

          if ($request->gambar && $request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun == true) {

            if ($request->gambar && $request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
              $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'pekerjaan' => $request->pekerjaan,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'password' => Hash::make($request->password),
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }

            else {
              $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'provinsi' => $request->provinsi,
                'telepon' => $request->telepon,
                'pekerjaan' => $request->pekerjaan,
                'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
                'gambar' => 'uploads/akun/'.$new_gambar,
              ];
            }
          }

          elseif ($request->gambar && $request->pekerjaan && $request->password == true) {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'pekerjaan' => $request->pekerjaan,
              'password' => Hash::make($request->password),
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'pekerjaan' => $request->pekerjaan,
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }
        }

        elseif ($request->gambar && $request->tanggal && $request->bulan && $request->tahun == true) {

          if ($request->gambar && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
              'password' => Hash::make($request->password),
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
              'gambar' => 'uploads/akun/'.$new_gambar,
            ];
          }
        }

        elseif ($request->gambar && $request->password == true) {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'gambar' => 'uploads/akun/'.$new_gambar,
          ];
        }

        else {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'gambar' => 'uploads/akun/'.$new_gambar,
          ];
        }
      }

      elseif ($request->pekerjaan == true) {

        if ($request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun == true) {

          if ($request->pekerjaan && $request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
              'password' => Hash::make($request->password),
              'pekerjaan' => $request->pekerjaan,
            ];
          }

          else {
            $user_data = [
              'name' => $request->name,
              'email' => $request->email,
              'address' => $request->address,
              'kelurahan' => $request->kelurahan,
              'kabupaten' => $request->kabupaten,
              'kecamatan' => $request->kecamatan,
              'provinsi' => $request->provinsi,
              'telepon' => $request->telepon,
              'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
              'pekerjaan' => $request->pekerjaan,
            ];
          }
        }

        elseif ($request->pekerjaan && $request->password == true) {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'pekerjaan' => $request->pekerjaan,
          ];
        }

        else {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'pekerjaan' => $request->pekerjaan,
          ];
        }
      }

      elseif ($request->tanggal && $request->bulan && $request->tahun == true) {

        if ($request->tanggal && $request->bulan && $request->tahun && $request->password == true) {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
          ];
        }

        else {
          $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'kelurahan' => $request->kelurahan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'telepon' => $request->telepon,
            'tanggal_lahir' => $request->tanggal . ' ' . $request->bulan . ' ' . $request->tahun,
          ];
        }
      }

      elseif ($request->password == true) {
        $user_data = [
          'name' => $request->name,
          'email' => $request->email,
          'address' => $request->address,
          'kelurahan' => $request->kelurahan,
          'kabupaten' => $request->kabupaten,
          'kecamatan' => $request->kecamatan,
          'provinsi' => $request->provinsi,
          'telepon' => $request->telepon,
          'password' => Hash::make($request->password),
        ];
      }

      else {
        $user_data = [
          'name' => $request->name,
          'email' => $request->email,
          'address' => $request->address,
          'kelurahan' => $request->kelurahan,
          'kabupaten' => $request->kabupaten,
          'kecamatan' => $request->kecamatan,
          'provinsi' => $request->provinsi,
          'telepon' => $request->telepon,
        ];
      }

      // dd($user_data);

      $user->update($user_data);

      return redirect()->route('profil', $user['id'])->with('success', 'Pembelian Berhasil Silahkan Melakukan Pembayaran Melalui Payment Yang Anda Pilih');
    }
}
