@extends ('layout.main')
@section ('title','tambah fakultas')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="card-body">
                  <h4 class="card-title">prodiTambah</h4>
                  <p class="card-description">
                    formulir tambah prodi
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('prodi.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama Prodi</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama prodi">
                      @error('nama')
                        <label class="text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Fakultas</label>
                      <select name="fakultas_id" class="form-control">
                        <option value="">pilih</option>
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                      </select>
                      @error('fakultas_id')
                        <label class="text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('prodi') }}"class="btn btn-light">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
