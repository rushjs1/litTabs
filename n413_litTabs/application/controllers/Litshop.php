<?php 
defined('BASEPATH') OR exit("No direct script access allowed");

class LitShop extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model("litshop_model");
        $this->load->library("session");
        $this->load->helper('url');
    }
    public function index(){
        $data['page_title'] = "The Giving Moon || Official Tab Store";
        $data['this_page'] = "shop";
        $data['records'] = $this->litshop_model->get_litshop_items();
        
        $this->load->view('templates/head', $data);
        $this->load->view('shop', $data);

    }
    public function cart(){
        $data['page_title'] = "Cart || Official Tab Store";
        $data['this_page'] = 'cart';
        $method = 'cart';
        $this->load->view("templates/head", $data);
        $this->load->view("cart", $data);
    }

    public function login(){
        $data['page_title'] = "Login || Official Tab Store";
        $data['this_page'] = 'login';
        $method = 'home';
        $this->load->view("templates/head", $data);
        $this->load->view("login", $data);
    }

    public function register(){
        $data['page_title'] = "Register || Official Tab Store";
        $data['this_page'] = 'register';
        $method = 'home';
        $this->load->view("templates/head", $data);
        $this->load->view("register", $data);

    }





    public function detail($id){
        $detail =  $this->litshop_model->get_litshop_detail($id);
        $data["page_title"] = "AMP JAMS | ".$detail["productName"];
        $data["this_page"] = "detail";
        $data["row"] = $detail;
        $this->load->view('templates/head', $data);
        $this->load->view('detail', $data);
    }

    public function getInfo(){

/*
            echo $_POST["name"];
        echo $_POST["email"];
        echo $_POST["comment"];*/

            if (isset($_POST["email"])){

                $email = trim($_POST["email"]);
            }
        if (isset($_POST["password"])){

            $password = trim($_POST["password"]);
        }


        $data['userRecords'] = $this->litshop_model->checkLogin($password, $email);

        $data['page_title'] = "success || Official Tab Store";
        $data['this_page'] = 'success';
        $this->load->view('templates/head', $data);
        $this->load->view("success", $data);

    }

    public function registerUser(){

        if (isset($_POST["email"])){

            $email = trim($_POST["email"]);
        }
        if (isset($_POST["password"])){

            $password = trim($_POST["password"]);
        }

        $this->litshop_model->sendRegistrationToDataBase($password, $email);

        $data['page_title'] = "Success || Official Tab Store";
        $data['this_page'] = 'success';

        $this->load->view('templates/head', $data);
        $this->load->view("success", $data);

    }

    public function logout(){


        if(isset($_SESSION["ourUser"])){
           unset($_SESSION["ourUser"]);
        }
        session_destroy();
          $this->index();

    }

    public function getCart(){


        $data["records"] = $this->litshop_model->retrieveCart_items();

        $this->load->view('templates/head', $data);
        $this->load->view('cart', $data);
    }

    public function addToCart($id){


         $data["item"] = $this->litshop_model->pushCart($id);
        $this->getCart();

    }

    public function clearCart(){
          $this->litshop_model->restartCart();
          $this->getCart();

    }
    public function checkout(){
        $this->load->view('templates/head');
        $this->load->view('my_stripe');


    }

    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        \Stripe\Charge::create (["amount" => 100 * 100, "currency" => "usd", "source" => $this->input->post('stripeToken'), "description" => "Test payment from itsolutionstuff.com."]);

        $this->session->set_flashdata('success', 'Payment made successfully.');

        redirect('/my-stripe', 'refresh');
    }

    public function confirmation(){

        $data['page_title'] = "Confirmation || Official Tab Store";
        $data['this_page'] = 'confirmation';

        $this->load->view('templates/head', $data);
        $this->load->view("confirmation", $data);

    }



}