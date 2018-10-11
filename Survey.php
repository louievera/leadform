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

		$msg = 'Name:'.$_POST['clientName']."\r\n";
		$msg .= 'Email:'.$_POST['clientEmail'] 	."\r\n";
		$msg .= 'Website:'.$_POST['website']."\r\n";
		$msg .= 'Phone number:'.$_POST['phoneNumber']."\r\n";
		$msg .= 'Chat Integration:'.$chatInt."\r\n";
		$msg .= 'Chat Application used:'.$chatApp."\r\n";
		$msg .= 'Digital market:'.$digiMark."\r\n";

		$receiver ="alanyong@icloud.com,margarita@concert8.com,daryl@concert8.com,jim.paolo.castro@gmail.com,sidumali@yahoo.com";
				
		$subject = 'Survey answer '.$_POST['clientName'];

		$send = mail($receiver, $subject, $msg);

	}
}

?>
