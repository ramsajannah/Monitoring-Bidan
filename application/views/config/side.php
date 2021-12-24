<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu">
        <li class="header">Selamat Datang
<br>
          <?php echo $this->session->userdata('username'); ?></li>
        
      </ul>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="<?php echo base_url();?>dashboard/profile">
            <i class="fa fa-user"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>dashboard/chart">
            <i class="fa fa-user"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
         <?php 
        if ($this->session->userdata('level') == 'Admin') {

         ?>


          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url();?>dashboard/user"><i class="fa fa-inbox"></i>Data Pengguna</a></li>

          </ul>
        </li>
      <?php } ?>
      <?php 
        if ($this->session->userdata('level') == 'Admin') {
         ?>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Bidang Program</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url();?>index.php/dashboard/bidangprogram"><i class="fa fa-inbox"></i>Data Bidang Program</a></li>
          </ul>
        </li>-->
        <!--
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard">
            <i class="fa fa-files-o"></i> <span>Kegiatan</span>
          </a>
        </li>
      -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>dashboard/laporan"><i class="fa fa-inbox"></i>Data Laporan Ibu Hamil</a></li>
            <li><a href="<?php echo base_url();?>dashboard/laporanbayi"><i class="fa fa-inbox"></i>Data Laporan Bayi</a></li>
            <li><a href="<?php echo base_url();?>dashboard/laporan_imun"><i class="fa fa-inbox"></i>Data Laporan Imunisasi</a></li>
            <li><a href="<?php echo base_url();?>dashboard/laporan_wanita_subur"><i class="fa fa-inbox"></i>Laporan Wanita Usia Subur</a></li>
 <li><a href="<?php echo base_url();?>dashboard/laporan_akseptor_kb"><i class="fa fa-inbox"></i>Laporan Data Akseptor KB</a></li>


          </ul>
         <!-- <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/dashboard/laporan_pengguna"><i class="fa fa-inbox"></i>Laporan Data Pengguna </a></li>
          </ul>-->
        </li>
        
      <?php } ?>

       <?php 
        if ($this->session->userdata('level') == 'User') {
         ?>
         <!--<li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard/kegiatan_user">
            <i class="fa fa-files-o"></i> <span>Kegiatan</span>
          </a>
        </li>
      -->
         <li class="treeview">
          <a href="<?php echo base_url();?>dashboard/kirimlaporan">
            <i class="fa fa-files-o"></i> <span>Kirim Laporan Kegiatan</span>
          </a>
        </li>

           <?php } ?>
     
         
       
      <li class="treeview">
          <a href="<?php echo base_url();?>login/logout">
            <i class="fa fa-user"></i> <span>Logout</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
        </ul>

    
    </section>
    <!-- /.sidebar -->
  </aside>