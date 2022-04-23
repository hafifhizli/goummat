<div class="container text-right">
	<?php
	// membuat tombol cetak jika data sudah di filter
	if (isset($_GET['id_kecamatan']) && isset($_GET['id_gampong'])) {
		$keca = $_GET['id_kecamatan'];
		$id_gampong = $_GET['id_gampong'];
		$year = $_GET['year'];
		$semester = $_GET['semester'];
		if ($_GET['semester'] == 1) {
			$start = $year . '-01-01';
			$end = $year . '-06-30';
		} else {
			$start = $year . '-07-01';
			$end = $year . '-12-31';
		}
	?>
		<!-- <a href="<?php echo base_url() . 'admink/export/?mulai=' . $start . '&end=' . $end . '&id_gampong=' . $id_gampong ?>" class='btn btn-sm btn-success'><i class="fa fa-print"></i> Print Data</a> -->

	<?php
	}
	?>
	<a class='btn btn-success mb-3' style=" color: aliceblue; " onclick="history.back(-1)">Kembali</a>
	<a class='btn btn-warning mb-3' style=" color: aliceblue; " onclick="printDiv()">Print</a>

</div>
<div class="container">
	<div id="konten" class="container table-responsive text-center">
		<table class="table table-striped" id="printable">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th>Nama</th>
					<?php
					if ($_REQUEST['semester'] == 1) {
						echo '<th>Tahap Pertama (Januari - Juni)</th>';
					} else {
						echo '<th>Tahap Kedua (Juli - Desember)</th>';
					}
					?>

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
						<td><?= rupiah($p->total); ?></td>
						<!-- <td><?= rupiah($iuran_wajib[0]['smt_satu'] - $p->total); ?></td> -->
						<td><?php if ($p->total >= $iuran_wajib[0]['smt_satu']) {
								echo '0';
							} else {
								echo rupiah($iuran_wajib[0]['smt_satu'] - $p->total);
							}
							?></td>
						<td><?php if ($p->total >= $iuran_wajib[0]['smt_satu']) {
								echo 'Lunas';
							} else {
								echo 'Belum Lunas';
							}
							?>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('printable');
		newWin = window.open("");
		newWin.document.write(divToPrint.outerHTML);
		newWin.print();
		newWin.close();
	}
</script>