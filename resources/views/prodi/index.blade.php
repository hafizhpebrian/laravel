@extends ('layout.main')
@section ('title','mahasiswa')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Prodi Table</h4>
                  <p class="card-description">
                    daftar prodi
                  </p>

                  @can('create', App\prodi::class)
                    <a href="{{route('prodi.create')}}"class="btn btn-dark btn-rounded btn-fw">tambah</a>
                  @endcan

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Nama Prodi</th>
                            <th>Nama fakultas</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                    @foreach ($prodi as $item)
                        <tr>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['fakultas']['name']}}</td>
                            <td>
                                 <div class="d-flex justify-content">

                                        <a href="{{ route('prodi.edit', $item->id) }}">
                                            @can('update', $item)
                                                <button class="btn btn-success btn-sm">Edit</button>
                                            @endcan
                                        </a>

                                <form method="post" action="{{ route('prodi.destroy', $item->id) }}">
                                    @method('delete')
                                    @csrf

                                    @can('delete', $item)
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                        data-toggle="tooltip" title='Delete' data-nama='{{ $item->nama }}'>Delete</button>
                                    @endcan
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection

