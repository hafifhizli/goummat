<div class="container text-right">
	<?php
	// membuat tombol cetak jika data sudah di filter
	if (isset($_GET['tanggal_iuran']) && isset($_GET['id_gampong'])) {
		$mulai = $_GET['tanggal_iuran'];
		$id_gampong = $_GET['id_gampong'];
	?>
		<a href="<?php echo base_url() . 'iuran/export_pdf_iuran_admin/?tanggal_iuran=' . $mulai . '&id_gampong=' . $id_gampong ?>" class='btn btn-sm btn-success'><i class="fa fa-print"></i> Print Data</a>

		<a class='btn btn-sm btn-success' style=" color: aliceblue; " onclick="history.back(-1)">Kembali</a>
	<?php
	}
	?>
</div>

<div class="container table-responsive text-center">
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th>Nama</th>
				<th>Tanggal Iuran</th>
				<th>Tahap Pertama (Januari - Juni)</th>
				<th>Tahap Kedua (Juli - Desember)</th>
				<th>Jumlah yang Belum Dibayar</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($iuran as $p) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $p->nama; ?></td>
					<td><?php echo date('d-m-Y', strtotime($p->tanggal_iuran)); ?></td>
					<td><?php echo  number_format($p->jumlah_iuran, 0, ',', '.'); ?></td>
					<td><?php echo  number_format($p->jumlah_iuran, 0, ',', '.'); ?></td>
					<td></td>
					<td></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
