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
/*
		$msg = '<html><body>';
		$msg .= '<b>Name:</b>'.$_POST['clientName'].'<br>';
		$msg .= '<b>Email</b>'.$_POST['clientEmail'].'<br>';
		$msg .= '<b>Website</b>'.$_POST['website'].'<br>';
		$msg .= '<b>Phone number</b>'.$_POST['phoneNumber'].'<br>';
		$msg .= '<b>Chat Integration</b>'.$chatInt.'<br>';
		$msg .= '<b>Chat Application used</b>'.$chatApp.'<br>';
		$msg .= '<b>Digital market</b>'.$digiMark.'<br>';
		$msg .= '</body></html>';
*/
		$msg = 'Name:'.$_POST['clientName'].'\r\n';
		$msg .= 'Email:'.$_POST['clientEmail'].'\r\n';
		$msg .= 'Website:'.$_POST['website'].'\n';
		$msg .= 'Phone number:'.$_POST['phoneNumber'].'\r\n';
		$msg .= 'Chat Integration:'.$chatInt.'\r\n';
		$msg .= 'Chat Application used:'.$chatApp.'\r\n';
		$msg .= 'Digital market:'.$digiMark.'\r\n';
/*
		$header = "MIME-Version 1.0"."\r\n";
		$header .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";	
*/		
		$header = '';
		$receiver ="alanyong@icloud.com,margarita@concert8.com,daryl@concert8.com,vera.jl1104@gmail.com,jim.paolo.castro@gmail.com,sidumali@yahoo.com";
				
		$subject = 'Survey answer '.$_POST['clientName'];

		$send = mail($receiver, $subject, $msg, $header);
		if(!$send){
			print_r(error_get_last());
			die('message not successful');
		}
	}

}

?>
