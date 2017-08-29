<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('render_user'))
{
    function render_user($view,$data=NULL)
    {
        $CI=& get_instance();
        $CI->layout->setLayout('/frontend_template/layout_view');

        $data['header_view'] = $CI->load->view('frontend_template/header_view',  $CI->data,TRUE);
        $data['footer_view'] = $CI->load->view('frontend_template/footer_view',  $CI->data,TRUE);
        $CI->layout->view($view,$data);
    }
}

if(!function_exists('render_admin'))
{
    function render_admin($view,$data=NULL)
    {
        $CI=& get_instance();
        $CI->layout->setLayout('/backend_template/layout_view');

        $data['header_view'] = $CI->load->view('backend_template/header_view',  $CI->data,TRUE);
        $data['footer_view'] = $CI->load->view('backend_template/footer_view',  $CI->data,TRUE);
        $CI->layout->view($view,$data);
    }
}

