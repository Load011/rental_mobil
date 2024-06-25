<?php

namespace App\Http\Controllers;

use App\Models\PenyewaModel;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index(){
        $penyewa = PenyewaModel::all();

        return view ('penyewa.index', compact('penyewa'));
    }
}
