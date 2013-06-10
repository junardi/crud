<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uri extends CI_Controller {
	
	function index() {
		
		echo "Hello I am the index";
		
	}
	
	function shoes($sandals){
        echo $sandals;
    }
	
}