@extends ('layout.main')
@section ('title','tambah fakultas')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="card-body">
                  <h4 class="card-title">Fakultas Tambah</h4>
                  <p class="card-description">
                    formulir tambah fakultas
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('fakultas.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama Fakultas</label>
                      <input type="text" class="form-control" name="name" placeholder="Nama fakultas">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('fakultas') }}"class="btn btn-light">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
