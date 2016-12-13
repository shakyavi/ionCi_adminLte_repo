$(function () {
    "use strict";
$("input.switch").bootstrapSwitch();

$('.ajax-toggle.switch').on('switchChange.bootstrapSwitch', function(event, state) {
    var _this = this,
        _url = $(this).data('toggle-href'),
        _id = $(this).data('id');
    $.ajax({
        url:_url,
        data:{id:_id,status: state},
        type : 'POST',
        success: function(data) {
            if(data.status == 'ok') {
                var _title = 'Success',
                    _msg = (typeof data.message != "undefined") ?data.message: 'Data has been updated';
            } else {
                var _title = 'Error',
                    _msg = (typeof data.message != "undefined" )?data.message: 'Error occured';
                    $(_this).bootstrapSwitch('toggleState',true);
            }
            $.gritter.add({
                title: _title,
                time: 3000,
                text: _msg
            });                
            
        }
    });
});

$('.img-popup').fancybox();

//datatables
$.extend( $.fn.dataTable.defaults, {
        "iDisplayLength": 20, 
        "sPaginationType": "bootstrap",
        "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
    } );
$('#section_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});
$('#feedback_tbl').dataTable({});
	
$('#company_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});	
$('#rewards_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});
	
$('#page_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});
	
$('#product_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});
$('#calendar_tbl').dataTable({    
        "sPaginationType": "bootstrap",
        "aoColumns": [
        null,
        null,
        null,
        null,
        {"bSortable": false},
      ]
        
});
$('#user_tbl').dataTable({    
        "sPaginationType": "bootstrap",
        "aoColumns": [
        null,
        null,
        null,
        null,
        {"bSortable": false,"bSearchable":false},
      ]
        
});
	
$('#advertisement_tbl').dataTable({    
        "sPaginationType": "bootstrap"
});
$('#order_tbl').dataTable({    
        "sPaginationType": "bootstrap",
		"aaSorting": [[ 0, "desc" ]],
                
});

$('#location_tbl').dataTable({
        "aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {"bSortable": false,"bSearchable": false},
        ],
        "aLengthMenu": [
            [10, 20, 50, 100],
            [10, 20, 50, 100] // change per page values here
        ],
        // set the initial value
        "iDisplayLength": 10,
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [{
                'aTargets': [0]
            }
        ],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/location/listAjax"
    });
});