<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tugas;
use App\Models\User;

class TugasController extends Controller
{
    public function index()
    {
        $data = [
            'title'          => 'Data Tugas',
            'MenuAdminTugas' => 'active',
            'tugas'          => Tugas::with('user')
                                ->orderBy('id','desc')
                                ->get(),
    ];

        return view('admin.tugas.index', $data);
    }

    public function create()
{
    $data = [
        'title'          => 'Tambah Tugas',
        'MenuAdminTugas' => 'active',
        'user'           => User::where('jabatan','Karyawan')->get(),
    ];

    return view('admin.tugas.create', $data);
}
public function store(Request $request)
{
    $request->validate([
        'judul'     => 'required',
        'deskripsi' => 'required',
        'user_id'   => 'required',
        'deadline'  => 'required',
    ], [
        'judul.required'     => 'Judul tugas wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'user_id.required'   => 'Karyawan harus dipilih.',
        'deadline.required'  => 'Deadline wajib diisi.',
    ]);

    Tugas::create([
        'judul'     => $request->judul,
        'deskripsi' => $request->deskripsi,
        'user_id'   => $request->user_id,
        'deadline'  => $request->deadline,
        'status'    => 'Belum Dikerjakan',
    ]);

    User::where('id', $request->user_id)
        ->update([
            'is_tugas' => true
        ]);

    return redirect()
        ->route('tugas')
        ->with('success', 'Tugas berhasil ditambahkan.');
}
}
