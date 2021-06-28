<?php 
  	class Home extends CI_Controller {	
    		public function __construct() {
    		    parent::__construct();
            $this->CI = & get_instance();
            // $this->load->database();
            $this->load->library('pagination');
            $this->load->model('M_leaflet');
            $this->load->model('m_varietas');
            $this->load->model('m_teknologi');
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
    	      $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();
    		    $data['teknologi'] = $this->m_teknologi->selectTeknologi();
    		    $data['agribisnis'] = $this->m_agribisnis->selectAgribisnisTop3();

    		    $jumlah = $this->m_varietas->getJumlahVarietas();

            $config['base_url'] = base_url()."index.php/home/index/";
            $config['total_rows'] = $jumlah;
            $config['per_page'] = 9;
            $config['num_links'] = $jumlah;
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';
            $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

            $this->pagination->initialize($config);                     
            $dari = $this->uri->segment('3');
            $data['varietas'] = $this->m_varietas->selectVarietasPerPage($config['per_page'],$dari);
           
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );
                      
            $dataHeader['judul'] = "";
            $this->load->view('header', $dataHeader);
            $this->load->view('HalamanUtama', $data);
            $this->load->view('footer',$this->counterPengunjung());
    		}	
  	} 
?>
