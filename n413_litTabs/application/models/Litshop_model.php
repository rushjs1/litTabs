<?php
 defined("BASEPATH") OR exit("No direct script access allowed");

 class Litshop_model extends CI_model {
public function __construct(){
    parent::__construct();
     //this causes the database library to be autoloaded
        //loading of any other models would happen here
}
    public function get_litshop_items(){
        $sql = "SELECT * FROM `Products`";
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
     public function get_litshop_detail($id){
         $sql = "SELECT * FROM `Products` WHERE productId = '".$id."'";
         $query = $this->db->query($sql);
         return $query->row_array();

     }

     public function sendRegistrationToDataBase($password, $email){




         $sql = "INSERT INTO `Customers` (`customerId`, `email`, `password`, `role`) 
        	VALUES (NULL, '".$email."', '".$password."','2')";

         $result = $this->db->query($sql);




         if($result){

             $_SESSION["ourUser"] = $email;
         }else{
             echo "error";
         }
     }

     public function checkLogin($email, $password){



            $sql = "SELECT * FROM `Customers` WHERE email = '".$password."' AND password = '".$email."'";
         $query = $this->db->query($sql);
        // echo $query;
         $row = $query->row_array();
         if($row){
        //     session_destroy();

            // session_start();
             $_SESSION["ourUser"] = $password;

             if(isset($_SESSION["cart"])){
               unset($_SESSION["cart"]);
             }
             echo $row["email"];
         }else{
             echo "error";
         }
     }

     public function pushCart($id){
            //    echo $id;
                if(isset($_SESSION["cart"])){
                        $cart = $_SESSION["cart"];

                }else{
                    $cart = array();
                }
    //the cart works because the _SESSION is an associative array . Associative arrays are arrays that use a key for each index value as well.
         //in our case, we look into the array with if array_key_exists and if we find a match of the product id , then we simply add one to its value.
         // this is not adding one to the id number at its given index, rather its value pair that we have also set to be 1 upon the first time a customer has added a particular product id
         //if its already in the cart,
         if(array_key_exists($id, $cart)){
             $cart[$id] = $cart[$id] + 1;

         }else{
             $cart[$id] = 1;
         }
         $_SESSION["cart"] = $cart;

       //  var_dump($cart);

     }

     public function retrieveCart_items(){



      if(isset($_SESSION["cart"])){
           $cart = $_SESSION['cart'];
       }else{
          $cart = array();

      }



         $sql = "SELECT * FROM Products WHERE 0 ";
         foreach (array_keys($cart) as $id){

             $sql .= " OR productId=$id";

         }
         $query = $this->db->query($sql);
         if($query){
          //   echo "thers something";
         }else{
             "error";
         }

         return $query->result_array();

     }


     public function restartCart(){

         if(isset($_SESSION["cart"])){
            unset($_SESSION["cart"]);

         }


     }




 }