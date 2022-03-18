/*
Name: 			Forms / Wizard - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	2.0.0
*/

(function($) {

	'use strict';

	const mapping = {
		'cat1': {
			'table': 'product_category2',
			'column': 'category1_id'
		},
		'cat2': {
			'table': 'product_category3',
			'column': 'category2_id'
		},
		'cat3': {
			'table': 'product_category4',
			'column': 'category3_id'
		},
		'cat4': {
			'table': 'product_category5',
			'column': 'category4_id'
		},
		'cat5': {
			'table': 'product_category6',
			'column': 'category5_id'
		},
		'cat6': {
			'table': 'product_category6',
			'column': 'category6_id'
		}
	};

	/*
	Wizard #1
	*/
	var $w1finish = $('#w1').find('ul.pager li.finish'),
		$w1validator = $("#w1 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w1finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w1 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w1').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w1 form').valid();
			if( !validated ) {
				$w1validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').length - 1;
			$w1finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w1').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			tab.removeClass('active');
		}
	});

	/*
	Wizard #2
	*/
	var $w2finish = $('#w2').find('ul.pager li.finish'),
		$w2validator = $("#w2 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w2finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w2 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w2').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w2 form').valid();
			if( !validated ) {
				$w2validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').length - 1;
			$w2finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w2').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
		}
	});

	/*
	Wizard #3
	*/
	var $w3finish = $('#w3').find('ul.pager li.finish'),
		$w3validator = $("#w3 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w3finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w3 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w3').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w3 form').valid();
			if( !validated ) {
				$w3validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w3finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w3').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w3').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});

	/*
	Wizard #4
	*/
	var $w4finish = $('#w4').find('ul.pager li.finish'),
		$w4validator = $("#w4 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w4finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w4 form').valid();
		if ( validated ) {
			if($('section#w4 #w4-profile input[name=form_category]').val() === "busocc"){
				if($('section#w4 #w4-billing input[name=validate_busprop_code]').val() === "invalid"){
					// alert("validate_busprop_code condition not passed")
					$('#error_notif').css('display', 'block');
					$('#error_notif').html('Business propery no is invalid');
					return false;
				}else if($('section#w4 #w4-billing input[name=validate_bus_code]').val() === "invalid"){
					// alert("validate_bus_code condition not passed")
					$('#error_notif').css('display', 'block');
					$('#error_notif').empty().append('Business account no already exist. Kindly check and reassign another account no.');
					return false;
				}else{
					$('#error_notif').css('display', 'none');
					$(this).unbind('click');
					$('#w4 form').submit();
					// alert("click unbinded")
				}
			}else{
				$('#w4 form').submit();
			}
			
		}
	});

	$('#w4').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w4 form').valid();
			if( !validated ) {
				$w4validator.focusInvalid();
				return false;
			}
			if( index === 1 ){
				let ownership_type = $('section#w4 #w4-owner-info select[name=ownership_type]').val();
				let phone_number = $('section#w4 #w4-owner-info input[name=phonenumber]').val();
				ajaxHandler(null, "/awma_erms_test/Invoice/get_owner_details_by_phone", "POST",
					{'ownership_type': ownership_type, 'phone_number': phone_number},
					function(result){
						if(result.status === "success" && result.data.length > 0){
							$('section#w4 #w4-profile input[name=firstname]').val(result.data[0].firstname);
							$('section#w4 #w4-profile input[name=firstname]').attr('readonly', true);
							$('section#w4 #w4-profile input[name=lastname]').val(result.data[0].lastname);
							$('section#w4 #w4-profile input[name=lastname]').attr('readonly', true);
							$('section#w4 #w4-profile input[name=houseno]').val(result.data[0].houseno);
							$('section#w4 #w4-profile input[name=area_council]').val(result.data[0].area_name);
							$('section#w4 #w4-profile input[name=town]').val(result.data[0].town);
						} else {
							$('section#w4 #w4-profile input[name=firstname]').val('');
							$('section#w4 #w4-profile input[name=firstname]').attr('readonly', false);
							$('section#w4 #w4-profile input[name=lastname]').val('');
							$('section#w4 #w4-profile input[name=lastname]').attr('readonly', false);
							$('section#w4 #w4-profile input[name=houseno]').val('');
							$('section#w4 #w4-profile input[name=area_council]').val('');
							$('section#w4 #w4-profile input[name=town]').val('');
						}
					}
				);
			}
			else if( index === 2){
				let id = $('section#w4 #w4-profile select[name=type_of_invoice]').val();
				
				if(parseInt(id)){
					if($('section#w4 #w4-profile input[name=form_category]').val() === "onetime"){
						let html = '<option value="">N/A</option>';
						$('section#w4 #w4-category select[name=cat1]').closest('.form-group').nextAll().css('display','none');
						ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
							{'table': 'product_category1', 'id': id},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									for(let i=0; i<result.data.length; i++){
										html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
									}
									$('section#w4 #w4-category select[name=cat1]').html(html);
								}
							}
						);
					}else if($('section#w4 #w4-profile input[name=form_category]').val() === "busocc"){
						let html = '<option value="">N/A</option>';
						ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
							{'table': 'product_category1', 'id': id},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									for(let i=0; i<result.data.length; i++){
										html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
									}
									$('section#w4 #w4-billing select[name=cat1]').html(html);
								}
							}
						);
					}else{
						
					}
					
				}else{
					
				}
				
			}
			else if( index === 3){ //generate payment amount
				if($('section#w4 #w4-profile input[name=form_category]').val() === "onetime"){
					let categories = [];
					$('section#w4 #w4-category select.valid').each(function(i, el){
						categories.push({
							'name': $(el).attr('name'),
							'id': $(el).val(),
							'text': $(el).find('option:selected').text()
						});
					});
					if( categories.length === 6){
						$('#error_notif').css('display', 'none');
						$('#error_notif').html('');
						let pricetag;
						for(let i=categories.length - 1; i>=0; i--){
							if(categories[i].text.toLowerCase() !== 'none' && categories[i].text.toLowerCase() !== "n/a"){
								pricetag = categories[i];
								break;
							}
						}
						console.log('pricetag ', pricetag);
						ajaxHandler(null, "/awma_erms_test/Invoice/get_onetime_invoice_pricing", "POST",
							{'id': pricetag.id, 'column': mapping[pricetag.name].column},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									let price = Number.parseFloat(result.data[0].price1);
									if(price){
										$('section#w4 #w4-payment input[name=amount]').attr('price_id', result.data[0].id);
										$('section#w4 #w4-payment input[name=amount]').val(price);
										$('section#w4 #w4-payment input[name=amount]').attr('readonly', true);
									}
									else {
										$('section#w4 #w4-payment input[name=amount]').attr('price_id', 0);
										$('section#w4 #w4-payment input[name=amount]').val('');
										$('section#w4 #w4-payment input[name=amount]').attr('readonly', false);
									}
								}
							}
						);
					}
					else {
						$('#error_notif').css('display', 'block');
						$('#error_notif').html('Please select all 6 categories');
						return false;
					}
				}else{

				}

			}
			else if( index === 4){//confirmation
				let categories = [];
				$('section#w4 #w4-category select.valid').each(function(i, el){
					categories.push({
						'name': $(el).attr('name'),
						'id': $(el).val(),
						'text': $(el).find('option:selected').text()
					});
				});
				$('section#w4 #w4-confirm input[name=c_ownership_type]').val( $('section#w4 #w4-owner-info select[name=ownership_type]').val() );
				$('section#w4 #w4-confirm input[name=c_phone_number]').val( $('section#w4 #w4-owner-info input[name=phonenumber]').val() );
				$('section#w4 #w4-confirm input[name=c_firstname]').val( $('section#w4 #w4-profile input[name=firstname]').val() );
				$('section#w4 #w4-confirm input[name=c_lastname]').val( $('section#w4 #w4-profile input[name=lastname]').val() );
				$('section#w4 #w4-confirm input[name=c_company]').val( $('section#w4 #w4-profile input[name=company]').val() );
				$('section#w4 #w4-confirm input[name=c_house_number]').val( $('section#w4 #w4-profile input[name=houseno]').val() );
				$('section#w4 #w4-confirm input[name=c_area_council]').val( $('section#w4 #w4-profile select[name=area_council] option:selected').text() );
				$('section#w4 #w4-confirm input[name=c_town]').val( $('section#w4 #w4-profile select[name=town] option:selected').text() );
				let toi_code = $('section#w4 #w4-profile select[name=type_of_invoice] option:selected').attr('code');
				let toi_text = $('section#w4 #w4-profile select[name=type_of_invoice] option:selected').text();
				$('section#w4 #w4-confirm input[name=c_type_of_invoice_code]').val(toi_code);
				$('section#w4 #w4-confirm input[name=c_type_of_invoice]').val( toi_text );
				$('section#w4 #w4-confirm input[name=c_category1]').val( categories[0].text );
				$('section#w4 #w4-confirm input[name=c_category2]').val( categories[1].text );
				$('section#w4 #w4-confirm input[name=c_category3]').val( categories[2].text );
				$('section#w4 #w4-confirm input[name=c_category4]').val( categories[3].text );
				$('section#w4 #w4-confirm input[name=c_category5]').val( categories[4].text );
				$('section#w4 #w4-confirm input[name=c_category6]').val( categories[5].text );
				$('section#w4 #w4-confirm input[name=c_price_id]').val( $('section#w4 #w4-payment input[name=amount]').attr('price_id') );
				$('section#w4 #w4-confirm input[name=c_amount]').val( $('section#w4 #w4-payment input[name=amount]').val() );
			}
			console.log('tab ', tab);
			// console.log('navigation ', navigation);
			console.log('index ', index);
			// console.log('newindex ', newindex);
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w4finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w4').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w4').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});

	$(document).on('change','section#w4 #w4-category select',function(e){
		let name = $(this).attr('name');
		let id = $(this).val();
		console.log('name ', name, 'id ', id);

		$('section#w4 #w4-category select[name=' + name + ']').closest('.form-group').nextAll().css('display','none');
		let html = '<option value="">N/A</option>';
		ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category", "POST",
			{'table': mapping[name].table, 'id': id, 'column': mapping[name].column},
			function(result){
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
				}
				$('section#w4 #w4-category select[name=' + name + ']').closest('.form-group').next().css('display', 'flex');
				$('section#w4 #w4-category select[name=' + name + ']').closest('.form-group').next().find('select').html(html);
			}
		);
	});

	$(document).on('change','section#w4 #w4-billing select',function(e){
		
		let name = $(this).attr('name');
		let id = $(this).val();
		console.log('name ', name, 'id ', id);
		if(name == "cat1" || name == "cat2"|| name == "cat3" || name == "cat4" || name == "cat5"|| name == "cat6"){
			let html = '<option value="">N/A</option>';
			ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category", "POST",
			{'table': mapping[name].table, 'id': id, 'column': mapping[name].column},
			function(result){													
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
				}
				$('section#w4 #w4-billing select[name=' + name + ']').closest('.col-sm-4').next().find('select').html(html);
			}
			);
		}else{

		}
		
	});

	$(document).on('change','section#w4 #w4-billing select[name=category]',function(e){
		let id = $('section#w4 #w4-billing select[name=category]').val();
		let html = '<option value="">N/A</option>';
		ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
			{'table': 'product_category1', 'id': id},
			function(result){
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
					$('section#w4 #w4-billing select[name=cat1]').html(html);
				}
			}
		);	
	});

	/*
	Wizard #5
	*/
	var $w5finish = $('#w5').find('ul.pager li.finish'),
		$w5validator = $("#w5 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w5finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w5 form').valid();
		if ( validated ) {
			new PNotify({
				title: 'Congratulations',
				text: 'You completed the wizard form.',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});
		}
	});

	$('#w5').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w5 form').valid();
			if( !validated ) {
				$w5validator.focusInvalid();
				return false;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w5finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w5').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length;
			var $current = index + 1;
			var $percent = ( $current / $total ) * 100;
			$('#w5').find('.progress-bar').css({ 'width': $percent + '%' });
		}
	});

	/*
	Wizard #4
	*/
	var $w7finish = $('#w7').find('ul.pager li.finish'),
		$w7validator = $("#w7 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w7finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w7 form').valid();
		if ( validated ) {
			document.getElementById("submitForm").submit();
		}
	});

	$('#w7').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w7 form').valid();
			if( !validated ) {
				$w7validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w7finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w7').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w7').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});


	/*
	Wizard #8
	*/
	var $w8finish = $('#w8').find('ul.pager li.finish'),
		$w8validator = $("#w8 form").validate({
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w8finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w8 form').valid();
		if ( validated ) {
			//$('#w8 form').submit();
			//alert("your form is submitted")

			if($('section#w8 #w8-profile input[name=form_category]').val() === "busprop"){
				if($('section#w8 #w8-billing input[name=validate_busprop_code]').val() === "invalid"){
					//alert("validate_busprop_code condition not passed")
					$('#error_notif').css('display', 'block');
					$('#error_notif').html('Business propery No already exist. Kindly check and reassign another account no.');
					return false;
				}else{
					$('#error_notif').css('display', 'none');
					$(this).unbind('click');
					$('#w8 form').submit();
					//alert("click unbinded")
				}
			}else{
				$('#w8 form').submit();
			}
		}
	});

	$('#w8').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w8 form').valid();
			if( !validated ) {
				$w8validator.focusInvalid();
				return false;
			}
			if( index === 1 ){
				let ownership_type = $('section#w8 #w8-owner-info select[name=ownership_type]').val();
				let phone_number = $('section#w8 #w8-owner-info input[name=phonenumber]').val();
				ajaxHandler(null, "/awma_erms_test/Invoice/get_owner_details_by_phone", "POST",
					{'ownership_type': ownership_type, 'phone_number': phone_number},
					function(result){
						if(result.status === "success" && result.data.length > 0){
							$('section#w8 #w8-profile input[name=firstname]').val(result.data[0].firstname);
							$('section#w8 #w8-profile input[name=firstname]').attr('readonly', true);
							$('section#w8 #w8-profile input[name=lastname]').val(result.data[0].lastname);
							$('section#w8 #w8-profile input[name=lastname]').attr('readonly', true);
							$('section#w8 #w8-profile input[name=houseno]').val(result.data[0].houseno);
							$('section#w8 #w8-profile input[name=area_council]').val(result.data[0].area_name);
							$('section#w8 #w8-profile input[name=town]').val(result.data[0].town);
						} else {
							$('section#w8 #w8-profile input[name=firstname]').val('');
							$('section#w8 #w8-profile input[name=firstname]').attr('readonly', false);
							$('section#w8 #w8-profile input[name=lastname]').val('');
							$('section#w8 #w8-profile input[name=lastname]').attr('readonly', false);
							$('section#w8 #w8-profile input[name=houseno]').val('');
							$('section#w8 #w8-profile input[name=area_council]').val('');
							$('section#w8 #w8-profile input[name=town]').val('');
						}
					}
				);
			}
			else if( index === 2){
				let id = $('section#w8 #w8-profile select[name=type_of_invoice]').val();
				
				if(parseInt(id)){
					if($('section#w8 #w8-profile input[name=form_category]').val() === "onetime"){
						let html = '<option value="">N/A</option>';
						$('section#w8 #w8-category select[name=cat1]').closest('.form-group').nextAll().css('display','none');
						ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
							{'table': 'product_category1', 'id': id},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									for(let i=0; i<result.data.length; i++){
										html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
									}
									$('section#w8 #w8-category select[name=cat1]').html(html);
								}
							}
						);
					}else if($('section#w8 #w8-profile input[name=form_category]').val() === "busocc"){
						let html = '<option value="">N/A</option>';
						ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
							{'table': 'product_category1', 'id': id},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									for(let i=0; i<result.data.length; i++){
										html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
									}
									$('section#w8 #w8-billing select[name=cat1]').html(html);
								}
							}
						);
					}else{
						
					}
					
				}else{
					
				}
				
			}
			else if( index === 3){ //generate payment amount
				if($('section#w8 #w8-profile input[name=form_category]').val() === "onetime"){
					let categories = [];
					$('section#w8 #w8-category select.valid').each(function(i, el){
						categories.push({
							'name': $(el).attr('name'),
							'id': $(el).val(),
							'text': $(el).find('option:selected').text()
						});
					});
					if( categories.length === 6){
						$('#error_notif').css('display', 'none');
						$('#error_notif').html('');
						let pricetag;
						for(let i=categories.length - 1; i>=0; i--){
							if(categories[i].text.toLowerCase() !== 'none' && categories[i].text.toLowerCase() !== "n/a"){
								pricetag = categories[i];
								break;
							}
						}
						console.log('pricetag ', pricetag);
						ajaxHandler(null, "/awma_erms_test/Invoice/get_onetime_invoice_pricing", "POST",
							{'id': pricetag.id, 'column': mapping[pricetag.name].column},
							function(result){
								if(result.status === "success" && result.data.length > 0){
									let price = Number.parseFloat(result.data[0].price1);
									if(price){
										$('section#w8 #w8-payment input[name=amount]').attr('price_id', result.data[0].id);
										$('section#w8 #w8-payment input[name=amount]').val(price);
										$('section#w8 #w8-payment input[name=amount]').attr('readonly', true);
									}
									else {
										$('section#w8 #w8-payment input[name=amount]').attr('price_id', 0);
										$('section#w8 #w8-payment input[name=amount]').val('');
										$('section#w8 #w8-payment input[name=amount]').attr('readonly', false);
									}
								}
							}
						);
					}
					else {
						$('#error_notif').css('display', 'block');
						$('#error_notif').html('Please select all 6 categories');
						return false;
					}
				}else if($('section#w8 #w8-profile input[name=form_category]').val() === "busprop"){

				}else{

				}

			}
			else if( index === 4){//confirmation
				let categories = [];
				$('section#w8 #w8-category select.valid').each(function(i, el){
					categories.push({
						'name': $(el).attr('name'),
						'id': $(el).val(),
						'text': $(el).find('option:selected').text()
					});
				});
				$('section#w8 #w8-confirm input[name=c_ownership_type]').val( $('section#w8 #w8-owner-info select[name=ownership_type]').val() );
				$('section#w8 #w8-confirm input[name=c_phone_number]').val( $('section#w8 #w8-owner-info input[name=phonenumber]').val() );
				$('section#w8 #w8-confirm input[name=c_firstname]').val( $('section#w8 #w8-profile input[name=firstname]').val() );
				$('section#w8 #w8-confirm input[name=c_lastname]').val( $('section#w8 #w8-profile input[name=lastname]').val() );
				$('section#w8 #w8-confirm input[name=c_company]').val( $('section#w8 #w8-profile input[name=company]').val() );
				$('section#w8 #w8-confirm input[name=c_house_number]').val( $('section#w8 #w8-profile input[name=houseno]').val() );
				$('section#w8 #w8-confirm input[name=c_area_council]').val( $('section#w8 #w8-profile select[name=area_council] option:selected').text() );
				$('section#w8 #w8-confirm input[name=c_town]').val( $('section#w8 #w8-profile select[name=town] option:selected').text() );
				let toi_code = $('section#w8 #w8-profile select[name=type_of_invoice] option:selected').attr('code');
				let toi_text = $('section#w8 #w8-profile select[name=type_of_invoice] option:selected').text();
				$('section#w8 #w8-confirm input[name=c_type_of_invoice_code]').val(toi_code);
				$('section#w8 #w8-confirm input[name=c_type_of_invoice]').val( toi_text );
				$('section#w8 #w8-confirm input[name=c_category1]').val( categories[0].text );
				$('section#w8 #w8-confirm input[name=c_category2]').val( categories[1].text );
				$('section#w8 #w8-confirm input[name=c_category3]').val( categories[2].text );
				$('section#w8 #w8-confirm input[name=c_category4]').val( categories[3].text );
				$('section#w8 #w8-confirm input[name=c_category5]').val( categories[4].text );
				$('section#w8 #w8-confirm input[name=c_category6]').val( categories[5].text );
				$('section#w8 #w8-confirm input[name=c_price_id]').val( $('section#w8 #w8-payment input[name=amount]').attr('price_id') );
				$('section#w8 #w8-confirm input[name=c_amount]').val( $('section#w8 #w8-payment input[name=amount]').val() );
			}
			console.log('tab ', tab);
			// console.log('navigation ', navigation);
			console.log('index ', index);
			// console.log('newindex ', newindex);
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var $total = navigation.find('li').length - 1;
			$w8finish[ newindex != $total ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w8').find(this.nextSelector)[ newindex == $total ? 'addClass' : 'removeClass' ]( 'hidden' );
		},
		onTabShow: function( tab, navigation, index ) {
			var $total = navigation.find('li').length - 1;
			var $current = index;
			var $percent = Math.floor(( $current / $total ) * 100);
			$('#w8').find('.progress-indicator').css({ 'width': $percent + '%' });
			tab.prevAll().addClass('completed');
			tab.nextAll().removeClass('completed');
		}
	});

	$(document).on('change','section#w8 #w8-category select',function(e){
		let name = $(this).attr('name');
		let id = $(this).val();
		console.log('name ', name, 'id ', id);

		$('section#w8 #w8-category select[name=' + name + ']').closest('.form-group').nextAll().css('display','none');
		let html = '<option value="">N/A</option>';
		ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category", "POST",
			{'table': mapping[name].table, 'id': id, 'column': mapping[name].column},
			function(result){
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
				}
				$('section#w8 #w8-category select[name=' + name + ']').closest('.form-group').next().css('display', 'flex');
				$('section#w8 #w8-category select[name=' + name + ']').closest('.form-group').next().find('select').html(html);
			}
		);
	});

	$(document).on('change','section#w8 #w8-billing select',function(e){
		
		let name = $(this).attr('name');
		let id = $(this).val();
		console.log('name ', name, 'id ', id);
		if(name == "cat1" || name == "cat2"|| name == "cat3" || name == "cat4" || name == "cat5"|| name == "cat6"){
			let html = '<option value="">N/A</option>';
			ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category", "POST",
			{'table': mapping[name].table, 'id': id, 'column': mapping[name].column},
			function(result){													
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
				}
				$('section#w8 #w8-billing select[name=' + name + ']').closest('.col-sm-4').next().find('select').html(html);
			}
			);
		}else{

		}
		
	});

	$(document).on('change','section#w8 #w8-billing select[name=category]',function(e){
		let id = $('section#w8 #w8-billing select[name=category]').val();
		let html = '<option value="">N/A</option>';
		ajaxHandler(null, "/awma_erms_test/Invoice/get_product_category1", "POST",
			{'table': 'product_category1', 'id': id},
			function(result){
				if(result.status === "success" && result.data.length > 0){
					for(let i=0; i<result.data.length; i++){
						html += `<option value=${result.data[i].id}>${result.data[i].name}</option>`;
					}
					$('section#w8 #w8-billing select[name=cat1]').html(html);
				}
			}
		);	
	});


	

}).apply(this, [jQuery]);
