<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('template_a');?>
 </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'config/top-menu.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include 'config/side.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Control Panel</small>
      
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-12">

    
   
    
    <table class="" cellspacing="3" width="10px">
          <thead>
          <tr>
            <th><a href="<?php echo base_url();?>dashboard/tmbhkirimlaporan">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Data Ibu Melahirkan</button><br><br>
    </a></th>
            <th><a href="<?php echo base_url();?>dashboard/data_bayi_baru_lahir">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Data Bayi Baru Lahir</button><br><br>
    </a></th>
            </th>
            <th><a href="<?php echo base_url();?>dashboard/data_imunisasi">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Imunisasi</button><br><br>
    </a></th></th>
            <th><a href="<?php echo base_url();?>dashboard/data_wanita_subur">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Wanita usia subur</button><br><br>
    </a></th>
          </th>
          <th><a href="<?php echo base_url();?>dashboard/data_akseptor_kb">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Akseptor KB</button><br><br>
    </a></th>
          </tr>
         
        </thead>
      </table>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Ibu Hamil</h3>


      </div>
      <section class="content-header">
          <small><?php
          echo $this->session->flashdata('msg');
          ?></small>
      </section>

<div class="box-header">
	<?php
    // Cek apakah terdapat session nama message
    if($this->session->flashdata('message')){ // Jika ada
      echo $this->session->flashdata('message'); // Tampilkan pesannya
    }
    ?>

  <?php
    // Cek apakah terdapat session nama message
    if($this->session->flashdata('error')){ // Jika ada
      echo $this->session->flashdata('error'); // Tampilkan pesannya
    }
    ?>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="kegiatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tgl</th>
            <th>Kategori</th>
            <th>NIK</th>
<th>Usia</th>
<th>Nama Suami</th>
<th>Hamil Ke</th>

<th>Lingkar Lila</th>
<th>Usia kehamilan saat ini</th>
 
            <th>TTL</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($kirimlaporan->result() as $row) {
            $tgl = tgl_indo($row->created_at); 
           ?>
          <tr>
            <td><?php echo $no; ?></td>

            <td><?php echo $tgl; ?></td>
            <td><?php echo $row->kategori_bumil; ?></td>
            <td><?php echo $row->nik; ?></td>
           <td><?php echo $row->usia; ?></td>
           <td><?php echo $row->nama_suami; ?></td>

           <td><?php echo $row->hamil_ke; ?></td>
            <td><?php echo $row->lingkar_lila; ?></td>
           <td><?php echo $row->uksi; ?></td>
           
           </td>
            <td><?php echo $row->ttl; ?></td>


         
            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-edit<?=$row->id_berita;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>

 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_berita;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Tampil Data">Tampil</a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
       
       <div class="box-header">
        <h3 class="box-title">Data Bayi</h3>


      </div>

        <table id="kegiatanbayi" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tgl</th>
            <th>Kategori</th>
            <th>NIK</th>
<th>Nama Desa</th>
<th>Nama Ibu</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($laporan_bayi->result() as $row) {
            $tgl = tgl_indo($row->created_at); 
           ?>
          <tr>
            <td><?php echo $no; ?></td>

            <td><?php echo $tgl; ?></td>
            <td><?php echo $row->kategori; ?></td>
            <td><?php echo $row->no_induk; ?></td>
           <td><?php echo $row->nm_desa; ?></td>
           <td><?php echo $row->nama_ibu; ?></td>

            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-editbayi<?=$row->id_bayi;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>

 <a data-toggle="modal" data-target="#modal-tampilbayi<?=$row->id_bayi;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Tampil Data">Tampil</a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
         

       <div class="box-header">
        <h3 class="box-title">Data Wanita Subur</h3>


      </div>

           <table id="kegiatanws" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tgl</th>
            <th>Kategori</th>
            <th>NIK</th>
<th>Nama Desa</th>
<th>Nama Ibu</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($laporan_wanita_subur as $row) {
            $tgl = tgl_indo($row->date_input_at); 
           ?>
          <tr>
            <td><?php echo $no; ?></td>

            <td><?php echo $tgl; ?></td>
            <td><?php echo $row->kategori; ?></td>
            <td><?php echo $row->nik; ?></td>
           <td><?php echo $row->desa; ?></td>
           <td><?php echo $row->nama; ?></td>

            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-editws<?=$row->id_wanita;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>

 <a data-toggle="modal" data-target="#modal-hapusws<?=$row->id_wanita;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Tampil Data">Tampil</a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
         

       <div class="box-header">
        <h3 class="box-title">Data Akseptor KB</h3>


      </div>

           <table id="akseptorkb" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>
            <th>Tgl</th>
            <th>Kategori</th>
            <th>NIK</th>
<th>Nama Desa</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($laporan_akseptor_kb as $row) {
            $tgl = tgl_indo($row->created_at); 
           ?>
          <tr>
            <td><?php echo $no; ?></td>

            <td><?php echo $tgl; ?></td>
            <td><?php echo $row->kategori; ?></td>
            <td><?php echo $row->nik; ?></td>
           <td><?php echo $row->nama_desa; ?></td>

            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-editakb<?=$row->id_akseptor;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>

 <a data-toggle="modal" data-target="#modal-hapusakb<?=$row->id_akseptor;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Tampil Data">Tampil</a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
         
 <!-- Modal hapus -->
<?php 

          foreach ($laporan_bayi->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-tampilbayi<?=$row->id_bayi;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_berita/<?php echo $row->id_bayi; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tampil Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_bayi;?>" name="id_berita" class="form-control" >
 <div class="form-group">
            <label>Tanggal</label>
            <br>
            <label>"<?=tgl_indo($row->created_at);?>"</label>
          </div>
 <div class="form-group">
            <label>Kategori</label>
            <br>
            <label>"<?=$row->kategori;?>"</label>
          </div>
           <div class="form-group">
            <label>NIK</label>
            <br>
            <label>"<?=$row->no_induk;?>"</label>
          </div>
          <div class="form-group">
            <label>Nama Desa</label>
            <br>
            <label>"<?=$row->nm_desa;?>"</label>
          </div>
           
           <div class="form-group">
            <label>Hamil Ke</label>
            <br>
            <label>"<?=$row->hml_ke;?>"</label>
          </div>
        <div class="form-group">
            <label>Lingkar Lila</label>
            <br>
            <label>"<?=$row->lila;?>"</label>
          </div>
          <div class="form-group">
            <label>Diagnosa</label>
            <br>
            <label>"<?=$row->diagnosa;?>"</label>
          </div>
         <div class="form-group">
            <label>Masalah</label>
            <br>
            <label>"<?=$row->masalah;?>"</label>
          </div>
          <div class="form-group">
            <label>Nama Ibu</label>
            <br>
            <label>"<?=$row->nama_ibu;?>"</label>
          </div>
         
        </div>
     
        </form>

     </div>
  </div>
</div>
        <?php } ?>

  <!-- Modal hapus -->
      <!-- Modal hapus -->
<?php 

          foreach ($kirimlaporan->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_berita/<?php echo $row->id_berita; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tampil Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_berita;?>" name="id_berita" class="form-control" >
 <div class="form-group">
            <label>Tanggal</label>
            <br>
            <label>"<?=tgl_indo($row->created_at);?>"</label>
          </div>
 <div class="form-group">
            <label>Kategori</label>
            <br>
            <label>"<?=$row->kategori_bumil;?>"</label>
          </div>
           <div class="form-group">
            <label>NIK</label>
            <br>
            <label>"<?=$row->nik;?>"</label>
          </div>
          <div class="form-group">
            <label>Usia</label>
            <br>
            <label>"<?=$row->usia;?>"</label>
          </div>
<div class="form-group">
            <label>Nama Suami</label>
            <br>
            <label>"<?=$row->nama_suami;?>"</label>
          </div>
           
           <div class="form-group">
            <label>Hamil Ke</label>
            <br>
            <label>"<?=$row->hamil_ke;?>"</label>
          </div>
        <div class="form-group">
            <label>Lingkar Lila</label>
            <br>
            <label>"<?=$row->lingkar_lila;?>"</label>
          </div>
          <div class="form-group">
            <label>Usia Kehamilan Saat Ini</label>
            <br>
            <label>"<?=$row->uksi;?>"</label>
          </div>
         <div class="form-group">
            <label>TTL</label>
            <br>
            <label>"<?=$row->ttl;?>"</label>
          </div>
          <div class="form-group">
            <label>Nama Ibu</label>
            <br>
            <label>"<?=$row->nama_ibu;?>"</label>
          </div>
         
        </div>
     
        </form>

     </div>
  </div>
</div>
        <?php } ?>

  <!-- Modal hapus -->
<?php 

          foreach ($laporan_wanita_subur as $row) {
           ?>

  <div class="row">
  <div id="modal-hapusws<?=$row->id_wanita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_berita/<?php echo $row->id_wanita; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tampil Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_wanita;?>" name="id_berita" class="form-control" >
 
 <div class="form-group">
            <label>Kategori</label>
            <br>
            <label>"<?=$row->kategori;?>"</label>
          </div>
<div class="form-group">
            <label>Nama Desa</label>
            <br>
            <label>"<?=$row->desa;?>"</label>
          </div>
         
            <div class="form-group">
            <label>NIK</label>
            <br>
            <label>"<?=$row->nik;?>"</label>
          </div>
        
       
          <div class="form-group">
            <label>Nama Ibu</label>
            <br>
            <label>"<?=$row->nama;?>"</label>
          </div>
         
        </div>
     
        </form>

     </div>
  </div>
</div>
        <?php } ?>




      <!-- Modal Ubah -->
<?php 
          foreach ($laporan_bayi->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-editbayi<?=$row->id_bayi;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/edit_laporanbayi')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Bayi</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" name="id_bayi" value="<?=$row->id_bayi;?>" class="form-control" >
 
       

         <div class="form-group">
            <label>Jadwal Kegiatan</label>
            <input type="date" name="created_at" class="form-control" value="<?=$row->created_at;?>">

          </div>
            <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?=$row->kategori;?>" placeholder="isi nama desa dengan benar">
          </div>
            <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" name="nm_desa" class="form-control" value="<?=$row->nm_desa;?>" placeholder="isi nama desa dengan benar">
          </div>

           <div class="form-group">
            <label>NIK</label>
            <input type="number" name="no_induk" class="form-control" value="<?=$row->no_induk;?>" placeholder="isi nik dengan benar">

          </div>
 <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="<?=$row->nama_ibu;?>" placeholder="isi nik dengan benar">

          </div>

          <div class="form-group">
            <label>Hamil Ke</label>
            <input type="number" name="hml_ke" class="form-control" value="<?=$row->hml_ke;?>">

          </div>


        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>


<!-- END Modal Ubah -->

      <!-- Modal Ubah -->
<?php 
          foreach ($kirimlaporan->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_laporanku')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" name="id_berita" value="<?=$row->id_berita;?>" class="form-control" >
 
       

         <div class="form-group">
            <label>Jadwal Kegiatan</label>
            <input type="date" name="created_at" class="form-control" value="<?=$row->created_at;?>">

          </div>
            <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" name="nama_desa" class="form-control" value="<?=$row->nama_desa;?>" placeholder="isi nama desa dengan benar">
          </div>
 <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="<?=$row->nama_ibu;?>" placeholder="isi nik dengan benar">

          </div>

          <div class="form-group">
            <label>NIK</label>
            <input type="number" name="nik" class="form-control" value="<?=$row->nik;?>" placeholder="isi nik dengan benar">

          </div>

         
            <div class="form-group">
            <label>Usia</label>
            <input type="number" name="usia" class="form-control" value="<?=$row->usia;?>" required="">

          </div>
          <div class="form-group">
            <label>Nama Suami</label>
            <input type="text" name="nama_suami" class="form-control" value="<?=$row->nama_suami;?>" required="">

          </div>
           
      <div class="form-group">
            <label>Hamil Ke</label>
            <input type="text" name="hamil_ke" class="form-control" value="<?=$row->hamil_ke;?>" required="">

          </div>
        
      <div class="form-group">
            <label>Lingkar Lila</label>
            <input type="text" name="lingkar_lila" class="form-control" value="<?=$row->lingkar_lila;?>" required="">

          </div>


      <div class="form-group">
            <label>Usia Kehamilan Saat ini</label>
            <input type="text" name="uksi" class="form-control" value="<?=$row->uksi;?>" required="">

          </div>
        
 <div class="form-group">
            <label>Tempat dan Tanggal Lahir</label>
            <input type="text" name="ttl" class="form-control" value="<?=$row->ttl;?>" required="">

          </div>

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>


<!-- END Modal Ubah -->

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
      $('#kegiatan').DataTable();
  } );
</script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#kegiatanbayi').DataTable();
  } );
</script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#kegiatanws').DataTable();
  } );
</script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#akseptorkb').DataTable();
  } );
</script>


<!-- ./wrapper -->

<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

</body>
</html>

<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/post_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Pengguna</h4>
        </div>
        <div class="modal-body">
 <div class="form-group">
            <label>Nama</label>
          <input type="text" name="nama" autocomplete="off" required="" placeholder="Masukkan Nama Lengkap" class="form-control" cols="30" rows="3">
          </div>

          <div class="form-group">
            <label>Username</label>
          <input type="text" name="username" autocomplete="off" required="" placeholder="Masukkan Username" class="form-control" cols="30" rows="3">
          </div>
          <input type="hidden" name="level" autocomplete="off" required="" value="User" class="form-control" cols="30" rows="3">
          

           

          <div class="form-group">
            <label>Password</label>
          <input type="password" name="password" autocomplete="off" required placeholder="Masukkan password" class="form-control" cols="30" rows="3">
          </div>

         <div class="form-group">
            <label>Nama Desa</label>
     
            <input type="text" name="kategori" autocomplete="off" required placeholder="contoh : Pasar Muara Tembesi" class="form-control" cols="30" rows="3">
          
          </div>
           
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Simpan</button>
          </div>
        </form>

     </div>
  </div>
</div>

<!--end modal tambah -->