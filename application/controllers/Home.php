<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home controller - realete with the main page
 *
 * This file is main controll of main page TIN project 
 * @author Suphanut Thanyaboon <suphanut@gmail.com>
 * @version 0.0.1
 *
 */

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}
	/**
 	 * index page show on default
     */
	public function index() {
		$data['title'] = "บันทึการเฝ้าเดี่ยวแห่งคริสตจักรพันธสัญญากรุงเทพ";

		$this->load->view('home',$data);
        
	}

       			
}
