<?php

namespace App\Http\Controllers;

use App\Models\MobilModel;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index(){
        $mobils = MobilModel::all();

        return view ('mobil.index', compact('mobils') );
    }

    public function create(Request $request){
        $mobils = MobilModel::all();

        return view ('mobil.create', compact('mobils'));
    }

    public function store(Request $request){
        $request['harga_sewa'] = $this->convertToNumeric($request['harga_sewa']);

        $validateData = $request->validate([
            'nama_mobil' => 'required',
            'jenis_mobil' => 'required',
            'plat_mobil' => 'required',
            'harga_sewa' => 'required',
        ]);

        $mobil = MobilModel::create($validateData);

        return redirect()->route('mobil.index')->with('success', 'Mobil Berhasil Ditambahkan');
    }
    private function convertToNumeric($value)
    {
        return empty($value) ? null : floatval(str_replace('.', '', $value));
    }

    public function edit(MobilModel $mobil){
        return view('mobil.edit', compact('mobil'));
    }
    
    public function update(Request $request, MobilModel $mobil){
        $request['harga_sewa'] = $this->convertToNumeric($request['harga_sewa']);
    
        $validateData = $request->validate([
            'nama_mobil' => 'required',
            'jenis_mobil' => 'required',
            'plat_mobil' => 'required',
            'harga_sewa' => 'required',
        ]);
    
        $mobil->update($validateData);
    
        return redirect()->route('mobil.index')->with('success', 'Mobil Berhasil diedit');
    }
    

    public function destroy (MobilModel $mobil){
        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Asset deleted successfully.');
    }

}
