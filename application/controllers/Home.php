<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        //$this->model_j->insertJadwal('2019-02-04',3,0,'KGV1',4);
		$this->model_j->getFromDate('2019-02-04');
    }
    
    public function test()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->model_j->insertJadwal();
        }
		$data['waktu'] = $this->model_j->getWaktu();
		$data['grup'] = $this->model_j->getGroup();
        $data['ruang'] = $this->model_j->getRuang();
        $this->load->view('form',$data);
    }
}
