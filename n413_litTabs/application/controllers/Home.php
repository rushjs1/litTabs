<?php
defined("BASEPATH") OR exit("NO Direct script access ALlowed");

class Home extends CI_Controller{
    public function __construct(){
        parent:: __construct();

    }
    public function index(){
        $data['page_title'] = "HOME - The Giving Moon";
        $data['this_page'] = 'home';
        $this->load->view("templates/head", $data);
        $this->load->view("home", $data);

    }
}