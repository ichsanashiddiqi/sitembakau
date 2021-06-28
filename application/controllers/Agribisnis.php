<?php 	
	class agribisnis extends CI_Controller{

		function __construct() {
			parent::__construct();
            $this->CI = & get_instance();
            // $this->load->database();
            $this->load->library('pagination');
            $this->load->model('M_leaflet');
            $this->load->model('m_agribisnis');
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

		public function index() {
			$dataHeader['judul'] = "Agribisnis Tembakau";
			$data['agribisnis'] = $this->m_agribisnis->selectAgribisnis();
			$data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanAgribisnis', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

		public function jenis($jenis) {
			$dataHeader['judul'] = "Detail Agribisnis";
			$jenisAgribisnis = explode('%23keyword%3D', $jenis);
			$idTeknologi = $this->m_agribisnis->selectIdAgribisnisByJenis(urldecode($jenisAgribisnis[0]));
			
			if (count($jenisAgribisnis) == 1) {
				$data['keyword'] = "";
			} else {
				$data['keyword'] = urldecode($jenisAgribisnis[1]);
			}
			$data['agribisnis'] = $this->m_agribisnis->selectAgribisnisById($idTeknologi);
			$data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanDetailAgribisnis', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

	}
 ?>