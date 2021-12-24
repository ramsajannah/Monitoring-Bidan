<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('template_a');?>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'top-menu.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include 'side.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Control Panel</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-12">
 
    <div class="box">


      <div class="box-header">
        <h3 class="box-title">Data Laporan Ibu Hamil</h3>
        <div class="box-body">

          <div class="box-header">
  <?php
          echo $this->session->flashdata('msg');
          ?>

      </div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <?php echo form_open('dashboard/search') ?>
       
            <th><select name="kategori" class="form-control" required="">
              <?php 


          foreach ($data_desa as $row) 
          {
           ?> 
              <option value="<?php echo $row->kategori; ?>"><?php echo $row->kategori; ?></option>


          <?php } ?>
            
            </select>
          </th>
            <th><input type="date" class="form-control" name="tglmulai" placeholder="search" required="">

    
  </th>
            <th><input type="date" class="form-control" name="tglakhir" placeholder="search" required=""></th>
            <th>
    <input type="submit" name="search_submit" class="btn btn-primary btn-flat" value="Tampilkan"></th>
          <?php echo form_close() ?>
      
          </tr>
          </thead>
        </table>
</div>
       
    </div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#laporan').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print all',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            },
            {
                extend: 'print',
                text: 'Print selected'
            }
        ],
        select: true

    } );
} );

  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }

  $("#kategori").submit(function(e) {
    e.preventDefault();
    var id = $("#kategori").val();
    // console.log(id);
    var url = "<?= site_url('index.php/Dashboard/filter/') ?>" + id;
    $('#result').load(url);
   });

</script>
      <!-- /.box-header -->
      <div class="box-body">


        <table id="laporan" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Nama Desa </th>
            <th>Aksi</th>
          <th></th>
          </tr>
          </thead>
          <tbody id="isi">
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($sm_berita as $row) {
 
           ?>
          <tr>
            <td><?php echo $no; ?></td>
  <td><?php echo $row->username; ?></td>
            <td><?php echo tgl_indo($row->created_at); ?></td>


            <td><?php echo $row->kategori_bumil; ?></td>
            <td><?php echo $row->nama_desa; ?></td>

             <td><a href="<?php echo base_url();?>dashboard/cetak/<?php echo $row->id_berita;?>">View</a>
</td>

             <td><a href="<?php echo base_url(); ?>dashboard/proses_hapus_kgiatanuser/<?php echo $row->id_berita ; ?>">Delete</a></td>

             
           
          </tr>
          <?php $no++; } ?>

          </tbody>

        </table>

<script type="text/javascript">
  $(document).ready( function () {
      $('#laporan').DataTable();
  } );
</script>



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
<!-- ./wrapper -->


    <!-- Modal Ubah -->
<?php 
          foreach ($sm_berita as $row) {
           ?>

  <div class="row">
  <div id="modal-view<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="#" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Data</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_berita;?>" name="id_komentar" class="form-control" >
 
      

           <div class="form-group">
            <label>Username</label>
            <input type="text" value="<?=$row->username;?>" name="nama_lengkap" class="form-control" >
          </div>

          
            <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" value="<?=$row->nama_desa;?>" name="nama_lengkap" class="form-control" >
          </div>
 <div class="form-group">
            <label>Tanggal</label>
            <input type="text" value="<?=$row->created_at;?>" name="nama_lengkap" class="form-control" >
          </div>
 <div class="form-group">
            <label>Kategori</label>
            <input type="text" value="<?=$row->kategori;?>" name="nama_lengkap" class="form-control" >
          </div>

                 
                 
                 

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-warning" value="Print" onclick="window.print()" />
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>
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
          <h4 class="modal-title">Tambah Data Laporan Ibu Hamil</h4>
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
