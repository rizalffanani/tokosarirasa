<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'Slider', );
        $this->template->load('template','admin/slider/slider_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Slider_model->json();
    }

    public function read($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id_slider' => $row->id_slider,
            'title' => $row->judul,
    		'judul' => $row->judul,
    		'deskripsi' => $row->deskripsi,
    		'images' => $row->images,
    	    );
            $this->template->load('template','admin/slider/slider_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/slider/create_action'),
    	    'id_slider' => set_value('id_slider'),
    	    'judul' => set_value('judul'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'images' => set_value('images'),
    	);
        $this->template->load('template','admin/slider/slider_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->upload();
            if (!$this->upload->do_upload('images')){
                $fot = 'bg_pickme.jpeg';
            }
            else{
                $fot = $this->upload->file_name;
            }
            $data = array(
        		'judul' => $this->input->post('judul',TRUE),
        		'deskripsi' => $this->input->post('deskripsi',TRUE),
        		'images' => $fot,
    	    );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/slider'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/slider/update_action'),
        		'id_slider' => set_value('id_slider', $row->id_slider),
        		'judul' => set_value('judul', $row->judul),
        		'deskripsi' => set_value('deskripsi', $row->deskripsi),
        		'images' => set_value('images', $row->images),
        	    );
            $this->template->load('template','admin/slider/slider_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/slider'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_slider', TRUE));
        } else {
            $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
            );
            $this->upload();
            if ($this->upload->do_upload('images')){
                $data['images'] = $this->upload->file_name;
            }

            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/slider'));
        }
    }

    public function upload()
    {
        $config = array(
            'upload_path' => 'gambar/slider',
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => rand(10,1000).'file_'.date('dmYHis'),
            'overwrite' => FALSE,
            'max_size' => 2048,   
            'file_ext_tolower' => TRUE,    
            'max_filename' => 0,
            'remove_spaces' => TRUE             
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }
    
    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	// $this->form_validation->set_rules('images', 'images', 'trim|required');

	$this->form_validation->set_rules('id_slider', 'id_slider', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-06 12:05:33 */
/* http://harviacode.com */