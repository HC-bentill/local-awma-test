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
		<style type="text/css">
          .vee{
            font-family:'Times New Roman', Times, serif;
            font-weight: 900;
            font-size: 15px;
            display:inline-flex;
          }
        </style>
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
	<?php $ap_rate = number_format((float)$ap["rate"], 6, '.', ','); ?>
	<?php $ap_invoice_amount = number_format((float)$ap["invoice_amount"], 2, '.', ','); ?>

	<?php if($result->product_id == 12|| $result->product_id == 13){?>
	
		<br>
		<br>
		<div class="vee">
			<div class="" style="margin-left: 240px;"> AYAWASO WEST</div>
			<div class="" style="margin-left: 140px;"> FOR:- <?= $result->invoice_year ?> </div>
			<div class="" style="margin-left: 120px;"> FOR:- <?= $result->invoice_year ?> </div>
		</div>

		<br>
                  
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 240px;"> <?=($result->town)?$result->town:"-" ?></div>
		</div>

        <br>

		<div class="vee">
			<div class="text-uppercase" style="margin-left: 160px;width:20em;text-align:center;"> <?=mb_strimwidth($result->customer_name, 0, 27, "...");?> </div>
			<div style="margin-left: 50px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 130px;"> <?php echo $result->property_code; ?> </div>
		</div>

		<br>
		<br>
                  
		<div style="padding-top: 10px;" class="vee">
			<div style="margin-left: 200px;"> </div>
			<div style="margin-left: 340px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
			<div style="margin-left: 155px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
		</div>

		<br>
				
		<div class="vee" style="margin-bottom: 0px;">
			<div class="text-uppercase" style="margin-left: 140px;">
				<?=($result->streetname)?$result->streetname:"-" ?><br>
				<?=($result->town)?$result->town:"-" ?> <br>
				<?=($result->prop_type)?$result->prop_type:"-" ?> 
			</div>
			<div style="margin-left: 400px;font-size:13;padding-top:15px;"> 
				<?=mb_strimwidth($result->customer_name, 0, 25, "...");?><br>
				<?=($result->streetname)?$result->streetname:"-" ?><br>
				<?=($result->town)?$result->town:"-" ?>
			</div>
		</div>
				
		<!-- <div class="vee">
			<div style="margin-left: 100px;"> </div>
			<div style="margin-left: 330px;">  </div>
			<div class="text-uppercase" style="margin-left: 400px;width: 15em;"> <?=mb_strimwidth($result->customer_name, 0, 20, "...");?></div>
		</div> -->

		<!-- <br>
				
			<div class="vee">
			<div style="margin-left: 160px;"> </div>
			<div style="margin-left: 330px;">  </div>
			<div class="text-uppercase" style="margin-left: 180px;"> 
				<?=($result->streetname)?$result->streetname:"-" ?><br>
				<?=($result->town)?$result->town:"-" ?>
			</div>
		</div> -->

		<br>
		<br>

		<div style="margin-bottom: 0px;" class="vee">
			<div style="margin-left: 60px;"><?=$ap_rateable_value?></div>
			<div style="margin-left: 120px;"><?= $ap_rate ?> </div>
			<div style="margin-left: 100px;"> <?= $ap_invoice_amount ?> </div>
			<div style="margin-left: <?=(strlen($ap_invoice_amount) <= 5)?'110px':'70px';?>;"> <?= number_format((float)$get_last_year_arrears_payment['invoice_amount'], 2, '.', ','); ?> </div>
		</div>

		<br>
		<br>

		<div class="vee">
			<div  style="margin-left: 100px;"><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></div>
			<div style="margin-left: 270px;"><?= $total_amount_text ?></div>
			<div style="margin-left: 270px;"><?= $total_amount_text ?> </div>
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
			<div class="" style="margin-left: 240px;"> AYW </div>
			<div class="" style="margin-left: 290px;"> FOR:- <?= $result->invoice_year ?> </div>
			<div class="" style="margin-left: 120px;">FOR:- <?= $result->invoice_year ?> </div>
		</div>

		<br>
				
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 240px;"> <?=($result->streetname)?$result->streetname:"-" ?></div>
		</div>

		<br>
	
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 160px;width:20em;text-align:center;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 50px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 120px;"> <?php echo $result->property_code; ?> </div>
		</div>

		<br>
		<br>
				
		<div style="padding-top: 10px;" class="vee">
			<div  style="margin-left: 200px;"> </div>
			<div  style="margin-left: 370px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
			<div  style="margin-left: 175px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
		</div>

		<br>
				
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 240px;"> <?=($result->streetname)?$result->streetname:"-" ?></div>
		</div>

		<br>
		<br>
		
			
		<div class="vee">
			<div style="margin-left: 160px;"> </div>
			<div style="margin-left: 330px;">  </div>
			<div class="text-uppercase" style="margin-left: 220px;white-space: nowrap;overflow: hidden;"><?=mb_strimwidth($result->customer_name, 0, 20, "...");?> </div>
		</div>

		<br>
				
		<div style="margin-bottom: 15px;" class="vee">
			<div style="margin-left: 160px;"> </div>
			<div style="margin-left: 330px;">  </div>
			<div class="text-uppercase" style="margin-left: 220px;white-space: nowrap;overflow: hidden;"> <?=($result->streetname)?mb_strimwidth($result->streetname, 0, 20, "..."):"-" ?> </div>
		</div>

		<br>

		<div class="vee">
			<div class="text-uppercase" style="margin-left: 100px;font-size: 12px;width:12em;white-space: nowrap;overflow: hidden;"><?=mb_strimwidth($result->category2, 0, 20, "...");?></div>
			<div class="text-uppercase" style="margin-left: 80px;" > <?=$result->category3?> </div>
			<div style="margin-left: 120px;"> <?= number_format((float)$invoice_amount, 2, '.', ','); ?> </div>
			<div style="margin-left: 100px;"> <?= number_format((float)$get_last_year_arrears_payment['invoice_amount'], 2, '.', ','); ?></div>
		</div>

		<br>
		<br>

		<div class="vee">
			<div  style="margin-left: 100px;"><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></div>
			<div style="margin-left: 270px;"> <?= $total_amount_text ?> </div>
			<div style="margin-left: 330px;"> <?= $total_amount_text ?> </div>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
	<?php }?>
</body>

</html>
