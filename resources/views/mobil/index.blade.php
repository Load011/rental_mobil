@extends('layout.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <!-- Header -->
                <div class="card-header">
                    <div class="card-title">
                        <h3>Management Mobil</h3>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div>
                        <a href="{{route('mobil.create')}}" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i>
                            <span>Tambah Mobil</span>
                        </a>
                        @if ($mobils->isEmpty())
                        <div class="alert alert-info">
                            Tidak Ada Mobil
                        </div>
                        @else
                    </div>
                    <table class="table" id="asset-table">
                        <thead class="thead-fixed">
                            <tr>
                                <th>#</th>
                                <th>Nama Mobil</th>
                                <th>Jenis Mobil</th>
                                <th>Plat Mobil</th>
                                <th>Harga Sewa (per Bulan)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mobils as $index=>$mobil)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$mobil->nama_mobil}}</td>
                                <td>{{$mobil->jenis_mobil}}</td>
                                <td>{{$mobil->plat_mobil}}</td>
                                <td>Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('mobil.edit', $mobil->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Hapus</button>
                                    </form>
                                </td>                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

                </div>
        </div>
    </div>
</section>
    
@endsection