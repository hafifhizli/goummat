<div class="container-fluid">
  <div class="card ">
    <div class="card-header text-center">
      <h4>Rekap Absensi Event Karyawan</h4>
      </div>
    <div class="card-body ">
    <div class="table-responsive">
        <table class="table-center table-bordered text-center table-striped table-hover table-datatable">
          <thead >
            <tr>
              <th width="1%" rowspan='2'>No</th>
              <th rowspan='2'>Judul</th>
              <th rowspan='2'>Tanggal</th>
              <th rowspan='2'>Jam Mulai</th>
              <th rowspan='2'>Jam Selesai</th>
              <th rowspan='2'>Lokasi</th>
              <th rowspan='2' >Keterangan</th>
              <th colspan='2'>Rekap</th>
             

          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($event as $p){
              ?>
              <tr>
              <td><?php echo $no++; ?></td>
                <td><?php echo $p->judul; ?></td>
                <td><?php echo $p->tanggal; ?></td>
                <td><?php echo $p->jam_mulai; ?></td>
                <td><?php echo $p->jam_selesai; ?></td>
                <td><?php echo $p->lokasi; ?></td>
                <td><?php echo $p->ket; ?></td>
                <td> <a href="<?php echo base_url().'anggota/rekap_event/'.$p->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf-o"></i></a></td>
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
	