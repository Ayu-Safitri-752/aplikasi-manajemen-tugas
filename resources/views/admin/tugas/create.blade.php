@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header">
        <a href="{{ route('tugas') }}" class="btn btn-success btn-sm">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <div class="card-body">

        <form action="{{ route('tugasStore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Judul Tugas</label>
                <input type="text"
                       name="judul"
                       class="form-control @error('judul') is-invalid @enderror">

                @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Karyawan</label>

                <select name="user_id"
                        class="form-control @error('user_id') is-invalid @enderror">

                    <option value="">
                        -- Pilih Karyawan --
                    </option>

                    @foreach($user as $u)
                        <option value="{{ $u->id }}">
                            {{ $u->nama }}
                        </option>
                    @endforeach

                </select>

                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea name="deskripsi"
                          rows="5"
                          class="form-control @error('deskripsi') is-invalid @enderror"></textarea>

                @error('deskripsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Deadline</label>

                <input type="date"
                       name="deadline"
                       class="form-control @error('deadline') is-invalid @enderror">

                @error('deadline')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>

        </form>

    </div>
</div>

@endsection