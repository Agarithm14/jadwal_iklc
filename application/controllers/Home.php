<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $data = array();
	public function index()
	{
        //$this->model_j->insertJadwal('2019-02-04',3,0,'KGV1',4);
		$this->model_j->getFromDate('2019-02-04');
    }

    public function test()
	{
        $this->viewJadwal();
        $this->inputJadwal();
        $this->load->view('test',$this->data);
    }

    function inputJadwal()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->model_j->insertJadwal();
        }
    }

    function viewJadwal()
    {
        /*
            Data dalam 3 dimensi array
            jadwal[ruang][hari][waktu]
        */

        $ruangArr = array();
        //hari dalam time
        $minggu = array(
            "monday",
            "tuesday",
            "wednesday",
            "thursday",
            "friday"
        );
        for ($i=0;$i<8;$i++)
        {
            $hariArr = array();
            foreach($minggu as $hari)
            {
                $tgl = date( 'Y-m-d', strtotime( $hari.' this week' ));
                $data = $this->model_j->getFromDateRuang($tgl,$i);
                array_push($hariArr,$data);
            }
            array_push($ruangArr,$hariArr);
        }
        $this->data['jadwal'] = $ruangArr;
        
		$this->data['waktu'] = $this->model_j->getWaktu();
		$this->data['grup'] = $this->model_j->getGroup();
        $this->data['ruang'] = $this->model_j->getRuang();

        $this->data['nama_ruangan'] = array();
        foreach ($this->data['ruang'] as $nama ) {
            array_push($this->data['nama_ruangan'],$nama->nama_ruangan);
        }
    }
}
