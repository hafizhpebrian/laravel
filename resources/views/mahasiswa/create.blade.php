@extends ('layout.main')
@section ('title','mahasiswa')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mahasiswa Table</h4>
                  <p class="card-description">
                    Daftar Mahasiswa
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nomor Pokok Mahasiswa</label>
                      <input type="text" class="form-control" name="name" placeholder="Nomor Pokok Mahasiswa">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="name" placeholder="Nama Mahasiswa">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Tempat Lahir</label>
                      <input type="text" class="form-control" name="name" placeholder="Tempat lahir">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Tanggal lahir</label>
                      <input type="date" class="form-control" name="name" placeholder="Tanggal Lahir">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">upload foto</label>
                      <input type="text" class="form-control" name="name" placeholder="foto">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
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
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                      </select>
                      @error('fakultas_id')
                        <label class="text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('fakultas') }}"class="btn btn-light">Batal</a>
                  </form>
                </div>
              </div>
            </div>
@endsection


