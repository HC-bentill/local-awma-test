<html>

<head>
	<title>REVENUE MANAGEMENT SYSTEM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ayawaso</title>

	<!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<?php if($result->product_id == 12 || $result->product_id == 13){?>

	<?php }else if($result->product_id == 1){?>
		<style type="text/css">
			.vee{
				font-family:'Times New Roman', Times, serif;
				font-weight: 900;
				font-size: 15px;
				display:inline-flex;
			}
		</style>
	<?php }?>
</head>

<body>

	<?php
		$arrears_paid = get_invoice_arrears($result->property_id,$result->product_id,$result->invoice_year);
		$get_last_year_arrears_payment = get_last_year_arrears_payment($result->property_id,$result->product_id,2020);
		$actual_arrears = $arrears_paid['invoice_amount'] - $arrears_paid['amount_paid'];
		$invoice_amount = $result->invoice_amount;
		$penalty_amount = $result->penalty_amount;
		$discount_amount = $result->adjustment_amount;
		$amount_paid = $result->amount_paid;
		$total_amount = $invoice_amount + $penalty_amount + $actual_arrears - $amount_paid;
		$ap = accessed_property($result->target, $result->property_id);
	?>
	<?php $arrears_amount_text = number_format((float)$actual_arrears, 2, '.', ','); ?>
	<?php $total_amount_text = number_format((float)$total_amount, 2, '.', ','); ?>
	<?php $penalty_amount_text = number_format((float)$penalty_amount, 2, '.', ','); ?>
	<?php $ap_rateable_value = number_format((float)$ap["rateable_value"], 2, '.', ','); ?>
	<?php $ap_rate = number_format((float)$ap["rate"], 2, '.', ','); ?>
	<?php $ap_invoice_amount = number_format((float)$ap["invoice_amount"], 2, '.', ','); ?>

	<?php if($result->product_id == 12|| $result->product_id == 13){?>
		<!-- FIRST LINE -->
		<br>
		<br>
		<br>
		<div class="vee">
			<div class="" style="margin-left: 140px;"> AYAWAS0 WEST</div>
			<div class="" style="margin-left: 290px;"> FOR:- 2020 </div>
			<div class="" style="margin-left: 230px;"> FOR:- 2020 </div>
		</div>

		<br>
                  
		<div class="vee">
			<div style="margin-left: 140px;"> EAST LEGON</div>
			<div style="margin-left: 200px;">  </div>
			<div style="margin-left: 100px;"> </div>
		</div>

        <br>

		<div class="vee">
			<div style="margin-left: 140px;width: 15em;"> ABDUL AZIZ ADAMU </div>
			<div style="margin-left: 200px;"> AYW14021003002 </div>
			<div style="margin-left: 130px;"> AYW14021003002 </div>
		</div>

		<br>
		<br>
		<br>
                  
		<div style="padding-top: 10px;" class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 500px;"> 07/20/2020 </div>
			<div  style="margin-left: 250px;"> 07/20/2020 </div>
		</div>

		<br>
				
		<div class="vee">
			<div  style="margin-left: 140px;"> EAST LEGON</div>
			<div  style="margin-left: 200px;">  </div>
			<div  style="margin-left: 100px;"> </div>
		</div>

		<br>
		<br>
				
		<div class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div  style="margin-left: 400px;width: 15em;"> ABDUL AZIZ ADAMU </div>
		</div>

		<br>
				
			<div class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div  style="margin-left: 400px;"> EAST LEGON </div>
		</div>

		<br>
		<br>

			<div style="margin-bottom: 20px;" class="vee">
			<div  style="margin-left: 50px;">959,000.00 </div>
			<div  style="margin-left: 120px;" > 0.0036 </div>
			<div style="margin-left: 150px;"> 3,452.40 </div>
			<div style="margin-left: 150px;"> 0.00 </div>
			</div>

		<br>
		<br>

		<div class="vee">
			<div  style="margin-left: 80px;">0.00 </div>
			<div style="margin-left: 270px;">3,452.40</div>
			<div style="margin-left: 430px;"> 3,452.40 </div>
		</div>

		<br>
		<br>
		<br>
		<br>
	
	<?php }else if($result->product_id == 1){?>

		<!-- FIRST LINE -->
		<br>
		<br>

		<div class="vee">
			<div class="" style="margin-left: 140px;"> AYW </div>
			<div class="" style="margin-left: 290px;"> FOR:- <?= $result->invoice_year ?> </div>
			<div class="" style="margin-left: 120px;">FOR:- <?= $result->invoice_year ?> </div>
		</div>

			<br>
				
		<div class="vee">
			<div style="margin-left: 140px;"> <?=$result->streetname?></div>
			
		</div>

			<br>

		<?php 
			if(strlen($result->customer_name) >= 0 && strlen($result->customer_name) <= 10){
		?>
		<div class="vee">
			<div style="margin-left: 170px;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 190px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 100px;"> <?php echo $result->property_code; ?> </div>
		</div>
		<?php }else if(strlen($result->customer_name) >= 11 && strlen($result->customer_name) <= 23){ ?>
			<div class="vee">
			<div style="margin-left: 170px;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 100px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 100px;"> <?php echo $result->property_code; ?> </div>
		</div>
		<?php }else if(strlen($result->customer_name) >= 23 && strlen($result->customer_name) <= 30){ ?>
			<div class="vee">
			<div style="margin-left: 100px;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 80px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 80px;"> <?php echo $result->property_code; ?> </div>
		</div>
		<?php }else if(strlen($result->customer_name) > 30){ ?>
			<div class="vee">
			<div style="margin-left: 80px;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 70px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 70px;"> <?php echo $result->property_code; ?> </div>
		<?php } ?>

		<br>
		<br>
				
		<div style="padding-top: 10px;" class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 370px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
			<div  style="margin-left: 175px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
		</div>

			<br>
				
		<div class="vee">
			<div  style="margin-left: 140px;"> <?=$result->streetname?></div>
		</div>

			<br>
			<br>
				
			<div class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div  style="margin-left: 220px;white-space: nowrap;overflow: hidden;"><?=mb_strimwidth($result->customer_name, 0, 20, "...");?> </div>
			</div>

		<br>
				
			<div style="margin-bottom: 10px;" class="vee">
			<div  style="margin-left: 100px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div  style="margin-left: 220px;white-space: nowrap;overflow: hidden;"> <?=mb_strimwidth($result->streetname, 0, 20, "...");?> </div>
		</div>

		<br>

			<div class="vee">
			<div  style="margin-left: 0px;font-size: 12px;"><?=mb_strimwidth($result->category2, 0, 20, "...");?></div>
			<div  style="margin-left: 120px;" > <?=$result->category3?> </div>
			<div style="margin-left: 140px;"> <?= number_format((float)$invoice_amount, 2, '.', ','); ?> </div>
			<div style="margin-left: 100px;"> <?= number_format((float)$get_last_year_arrears_payment['invoice_amount'], 2, '.', ','); ?></div>
			</div>

		<br>
		<br>

		<div class="vee">
			<div  style="margin-left: 50px;"><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></div>
			<div style="margin-left: 270px;"> <?= $total_amount_text ?> </div>
			<div style="margin-left: 300px;"> <?= $total_amount_text ?> </div>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
	<?php }?>
</body>

</html>
