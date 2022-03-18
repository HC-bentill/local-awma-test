<?php $this->load->view('residence/tab.css') ?>

<!-- start: page -->

  <div class="row">
    <div class="col-md-12">
      <section class="card card-featured-bottom card-featured-primary">
      	<?= $this->session->flashdata('message');?>
        <div class="card-body">
          	<main>

				<input id="tab1" type="radio" name="tabs" checked>
				<label class="label" for="tab1">Business Info</label>

				<input id="tab2" type="radio" name="tabs">
				<label class="label" for="tab2">Business Owner Info</label>

				<input id="tab3" type="radio" name="tabs">
				<label class="label" for="tab3">Business Location Info</label>

				<input id="tab5" type="radio" name="tabs">
				<label class="label" for="tab5">Business Categories</label>
		
				<input id="tab4" type="radio" name="tabs">
				<label class="label" for="tab4">Maps</label>

				<input id="tab6" type="radio" name="tabs">
				<label class="label" for="tab6">Invoice(s)</label>

				<?php $owner = business_occ_owner_details($bus['id']); ?>
				<?php $ap = accessed_property(3,$bus['id']); ?>

				<section class="section" id="content1">
				  	<form autocomplete="off" id="formm" method="post" action="<?=base_url()?>Business/edit_business_info_data">
                    	<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business Name:</strong></label>
								<input type="text" class="form-control" id="buis_name" name="buis_name" value="<?=$bus['buis_name']?>" autocomplete="off" required/>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business Primary Contact:</strong></label>
								<input type="text" class="form-control" id="buis_primary_contact" name="buis_primary_contact" value="<?=$bus['buis_primary_phone']?>"  autocomplete="off" required/>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business Secondary Contact:</strong></label>
								<input type="text" class="form-control" id="buis_secondary_contact" name="buis_secondary_contact" value="<?=$bus['buis_secondary_phone']?>" autocomplete="off"/>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business Website:</strong></label>
								<input type="text" class="form-control" id="buis_website" name="buis_website" value="<?=$bus['buis_website']?>"  autocomplete="off"/>
							</div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business E-mail:</strong></label>
								<input type="email" class="form-control" id="buis_email" name="buis_email" value="<?=$bus['buis_email']?>" autocomplete="off"/>
							</div>
							<!-- <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Existing Temporary Business Code:</strong></label>
								<input type="text" class="form-control" id="old_bus_code" value="<?=$bus['old_bus_code']?>" name="old_bus_code" autocomplete="off"/>
							</div> -->
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Business property Code:</strong></label>
								<input type="text" class="form-control" onKeyUp="check_busprop_code();" value="<?=$bus['buis_property_code']?>" id="buis_property_code" name="buis_property_code" autocomplete="off" required/>
								<span id="status" class="badge badge-danger" style="display:none">Invalid</span>
								<span id="statuss" class="badge badge-success" style="display:none">Valid</span>
							</div>
						</div>
						<div class="form-group row">
							
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Account No: <span style="color:red;">*</span></strong></label>
								<input type="text" class="form-control" onKeyUp="validate_business_code();" value="<?=$bus['buis_occ_code']?>" id="business_code" name="business_code" required/>
								<span id="occ_status" class="badge badge-danger" style="display:none">Unavailable</span>
								<span id="occ_statuss" class="badge badge-success" style="display:none">Available</span>
							</div>

							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Display Category: <span style="color:red;">*</span></strong></label>
								<select class="form-control" name="display_category" required>
									<option value="">SELECT OPTION</option>
									<?php foreach($display_category as $dc){ ?>
										<option value="<?= $dc->name?>" <?=$bus['bus_category']== $dc->name?'selected == selected':''; ?>><?=$dc->name?></option>
									<?php } ?>
								</select>
							</div>
		              	</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
							<div class="col-sm-4 pull-right">
								<input name="id" value="<?= $bus['id']?>" type="hidden">
								<input name="bus_code" value="<?= $bus['buis_occ_code']?>" type="hidden">
								<input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Business Info" id="btnet" type="button">
							</div>
						</div>
                    </form>
				</section>
				<section class="section" id="content2">
				  	<form autocomplete="off" id="formm1" method="post" action="<?=base_url()?>Business/edit_owner_data">
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
                                <input name="bus_code" value="<?= $bus['buis_occ_code']?>" type="hidden">
                                <input name="id" value="<?= $bus['id']?>" type="hidden">
                                <input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Business Owner Info" id="btnet1" type="button">
                            </div>
                        </div>
	                </form>
				</section>
				<section class="section" id="content3">
				  	<form autocomplete="off" id="formm2" method="post" action="<?=base_url()?>Business/edit_business_location_data">
                   
					  <div class="form-group row">
			                <div class="col-sm-4">
			                  <label class="control-label text-sm-right pt-2"><strong>Electoral Area: <span style="color:red;">*</span></strong></label>
			                  <select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="area_council" name="area_council" required>
			                        <option value="">SELECT OPTION</option>
			                        <?php foreach($area as $a){ ?>
			                          <option value="<?= $a->id?>" <?=$bus['area_council']== $a->id?'selected == selected':''; ?>><?=$a->name?></option>
			                        <?php } ?>
			                  </select>
			                </div>
			                <div class="col-sm-4">
								<input type="text" class="form-control hidden" id="townn" value="<?= $bus['town']?>" autocomplete="off"/>
								<label class="control-label text-sm-right pt-2"><strong>Town: <span style="color:red;">*</span></strong></label>
								<input type="text" class="form-control hidden" id="townn" value="<?= $bus['town']?>" autocomplete="off"/>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control"  id="town" name="town" required>
									<option value="">SELECT OPTION</option>
								</select>
			                </div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Surburb/Street Name:</strong></label>
								<input type="text" class="form-control" id="streetname" value="<?= $bus['streetname']?>" name="streetname">
			                </div>
							<!-- <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Sectorial Code:</strong></label>
								<input type="text" class="form-control" id="sectorial_code" value="<?= $bus['sectorial_code']?>" name="sectorial_code" required>
							</div>                 -->
			            </div>
			            <div class="form-group row">
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Landmark(if any):</strong></label>
								<input type="text" class="form-control" id="landmark" value="<?= $bus['landmark']?>" name="landmark" >
			                </div>
							<div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Ghanapost GPS code:</strong></label>
								<input type="text" value="<?= $bus['ghpost_gps']?>" class="form-control" id="ghpost_gps" name="ghpost_gps">
							</div>
			                <div class="col-sm-4">
								<label class="control-label text-sm-right pt-2"><strong>Division No: <span style="color:red;">*</span></strong></label>
								<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="division" name="division" required>
									<option value="">SELECT OPTION</option>
									<?php foreach($division as $d){ ?>
										<option value="<?= $d->division?>" <?=$bus['division']== $d->division?'selected == selected':''; ?>><?=$d->division?></option>
									<?php } ?>
								</select>
							</div>
			            </div>
						<div class="form-group row">
                            <label class="col-sm-4 control-label text-sm-right pt-2">&nbsp;</label>
                            <div class="col-sm-4 pull-right">
                                <input name="ownid" value="<?= $owner['id']?>" type="hidden">
                                <input name="bus_code" value="<?= $bus['buis_occ_code']?>" type="hidden">
                                <input name="id" value="<?= $bus['id']?>" type="hidden">
                                <input style="font-size:1.0rem" class="btn btn-primary form-control" value="Update Business Location Info" id="btnet2" type="button">
                            </div>
                        </div>
                    </form>
          		</section>
				<section class="section" id="content5">
					<table class="table table-responsive-md mb-0">
							<thead>
								<tr>
									<th>CATEGORY 1</th>
									<th>CATEGORY 2</th>
									<th>CATEGORY 3</th>
									<th>CATEGORY 4</th>
									<th>CATEGORY 5</th>
									<th>CATEGORY 6</th>
									<th>ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($bus_categories as $busc):?>
									<tr>
										<td><?=$busc->category1?></td>
										<td><?=$busc->category2?></td>
										<td><?=$busc->category3?></td>
										<td><?=$busc->category4?></td>
										<td><?=$busc->category5?></td>
										<td><?=$busc->category6?></td>
										<td class="actions-hover actions-fade">
											<?php if(has_permission($this->session->userdata('user_info')['id'],'edit busocc cat')){?>
												<a onclick="busocc_modal('<?php echo $busc->cat1 ?>','<?php echo $busc->cat2 ?>','<?php echo $busc->cat3 ?>','<?php echo $busc->cat4 ?>','<?php echo $busc->cat5?>','<?php echo $busc->cat6?>','<?php echo $busc->id?>','<?php echo $bus['buis_occ_code']?>','<?php echo $bus['id']?>');" href="#"><i class="fa fa-pencil"></i></a>
											<?php }else{} ?>
											<?php if(has_permission($this->session->userdata('user_info')['id'],'del busocc cat')){?>
												<a onclick="busoccdel_modal('<?php echo $busc->id?>','<?php echo $bus['buis_occ_code']?>','<?php echo $bus['id']?>');" href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
											<?php }else{} ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
					</table>
				</section>
						
          		<section class="section" id="content4">
					<div id="map" style="width:100%;height: 30em;"></div>
				</section>

				<section class="section" id="content6">
					<table class="table table-responsive-md mb-0" id="datatable-default">
						<thead>
							<tr>
								<th>INVOICE NO</th>
								<th>PRODUCT</th>
								<th>INVOICE AMOUNT</th>
								<th>DISCOUNT</th>
								<th>AMOUNT PAID</th>
								<th>OUTSTANDING AMOUNT</th>
								<th>VALUATION STATUS</th>
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
									<!-- <?php if ($inv->accessed == 1) { ?>
										<td><span class="badge badge-success">Assessed</span></td>
									<?php } else { ?>
										<td><span class="badge badge-danger">Unassessed</span></td>
									<?php } ?> -->
									<!-- leave it assessed empty for bop -->
									<td></td>
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
		var myLatLng = {lat: <?=$bus['gps_lat']?>, lng: <?=$bus['gps_long']?>};

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

<!-- Modal Form -->
<!--begin::Modal-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="basicForm" action="<?=base_url("Business/edit_busocc_category")?>" method="Post">
          	<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<b>Business Category Form</b>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row" style="display:none;">
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Business Category ID:</strong></label>
							<input class="form-control" name="buscatid" id="buscatid" type="text" readonly>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
							<input class="form-control" name="busocccode" id="busocccode" type="text" readonly>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
							<input class="form-control" name="busid" id="busid" type="text" readonly>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
							<input name="id" id="buscatid" type="text">
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat1" name="cat1" required>
									<option value="">N/A</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 2:</strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat2" name="cat2" required>
									<option value="">N/A</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 3:</strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat3" name="cat3" required>
									<option value="">N/A</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 4:</strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat4" name="cat4" required>
									<option value="">N/A</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 5:</strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat5" name="cat5" required>
									<option value="0">N/A</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 6:</strong></label>
							<select data-plugin-selecttwo="" data-plugin-options="{ &quot;minimumResultsForSearch&quot;: 5 }" class="form-control" id="cat6" name="cat6" required>
									<option value="0">N/A</option>
							</select>
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

<!-- Modal Form -->
<!--begin::Modal-->
<div class="modal fade" id="m_modal_11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form id="basicForm" action="<?=base_url("Business/delete_busocc_category")?>" method="Post">
          <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<b>Delete Alert !</b>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
              	<div class="modal-body">
					<div class="form-group row" style="display:none;">
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Business Category ID:</strong></label>
							<input class="form-control" name="buscatid" id="buscatid1" type="text" readonly>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
							<input class="form-control" name="busocccode" id="busocccode1" type="text" readonly>
						</div>
						<div class="col-sm-4">
							<label class="control-label text-sm-right pt-2"><strong>Category 1:</strong></label>
							<input class="form-control" name="busid" id="busid1" type="text" readonly>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							Are you sure you want delete this business category.
						</div>		
					</div>
              	</div>
              <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-success">
						Yes Delete
					</button>
              </div>
          </div>
        </form>
    </div>
</div>
<!--end::Modal-->
