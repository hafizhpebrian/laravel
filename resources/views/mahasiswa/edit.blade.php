@extends ('layout.main')
@section ('title','mahasiswa')

@section ('content')
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit mahasiswa</h4>
                  <p class="card-description">
                    Formulir edit mahasiwa
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label for="name">Nomor Pokok Mahasiswa</label>
                      <input type="text" class="form-control" name="name" placeholder="Nomor Pokok Mahasiswa" value="{{ $mahasiswa->name }}">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="name" placeholder="Nama Mahasiswa" value="{{ $mahasiswa->name }}">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Tempat Lahir</label>
                      <input type="text" class="form-control" name="name" placeholder="Tempat lahir" value="{{ $mahasiswa->tempat_lahir}}">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Tanggal lahir</label>
                      <input type="date" class="form-control" name="name" placeholder="Tanggal Lahir" value="{{ $mahasiswa->tanggal_lahir}}">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto">upload foto</label>
                      <input type="file" class="form-control" name="foto" placeholder="foto">
                    @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">nama prodi</label>
                      <input type="text" class="form-control" name="name" placeholder="Tempat lahir" value="{{ $mahasiswa->tempat_lahir}}">
                      @error('name')
                        <label class="text-danger">{{ $messege }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="prodi_id"></label>
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Fakultas</label>
                      <select name="fakultas_id" class="form-control">
                        <option value="">pilih</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $mahasiswa->prodi_id? 'selected' : null }}>{{ $item->name }}
                            </option>
                        @endforeach
                      </select>
                      @error('fakultas_id')
                        <label class="text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                      <div class="form-group">
                        <label for="prodi_id"></label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('fakultas') }}"class="btn btn-light">Batal</a>
                  </form>
                </div>
              </div>
            </div>
@endsection


