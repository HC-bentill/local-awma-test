<?php if($title == "Invoice Distribution"):?>
  <script>
    $(document).ready(function(){

      if($("#electoral_area").val()){
        var area = <?=$electoral_area?>;
        var town = <?=$town?>;
        
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
                    return ($(this).val() == town);
                }).prop('selected', true);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert("error");
            }
        });
      }
    });

  </script>
<?php endif;?>
<script type="text/javascript">
  $('#electoral_area').change(function(){
      var area = $(this).val();
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
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert("error");
          }
      });
  });
</script>
<?php if($title == "Batch Print Invoice"):?>
<script type="text/javascript">
  $('#product').change(function(){
    if($("#product").val() != ""){
      var product = $(this).val(); 
      // alert("love you");
      // AJAX request
      $.ajax({
        url:"<?php echo base_url().'Invoice/get_product_category';?>",
        method: "POST",
        data: {id: product, table: "product_category1", column: "product_id"},
        dataType: "JSON",
        success: function(response){
            // Remove options
            $('#category1').find('option').not(':first').remove();

            // Add options
            $.each(response,function(index,data){
                $('#category1').append('<option value="'+data['id']+'">'+data['name']+'</option>');
            });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert("error");
        }
      });
    }
  });
</script>
<?php endif; ?>
<script type="text/javascript">
	$(document).on('change', '#amount_type', function() {

		var state = $('#amount_type').val();
		if (state == "fixed_amount") {
			document.getElementById("amount").style.display = "inline-block";
		} else if (state == "fee_fixing") {
			document.getElementById("amount").style.display = "none";
		} else {
			document.getElementById("amount").style.display = "none";
		}
	});
</script>

<script>
      function delete_modal(id, batch_no) {
        // alert(id);
        // document.getElementById("#code").textContent=id;
        $('#code').html(batch_no);
        $('#batch_no').val(batch_no);
        $('#bi_id').val(id);
        jQuery('#delete_batch_invoice_modal').modal('show', {
          backdrop: 'static'
        });

      }
</script>
<?php if($title == "Special Batch Print Invoice"):?>
<script type="text/javascript">
  //   $('#bill_type').change(function(){
  //     var product = $(this).val();
  //     // AJAX request
  //   $.ajax({
  //       url:"<?php echo base_url().'Invoice/get_all_prop_codes';?>",
  //       method: "POST",
  //       data: {product: product},
  //       dataType: "JSON",
  //       beforeSend: function(){
  //         $("div.spanner").addClass("show");
  //         $("div.overlay").addClass("show");
  //         },
  //       complete: function(){
  //         $("div.spanner").removeClass("show");
  //         $("div.overlay").removeClass("show");
  //         },
  //       success: function(response){

  //           // first stringify the variable
  //           var data = JSON.stringify(response);

  //           //store the data in the key variable
  //           localStorage.setItem('property_codes',data);

  //           //retrieve the stored data
  //           var res = JSON.parse(localStorage.getItem('property_codes'));
  //           // console.log('response: ',res);
            
  //           // Remove options
  //           $('#prop_codes').find('option').not(':first').remove();

  //           // Add options
  //           $.each(res,function(index,data){
  //               $('#prop_codes').append('<option value="'+data['property_code']+'">'+data['property_code']+'</option>');
  //           });
  //       },
  //       error: function (jqXHR, textStatus, errorThrown)
  //       {
  //         alert("error");
  //       }
  //   });

  // });
</script>

<script type="text/javascript">
 // Pass single element
 

  const element =  document.getElementById("prop_codes");
  const choices = new Choices(element);

  // Pass reference
  const choices = new Choices('[data-trigger]');
  const choices = new Choices('.js-choice');

  // Pass jQuery element
  const choices = new Choices($('.js-choice')[0]);

  // Passing options (with default options)
  const choices = new Choices(element, {
    silent: false,
    items: [],
    choices: [],
    renderChoiceLimit: -1,
    maxItemCount: -1,
    addItems: true,
    addItemFilter: null,
    removeItems: true,
    removeItemButton: false,
    editItems: false,
    allowHTML: true,
    duplicateItemsAllowed: true,
    delimiter: ',',
    paste: true,
    searchEnabled: true,
    searchChoices: true,
    searchFloor: 1,
    searchResultLimit: 4,
    searchFields: ['label', 'value'],
    position: 'auto',
    resetScrollPosition: true,
    shouldSort: true,
    shouldSortItems: false,
    sorter: () => {...},
    placeholder: true,
    placeholderValue: null,
    searchPlaceholderValue: null,
    prependValue: null,
    appendValue: null,
    renderSelectedChoices: 'auto',
    loadingText: 'Loading...',
    noResultsText: 'No results found',
    noChoicesText: 'No choices to choose from',
    itemSelectText: 'Press to select',
    addItemText: (value) => {
      return `Press Enter to add <b>"${value}"</b>`;
    },
    maxItemText: (maxItemCount) => {
      return `Only ${maxItemCount} values can be added`;
    },
    valueComparer: (value1, value2) => {
      return value1 === value2;
    },
    classNames: {
      containerOuter: 'choices',
      containerInner: 'choices__inner',
      input: 'choices__input',
      inputCloned: 'choices__input--cloned',
      list: 'choices__list',
      listItems: 'choices__list--multiple',
      listSingle: 'choices__list--single',
      listDropdown: 'choices__list--dropdown',
      item: 'choices__item',
      itemSelectable: 'choices__item--selectable',
      itemDisabled: 'choices__item--disabled',
      itemChoice: 'choices__item--choice',
      placeholder: 'choices__placeholder',
      group: 'choices__group',
      groupHeading: 'choices__heading',
      button: 'choices__button',
      activeState: 'is-active',
      focusState: 'is-focused',
      openState: 'is-open',
      disabledState: 'is-disabled',
      highlightedState: 'is-highlighted',
      selectedState: 'is-selected',
      flippedState: 'is-flipped',
      loadingState: 'is-loading',
      noResults: 'has-no-results',
      noChoices: 'has-no-choices'
    },
    // Choices uses the great Fuse library for searching. You
    // can find more options here: https://fusejs.io/api/options.html
    fuseOptions: {
      includeScore: true
    },
    labelId: '',
    callbackOnInit: null,
    callbackOnCreateTemplates: null
  });
<script>
<?php endif; ?>