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
				<th>Jumlah yang Belum Dibayar</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($dtiuran as $p) {
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $p->nama; ?></td>
					<td><?= date('Y-m-d', strtotime($p->tanggal_iuran)); ?></td>
					<td><?=  rupiah($p->jumlah_iuran); ?></td>
					<td><?= rupiah($iuran_wajib[0]['smt_satu'] - $p->jumlah_iuran) ;?></td>
					<td></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
