<div class="container">
  <div class="card ">
    <div class="card-header text-center">
      <h4>Rekapan Anggota Baru Perbulan</h4>
    </div>
    <div class="card-body ">

      <br/>

      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card ">
            <div class="card-header  text-center">
              <h6>Filter Berdasarkan Tanggal</h6>
            </div>
            <div class="card-body">

            <form method="post" action="<?php echo base_url().'anggota/karyawan_perbulan'?>">
						<div class="form-group">
          <label class="font-weight-bold" >Karyawan</label>
          <select name="karyawan" id="karyawan" class="form-control">
            <option value="">- Pilih Karyawan</option>
            <?php
					foreach($karyawan as $data){ // Lakukan looping pada variabel siswa dari controller
						echo "<option value='".$data->id."'>".$data->nama."</option>";
					}
					?>
          </select>
        </div>
              <div class="form-group">
              <label class="font-weight-bold" >Bulan dan Tahun</label>

              <input type="text" class="form-control" name="tanggal" id="datepicker" /> 
</div> 
              
               <center> <input type="submit" class="btn btn-primary" value="Filter"></center>
              </form>

            </div>
          </div>
        </div>
      </div>


      
    
  <!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  
  
<script>
   $("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});
</script>
