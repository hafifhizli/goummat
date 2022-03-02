<div class="container">
  <div class="card ">
    <div class="card-header text-center">
      <h4>Rekapan Anggota Per Hari</h4>
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

            <form method="post" action="<?php echo base_url().'anggota/karyawan_perhari'?>">
              <div class="form-group">
              <label class="font-weight-bold" >Hari,Bulan dan Tahun</label>

              <input type="date" class="form-control" name="tanggal" id="" /> 
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
