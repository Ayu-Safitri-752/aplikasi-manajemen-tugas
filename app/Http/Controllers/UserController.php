<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    $data = array(
        'title'         => 'Data User',
        'MenuAdminUser' => 'active',
        'user'          => User::orderBy('jabatan','asc')->get(),
    );

    return view('admin.user.index', $data);
    }
    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data User',
            'MenuAdminUser' => 'active',
            'user'          => User::get(),
        );
        return view('admin.user.create', $data);    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'jabatan' => 'required',
            'password' => 'required|confirmed|min:6',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong.',
            'email.required' => 'Email Tidak Boleh Kosong.',
            'email.unique' => 'Email Sudah Terdaftar.',
            'jabatan.required' => 'Jabatan Harus Dipilih.',
            'password.required' => 'Password Tidak Boleh Kosong.',
            'password.confirmed' => 'Password Tidak Sama.',
            'password.min' => 'Password Minimal 6 Karakter.',
        ]);

        $User = new User;
        $User->nama = $request->nama;
        $User->email = $request->email;
        $User->jabatan = $request->jabatan;
        $User->password = Hash::make($request->password);
        $User->is_tugas = false;
        $User->save();   
        
        return redirect()
            ->route('user')
            ->with('success', 'User berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $data = array(
            'title'         => 'Edit Data User',
            'MenuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        );
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);

        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$id, // Mengabaikan email user ini sendiri saat divalidasi
            'jabatan'  => 'required',
            'password' => 'nullable|confirmed|min:6', // Nullable agar tidak wajib diisi saat edit
        ], [
            'nama.required'      => 'Nama Tidak Boleh Kosong.',
            'email.required'     => 'Email Tidak Boleh Kosong.',
            'email.unique'       => 'Email Sudah Terdaftar.',
            'jabatan.required'   => 'Jabatan Harus Dipilih.',
            'password.confirmed' => 'Password Tidak Sama.',
            'password.min'       => 'Password Minimal 6 Karakter.',
        ]);

        $User->nama = $request->nama;
        $User->email = $request->email;
        $User->jabatan = $request->jabatan;

        if ($request->filled('password')) {
            $User->password = Hash::make($request->password);
        }

        $User->save();

        return redirect()
            ->route('user')
            ->with('success', 'User berhasil diperbarui.');
    }
    public function destroy($id)
{
         $user = User::findOrFail($id);

         $user->delete();

         return redirect()
              ->route('user')
              ->with('success', 'User berhasil dihapus.');
}
}
