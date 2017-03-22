 $(document).ready(function() {

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
                form.setAttribute("action", site_url + 'salleadherant');

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

    
    $("#table_salle_id").change(function(e) {
          var salle_id = $(this).val();
          window.location.href = site_url + 'salleadherant/salle/' + salle_id;
    }); 







 }); // End of document
