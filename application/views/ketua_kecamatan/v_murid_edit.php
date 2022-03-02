
<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Ketua Gampong</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'ketua_kecamatan/ketua_gampong' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($ketua_gampong as $m){ ?>
        <form method="post" action="<?php echo base_url().'ketua_kecamatan/ketua_gampong_update'; ?>">
          <div class="form-group">
            <label class="font-weight-bold" for="nama">Nama Lengkap</label>
            <input type="hidden" value="<?php echo $m->id; ?>" name="id">
            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $m->nama; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required="required" value="<?php echo $m->username; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
          </div>

          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>
