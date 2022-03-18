<html>

<head>
	<title>REVENUE MANAGEMENT SYSTEM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ayawaso</title>

	<!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<?php if($product == 12 || $product == 13){?>
    <style type="text/css">
			.vee{
				font-family:'Times New Roman', Times, serif;
				font-weight: 900;
				font-size: 15px;
				display:inline-flex;
			}
      @media print
      {
          .no-print
          {
              display: none !important;
          }
      }
		</style>
	<?php }else if($product == 1){?>
		<style type="text/css">
			.vee{
				font-family:'Times New Roman', Times, serif;
				font-weight: 900;
				font-size: 15px;
				display:inline-flex;
			}
      @media print
      {
          .no-print
          {
              display: none !important;
          }
      }
		</style>
	<?php }?>
</head>
<?php 
  $bop_print_var = array(
    1 => array(10, 10, 5, 10, 0), 
    2 => array(10, 5, 5, 10, 5),
    3 => array(10, 0, 0, 10, 5),

  );

  $bpr_print_var = array(
    1 => array(10, 10, 5, 10, 0), 
    2 => array(10, 5, 5, 10, 5),
    3 => array(10, 0, 0, 10, 5),
  );
?>
<body>
  <form method="POST" action="<?=base_url()?>Invoice/print_batch_invoice" autocomplete="off">
    <div class="row no-print" style="border:1px solid grey;margin-bottom:1em;border-style: dashed;border-radius:1em;padding:1em;">
      <div class="col-lg-12">
          <div class="form-group m-form__group row">
              <!-- <?php echo $this->db->last_query(); ?> -->
              <div class="col-lg-3">
                <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" name="offset" required>
                  <option value="">Select Batch</option> 
                  <?php 
                    $number = get_batch_print_invoice($product,$category1,$year,$electoral_area,$town,$division);
                    $total_batch1 = $number/500;

                    $total_batch2 = number_format((float) $total_batch1, 2, '.', '');

                    if(is_numeric( $total_batch2 ) && floor( $total_batch2 ) != $total_batch2){
                      $whole_number = floor($total_batch2);
                      $actual_batch = $whole_number + 1;
                      $total_batches = $actual_batch;
                    }else{
                      $whole_number = floor($total_batch2);
                      $total_batches = $whole_number;
                    }
                    $my_offset = 0;
                  ?>
                  <?php for($i=1; $i<=$total_batches; $i++): ?>
                    <option value="<?=$my_offset?>"><?=$i?></option>
                  <?php 
                    $my_offset += 500;
                    endfor; 
                  ?>   
                </select>
              </div>
              <div class="col-lg-3">
                  <h4><b><?= $number." Records" ?></b></h4>
              </div>
              <div class="col">
                <input type="hidden" name="product" value="<?= $product ?>">
                <input type="hidden" name="category1" value="<?= $category1?>">
                <input type="hidden" name="year" value="<?=$year?>">
                <input type="hidden" name="electoral_area" value="<?=$electoral_area?>">
                <input type="hidden" name="town" value="<?=$town?>">
                <input type="hidden" name="division" value="<?=$division?>">
                <input type="hidden" name="invoice_number" value="<?=$number?>">
              </div>
              <div class="col-lg-3">
                <button type="submit" id="save" class="btn btn-success">
                  Print Batch
                </button>
              </div>
          </div>
      </div>
    </div>
  </form>

	<?php if($product == 12|| $product == 13){?>

    <!-- FIRST LINE -->
		<br>
		<br>

    <?php
      $count = 1;
      foreach($result as $result):  
    ?>
    <?php
    	$year = date('Y') - 1;
      $arrears_paid = get_invoice_arrears($result->property_id,$result->product_id,$result->invoice_year);
      $get_last_year_arrears_payment = get_last_year_arrears_payment($result->property_id,$result->product_id,2021);
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
			<div class="text-uppercase" style="margin-left: 140px;width:20em;">
				<?=($result->streetname)?$result->streetname:"-" ?><br>
				<?=($result->town)?$result->town:"-" ?> <br>
				<?=($result->prop_type)?$result->prop_type:"-" ?> 
			</div>
			<div style="margin-left: 230px;font-size:13;padding-top:15px;"> 
				<?=mb_strimwidth($result->customer_name, 0, 20, "...");?><br>
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
			<div style="margin-left: 100px;"> <?= $ap_invoice_amount; ?> </div>
			<div style="margin-left: <?=(strlen($ap_invoice_amount) <= 8)?'110px':'70px';?>;"> <?= $arrears_amount_text ?> </div>
		</div>

		<br>
		<br>

		<div class="vee">
			<div  style="margin-left: 100px;"><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></div>
			<div style="margin-left: 270px;"><?= $total_amount_text ?></div>
			<div style="margin-left: 270px;"><?= $total_amount_text ?> </div>
		</div>

		<?php if($bpr_print_var[$count][2] == 5){ ?>
      <br>
      <br>
      <br>
      <br>
      <br>
    <?php }else if($bpr_print_var[$count][2] == 4){ ?>
      <br>
      <br>
      <br>
      <br>
    <?php }else if($bpr_print_var[$count][2] == 6){ ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <?php } ?>
    
    <?php
     if($count == 3){
       
    ?>
    <div style='page-break-before:always'></div>
    <br>
    <br>

    <?php
    }else{

    }
    $count++;

    if($count == 4){
      $count = 1;
    }
     
    endforeach;    
    ?>
	
	<?php }else if($product == 1){?>

		<!-- FIRST LINE -->
		<br>
		<br>

    <?php
      $count = 1;
      foreach($result as $result):  
    ?>
    <?php
      $arrears_paid = get_invoice_arrears($result->property_id,$result->product_id,$result->invoice_year);
      $get_last_year_arrears_payment = get_last_year_arrears_payment($result->property_id,$result->product_id,2021);
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

    <!-- line 1 -->
		<div class="vee">
			<div class="" style="margin-left: 240px;"> AYAWASO WEST</div>
			<!-- <div class="" style="margin-left: 290px;"> FOR:- <?= $result->invoice_year?> </div> -->
      <div class="" style="margin-left: 140px;"> FOR:- <?= $result->invoice_year?> </div>
			<div class="" style="margin-left: 120px;">FOR:- <?= $result->invoice_year ?> </div>
		</div>

			<br>
				
      <!-- line 2 -->
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 240px;"> <?=($result->streetname)?$result->streetname:"-" ?> </div>
			
		</div>

		<br>

    <!-- line 3 -->
    <div class="vee">
			<div class="text-uppercase" style="margin-left: 160px;width:20em;text-align:center;"><?=mb_strimwidth($result->customer_name, 0, 27, "...");?></div>
			<div style="margin-left: 50px;"> <?php echo $result->property_code; ?> </div>
			<div style="margin-left: 120px;"> <?php echo $result->property_code; ?> </div>
		</div>

		<br>
		<br>
				
    <!-- line 4 -->
		<div style="padding-top: <?=$bop_print_var[$count][0];?>px;" class="vee">
			<div  style="margin-left: 200px;"> </div>
			<div  style="margin-left: 370px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
			<div  style="margin-left: 175px;"> <?= date("m/d/Y", strtotime($result->date_created)) ?> </div>
		</div>

			<br>
				
      <!-- line 5 -->
		<div class="vee">
			<div class="text-uppercase" style="margin-left: 240px;"> <?=($result->streetname)?$result->streetname:"-" ?> </div>
		</div>

			<br>
			<br>
				
      <!-- line 6 -->
		<div class="vee">
			<div  style="margin-left: 160px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div class="text-uppercase" style="margin-left: 220px;white-space: nowrap;overflow: hidden;"><?=mb_strimwidth($result->customer_name, 0, 20, "...");?> </div>
			</div>

		<br>
				
    <!-- line 7 -->
			<div style="margin-bottom:<?=$bop_print_var[$count][3];?>" class="vee">
			<div  style="margin-left: 160px;"> </div>
			<div  style="margin-left: 330px;">  </div>
			<div  class="text-uppercase" style="margin-left: 220px;white-space: nowrap;overflow: hidden;?>"> <?=($result->streetname)?mb_strimwidth($result->streetname, 0, 20, "..."):"-" ?> </div>
		</div>

		<br>

    <!-- line 8 -->
    <div style="margin-bottom:<?=$bop_print_var[$count][4];?>" class="vee">
			<div class="text-uppercase" style="margin-left: 50px;font-size: 12px;width:12em;white-space: nowrap;overflow: hidden;"><?=mb_strimwidth($result->category2, 0, 20, "...");?></div>
			<div class="text-uppercase" style="margin-left: 80px;" > <?=$result->bus_category?> </div>
			<div style="margin-left: 140px;"> <?= number_format((float)$invoice_amount, 2, '.', ','); ?> </div>
			<div style="margin-left: 100px;"><?= $arrears_amount_text ?></div>
		</div>

		<br>
		<br>

    <!-- line9 -->
		<div class="vee" style="margin-bottom:<?=$bop_print_var[$count][1];?>px;">
			<div  style="margin-left: 100px;"><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></div>
			<div style="margin-left: 270px;"> <?= $total_amount_text ?> </div>
			<div style="margin-left: 300px;"> <?= $total_amount_text ?> </div>
		</div>
      
    <?php if($bop_print_var[$count][2] == 5){ ?>
		<br>
		<br>
		<br>
		<br>
		<br>
    <?php }else if($bop_print_var[$count][2] == 4){ ?>
    <br>
		<br>
		<br>
		<br>
    <?php }else if($bop_print_var[$count][2] == 6){ ?>
    <br>
		<br>
		<br>
		<br>
    <br>
		<br>
    <?php } ?>
    
    <?php
     if($count == 3){
       
    ?>
    <div style='page-break-before:always'></div>
    <br>
    <br>

    <?php
    }else{

    }
    $count++;

    if($count == 4){
      $count = 1;
    }
     
    endforeach;    
    ?>
	<?php }?>
</body>

</html>



