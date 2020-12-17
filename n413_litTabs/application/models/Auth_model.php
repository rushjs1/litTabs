(models/Auth_model.php)
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        //this causes the database library to be autoloaded
        //loading of any other models would happen here
    }

    public function authenticate($credentials){
        return true;
    }
}