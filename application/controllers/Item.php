<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	 
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m','category_m', 'unit_m']);

    }
    function get_ajax() {
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nomerurut;
            $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = $item->model;
            $row[] = $item->keterangan;
            $row[] = indo_currency($item->price);
            $row[] = $item->tanggal_pengadaan;
            // $row[] = indo_currency($item->purchase_price);
            // $row[] = indo_currency($item->profit);
            $row[] = $item->image != null ? '<img src="'.base_url('uploads/product/'.$item->image).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$this->template->load('template', 'product/item/item_data');
	}
	

	public function add()
	{
        $get_last_item = $this->db->order_by('nomerurut', 'desc')->limit(1)->get('p_item')->row_array();

        $item = new stdClass();

        if($get_last_item == null) {
            $item->nomerurut = 'SCIBDG-0001';
        } else {
            $nomerurut = explode('-', $get_last_item['nomerurut']);
            $nomer = (int)$nomerurut[1] + 1;
            $stringnomerlenght = strlen("$nomer");
            $stringnomer = '0000';
            $nomerurut = $nomerurut[0] . '-' . substr_replace($stringnomer, $nomer, strlen($stringnomer) - $stringnomerlenght);
            $item->nomerurut = $nomerurut;
        }


		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
        $item->price = null;
        // $item->purchase_price = null;
        // $item->profit = null;
		$item->unit = null;
        $item->tanggal_pengadaan = null;
        $item->merk = null;
        $item->model = null;
        $item->keterangan = null;
       
     
        $query_category = $this->category_m->get();
        $query_unit = $this->unit_m->get();
		$data = array(
			'page' => 'add',
            'row'	=> $item,
            'category' => $query_category,

		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit($id)
	{
		$query =$this->item_m->get($id);
		if($query->num_rows()> 0 ){
			$item = $query->row();

            $data = array(
                'page' => 'edit',
                'row'	=> $item,
    
            );
            $this->template->load('template', 'product/item/item_form', $data);
		}else {
			echo"<script>alert('Data Tidak ditemukan'); ";
			echo"window.location='".site_url('item')."'; </script>";
		}
	}

	public function process()
	{
        $config['upload_path']         = './uploads/product/';
        $config['allowed_types']       = 'gif|jpg|png|jpeg';
        $config['max_size']            = 2048;
        $config['file_name']            = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

		$post =$this->input->post(null, TRUE);  
		if(isset($_POST['add'])){
            if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/add');
            } else {

                if(@$_FILES['image']['name'] != null){
                    if($this->upload->do_upload('image')){
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        } 
                        redirect('item');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                }else{
					$post['image'] = null;
                    $this->item_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    } 
                    redirect('item');
                }
            }
		}else if(isset($_POST['edit'])){
            if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/edit/'.$post['id']);
            } else {
                if(@$_FILES['image']['name'] != null){
                    if($this->upload->do_upload('image')){

                        $item = $this->item_m->get($post['id'])->row();
                        if($item->image != null) {
                            $target_file= './uploads/product/'.$item->image;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        } 
                        redirect('item');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                }else{
                    $post['image'] = null;
                    $this->item_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    } 
                    redirect('item');
                }
                
            }
		}
        
	}

	public function del($id)
	{

        $item = $this->item_m->get($id)->row();
        if($item->image != null) {
            $target_file= './uploads/product/'.$item->image;
            unlink($target_file);
        }

		$this->item_m->del($id);
		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');
    }
    function barcode_qrcode($id){
        $data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
    }
    function barcode_print($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $html= $this->load->view('product/item/barcode_print', $data, true);
        $this->fungsi->PdfGenerator ($html,'barcode-'.$data['row']->barcode,'A4','landscape');
    }

    function qrcode_print($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $html= $this->load->view('product/item/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator ($html,'qrcode-'.$data['row']->barcode,'A4','landscape');
    }
}
