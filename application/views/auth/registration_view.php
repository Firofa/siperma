<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Masukan Nama Pengguna...">
                </div>
                <div class="form-group row">
                    <label>NIP:</label>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukan Nomor Induk Pegawai...">
                </div>
                <div class="form-group row">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Masukan Jabatan Pegawai...">
                </div>
                <div class="form-group row">
                    <label>Pangkat:</label>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat" placeholder="Masukan Pangkat Pegawai...">
                </div>
                <div class="form-group row">
                    <label>Tahun:</label>
                    <input type="number" class="form-control form-control-user" id="pangkat" name="pangkat" placeholder="Masukan Tahun Masuk Pegawai...">
                </div>
                <div class="form-group row">
                    <label>Username:</label>
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username...">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Password:</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <label>Konfirmasi Password:</label>
                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="level_akses_id">Level Akses:</label>
                  <select class="form-control" id="level_akses_id" name="level_akses_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group row">
                  <label for="work_unit_id">Unit Kerja:</label>
                  <select class="form-control" id="work_unit_id" name="work_unit_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group row">
                  <label for="ruangan_id">Ruangan:</label>
                  <select class="form-control" id="ruangan_id" name="ruangan_id">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Back to Home</a>
              </div>
              <div class="text-center">
                <a class="small" href="#">Back to Admin Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
