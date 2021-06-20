<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanantamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Order_model');
        $this->load->model('Web_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pesanan',
        );
        $this->template->load('template','admin/order/pesanan_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Order_model->json2();
    }

    public function ckt($id)
    {
        $order = $this->Web_model->get_all_where('order','id_order', $id);
        $row = $order->row();
        $order_detail = $this->Web_model->get_all_where('order_detail','id_order', $id);
        $data = array(
            'title' => 'Rincian Pesanan: A/n '.$row->id_user, 
            'order'=>$row,
            'detail'=>$order_detail->result()
        );
        $this->template->load('template','admin/order/ckt', $data);
    }

    public function bayar() 
    {
        $id = $this->input->post('id',TRUE);
        if ($id) {
            $data = array(
                'id_kasir' => $this->session->userdata("id"),
                'nama_kasir' => $this->session->userdata("user_id"),
                'metode' => $this->input->post('metode',TRUE),
                'diskon' => $this->input->post('diskon',TRUE),
                'total_harga' => $this->input->post('total',TRUE),
                'bayar' => $this->input->post('bayar',TRUE),
                'status' => 'lunas',
                'transaksi' => 'terkonfirmasi',
            );

            $this->Order_model->update($id, $data);
            $datas = array('id_order' => $id, 'status' => 'terkonfirmasi');
            $this->Web_model->insertall("notifikasi",$datas);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pesanantamu'));
        }
    }

  

    public function checkout()
    {
        $this->form_validation->set_rules('totals', 'totals', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('admin/transaksi'));
        } else {
            $data = array(
                'id_user' =>  'Online',
                'total_harga' => $this->input->post('totals'),
                'date' => date("Y-m-d"),
                'waktu' => date("H:i:s"),
                'bayar' => 0,
            );
            $table="order";
            $this->Web_model->insertall($table,$data);
            $ida= $this->db->insert_id();
            for ($i=0; $i < count($this->input->post('id')); $i++) { 
                $data = array(
                    'id_order' =>  $ida,
                    'id_menu' => $this->input->post('id')[$i],
                    'nama_menu' => $this->input->post('name')[$i],
                    'id_kategori' => $this->input->post('id_kategori')[$i],
                    'nama_kategori' => $this->input->post('nama_kategori')[$i],
                    'qty' => $this->input->post('qty')[$i],
                    'harga' => $this->input->post('price')[$i],
                    'total_harga' => $this->input->post('subtotal')[$i],
                    'gambar' => $this->input->post('gambar')[$i],
                );
                $table="order_detail";
                $this->Web_model->insertall($table,$data);
                $this->cart->remove($this->input->post('rowid')[$i]);
            }
            redirect(site_url('admin/pesanantamu/ckt/'.$ida));            
        }
    } 
    public function delete($id) 
    {
        $row = $this->Order_model->get_by_id($id);

        if ($row) {
            $this->Order_model->delete("order",$id);
            $this->Order_model->delete("order_detail",$id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pesanantamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pesanantamu'));
        }
    }  
}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-17 08:36:58 */
/* http://harviacode.com */