@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        <a href="{{ route( $routePrefix .'.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        <div class="table-responsive">


          {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Cari Nama Siswa" aria-label="cari nama" aria-describedby="button-addon2" value="{{ 
                request('q')
             }}">
            <button type="submit" class="btn btn-outline-primary" id="button-addon2">
              <i class="bx bx-search"></i>
            </button>
          </div>
          {!! Form::close() !!}

          <table class="table table-striped">
            <thead>
              <th>No</th>
              <th>NAMA WALI MURID</th>
              <th>NAMA SISWA</th>
              <th>NISN</th>
              <th>JURUSAN</th>
              <th>KELAS</th>
              <th>ANGKATAN</th>
              <th>DIBUAT OLEH</th>
            </thead>
            <tbody>
              @forelse ($models as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->wali->name }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->angkatan }}</td>
                <td>{{ $item->user->name }}</td>
                <td>

                  {!! Form::open([
                  'route' => [ $routePrefix . '.destroy', $item->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                  ]) !!}
                  <a href="{{ route( $routePrefix . '.edit', $item->id) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </a>
                  <a href="{{ route( $routePrefix . '.show', $item->id) }}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Detail </a>

                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                  {!! Form::close() !!}
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-danger">Data tdak ada</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          {!! $models->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
