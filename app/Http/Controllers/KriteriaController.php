<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KriteriaController extends Controller {

    public function index(){
        $kriteria = Kriteria::get();
        return view ('criteria.kriteria', compact('kriteria'));
     }

     public function create() {
        return view('criteria.creatKriteria'); // Assuming you have a 'create.blade.php' view
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kode' => 'required',
            'bobot' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nama'] = $request->nama;
        $data['kode'] = $request->kode;
        $data['bobot'] = $request->bobot;

        Kriteria::create($data);

        return redirect()->route('kriteria'); // Assuming the route name is 'kriteria.index'
    }

    public function edit($id) {
        $kriteria = Kriteria::find($id);
        return view('criteria.editKriteria', compact('kriteria')); // Assuming you have an 'edit.blade.php' view
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nama'] = $request->nama;
        $data['kode'] = $request->kode;
        $data['bobot'] = $request->bobot;

        Kriteria::whereId($id)->update($data);

        return redirect()->route('kriteria'); // Assuming the route name is 'kriteria.index'
    }

    public function delete($id) {
        $kriteria = Kriteria::find($id);

        if ($kriteria) {
            $kriteria->delete();
        }

        return redirect()->route('kriteria'); // Assuming the route name is 'kriteria.index'
    }

}
