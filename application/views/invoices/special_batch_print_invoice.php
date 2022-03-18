<!-- start: page -->
<div class="row">
    <div class="col-md-12">
      <section class="card card-featured-bottom card-featured-primary">
        <?= $this->session->flashdata('message');?>
        <div class="card-body">
            <form method="POST" action="<?= base_url('Invoice/save_special_batch_print_invoice')?>" autocomplete="off">
              <div class="row" style="border:1px solid grey;margin-bottom:1em;border-style: dashed;border-radius:1em;padding:1em;">
                <div class="col-lg-12">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3 criteria" id="#">
                            <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="bill_type" name="product" required>
                                <option value="">Select Bill Type</option> 
                                <?php foreach($products as $p){ ?>
                                    <option value="<?= $p->id?>"><?=$p->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                        <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minßßßimumResultsForSearch&quot;: 5 }" class="form-control" name="year" required>
                            <option value="">Select Year</option> 
                            <?php $current_year = date("Y");?>
                            <?php for($i=2017; $i<=$current_year; $i++): ?>
                            <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>   
                        </select>
                        </div>
                        <div class="col-lg-4">
                            <button data-container="body" data-toggle="modal" data-target="#upload_batch_modal" type="button" class="btn btn-info">
                                Upload Data
                            </button>
                            <button type="submit" id="save" class="btn btn-success">
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-5">
                            <label>Add Property Codes</label>
                            <!-- <select data-plugin-selecttwo="" multiple data-plugin-options="{ &quot;minßßßimumResultsForSearch&quot;: 5 }" class="form-control" id="prop_codes" name="prop_codes[]" required>
                            </select> -->
                            <input type="text" class="form-control" id="prop_codes" name="prop_codes" placeholder="AYW04155003 AYW04155001 AYW04155002 AYW04155004" required />
                            <p class="text-danger"><strong>example:</strong> AYW04155003 AYW04155001 AYW04155002 AYW04155004</p>
                        </div>
                    </div>
                </div>
              </div>
            </form>
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                    <tr>
                        <th class="text-center">BATCH NO</th>
                        <th class="text-center">BILL TYPE</th>
                        <th class="text-center">NO OF BILLS</th>
                        <th class="text-center">YEAR</th>
                        <th class="text-center">DATETIME CREATED</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $value):?>
                        <tr>
                            <td><?= $value->batch_no ?></td> 
                            <td><?= $value->name ?></td>
                            <?php 
                            // $number = get_special_batch_count($value->product,$value->year,$value->property_code);?>
                            <td class="text-center"></td>                            
                            <td><?= $value->year ?></td>
                            <td><?= date("Y-m-d H:i:s",strtotime($value->datetime_created)) ?></td>
                            <td class="text-center">      
                               <form method="post" target="_blank" action="<?=base_url()?>Invoice/special_batch">
                                   <input type="hidden" name="product" value="<?= $value->product ?>">
                                   <input type="hidden" name="year" value="<?= $value->year ?>">
                                   <input type="hidden" name="property_codes" value="<?= $value->property_code ?>">
                                <button type="submit" class="btn btn-success"><span class="fa fa-print"></span></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </section>
    </div>
  </div>  

  <!--begin::Modal-->
<div class="modal fade" id="upload_batch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="basicForm" action="<?=base_url("Invoice/import_special_batch_records")?>" enctype="multipart/form-data" method="Post">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                     <b>Upload Form</b>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">
                          &times;
                      </span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="control-label text-sm-right pt-2"><strong>Upload csv file:</strong></label>
                        <input class="form-control" name="userfile" type="file" id="fileSelect" accept=".csv" required/>
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label text-sm-right pt-2"><strong>Please download csv template</strong></label>
                      <a href="<?=base_url("upload/upload_template/special_batch_print_invoice.csv")?>" class="btn btn-warning" download>Download Template</a>
                    </div>
                    <div class="col-sm-12 text-center">
                        <h2><strong>Example</strong></h2>
                       <img src="<?=base_url().'assets/img/preview_example.png'?>" alt="alt" class="pt-2" width="80%">
                       
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                  </button>
                  <button type="submit" class="btn btn-success">
                      Submit
                  </button>
              </div>
          </div>
        </form>
    </div>
</div>
<!--end::Modal-->
