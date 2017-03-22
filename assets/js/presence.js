 $(document).ready(function() {

    $("#adherants_selected").select2({
        placeholder: "Adhérants"
        //allowClear: true
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
        
      
            $(this).html('Ajout en cours...');
            var form = document.createElement("form");
                form.setAttribute("method", 'post');
                form.setAttribute("action", site_url + 'presence');

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
        

    });

    
    $("#table_programme_id").change(function(e) {
          var programme_id = $(this).val();
          window.location.href = site_url + 'presence/programme/' + programme_id;
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
                var option = '<option></option>';
                $.each(data, function() {
                  option += '<option value="'+this['semaine_id']+'" checked="checked">'+this['semaine_libelle']+'</option>';
                });
                $("#semaine_id").append(option);       
            }
        }            
            
     });

   });


  $('#semaine_id').change(function(e) {
        var semaine_id = $(this).val();
        $.ajax({
        type: "GET",
        url: site_url + "meditation/getAllBySemaineId/", 
        async: true,
        data: {'semaine_id': semaine_id},                                           
        dataType: "json", 
        error: function(xhr, request, error) { 
            console.log(xhr.responseText); 
        },
        success: function(response) { 
            if(response.success === false) { 
                console.log(response.message); 
            } else {
                var data = response.data;
                $("#meditation_id").html("");
                $.each(data, function() {
                  var option = '<option value="'+this['meditation_id']+'" checked="checked">'+this['meditation_theme']+'</option>';
                  $("#meditation_id").append(option);
                });       
            }
        }            
            
     });

   });  





 }); // End of document
