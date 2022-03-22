<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Sistem Penggajian</h2>
        </div>
        <div class="card-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Gaji</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        foreach($jabatan as $row){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->jabatan; ?></td>
            <td><?php echo $row->gaji; ?></td>
            <td>
            <a href="<?php echo base_url().'admink/editgaji/'.$row->id; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
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