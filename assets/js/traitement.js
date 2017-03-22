 $(document).ready(function() {

    $('#traitement_date_start').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
            format: 'DD/MM/YYYY'
          }    
    });

    $('#traitement_date_end').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
            format: 'DD/MM/YYYY'
          }    
    });

    $('#traitement_next_rendez_vous').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
            format: 'DD/MM/YYYY'
          }    
    });

    $('#table_data').dataTable({
        "pageLength": 100,
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
        responsive: true,
        keys: true
    });
    
    $('#check_all').click(function(e) {
        if($('#check_all:checked').val()) {
          $('.check_item').prop('checked', true);
        } else {
          $('.check_item').prop('checked', false);
        }
    });


    $('.btn_delete').click(function(e) {
        e.preventDefault();
        var traitement_id = $(this).attr('data-id');
        var re = confirm('Êtes vous sûr de vouloir supprimer ce traitement?');
        if(re) {
          window.location.href = site_url + 'traitement/delete/' + traitement_id;
        }
    });



    // Delete many
    $('#btn_delete_many').click(function(e) {
        e.preventDefault();
        var items = $('.check_item');
        var items_checked = [];

        for(var k = 0; k < items.length; k++) {
                if(items[k].checked)
                  items_checked.push(items[k]);
        }

        if(items_checked.length <= 0)
            return;
        
        if(items_checked.length > 1)
             re = confirm('Êtes vous sûr de vouloir supprimer les traitements sélectionnés?');
        else
            re = confirm('Êtes vous sûr de vouloir supprimer ce traitement sélectionné?');

        if(re) {
            $(this).html('Suppression en cours...');
            var form = document.createElement("form");
                form.setAttribute("method", 'post');
                form.setAttribute("action", site_url + 'traitement/delete-many');

            for(var i = 0; i < items_checked.length; i++) {
              if(items_checked[i].checked) {
                var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", 'items_checked[]');
                    hiddenField.setAttribute("value", items_checked[i].value);
                    form.appendChild(hiddenField);
              }
            }
            
            document.body.appendChild(form);
            form.submit();
        }

    });

    
    $("#table_malade_id").change(function(e) {
          var traitement_id = $(this).val();
          window.location.href = site_url + 'traitement/malade/' + traitement_id;
    }); 

    $("#malade_id").select2({
          placeholder: "Séléctionné un malade"
    });

    $("#article_id").select2({
          placeholder: "Séléctionné un malade"
    });

    $("#table_malade_id").select2({
          placeholder: "Séléctionné un malade"
    });





 }); // End of document
