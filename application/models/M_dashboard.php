<?php
class M_dashboard extends CI_Model{
 
    function get_data_stok(){
        // $query = $this->db->query("SELECT merk,SUM(stok) AS stok FROM barang GROUP BY merk");

        $this->db->select('b.id as m_id, b.name as nama_barang, b.harga as harga,c.name as category_name, m.nama as nama_merk, stock_keluar, stock_masuk, b.created_at as barang_masuk_created, b.update_at as barang_masuk_updated_at, kode_barang, category_id, merk_id, satuan_id, p.nama as product_nama');
        $this->db->from('barang b');
        $this->db->join('category c','c.id= b.category_id');
        $this->db->join('merk m','m.id=b.merk_id');
        $this->db->join('satuan p','p.id=b.satuan_id');
        $query = $this->db->get();

        // die(var_dump($query->num_rows()));
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}