<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listmenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Listmenu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'listmenu');
        $this->template->load('template','admin/listmenu/listmenu_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Listmenu_model->json();
    }

    public function read($id) 
    {
        $row = $this->Listmenu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_menu' => $row->id_menu,
		'nama_menu' => $row->nama_menu,
		'harga' => $row->harga,
		'id_kategori' => $row->id_kategori,
		'deskripsi_menu' => $row->deskripsi_menu,
		'foto_menu' => $row->foto_menu,
		'status' => $row->status,
	    );
            $this->template->load('template','admin/listmenu/listmenu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/listmenu'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/listmenu/create_action'),
	    'id_menu' => set_value('id_menu'),
	    'nama_menu' => set_value('nama_menu'),
	    'harga' => set_value('harga'),
	    'id_kategori' => set_value('id_kategori'),
	    'deskripsi_menu' => set_value('deskripsi_menu'),
	    'foto_menu' => set_value('foto_menu'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','admin/listmenu/listmenu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config = array(
                'upload_path' => 'gambar',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'file_name' => rand(10,1000).'file_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2048,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_menu')){
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'deskripsi_menu' => $this->input->post('deskripsi_menu',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'foto_menu' => 'default.png'
                );
            }
            else{
                $fot = $this->upload->file_name;
                    $data = array(
                    'nama_menu' => $this->input->post('nama_menu',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'deskripsi_menu' => $this->input->post('deskripsi_menu',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'foto_menu' => $fot
                ); 
            }

            $this->Listmenu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/listmenu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Listmenu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/listmenu/update_action'),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'nama_menu' => set_value('nama_menu', $row->nama_menu),
		'harga' => set_value('harga', $row->harga),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'deskripsi_menu' => set_value('deskripsi_menu', $row->deskripsi_menu),
		'foto_menu' => set_value('foto_menu', $row->foto_menu),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','admin/listmenu/listmenu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/listmenu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu', TRUE));
        } else {
            $config = array(
                'upload_path' => 'gambar',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'file_name' => rand(10,1000).'file_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2048,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_menu')){
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'deskripsi_menu' => $this->input->post('deskripsi_menu',TRUE),
                    'status' => $this->input->post('status',TRUE)
                );
            }
            else{
                $fot = $this->upload->file_name;
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'deskripsi_menu' => $this->input->post('deskripsi_menu',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'foto_menu' => $fot
                ); 
            }

            $this->Listmenu_model->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/listmenu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Listmenu_model->get_by_id($id);

        if ($row) {
            $this->Listmenu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/listmenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/listmenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	// $this->form_validation->set_rules('deskripsi_menu', 'deskripsi menu', 'trim|required');
	// $this->form_validation->set_rules('foto_menu', 'foto menu', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Listmenu.php */
/* Location: ./application/controllers/Listmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-12 05:21:17 */
/* http://harviacode.com */