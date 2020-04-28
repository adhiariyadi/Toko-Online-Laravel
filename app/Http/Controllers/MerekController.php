<?php

namespace App\Http\Controllers;

use App\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merek = Merek::paginate(10);
        return view('admin.merek.index', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merek.create');
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
          'name' => 'required|min:3'
        ]);

        $merek = Merek::create([
          'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Merek Berhasil Disimpan');
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
        $merek = Merek::findorfail($id);
        return view('admin.merek.edit', compact('merek'));
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
        'name' => 'required|min:3'
      ]);

      $merek_data = [
        'name' => $request->name,
      ];

      Merek::whereId($id)->update($merek_data);

      return redirect()->route('merek.index')->with('success', 'Merek Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merek = Merek::findorfail($id);
        $merek->delete();

        return redirect()->back()->with('success', 'Merek Berhasil Dihapus');
    }
}
