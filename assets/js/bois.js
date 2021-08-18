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


    
    $('.btn_delete').click(function(e) {
        e.preventDefault();
        var bois_id = $(this).attr('data-id');
        var re = confirm('Êtes vous sûr de vouloir supprimer ce bois?');
        if(re) {
            window.location.href = site_url + 'bois/delete/' + bois_id;
        }
    });

    $('#importFileExcel').change(function(e) {
      $("#form_import_excel").submit();
      //window.location.href = site_url + 'professeur/importexcel/' + adherant_id;
      $('#btn_select_file_excel').html('Importation en cours...');
    });

    $('#btn_select_file_excel').click(function(e) {
        //$(this).html('Importation en cours...');
    });
    
    $('#check_all').click(function(e) {
        if($('#check_all:checked').val()) {
          $('.check_item').prop('checked', true);
        } else {
          $('.check_item').prop('checked', false);
        }
    });


    // Delete many adherants
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
             re = confirm('Êtes vous sûr de vouloir supprimer les bois sélectionnés?');
        else
            re = confirm('Êtes vous sûr de vouloir supprimer ce bois sélectionné?');

        if(re) {
            $(this).html('Suppression en cours...');
            var form = document.createElement("form");
                form.setAttribute("method", 'post');
                form.setAttribute("action", site_url + 'bois/delete-many');

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


 
    // Send SMS
    $('#btn_send_sms').click(function(e) {
          e.preventDefault();
          var items = $('.check_item');
          var items_checked = [];
       
          for(var k = 0; k < items.length; k++) {
              if(items[k].checked)
                items_checked.push(items[k]);
          }

          if(items_checked.length <= 0)
            return;

          var form = document.createElement("form");
              form.setAttribute("method", 'post');
              form.setAttribute("action", site_url + 'bois/sms');

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

    var maxLength = 160;
    $('#sms_body').keyup(function() {
        var length_init = $(this).val().length;
        var length = $(this).val().length;
        var length = maxLength - length;
        if(length < 0) {
            var count_sms = length_init / maxLength;
            count_sms = Math.ceil(count_sms);
            $('#chars').text(count_sms + ' SMS');
            return;
        }
        $('#chars').text(length + ' caractères restants');
    });
    

  function check_sms_sending_processing() {
    $.ajax({
        type: "GET", 
        url: site_url + "bois/sms-sending-state", 
        data: {},
        dataType: "json",
        error: function (xhr, request, error) {
            console.log(xhr.responseText);
        },
        success: function(response) {
            if(response.success === false) {
                console(response.message);     
            } else {
              $("#verbose").html(response.message);
            }
        },
        complete: function() {
            //
        }
            
    }); // End ajax function

  }



  //$("#btn_sent_sms").click(function(e) { 
  $("#form_sms").submit(function(e) {
      e.preventDefault();
      e.stopPropagation();

      $("#btn_sent_sms").html("Envoie en cours. Veuillez patientez svp...");
      $("#btn_sms_cancel").prop('disabled', true);
      $("#btn_sent_sms").prop('disabled', true);

      $("#list_numbers").prop('readonly', true);
      $("#sender_name").prop('readonly', true); 
      $("#sms_body").prop('readonly', true);

      //var refreshIntervalId = setInterval(check_sms_sending_processing, 1000);        

      $.ajax({
        type: "POST", 
        url: site_url + "bois/send-sms-process", 
        data: $("#form_sms").serialize(),
        dataType: "json",
        error: function (xhr, request, error) {
                console.log(xhr.responseText);
        },
        success: function(response) {
            if(response.success === false) {
                alert(response.message);     
            } 
        },
        complete: function() {
            $("#btn_sent_sms").html("Envoyer");
            $("#btn_sms_cancel").prop('disabled', false);
            $("#btn_sent_sms").prop('disabled', false);

            $("#list_numbers").prop('readonly', false);
            $("#sender_name").prop('readonly', false); 
            $("#sms_body").prop('readonly', false);

            //clearInterval(refreshIntervalId);

            //window.location.reload(); 
        }
            
      }); // End ajax function

      return false;

    }); // End send sms process


    
    $("#table_bois_id").change(function(e) {
          var bois_id = $(this).val();
          window.location.href = site_url + 'bois/' + bois_id;
    }); 







 }); // End of document
