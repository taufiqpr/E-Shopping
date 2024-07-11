<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AlternatifController extends Controller {
    public function index(){
        $alternatif = Alternatif::get();
        return view ('alternativ.alternatif', compact('alternatif'));
     }

     public function create() {
        return view('alternativ.creatAlternatif'); // Assuming you have a 'create.blade.php' view
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nama'] = $request->nama;
        $data['C1'] = $request->C1;
        $data['C2'] = $request->C2;
        $data['C3'] = $request->C3;
        $data['C4'] = $request->C4;
        $data['C5'] = $request->C5;

        Alternatif::create($data);

        return redirect()->route('alternatif'); // Assuming the route name is 'kriteria.index'
    }

    public function edit($id) {
        $alternatif = Alternatif::find($id);
        return view('alternativ.editAlternatif', compact('alternatif')); // Assuming you have an 'edit.blade.php' view
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nama'] = $request->nama;
        $data['C1'] = $request->C1;
        $data['C2'] = $request->C2;
        $data['C3'] = $request->C3;
        $data['C4'] = $request->C4;
        $data['C5'] = $request->C5;

        Alternatif::whereId($id)->update($data);

        return redirect()->route('alternatif'); // Assuming the route name is 'kriteria.index'
    }

    public function delete($id) {
        $alternatif = Alternatif::find($id);

        if ($alternatif) {
            $alternatif->delete();
        }

        return redirect()->route('alternatif'); // Assuming the route name is 'kriteria.index'
    }


}
