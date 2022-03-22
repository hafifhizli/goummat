<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Jabatan</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/ebook' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>
        <form method="post" action="<?php echo base_url().'admink/updategaji'; ?>">
          <div class="form-group">
            <label class="font-weight-bold" for="kelas">Kelas</label>
            <input type="hidden" name="id" value="<?php echo $jabatan['id']; ?>">
            <input type="text" class="form-control" name="gaji" placeholder="Masukkan Kelas" required="required" value="<?php echo $jabatan['jabatan']; ?>">
            <input type="number" class="form-control" name="gaji" placeholder="Masukkan Kelas" required="required" value="<?php echo $jabatan['gaji']; ?>">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
    </div>
  </div>
</div>
