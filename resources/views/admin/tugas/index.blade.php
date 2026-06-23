@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tasks mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="cardheader d-flex flex-wrap justify-content-center justify-content-xl-between">
           <div class="mb-1 mr-2">
            <a href="{{ route('tugasCreate') }}" class="btn btn-sm btn-primary">
               <i class="fas fa-plus mr-2"></i> 
               Tambah Data
            </a>
           </div>
           <div>
            <a href="" class="btn btn-sm btn-success">
               <i class="fas fa-file-excel mr-2"></i> 
               Excel
            </a>
            <a href="" class="btn btn-sm btn-danger">
               <i class="fas fa-file-excel mr-2"></i> 
                PDF
            </a>
           </div>

        </div>
        <div class="card-body">
        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-primary text-white">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tugas</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>
                                                <i class="fas fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
    @forelse($tugas as $item)
    <tr>
        <td class="text-center">
            {{ $loop->iteration }}
        </td>

        <td>
            {{ $item->user->nama ?? '-' }}
        </td>

        <td>
            {{ $item->judul }}
        </td>

        <td class="text-center">
            <span class="badge badge-dark badge-pill">
                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
            </span>
        </td>

        <td class="text-center">
            <span class="badge badge-info badge-pill">
                {{ \Carbon\Carbon::parse($item->deadline)->format('d-m-Y') }}
            </span>
        </td>

        <td class="text-center">
            <a href="{{ route('tugasEdit', $item->id) }}"
               class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i>
            </a>

            <form action="{{ route('tugasDelete', $item->id) }}"
                  method="POST"
                  class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus tugas ini?')">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center">
            Tidak ada data tugas
        </td>
    </tr>
    @endforelse
</tbody>
                                </table>
                            </div>
        </div>
    </div>
@endsection