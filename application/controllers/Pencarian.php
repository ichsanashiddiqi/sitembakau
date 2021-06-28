<?php 
	class pencarian extends CI_Controller{
		// $keyword;

		function __construct() {
			parent::__construct();
            $this->CI = & get_instance();
            $this->load->library('pagination');
            $this->load->model('m_varietas');
            $this->load->model('M_leaflet');
			$this->load->model("m_teknologi");
			$this->load->model("m_agribisnis");									
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

		public function index(){
			$cari = $this->input->get('keyword');
			$datapencarian['keyword'] = $cari;

			$datapencarian['pencarianVarietas'] = $this->m_varietas->pencarianVarietas($cari);
			$datapencarian['pencarianWaktuTanam'] = $this->m_varietas->pencarianWaktuTanam($cari);
			$datapencarian['pencarianLeaflet'] = $this->M_leaflet->pencarianLeaflet($cari);
			$datapencarian['pencarianTekno'] = $this->m_teknologi->pencarianTeknologi($cari);
			$datapencarian['pencarianAgribisnis'] = $this->m_agribisnis->pencarianAgribisnis($cari);
			
			$dataHeader['judul'] = "Pencarian";
			$this->load->view('header', $dataHeader);			
			$this->load->view('HalamanPencarian',$datapencarian);
			$this->load->view('footer',$this->counterPengunjung());
		}		

	}
 ?>