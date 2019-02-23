<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jadwal extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getFromDate($date)
    {
        $sql = "CALL jadwal_home('$date')";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            echo $row->kode_matkul . ' ';
            echo $row->nomor . ' ';
            echo $row->nama_ruangan . ' ';
            echo '<br>';
        }
    }

    public function getFromDateRuang($date,$ruang)
    {
        $sql = "CALL jadwal_ruang('$date',$ruang)";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row)
        {
            echo $row->kode_matkul . ' ';
            echo $row->nomor . ' ';
            echo $row->nama_ruangan . ' ';
            echo '<br>';
        }
    }

	public function getAll()
	{
		
    }

    public function getWaktu()
    {
        $sql = "SELECT waktu as indeks,DATE_FORMAT(jam_awal, '%H:%i') jam FROM blok_waktu ORDER BY waktu";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getGroup()
    {
        $sql = "SELECT * FROM grup_lab ORDER BY kode_matkul,nomor";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getRuang()
    {
        $sql = "SELECT * FROM ruangan ORDER BY no_ruangan";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function insertJadwal()
    {
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'tipe' => $this->input->post('tipe'),
            'id_grup' => $this->input->post('id_grup'),
            'ruangan' => $this->input->post('ruang'),
        );
        //Cek tabrakan
        $query = $this->db->get_where('jadwal_lab',$data);
        if ($query->num_rows()) return false;
        else {
            $this->db->insert('jadwal_lab',$data);
            return true;
        }
    }
}
