<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('template_a');?>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  
    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-12">
 
    <div class="box">


      <div class="box-header" align="center">
        <h3 class="box-title">Data Laporan Tahun 2020</h3>
        <div class="box-body">

          <div class="box-header">
  <?php
          echo $this->session->flashdata('msg');
          ?>

      </div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
            <th>Kategori</th>
            <th><?php echo $cetak->kategori_bumil;?></th>
    </tr>  
          </thead>
          <tbody>
      

          <tr>
           
            <th>Nama Desa</th>
          </th>
           <th>
    <?php echo $cetak->nama_desa;?></th>

          </tr>

<tr>
<th>NIK</th>
            <th><?php echo $cetak->nik;?></th>
          </tr>
          
<tr>
<th>Tempat dan Tanggal Lahir</th>

            <th><?php echo $cetak->ttl;?></th>
          </tr>
<th>Nama Ibu</th>
            <th><?php echo $cetak->nama_ibu;?></th>


<tr>
<th>Usia</th>

            <th><?php echo $cetak->usia;?> Tahun</th>
          </tr>

<tr>
<th>Nama Suami</th>

            <th><?php echo $cetak->nama_suami;?></th>
          </tr>

<tr>
<th>Hamil Ke</th>

            <th><?php echo $cetak->hamil_ke;?></th>
          </tr>

<tr>
<th>Lingkar Lila</th>

            <th><?php echo $cetak->lingkar_lila;?></th>
          </tr>

<tr>
<th>Usia Kehamilan Saat ini</th>

            <th><?php echo $cetak->uksi;?></th>
          </tr>
<tr>

<th>Tanggal</th>

            <th><?php echo tgl_indo($cetak->created_at);?></th>
          </tr>

</tbody>
        </table>
</div>
       
    </div>


      <!-- /.box-header -->
      <div class="box-header">


       

<script type="text/javascript">
  $(document).ready( function () {
      $('#laporan').DataTable();
  } );
</script>

<td><input type="button" class="btn btn-warning" value="Print" onclick="window.print()" /></td> 


    </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<!-- ./wrapper -->


   
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>
</body>
</html>
