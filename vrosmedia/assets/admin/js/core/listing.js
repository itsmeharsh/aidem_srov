$(document).ready(function()
{
    $("button .ui-dialog-titlebar-close").hide();
    

    if($('.user_results').length > 0){
        var div = 'user_results';        
        var controller = 'user';
        var response_url = 'user/lists';
        list(div,response_url);        
    }
    
    function list(z,response_url)
    {
     
        var oTable = $('.'+div).dataTable
        ({
            "bProcessing": true,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "iDisplayLength" : "25",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            aLengthMenu: [[25, 50, 75, 100, -1], [25, 50, 75, 100, 'All']],
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }],
            'bServerSide': true,
            "bDeferRender": true,
            'sAjaxSource': SITE_URL+response_url,
            'fnRowCallback': function( nRow, aData ) {

                  var $nRow = $(nRow);
                  var vLoginDate = aData[2]; 
                  jQuery($nRow).find("td:eq(3)").empty().append("<code>"+aData[3]+"</code>");
                  if (vLoginDate==="0000-00-00 00:00:00") {
                    jQuery($nRow).find("td:eq(2)").empty().append('n/a');                   
                     nRow[2]='n/a';
                  }
                

                  return nRow;
          },
            "fnServerData": function(sSource, aoData, fnCallback) {

                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback

                });
            }
        });
        
        
        
        
        

        
        $(document).on("click", '.changeStatus', function (e) {
             e.preventDefault();
            $("#alertNotification").html('');
            // $("#fadeMeWaitingDiv").show();

            var recID = $(this).attr('id');
            var $this = jQuery(this);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: SITE_URL + controller + '/status/' + recID,
                success: function (res) {
                    oTable.fnDraw();
                    if (res.result == 'success') {
                        $("#alertNotification").addClass('note-success');

                    } else {
                        $("#alertNotification").addClass('note-danger');
                    }
                    // $("#fadeMeWaitingDiv").hide();
                    $("#alertNotification").show();
                    $("#alertNotification").html(res.message);
                    setTimeout(function(){ 
                        $("#alertNotification").hide();
                    }, 3000);

                }
            })
            return false;
        });

        $(document).on("click", '.deleteAction', function (e) {
            //alert(67);
            $("#alertNotification").html('');
            var recID = $(this).attr('id');
            var $this = jQuery(this);
            var r = confirm("Are you sure want to Delete this?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: SITE_URL + controller + '/remove/' + recID,
                    success: function (res) {

                        oTable.fnDraw();
                        if (res.result == 'success') {
                            $("#alertNotification").addClass('alert-success');

                        } else {
                            $("#alertNotification").addClass('alert-danger');
                        }
                        // $("#fadeMeWaitingDiv").hide();
                        $("#alertNotification").show();
                        $("#alertNotification").html(res.message);

                        setTimeout(function(){ 
                            $("#alertNotification").hide();
                        }, 3000);
                    }
                })
            } else {
                e.preventDefault();
                return false;
            }    
           
            return false;
        });


        $(document).on("click", '.loadPage', function (e) {
             e.preventDefault();

            var href = $(this).attr('href');
            var $this = jQuery(this);
            $.ajax({
                type: "POST",
                url: href,
                success: function (res) {
                    $('.page-content').html(res);
                }
            })
            return false;
        });

    

    }    
});