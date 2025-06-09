<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function konsultasi(Request $request) {
        $data = $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'nullable'
        ]);

        $data['pertanyaan'] = strip_tags($data['pertanyaan']);
        $data['jawaban'] = strip_tags($data['jawaban']);
        $data['user_id'] = auth()->user()->id; 
        Konsultasi::create($data);
        
        return redirect('/');
    }
}
