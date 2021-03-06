<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Model Class
 * to provide basic query
 */
class M_merk extends CI_Model
{
    /**
     * The constructor of M_general 
     */
    function __construct()
    {
        parent::__construct();
    }

    function get_master_merk($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('id', $params['id']);
        if(!empty($params['nama']))
            $this->db->like('nama', $params['nama']);
        if(!empty($params['keterangan']))
            $this->db->like('keterangan', $params['keterangan']);
        if(!empty($params['created_at']))
            $this->db->like('created_at', $params['created_at']);
        if(!empty($params[' updated_at']))
            $this->db->like('updated_at', $params['updated_at']);

        $this->db->select('*');
        $this->db->from('merk');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function merk()
    {
        $buffer = array('' => '- pilih Merk-');

        // Select record
        $this->db->select('id, nama');
        $query = $this->db->get('merk')->result();

        foreach($query as $q) {
            $buffer[$q->id] = $q->nama;
        }

        return $buffer;
    }
}