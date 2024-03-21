<?php

function sessionLogin()
{
	$CI =& get_instance();
	$userSess = $CI->session->userdata('loggedin');
	if (!$userSess) {
		$CI->session->sess_destroy();
		redirect(BASEURL.'login');
	}
}


function pre($data, $next = 0){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if(!$next){ exit; }
}

function produkStatus($stat){
  if ($stat == "0") {
    return "Publish";
  } else if ($stat == 1) {
    return "Hold";
  } else {
    return "Hide";
  }
}
function callSession($indexSes='')
{
	$CI =& get_instance();
	$return = $CI->session->userdata($indexSes);
	return $return;
}

function sizeProduct()
{
	$arraySize = array(1=>"S",2=>"M",3=>"L",4=>"5");
	return $arraySize;
}

function getProvinceOngkir() {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.biteship.com/v1/maps/areas?countries=ID&input='.$lokasi.'&type=single',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: '.APIKEYONGKIR.''
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function confirmBiteShipApi($orderId="") {

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.biteship.com/v1/orders/'.$orderId.'/confirm',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
      'Authorization: '.APIKEYBITESHIP.''
    ),
  ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

  curl_close($curl);


    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}


function userData($value='')
{
  $CI =& get_instance();
  return $CI->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$value));
}

function transChild($value='')
{
  $CI =& get_instance();
  return $CI->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product JOIN transaction_order_child toc ON pi.product_item_id=toc.product_item_id WHERE pi.kategori_item_product ="2" AND toc.transaction_id="'.$value.'" ');
}

function generateReferenceNumber(){
    $string = date('YmdH:i')."92308929082709240974029784207420720472094720626282754725781";
    $encryptedPaymentCode = hexdec(crc32($string));
    $returnValue = substr(str_shuffle(str_repeat($encryptedPaymentCode, 6)), 0, 6);
    return $returnValue;
}

function getProdItem($value='')
{
  $CI =& get_instance();
  $data = $CI->GlobalModel->queryManual('SELECT toc.price, toc.qty, toc.name, pi.sku_item_product FROM transaction_order_child toc JOIN product_item pi ON toc.product_item_id=pi.product_item_id WHERE toc.transaction_id="'.$value.'" ');
  return $data;
}

function getFeePayment($value='')
{
  $CI =& get_instance();
  return $CI->GlobalModel->getDataRow('payment_xendit',array('code_payment'=>$value));
}
?>