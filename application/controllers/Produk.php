<?php 
	class produk extends CI_Controller {
		
		function __construct() {
			parent::__construct();
         $this->CI = & get_instance();
         $this->load->database();
         $this->load->library('pagination');
			$this->load->model('m_produk');
			$this->load->model('M_leaflet');
			$this->load->model('m_varietas');
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

		public function benih(){
			$dataHeader['judul'] = "Produk";
			$data['kategori'] = "Stok Benih";
			$data['url'] = "benih";
         $data['dataBenih'] = $this->m_produk->selectStokBenih();
		   $data['dataDistribusiBenih'] = $this->m_produk->selectDistribusiBenih();
         $data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanProduk1', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

      public function filterStokBenih() {
         $tahun_bulan = $this->input->post('tahun_bulanBenih');
         $data['dataStokBenihFiltered'] = $this->m_produk->selectStokBenihFiltered(substr($tahun_bulan, 0, 4) , substr($tahun_bulan, 5, 2));
         $this->load->view('FilterTableStokBenih', $data);
      }

		public function filterDistribusi() {
			$tahun_bulan = $this->input->post('tahun_bulan');
         // echo $tahun_bulan;
			$data['dataDistribusiFiltered'] = $this->m_produk->selectDistribusiFiltered(substr($tahun_bulan, 0, 4) , substr($tahun_bulan, 5, 2));
			$this->load->view('FilterTable', $data);
		}

		public function alsin() {
			$dataHeader['judul'] = "Produk";
			$data['kategori'] = "Alat dan Mesin";
			$data['url'] = "alsin";

			$jumlah = $this->M_leaflet->getJumlahAlsin();

         $config['base_url'] = base_url()."index.php/produk/alsin/";
         $config['total_rows'] = $jumlah;

         $config['per_page'] = 12;

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
 
         $data['dataAlsin'] = $this->M_leaflet->selectAlsinPerPage($config['per_page'],$dari);
 
         $str_links = $this->pagination->create_links();
         $data['links'] = explode('&nbsp;',$str_links );

			$data['varietas'] = $this->m_varietas->selectVarietasTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanAlsin', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

		public function formula(){
			$dataHeader['judul'] = "Produk";
			$data['kategori'] = "Formula";
			$data['url'] = "formula";

			$data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

         $this->counterPengunjung(); 

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanProduk2', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}

		public function produkhilir() {
			$dataHeader['judul'] = "Produk";
			$data['kategori'] = "Produk Hilir";
			$data['url'] = "produkhilir";

			$data['subLeaflet'] = $this->M_leaflet->selectLeafletTerbaru();

			$this->load->view('header', $dataHeader);
			$this->load->view('HalamanProduk2', $data);
			$this->load->view('footer',$this->counterPengunjung());
		}
	}
 ?>
