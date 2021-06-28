<?php 	
	class teknologibudidaya extends CI_Controller{

		function __construct() {
			parent::__construct();
            $this->CI = & get_instance();
            $this->load->library('pagination');
            $this->load->model('M_leaflet');
            $this->load->model('m_teknologi');
		}

		public function counterPengunjung() {
            date_default_timezone_set('Asia/Jakarta');
            $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Y-m-d");
            $bulanIni = date("m");
            $waktu   = date('H:i');
            $this->load->model("m_tembakau");
                           
            if(empty($this->session->userdata('pengunjung'))){
               $this->m_tembakau->addUser($ip,$tanggal,$waktu);
               $this->session->set_userdata('pengunjung','aktif');                  
            }
            
            $counter['pengunjungTotal'] = $this->m_tembakau->getTotalVisitor();
            $counter['pengunjungHariIni'] = $this->m_tembakau->getTotalToday($tanggal); 
            $counter['pengunjungBulanIni'] = $this->m_tembakau->getTotalByMonth($bulanIni);
            return $counter;
        }

		public function index($jenis) {
			$dataHeader['judul'] = "Teknologi Budidaya Tembakau";
			$jenisTeknologi = explode('%23keyword%3D', $jenis);
			$idTeknologi = $this->m_teknologi->selectIdTeknologiByJenis(urldecode($jenisTeknologi[0]));
			
			if (count($jenisTeknologi) == 1) {
				$data['keyword'] = "";
			} else {
				$data['keyword'] = urldecode($jenisTeknologi[1]);
			}
			$data['teknologi'] = $this->m_teknologi->selectTeknologiById($idTeknologi);
			$data['listFileTeknologi'] = $this->m_teknologi->selectFileByIdTeknologi($idTeknologi);
			$data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanDetailTeknologi', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

	}
 ?>