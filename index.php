<?php

require('actions.php');
?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="assets/mystyle.css">
<div class="panel ">
    <div class="panel-body">
    	<img src='https://yourchatteam.com/wp-content/uploads/2018/05/yct-logo-new-167.png' >
    </div>
  </div>

<div class='container col-md-7 col-md-offset-2'>
	<div class='row form-group'>
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
		
		<hr>
		<div class='col-xs-12' id='head'>How well do you know your website?</div>
		<?php
		foreach($fields['question2'] as $key=>$val)
		{
			echo "<div class='col-xs-8'>";
			echo '<h4>'.$key.'</h4>';
			echo "<div class='form-check form-check-inline'>
			
				<input type='checkbox' class='form-check-input' name='".$val."' value='yes' id='".$val."'>
				<label class='form=check-label' for='".$val."'>Yes</label> ";
			
			echo "<input type='checkbox' name='".$val."' value='no' id='".$val."' class='form-check-input'>
					<label class='form-check-label' for='".$val."'>No</label>
			</div>";
			echo "</div>";
		}
		?>
		<div class='col-xs-4'>
			<input type='submit' value='Submit your answer' class='button-style' name='submit'>
		</div>
		</right>
	</form>
	</div>

</div>

<div id='success-modal'>
	<?php
		include('emailSuccess.php');
	?>

</div>


<script>
$("input:checkbox").on('click', function() {
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";    
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

$(document).ready(function(){

	var webParam = window.location.search.slice(1);
	if(webParam != null)
	{
		var splitParam = webParam.split('='); 
		var emailSuccess = splitParam[1];

		if(emailSuccess == 'success')
		{
			$("#success-modal").css("display","visible");
	 		// alert(emailSuccess);	
		}
		else{
			$("#success-modal").css("display","none");
		}
	}
	else
	{
		$("#success-modal").css("display","none");
	}

		$("#close").click(function(){ 
			$("#success-modal").css("display","none");
		});

});


 
</script>