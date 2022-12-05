<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        error_reporting(0);
        $this->load->model('M_homedb');
        $this->load->library('Auth');
    }

    function index()
    {
        if(empty($_SESSION['account'])){
            $this->load->view('register_form');
            $this->load->view('login_modal_form');
        }else{
            $this->load->view('after_login_home');
        }
    }

    function registerAccount(){
        $this->M_homedb->registerAccount();
    }

    function login(){
        $this->M_homedb->login();
    }

    function loginOut(){
        session_unset();
        echo "<script>window.location.replace('".base_url()."');</script>";
    }

    function loadAllDetails(){
        $this->M_homedb->loadAllDetails();
    }

    function delAccount(){
        $this->M_homedb->delAccount();
    }

    function delDetails(){
        $this->M_homedb->delDetails();
    }

    function outputDetails(){
        $this->M_homedb->outputDetails();
    }

    function updateAccount(){
        $this->M_homedb->updateAccount();
    }

    function updateAccount2(){
        $this->M_homedb->updateAccount2();
    }
    
}
