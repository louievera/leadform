<?php
ini_set('display_errors',1);
ini_set('SMTP','smtp.google.com');
ini_set('smtp_port',25);
error_reporting(E_ALL);
class Survey
{
	public function __construct()
	{
		require('DB.php');
		$this->db = new DB;
	}

	
	public function insertSurvey()
	{	
		$digiMark = empty($_POST['digiMarket']) ? 'no' : $_POST['digiMarket'];
		$chatInt = empty($_POST['chatInt']) ? 'no' : $_POST['chatInt'];
		$chatApp = empty($_POST['chatApp']) ? 'no' : $_POST['chatApp'];

		$data = ['name' 			=> $_POST['clientName'],
				 'email' 			=> $_POST['clientEmail'],
				 'website' 			=> $_POST['website'],
				 'phone' 			=> $_POST['phoneNumber'],
				 'digital_market'	=> $digiMark,
				 'chat_integration' => $chatInt,
				 'chat_app'			=> $chatApp

				];
		if(!empty($_POST))
		{
			$this->db->insert('survey',$data);
		}		
	}

	public function sendMail()
	{
		$digiMark = empty($_POST['digiMarket']) ? 'no' : $_POST['digiMarket'];
		$chatInt = empty($_POST['chatInt']) ? 'no' : $_POST['chatInt'];
		$chatApp = empty($_POST['chatApp']) ? 'no' : $_POST['chatApp'];

		$msg = '<b>Name:</b>'.$_POST['clientName'].'<br>';
		$msg .= '<b>Email</b>'.$_POST['clientEmail'].'<br>';
		$msg .= '<b>Website</b>'.$_POST['website'].'<br>';
		$msg .= '<b>Phone number</b>'.$_POST['phoneNumber'].'<br>';
		$msg .= '<b>Chat Integration</b>'.$chatInt.'<br>';
		$msg .= '<b>Chat Application used</b>'.$chatApp.'<br>';
		$msg .= '<b>Digital market</b>'.$digiMark.'<br>';

		$header = "MIME-Version 1.0"."\r\n";
		$header .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		// $receiver = "alanyong@icloud.com,margarita@concert8.com,daryl@concert8.com";
		$receiver = "vera.jl1104@gmail.com";
		
		$subject = 'Survey answer '.$_POST['clientName'];

		$send = mail($receiver, $subject, $msg, $header);
		if(!$send){
			print_r(error_get_last());
			die('message not successful');
		}
	}

}

?>
