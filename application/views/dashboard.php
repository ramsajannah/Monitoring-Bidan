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
<?php 
        if ($this->session->userdata('level') == 'ROOT') {

         ?>

    <a href="<?php echo base_url();?>index.php/dashboard/tambah_kegiatan">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Kegiatan</button><br><br>
    </a>

 
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Kegiatan</h3>


      </div>

<div class="box-header">
	<?php
          echo $this->session->flashdata('msg');
          ?>

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="berita" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>

            <th>Jenis Kegiatan</th>
            <th>Jadwal Kegiatan</th>

            <th>Surat Tugas</th>

            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          
          foreach ($sm_berita->result() as $row) {
            $tgl = tgl_indo($row->created_at); 
                
           ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->kategori; ?></td>

            <td><?php echo $tgl; ?></td>

            <td><?php echo $row->image; ?></td>

            <td><?php echo $row->keterangan; ?></td>
            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-edit<?=$row->id_berita;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>

 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_berita;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
         
      <!-- Modal hapus -->
<?php 

          foreach ($sm_berita->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="dashboard/proses_hapus_data/<?php echo $row->id_berita; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_berita;?>" name="id_berita" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Kategori...???</label>
            
            <label>"<?=$row->kategori;?>"</label>
          </div>
          
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Hapus</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>




      </div>

      <div class="box-header">
  <?php 
        if ($this->session->userdata('level') == 'User') {
         ?>

      <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
              </script>
              <?php
              redirect('index.php/dashboard/chart');
            }
        ?>
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

		
  </footer>
<?php }?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript">
  $(document).ready( function () {
      $('#berita').DataTable();
  } );
</script>


<!-- ./wrapper -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>
 
</body>


</html>

    <!-- Modal Ubah -->
<?php 
          foreach ($sm_berita->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_berita')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_berita;?>" name="id_berita" class="form-control" >
 
          <div class="form-group">
            <label>Kategori Kegiatan</label>
            <select name="kategori" class="form-control" required="">
              <?php 


          foreach ($dtbidang->result() as $r) {
           ?> 
              <option value="<?php echo $r->nama_lengkap; ?>"><?php echo $r->nama_lengkap; ?></option>


          <?php } ?>
            
            </select>
          </div>
         
         <div class="form-group">
            <label>Jadwal Kegiatan</label>
            <input type="date" name="created_at" class="form-control" value="<?=$row->created_at;?>">

          </div>

          <div class="form-group">
            <label>Capaian</label>
            <input type="text" name="capaian" class="form-control" value="<?=$row->capaian;?>">

          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?=$row->keterangan;?>">

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
