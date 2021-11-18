<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-YsCOcwue1ww_EIOXFrjUS40A', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('histori_model', 'histori');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{

		$namalengkap = $this->input->post('namalengkap');
		$emailcustomer = $this->input->post('emailcustomer');
		$notelp = $this->input->post('notelp');
		$namaevents = $this->input->post('namaevents');
		$hargaevents = $this->input->post('hargaevents');
		$quantityevents = $this->input->post('quantityevents');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $hargaevents, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $hargaevents,
			'quantity' => $quantityevents,
			'name' => $namaevents
		);


		// Optional
		$item_details = array($item1_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		// $shipping_address = array(
		// 	'first_name'    => "Obet",
		// 	'last_name'     => "Supriadi",
		// 	'address'       => "Manggis 90",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16601",
		// 	'phone'         => "08113366345",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $namalengkap,
			'email'         => $emailcustomer,
			'phone'         => $notelp,
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'hour',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), TRUE);
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// die;
		// echo '</pre>';
		$namalengkap = $this->input->post('namalengkap', true);
		$emailcustomer = $this->input->post('emailcustomer', true);
		$notelp = $this->input->post('notelp', true);
		$data_event = $this->input->post('idevents', true);
		$nama_sales = $this->input->post('nama_sales', true);
		$nama_event = $this->input->post('nama_event', true);
		$price = $this->input->post('price', true);

		$data = [
			'nama_customer' => $namalengkap,
			'email_customer' => $emailcustomer,
			'no_telp' => $notelp,
			'nama_sales' => $nama_sales,
			'nama_event' => $nama_event,
			'price' => $price,
			'order_id' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]["bank"],
			'va_number' => $result['va_numbers'][0]["va_number"],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code']
		];

		$simpan = $this->histori->save($data);
		if ($simpan) {
			redirect('event/success_message');
		} else {
			redirect('event/gagal_message');
		}
	}
}
