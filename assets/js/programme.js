 $(document).ready(function() {

    $('#programme_date_start').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
            format: 'DD/MM/YYYY'
          }    
    });

    $('#programme_date_end').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
            format: 'DD/MM/YYYY'
          }    
    });

    $('#table_programmes').dataTable({
      "pageLength": 50,
        fixedHeader: true,
        dom: "Bfrtip",
        buttons: [ 
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
        ],
        responsive: true
    });


    
    $('.btn_delete').click(function(e) {
    	e.preventDefault();
    	var programme_id = $(this).attr('data-id');
    	var re = confirm('Êtes vous sûr de vouloir supprimer ce programme?');
    	if(re) {
    		window.location.href = site_url + 'programme/delete/' + programme_id;
    	}
    
    });

    $("#adherant_id").select2({
        placeholder: "Adhérants"
        //allowClear: true
    });


 });
