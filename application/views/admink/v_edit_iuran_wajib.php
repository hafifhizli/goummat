<div class="container">
	<div class="card">
		<div class="card-header text-center">
			<h4>Edit Jumlah Iuran Wajib</h4>
		</div>
		<div class="card-body">
			<br />
			<br />


			<form method="post" action="">
				<div class="form-group">
					<input type="hidden" name="id" value=">
						<label for=" jabatan" class="form-label">
					Tahap
					</label>
					<input readonly type="text" class="form-control mb-3" name="jabatan" required="required" value="">

					<label class="font-weight-bold">Jumlah Iuran</label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Rp.</span>
						<input type="number" class="form-control" placeholder="00" aria-label="Jumlah Iuran" aria-describedby="basic-addon1">
					</div>
				</div>
				<input type="submit" class="btn btn-primary" value="Simpan">
				<button type="button" onclick="history.back(-1)" class="btn btn-dark">Kembali</button>

			</form>


		</div>
	</div>
</div>
