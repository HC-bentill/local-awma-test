<script>
	$(document).ready(function(){
		check_busprop_code();
	    validate_business_code();

		var area = $("#area_council").val();
	    var townn = $("#townn").val();
	    //alert(classes);
	    // AJAX request
	    $.ajax({
	        url:"<?php echo base_url().'Residence/get_area_towns';?>",
	        method: "POST",
	        data: {area: area},
	        dataType: "JSON",
	        success: function(response){

	            // Remove options
	            $('#town').find('option').not(':first').remove();

	            // Add options
	            $.each(response,function(index,data){
	                $('#town').append('<option value="'+data['id']+'">'+data['town']+'</option>');
	            });

	            $('[name=town] option').filter(function() {
	                return ($(this).val() == townn);
	            }).prop('selected', true);
	        },

	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert("error");

	        }
		});
	});
</script>