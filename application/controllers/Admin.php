<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    private $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model("Model_asisten");
    }

	public function index()
	{
        //$this->model_j->insertJadwal('2019-02-04',3,0,'KGV1',4);
		$this->load->view('home');
    }

    public function asisten()
	{
        //VIEW
        $this->data['asisten'] = $this->Model_asisten->getAll();
        $this->load->view('admin/asisten',$this->data);
    }

    public function asistenInput()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->Model_asisten->insertAsisten();
        }
        header("Location: http://localhost/web/jadwal_iklc/index.php/Admin/asisten");
        die();
    }

    public function lab()
	{
        //TODO
        $this->data['asisten'] = $this->Model_asisten->getAsisten();
        $this->data['matkul'] = $this->Model_asisten->getMatkul();
        $this->data['tabel_matkul'] = $this->Model_asisten->getAsislab();
        $this->load->view('Admin/lab',$this->data);
    }

    public function labInput()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->Model_asisten->insertAsislab();
        }
        header("Location: http://localhost/web/jadwal_iklc/index.php/Admin/lab");
        die();
    }

    public function test()
	{
        //VIEW
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
        

        $this->load->view('test',$this->data);
    }

    public function testInput()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->model_j->insertJadwal();
        }
        header("Location: http://localhost/web/jadwal_iklc/index.php/Admin/test");
        die();
    }
}
