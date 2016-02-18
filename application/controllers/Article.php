<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Article extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('marticle');
        $this->load->helper('form','url');
    }
    public function index()
    {
        $data['title'] = 'Welcome To Article';
        $data['qarticle'] = $this->marticle->get_allarticle();
        $this->load->view('varticle',$data);
    }
    public function form(){
        //ambil variabel URL
        $mau_ke                 = $this->uri->segment(3);
        $idu                    = $this->uri->segment(4);
        //ambil variabel dari form
        $id                     = addslashes($this->input->post('id'));
        $judul                  = addslashes($this->input->post('judul'));
        $isi                   	= addslashes($this->input->post('isi'));
        $author                 = addslashes($this->input->post('author'));
        $tags             		= addslashes($this->input->post('tags'));
        $tanggal                = addslashes($this->input->post('tanggal'));
		//mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {//jika uri segmentnya add
            $data['title'] = 'Tambah Article';
            $data['aksi'] = 'aksi_add';
            $this->load->view('vformarticle',$data);
        } else if ($mau_ke == "edit") {//jika uri segmentnya edit
            $data['qdata']  = $this->marticle->get_article_by_id($idu);
            $data['title'] = 'Edit Article';
            $data['aksi'] = 'aksi_edit';
            $this->load->view('vformarticle',$data);
        } else if ($mau_ke == "aksi_add") {//jika uri segmentnya aksi_add sebagai fungsi untuk insert		
            $data = array(
                'judul'   	=> $judul,
                'isi'  		=> $isi,
                'author' 	=> $author,
                'tags'		=> $tags,
                'tanggal'   => date('Y-m-d H:i:s')
            );
            $this->marticle->get_insert($data); //model insert data barang
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>"); //pesan yang tampil setalah berhasil di insert
            redirect('article');
        } else if ($mau_ke == "aksi_edit") { //jika uri segmentnya aksi_edit sebagai fungsi untuk update
			$data = array(
				'judul'   	=> $judul,
				'isi'  		=> $isi,
				'author' 	=> $author,
				'tags'		=> $tags,
				'tanggal'   => date('Y-m-d H:i:s')
			);
			$this->marticle->get_update($id,$data); //modal update data barang
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Article berhasil diupdate</div>"); //pesan yang tampil setelah berhasil di update
			redirect('article');
        }
    }
    public function detail($id){ //fungsi detail barang
        $data['title'] = 'Detail Article'; //judul title
        $data['qarticle'] = $this->marticle->get_article_by_id($id); //query model barang sesuai id
        $this->load->view('vdetbarang',$data); //meload views detail barang
    }
    public function hapus($id){ //fungsi hapus barang sesuai dengan id
        $this->marticle->del_article($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Article berhasil dihapus</div>");
        redirect('article');
    }
}
/* End of file article.php */
/* Location: ./application/controllers/article.php */