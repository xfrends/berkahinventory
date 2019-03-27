<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Model Class
 * to provide basic query
 */
class M_category extends CI_Model
{
    /**
     * The constructor of M_general 
     */
    function __construct()
    {
        parent::__construct();
    }

    function get_master_category($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('id', $params['id']);
        if(!empty($params['name']))
            $this->db->like('name', $params['name']);
        if(!empty($params['keterangan']))
            $this->db->like('keterangan', $params['keterangan']);
        if(!empty($params['created_at']))
            $this->db->like('created_at', $params['created_at']);
        if(!empty($params[' updated_at']))
            $this->db->like('updated_at', $params['updated_at']);

        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function category()
    {
        $buffer = array('' => '- pilih Category-');

        // Select record
        $this->db->select('id, name');
        $query = $this->db->get('category')->result();

        foreach($query as $q) {
            $buffer[$q->id] = $q->name;
        }

        return $buffer;
    }
}