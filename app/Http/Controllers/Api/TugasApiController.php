<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tugas;

class TugasApiController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('user')
                    ->orderBy('id','desc')
                    ->get();

        return response()->json([
            'status' => true,
            'data' => $tugas
        ]);
    }
}