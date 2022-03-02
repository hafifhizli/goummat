<div class="container-fluid">
  <div class="card">
    <div class="card-header text-center">
      <h4>Absen Tanggal </h4><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y') ; ?>
    </div>
    <div class="card-body">
     <br/>
     <br/>

     <div class="table-responsive">
      <table class="table table-bordered text-center table-striped table-hover table-datatable" >
        <thead>
          <tr>
            <th width="1%">No</th>
            <th>Nama</th>
              <th>Jabatan</th>
              <th>Gampong</th>
							<th>Kecamatan</th>
							<th>Absen</th>


          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($absensi as $p){
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
                <td><?php echo $p->id; ?></td>
								<td><?php echo $p->jabatan; ?></td>
								<td><?php echo $p->gampong; ?></td>
								<td><?php echo $p->kecamatan; ?></td>
								 <td class="text-center">

									<a href="<?php echo base_url().'admin/absen_karyawan_hadir/'.$p->id; ?>" class="btn btn-sm btn-success"><i class="fa fa-hand-paper-o "></i> Hadir</a>
									<a href="<?php echo base_url().'admin/absen_karyawan_telat/'.$p->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-times "></i></i> Telat</a>
									<a href="<?php echo base_url().'admin/absen_karyawan_sakit/'.$p->id; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-thermometer-quarter "></i> Sakit</a>
                  <a href="<?php echo base_url().'admin/absen_karyawan_izin/'.$p->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-car"></i> Izin</a>
                  <a href="<?php echo base_url().'admin/absen_karyawan_alpa/'.$p->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-eye-slash"></i> Alpa</a>
               
              </td>
							

              
           
            </tr>
            <?php 
            }
          
          ?>
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
