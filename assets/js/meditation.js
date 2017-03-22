 $(document).ready(function() {

    $('#meditation_date').daterangepicker({
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
        var meditation_id = $(this).attr('data-id');
        var re = confirm('Êtes vous sûr de vouloir supprimer cette meditation?');
        if(re) {
          window.location.href = site_url + 'meditation/delete/' + meditation_id;
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
             re = confirm('Êtes vous sûr de vouloir supprimer les meditations sélectionnées?');
        else
            re = confirm('Êtes vous sûr de vouloir supprimer cette meditation sélectionnée?');

        if(re) {
            $(this).html('Suppression en cours...');
            var form = document.createElement("form");
                form.setAttribute("method", 'post');
                form.setAttribute("action", site_url + 'meditation/delete-many');

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

    
    $("#table_semaine_id").change(function(e) {
          var semaine_id = $(this).val();
          window.location.href = site_url + 'meditation/semaine/' + semaine_id;
    });


    $('#programme_id').change(function(e) {
        var programme_id = $(this).val();
        $.ajax({
        type: "GET",
        url: site_url + "meditation/getAllByProgrammeId/", 
        async: true,
        data: {'programme_id': programme_id},                                           
        dataType: "json", 
        error: function(xhr, request, error) { 
            console.log(xhr.responseText); 
        },
        success: function(response) { 
            if(response.success === false) { 
                console.log(response.message); 
            } else {
                var data = response.data;
                $("#semaine_id").html("");
                $.each(data, function() {
                  var option = '<option value="'+this['semaine_id']+'" checked="checked">'+this['semaine_libelle']+'</option>';
                  $("#semaine_id").append(option);
                });       
            }
        }            
            
     });

  });  
  

  $('#table_programme_id').change(function(e) {
        var programme_id = $(this).val();
        $.ajax({
        type: "GET",
        url: site_url + "meditation/getAllByProgrammeId/", 
        async: true,
        data: {'programme_id': programme_id},                                           
        dataType: "json", 
        error: function(xhr, request, error) { 
            console.log(xhr.responseText); 
        },
        success: function(response) { 
            if(response.success === false) { 
                console.log(response.message); 
            } else {
                var data = response.data;
                $("#table_semaine_id").html("");
                var option = '<option value=""></option>';
                $.each(data, function() {
                  option += '<option value="'+this['semaine_id']+'">'+this['semaine_libelle']+'</option>';
                });

                $("#table_semaine_id").append(option);       
            }
        }            
            
     });

  });  






 }); // End of document
