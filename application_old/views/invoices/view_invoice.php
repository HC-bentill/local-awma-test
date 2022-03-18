<div class="row">
    <div class="col">
        <section class="card card-featured-bottom card-featured-primary form-wizard" id="w4">
            <?= $this->session->flashdata('message');?>
            <div class="card-body">
              <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?=base_url()?>view_invoice/<?=$this->uri->segment(2)?>"><i class="fa fa-btc"></i>Invoices</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url()?>invoice_payment/<?=$this->uri->segment(2)?>"><i class="fa fa-usd"></i>Payment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url()?>invoice_transaction/<?=$this->uri->segment(2)?>"><i class="fa fa-money"></i>Transactions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url()?>invoice_adjustment/<?=$this->uri->segment(2)?>"><i class="fa fa-adjust"></i>Adjustment</a>
                    </li>
                </ul>
                <div class="tab-content">
                <section class="card">
                    <div class="card-body">
                      <div class="row card_wrapper">
                  
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

                        <div class="col-lg-8">
                          <div class="col-lg-12">
                            <h3 class="text-uppercase right_heading_title"> ayawaso west municipal assembly</h3>

                            <div class="row">
                              <div class="col-lg-6" style="height:300px;margin-left:-30px">
                                <img class="img-fluid" src="<?= base_url('assets/img/ayawaso_logo.png') ?>" alt="">
                              </div>
                              <div class="col-lg-6" style="height:300px;margin-right:-40px">
                                <?php if($result->product_id == 12 || $result->product_id == 13){?>
                                  <h4 class="text-uppercase text-center">propertY rate bill</h4>
                                <?php }else if($result->product_id == 1){?>
                                  <h4 class="text-uppercase text-center">BUSINESS OPERATING PERMIT BILL</h4>
                                <?php }?>

                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th class="text-center">ACCOUNT NUMBER</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="text-center">
                                        <?php echo $result->property_code; ?>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table class="table table_down_margin">
                                  <thead>
                                    <tr>
                                      <th class="text-center">BILL DATE</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="text-center"><?= date("m/d/Y", strtotime($result->date_created)) ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>


                          </div>

                          <div class="col-lg-12">
                            <?php if($result->product_id == 12|| $result->product_id == 13){?>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th class="text-center">RATEABLE VALUE</th>
                                    <th class="text-center">RATE IMPOST</th>
                                    <th class="text-center">RATE/AMT.CHARGED</th>
                                    <th class="text-center">ARREARS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-center"><?= $ap_rateable_value ?></td>
                                    <td class="text-center"><?= $ap_rate ?></td>
                                    <td class="text-center"><?= $ap_invoice_amount ?></td>
                                    <td class="text-center"><?= $arrears_amount_text ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            <?php }else if($result->product_id == 1){?>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th class="text-center">BUSINESS TYPE</th>
                                    <th class="text-center">CATEGORY</th>
                                    <th class="text-center">CURRENT FEES</th>
                                    <th class="text-center">ARREARS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-center"><?=$result->category2?></td>
                                    <td class="text-center"><?=$result->category3?></td>
                                    <td class="text-center"><?= number_format((float)$invoice_amount, 2, '.', ','); ?></td>
                                    <td class="text-center"><?= number_format((float)$get_last_year_arrears_payment['invoice_amount'], 2, '.', ','); ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            <?php }?>

                            <table class="table table_down_margin pull-left">
                              <thead>
                                <tr>
                                  <th class="text-center" style="width: 100px;">PAYMENT</th>
                                  <th class="text-center" style="width: 180px;">PENALTY ON ARREARS</th>
                                  <th class="text-center" style="width: 200px;">TOTAL AMOUNT DUE</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?= number_format((float)$get_last_year_arrears_payment['amount_paid'], 2, '.', ','); ?></td>
                                  <td><?= $penalty_amount_text ?></td>
                                  <td><?= $total_amount_text ?></td>
                                  <td class="arrow_text"><i style="color: #ffca08; font-size: 30px; line-height: inherit;" class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></td>
                                  <td class="arrow_text" style="width: bold;font-size:30px;font-weight:700;padding-left:25px; font-style: italic;">PLEASE NOTE <br> REVERSE SIDE</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                          <div class="col-md-12">

                            <b>PLEASE PRESENT THIS BILL WHEN MAKING PAYMENT</b>
                            <br>
                            <b style="font-size: 15px; font-style: italic;">
                              Please pay before 31st March every year to avoid payment and proceceution
                              Ref.Local Government Act.Sect 158(11)(2) Act 936 as Amended
                            </b>
                          </div>
                        </div>





                        <div class="col-lg-4" style="border-left: 2px dotted black;">
                          <h4 class="left_heading_tittle text-uppercase text-center"> ayawaso west municipal assembly</h4>
                          <div class="row main_page">
                            <div class="right_side_slip col-md-12 col-lg-12">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th class="text-center">ACCOUNT NUMBER</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-center">
                                      <?php echo $result->property_code; ?>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table class="table right_side_slip1 pull-right">
                                <thead>
                                  <tr>
                                    <th class="text-center">BILL DATE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-center"><?= date("m/d/Y", strtotime($result->date_created)) ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <p style="font-size: 18px; font-style: italic;color:#000000">
                            <b class="pull-right text-uppercase">Quote Account Number</b>
                            <b class="pull-right text-uppercase">All Queries/Payment </b>
                          </p>

                          <br><br><br>

                          <center>
                            <div class="row" align="center">

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <img class="img-fluid" src="<?= base_url('assets/img/ayawaso_logo.png') ?>" alt="">

                              </div>

                              <!-- <div class="col-md-4"></div> -->
                            </div>
                          </center>
                          <br>

                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center">TOTAL AMOUNT DUE</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center"><?= $total_amount_text ?></td>
                              </tr>
                            </tbody>
                          </table>


                          <p class="text-uppercase text-center" style="font-size: 17px; font-weight: bold; font-style: italic;color:#000000">
                            Please Present this bill when making Payment
                          </p>


                        </div>
                        <div class="text-right mr-4">
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-warning">Submit Invoice</button>
                          <a href="<?= base_url() ?>print_invoice2/<?= $result->id ?>" target="_blank" class="btn btn-primary ml-3"><i class="fa fa-print"></i> Save to PDF/Print</a>
                        </div>
                        <!-- <div id="watermark"><img src="<?= base_url() ?>assets/img/ayawaso_logo.png" alt="Watermark" /></div> -->
                      </div>
                  </section>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Send Invoice</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <div id="tab-alert-container">
          <div id='tab-alert' class="alert alert-dismissible fade hidden" role='alert'>
            <strong id='alert-msg-container'>Test</strong>
            <button type="button" id='close-sms-alert' class='close' aria-label='Close'>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" id="sms-tab-btn" href="#sms-tab-content" role="tab" aria-controls="sms-tab-content" aria-selected="true">Sms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" id="email-tab-btn" href="#email-tab-content" role="tab" aria-controls="email-tab-content" aria-selected="false">Email</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">

          <!-- SMS TAB -->
          <div class="tab-pane fade show active" id="sms-tab-content" role="tabpanel" aria-labelledby="sms-tab-btn">

            <form id="sms_form">
              <?php
                $primary_contact = "";
                $secondary_contact = "";
                if (!is_null($result->owner_phoneno) && !(strcmp(trim($result->owner_phoneno), "") == 0)) {
                  $primary_contact = $result->owner_phoneno;
                }
              ?>
              <div class="form-group row">
                <label for="primary_contact" class="col-form-label col-sm-3">Primary Contact</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="primary_contact" id="primary_contact" value="<?=$primary_contact?>" />
                </div>
              </div>
              <div class="form-group row">
                <label for="secondary_contact"  class="col-form-label col-sm-3">Secondary Contact</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="secondary_contact" id="secondary_contact" value="<?=$secondary_contact?>" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2 offset-10">
                  <button class="btn btn-md btn-primary" type="button" role="button" id="send-sms" name="send-sms">Send</button>
                </div>  
              </div>

            </form>
          </div>

          <!-- EMAIL TAB -->
          <div class="tab-pane fade" id="email-tab-content" role="tabpanel" aria-labelledby="email-tab-btn">
            <form id="email_form">
              <?php
                $email = "";
                // if (!is_null($result->email) && !(strcmp(trim($result->email), "") == 0)) {
                //   $email = $result->email;
                // }
              ?>
              <div class="form-group row">
                <label for="email" class="col-form-label col-sm-3">Email</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="email" id="email" value="<?=$email?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-2 offset-10">
                  <button class="btn btn-md btn-primary" type="button" id="send-email" name="send-email" role="button">Send</button>
                </div>  
              </div>

          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style type="text/css">

  .nav-tabs li .nav-link, .nav-tabs li .nav-link:hover {
    background: #F4F4F4;
    border-bottom: none;
    border-left: 1px solid #EEE;
    border-right: 1px solid #EEE;
    border-top: 3px solid #EEE;
    color: black;
  }

  .nav-link .active {
    color: red;
  }

  .nav-tabs li.active .nav-link, .nav-tabs li.active .nav-link:hover, .nav-tabs li.active .nav-link:focus {
    background: #FFF;
    border-left-color: #EEE;
    border-right-color: #EEE;
    border-top: 3px solid #CCC;
    color: rebeccapurple;
  }
</style>

<?php if($result->product_id == 12 || $result->product_id == 13){?>

<style>
  .card_wrapper {
    background-image: url("<?= base_url('assets/img/ayawaso_logo2.jpg') ?>");
    background-repeat: no-repeat;
    background-position: right;
    color: black;
  }



  .image_logo_right {
    padding: 30px;
  }


  .right_side_slip1 {
    width: 80%;

  }



  .table {
    border: none !important;
    margin: 0;
  }

  th {
    background-color: #ffca08;
    color: black;
    border-radius: 5px !important;

  }

  td {
    border-color: #ffca08;
    border-style: solid;
    border-width: 0.2px;
    height: 30px;
  }

  .arrow_text {
    border-color: none;
    border-style: none;
    height: none;
  }

  .right_heading_title {
    margin-bottom: 25px;
    margin-left: 50px;
    font-size: 20px;
  }

  .left_heading_tittle {
    margin-top: 50px;
    ;
  }
</style>
<?php }else if($result->product_id == 1){?>
<style>
  .card_wrapper {
    background-image: url("<?= base_url('assets/img/ayawaso_logo2.jpg') ?>");
    background-repeat: no-repeat;
    background-position: right;
    color: black;
  }



  .image_logo_right {
    padding: 30px;
  }


  .right_side_slip1 {
    width: 80%;

  }



  .table {
    border: none !important;
    margin: 0;
  }

  th {
    background-color: #32CD32;
    color: black;
    border-radius: 5px !important;

  }

  td {
    border-color: #32CD32;
    border-style: solid;
    border-width: 0.2px;
    height: 30px;
  }

  .arrow_text {
    border-color: none;
    border-style: none;
    height: none;
  }

  .right_heading_title {
    margin-bottom: 25px;
    margin-left: 50px;
    font-size: 20px;
  }

  .left_heading_tittle {
    margin-top: 50px;
    ;
  }
</style>
<?php }?>