<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Web_model');
    }

    public function index()
    {
        $kategori       = $this->Web_model->get_all_kategori();
        $menu           = $this->Web_model->get_all_menu();
        $order          = $this->Web_model->get_all_order();
        $order_detail   = $this->Web_model->get_all_order_detail();
        $slider   = $this->Web_model->get_all("slider");

        $b  = array('kategori' => $kategori, 'menu' => $menu, 'order' => $order, 'order_detail' => $order_detail, 'slider' => $slider);

        $this->template->load('front','frontend/home', $b);
    }   
    function add_to_cart($id,$qty){ //fungsi Add To Cart

        $row = $this->Web_model->get_by_id($id);
        $kategori       = $this->Web_model->get_by_idkat($row->id_kategori);
        if ($row) {
            $datas= array(
                'id' => $row->id_menu,
                'name' => $row->nama_menu,
                'price' => $row->harga,
                'qty' => $qty, 
                'id_kategori' => $row->id_kategori,
                'gambar' => $row->foto_menu,
                'nama_kategori' => $kategori->nama_kategori,
            );
            $this->cart->product_name_rules = '[:print:]';
            $this->cart->insert($datas);
            echo(count($this->cart->contents()));
        }
    }
    public function update_cart($a,$b)
    {
        $data = array(
            'rowid' => $a,
            'qty' => $b,
        );
        $this->cart->update($data);
        $rp = array(
            'format' => $this->cart->format_number($this->cart->total()),
            'nilai' => $this->cart->total()
        );
        echo(json_encode($rp));
    }
 
    function show_cart(){ 
        $auth_assignment = $this->Produk_model->get_all5('transaksi');
        $data = array(
            'barang_dat1' => 'hf',
            'barang_data' => $auth_assignment
        );
        $this->template->load('template','frontend/cart', $data);
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart($row_id){ //fungsi untuk menghapus item cart
        $this->cart->remove($row_id);
        $rp = array(
            'jml' =>count($this->cart->contents()),
            'format' => $this->cart->format_number($this->cart->total()),
            'nilai' => $this->cart->total(),
        );
        echo(json_encode($rp));
    }   

    function tyi($value=''){
        $this->load->view('front');
    }

    function simpan(){

        $nama_menu = $this->input->post('nama_menu');
        $harga_menu = $this->input->post('harga_menu');
        $kategori = $this->input->post('kategori');
        $deskripsi_menu = $this->input->post('deskripsi');
        
        $data = array('nama_menu' => $nama_menu, 'harga' => $harga_menu, 'id_kategori' => $kategori, 'deskripsi_menu' => $deskripsi_menu );
        $this->Web_model->insert($data);
        redirect('web');

    }
    public function checkout($ida="")
    {
        // $this->load->model('Lokasi_model');
        // $lok = $this->Lokasi_model->get_all();
        if ($ida!="") {
            $row = $this->Web_model->get_all_where($table="order","id_order",$ida)->row();
            $row2 = $this->Web_model->get_all_where($table="order_detail","id_order",$ida)->result();
            $this->load->model('Users_model');
            $row3 = $this->Users_model->get_by_id2($row->id_user);
            $data = array("row"=>$row,"row2"=>$row2,"row3"=>$row3);
            $this->template->load('front','frontend/cart', $data);
        }else{
            $this->authclass->check_isvalidated(base_url().'login');
            $count=count($this->cart->contents());
            if ($count>0) {
                $data = array(
                    'id_user' =>  $this->session->userdata("id"),
                    'total_harga' => $this->cart->total(),
                    'date' => date("Y-m-d"),
                    'waktu' => date("H:i:s"),
                    'bayar' => 0,
                    'id_lokasi' => 0,
                    'transaksi' => "",
                );
                $table="order";
                $this->Web_model->insertall($table,$data);
                $ida= $this->db->insert_id();
                foreach($this->cart->contents() as $key){
                    $data = array(
                        'id_order' =>  $ida,
                        'id_menu' => $key['id'],
                        'nama_menu' => $key['name'],
                        'id_kategori' => $key['id_kategori'],
                        'nama_kategori' => $key['nama_kategori'],
                        'qty' => $key['qty'],
                        'harga' => $key['price'],
                        'total_harga' => $key['subtotal'],
                        'gambar' => $key['gambar'],
                    );
                    $table="order_detail";
                    $this->Web_model->insertall($table,$data);
                    $this->cart->remove($key['rowid']);
                }

                $row = $this->Web_model->get_all_where($table="order","id_order",$ida)->row();
                $row2 = $this->Web_model->get_all_where($table="order_detail","id_order",$ida)->result();
                $this->load->model('Users_model');
                $row3 = $this->Users_model->get_by_id($this->session->userdata("user_id"));
                $data = array("row"=>$row,"row2"=>$row2,"row3"=>$row3);
                $this->template->load('front','frontend/cart', $data);
            }else{
                redirect('web');
            }
        }
        
    }   
    public function ckt($id)
    {
        $order = $this->Web_model->get_all_where('order','id_order', $id);
        $order_detail = $this->Web_model->get_all_where('order_detail','id_order', $id);
        $b = array('order'=>$order->row(),'detail'=>$order_detail->result());
        $this->template->load('front','frontend/ckt', $b);
    }

    public function konfirm() 
    {
        $data = array(
            'transaksi' => "masuk",
            'catatan' => $this->input->post('catatan',TRUE),
        );

        $this->Web_model->update("order", "id_order", $this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('web/checkout/'.$this->input->post('id', TRUE)));
    }

    public function page($page)
    {
        $this->load->model('Page_model');
        $row = $this->Page_model->get_by_link($page);
        $data = array(
            'title' => 'Riwayat Pesanan',
            'id_page' => $row->id_page,
            'link' => $row->link,
            'judul' => $row->judul,
            'deskripsi' => $row->deskripsi,
            'foto' => $row->foto,
            'enum' => $row->enum,
        );
        $this->template->load('front','frontend/page', $data);
    } 

    public function logorder()
    {
        $this->authclass->check_isvalidated(base_url().'login');
        $this->load->model('Order_model');
        $das = $this->Order_model->get_all_where_id($this->session->userdata("id"));
        $data = array(
            'title' => 'Riwayat Pesanan',
            'dats'=>$das,
        );
        $this->template->load('front','frontend/riwayat', $data);
    } 

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['products']=$this->Web_model->get_product_keyword($keyword);
        $this->template->load('front','frontend/search', $data);
    }

    public function _rules() 
    {
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-07 01:38:10 */
/* http://harviacode.com */