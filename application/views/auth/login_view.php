  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <label>Username: </label>
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Username...">
                    </div>
                    <div class="form-group">
                      <label>Password:</label>
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password...">
                    </div>
                    <div class="form-group">
                      <label>Tahun:</label>
                      <select name="tahun" class="form-control">
                        <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                      </select>;
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>                  
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url(); ?>">Back to Home</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


