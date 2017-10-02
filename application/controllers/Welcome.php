<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	//Select product id
	public function select_product_id(){
		$data = array(
	        'id'      => $this->input->post('select_product_id'),
	        'qty'     => $this->input->post('qnty'),
	        'price'   => $this->input->post('price'),
	        'name'    => 'T-Shirt',
	        'coupon'  => 'XMAS-50OFF'
		);

		$this->cart->insert($data);
		redirect('Welcome');
	}

	//Update your cart
	public function update_cart(){

		$inputs = $this->input->post();
		
		// $data = array();
		// for ($i=1; $i<sizeof($inputs); $i++)
		// {
	 //        $data[$i] = array(
  //               'rowid' => $inputs[$i]['rowid'],
  //               'qty'   => $inputs[$i]['qty'],
	 //        );
		// }

		$this->cart->update($inputs);
		redirect('Welcome');
	}

	//Delete your cart
	public function delete_cart($rowid){
		$this->cart->remove($rowid);
		redirect('Welcome');
	}
	//Delete your cart
	public function clear_cart(){
		$this->cart->destroy();
		redirect('Welcome');
	}
}
