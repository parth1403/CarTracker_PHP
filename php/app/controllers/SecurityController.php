<?php

class SecurityController extends Controller{
 
    public function checkLogin(){
        $returndata = new stdClass();
        $returndata->message = "Invalid user login attempt.";
        $returndata->success = false;
        echo json_encode($returndata);
    }
    
    
    public function login(){
        $returndata = new stdClass();
        $returndata->message = "Successfully user logged in.";
        $returndata->success = true;
        $returndata->data = array(
            'FirstName'=>"Parth",
            'LastName'=>"Suthar",
            'Username'=>"parth",
            'Roles'=>array(1, 2),
            'StaffID'=>1
        );
        echo json_encode($returndata);
    }
    
    public function logout(){
        $returndata = new stdClass();
        $returndata->message = "Successfully user logged out.";
        $returndata->success = false;
        echo json_encode($returndata);
    }
}