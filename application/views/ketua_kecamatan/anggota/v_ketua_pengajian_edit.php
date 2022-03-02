<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Admin Kecamatan</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/ketua_kecamatan' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($ketua_kecamatan as $p){ ?>
        <form method="post" action="<?php echo base_url().'admin/ketua_kecamatan_update'; ?>">
          <div class="form-group">
            <label class="font-weight-bold" for="nama">Nama Lengkap</label>
            <input type="hidden" value="<?php echo $p->id; ?>" name="id">
            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $p->nama; ?>">
          </div>
          
      
        <div class="form-group">
          <label class="font-weight-bold" for="hp">Masukkan Nomor Hp</label>
          <input type="text" class="form-control" name="hp" placeholder="Masukkan Nomor HP" required="required" value="<?php echo $p->hp; ?>">
        </div>

         <div class="form-group">
          <label class="font-weight-bold" for="nama_majelis">Nama Majelis</label>
          <input type="text" class="form-control" name="nama_majelis" placeholder="Masukkan Nama Majelis" required="required" value="<?php echo $p->nama_majelis; ?>">
        </div>

          <label class="font-weight-bold" >Kecamatan</label>
          <select name="id_kecamatan" id="kecamatan" class="form-control">
            <option value="">- Pilih Kecamatan</option>
            <?php
					foreach($kecamatan as $data){ // Lakukan looping pada variabel siswa dari controller
						echo "<option value='".$data->id_kecamatan."'>".$data->kecamatan."</option>";
					}
					?>
          </select>
        </div>


          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>