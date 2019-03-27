<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is App Controller
*/
class Merk extends CI_Controller
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
			'm_merk'
		));
    }	

	function index() {
        // $this->acl->validate_read();
        $data = array();

        if($this->input->post('submit')) {
            unset($_POST['submit']);
            $data['records'] = $this->m_merk->get_master_merk($this->input->post());
            // die(var_dump($data['records']));
            echo $this->load->view('dashboard/merk/list_data', $data, TRUE);
            die();
        }

        $this->template->write_view('content', 'dashboard/merk/list', $data, true);
        $this->template->render();
    }

    function create() {
        // $this->acl->validate_create();

        if($this->input->post('submit')) {
            unset($_POST['submit']);

            $_POST['created_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($iflag, $imsg) = $this->m_general->insert('merk', $this->input->post());

            JSONRES($iflag, $imsg);
        }

        $data = array();
        echo $this->load->view('dashboard/merk/add', $data, TRUE);
        die();
    }

    function update($id) {
        // $this->acl->validate_update();

        if($this->input->post('submit')) {
            // Do Update
            unset($_POST['submit']);

            $_POST['updated_at'] = FORMAT_DATE_($this->input->post('date'));
            $date = DATE_FORMAT_('now', 'Y-m-d H:i:s');

            list($uflag, $umsg) = $this->m_general->update('merk', $this->input->post(), array('id' => $id));

            JSONRES($uflag, $umsg);
        }

        $data = array();
        $data['records'] = $this->m_merk->get_master_merk(array('id' => $id));
        echo $this->load->view('dashboard/merk/edit', $data, TRUE);
        die();
    }

    function delete($id) {
        // $this->acl->validate_delete();
        list($dflag, $dmsg) = $this->m_general->delete('merk', array('id' => $id));

        JSONRES($dflag, $dmsg);
    }
}