<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_berita extends CI_Model {
var $gallerypath;
var $gallery_path_url;

	public function __construct() {
 $this->load->database();
 $this->load->helper('tglindo_helper');

 $this->gallerypath = realpath(APPPATH . '../uploads/');
 $this->gallery_path_url = base_url().'uploads/';
 }

 public function get_data_by_pk($tbl, $where, $id)
	{
				$this->db->from($tbl);
				$this->db->where($where,$id);
				$query = $this->db->get();

				return $query;
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}

 
 public function hitungdata()
{   
    
    $query = $this->db->query('SELECT databidang.nama_lengkap, kategori_bumil, COUNT( * ) as total FROM databidang
                JOIN data_ibu_hamil ON databidang.nama_lengkap = data_ibu_hamil.kategori_bumil
                 GROUP BY kategori_bumil
                ');
 
    
            return $query->result();
}

	function kirimkomentar($data,$table){
		$this->db->insert($table,$data);
	}

	function post_berita($data,$table){
		$this->db->insert($table,$data);
	}

	function simpan_berita(){
	    $config = array('allowed_types' =>'png|jpg|pdf|doc|docx','encrypt_name' =>'TRUE','upload_path' => './uploads');

		$this->load->library('upload', $config);
		$this->upload->do_upload('image');
		$datafile = $this->upload->data();
		
		$config = array('source_image' => $datafile['full_path'],
	                         'new_image' => $this->gallerypath . '/uploads',
				             'maintain_ration' => false,
				             'width' => 130,
			                 'height' =>100);

	    $this->load->library('image_lib', $config);
	    $this->upload->initialize($config);
		$this->image_lib->resize();
		
		$create_by = $this->input->post('create_by');

		$username = $this->input->post('username');
		$kategori = $this->input->post('kategori');
		$capaian = $this->input->post('capaian');

		$keterangan = $this->input->post('keterangan');
		$tgl = date('Y-m-d');
		
		date_default_timezone_set('Asia/Jakarta');
		$create_by = $this->input->post('create_by');
		$image = $_FILES['image']['name'];
		
		$data = array('kategori' => $kategori,
					'capaian' => $capaian,
					'keterangan' => $keterangan,
	                  'created_at' => $tgl,
	                  'create_by' => $create_by,

	                  'username' => $username,
				      'image' => $image);
		$this->db->insert('kegiatan', $data);
	}


	function hapus_user($id_user){
	    $this->db->where('id_user', $id_user);
	    $this->db->delete('user');
	}

	function hapus_komentar($id_komentar){
	    $this->db->where('id_komentar', $id_komentar);
	    $this->db->delete('databidang');
	}

	function hapus_berita($id_berita){
	    $this->db->where('id_berita', $id_berita);
	    $this->db->delete('kegiatan');
	}

	function post_user($data,$table){
		$this->db->insert($table,$data);
	}


	function data($limit, $start){
		return $query = $this->db->get('berita', $limit, $start);
		return $query;		
	}

	public function all(){
 $query = $this->db->query("SELECT * FROM kegiatan ORDER BY id_berita DESC LIMIT 5 ");
		return $query;
	}

	public function internasional1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'internasional' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();
    
	}

public function teknologi1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'teknologi' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();
    
	}
	public function nasional1(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'nasional' ORDER BY id_berita DESC LIMIT 1 ");
 return $query->result();


    
	}

	public function beritaterbaruinter(){

 $query = $this->db->query("SELECT * FROM berita  ORDER BY id_berita DESC LIMIT 5 ");
 return $query->result();


    
	}



	public function semuaberinter(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'internasional'  ORDER BY id_berita DESC LIMIT 10 ");
 return $query->result();


    
	}

	public function allbernasional(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'nasional'  ORDER BY id_berita DESC LIMIT 10 ");
 return $query->result();


    
	}

public function allberteknologi(){
 $query = $this->db->get('berita');
 $query = $this->db->query("SELECT * FROM berita WHERE kategori = 'teknologi'  ORDER BY id_berita DESC LIMIT 10 ");
 return $query->result();


    
	}


public function smukes(){
 $query = $this->db->get('user');
 $query = $this->db->query("SELECT * FROM user ORDER BY kategori DESC");
 return $query->result();


    
	}	

public function admin_sm_berita(){
	if ($this->session->userdata('level') == 'Admin') {
	
   		return $query = $this->db->query("SELECT * FROM kegiatan");
	}else
	
    return $query = $this->db->query("SELECT * FROM kegiatan WHERE create_by='".$this->session->id_user."'");
    
	}


	function laporan(){

        $query=$this->db->query('SELECT * FROM data_ibu_hamil ORDER BY id_berita DESC');
  return $query->result();

    }


	function laporanbayi(){

        $query=$this->db->query('SELECT * FROM data_bayi ORDER BY id_bayi DESC');
  return $query->result();

    }

    function laporan_imun(){

        $query=$this->db->query('SELECT * FROM data_imunisasi JOIN data_ibu_hamil WHERE data_imunisasi.desa=data_ibu_hamil.nama_desa GROUP BY id_imunisasi DESC');
  return $query->result();

    }

    function laporan_wanita_subur(){

        $query=$this->db->query('SELECT * FROM data_wanita_subur JOIN data_ibu_hamil WHERE data_wanita_subur.nik=data_ibu_hamil.nik GROUP BY id_wanita DESC');
  return $query->result();

    }

    function laporan_akseptor_kb(){

        $query=$this->db->query('SELECT * FROM data_akseptor_kb ORDER BY id_akseptor DESC');
  return $query->result();

    }


    function laporan_ws(){

        $query=$this->db->query("SELECT * FROM data_wanita_subur WHERE create_by='".$this->session->id_user."' ORDER BY id_wanita DESC");
  return $query->result();

    }

    function laporan_akb(){

        $query=$this->db->query("SELECT * FROM data_akseptor_kb WHERE create_by='".$this->session->id_user."' ORDER BY id_akseptor DESC");
  return $query->result();

    }


    function cetak_data($id){
		$this->db->from('data_ibu_hamil');
		
		$this->db->where('id_berita',$id);
		
		return $this->db->get()->row();
	}

	function cetak_data_bayi($id){
		$this->db->select('*');
		$this->db->from('data_bayi');

		$this->db->join('data_ibu_hamil','data_bayi.no_induk=data_ibu_hamil.nik','data_bayi.hml_ke=data_ibu_hamil.hamil_ke');

		$this->db->where('id_bayi',$id);
		
		return $this->db->get()->row();
	}

	function cetak_data_akseptor($id){
		$this->db->select('*');
		$this->db->from('data_akseptor_kb');

		$this->db->join('data_ibu_hamil','data_akseptor_kb.nik=data_ibu_hamil.nik');
	
		$this->db->where('id_akseptor',$id);
		
		return $this->db->get()->row();
	}

	function cetak_data_wanita_subur($id){
		$this->db->select('*');
		$this->db->from('data_wanita_subur');

		$this->db->where('id_wanita',$id);
		
		return $this->db->get()->row();
	}

	function cetak_data_imun($id){
		$this->db->select('*');
		$this->db->from('data_imunisasi');

		$this->db->join('data_ibu_hamil','data_imunisasi.desa=data_ibu_hamil.nama_desa');

		$this->db->where('id_imunisasi',$id);
		
		return $this->db->get()->row();
	}

    public function get_product_keyword($keyword){
			
			$this->db->from('data_ibu_hamil');
		
			$this->db->like('nama_desa',$keyword);
			$this->db->or_like('created_at',$keyword);
			return $this->db->get()->result();
		}

public function admin_dtbidang(){
    return $query = $this->db->query("SELECT * FROM databidang");
    
	}

	public function admin_dtdesa(){
    $query = $this->db->query("SELECT * FROM user");
     return $query;
	}


public function admin_sm_user(){
    $query = $this->db->query("SELECT * FROM user WHERE level='User'");
    return $query;
	}



	
public function admin_sm_komentar(){
    return $query = $this->db->get('databidang');
		return $query;	
	}

public function laporan_sm_user(){
    $query = $this->db->query("SELECT * FROM user WHERE level='User'");
    return $query;
	}

public function laporan_user(){
    return $query = $this->db->query("SELECT * FROM kegiatan WHERE kategori='".$this->session->kategori."'");
    
	}
public function laporan_ku(){
    $query = $this->db->query("SELECT * FROM data_ibu_hamil WHERE create_by='".$this->session->id_user."' ORDER BY id_berita DESC");
     return $query;
	}

public function laporan_bayi(){
    $query = $this->db->query("SELECT * FROM data_bayi WHERE create_by='".$this->session->id_user."' ORDER BY id_bayi DESC");
     return $query;
	}

	function edit_berita($where,$table){		

	return $this->db->get_where($table,$where);
}
}