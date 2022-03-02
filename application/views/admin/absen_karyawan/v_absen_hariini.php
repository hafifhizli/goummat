<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Mulai Absen Sekarang</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'admin/absen_karyawan_proses'; ?>">
  <div class="form-group">

        
    
        <div class="table-responsive text-center" >
        <table class="table-text-center table-bordered table-striped table-hover table-datatable" style='display:none;' >
        <div class="form-group" >
        
         <thead>
          <tr>
            <th rowspan='2' width="1%">No</th>
            <th rowspan='2'  >ID</th>
          </tr>
        </thead>
        <tbody>
        
        <?php
          $no = 1;
          foreach($karyawan as $a){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td ><input type="hidden" name="id[]<?php echo $a->id; ?>" value="<?php echo $a->id; ?>"><?php echo $a->id; ?></td>
              <td style="width: 0.1%"><input name="id_status" value="0"></td>              
            </tr>
            <?php
          }
          ?>
          </select>
        </div>
        </div>
       


				<p class="text-center font-weight-bold h5"> Wahh!! Anda Belum Melakukan Absensi Hari Ini!!</p><br>
        <button class='btn btn-outline-primary col-sm-4 row-sm-4'><i class="fa fa-hand-paper-o"></i> Absensi Sekarang</button>
      </form>

    </div>
  </div>
  
</div>
