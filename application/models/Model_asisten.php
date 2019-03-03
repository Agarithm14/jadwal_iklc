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
}
