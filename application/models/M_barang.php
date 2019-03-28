<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Model Class
 * to provide basic query
 */
class M_barang extends CI_Model
{
    /**
     * The constructor of M_general 
     */
    function __construct()
    {
        parent::__construct();
    }

   function get_master_member($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('mm.id', $params['id']);
        if(!empty($params['name']))
            $this->db->like('name', $params['name']);
        if(!empty($params['harga']))
            $this->db->like('harga', $params['harga']);
        if(!empty($params['username']))
            $this->db->like('mm.username', $params['username']);
        if(!empty($params[' passwd']))
            $this->db->like('mm.passwd', $params['passwd']);

        $this->db->select('mm.id as mm_id, mm.name, mm.username, mm.passwd, mm.idcard_no, mm.attachment_id, mm.dept_id, mm.join_date, md.dept_name');
        $this->db->from('master_member mm');
        $this->db->join('master_department md', 'md.id = mm.dept_id');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function department()
    {
        $buffer = array('' => '- pilih Department-');

        // Select record
        $this->db->select('id, dept_name');
        $query = $this->db->get('master_department')->result();

        foreach($query as $q) {
            $buffer[$q->id] = $q->dept_name;
        }

        return $buffer;
    }

    function get_master_barang($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('b.id', $params['id']);
        if(!empty($params['kode_barang']))
            $this->db->like('kode_barang', $params['kode_barang']);
        if(!empty($params['name']))
            $this->db->like('name', $params['name']);
        if(!empty($params['harga']))
            $this->db->like('harga', $params['harga']);
        if(!empty($params['stock_masuk']))
            $this->db->like('stock_masuk', $params['stock_masuk']);
        if(!empty($params[' stock_keluar']))
            $this->db->like('stock_keluar', $params['stock_keluar']);
        if(!empty($params[' update_at']))
            $this->db->like('update_at', $params['update_at']);
        if(!empty($params[' created_at']))
            $this->db->like('created_at', $params['created_at']);

        $this->db->select('b.id as m_id, b.name as nama_barang, b.harga as harga,c.name as category_name, m.nama as nama_merk, stock_keluar, stock_masuk, b.created_at as barang_masuk_created, b.update_at as barang_masuk_updated_at, kode_barang, category_id, merk_id, product_id, p.nama as product_nama');
        $this->db->from('barang b');
        $this->db->join('category c','c.id= b.category_id');
        $this->db->join('merk m','m.id=b.merk_id');
        $this->db->join('product p','p.id=b.product_id');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function get_master_barang_masuk($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('m.id', $params['id']);
        if(!empty($params['kode_barang']))
            $this->db->like('kode_barang', $params['kode_barang']);
        if(!empty($params['supplier']))
            $this->db->like('supplier', $params['supplier']);
        if(!empty($params['jumlah']))
            $this->db->like('jumlah', $params['jumlah']);
        if(!empty($params['keterangan']))
            $this->db->like('keterangan', $params['keterangan']);
        if(!empty($params[' update_at']))
            $this->db->like('update_at', $params['update_at']);
        if(!empty($params[' created_at']))
            $this->db->like('created_at', $params['created_at']);

        $this->db->select('m.id as m_id,m.barang_id as barang_id, b.name as nama_barang,m.jumlah as jumlah ,m.supplier as supplier, m.keterangan as keterangan_barang,c.name as category_name,k.nama as nama_merk,p.nama as product,m.created_at as barang_masuk_created,m.update_at as barang_masuk_updated_at');
        $this->db->from('barang_masuk m');
        $this->db->join('barang b','b.id= m.barang_id');
        $this->db->join('category c', 'c.id= b.category_id');
        $this->db->join('merk k', 'k.id= b.merk_id');
        $this->db->join('product p', 'p.id= b.product_id');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function get_master_barang_keluar($params = array())
    {
        if(!empty($params['id']))
            $this->db->where('m.id', $params['id']);
        if(!empty($params['kode_barang']))
            $this->db->like('kode_barang', $params['kode_barang']);
        if(!empty($params['name']))
            $this->db->like('name', $params['name']);
        if(!empty($params['jumlah']))
            $this->db->like('jumlah', $params['jumlah']);
        if(!empty($params[' keterangan']))
            $this->db->like('keterangan', $params['keterangan']);
        if(!empty($params[' update_at']))
            $this->db->like('update_at', $params['update_at']);
        if(!empty($params[' created_at']))
            $this->db->like('created_at', $params['created_at']);

        $this->db->select('m.id as m_id,m.barang_id as barang_id, b.name as nama_barang,m.jumlah as jumlah, m.keterangan as keterangan_barang, c.name as category_name, k.nama as nama_merk, m.created_at as barang_masuk_created, m.update_at as barang_masuk_created_at');
        $this->db->from('barang_keluar m');
        $this->db->join('barang b','b.id= m.barang_id');
        $this->db->join('category c', 'c.id= b.category_id');
        $this->db->join('merk k', 'k.id= b.merk_id');
        $this->db->join('product p', 'p.id= b.product_id');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function validate_member() 
    {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get("users");

        if( $query->num_rows() == 1 )  {
            return true;
        }
    }

    function get_jumlah()
    {
        $this->db->select('b.id as b_id, bm.kode_barang as bm_kode_barang, bk.kode_barang as bk_kode_barang, bm.jumlah as bm_jumlah, bk.jumlah as bk_jumlah, b.jumlah as b_jumlah');
        $this->db->from('barang b');
        $this->db->join('barang_masuk bm','bm.kode_barang=b.kode_barang');
        $this->db>join('barang_keluar bk','bk.kode_barang=b.kode_barang');
        $query = $this->db->get()->row();
        return $query;
    }

    

    function barang()
    {
        $buffer = array('' => '- pilih Nama Barang -');

        // Select record
        $this->db->select('id, name');
        $query = $this->db->get('barang')->result();

        foreach($query as $q) {
            $buffer[$q->id] = $q->name;
        }

        return $buffer;
    }
}