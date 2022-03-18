<style type="text/css">
  .owner_reside{
    display:none;
  }
  .owner_reside_not{
    display:none;
  }

</style>
<div class="row">
  <div class="col">
    <section class="card card-featured-bottom card-featured-primary form-wizard" id="w4">
      <?= $this->session->flashdata('message');?>
      <div class="card-body">
        <div class="wizard-progress wizard-progress-lg">
          <div class="steps-progress">
            <div class="progress-indicator"></div>
          </div>
          <ul class="nav wizard-steps">
            <li class="nav-item active">
              <a class="nav-link" href="#w4-account" data-toggle="tab"><span>1</span>Business Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#w4-profile" data-toggle="tab"><span>2</span>Business Owner Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#w4-confirm" data-toggle="tab"><span>3</span>Location Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#w4-billing" data-toggle="tab"><span>4</span>Business Category Info</a>
            </li>
          </ul>
        </div>

        <form class="form-horizontal p-3" autocomplete="off" novalidate="novalidate" method="POST" action="<?=base_url()?>Business/add_business_occupant" id="submitForm">
          <div class="tab-content">
            <div id="w4-account" class="tab-pane active">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business Name: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="buis_name" name="buis_name" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business Primary Contact: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="buis_primary_contact" name="buis_primary_contact" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business Secondary Contact:</strong></label>
                  <input type="text" class="form-control" id="buis_secondary_contact" name="buis_secondary_contact" autocomplete="off"/>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business Website:</strong></label>
                  <input type="text" class="form-control" id="buis_website" name="buis_website" autocomplete="off"/>
                </div>

                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business E-mail:</strong></label>
                  <input type="email" class="form-control" id="buis_email" name="buis_email" autocomplete="off"/>
                </div>
                <!-- 
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Existing Temporary Business Code:</strong></label>
                  <input type="text" class="form-control" id="old_bus_code" name="old_bus_code" autocomplete="off"/>
                </div> -->
              </div>

              <!-- <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business property Code:</strong></label>
                  <input type="text" class="form-control" onKeyUp="check_busprop_code();" id="buis_property_code" name="buis_property_code" autocomplete="off" required/>
                  <span id="status" class="badge badge-danger" style="display:none">Invalid</span>
                  <span id="statuss" class="badge badge-success" style="display:none">Valid</span>
                </div>
              </div> -->
            </div>
            <div id="w4-profile" class="tab-pane">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Primary Contact: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" onkeyup="search_owner()" minlength=10 id="primary_contactt" name="primary_contactt" required>
                  <input type="text" class="form-control hidden" id="primary_contact" name="primary_contact" required>
                </div>
                <!-- <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Personal Category:</strong></label>
                  <select class="form-control" id="personal_category" name="personal_category" required="">
                        <option value="">SELECT OPTION</option>
                        <option value="Owner">Owner</option>
                        <option value="Caretaker">Caretaker</option>
                  </select>
                </div> -->
                <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>Owner Name: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>

                <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>House No: </strong></label>
                  <input type="text" class="form-control" id="houseno" name="houseno">
                </div>

              </div>
              <div class="form-group row">
                <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>E-mail:</strong></label>
                  <input type="text" class="form-control"  id="email" name="email">
                </div>
                <!-- <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>Use Code: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="use_code" name="use_code" required>
                </div> -->
                <!-- <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>Last Name:</strong></label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>E-mail:</strong></label>
                  <input type="text" class="form-control"  id="email" name="email">
                </div>
                <div class="col-sm-4 owner_others">
                  <label class="control-label text-sm-right pt-2"><strong>Postal Address:</strong></label>
                  <input type="text" class="form-control"  id="postal_address" name="postal_address">
                </div> -->
              </div>
              <div class="form-group row" style="display:none;">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Type Of Invoice:</strong></label>
                  <select class="form-control" name="type_of_invoice" readonly required>
                        <option value="1">SELECT OPTION</option>
                  </select>
                </div>
                <div class="col-sm-4" style="display: none;">
                  <label class="control-label text-sm-right pt-2"><strong>Form Category:</strong></label>
                  <input type="text" class="form-control" name="form_category" id="form_category" value="busocc" readonly required>
                </div>
              </div>  
            </div>
            <div id="w4-confirm" class="tab-pane">

              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Electoral Area: <span style="color:red;">*</span></strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="area_council" name="area_council" required>
                        <option value="">SELECT OPTION</option>
                        <?php foreach($area as $a){ ?>
                          <option value="<?= $a->id?>"><?=$a->name?></option>
                        <?php } ?>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Town: <span style="color:red;">*</span></strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control"  id="town" name="town" required>
                        <option value="">SELECT OPTION</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Street Name: </strong></label>
                  <input type="text" class="form-control" id="streetname" name="streetname">
                </div>
                <!-- <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Sectorial Code:</strong></label>
                  <input type="text" class="form-control" id="sectorial_code" name="sectorial_code" required>
                </div> -->
              </div>
              <div class="form-group row">
                
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Landmark:</strong></label>
                  <input type="text" class="form-control" id="landmark" name="landmark">
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Ghanapost GPS code:</strong></label>
                  <input type="text" class="form-control" id="ghpost_gps" name="ghpost_gps">
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Division No: <span style="color:red;">*</span></strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="division" name="division" required>
                        <option value="">SELECT OPTION</option>
                        <?php foreach($division as $d){ ?>
                            <option value="<?= $d->division?>"><?=$d->division?></option>
                        <?php } ?>
                  </select>
                </div>
                <!-- <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Block No: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="blockno" name="blockno" required>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Parcel No: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" id="parcelno" name="parcelno" required>
                </div> -->
                <!-- <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Street Code:</strong></label>
                  <input type="text" class="form-control" id="street_code" name="street_code">
                </div> -->
              </div>
              
            </div>

            <div id="w4-billing" class="tab-pane">
              <div class="alert alert-danger mt-4" id="error_notif" style="display:none"></div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Property Account No: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" onKeyUp="check_busprop_code();" id="buis_property_code" name="buis_property_code" autocomplete="off" required/>
                  <input type="hidden" class="form-control" id="validate_busprop_code" name="validate_busprop_code" readonly required/>
                  <span id="status" class="badge badge-danger" style="display:none">Invalid</span>
                  <span id="statuss" class="badge badge-success" style="display:none">Valid</span>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Account No: <span style="color:red;">*</span></strong></label>
                  <input type="text" class="form-control" onKeyUp="validate_business_code();" id="business_code" name="business_code" required/>
                  <input type="hidden" class="form-control" id="validate_bus_code" name="validate_bus_code" readonly required/>
                  <span id="occ_status" class="badge badge-danger" style="display:none">Unavailable</span>
                  <span id="occ_statuss" class="badge badge-success" style="display:none">Available</span>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Display Category: <span style="color:red;">*</span></strong></label>
                  <select class="form-control" name="display_category" required>
                      <option value="">SELECT OPTION</option>
                      <?php foreach($display_category as $dc){ ?>
                          <option value="<?= $dc->name?>"><?=$dc->name?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
                  <select class="form-control" name="cat1" required>
                      <option value="">N/A</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 2:</strong></label>
                  <select class="form-control" name="cat2" required>
                      <option value="">N/A</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 3:</strong></label>
                  <select class="form-control" name="cat3" required>
                      <option value="">N/A</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 4:</strong></label>
                  <select class="form-control" name="cat4" required>
                      <option value="">N/A</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 5:</strong></label>
                  <select class="form-control" name="cat5" id="cat5" required>
                      <option value="">N/A</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Category 6:</strong></label>
                  <select class="form-control" name="cat6" required>
                      <option value="">N/A</option>
                  </select>
                </div>
              </div>

              <!-- <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Year Of Establishment:</strong></label>
                  <input type="number" class="form-control" id="year_of_est" name="year_of_est" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Business Registration Cert No:</strong></label>
                  <input type="text" class="form-control" id="buis_reg_cert_no" name="buis_reg_cert_no" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label  class="control-label text-sm-right pt-2"><strong>Nature of Business operation:</strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="nature_of_buisness" name="nature_of_buisness" class="form-control" autocomplete="off" required>
                    <option value="">SELECT OPTION</option>
                    <option value="Head Office">Head Office</option>
                    <option value="Regional Office">Regional Office</option>
                    <option value="Branch/District Office">Branch/District Office</option>
                    <option value="Agency">Agency</option>
                    <option value="Sole Proprietorship office">Sole Proprietorship office</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>No Of Employees:</strong></label>
                  <input type="number" class="form-control" id="no_of_employees" name="no_of_employees" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>No of Rooms/Office Space:</strong></label>
                  <input type="text" class="form-control" id="no_of_rooms" name="no_of_rooms" autocomplete="off" required/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Property Occupancy Type</strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }"  id="ownership" name="ownership" class="form-control" autocomplete="off" required>
                    <option value="">SELECT OPTION</option>
                    <option>Original Owner</option>
                    <option>Rented</option>
                  </select>
                </div>
                <div class="col-sm-4" style="display:none">
                  <label class="control-label text-sm-right pt-2"><strong>Type of Business Building:</strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }"  id="type_of_building" name="type_of_building" class="form-control" autocomplete="off" required>
                    <option value="">SELECT OPTION</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Temporary">Temporary</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">    
                <div class="col-sm-4" id="temp" style="display: none;">
                  <label class="control-label text-sm-right pt-2"><strong>Temporary Building Type:</strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }"  id="detail_for_temp" name="detail_for_temp" class="form-control" autocomplete="off" required="" >
                    <option value="">SELECT OPTION</option>
                    <option value="Wooden Kiosk">Wooden Kisok</option>
                    <option value="Metal Container">Metal Container</option>
                    <option value="Mobile Van/Car">Mobile Van/Car</option>
                    <option value="Table Top">Table Top</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label text-sm-right pt-2"><strong>Sub-UPN Number:</strong></label>
                  <input type="text" class="form-control" name="subupn_number"/>
                </div>
                <div class="col-sm-4" style="display:none;">
                  <label class="control-label text-sm-right pt-2"><strong>Accessed Status:</strong></label>
                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" name="accessed_status" id="accessed_status" onchange="accessed()" class="form-control" autocomplete="off" required>
                    <option value="">SELECT OPTION</option>
                    <option value="0">Unaccessed</option>
                    <option value="1">Accessed</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">            
                <div class="col-sm-4" id="rateable" style="display:none">
                  <label class="control-label text-sm-right pt-2"><strong>Rateable Amount:</strong></label>
                  <input type="number" step=".01" class="form-control" name="rateable_amount" required />
                </div>
                <div class="col-sm-4" id="rate" style="display:none">
                  <label class="control-label text-sm-right pt-2"><strong>Rate:</strong></label>
                  <input type="number" step=".001" class="form-control" name="rate" required />
                </div>
              </div>
            </div> -->

          </div>
        </form>
      </div>
      <div class="card-footer">
        <ul class="pager">
          <li class="previous disabled">
            <a><i class="fa fa-angle-left"></i> Previous</a>
          </li>
          <li class="finish hidden float-right" id="finish">
            <a>Finish</a>
          </li>
          <li id="save" class="next">
            <a>Next <i class="fa fa-angle-right"></i></a>
          </li>
        </ul>
      </div>
    </section>
  </div>
</div>

