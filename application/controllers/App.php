<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is App Controller
*/
class App extends CI_Controller
{ 

    function __construct()
    {
        parent::__construct();
        // $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
        // $this->template->write_view('navs', 'template/default_topnavs.php', true);
        // $this->template->set_template('webcring');
        $this->load->model(array (
            'm_barang'
        ));
        $this->load->model(array (
            'm_dashboard'
        ));
        $this->load->library('session');
    }   

    function index() {
        //take them back to signin
        $session = $this->session->userdata('user_info');
        if(empty($session)){            
            redirect(base_url('app/login'),'refresh');
        }
        $this->dashboard();
    }

    function simple_template() {
        //take them back to signin
        $session = $this->session->userdata('user_info');
        if(empty($session)){            
            redirect(base_url('app/login'),'refresh');
        }
        $this->template->set_template('default');
        $this->template->write('header', 'This is Header');
        $this->template->write('title', 'My Simple Template', TRUE);
        $this->template->write_view('content', 'tes/mypage', '', true);

        $this->template->render();
    }

    function dashboard() {
        //take them back to signin
        $session = $this->session->userdata('user_info');
        if(empty($session)){            
            redirect(base_url('app/login'),'refresh');
        }
        LOAD_NAVBAR('Dashboard');

        $data['barang']=$this->m_dashboard->get_data_stok();
        $data['masuk'] = $this->m_barang->get_master_barang_masuk($this->input->post());
        $data['keluar'] = $this->m_barang->get_master_barang_keluar($this->input->post());
        // $this->load->view('tes/dashboards',$x);

        $this->template->write_view('content', 'tes/dashboard', $data, true);

        $this->template->render();
    }

    function form_ex() {
        LOAD_NAVBAR('Form Example');
        $this->template->write('header', 'This is Header', true);
        $this->template->write_view('content', 'tes/form', '', true);

        $this->template->render();
    }

    function table_ex() {
        LOAD_NAVBAR('Table Example');
        $this->template->write('header', 'Table <small>Some examples</small>', true);
        $this->template->write_view('content', 'tes/table', '', true);

        $this->template->render();

    }
    function table_dyn_ex() {
        LOAD_NAVBAR('Table Dynamics Example');
        $this->template->write('header', 'Table Dynamics <small>Some examples</small>', true);
        $this->template->write_view('content', 'tes/table_dynamic', '', true);

        $this->template->render();

    }

    function login ()
    {
        $this->session->sess_destroy();
    	$this->template->set_template('simple');
        $this->template->write('header', 'Table Dynamics <small>Some examples</small>', true);  
        $this->template->write_view('content', 'app/login', '', true);

        $this->template->render();
    }

    function akses_login()
    {
        $submit = $this->input->post('submit');
        $this->load->library('session');
        if($submit)
        {
            //encryp password to md5
            $password = md5($this->input->post('password'));
            $login_data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            
            //lookup user
            $user_data = $this->m_barang->validate_member($login_data);
            
            if (!empty($user_data)) {
                //set session value
                $this->session->set_userdata('user_info', '$user_data');
                $session = $this->session->userdata('user_info');
                if($session){
                    $addon = array('redirect' => base_url(''));
                    JSONRES(_SUCCESS, lang('LoginSuccess'), $addon);
                }else {
                    $addon = array('redirect' => base_url('app/login'),'refresh');
                    JSONRES(_SUCCESS, lang('LoginFailed'), $addon);
                }     
            }else{
                $addon = array('redirect' => base_url('app/login'),'refresh');
                JSONRES(_SUCCESS, lang('LoginFailed'), $addon);
            }
        }
    }
}