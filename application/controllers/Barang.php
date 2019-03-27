<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is App Controller
*/
class Barang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		// $this->template->write_view('navs', 'template/default_topnavs.php', true);
		// $this->template->set_template('webcring');
		LOAD_NAVBAR('Master Barang');

		$this->load->model(array (
			'm_general',
            'm_barang',
            'm_category',
            'm_merk',
            'm_product'
		));
	}	

	function index() {
        // $this->acl->validate_read();
        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        $data['product'] = $this->m_product->product();

        if($this->input->post('submit')) {
            unset($_POST['submit']);
            $data['records'] = $this->m_barang->get_master_barang($this->input->post());
            // die(var_dump($data['records']));
            echo $this->load->view('dashboard/barang/list_data', $data, TRUE);
            die();
        }

        $this->template->write_view('content', 'dashboard/barang/list', $data, true);
        $this->template->render();
    }

    function create() {
        // $this->acl->validate_create();

        if($this->input->post('submit')) {
            unset($_POST['submit']);

            $_POST['created_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($iflag, $imsg) = $this->m_general->insert('barang', $this->input->post());

            JSONRES($iflag, $imsg);
        }

        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        $data['product'] = $this->m_product->product();
        echo $this->load->view('dashboard/barang/add', $data, TRUE);
        die();
    }

    function update($id) {
        // $this->acl->validate_update();

        if($this->input->post('submit')) {
            // Do Update
            unset($_POST['submit']);

            $_POST['update_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($uflag, $umsg) = $this->m_general->update('barang', $this->input->post(), array('id' => $id));

            JSONRES($uflag, $umsg);
        }

        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        $data['product'] = $this->m_product->product();
        $data['records'] = $this->m_barang->get_master_barang(array('id' => $id));
        echo $this->load->view('dashboard/barang/edit', $data, TRUE);
        die();
    }

    function delete($id) {
        // $this->acl->validate_delete();
        list($dflag, $dmsg) = $this->m_general->delete('barang', array('id' => $id));

        JSONRES($dflag, $dmsg);
    }

    function barang_masuk() {
        // $this->acl->validate_read();
        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();

        if($this->input->post('submit')) {
            unset($_POST['submit']);
            $data['records'] = $this->m_barang->get_master_barang_masuk($this->input->post());
            // die(var_dump($data['records']));
            echo $this->load->view('dashboard/barang_masuk/list_data', $data, TRUE);
            die();
        }

        $this->template->write_view('content', 'dashboard/barang_masuk/list', $data, true);
        $this->template->render();
    }

    function create_barang_masuk() {
        // $this->acl->validate_create();

        if($this->input->post('submit')) {
            unset($_POST['submit']);

            $_POST['created_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($iflag, $imsg) = $this->m_general->insert('barang_masuk', $this->input->post());
        
            JSONRES($iflag, $imsg);
        }

        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        echo $this->load->view('dashboard/barang_masuk/add', $data, TRUE);
        die();
    }

    function update_barang_masuk($id) {
        // $this->acl->validate_update();

        if($this->input->post('submit')) {
            // Do Update
            unset($_POST['submit']);

            $_POST['update_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($uflag, $umsg) = $this->m_general->update('barang_masuk', $this->input->post(), array('id' => $id));

            JSONRES($uflag, $umsg);
        }

        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        $data['records'] = $this->m_barang->get_master_barang_masuk(array('id' => $id));
        echo $this->load->view('dashboard/barang_masuk/edit', $data, TRUE);
        die();
    }

    function delete_barang_masuk($id) {
        // $this->acl->validate_delete();
        list($dflag, $dmsg) = $this->m_general->delete('barang_masuk', array('id' => $id));

        JSONRES($dflag, $dmsg);
    }

    function barang_keluar() {
        // $this->acl->validate_read();
        $data = array();

        if($this->input->post('submit')) {
            unset($_POST['submit']);
            $data['records'] = $this->m_barang->get_master_barang_keluar($this->input->post());
            // die(var_dump($data['records']));
            echo $this->load->view('dashboard/barang_keluar/list_data', $data, TRUE);
            die();
        }

        $this->template->write_view('content', 'dashboard/barang_keluar/list', $data, true);
        $this->template->render();
    }

    function create_barang_keluar() {
        // $this->acl->validate_create();

        if($this->input->post('submit')) {
            unset($_POST['submit']);

            $_POST['created_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($iflag, $imsg) = $this->m_general->insert('barang_keluar', $this->input->post());
            
            JSONRES($iflag, $imsg);
        }

        $data = array();
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        echo $this->load->view('dashboard/barang_keluar/add', $data, TRUE);
        die();
    }

    function update_barang_keluar($id) {
        // $this->acl->validate_update();

        if($this->input->post('submit')) {
            // Do Update
            unset($_POST['submit']);

            $_POST['update_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($uflag, $umsg) = $this->m_general->update('barang_keluar', $this->input->post(), array('id' => $id));

            JSONRES($uflag, $umsg);
        }

        $data = array();
        $data['records'] = $this->m_barang->get_master_barang_keluar(array('id' => $id));
        $data['category'] = $this->m_category->category();
        $data['merk'] = $this->m_merk->merk();
        echo $this->load->view('dashboard/barang_keluar/edit', $data, TRUE);
        die();
    }

    function delete_barang_keluar($id) {
        // $this->acl->validate_delete();
        list($dflag, $dmsg) = $this->m_general->delete('barang_keluar', array('id' => $id));

        JSONRES($dflag, $dmsg);
    }
}