<?php 
if(!defined('BASEPATH'))
  exit('No direct script access allowed');

class M_user extends CI_Model {
   function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->helper(array('url','form'));
   }

   function clear_cache() {
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');
   }
//UBAH DATA USER START======================================================>>
   function simpan_update_data_user($nama_depan, $nama_belakang, $email, $telepon, $alamat, $kelurahan, $kecamatan, $kota, $provinsi, $pos)
   {
      $data = array(
         'nama_depan' => $nama_depan,
         'nama_belakang' => $nama_belakang,
         'email' => $email,
         'telepon' => $telepon,
         'alamat' => $alamat,
         'kelurahan' => $kelurahan,
         'kecamatan' => $kecamatan,
         'kota' => $kota,
         'provinsi' => $provinsi,
         'pos' => $pos
      );
      $this->db->where('id_user' , $this->session->userdata('id_user'));
      $this->db->update('user' , $data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_update_password_user($password)
   {
      $data = array(
         'password' => sha1($password)
      );
      $this->db->where('id_user' , $this->session->userdata('id_user'));
      $this->db->update('user' , $data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }
//UBAH DATA USER END--======================================================>>
//BUAT PERUSAHAAN START=====================================================>> 
   function simpan_perusahaan($namaPerusahaan, $taglinePerusahaan, $alamatPerusahaan, $kelurahanPerusahaan, $kecamatanPerusahaan, $kabupatenPerusahaan, $provinsiPerusahaan, $posPerusahaan, $latitudePerusahaan, $longitudePerusahaan, $deskripsiPerusahaan, $jenisPerusahaan, $nama_bank, $pemilik_rekening, $no_rekening)
   {
      if ($jenisPerusahaan=='individu') {
         $statusEPC='aktiv';
      }else if ($jenisPerusahaan=='komersial') {
         $statusEPC='menunggu_verifikasi';
      }

      $data = array(
         'id_user' => $this->session->userdata('id_user'),
         'nama_perusahaan' => $namaPerusahaan,
         'tagline' => $taglinePerusahaan,
         'alamat_perusahaan' => $alamatPerusahaan,
         'kelurahan_perusahaan' => $kelurahanPerusahaan,
         'kecamatan_perusahaan' => $kecamatanPerusahaan,
         'kabupaten_perusahaan' => $kabupatenPerusahaan,
         'provinsi_perusahaan' => $provinsiPerusahaan,
         'pos_perusahaan' => $posPerusahaan,
         'latitude' => $latitudePerusahaan,
         'longitude' => $longitudePerusahaan,
         'deskripsi' => $deskripsiPerusahaan,
         'jenis_perusahaan' => $jenisPerusahaan,
         'nama_bank'=> $nama_bank,
         'pemilik_rekening'=> $pemilik_rekening,
         'no_rekening'=> $no_rekening,
         'status_perusahaan' => 'menunggu_verifikasi',
         'input_perusahaan' => date('Y-m-d')
      );
      $this->db->insert('perusahaan',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function tampil_area_operasi_perusahaan($id_perusahaan)
   {
      $this->db->select("*");
      $this->db->where('id_perusahaan' , $id_perusahaan);
      $result = $this->db->get('perusahaan_area_operasi')->result(); 

      return $result; 
   }

   function simpan_kontakEmail($emailPerusahaan)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $data = array(
         'id_perusahaan' => $value_get_id->id_perusahaan,
         'jenis' => 'email',
         'link' => $emailPerusahaan,
         'input_medsos' => date('Y-m-d')
      );

      $this->db->insert('perusahaan_medsos',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_kontakTelepon($teleponPerusahaan)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $data = array(
         'id_perusahaan' => $value_get_id->id_perusahaan,
         'jenis' => 'telepon',
         'link' => $teleponPerusahaan,
         'input_medsos' => date('Y-m-d')
      );

      $this->db->insert('perusahaan_medsos',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_kontakWhatsapp($whatsappPerusahaan)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $data = array(
         'id_perusahaan' => $value_get_id->id_perusahaan,
         'jenis' => 'whatsapp',
         'link' => $whatsappPerusahaan,
         'input_medsos' => date('Y-m-d')
      );

      $this->db->insert('perusahaan_medsos',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_kontakWebsite($websitePerusahaan)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $data = array(
         'id_perusahaan' => $value_get_id->id_perusahaan,
         'jenis' => 'website',
         'link' => $websitePerusahaan,
         'input_medsos' => date('Y-m-d')
      );

      $this->db->insert('perusahaan_medsos',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_kontakVideo($linkvideoPerusahaan)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $data = array(
         'id_perusahaan' => $value_get_id->id_perusahaan,
         'jenis' => 'video',
         'link' => $linkvideoPerusahaan,
         'input_medsos' => date('Y-m-d')
      );
      $this->db->insert('perusahaan_medsos',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function simpan_jadwal($hari, $kondisi, $jam_buka, $jam_tutup)
   {
      $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
      $value_get_id = $get_id_perusahaan->row();// memanggil id perusahaan untuk di inputkan

      $result = array();
         foreach ($hari as $key => $val) {
            $result[] = array(      
              'id_perusahaan' => $value_get_id->id_perusahaan,        
              'hari' => $_POST['hari'][$key],
              'kondisi' => $_POST['kondisi'][$key],
              'jam_buka' => $_POST['jam_buka'][$key],
              'jam_tutup' => $_POST['jam_tutup'][$key],
              'input_jadwal' => date('Y-m-d')

            );  

         }       
      $this->db->insert_batch('perusahaan_jadwal',$result); 
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function update_status_pembayaran($id_perusahaan, $status_cash, $status_kredit)
   {
      $data = array(
         'pembayaran_cash' => $status_cash,
         'pembayaran_kredit' => $status_kredit,
      );
      $this->db->where('id_perusahaan' , $id_perusahaan);
      $this->db->update('perusahaan' , $data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function input_skema_pembiayaan($id_perusahaan,$bank)
   {
      $result = array();
       foreach ($bank as $key => $val) {
         $result[] = array(      
           'id_perusahaan' => $id_perusahaan,        
           'bank' => $_POST['bank'][$key],
           'input_skema' => date('Y-m-d')
        );  
      }       
      $this->db->insert_batch('perusahaan_skema_pembiayaan',$result); 
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }
//BUAT PERUSAHAAN END=======================================================>>
//MENAMPILKAN WILAYAH STRAT=================================================>>    
   function tampil_kota()
   {
      $this->db->order_by('kabupaten', 'ASC');
      return $this->db->get('wilayah_kab')->result_array();
   }

   function tampil_provinsi()
   {
      $this->db->order_by('provinsi', 'ASC');
      return $this->db->get('wilayah_prov')->result_array();
   }

   function tampil_cari_kota($provinsi)
   {

      $this->db->like('provinsi', $provinsi);
      $queryProv = $this->db->get('wilayah_prov')->row();

      $this->db->order_by('kabupaten', 'ASC');
      $query = $this->db->get_where('wilayah_kab', array('id_provinsi' => $queryProv->id));
      return $query;
   }

   function tampil_cari_kecamatan($kabupaten)
   {
      $this->db->like('kabupaten', $kabupaten);
      $queryKab = $this->db->get('wilayah_kab')->row();

      $this->db->order_by('kecamatan', 'ASC');
      $query = $this->db->get_where('wilayah_kec', array('id_kabupaten' => $queryKab->id));
      return $query;
   }

   function tampil_cari_kelurahan($kecamatan)
   {

      $this->db->like('kecamatan', $kecamatan);
      $queryKec = $this->db->get('wilayah_kec')->row();

      $this->db->order_by('kelurahan', 'ASC');
      $query = $this->db->get_where('wilayah_kel', array('id_kecamatan' => $queryKec->id));
      return $query;
   }

   function tampil_cari_kodepos($kelurahan, $kecamatan, $kabupaten, $provinsi)
   {
      $this->db->like('kelurahan', $kelurahan);
      $this->db->like('kecamatan', $kecamatan);
      $hilangkan_kab= str_replace("KAB ", "", $kabupaten);
      $kab= str_replace("KOTA ", "", $hilangkan_kab);
      $this->db->like('kabupaten', $kab);
      $this->db->like('provinsi', $provinsi);
      $query = $this->db->get_where('wilayah_pos');
      return $query;
   }
//MENAMPILKAN WILAYAH END===================================================>> 
//PRODUK START==============================================================>>   
   function tampil_produk()
   {
      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');
      $this->db->order_by('id_produk', 'DESC');
      return $this->db->get('produk_view')->result_array();
   }

   function search_produk($nama_produk, $kategori, $lokasi_kota,/* $lokasi_provinsi,*/$harga_minimal, $harga_maximal, $pembayaran_cash, $pembayaran_kredit, $garansi, $ukuran_sistem, $rating, $sortir)
   {

      $this->db->select("*");
      //=========================================Nama Produk
      if(!empty($nama_produk)) {//[OK]
         $this->db->like('nama_produk', $nama_produk, 'both');
      }
      //=========================================Kota/Kabupaten
      if(!empty($lokasi_kota)) {
         $this->db->where_in('id_perusahaan_view', $lokasi_kota);
      }
      /*if($lokasi_kota !='x' && !empty($lokasi_provinsi)) {
         $this->db->where_in('id_perusahaan_view', $lokasi_kota);
         $this->db->where_in('provinsi_perusahaan', $lokasi_provinsi);
      }
      if($lokasi_kota !='x' && empty($lokasi_provinsi)) {
         $this->db->where_in('id_perusahaan_view', $lokasi_kota);
      }
      if($lokasi_kota =='x' && !empty($lokasi_provinsi)) {
         $this->db->where_in('provinsi_perusahaan', $lokasi_provinsi);
      }*/
      //=========================================Kategori
      if(!empty($kategori)) {
         $this->db->where_in('kategori', $kategori);
      }
      //=========================================Harga
      if(!empty($harga_minimal)) {//[OK]l
         $this->db->where('harga >=', intval($harga_minimal));        
      }
        if(!empty($harga_maximal)) {//[OK]
         $this->db->where('harga <=', intval($harga_maximal));
      }
        //=========================================Ukuran Sistem
      if(!empty($ukuran_sistem)) {//[OK]
         $this->db->where('ukuran_sistem', str_replace(",",".",$ukuran_sistem)); 
      }
        //=========================================Garansi[ok]
      if(!empty($garansi)) {
         $this->db->where('garansi', intval($garansi)); 
      }
           //=========================================Garansi[ok]
      if(!empty($pembayaran_cash) && !empty($pembayaran_kredit)) {
         $this->db->where('pembayaran_cash', $pembayaran_cash);
         $this->db->or_where('pembayaran_kredit', $pembayaran_kredit);
      }
      if(!empty($pembayaran_cash) && empty($pembayaran_kredit)) {
         $this->db->where('pembayaran_cash', $pembayaran_cash);
      }
      if(empty($pembayaran_cash) && !empty($pembayaran_kredit)) {
         $this->db->where('pembayaran_kredit', $pembayaran_kredit);
      }

      /*if(!empty($garansi) && $garansi == '5') {
         $this->db->where('garansi <', 5); 
      }
      if(!empty($garansi) && $garansi == '5-10') {
         $this->db->where('garansi >=', 5); 
         $this->db->where('garansi <=', 10); 
      }
      if(!empty($garansi) && $garansi == '10-15') {
         $this->db->where('garansi >=', 10); 
         $this->db->where('garansi <=', 15); 
      }
      if(!empty($garansi) && $garansi == '10') {
         $this->db->where('garansi >=', 10); 
      }*/
      //=========================================Rating
      if(!empty($rating)) {
         $this->db->where('rating_produk >=', '4');
      }
      //=========================================Sortir
      if($sortir == 'terbaru') {
         $this->db->order_by('id_produk', 'DESC');
      }
      if($sortir == 'termurah') {
         $this->db->order_by('harga', 'ASC');
      }
      if($sortir == 'termahal') {
         $this->db->order_by('harga', 'DESC');
      }
      if($sortir == 'terlaris') {
         $this->db->order_by('terjual', 'DESC');
      }
      /*if($sortir == 'terdekat') {
         $this->db->where('kabupaten_perusahaan', $this->session->userdata('kota'));
      }*/

      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');

      $result = $this->db->get('produk_view')->result(); // Tampilkan data siswa berdasarkan keyword
        
      return $result; 
   }

   function search_reset_produk($nama_produk, $sortir)
   {
      $this->db->select("*");
      //=========================================Nama Produk
      if(!empty($nama_produk)) {//[OK]
         $this->db->like('nama_produk', $nama_produk, 'both');
      }

      if($sortir == 'terbaru') {
         $this->db->order_by('id_produk', 'DESC');
      }
      if($sortir == 'termurah') {
         $this->db->order_by('harga', 'ASC');
      }
      if($sortir == 'termahal') {
        $this->db->order_by('harga', 'DESC');
      }
      if($sortir == 'terlaris') {
         $this->db->order_by('terjual', 'DESC');
      }
      if($sortir == 'terdekat') {
         $this->db->where('kabupaten_perusahaan', $this->session->userdata('kota'));
      }

      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');

      $result = $this->db->get('produk_view')->result(); // Tampilkan data siswa berdasarkan keyword
        
      return $result; 
   }

   function ulasan_produk($id_produk)
   {
      $this->db->select('*');
      $this->db->from('rating');
      $this->db->join('user','rating.id_user = user.id_user'); 
      $this->db->where('id_etalase', $id_produk);
      $this->db->where('jenis_etalase', 'produk');
      $this->db->order_by('id_order', 'DESC');
     // $this->db->limit(30);
      return $this->db->get()->result_array();
   }

   function by_rekom($rekom, $jenis_rekom)
   {
      /*
      $this->db->select('*');
      $this->db->from('perusahaan_produk');
      $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');

      if ($rekom=='1') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
      }elseif ($rekom=='2') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('terjual >', '0');
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='3') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('terjual >', '0');
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='4') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='5') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='6') {
         $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='7') {
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='8') {
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='9') {
         $this->db->where('terjual >', '0');
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='10') {
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }

      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');
      $this->db->where('perusahaan_produk.id_perusahaan', $get_produk->id_perusahaan);
      $this->db->where_not_in('id_produk', array('id_produk'=>$id_produk));
      if ($jenis_rekom=='cek_rekom') {
         $result_by_rekom=$this->db->get()->result_array();
         return count($result_by_rekom);
      }elseif ($jenis_rekom=='get_rekom') {
         $this->db->order_by('terjual', 'DESC');
         $this->db->limit(5);
         return $this->db->get()->result_array();
      }

         $byRekom1 = by_rekom('1','cek_rekom');
         $byRekom2 = by_rekom('2','cek_rekom');
         $byRekom3 = by_rekom('3','cek_rekom');
         $byRekom4 = by_rekom('4','cek_rekom');
         $byRekom5 = by_rekom('5','cek_rekom');
         $byRekom6 = by_rekom('6','cek_rekom');
         $byRekom7 = by_rekom('7','cek_rekom');
         $byRekom8 = by_rekom('8','cek_rekom');
         $byRekom9 = by_rekom('9','cek_rekom');
         $byRekom10 = by_rekom('10','cek_rekom');

         $cariRekom = array($byRekom1, $byRekom2, $byRekom3, $byRekom4, $byRekom5, $byRekom6, $byRekom7, $byRekom8, $byRekom9, $byRekom10);

         if (max($cariRekom)==$byRekom1) {
            return by_rekom('1','get_rekom');
         }elseif (max($cariRekom)==$byRekom2) {
            return by_rekom('2','get_rekom');
         }elseif (max($cariRekom)==$byRekom3) {
            return by_rekom('3','get_rekom');
         }elseif (max($cariRekom)==$byRekom4) {
            return by_rekom('4','get_rekom');
         }elseif (max($cariRekom)==$byRekom5) {
            return by_rekom('5','get_rekom');
         }elseif (max($cariRekom)==$byRekom6) {
            return by_rekom('6','get_rekom');
         }elseif (max($cariRekom)==$byRekom7) {
            return by_rekom('7','get_rekom');
         }elseif (max($cariRekom)==$byRekom8) {
            return by_rekom('8','get_rekom');
         }elseif (max($cariRekom)==$byRekom9) {
            return by_rekom('9','get_rekom');
         }elseif (max($cariRekom)==$byRekom10) {
            return by_rekom('10','get_rekom');
         }
         */
      }

   function rekomendasi_produk_perusahaan($id_produk, $rekom, $jenis_rekom, $id_perusahaan)
   {
      $get_produk=$this->db->get_where('perusahaan_produk', array('id_produk'=>$id_produk))->row();

      $this->db->select('*');
      $this->db->from('perusahaan_produk');
      $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');

      if ($rekom=='1') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
      }elseif ($rekom=='2') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('terjual >', '0');
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='3') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('terjual >', '0');
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='4') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='5') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='6') {
         $this->db->where('provinsi_perusahaan', $get_produk->id_perusahaan);
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='7') {
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
      }elseif ($rekom=='8') {
         $this->db->where('terjual >', '0');
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='9') {
         $this->db->where('terjual >', '0');
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }elseif ($rekom=='10') {
         $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
         $this->db->where('harga >=', $get_produk->harga);
         $this->db->where('kategori', $get_produk->kategori);
      }

      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');
      if ($id_perusahaan == 'true') {
         $this->db->where('perusahaan_produk.id_perusahaan', $get_produk->id_perusahaan);
      }

      $this->db->where_not_in('id_produk', array('id_produk'=>$id_produk));

      if ($jenis_rekom=='cek_rekom') {
         $result_by_rekom=$this->db->get()->result_array();
         return count($result_by_rekom);
      }elseif ($jenis_rekom=='get_rekom') {
         $this->db->order_by('terjual', 'DESC');
         $this->db->limit(5);
         return $this->db->get()->result_array();
      }
         

      /*
        $this->db->select('*');
        $this->db->from('perusahaan_produk');
        $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');

        $this->db->where('provinsi_perusahaan', $this->session->userdata('provinsi'));
        $this->db->where('terjual >', '0');
        $this->db->where('ukuran_sistem >=', $get_produk->ukuran_sistem);
        $this->db->where('harga >=', $get_produk->harga);
        $this->db->where('kategori', $get_produk->kategori);

        $this->db->where('status_hapus' , 'false');
        //$this->db->where('status_publis' , 'true');
        $this->db->where('status_perusahaan' , 'aktiv');
        $this->db->where('perusahaan_produk.id_perusahaan', $get_produk->id_perusahaan);
        $this->db->where_not_in('id_produk', array('id_produk'=>$id_produk));
        $this->db->order_by('terjual', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result_array();
      */
   }

   function rekomendasi_produk($id_produk)
   {
      $get_produk=$this->db->get_where('perusahaan_produk', array('id_produk'=>$id_produk))->row();

      $this->db->select('*');
      $this->db->from('perusahaan_produk');
      $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan'); 
      $this->db->where('status_hapus' , 'false');
      $this->db->where('status_publis' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');
      $this->db->where('kategori', $get_produk->kategori);
      $this->db->where('terjual >', '0');
      $this->db->where_not_in('id_produk', array('id_produk'=>$id_produk));
      $this->db->order_by('terjual', 'DESC');
      $this->db->limit(5);
      return $this->db->get()->result_array();
   }

//PRODUK END================================================================>> 
//PEMASANG STRAT============================================================>> 
   function tampil_pemasang()
   {
      $this->db->where('status_hapus_pemasang' , 'false');
      $this->db->where('status_publis_pemasang' , 'true');//true
      $this->db->where('status_perusahaan' , 'aktiv');
      $this->db->order_by('id_pemasang', 'DESC');
      return $this->db->get('pemasang_view')->result_array();
   }

   function search_pemasang($nama_teknisi, $lokasi_kota,/* $lokasi_provinsi,*/$keahlian_array, $harga_minimal, $harga_maximal, $rating, $sortir)
   {
      $this->db->select("*");
      //=========================================Nama Produk
      if(!empty($nama_teknisi)) {//[OK]
         $this->db->like('nama_pemasang', $nama_teknisi, 'both');
      }
      //=========================================Kota/Kabupaten
      /*
      if(!empty($lokasi_kota)) {
         $this->db->where_in('id_perusahaan_view', $lokasi_kota);
      }
      */
      if(!empty($lokasi_kota)) {
         $this->db->where_in('id_pemasang', $lokasi_kota);
      }
      /*if(!empty($lokasi_kota) && !empty($lokasi_provinsi)) {
         $this->db->where_in('kabupaten_perusahaan', $lokasi_kota);
         $this->db->or_where_in('provinsi_perusahaan', $lokasi_provinsi);
      }
      if(!empty($lokasi_kota) && empty($lokasi_provinsi)) {
         $this->db->where_in('kabupaten_perusahaan', $lokasi_kota);
      }
      if(empty($lokasi_kota) && !empty($lokasi_provinsi)) {
         $this->db->where_in('provinsi_perusahaan', $lokasi_provinsi);
      }*/
      //=========================================keahlian
      if(!empty($keahlian_array)) {
         $this->db->where_in('id_pemasang', $keahlian_array);
      }
      //=========================================Harga
      if(!empty($harga_minimal)) {//[OK]
         $this->db->where('harga_pemasang >=', intval($harga_minimal));        
      }
        if(!empty($harga_maximal)) {//[OK]
         $this->db->where('harga_pemasang <=', intval($harga_maximal));
      }
      //=========================================Rating
      if(!empty($rating)) {
         $this->db->where('rating_pemasang >=', '4');
      }
      //=========================================Sortir
      if($sortir == 'terbaru') {
         $this->db->order_by('id_pemasang', 'DESC');
      }
      if($sortir == 'termurah') {
         $this->db->order_by('harga_pemasang', 'ASC');
      }
      if($sortir == 'termahal') {
        $this->db->order_by('harga_pemasang', 'DESC');
      }
      if($sortir == 'terpopuler') {
         $this->db->order_by('terpopuler', 'DESC');
      }
      if($sortir == 'terfavorit') {
         $this->db->order_by('terfavorit', 'DESC');
      }
      $this->db->where('status_hapus_pemasang' , 'false');
      $this->db->where('status_publis_pemasang' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');
      // $this->db->or_where('jenis_perusahaan' , 'individu');

      $result = $this->db->get('pemasang_view')->result(); // Tampilkan data siswa berdasarkan keyword
        
      return $result; 
   }

     function search_reset_pemasang($nama_teknis, $sortir)
     {

       $this->db->select("*");
        //=========================================Nama Produk
        if(!empty($nama_teknisi)) {//[OK]
         $this->db->like('nama_pemasang', $nama_teknisi, 'both');
      }

      $this->db->order_by('id_pemasang', 'DESC');

      $this->db->where('status_hapus_pemasang' , 'false');
      $this->db->where('status_publis_pemasang' , 'true');
      $this->db->where('status_perusahaan' , 'aktiv');

        $result = $this->db->get('pemasang_view')->result(); // Tampilkan data siswa berdasarkan keyword
        
        return $result; 
     }
     function tampil_detail_pemasang($id_pemasang)
     {
       $this->db->where('id_pemasang' , $id_pemasang);
       return $this->db->get('perusahaan_pemasang')->row();
    }
    function ulasan_teknisi($id_teknisi)
    {

       $this->db->select('*');
       $this->db->from('rating');
       $this->db->join('user','rating.id_user = user.id_user'); 
       $this->db->where('id_etalase', $id_teknisi);
       $this->db->where('jenis_etalase', 'teknisi');
       $this->db->order_by('id_order', 'DESC');
       $this->db->limit(30);
       return $this->db->get()->result_array();
    }
    function tampil_keahlian_pemasang($id_pemasang)
    {
       $this->db->where('id_pemasang' , $id_pemasang);
       $this->db->order_by('id_keahlian', 'DESC');
       return $this->db->get('pemasang_keahlian')->result_array();
    }
    function tampil_portofolio_pemasang($id_pemasang)
    {
       $this->db->where('id_pemasang' , $id_pemasang);
       $this->db->order_by('id_portofolio', 'DESC');
       return $this->db->get('pemasang_portofolio')->result_array();
    }
    function tampil_sertifikat_pemasang($id_pemasang)
    {
       $this->db->where('id_pemasang' , $id_pemasang);
       $this->db->order_by('id_sertifikat', 'DESC');
       return $this->db->get('pemasang_sertifikat')->result_array();
    }
    function tampil_dataPerusahaan_pemasang($id_pemasang)
    {
       $this->db->where('id_pemasang' , $id_pemasang);
       return $this->db->get('pemasang_view')->row();
    }
    function tampil_dataUser_pemasang($id_user)
    {
       $this->db->where('id_user' , $id_user);
       return $this->db->get('user')->row();
    }
    function simpan_penawaran($nama_proyek, $keahlian, $keterangan, $harga, $area, $new_name, $id_user, $id_pemasang, $bank, $nama_rekening, $no_rekening, $tgl_pengerjaan)
    {
       $data = array(
         'id_pemasang'=>$id_pemasang,
         'id_user' => $id_user,
         'no_invoice' => 'INV/U'.$this->session->userdata('id_user').'/PT'.$id_pemasang.'/'.date("Ymd/His"),
         'nama_proyek' => $nama_proyek,
         'pekerjaan' => $keahlian,
         'keterangan' => $keterangan,
         'harga_penawaran' => $harga,
         'link_dokumen' => 'upload_file/'.$this->session->userdata('folder').'/penawaran',
         'dokumen'=>$new_name,
         'area'=>implode(', ', $area),
         'bank'=>$bank,
         'nama_rek'=>$nama_rekening,
         'no_rek'=>$no_rekening,
         'tanggal_pengerjaan'=> $tgl_pengerjaan,
         'status_penawaran'=>'menunggu_pembayaran',
         'input_penawaran' => date('Y-m-d')
      );
       $this->db->insert('pemasang_penawaran',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function daftar_penawaran()
    {

       $this->db->select('*');
       $this->db->from('pemasang_penawaran');
       $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
       $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
       $this->db->where('pemasang_penawaran.id_user' , $this->session->userdata('id_user'));
       $this->db->where_not_in('status_penawaran', array('menunggu_pembayaran'));
       $this->db->order_by('id_penawaran', 'DESC');
       $query = $this->db->get()->result_array();
       return $query;
    }
    function daftar_pembayaran_penawaran()
    {

       $this->db->select('*');
       $this->db->from('pemasang_penawaran');
       $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
       $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
       $this->db->where('pemasang_penawaran.id_user' , $this->session->userdata('id_user'));
       $this->db->where('status_penawaran' , 'menunggu_pembayaran');
       $this->db->order_by('id_penawaran', 'DESC');
       $query = $this->db->get()->result_array();
       return $query;
    }
    function detail_penawaran($id_penawaran)
    {
       $this->db->select('*');
       $this->db->from('pemasang_penawaran');
       $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
       $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
       $this->db->where('pemasang_penawaran.id_user' , $this->session->userdata('id_user'));
       $this->db->where('id_penawaran' , $id_penawaran);
       return $this->db->get()->row();
    }
    function pembayaran_penawaran($id_penawaran)
    {
       $get_id=$this->db->get_where('pemasang_penawaran', array('id_penawaran'=>$id_penawaran))->row();
       $this->db->where('no_invoice' , $get_id->no_invoice);
       $this->db->order_by('id_penawaran_pembayaran', 'DESC');
       return $this->db->get('penawaran_pembayaran')->result_array();
    }
    function simpan_pembayaran_penawaran($no_invoice, $nominal, $bukti_pembayaran)
    {

       $data = array(
         'no_invoice' => $no_invoice,
         'nominal' => $nominal,
         'bukti' => $bukti_pembayaran,
         'input_penawaran_pembayaran' => date('Y-m-d')
      );
       $this->db->insert('penawaran_pembayaran',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function simpan_ulasan_penawaran($rating, $ulasan, $id_user, $id_penawaran, $id_perusahaan, $id_teknisi, $etalase)
    {
     $data = array(
      'id_user' => $id_user,
      'id_order' => $id_penawaran,
      'id_perusahaan' => $id_perusahaan,
      'id_etalase' => $id_teknisi,
      'jenis_etalase' => $etalase,
      'angka' => $rating,
      'ulasan' => $ulasan,
      'input_rating' => date('Y-m-d')
   );
     $this->db->insert('rating',$data);
     return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }


  function simpan_rating_pemasang($id_teknisi, $etalase)
  {

    $this->db->select_avg('angka');
    $this->db->where('id_etalase' , $id_teknisi);
    $this->db->where('jenis_etalase' , $etalase);
    $rating = $this->db->get('rating')->row();

    $this->db->where('id_pemasang' , $id_teknisi);
    $this->db->update('perusahaan_pemasang' , array('rating_pemasang'=>round($rating->angka, 1)));

 }

    //===================================================MENAMPILKAN PERUSAHAAN
 function tampil_perusahaan()
 {
    $this->db->where('status_perusahaan' , 'aktiv');
    $this->db->where('jenis_perusahaan' , 'komersial');
    $this->db->order_by('id_perusahaan', 'DESC');
    return $this->db->get('perusahaan')->result_array();
 }

 function search_perusahaan($nama_perusahaan, $lokasi_kota,/* $lokasi_provinsi,*/$pembayaran_cash, $pembayaran_kredit, $rating, $sortir)
 {

    $this->db->select("*");
        //=========================================Nama Produk
        if(!empty($nama_perusahaan)) {//[OK]
         $this->db->like('nama_perusahaan', $nama_perusahaan, 'both');
      }
        //=========================================Kota/Kabupaten
      if(!empty($lokasi_kota)) {
         $this->db->where_in('id_perusahaan', $lokasi_kota);
      }
        /*if(!empty($lokasi_kota) && !empty($lokasi_provinsi)) {
            $this->db->where_in('kabupaten_perusahaan', $lokasi_kota);
            $this->db->or_where_in('provinsi_perusahaan', $lokasi_provinsi);
        }
         if(!empty($lokasi_kota) && empty($lokasi_provinsi)) {
            $this->db->where_in('kabupaten_perusahaan', $lokasi_kota);
        }
         if(empty($lokasi_kota) && !empty($lokasi_provinsi)) {
            $this->db->where_in('provinsi_perusahaan', $lokasi_provinsi);
         }*/
           //=========================================Garansi[ok]
         if(!empty($pembayaran_cash) && !empty($pembayaran_kredit)) {
            $this->db->where('pembayaran_cash', $pembayaran_cash);
            $this->db->or_where('pembayaran_kredit', $pembayaran_kredit);
         }
         if(!empty($pembayaran_cash) && empty($pembayaran_kredit)) {
            $this->db->where('pembayaran_cash', $pembayaran_cash);
         }
         if(empty($pembayaran_cash) && !empty($pembayaran_kredit)) {
            $this->db->where('pembayaran_kredit', $pembayaran_kredit);
         }

        //=========================================Rating
         if(!empty($rating)) {
            $this->db->where('rating_perusahaan >=', '4');
         }
          //=========================================Sortir
         if($sortir == 'terbaru') {
            $this->db->order_by('id_perusahaan', 'DESC');
         }


         $this->db->where('status_perusahaan' , 'aktiv');

        $result = $this->db->get('perusahaan')->result(); // Tampilkan data siswa berdasarkan keyword
        
        return $result; 
     }
     function search_reset_perusahaan($nama_perusahaan, $sortir)
     {

       $this->db->select("*");
        //=========================================Nama Produk
        if(!empty($nama_perusahaan)) {//[OK]
         $this->db->like('nama_perusahaan', $nama_perusahaan, 'both');
      }
          //=========================================Sortir
      if($sortir == 'terbaru') {
         $this->db->order_by('id_perusahaan', 'DESC');
      }


      $this->db->where('status_perusahaan' , 'aktiv');

        $result = $this->db->get('perusahaan')->result(); // Tampilkan data siswa berdasarkan keyword
        
        return $result; 
     }
     function detail_perusahaan($id_perusahaan)
     {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       return $this->db->get('perusahaan')->row();
    }
    function detail_epc($id_perusahaan)
    {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       return $this->db->get('perusahaan_view')->row();
    }
    function tampil_banner($id_perusahaan)
    {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->order_by('id_banner', 'DESC');
       return $this->db->get('perusahaan_banner')->result_array();
    }
    function detail_perusahaan_produk($id_perusahaan)
    {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->where('status_hapus' , 'false');
       $this->db->where('status_publis' , 'true');
       $this->db->order_by('id_produk', 'DESC');
       return $this->db->get('perusahaan_produk')->result_array();
    }
    function perusahaan_produk_sortir($id_perusahaan,$sortir)
    {

       $this->db->select("*");
          //=========================================Sortir
       if($sortir == 'terbaru') {
         $this->db->order_by('id_produk', 'DESC');
      }
      if($sortir == 'termurah') {
         $this->db->order_by('harga', 'ASC');
      }
      if($sortir == 'termahal') {
        $this->db->order_by('harga', 'DESC');
     }
     if($sortir == 'terlaris') {
       $this->db->order_by('terjual', 'DESC');
    }

    $this->db->where('id_perusahaan_view' , $id_perusahaan);
    $this->db->where('status_hapus' , 'false');
    $this->db->where('status_publis' , 'true');
    $this->db->where('status_perusahaan' , 'aktiv');

        $result = $this->db->get('produk_view')->result_array(); // Tampilkan data siswa berdasarkan keyword
        
        return $result; 
     }
     function detail_perusahaan_produk_terbaru($id_perusahaan)
     {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->where('status_hapus' , 'false');
       $this->db->where('status_publis' , 'true');
       $this->db->order_by('id_produk', 'DESC');
       $this->db->limit(5);
       return $this->db->get('perusahaan_produk')->result_array();
    }
    function detail_perusahaan_pemasang($id_perusahaan)
    {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->where('status_hapus_pemasang' , 'false');
       $this->db->where('status_publis_pemasang' , 'true');
       $this->db->order_by('id_pemasang', 'DESC');
       return $this->db->get('perusahaan_pemasang')->result_array();
    }
    function perusahaan_pemasang_sortir($id_perusahaan,$sortir)
    {

       $this->db->select("*");
          //=========================================Sortir
       if($sortir == 'terbaru') {
         $this->db->order_by('id_pemasang', 'DESC');
      }
      if($sortir == 'termurah') {
         $this->db->order_by('harga_pemasang', 'DESC');
      }
      if($sortir == 'termahal') {
        $this->db->order_by('harga_pemasang', 'ASC');
     }
     if($sortir == 'terlaris') {
       $this->db->order_by('id_pemasang', 'DESC');
    }

    $this->db->where('id_perusahaan_view' , $id_perusahaan);
    $this->db->where('status_hapus_pemasang' , 'false');
    $this->db->where('status_publis_pemasang' , 'true');
        $result = $this->db->get('pemasang_view')->result_array(); // Tampilkan data siswa berdasarkan keyword
        
        return $result; 
     }

    //===================================================FITUR WISHLIST
     function tambah_wishlist_produk($id_user, $id_etalase, $jenis)
     {
       $data = array(
         'id_user' => $id_user,
         'id_etalase' => $id_etalase,
         'jenis_etalase' => $jenis,
         'input_wishlist' => date('Y-m-d')
      );
       $this->db->insert('user_wishlist',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function tampil_wishlist()
    {   
       $this->db->select('user.folder AS user_folder,user_wishlist.id_wishlist AS id_wishlist,user_wishlist.jenis_etalase AS jenis_etalase, user_wishlist.id_etalase AS id_etalase,perusahaan_produk.id_produk AS id_produk,perusahaan_produk.harga AS harga,  perusahaan_produk.folder AS folder_produk');
       $this->db->from('user_wishlist');
       $this->db->join('perusahaan_produk','user_wishlist.id_etalase = perusahaan_produk.id_produk');
       $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('user','perusahaan.id_user = user.id_user');
       $this->db->where('user_wishlist.id_user' , $this->session->userdata('id_user'));
       $this->db->order_by('id_wishlist', 'DESC');
       return $this->db->get()->result_array();

        //$this->db->where('id_user' , $this->session->userdata('id_user'));
        //$this->db->order_by('id_wishlist', 'DESC');
        //return $this->db->get('user_wishlist')->result_array();
    }

    //===================================================FITUR KERANJANG
    function tambah_keranjang_produk($id_user, $id_produk, $jml_item, $total_harga, $catatan)
    {


       $data = array(
         'id_user' => $id_user,
         'id_produk' => $id_produk,
         'jumlah' => $jml_item,
         'harga_order' => $total_harga,
         'catatan' => $catatan,
         'status_order' => 'keranjang',
         'input_order' => date('Y-m-d')
      );
       $this->db->insert('order',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function tampil_keranjang()
    {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','perusahaan_produk.id_produk = order.id_produk');   
       $this->db->where('id_user' , $this->session->userdata('id_user'));     
       $this->db->where('status_order', 'keranjang');
       $this->db->order_by('id_order', 'DESC');
       $query = $this->db->get()->result_array();
       return $query;
    }
    function tampil_rekening()
    {   
       $this->db->ORDER_BY('bank', 'DESC');
       return $this->db->get('rekening')->result_array();
    }

    //===================================================FITUR BELI
    function tampil_beli()
    {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','perusahaan_produk.id_produk = order.id_produk');   
       $this->db->where('id_user' , $this->session->userdata('id_user'));     
       $this->db->where('status_order', 'keranjang');
       $this->db->order_by('id_order', 'DESC');
       $query = $this->db->get()->result_array();
       return $query;
    }
    function get_rekening($id_rekening)
    {
       $this->db->where('id_rekening' , $id_rekening);
       return $this->db->get('rekening')->row();
    }
    function tambah_invoice($id_invoice, $nama, $telepon, $alamat, $kecamatan, $kabupaten, $provinsi, $pos, $total,  $bank, $nama_rekening, $nomor_rekening, $status_pembayaran)
    {
       $data = array(
         'id_invoice' => $id_invoice,
         'nama_penerima' => $nama,
         'telepon_penerima' => $telepon,
         'alamat_penerima' => $alamat,
         'kecamatan_penerima' => $kecamatan,
         'kabupaten_penerima' => $kabupaten,
         'provinsi_penerima' => $provinsi,
         'pos_penerima' => $pos,
         'jumlah_pembayaran' => $total,
         'bank' => $bank,
         'nama_rekening' => $nama_rekening,
         'nomor_rekening' => $nomor_rekening,
         'status_pembayaran' => $status_pembayaran,
         'input_invoice' => date('Y-m-d')
      );
       $this->db->insert('order_invoice',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function invoice_email($invoice)
    {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','perusahaan_produk.id_produk =order.id_produk');   
       $this->db->where('id_user' , $this->session->userdata('id_user'));
       $this->db->where('id_invoice' , $invoice);
       $query = $this->db->get()->result_array();
       return $query;
    }
     function tampil_invoice($id_invoice) //menampilkan detail artikel
     {
       $this->db->where('id_invoice' , $id_invoice);
       return $this->db->get('order_invoice')->row();
    }
     function daftar_invoice($id_invoice) //menampilkan detail artikel
     {

       $this->db->select();
       $this->db->from('order');
       $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');   
       $this->db->where('id_user' , $this->session->userdata('id_user'));

       $this->db->where('id_invoice' , $id_invoice);
       return $this->db->get()->result_array();
    }
    function tampil_pembayaran($id_invoice)
    {
       $this->db->where('id_invoice' , $id_invoice);
       return $this->db->get('order_pembayaran')->result_array();
    }

    function invoice()
    {
       $this->db->select();
       $this->db->from('order');
       $this->db->join('order_invoice','order.id_invoice = order_invoice.id_invoice');   
       $this->db->where('id_user' , $this->session->userdata('id_user'));  
        //$this->db->where_not_in('status_pembayaran', array('batal'));
       $this->db->where_not_in('status_order', array('batal','selesai'));
       $this->db->group_by('order.id_invoice', 'DESC');
       $this->db->order_by('id', 'DESC');

       $query = $this->db->get()->result_array();
       return $query;
    }
    function simpan_pembayaran($id_invoice, $pembayaran, $nominal, $bukti_pembayaran)
    {
      $data = array(
         'id_invoice' => $id_invoice,
         'status' => 'menunggu_verifikasi',
         'file' => $bukti_pembayaran,
         'nominal' => $nominal,
         'input_pembayaran' => date('Y-m-d')
      );
      $this->db->insert('order_pembayaran',$data);

      $data1 = array(
         'status_order' => 'menunggu_verifikasi_pembayaran'
      );
      $this->db->where('id_invoice' , $id_invoice);
      $this->db->update('order' , $data1);

      $data1 = array(
         'status_pembayaran' => 'menunggu_verifikasi_pembayaran'
      );
      $this->db->where('id_invoice' , $id_invoice);
      $this->db->update('order_invoice' , $data1);

      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }
    function proses_order() //menampilkan detail artikel
    {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');
       $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('user','perusahaan.id_user = user.id_user');
       $this->db->where('order.id_user', $this->session->userdata('id_user'));
       $this->db->where('status_order', 'proses');
       return $this->db->get()->result_array();

    }
    function kirim_order() //menampilkan detail artikel
    {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');
       $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('user','perusahaan.id_user = user.id_user');
       $this->db->where('order.id_user', $this->session->userdata('id_user'));
       $this->db->where('status_order', 'kirim');
       return $this->db->get()->result_array();
    }
     function selesai_order() //menampilkan detail artikel
     {
       $this->db->select('*');
       $this->db->from('order');
       $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');
       $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('user','perusahaan.id_user = user.id_user');
       $this->db->where('order.id_user', $this->session->userdata('id_user'));
       $this->db->where_in('status_order', array('selesai','batal'));
       $this->db->order_by('tanggal', 'DESC');
       return $this->db->get()->result_array();
    }
    function pembelian_detail_invoice($id_order)
    {
       $this->db->select('*');
       $this->db->from('order_invoice');
       $this->db->join('order', 'order_invoice.id_invoice=order.id_invoice');
       $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');
       $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('user','perusahaan.id_user = user.id_user');
       $this->db->where('id_order', $id_order);
       return $this->db->get()->row();
    }
    function simpan_rating_produk($id_produk, $etalase)
    {

       $this->db->select_avg('angka');
       $this->db->where('id_etalase' , $id_produk);
       $this->db->where('jenis_etalase' , $etalase);
       $rating = $this->db->get('rating')->row();

       $this->db->where('id_produk' , $id_produk);
       $this->db->update('perusahaan_produk' , array('rating_produk'=>round($rating->angka, 1)));

    }
    function simpan_rating_perusahaan($id_perusahaan)
    {

       $this->db->select_avg('angka');
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $rating = $this->db->get('rating')->row();

       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->update('perusahaan' , array('rating_perusahaan'=>round($rating->angka, 1)));

    }
    function simpan_ulasan($rating, $ulasan, $id_user, $id_order, $id_perusahaan, $id_produk, $etalase)
    {

       $data = array(
         'id_user' => $id_user,
         'id_order' => $id_order,
         'id_perusahaan' => $id_perusahaan,
         'id_etalase' => $id_produk,
         'jenis_etalase' => $etalase,
         'angka' => $rating,
         'ulasan' => $ulasan,
         'input_rating' => date('Y-m-d')
      );
       $this->db->insert('rating',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }




    function tampil_chat() //menampilkan detail artikel
    {
       $this->db->where('id_user' , $this->session->userdata('id_user'));
       $this->db->group_by('id_user');
       $this->db->order_by('id_chat', 'DESC');
       return $this->db->get('chat')->result_array();
    }
    function send_chat($chat, $id_perusahaan, $jenis, $pengirim)
    {   
       date_default_timezone_set('Asia/Jakarta');
       $data = array(
         'id_perusahaan' => $id_perusahaan,
         'id_user' => $this->session->userdata('id_user'),
         'pengirim' => $pengirim,
         'jenis' => $jenis,
         'chat' => $chat,          
         'administrator' => 'false',
         'tanggal' => date('Y-m-d'),
         'jam' => date('H:i:s')

      );
       $this->db->insert('chat',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function daftar_chat()
    {
       $this->db->where('id_user', $this->session->userdata('id_user'));
       $this->db->order_by('id_chat', 'DESC');
       $this->db->group_by('id_perusahaan');

      //  $this->db->having('user_id = 45'); 
       return $this->db->get('chat')->result_array();
    }
    function lihat_chat($id_perusahaan)
    {
       $this->db->where('id_user' , $this->session->userdata('id_user'));
       $this->db->where('id_perusahaan', $id_perusahaan);
       $this->db->order_by('id_chat', 'ASC');
       return $this->db->get('chat')->result_array();
    }
    function simpan_bidding($nama_bidding, $kategori, $keterangan, $budget, $newname, $ukuran_sistem, $batas_penawaran)
    {
       if ($ukuran_sistem > 15) {
         $status_bidding ='menunggu_verifikasi';
      }else{
         $status_bidding ='berlangsung';
      }
      $data = array(
         'id_user' => $this->session->userdata('id_user'),
         'nama_bidding' => $nama_bidding,
         'kategori' => $kategori,
         'keterangan' => $keterangan,          
         'budget' => $budget,
         'ukuran_sistem' => $ukuran_sistem,
         'dokumen_bidding' => $newname,
         'link_dokumen' => 'upload_file/'.$this->session->userdata('folder').'/bidding',
         'batas_penawaran' => $batas_penawaran,
         'status_bidding' => $status_bidding,
         'bukti_pengerjaan' => 'false',
         'input_bidding' => date('Y-m-d')

      );
      $this->db->insert('bidding',$data);
      return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

   function get_id_bidding()
   {
    $this->db->where('id_user' , $this->session->userdata('id_user'));
    $this->db->order_by('id_bidding', 'DESC');
    $this->db->limit(1);
    return $this->db->get('bidding')->row();
 }
 function daftar_bidding()
 {
    $this->db->select('*');
    $this->db->from('bidding');
        //$this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        //$this->db->where('status_bidding_take', 'menang');
    $this->db->where_in('status_bidding', array('selesai','batal','dihapus'));

    $this->db->where('id_user' , $this->session->userdata('id_user'));
    $this->db->order_by('bidding.id_bidding', 'DESC');
    return $this->db->get()->result_array();
 }
 function detail_bidding($id_bidding)
 {
    $this->db->where('id_bidding' , $id_bidding);
    return $this->db->get('bidding')->row();
 }
 function area_bidding($id_bidding)
 {
    $this->db->where('id_bidding' , $id_bidding);
    return $this->db->get('bidding_area')->result_array();
 }
 function tampil_perusahaan_send_bidding()
 {
    $this->db->select('*');
    $this->db->from('perusahaan');
    $this->db->join('perusahaan_medsos','perusahaan.id_perusahaan = perusahaan_medsos.id_perusahaan');
    $this->db->where('status_perusahaan' , 'aktiv');
    $this->db->where('jenis_perusahaan' , 'komersial');
    $this->db->where('jenis' , 'email');
    return $this->db->get()->result_array();
 }
 function bidding_berlangasung()
 {
    $this->db->where('id_user', $this->session->userdata('id_user'));
    $this->db->where('status_bidding', 'berlangsung');
    return $this->db->get('bidding')->row();
 }
 function bidding_diproses()
 {
   $this->db->select('*');
   $this->db->from('bidding');
   $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        //$this->db->where('jenis' , 'email');
   $this->db->where('id_user', $this->session->userdata('id_user'));
   $this->db->where('status_bidding', 'diproses');
   $this->db->where('status_bidding_take', 'menang');
   $this->db->order_by('bidding.id_bidding', 'DESC');
   return $this->db->get()->result_array();
}
function bidding_dikerjakan()
{
   $this->db->select('*');
   $this->db->from('bidding');
   $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        //$this->db->where('jenis' , 'email');
   $this->db->where('id_user', $this->session->userdata('id_user'));
   $this->db->where('status_bidding', 'dikerjakan');
   $this->db->where('status_bidding_take', 'menang');
   $this->db->order_by('bidding.id_bidding', 'DESC');
   return $this->db->get()->result_array();
}
function daftar_pembayaran_lelang()
{
 $this->db->select('*');
 $this->db->from('bidding');
 $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        //$this->db->where('jenis' , 'email');
 $this->db->where('id_user', $this->session->userdata('id_user'));
 $this->db->where_in('status_bidding_take', array('menunggu_pembayaran','menunggu_verifikasi_pembayaran'));
 $this->db->order_by('bidding.id_bidding', 'DESC');
 return $this->db->get()->result_array();
}
function lelang_invoice($id_bidding)
{
 $this->db->select('*');
 $this->db->from('bidding');
 $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
 $this->db->where('bidding.id_bidding', $id_bidding);
 $this->db->where_in('status_bidding_take', array('menunggu_pembayaran','menunggu_verifikasi_pembayaran'));
 return $this->db->get()->row();
}
function lelang_invoice_lunas($id_bidding)
{
 $this->db->select('*');
 $this->db->from('bidding');
 $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
 $this->db->where('bidding.id_bidding', $id_bidding);
        //$this->db->where_in('status_bidding_take','');
 return $this->db->get()->row();
}
function lelang_pembayaran($id_bidding)
{
 $this->db->select('*');
 $this->db->from('bidding_take');
 $this->db->join('bidding_pembayaran','bidding_take.id_bidding_take = bidding_pembayaran.id_bidding_take');
 $this->db->where('id_bidding' , $id_bidding);
 $this->db->where_in('status_bidding_take', array('menunggu_pembayaran','menunggu_verifikasi_pembayaran'));
 return $this->db->get()->result_array();
}
function reload_epc($id_bidding)
{
 $this->db->select('*');
 $this->db->from('bidding_take');
 $this->db->join('perusahaan','bidding_take.id_perusahaan = perusahaan.id_perusahaan');
 $this->db->join('user','perusahaan.id_user = user.id_user');
 $this->db->where('id_bidding',$id_bidding);
 $this->db->order_by('id_bidding_take' , 'DESC');
 return $this->db->get()->result_array();
}
function lihat_epc_take($id_bidding_take, $id_perusahaan)
{
 $this->db->select('*');
 $this->db->from('bidding_take');
 $this->db->join('perusahaan','bidding_take.id_perusahaan = perusahaan.id_perusahaan');
 $this->db->join('user','perusahaan.id_user = user.id_user');
 $this->db->where('id_bidding',$id_bidding_take);
 $this->db->where('bidding_take.id_perusahaan',$id_perusahaan);
 return $this->db->get()->row();
}
function simpan_pembayaran_lelang($id_bidding_take, $nominal, $bukti_pembayaran)
{

 $data = array(
   'id_bidding_take' => $id_bidding_take,
   'nominal' => $nominal,
   'bukti' => $bukti_pembayaran,
   'input_pembayaran_bidding' => date('Y-m-d')
);
 $this->db->insert('bidding_pembayaran',$data);
 return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}
    //=============================================================================================
function tampil_publikasi()
{
 return $this->db->get('publikasi')->result_array();
}
function tampil_publikasi_cari($judul)
{
 $this->db->like('judul_publikasi', $judul, 'both');
 return $this->db->get('publikasi')->result_array();
}
function tampil_publikasi_terbaru()
{
 $this->db->order_by('id_publikasi', 'DESC');
 $this->db->limit(3);
 return $this->db->get('publikasi')->result_array();
}
function tampil_publikasi_detail($id_publikasi)
{
 $this->db->where('id_publikasi', $id_publikasi);
 return $this->db->get('publikasi')->row();
}

function artikel_index()
{
 $this->db->order_by('id_artikel', 'DESC');
 $this->db->limit(3);
 return $this->db->get('artikel')->result_array();
}
function tampil_artikel()
{
 $this->db->order_by('id_artikel', 'DESC');
 return $this->db->get('artikel')->result_array();
}

function tampil_artikel_cari($judul)
{
 $this->db->like('judul', $judul, 'both');
 return $this->db->get('artikel')->result_array();
}
function tampil_artikel_terbaru()
{
 $this->db->order_by('id_artikel', 'DESC');
 $this->db->limit(5);
 return $this->db->get('artikel')->result_array();
}
function tampil_artikel_detail($id_artikel)
{
 $this->db->where('id_artikel', $id_artikel);
 return $this->db->get('artikel')->row();
}

function tampil_iklan_banner($priority)
{
 $this->db->select('*');
 $this->db->from('iklan');
        //$this->db->join('iklan', 'iklan_paket.id_iklan_paket=iklan.id_iklan_paket');
 $this->db->join('perusahaan', 'iklan.id_perusahaan=perusahaan.id_perusahaan');
 $this->db->join('user', 'perusahaan.id_user=user.id_user');
         //$this->db->from('iklan_pembayaran');
        // $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
        // $this->db->join('iklan_paket', 'iklan.id_iklan_paket=iklan_paket.id_iklan_paket');
       // $this->db->where('prioritas_banner', $priority);
 $this->db->limit(1);
 $this->db->where('status_iklan', 'tayang');
 $this->db->where('tanggal_tayang <=',  date("Y-m-d"));
 $this->db->where('tanggal_akhir >=',  date("Y-m-d"));
 return $this->db->get()->row();
}
function tampil_iklan_sidebar_pustaka()
{
 $this->db->select('*');
 $this->db->from('iklan');
        //$this->db->join('iklan', 'iklan_paket.id_iklan_paket=iklan.id_iklan_paket');
 $this->db->join('perusahaan', 'iklan.id_perusahaan=perusahaan.id_perusahaan');
        //$this->db->where('prioritas_banner', $priority);
 $this->db->limit(1);
 $this->db->where('status_iklan', 'tayang');
 $this->db->where('tanggal_tayang <=',  date("Y-m-d"));
 $this->db->where('tanggal_akhir >=',  date("Y-m-d"));
 return $this->db->get()->row();
}
function tampil_iklan_detail_pustaka()
{
 $this->db->select('*');
 $this->db->from('iklan');
        //$this->db->join('iklan', 'iklan_paket.id_iklan_paket=iklan.id_iklan_paket');
 $this->db->join('perusahaan', 'iklan.id_perusahaan=perusahaan.id_perusahaan');
        //$this->db->where('prioritas_banner', $priority);
 $this->db->limit(1);
 $this->db->where('status_iklan', 'tayang');
 $this->db->where('tanggal_tayang <=',  date("Y-m-d"));
 $this->db->where('tanggal_akhir >=',  date("Y-m-d"));
 return $this->db->get()->row();
}
function tampil_iklan_produk()
{
 $this->db->select('*');
 $this->db->from('iklan');
        //$this->db->join('iklan', 'iklan_paket.id_iklan_paket=iklan.id_iklan_paket');
 $this->db->join('perusahaan', 'iklan.id_perusahaan=perusahaan.id_perusahaan');
        //$this->db->where('prioritas_banner', $priority);
 $this->db->limit(1);
 $this->db->where('status_iklan', 'tayang');
 $this->db->where('tanggal_tayang <=',  date("Y-m-d"));
 $this->db->where('tanggal_akhir >=',  date("Y-m-d"));
 return $this->db->get()->row();
}


function getUsers($postData){

 $response = array();

 if(isset($postData['search']) ){
         // Select record
  $this->db->select('*');
  $this->db->where("kabupaten like '%".$postData['search']."%' ");

  $records = $this->db->get('wilayah_kab')->result();

  foreach($records as $row ){
    $response[] = array("value"=>$row->id,"label"=>$row->kabupaten);
 }

}

return $response;
}

function get_notif($tipe_notif)
{
      //NOTIF PEMBELIAN
   $notif_beli_pembayaran=count($this->db->get_where('order', array('id_user'=>$this->session->userdata('id_user'), 'status_order'=>'menunggu_pembayaran'))->result_array());
   $notif_beli_proses=count($this->db->get_where('order', array('id_user'=>$this->session->userdata('id_user'), 'status_order'=>'proses'))->result_array());
   $notif_beli_kirim=count($this->db->get_where('order', array('id_user'=>$this->session->userdata('id_user'), 'status_order'=>'kirim'))->result_array());

   $get_pembelian = $this->db->get_where('order', array('id_user'=>$this->session->userdata('id_user'),'status_order'=>'selesai'))->result_array();
   $ratingOrder[]=0;
   foreach($get_pembelian AS $vBeli){
      $rating = $this->db->get_where('rating', array('id_order'=>$vBeli['id_order'],'jenis_etalase'=>'produk'))->result();
      if (count($rating)<1) {
         $ratingOrder[]=$vBeli['id_order'];
      }else{
        $ratingOrder[]=0;
     }
  }
  if (array_sum($ratingOrder)>0) {
    $notif_beli_ulasan=count($ratingOrder);
 }else{
    $notif_beli_ulasan=0;
 }


 $notif_pembelian_result=$notif_beli_pembayaran+$notif_beli_proses+$notif_beli_kirim+$notif_beli_ulasan;

 if($tipe_notif=='notif_produk_pembayaran'){
   return $notif_beli_pembayaran;
}else if($tipe_notif=='notif_produk_proses'){
   return $notif_beli_proses;
}else if($tipe_notif=='notif_produk_kirim'){
   return $notif_beli_kirim;
}else if($tipe_notif=='notif_produk_ulasan'){
   return $notif_beli_ulasan;
}else if($tipe_notif=='notif_pembelian'){
   return $notif_pembelian_result;
}
      //NOTIF PROYEK
$notif_proyek_berlangsung=count($this->db->get_where('bidding', array('id_user'=>$this->session->userdata('id_user'), 'status_bidding'=>'berlangsung'))->result_array());

$this->db->select('*');
$this->db->from('bidding');
$this->db->join('bidding_take', 'bidding.id_bidding= bidding_take.id_bidding');
$this->db->where('id_user', $this->session->userdata('id_user'));
$this->db->where_in('status_bidding_take', array('menunggu_verifikasi_pembayaran','menunggu_pembayaran'));
$result_bayar=$this->db->get()->result_array();
$notif_proyek_verif_bayar=count($result_bayar);

$this->db->select('*');
$this->db->from('bidding');
$this->db->join('bidding_take', 'bidding.id_bidding= bidding_take.id_bidding');
$this->db->where('id_user', $this->session->userdata('id_user'));
$this->db->where_in('status_bidding', array('diproses'));
$this->db->where_in('status_bidding_take', array('menang'));
$result_proses=$this->db->get()->result_array();
$notif_proyek_proses=count($result_proses);

      //$notif_proyek_proses=count($this->db->get_where('bidding', array('id_user'=>$this->session->userdata('id_user'), 'status_bidding'=>'diproses'))->result_array());


$this->db->select('*');
$this->db->from('bidding');
$this->db->join('bidding_take', 'bidding.id_bidding= bidding_take.id_bidding');
$this->db->where('id_user', $this->session->userdata('id_user'));
$this->db->where('status_bidding','dikerjakan');
$this->db->where_in('status_bidding_take', array('menang'));
$result_dikerjakan=$this->db->get()->result_array();
$notif_proyek_kerjakan=count($result_dikerjakan);
      //$notif_proyek_kerjakan=count($this->db->get_where('bidding', array('id_user'=>$this->session->userdata('id_user'), 'status_bidding'=>'dikerjakan'))->result_array());

$notif_proyek_result=$notif_proyek_berlangsung+$notif_proyek_verif_bayar+$notif_proyek_proses+$notif_proyek_kerjakan;
      if($tipe_notif=='notif_proyek_berlangsung'){//PROYEK
         return $notif_proyek_berlangsung;
      }else if($tipe_notif=='notif_proyek_pembayaran'){
         return $notif_proyek_verif_bayar;
      }else if($tipe_notif=='notif_proyek_proses'){
         return $notif_proyek_proses;
      }else if($tipe_notif=='notif_proyek_kerjakan'){
         return  $notif_proyek_kerjakan;
      }else if($tipe_notif=='notif_proyek'){
         return $notif_proyek_result; 
      }

      //NOTIF PENAWARAN
      $notif_pen_pembayaran=count($this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'menunggu_pembayaran'))->result_array());
      $notif_pen_verif_pembayaran=count($this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'menunggu_verifikasi_pembayaran'))->result_array());
      $notif_pen_tanggapan=count($this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'menunggu_tanggapan'))->result_array());
      $notif_pen_ditanggapi=count($this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'ditanggapi'))->result_array());
      $notif_pen_dikerjakan=count($this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'dikerjakan'))->result_array());

      $get_penawaran = $this->db->get_where('pemasang_penawaran', array('id_user'=>$this->session->userdata('id_user'), 'status_penawaran'=>'selesai'))->result_array();
      foreach($get_penawaran AS $vPenawaran){
         $rating = $this->db->get_where('rating', array('id_order'=>$vPenawaran['id_penawaran'],'jenis_etalase'=>'teknisi'))->result();
         if (count($rating)<1) {
            $ratingTeknisi[]=$vPenawaran['id_penawaran'];
         }else{
            $ratingTeknisi[]=0;
         }
      }
      if (count($get_penawaran)<1) {
        $ratingTeknisi[]=0;
     }
     if (array_sum($ratingTeknisi)>0) {
       $notif_teknisi_ulasan=count($ratingTeknisi);
    }else{
       $notif_teknisi_ulasan=0;
    }

    $notif_pen_daftar_penawaran=$notif_pen_verif_pembayaran+$notif_pen_tanggapan+$notif_pen_ditanggapi;
    $notif_pen_result=$notif_pen_pembayaran+$notif_pen_verif_pembayaran+$notif_pen_tanggapan+$notif_pen_ditanggapi+$notif_pen_dikerjakan+$notif_teknisi_ulasan;

    if($tipe_notif=='notif_pen_bayar'){
      return  $notif_pen_pembayaran;
   }else if($tipe_notif=='notif_pen_verif_bayar'){
      return $notif_pen_verif_pembayaran;
   }else if($tipe_notif=='notif_pen_tunggu_tanggapan'){
      return $notif_pen_tanggapan;
   }else if($tipe_notif=='notif_pen_ditanggapi'){
      return  $notif_pen_ditanggapi;
   }else if($tipe_notif=='notif_pen_dikerjakan'){
      return  $notif_pen_kerjakan;
   }else if($tipe_notif=='notif_daftar_penawaran'){
      return  $notif_pen_daftar_penawaran; 
   }else if($tipe_notif=='notif_pen_ulasan'){
      return  $notif_teknisi_ulasan; 
   }else if($tipe_notif=='notif_penawaran'){
      return  $notif_pen_result; 
   }


      //NOTIF USER
   $notif_user=$notif_pembelian_result+$notif_proyek_result+$notif_pen_result;  
   if($tipe_notif=='icon_user'){
      return $notif_user;
   }

}
}

?>