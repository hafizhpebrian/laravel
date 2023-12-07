@extends ('layout.main')
@section ('title','fakultas')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
                  <div class="row">
                <div class="card-body">
                  <h4 class="card-title">Fakultas Table</h4>
                  <p class="card-description">
                    daftar fakultas di universitas mdp
                  </p>

                  @if (Auth::user()->role == 'A')
                    <a href="{{route('fakultas.create')}}"class="btn btn-dark btn-rounded btn-fw">tambah</a>
                  @endif

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Nama fakultas</th><th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach ($fakultas as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>
                                <div class="d-flex justify-content">
                                    <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form method="post" action="{{ route('fakultas.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                            data-toggle="tooltip" title='Delete' data-nama='{{ $item->nama }}'>Delete</button>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

    </div>
@endsection
