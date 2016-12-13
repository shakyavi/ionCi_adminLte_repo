$(document).ready(function(){        
    $('#suburb').on('keyup',function() {
        if($.trim(this.value) == '')    $('#suburb_id').val(0);
    }).autocomplete({
        serviceUrl: base_url+'ajax/get_suburb_postcode/',
        minChars:3,
        onSelect: function(data){
            $(this).parent().find('#suburb_id').val(data.id);
            return false;
        }
    });        
});