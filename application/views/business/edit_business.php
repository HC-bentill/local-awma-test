<?php $this->load->view('residence/tab.css') ?>

<!-- start: page -->

  <div class="row">
    <div class="col-md-12">
      <section class="card card-featured-bottom card-featured-primary">
      	<?= $this->session->flashdata('message');?>
        <div class="card-body">

          	<main>

				<input id="tab1" type="radio" name="tabs" checked>
				<label class="label" for="tab1">Personal Info</label>

				<input id="tab2" type="radio" name="tabs">
				<label class="label" for="tab2">Location Info</label>

				<input id="tab3" type="radio" name="tabs">
				<label class="label" for="tab3">Property Info</label>

				<!-- <input id="tab4" type="radio" name="tabs">
				<label class="label" for="tab4">Facility Info</label> -->

				<input id="tab5" type="radio" name="tabs">
				<label class="label" for="tab5">Business Occupants</label>
				
				<input id="tab6" type="radio" name="tabs">
				<label class="label" for="tab6">Map</label>

				<input id="tab7" type="radio" name="tabs">
				<label class="label" for="tab7">Invoice(s)</label>

				<?php $owner = business_owner_details($residence['id']); ?>
				<?php $ap = accessed_property(2,$residence['id']); ?>

				<section class="section" id="content1">
				  	<form autocomplete="off" id="basicformm" method="post" action="<?=base_url()?>Business/edit_personnal_data">
					
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Primary Contact: <span style="color:red;">*</span></strong></label>
								<input type="text" class="form-control" value="<?=$owner['primary_contact']?>" minlength=10 id="primary_contact" name="primary_contact" required>
								<input type="hidden" class="form-control" value="<?=$owner['primary_contact']?>" minlength=10 name="original_primary_contact" required>
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
								<input type="text" class="form-control" value="<?= $owner['firstname']?>" id="firstname" name="firstname" required>
							</div>

							<div class="col-sm-4 owner_others">
								<label class="control-label text-sm-right pt-2"><strong>House No: </strong></label>
								<input type="text" class="form-control" value="<?= $owner['houseno']?>" id="houseno" name="houseno">
							</div>

						</div>
						<div class="form-group row">
							<div class="col-sm-4 owner_others">
								<label class="control-label text-sm-right pt-2"><strong>E-mail:</strong></label>
								<input type="text" class="form-control"  value="<?= $owner['email']?>" id="email" name="email">
							</div>

							<div class="col-sm-4 owner_others">
								<label class="control-label text-sm-right pt-2"><strong>Update Type:</strong></label>
								<select class="form-control"  id="update_type" name="update_type" required="">
									<option value="">SELECT OPTION</option>
									<option value="update">Update Info</option>
									<option value="detach">Detach Owner</option>
								</select>
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
			            <div class="form-group row">
							<label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
							<div class="col-sm-4 pull-right">
								<input name="ownid" value="<?= $owner['id']?>" type="hidden">
								<input type="text" class="form-control hidden" id="busprop" name="busprop" value="<?= $residence['buis_prop_code']?>" autocomplete="off"/>
								<input name="resid" value="<?= $residence['id']?>" type="hidden">
								<input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Personnal Info" id="btnn" type="button">
							</div>
						</div>
                    </form>
				</section>

				<section class="section" id="content2">
					<form autocomplete="off" id="locform" method="post" action="<?=base_url()?>Business/edit_loc_data">

					   	<div class="form-group row">
			                <div class="col-sm-4">
			                  <label class="control-label text-sm-right pt-2"><strong>Electoral Area: <span style="color:red;">*</span></strong></label>
			                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="area_council" name="area_council" required>
			                        <option value="">SELECT OPTION</option>
			                        <?php foreach($area as $a){ ?>
			                          <option value="<?= $a->id?>" <?=$residence['area_council']== $a->id?'selected == selected':''; ?>><?=$a->name?></option>
			                        <?php } ?>
			                  </select>
			                </div>
			                <div class="col-sm-4">
								<input type="text" class="form-control hidden" id="townn" value="<?= $residence['town']?>" autocomplete="off"/>
								<label class="control-label text-sm-right pt-2"><strong>Town: <span style="color:red;">*</span></strong></label>
								<input type="text" class="form-control hidden" id="townn" value="<?= $residence['town']?>" autocomplete="off"/>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control"  id="town" name="town" required>
									<option value="">SELECT OPTION</option>
								</select>
			                </div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Surburb/Street Name:</strong></label>
								<input type="text" class="form-control" id="streetname" value="<?= $residence['streetname']?>" name="streetname">
			                </div>
							<!-- <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Sectorial Code:</strong></label>
								<input type="text" class="form-control" id="sectorial_code" value="<?= $residence['sectorial_code']?>" name="sectorial_code" required>
							</div>                 -->
			            </div>
			            <div class="form-group row">
							
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Landmark(if any):</strong></label>
								<input type="text" class="form-control" id="landmark" value="<?= $residence['landmark']?>" name="landmark" >
			                </div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Ghanapost GPS code:</strong></label>
								<input type="text" value="<?= $residence['ghpost_gps']?>" class="form-control" id="ghpost_gps" name="ghpost_gps">
							</div>
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Division No: <span style="color:red;">*</span></strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="division" name="division" required>
									<option value="">SELECT OPTION</option>
									<?php foreach($division as $d){ ?>
										<option value="<?= $d->division?>" <?=$residence['division']== $d->division?'selected == selected':''; ?>><?=$d->division?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Block No: <span style="color:red;">*</span></strong></label>
								<input type="text" value="<?= $residence['block_no']?>" class="form-control" id="blockno" name="blockno" required>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Parcel No: <span style="color:red;">*</span></strong></label>
								<input type="text" value="<?= $residence['plot_no']?>" class="form-control" id="parcelno" name="parcelno" required>
							</div>
			            </div>
			            <!-- <div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Locality Code:</strong></label>
								<input type="text" class="form-control" id="locality_code" value="<?= $residence['locality_code']?>" name="locality_code" disabled>
			                </div>
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>New Property No:</strong></label>
								<input type="text" class="form-control" id="new_property_no" value="<?=$residence['new_property_no']?>" name="new_property_no" disabled>
			                </div>
			                <div class="col-sm-4 hidden">
								<label class="control-label text-sm-right pt-2"><strong>New Property No:</strong></label>
								<input type="text" class="form-control" id="new_property_noo" value="<?=$residence['new_property_no']?>" name="new_property_noo">
			                </div>
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Old Property No:</strong></label>
								<input type="text" class="form-control" id="old_property_no" value="<?=$residence['old_property_no']?>" name="old_property_no">
			                </div>
			            </div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Zone Code:</strong></label>
								<input type="text" class="form-control" id="zone_code" value="<?= $residence['zone_code']?>" name="zone_code" disabled>
			                </div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>House No:</strong></label>
								<input type="text" class="form-control" id="houseno" value="<?= $residence['houseno']?>" name="houseno" disabled>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Ghanapost GPS code (optional):</strong></label>
								<input type="text" class="form-control" id="ghpost_gps" value="<?= $residence['ghpost_gps']?>" name="ghpost_gps">
							</div>
						</div> -->
						<div class="form-group row">
							<label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
							<div class="col-sm-4 pull-right">
								<input type="text" class="form-control hidden" id="busprop" name="busprop" value="<?= $residence['buis_prop_code']?>" autocomplete="off"/>
								<input name="resid" value="<?= $residence['id']?>" type="hidden">
								<input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Location Info" id="locbtnn" type="button">
							</div>
						</div>
		            </form>
				</section>

				<section class="section" id="content3">
					<form autocomplete="off" id="propform" method="post" action="<?=base_url()?>Business/edit_prop_data">
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Account No: <span style="color:red;">*</span></strong></label>
								<input type="text" class="form-control" value="<?= $residence['buis_prop_code']?>" onKeyUp="validate_propery_code();" id="property_code" name="property_code" required/>
								<span id="status" class="badge badge-danger" style="display:none">Unavailable</span>
								<span id="statuss" class="badge badge-success" style="display:none">Available</span>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Category: <span style="color:red;">*</span></strong></label>
								<select class="form-control" id="category" name="category" onchange="categoryLogic()" required>
									<option value="">SELECT OPTION</option>
									<option value="12" <?=$residence['property_type'] == 12?'selected == selected':''; ?>>BUSINESS PROPERTY</option>
									<option value="13" <?=$residence['property_type'] == 13?'selected == selected':''; ?>>RESIDENTIAL PROPERTY</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Valuation Status: <span style="color:red;">*</span></strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" name="accessed_status" id="accessed_status" onchange="accessed_new()" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="0" <?=$residence['accessed'] == 0?'selected == selected':''; ?>>Unassessed</option>
									<option value="1" <?=$residence['accessed'] == 1?'selected == selected':''; ?>>Assessed</option>
								</select>
							</div>
						</div>
						<div class="form-group row"> 
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Class: <span style="color:red;">*</span></strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="class_code" name="class_code" required>
									<option value="">SELECT OPTION</option>
									<?php foreach($class as $c){ ?>
										<option <?=$residence['class_code'] == $c->class_code?'selected == selected':''; ?> value="<?= $c->class_code?>"><?=$c->class?></option>
									<?php } ?>
								</select>
							</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Zone: <span style="color:red;">*</span></strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="zone_code" name="zone_code" required>
								<option value="">SELECT OPTION</option>
								<?php foreach($zone as $z){ ?>
									<option <?=$residence['zone_code'] == $z->zone_code?'selected == selected':''; ?> value="<?= $z->zone_code?>"><?=$z->zone?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Use Code: <span style="color:red;">*</span></strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="use_code" name="use_code" required>
								<option value="">SELECT OPTION</option>
								<?php foreach($usecode as $u){ ?>
									<option <?=$residence['property_typee'] == $u->code?'selected == selected':''; ?> value="<?= $u->code?>"><?=$u->name?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group row assessed" style="display:none"> 
						<div class="col-sm-4">
						<label class="control-label text-sm-right pt-2"><strong>Rateable Value: <span style="color:red;">*</span></strong></label>
						<input type="number" value='<?= ($ap["rateable_value"] == "")?"":number_format((float)$ap["rateable_value"], 2, ".", ""); ?>' step=".01" class="form-control" name="rateable_amount" required />
						</div>
						<div class="col-sm-4">
						<label class="control-label text-sm-right pt-2"><strong>Rate Impost: <span style="color:red;">*</span></strong></label>
						<!-- <input type="number" value='<?=($ap["rate"]== "")?"":$ap["rate"]?>' step=".00001" class="form-control" name="rate" required /> -->
						<input type="number" value='<?=($ap["rate"]== "")?"":$ap["rate"]?>' class="form-control" name="rate" required />

						</div>
					</div>
						<div class="form-group row" style="display:none;">
							<input type="text" class="form-control" id="category1" value="<?= $residence['category1']?>" readonly>
							<input type="text" class="form-control" id="category2" value="<?= $residence['category2']?>" readonly>
							<input type="text" class="form-control" id="category3" value="<?= $residence['category3']?>" readonly>
							<input type="text" class="form-control" id="category4" value="<?= $residence['category4']?>" readonly>
							<input type="text" class="form-control" id="category5" value="<?= $residence['category5']?>" readonly>
							<input type="text" class="form-control" id="category6" value="<?= $residence['category6']?>" readonly>
						</div>
						<div class="form-group row unassessed" style="display:none">
							<div class="col-sm-4"> 
								<label class="control-label text-sm-right pt-2"><strong>Property Category:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat1" name="cat1" required>
									<option value="">N/A</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>No Of Rooms:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat2" name="cat2" required>
									<option value="">N/A</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Property Class:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat3" name="cat3" required>
									<option value="">N/A</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Property Type Sub 1:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat4" name="cat4" required>
									<option value="">N/A</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Property Type Sub 2:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat5" name="cat5" required>
									<option value="">N/A</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Property Type Sub 3:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat6" name="cat6" required>
									<option value="">N/A</option>
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
							<div class="col-sm-4 pull-right">
								<input type="text" class="form-control hidden" id="busprop" name="busprop" value="<?= $residence['buis_prop_code']?>" autocomplete="off"/>
								<input name="resid" value="<?= $residence['id']?>" type="hidden">
								<input name="apid" value='<?=($ap['id'] == "")?"":$ap['id']?>' type="hidden">
								<input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Property Info" id="locbtn" type="button">
							</div>
						</div>
		          	</form>
				</section>
				<!-- <section class="section" id="content4">
					<form autocomplete="off" id="facform" method="post" enctype="multipart/form-data" action="<?=base_url()?>Business/edit_facility_data">
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Toilet Facility:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="toilet_facility" name="toilet_facility" class="form-control" required="">
									<option value="">SELECT OPTION</option>
									<option value="Yes" <?=$residence['toilet_facility']=='Yes'?'selected == selected':''; ?>>Yes</option>
									<option value="No" <?=$residence['toilet_facility']=='No'?'selected == selected':''; ?>>No</option>
								</select>
							</div>
							<div class="col-sm-4" id="t_yes" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Toilet Facility Type:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="t_facility_yes" name="t_facility_yes" class="form-control" required="">
									<option value="">SELECT OPTION</option>
									<option value="WC" <?=$residence['t_facility_yes']=='WC'?'selected == selected':''; ?>>WC</option>
									<option value="VIP" <?=$residence['t_facility_yes']=='VIP'?'selected == selected':''; ?>>VIP</option>
									<option value="Aqua Privy" <?=$residence['t_facility_yes']=='Aqua Privy'?'selected == selected':''; ?>>Aqua Privy</option>
								</select>
				            </div>
							<div class="col-sm-4" class="form-control" style="display: none;" id="t_no">
								<label class="control-label text-sm-right pt-2"><strong>Toilet Facility Type:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="t_facility_no" name="t_facility_no" required="">
									<option value="">SELECT OPTION</option>
									<option value="KVIP" <?=$residence['t_facility_no']=='KVIP'?'selected == selected':''; ?>>KVIP</option>
									<option value="Unapproved Location(Seashore,bush)" <?=$residence['t_facility_no']=='Unapproved Location(Seashore,bush)'?'selected == selected':''; ?>>Unapproved Location(Seashore,bush)</option>
								</select>
							</div>
							<div class="col-sm-4" style="display: none;" id="t_yes1">
								<label class="control-label text-sm-right pt-2"><strong>No Of Toilet Facility:</strong></label>
								<input type="text" class="form-control" id="no_of_toilet_facility" value="<?=$residence['no_of_toilet_facility']?>" name="no_of_toilet_facility" required="">
							</div>
                     	</div>
					    <div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Availability Of Water:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="avai_of_water" name="avai_of_water" class="form-control" required="">
									<option value="">SELECT OPTION</option>
									<option value="Yes" <?=$residence['avai_of_water']=='Yes'?'selected == selected':''; ?>>Yes</option>
									<option value="No" <?=$residence['avai_of_water']=='No'?'selected == selected':''; ?>>No</option>
								</select>
							</div>
                        	<div class="col-sm-4" id="water_yes" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Source Of Water:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="source_water_yes" name="source_water_yes" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="GWC" <?=$residence['source_water_yes']=='GWC'?'selected == selected':''; ?>>GWC</option>
									<option value="Borehole" <?=$residence['source_water_yes']=='Borehole'?'selected == selected':''; ?>>Borehole</option>
									<option value="Hand Dug Well" <?=$residence['source_water_yes']=='Hand Dug Well'?'selected == selected':''; ?>>Hand Dug Well</option>
									<option value="Small town water system" <?=$residence['source_water_yes']=='Small town water system'?'selected == selected':''; ?>>Small town water system</option>
								</select>
							</div>
							<div class="col-sm-4" style="display: none;" id="water_no">
								<label class="control-label text-sm-right pt-2"><strong>Source Of Water:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="source_water_no" name="source_water_no" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="River" <?=$residence['source_water_no']=='River'?'selected == selected':''; ?>>River</option>
									<option value="Stream" <?=$residence['source_water_no']=='Stream'?'selected == selected':''; ?>>Stream</option>
									<option value="Brookes" <?=$residence['source_water_no']=='Brookes'?'selected == selected':''; ?>>Brookes</option>
									<option value="Others" <?=$residence['source_water_no']=='Others'?'selected == selected':''; ?>>Others</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Means of Waste Disposal:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="avai_of_refuse" name="avai_of_refuse" class="form-control" autocomplete="off" required>
									<option value="">SELECT OPTION</option>
									<option value="Yes" <?=$residence['avai_of_refuse']=='Yes'?'selected == selected':''; ?>>Yes</option>
									<option value="No" <?=$residence['avai_of_refuse']=='No'?'selected == selected':''; ?>>No</option>
								</select>
				            </div>
				        </div>
				        <div class="form-group row">
							<div class="col-sm-4" id="refuse_yes" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Mode of Disposal:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="dumping_site_yes" name="dumping_site_yes" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="Waste Company" <?=$residence['dumping_site_yes']=='Waste Company'?'selected == selected':''; ?>>Waste Company</option>
									<option value="Public Waste Management Site" <?=$residence['dumping_site_yes']=='Public Waste Management Site'?'selected == selected':''; ?>>Public Waste Management Site</option>
								</select>
				            </div>
				            <div class="col-sm-4" style="display: none;" id="refuse_no">
								<label class="control-label text-sm-right pt-2"><strong>Mode of Disposal:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="dumping_site_no" name="dumping_site_no" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="Skip Container" <?=$residence['dumping_site_no']=='Skip Container'?'selected == selected':''; ?>>Skip Container</option>
									<option value="Unengineered sites" <?=$residence['dumping_site_no']=='Unengineered sites'?'selected == selected':''; ?>>Unengineered sites</option>
								</select>
							</div>
                        	<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Building Permit:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="building_permit" name="building_permit" onchange="b_permit()" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option value="Yes" <?=$residence['building_permit']=='Yes'?'selected == selected':''; ?>>Yes</option>
									<option value="No" <?=$residence['building_permit']=='No'?'selected == selected':''; ?>>No</option>
								</select>
				            </div>
							<div class="col-sm-4" id="b_permit" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Building Permit No:</strong></label>
								<input type="text" class="form-control" id="building_cert_no" value="<?=$residence['building_cert_no']?>" name="building_cert_no" autocomplete="off" required/>
				            </div>
				        </div>
				        <div class="form-group row"> 
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Planning Permit:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="planning_permit" name="planning_permit" onchange="p_permit()" class="form-control" autocomplete="off" required>
									<option value="">SELECT OPTION</option>
									<option value="Yes" <?=$residence['planning_permit']=='Yes'?'selected == selected':''; ?>>Yes</option>
									<option value="No" <?=$residence['planning_permit']=='No'?'selected == selected':''; ?>>No</option>
								</select>
							</div>
                        	<div class="col-sm-4" id="p_permit" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Planning Permit No:</strong></label>
								<input type="text" class="form-control" value="<?=$residence['planning_permit_no']?>" id="planning_permit_no" name="planning_permit_no" autocomplete="off" required/>
							</div>
							<div class="col-sm-4 business_property" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>No Of Occupants:</strong></label>
								<input type="text" class="form-control" id="no_of_occupants" name="no_of_occupants" value="<?=$residence['noOfOccupants']?>" autocomplete="off" required="" />
							</div>
							<div class="col-sm-4 residential_property" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>No Of Residents:</strong></label>
								<input type="text" class="form-control" id="no_of_residents" name="no_of_residents" value="<?=$residence['no_of_residents']?>" autocomplete="off" required="" />
							</div>
				        </div>
						<div class="form-group row">
							<div class="col-sm-4 residential_property" style="display: none;"> 
								<label class="control-label text-sm-right pt-2"><strong>No Of Residents Greater 18:</strong></label>
								<input type="text" class="form-control" name="resident_greater_18" value="<?=$residence['resident_greater_18']?>" required/>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Building Status:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="building_status" name="building_status" onchange="inhabitant()" class="form-control" autocomplete="off" required>
									<option value="">SELECT OPTION</option>
									<option <?=$residence['building_status']=='1'?'selected == selected':''; ?> value="1">Completed</option>
									<option <?=$residence['building_status']=='0'?'selected == selected':''; ?> value="0">Uncompleted</option>
								</select>
							</div>
							<div class="col-sm-4" id="uncompleted_yes" style="display: none;">
								<label class="control-label text-sm-right pt-2"><strong>Inhabitant Status:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" id="inhabitant_status" name="inhabitant_status" class="form-control" required>
									<option value="">SELECT OPTION</option>
									<option <?=$residence['inhabitant_status']=='Inhabited'?'selected == selected':''; ?> value="Inhabited">Inhabited</option>
									<option <?=$residence['inhabitant_status']=='Uninhabited'?'selected == selected':''; ?> value="Uninhabited">Uninhabited</option>
								</select>
							</div>
							
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Valuation Status:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" name="accessed_status" id="accessed_status" onchange="accessed()" class="form-control" autocomplete="off" required>
									<option value="">SELECT OPTION</option>
									<option <?=$residence['accessed']=='0'?'selected == selected':''; ?> value="0">Unaccessed</option>
									<option <?=$residence['accessed']=='1'?'selected == selected':''; ?> value="1">Accessed</option>
								</select>
							</div>
							<div class="col-sm-4" id="rateable" style="display:none">
								<label class="control-label text-sm-right pt-2"><strong>Rateable Amount:</strong></label>
								<input type="number" value='<?= ($ap["rateable_value"] == "")?"":number_format((float)$ap["rateable_value"], 2, ".", ""); ?>' step=".01" class="form-control" name="rateable_amount" required />
							</div>
							<div class="col-sm-4" id="rate" style="display:none">
								<label class="control-label text-sm-right pt-2"><strong>Rate:</strong></label>
								<input type="number" value='<?=($ap["rate"]== "")?"":$ap["rate"]?>' step=".001" class="form-control" name="rate" required />
							</div>
							<div class="col-sm-4" id="valuation" style="display:none">
								<label class="control-label text-sm-right pt-2"><strong>Valuation Number:</strong></label>
								<input type="text" value='<?=($ap["valuation_number"]== "")?"":$ap["valuation_number"]?>' class="form-control" name="valuation_number" required />
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>UPN Number:</strong></label>
								<input type="text" value="<?=$residence['upn_number']?>" class="form-control" name="upn_number"/>
							</div>
							<div class="col-sm-4 assessed" style="display:none">
								<label class="control-label text-sm-right pt-2"><strong>Property Assessment:</strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" name="property_assessment" id="property_assessment" onchange="propertyAssessment()" class="form-control" autocomplete="off" required>
									<option value="">SELECT OPTION</option>
									<option <?=$residence['assessable_status']=='0'?'selected == selected':''; ?> value="0">Unrateable</option>
									<option <?=$residence['assessable_status']=='1'?'selected == selected':''; ?> value="1">Rateable</option>
								</select>
							</div>
							<div class="col-sm-4 assessed" id="photo" style="display:none">
								<label class="control-label text-sm-right pt-2"><strong>Photo:</strong></label>
								<input class="form-control hidden" type="text" value="<?=$residence['property_image']?>" name="old_image"/>
								<input class="form-control hidden" type="text" value="<?=$residence['image_path']?>" name="image_path"/>
								<input class="form-control" type="file" name="userfile"/>

								<a class="example-image-link" href="<?= ($residence['property_image'] == '')? base_url().'upload/property/residence/no-image.png': base_url().$residence['image_path'].$residence['property_image']?>" data-lightbox="example-1">
									<img class="example-image" src="<?= ($residence['property_image'] == '')? base_url().'upload/property/residence/no-image.png': base_url().$residence['image_path'].$residence['property_image']?>" style="max-width:20em;max-height:20em;margin-top:0.5em;" alt="">
								</a>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
							<div class="col-sm-4 pull-right">
								<input type="text" class="form-control hidden" id="busprop" name="busprop" value="<?= $residence['buis_prop_code']?>" autocomplete="off"/>
								<input name="resid" value="<?= $residence['id']?>" type="hidden">
								<input name="apid" value='<?=($ap['id'] == "")?"":$ap['id']?>' type="hidden">
								<input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Facility Info" id="facbtn" type="button">
							</div>
						</div>
			        </form>
				</section> -->

				<section class="section" id="content5">
			        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
						<thead>
							<tr>
								<th>BUSINESS CODE</th>
								<th>BUSINESS NAME</th>
								<th>BUSINESS PRIMARY CONTACT</th>
								<th>E-MAIL</th>
								<th>OWNER</th>
								<th>PRIMARY CONTACT</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($result as $value):?>
							<?php $owner = business_occ_owner_details($value->id); ?>
							<tr>
							<td>
								<a style="text-decoration: none;" href='<?= base_url().'Business/edit_business_occupant_form/'.$value->id?>'><?= $value->buis_occ_code ?></a>
							</td>
							<td><?= $value->buis_name ?></td>
							<td><a style="text-decoration: none;" href="tel:<?php echo $value->buis_primary_phone ?>"><?= $value->buis_primary_phone ?></a></td>
							<td><a style="text-decoration: none;" href="mailto:<?php echo $value->buis_email ?>"><?= $value->buis_email ?></a></td>
							<td><?= $owner['firstname'].' '.$owner['lastname'] ?></td>
							<td><a style="text-decoration: none;" href="tel:<?php echo $owner['primary_contact'] ?>"><?= $owner['primary_contact'] ?></a></td>
							</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
			        </table>
				</section>
						
				<section class="section" id="content6">
					<div id="map" style="width:100%;height: 30em;"></div>
				</section>

				<section class="section" id="content7">
					<table class="table table-responsive-md mb-0" id="datatable-default">
						<thead>
							<tr>
								<th>INVOICE NO</th>
								<th>PRODUCT</th>
								<th>INVOICE AMOUNT</th>
								<th>DISCOUNT</th>
								<th>AMOUNT PAID</th>
								<th>OUTSTANDING AMOUNT</th>
								<th>ASSESSED</th>
								<th>CATEGORY 1</th>
								<th>CATEGORY 2</th>
								<th>CATEGORY 3</th>
								<th>CATEGORY 4</th>
								<th>CATEGORY 5</th>
								<th>CATEGORY 6</th>
								<th>DATE GENERATED</th>
								<th>PAYMENT DUE DATE</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($invoices as $inv):?>
								<tr>
									<?php 
										$url_invoice = base_url() . "view_invoice/" . $inv->id;
										$url = base_url() . "invoice_transaction/" . $inv->id;
									?>
									<td><?php echo "<a href='$url_invoice'>" . $inv->invoice_no . "</a>"; ?></td>
									<td><?=$inv->name?></td>
									<td><?=number_format((float) $inv->invoice_amount + $inv->adjustment_amount, 2, '.', ',')?></td>
									<td><?=number_format((float) $inv->adjustment_amount, 2, '.', ',')?></td>
									<td><?php echo "<a href='$url'>" . number_format((float) $inv->amount_paid, 2, '.', ',') . "</a>"?></td>
									<td><?=number_format((float) $inv->invoice_amount - $inv->amount_paid, 2, '.', ',')?></td>
									<?php if ($inv->accessed == 1) { ?>
										<td><span class="badge badge-success">Assessed</span></td>
									<?php } else { ?>
										<td><span class="badge badge-danger">Unassessed</span></td>
									<?php } ?>
									<td><?=$inv->category1?></td>
									<td><?=$inv->category2?></td>
									<td><?=$inv->category3?></td>
									<td><?=$inv->category4?></td>
									<td><?=$inv->category5?></td>
									<td><?=$inv->category6?></td>
									<td><?=date("Y-m-d H:i:s", strtotime($inv->date_created))?></td>
									<td><?=date("Y-m-d", $inv->payment_due_date)?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td><b>TOTAL:</b></td>
								<td></td>
								<td><b><?=number_format((float) $invoices_sum['invoice_amount'] + $invoices_sum['discount'], 2, '.', ',')?></b></td>
								<td><b><?=number_format((float) $invoices_sum['discount'], 2, '.', ',')?></b></td>
								<td><b><?=number_format((float) $invoices_sum['amount_paid'], 2, '.', ',')?></b></td>
								<td><b><?=number_format((float) $invoices_sum['invoice_amount'] - $invoices_sum['amount_paid'], 2, '.', ',')?></b></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</section>

			</main>
			
        </div>
      </section>
    </div>
  </div>

<!-- end: page -->

<script>

	function initMap() {
		var myLatLng = {lat: <?=$residence['gps_lat']?>, lng: <?=$residence['gps_long']?>};

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			center: myLatLng,
			gestureHandling: 'cooperative'
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map
		});
	}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgEMcP8mSrlPeI8jMLVh9PU7RBrQZVJ6I&callback=initMap">
</script>
