@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('userCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>

        <div>
            <a href="#" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>

            <a href="#" class="btn btn-sm btn-danger">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th width="120">
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->nama }}
                        </td>

                        <td class="text-center">
                            <span class="badge badge-primary">
                                {{ $item->email }}
                            </span>
                        </td>

                        <td class="text-center">
                            @if ($item->jabatan == 'Admin')
                                <span class="badge badge-dark">
                                    {{ $item->jabatan }}
                                </span>
                            @else
                                <span class="badge badge-info">
                                    {{ $item->jabatan }}
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            @if ($item->is_tugas == false)
                                <span class="badge badge-danger">
                                    Belum Ditugaskan
                                </span>
                            @else
                                <span class="badge badge-success">
                                    Sudah Ditugaskan
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center">

                                <a href="{{ route('userEdit', $item->id) }}"
                                   class="btn btn-sm btn-warning mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('userDelete', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection