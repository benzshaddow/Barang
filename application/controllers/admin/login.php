<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function index() {
    if( $this->session->userdata('isLoggedIn') ) {
        redirect('/main/show_main');
    } else {
        $this->show_login(false);
    }
}