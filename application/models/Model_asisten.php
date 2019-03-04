<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_asisten extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $sql = "CALL asisten_all2()" ;
        $query = $this->db->query($sql);
        
        return $query->result();
    }

    public function getAsislab()
    {
        $sql = "SELECT * FROM asislab ORDER BY nomor" ;
        $query = $this->db->query($sql);
        $result = $query->result();
        $matkul = array();
        foreach ($result as $row) {
            if (isset($matkul[$row->kode_matkul]))
                array_push($matkul[$row->kode_matkul],$row);
            else
                $matkul[$row->kode_matkul] = array($row);
        }
        return $matkul;
    }

    public function getMatkul()
    {
        $sql = 'SELECT * FROM matkul where (semester % 2) = 0' ;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAsisten()
    {
        $sql = 'SELECT * FROM asisten where 1 ORDER BY Kode' ;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function insertAsisten()
    {
        $data = array(
            'Kode' => $this->input->post('kode_asis'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'pass' => md5($this->input->post('pass')),
            'role' => 0,
        );
        //Cek tabrakan
        $query = $this->db->get_where('asisten',array('Kode' => $data['Kode']));
        if ($query->num_rows()) return false;
        else {
            $this->db->insert('asisten',$data);
            return true;
        }
    }

    public function insertAsislab()
    {
        $data = array(
            'id' => $this->input->post('kode_matkul').$this->input->post('nomor'),
            'kode_asisten' => $this->input->post('kode_asisten'),
            'kode_matkul' => $this->input->post('kode_matkul'),
            'nomor' => $this->input->post('nomor')
        );
        
        return $this->db->insert('asislab',$data);
    }
}
