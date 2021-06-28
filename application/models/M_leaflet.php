<?php 
class M_leaflet extends CI_Model{
        function selectLeafletPerPage($sampai, $dari){
	        $query = $this->db->select('*');
            $query = $this->db->from('leaflet');
            $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
            $query = $this->db->limit($sampai, $dari);
	        $query = $this->db->get();
	        return $query->result();
        }

        function selectLeafletTerbaru() {
        	$query = $this->db->limit(8);
        	$query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
	        $query = $this->db->from('leaflet');
	        $query = $this->db->select('leaflet.nama_leaflet, gambar_leaflet.file');
	        $query = $this->db->get();
	        return $query->result();
        }

        public function getJumlahLeaflet() {
            $query = $this->db->select('*');
            $query = $this->db->from('leaflet');
            $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function selectLeafletById($id) {
            $query = $this->db->select('*');
            $query = $this->db->from('gambar_leaflet');
            $query = $this->db->where('id_leaflet', $id);
            $query = $this->db->get();
            return $query->result();
        }

        public function pencarianLeaflet($cari){
            if ($cari == "#leaflet") {
                $cari = "";
            }
            $query = $this->db->select('lfl.nama_leaflet, img.file');
            $query = $this->db->from('leaflet lfl');
            $query = $this->db->join('gambar_leaflet img', 'lfl.id_leaflet = img.id_leaflet');
            $query = $this->db->where('lfl.nama_leaflet like', "%$cari%");
            $query = $this->db->get();
            return $query->result();
        }

//-----------------------------------------------------QUERY UNTUK ALAT DAN MESIN TEMBAKAU--------------------------------------------------------

        function selectAlsinPerPage($sampai, $dari){
            $query = $this->db->select('*');
            $query = $this->db->from('leaflet');
            $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
            $query = $this->db->where('nama_leaflet like', '%Mesin%')->or_where('nama_leaflet like', '%Alat%');
            $query = $this->db->limit($sampai, $dari);
            $query = $this->db->get();
            return $query->result();
        }

        public function getJumlahAlsin() {
            $query = $this->db->select('*');
            $query = $this->db->from('leaflet');
            $query = $this->db->join('gambar_leaflet', 'leaflet.id_leaflet = gambar_leaflet.id_leaflet');
            $query = $this->db->where('nama_leaflet like', '%Mesin%')->or_where('nama_leaflet like', '%Alat%');
            $query = $this->db->get();
            return $query->num_rows();
        }       
    }
 ?>