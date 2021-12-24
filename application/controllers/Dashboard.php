<?php 

class Dashboard extends CI_Controller{


    var $gallerypath;

	function __construct(){
		parent::__construct();	

$this->load->helper('cleanurl_helper');
$this->load->model('m_login');
$this->load->model('model_berita');
$this->load->library('pagination');
$this->load->helper(array('url','html','file','form','download'));

 if( ! $this->session->userdata('id_user')) 
            redirect('login'); 

	}

public function index(){

$data['sm_berita'] = $this->model_berita->admin_sm_berita();

$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('dashboard', $data);
        }

public function chart(){

$data['total_data'] = $this->model_berita->hitungdata();

$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('diagrambatang', $data);
        }

public function kirimlaporan(){

$data['kirimlaporan'] = $this->model_berita->laporan_ku();
$data['laporan_bayi'] = $this->model_berita->laporan_bayi();
$data['laporan_wanita_subur'] = $this->model_berita->laporan_ws();

$data['laporan_akseptor_kb'] = $this->model_berita->laporan_akb();

$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('kirimlaporan', $data);
        }

public function kegiatan_user(){

$data['kirimlaporan'] = $this->model_berita->laporan_user();

$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('kegiatan_user', $data);
        }



public function bidangprogram(){

$this->load->database();
$data['sm_komentar'] = $this->model_berita->admin_sm_komentar();
$this->load->view('template_a');
$this->load->view('config/komentar', $data);
		}


public function profile(){
$data['nmdesa'] = $this->model_berita->admin_dtdesa();
$this->load->view('template_a');
$this->load->view('config/profil',$data);
    }

public function update_profil(){
$this->form_validation->set_rules('id_user', 'id_user', 'required');
$this->form_validation->set_rules('nama', 'nama', 'required');
$this->form_validation->set_rules('username', 'username', 'required');
$this->form_validation->set_rules('kategori', 'kategori', 'required');
    $this->form_validation->set_rules('password', 'password','required');

if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('msg',"Data Gagal Di Edit");
            redirect('index.php/dashboard/profile');
        }else{
$data = array(
       "nama"=>$_POST['nama'],
       "username"=>$_POST['username'],
       "kategori"=>$_POST['kategori'],
                "password"=>md5($_POST['password']),
    );
$this->db->where('id_user', $_POST['id_user']);
            $this->db->update('user',$data);
            $this->session->set_flashdata('msg', 'Profil Berhasil Di Edit');
    
            redirect('dashboard/profile');
    }
  }

public function laporan(){

$data['data_desa'] = $this->model_berita->smukes();
$this->load->model('model_berita');
$data['sm_berita'] = $this->model_berita->laporan();
$this->load->view('config/laporan', $data);
		}

public function laporanbayi(){

$data['data_desa'] = $this->model_berita->smukes();
$this->load->model('model_berita');
$data['dt_bayi'] = $this->model_berita->laporanbayi();
$this->load->view('config/laporanbayi', $data);
    }

    public function laporan_imun(){

$data['data_desa'] = $this->model_berita->smukes();
$this->load->model('model_berita');
$data['dt_imunisasi'] = $this->model_berita->laporan_imun();
$this->load->view('config/laporan_imun', $data);
    }

     public function laporan_wanita_subur(){

$data['data_desa'] = $this->model_berita->smukes();
$this->load->model('model_berita');
$data['data_akseptor'] = $this->model_berita->laporan_wanita_subur();
$this->load->view('config/laporan_wanita_subur', $data);
    }

    public function laporan_akseptor_kb(){

$data['data_desa'] = $this->model_berita->smukes();
$this->load->model('model_berita');
$data['data_akseptor'] = $this->model_berita->laporan_akseptor_kb();
$this->load->view('config/laporan_akseptor_kb', $data);
    }

public function search(){

            $keyword = $this->input->post('kategori','tglmulai','tglakhir');
    
$data['data_desa'] = $this->model_berita->smukes();
            $data['sm_berita']=$this->model_berita->get_product_keyword($keyword);

            $this->load->view('config/laporan',$data);
        }
public function cetak($id=null)
 {

 $data['cetak'] = $this->model_berita->cetak_data($id);
        
  $this->load->view('config/cetak',$data);
 }

 public function cetak_data_bayi($id=null)
 {

 $data['cetak'] = $this->model_berita->cetak_data_bayi($id);
 if($data <0)
 {
redirect('dashboard/laporanbayi');
 }
        
  $this->load->view('config/cetak_data_bayi',$data);
 }

 public function cetak_data_akseptor_kb($id=null)
 {

 $data['cetak'] = $this->model_berita->cetak_data_akseptor($id);
        
  $this->load->view('config/cetak_data_akseptor',$data);
 }

 public function cetak_data_wanita_subur($id=null)
 {

 $data['cetak'] = $this->model_berita->cetak_data_wanita_subur($id);
        
  $this->load->view('config/cetak_data_wanita_subur',$data);
 }

 

  public function cetak_data_imun($id=null)
 {
 $data['cetak'] = $this->model_berita->cetak_data_imun($id);
    
  $this->load->view('config/cetak_data_imun',$data);
 }

public function laporan_pengguna(){



$data['sm_user'] = $this->model_berita->laporan_sm_user();

$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('config/laporanpengguna', $data);
    }

public function filter($id)
 {
  if ($id == 0) {
   $data = $this->db->get('kegiatan')->result();
  }
  else
  {
   $data = $this->db->get_where('kegiatan', ['id_berita'=>$id])->result();
  }
  $dt['kegiatan'] = $data;
  $dt['id_berita'] = $id;
  $this->load->view('laporan/result', $dt);
 }

 



public function user(){


$data['sm_user'] = $this->model_berita->admin_sm_user();
$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$this->load->view('config/user', $data);

		}

function proses_hapus_user($id_user=null){

if( ! $this->session->userdata('id_user')){ 
            redirect('login'); 

  }

$this->model_berita->hapus_user($id_user);
$data['sm_user'] = $this->model_berita->admin_sm_user();
$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> User berhasil Di Hapus.
             </div>'
           );
  redirect('index.php/dashboard/user');
        }

function proses_hapus_komentar($id_komentar=null){

$this->model_berita->hapus_komentar($id_komentar);
$data['sm_komentar'] = $this->model_berita->admin_sm_komentar();

          $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kategori berhasil dihapus.
             </div>'
           );
  redirect('index.php/dashboard/bidangprogram');
        }

function proses_hapus_data($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_ibu_hamil', 'id_berita', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_ibu_hamil', 'id_berita', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kegiatan berhasil dihapus.
             </div>'
           );
  redirect('dashboard');
        }
      }

function proses_hapus_kgiatanuser($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_ibu_hamil', 'id_berita', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_ibu_hamil', 'id_berita', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Laporan berhasil dihapus.
             </div>'
           );
  redirect('dashboard/laporan');
        }
      }

function hapus_bayi($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_bayi', 'id_bayi', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_bayi', 'id_bayi', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Laporan berhasil dihapus.
             </div>'
           );
  redirect('dashboard/laporanbayi');
        }
      }


function hapus_akseptor_kb($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_akseptor_kb', 'id_akseptor', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_akseptor_kb', 'id_akseptor', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Laporan berhasil dihapus.
             </div>'
           );
  redirect('dashboard/laporan');
        }
      }

      function hapus_data_imun($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_imunisasi', 'id_imunisasi', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_imunisasi', 'id_imunisasi', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Laporan berhasil dihapus.
             </div>'
           );
  redirect('dashboard/laporan_imun');
        }
      }


      function hapus_wanita_subur($id=''){


if($this->session->userdata('level') == 'User'){ 
            redirect('login'); 

  }else{

$cek_data = $this->model_berita->get_data_by_pk('data_wanita_subur', 'id_wanita', $id)->row();

$this->load->helper('file');
delete_files($cek_data);
          unlink("./uploads/$cek_data->image");
                
$this->model_berita->delete_data_by_pk('data_wanita_subur', 'id_wanita', $id);

$this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Laporan berhasil dihapus.
             </div>'
           );
  redirect('dashboard/laporanbayi');
        }
      }

function data_akseptor_kb(){
       $data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('akseptor_kb', $data);

if (isset($_POST['btnsimpan'])) {

  $kategori          = htmlentities(strip_tags($_POST['kategori']));
              $create_by          = htmlentities(strip_tags($_POST['create_by']));
              $nama_desa          = htmlentities(strip_tags($_POST['nama_desa']));
              $nik          = htmlentities(strip_tags($_POST['nik']));
              $bb_tb          = htmlentities(strip_tags($_POST['bb_tb']));
              $tekanan_darah          = htmlentities(strip_tags($_POST['tekanan_darah']));
$pernafasan          = htmlentities(strip_tags($_POST['pernafasan']));
$nadi          = htmlentities(strip_tags($_POST['nadi']));
$suhu          = htmlentities(strip_tags($_POST['suhu']));
$kesadaran          = htmlentities(strip_tags($_POST['kesadaran']));
$muka          = htmlentities(strip_tags($_POST['muka']));
$mata          = htmlentities(strip_tags($_POST['mata']));
$telinga          = htmlentities(strip_tags($_POST['telinga']));
$hidung          = htmlentities(strip_tags($_POST['hidung']));
$gigi_mulut          = htmlentities(strip_tags($_POST['gigi_mulut']));
$kelenjar_gondok          = htmlentities(strip_tags($_POST['kelenjar_gondok']));
$pmb_klj_limfa          = htmlentities(strip_tags($_POST['pmb_klj_limfa']));
$pvj          = htmlentities(strip_tags($_POST['pvj']));
$simetris          = htmlentities(strip_tags($_POST['simetris']));
$pembesaran          = htmlentities(strip_tags($_POST['pembesaran']));
$tumor          = htmlentities(strip_tags($_POST['tumor']));
$pengeluaran          = htmlentities(strip_tags($_POST['pengeluaran']));
$kebutuhan          = htmlentities(strip_tags($_POST['kebutuhan']));
$ronchi          = htmlentities(strip_tags($_POST['ronchi']));
$mur_mur          = htmlentities(strip_tags($_POST['mur_mur']));
$username          = htmlentities(strip_tags($_POST['username']));

                  date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');
  $data = array('kategori' => $kategori,
          'nama_desa' => $nama_desa,
          'nik' => $nik,
          'pernafasan' => $pernafasan,
          'nadi' => $nadi,
          'suhu' => $suhu,
          'kesadaran' => $kesadaran,
          'muka' => $muka,
          'mata' => $mata,
          'telinga' => $telinga,
          'hidung' => $hidung,
          'gigi_mulut' => $gigi_mulut,
          'kelenjar_gondok' => $kelenjar_gondok,
          'pmb_klj_limfa' => $pmb_klj_limfa,
          'pvj' => $pvj,
          'simetris' => $simetris,
          'pembesaran' => $pembesaran,
          'tumor' => $tumor,
          'pengeluaran' => $pengeluaran,
          'kebutuhan' => $kebutuhan,
          'ronchi' => $ronchi,
          'mur_mur' => $mur_mur,
          'bb_tb' => $bb_tb,
          'tekanan_darah' => $tekanan_darah,
          'create_by' => $create_by,
          'username' => $username,
          'created_at' => $tgl);       
$this->db->insert('data_akseptor_kb', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Data Berhasil di Tambah.
                       </div>'
                     );
              
 redirect('dashboard/data_akseptor_kb');
}
}
function data_wanita_subur(){
       $data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('data_wanita_subur', $data);


if (isset($_POST['btnsimpan'])) {

  $kategori          = htmlentities(strip_tags($_POST['kategori']));
              $create_by          = htmlentities(strip_tags($_POST['create_by']));
              $desa          = htmlentities(strip_tags($_POST['desa']));
              $nik          = htmlentities(strip_tags($_POST['nik']));
$nama          = htmlentities(strip_tags($_POST['nama']));

$keterangan          = htmlentities(strip_tags($_POST['keterangan']));

                  date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');
$data = array('kategori' => $kategori,
          'desa' => $desa,
          'nik' => $nik,
          'nama' => $nama,
          'keterangan' => $keterangan,
          'create_by' => $create_by,
          'date_input_at' => $tgl);
$this->db->insert('data_wanita_subur', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Data Berhasil di Tambah.
                       </div>'
                     );
              
 redirect('dashboard/data_wanita_subur');

}

    }
				

public function tambah_kegiatan(){


$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('tambah_kegiatan', $data);


if (isset($_POST['btnsimpan'])) {
              $capaian          = htmlentities(strip_tags($_POST['capaian']));
              $keterangan          = htmlentities(strip_tags($_POST['keterangan']));
              $username            = htmlentities(strip_tags($_POST['username']));
              $create_by            = htmlentities(strip_tags($_POST['create_by']));
             $kategori            = htmlentities(strip_tags($_POST['kategori']));
             

              $file_size = 5500; //5 MB
              $this->upload->initialize(array(
                "upload_path" => "./uploads/",
                "allowed_types" => "pdf|jpg|jpeg|zip|png|gif",
                "max_size" => "$file_size"
              ));

              if ( ! $this->upload->do_upload('image'))
              {
                  $error = $this->upload->display_errors('<p>', '</p>');
                  $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times; &nbsp;</span>
                        </button>
                        <strong>Gagal!</strong> '.$error.'.
                     </div>'
                   );
              }
               else
              {

                    $gbr = $this->upload->data();

                    $filename = $gbr['file_name'];
                    $image     = preg_replace('/ /', '_', $filename);

                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');

                    $data = array('kategori' => $kategori,
          'capaian' => $capaian,
          'keterangan' => $keterangan,
                    'created_at' => $tgl,
                    'create_by' => $create_by,
                    'image' => $image,
                    'username' => $username);
                    $this->db->insert('kegiatan', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong> Kegiatan berhasil ditambahkan.
                       </div>'
                     );
              }
redirect('index.php/dashboard/tambah_kegiatan');
          }
		}


public function data_imunisasi(){


$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('data_imun', $data);

if (isset($_POST['btnsimpan'])) {
              $kategori          = htmlentities(strip_tags($_POST['kategori']));
              $create_by          = htmlentities(strip_tags($_POST['create_by']));
              $desa          = htmlentities(strip_tags($_POST['desa']));
              $laki_laki          = htmlentities(strip_tags($_POST['laki_laki']));
              $perempuan          = htmlentities(strip_tags($_POST['perempuan']));
              
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');
$data = array('kategori' => $kategori,
          'desa' => $desa,
          'laki_laki' => $laki_laki,
          'perempuan' => $perempuan,
          'create_by' => $create_by,
          'created_at' => $tgl);
$this->db->insert('data_imunisasi', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Data Berhasil di Tambah.
                       </div>'
                     );
              
 redirect('dashboard/data_imunisasi');
}
}
public function tmbhkirimlaporan(){


$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('inputkirimlaporan', $data);


if (isset($_POST['btnsimpan'])) {
              $ttl          = htmlentities(strip_tags($_POST['ttl']));
              $nama_desa          = htmlentities(strip_tags($_POST['nama_desa']));
              $nama_ibu          = htmlentities(strip_tags($_POST['nama_ibu']));
              $nik          = htmlentities(strip_tags($_POST['nik']));
              $usia          = htmlentities(strip_tags($_POST['usia']));
              $nama_suami          = htmlentities(strip_tags($_POST['nama_suami']));
              $hamil_ke          = htmlentities(strip_tags($_POST['hamil_ke']));
              $lingkar_lila          = htmlentities(strip_tags($_POST['lingkar_lila']));
              $uksi          = htmlentities(strip_tags($_POST['uksi']));
              

              $username            = htmlentities(strip_tags($_POST['username']));
              $create_by            = htmlentities(strip_tags($_POST['create_by']));
              $kategori_bumil            = htmlentities(strip_tags($_POST['kategori_bumil']));
             

            
                   
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');

                    $data = array('kategori_bumil' => $kategori_bumil,
          'ttl' => $ttl,
          'nama_desa' => $nama_desa,
          'nama_ibu' => $nama_ibu,
          'nik' => $nik,
          'usia' => $usia,
          'nama_suami' => $nama_suami,
          'hamil_ke' => $hamil_ke,
          'lingkar_lila' => $lingkar_lila,
          'uksi' => $uksi,
                  'created_at' => $tgl,
                    'create_by' => $create_by,
                    'username' => $username);


          $cek = $this->db->query("SELECT * FROM data_ibu_hamil WHERE nik='$nik'")->num_rows();
    if($cek > 0){
      $this->session->set_flashdata('msg',
                     '
                     <div class="alert alert-success alert-dismissible" role="alert">
                      
                        <strong>NIK yang anda masukan sudah ada.Koreksi Lagi NIK yang di input!</strong> '.$error.'.
                     </div>'
                   );

    redirect('dashboard/tmbhkirimlaporan');

    }else{
                    $this->db->insert('data_ibu_hamil', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Laporan berhasil dikirim.
                       </div>'
                     );
              
 redirect('index.php/dashboard/tmbhkirimlaporan');
          }
        }
        }

public function data_bayi_baru_lahir(){


$data['dtbidang'] = $this->model_berita->admin_dtbidang();
$data['berita'] = $this->model_berita->all();
$this->load->view('input_data_bayi', $data);


if (isset($_POST['btnsimpan'])) {
               $nm_desa          = htmlentities(strip_tags($_POST['nm_desa']));
               $jari_tangan          = htmlentities(strip_tags($_POST['jari_tangan']));
              $nama_ibu          = htmlentities(strip_tags($_POST['nama_ibu']));
              $no_induk          = htmlentities(strip_tags($_POST['no_induk']));
                            $hml_ke          = htmlentities(strip_tags($_POST['hml_ke']));
              $jari_kaki          = htmlentities(strip_tags($_POST['jari_kaki']));
              $posisi_dan_bentuk          = htmlentities(strip_tags($_POST['posisi_dan_bentuk']));
              $jenis_kelamin          = htmlentities(strip_tags($_POST['jenis_kelamin']));
              $pergerakan          = htmlentities(strip_tags($_POST['pergerakan']));
              $jenis_kelamin          = htmlentities(strip_tags($_POST['jenis_kelamin']));
              $bak_pertama          = htmlentities(strip_tags($_POST['bak_pertama']));
               $bab_pertama          = htmlentities(strip_tags($_POST['bab_pertama']));
              
              $menghisap          = htmlentities(strip_tags($_POST['menghisap']));
              $menggengam          = htmlentities(strip_tags($_POST['menggengam']));
            $reflek_kaki          = htmlentities(strip_tags($_POST['reflek_kaki']));
            
$reflek_moro          = htmlentities(strip_tags($_POST['reflek_moro']));
         $berat_badan          = htmlentities(strip_tags($_POST['berat_badan']));
            
            $tinggi_badan          = htmlentities(strip_tags($_POST['tinggi_badan']));
            $lingkar_kepala          = htmlentities(strip_tags($_POST['lingkar_kepala']));
            $lingkar_dada          = htmlentities(strip_tags($_POST['lingkar_dada']));
            $lila          = htmlentities(strip_tags($_POST['lila']));
             $diagnosa          = htmlentities(strip_tags($_POST['diagnosa']));
             $masalah          = htmlentities(strip_tags($_POST['masalah']));
            $kebutuhan          = htmlentities(strip_tags($_POST['kebutuhan']));
            
              $username            = htmlentities(strip_tags($_POST['username']));
              $create_by            = htmlentities(strip_tags($_POST['create_by']));
              $kategori            = htmlentities(strip_tags($_POST['kategori']));
             

            
                   
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');

                    $data = array(
                      'nm_desa' => $nm_desa,
                      'kategori' => $kategori,
          'jari_tangan' => $jari_tangan,
          'nama_ibu' => $nama_ibu,
          'hml_ke' => $hml_ke,
          'no_induk' => $no_induk,
          'jari_kaki' => $jari_kaki,
          'posisi_dan_bentuk' => $posisi_dan_bentuk,
          'jenis_kelamin' => $jenis_kelamin,
          'bak_pertama' => $bak_pertama,
          'bab_pertama' => $bab_pertama,
          'pergerakan' => $pergerakan,
          
          'menghisap' => $menghisap,
          'menggengam' => $menggengam,
          'reflek_kaki' => $reflek_kaki,
          'reflek_moro' => $reflek_moro,
          'berat_badan' => $berat_badan,
          'tinggi_badan' => $tinggi_badan,
          'lingkar_kepala' => $lingkar_kepala,
          'lingkar_dada' => $lingkar_dada,
          'lila' => $lila,
          'diagnosa' => $diagnosa,
          'masalah' => $masalah,
          'kebutuhan' => $kebutuhan,
          
               'created_at' => $tgl,
                    'create_by' => $create_by,
                    'username' => $username);
                    $this->db->insert('data_bayi', $data);
                    $this->session->set_flashdata('msg',
                       '
                       <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times; &nbsp;</span>
                          </button>
                          <strong>Sukses!</strong>Laporan berhasil dikirim.
                       </div>'
                     );
              
 redirect('dashboard/data_bayi_baru_lahir');
          }
        }

public function edit_berita()
    {
        $this->form_validation->set_rules('id_berita', 'id_berita', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
         $this->form_validation->set_rules('created_at', 'created_at', 'required');
       
        $this->form_validation->set_rules('capaian', 'capaian', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');


        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Edit");
            redirect('index.php/dashboard');
        }else{
            $data=array(
                "kategori"=>$_POST['kategori'],
                "created_at"=>$_POST['created_at'],
                "capaian"=>$_POST['capaian'],
                "keterangan"=>$_POST['keterangan'],
            );
            $this->db->where('id_berita', $_POST['id_berita']);
            $this->db->update('kegiatan',$data);
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
		
            redirect('index.php/dashboard');
        }
    }

public function edit_laporanbayi()
    {
         $this->form_validation->set_rules('id_bayi', 'id_bayi', 'required');
        $this->form_validation->set_rules('nm_desa', 'nm_desa', 'required');
        $this->form_validation->set_rules('no_induk', 'no_induk', 'required');
        $this->form_validation->set_rules('hml_ke', 'hml_ke', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
      $this->form_validation->set_rules('created_at', 'created_at', 'required');
      if($this->form_validation->run()==FALSE){
            
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Gagal diedit.
             </div>'
           );

redirect('index.php/dashboard/kirimlaporan');
}else{

            $data=array(
              "nama_ibu"=>$_POST['nama_ibu'],
              "nm_desa"=>$_POST['nm_desa'],
              "hml_ke"=>$_POST['hml_ke'],
              "kategori"=>$_POST['kategori'],
                "created_at"=>$_POST['created_at'],
                "no_induk"=>$_POST['no_induk'],
                
            );


    
            $this->db->where('id_bayi', $_POST['id_bayi']);
            $this->db->update('data_bayi',$data);
            
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Berhasil diedit.
             </div>'
           );

            redirect('dashboard/kirimlaporan');

}  
    }
public function edit_laporanku()
    {
        $this->form_validation->set_rules('id_berita', 'id_berita', 'required');
        $this->form_validation->set_rules('nama_desa', 'nama_desa', 'required');
        $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required');
       $this->form_validation->set_rules('created_at', 'created_at', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('ttl', 'ttl', 'required');
         $this->form_validation->set_rules('usia', 'usia', 'required');

 $this->form_validation->set_rules('nama_suami', 'nama_suami', 'required');

 $this->form_validation->set_rules('lingkar_lila', 'lingkar_lila', 'required');
$this->form_validation->set_rules('uksi', 'uksi', 'required');

 $cek = $this->db->query("SELECT * FROM data_ibu_hamil WHERE nik='$nik'")->num_rows();

    
        if($this->form_validation->run()==FALSE){
            
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Gagal diedit.
             </div>'
           );

redirect('index.php/dashboard/kirimlaporan');

 if ($cek>0) {
         
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Sydah diedit.
             </div>'
           );
redirect('index.php/dashboard/kirimlaporan');
    
        }
        }
       
       else{

            $data=array(
              "nama_ibu"=>$_POST['nama_ibu'],
              "nama_desa"=>$_POST['nama_desa'],
                "created_at"=>$_POST['created_at'],
                "nik"=>$_POST['nik'],
                "ttl"=>$_POST['ttl'],
                "usia"=>$_POST['usia'],
                "nama_suami"=>$_POST['nama_suami'],
                "lingkar_lila"=>$_POST['lingkar_lila'],
                "uksi"=>$_POST['uksi'],
            );


    
            $this->db->where('id_berita', $_POST['id_berita']);
            $this->db->update('data_ibu_hamil',$data);
            
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Berhasil diedit.
             </div>'
           );

            redirect('index.php/dashboard/kirimlaporan');
        }
    }

public function edit_komentar()
    {
        $this->form_validation->set_rules('id_komentar', 'id_komentar', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
        
     
        if($this->form_validation->run()==FALSE){
             $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data Gagal diedit.
             </div>'
           );
            redirect('index.php/dashboard/komentar');
        }else{
            $data=array(
                "id_komentar"=>$_POST['id_komentar'],
                "nama_lengkap"=>$_POST['nama_lengkap'],
            
            );
            $this->db->where('id_komentar', $_POST['id_komentar']);
            $this->db->update('databidang',$data);
             $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kategori berhasil diedit.
             </div>'
           );
            redirect('index.php/dashboard/bidangprogram');
        }
    }



public function edit_user()
    {
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
         $this->form_validation->set_rules('nama', 'nama', 'required');

 $this->form_validation->set_rules('username', 'username', 'required');

         $this->form_validation->set_rules('kategori', 'kategori', 'required');
      
     
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Edit");
            redirect('index.php/dashboard');
        }else{
            $data=array(

                "nama"=>$_POST['nama'],
                "username"=>$_POST['username'],
                "kategori"=>$_POST['kategori'],
            );
            $this->db->where('id_user', $_POST['id_user']);
            $this->db->update('user',$data);
            $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Data berhasil Di Edit.
             </div>'
           );
            redirect('index.php/dashboard/user');
        }
    }







function post_user(){

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $level = $this->input->post('level');
        $password = md5($this->input->post('password'));
        $kategori = $this->input->post('kategori');
        
        
        $data = array(

            'nama' => $nama,
            'level' => $level,
            'username' => $username,
            'password' => $password,
            'kategori' => $kategori,
        
            );
        $this->session->set_flashdata('message', 'Berhasil Di Tambah');
        $this->model_berita->post_user($data,'user');
        $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> User berhasil Di Tambah.
             </div>'
           );
        redirect('index.php/dashboard/user');
    }

function post_bidang(){

        $nama_lengkap = $this->input->post('nama_lengkap');
        
        
        $data = array(
            'nama_lengkap' => $nama_lengkap,
        
            );
        $this->session->set_flashdata('msg',
             '
             <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times; &nbsp;</span>
                </button>
                <strong>Sukses!</strong> Kategori berhasil Di Tambah.
             </div>'
           );
        $this->model_berita->post_user($data,'databidang');
        redirect('index.php/dashboard/bidangprogram');
    }


    }

