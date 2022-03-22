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
                <a href="#" class="btn btn-primary">Edit</a>
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