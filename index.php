<?php

require('actions.php');
?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="assets/mystyle.css">
<div class="panel ">
    <div class="panel-body"><img src='https://yourchatteam.com/wp-content/uploads/2018/05/yct-logo-new-167.png' ></div>
  </div>
<div class='container'>
	<div class='raw'>
	<form action='' method="post">
		<?php

		$chatInt = 'Do you have a live chat app integrated with your website?';
		
		$chatApp = '(if Yes) Is your chat app service available 24/7?';
		$digiMarket = 'Are you using any form of digital marketing?';

		$fields = [	'question1' => ['Name' => ['name'=>'clientName',
												'type'=>'text',												
											],

									'Email'		=> ['name'=>'clientEmail',
													'type'=>'email',													
												],
									'Website'	=> ['name'=>'website',
													'type'=>'text',
													
												],
									'Phone Number'=> ['name'=>'phoneNumber',
														'type'=>'number',

													]
								],

					'question2' => [$chatInt => 'chatInt',
									$chatApp => 'chatApp',
									$digiMarket	=> 'digiMarket']
				];

		foreach($fields['question1'] as $key=>$val)
		{
			echo "<div class='form-group col-xs-6'>";
			echo "<input type='".$val['type']."' class='form-control' placeholder='".$key."' id='".$val['name']."' name='".$val['name']."'>";
			echo "</div>";
		}
		?>

		<h1><center>How well do you know your website?</center></h1>

		<?php
		foreach($fields['question2'] as $key=>$val)
		{
			echo "<div class='form-group col-xs-12'>";
			echo '<h4>'.$key.'</h4>';
			echo "<div class='radio'><label><input type='radio' name='".$val."' value='yes' id='".$val."'>Yes</label></div>";
			echo "<div class='radio' checked='checked'><label><input type='radio' name='".$val."' value='no' id='".$val."'>No</label></div>";
			echo "</div>";
		}
		?>
		
		<center><input type='submit' value='Submit your answer' class='button-style' name='submit'></center>
	</form>
</div>