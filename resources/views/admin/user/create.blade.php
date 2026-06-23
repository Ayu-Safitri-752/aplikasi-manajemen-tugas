@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('user') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i> 
                Kembali
            </a>
        </div>
        <div class="card-body">
        <form action="{{ route('userStore') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama : 
                    </label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama') }}"
                           class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Email : 
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">
                        <span class="text-danger">*</span> Jabatan : 
                    </label>
                    <select name="jabatan"
                       class="form-control @error('jabatan') is-invalid @enderror">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Admin">Admin</option>
                        <option value="Karyawan">Karyawan</option>
                    </select>

                    @error('jabatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Password : 
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Password Konfirmasi : 
                    </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

           <div>
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save mr-2"></i> 
                Simpan
            </button>
           </div>
           </form>   
        </div>
    </div>
@endsection