  
<form class="form-horizontal" method="POST" enctype="multipart/form-data">

<!--  title-->
          <div class="form-group <?php echo form_error('page_title') ? 'has-error' : '' ?>">
                    <label for="page_title" class="control-label col-lg-3">Title *</label>
                    <div class="col-lg-7">
                        <input type="text" id="page_title" placeholder="Name" name="page_title" class="form-control validate[required] " value="<?php echo set_value("page_title", $edit ? $page_detail->page_title : ''); ?>" >
                        <?php echo form_error('page_title'); ?>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="section_id" class="control-label col-lg-3">Section *</label>
                    <div class="col-lg-5">
                        <?php echo $sections; ?>
                        <?php echo form_error('section_id'); ?>
                    </div>
                </div><!-- /.form-group -->
                <div id='typeofcalendar' style='display: none'>
                    <div class="form-group">
                        <label for="type_of_calendar" class="control-label col-lg-3">Type of Calendar *</label>
                        <div class="col-lg-5">
                            <?php echo $type_of_calendar; ?>
                            <?php echo form_error('type_of_calendar'); ?>
                        </div>
                    </div><!-- /.form-group -->
                </div>
<!--Bin type-->
                <div class="form-group" >
                    <label for="bin_type" class="control-label col-lg-3">Bin Type *</label>
                    <div class="col-lg-5">
                        <?php echo $bin_type; ?>
                        <?php echo form_error('bin_type'); ?>
                    </div>
                </div><!-- /.form-group -->
<!--Bin color-->
                <div id='typeofbin' style='display: none'>
                    <div id='bin-color' >
                        <?php echo $bin_color ?>
                    </div>
                </div>
<!--Original ckeditor allowed and not allowed for calendar-->
        <div id="bin-detail" style='display: none'>
                    <div class="form-group <?php echo form_error('allowed') ? 'has-error' : '' ?>">
                        <label for="allowed" class="control-label col-lg-3">Allowed </label>
                        <div class="col-lg-9">
                            <textarea type="text" id="allowed" placeholder="Allowed" name="allowed" class="form-control"  ><?php echo set_value("allowed", $edit ? $page_detail->allowed : ''); ?></textarea>
                            <?php echo display_ckeditor('allowed'); ?>
                            <?php echo form_error('allowed'); ?>
                        </div>
                    </div>   
                    <div class="form-group <?php echo form_error('not_allowed') ? 'has-error' : '' ?>">
                        <label for="not_allowed" class="control-label col-lg-3">Not Allowed </label>
                        <div class="col-lg-9">
                            <textarea type="text" id="not_allowed" placeholder="Not Allowed" name="not_allowed" class="form-control"  ><?php echo set_value("not_allowed", $edit ? $page_detail->not_allowed : ''); ?></textarea>
                            <?php echo display_ckeditor('not_allowed'); ?>
                            <?php echo form_error('not_allowed'); ?>
                        </div>
                    </div>                   
                </div>
<!--bin-detail allowed and not allowed for calendar section
<div id="bin-detail" style='display: none'>
allowed
<div class="box">
     <label for="allowed" class="control-label col-lg-3">Allowed</label>
            <div class="box-header">
              <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
               tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
               /. tools 
            </div>
             /.box-header 
            <div class="box-body pad">
                             <textarea class="textarea" name="allowed" placeholder="Allowed" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </div>
not allowed
<div class="box">
     <label for="not_allowed" class="control-label col-lg-3">Not Allowed</label>
            <div class="box-header">
              <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
               tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
               /. tools 
            </div>
             /.box-header 
            <div class="box-body pad">
                             <textarea class="textarea" name="not_allowed" placeholder="Not Allowed" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </div>
 </div>-->
                <hr>
<!--detail-contents-->
                <div id="detail-contents" style="display: initial">
<!--short page description-->                    
                    <div class="form-group <?php echo form_error('page_description') ? 'has-error' : '' ?>">
                        <label for="page_description" class="control-label col-lg-3">Short Description</label>
                        <div class="col-lg-7">
                            <textarea type="text" id="page_description" placeholder="Short Description" name="page_description" class="form-control"  ><?php echo set_value("page_description", $edit ? $page_detail->page_description : ''); ?></textarea>
                            <?php echo form_error('page_description'); ?>
                        </div>
                             </div>
<!--Image upload-->
                   <div class="form-group  <?php echo @$logo_error ? 'has-error' : '' ?>">
                        <label for="page_image" class="control-label col-lg-3">Image </label>
                        <div class="col-lg-7">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select Image</span> 
                                    <span class="fileinput-exists">Change</span> 
                                    <input type="file" name="page_image">
                                </span> 
                                <span class="fileinput-filename"></span> 
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a> 
                                <?php echo @$logo_error; ?>
                            </div>
                            <?php if ($edit and $page_detail->page_image and file_exists(config_item('page_image_root') . $page_detail->page_image)): ?>
                                <div>
                                    <img src="<?php echo imager(config_item('page_image_path') . $page_detail->page_image, 128, 128); ?>" alt="product image" class="img-thumbnail">
                                    <!--<button style="background: none repeat scroll 0 0 #0189D3;color: #111;padding:0 2px;opacity: 0.5;position: absolute;" class="close" type="button" data-id="31" title="Delete image">×</button>-->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
<!--page content- wysihtml editor-->
<div class="box">
     <label for="page_content" class="control-label col-lg-3">Page Content</label>
            <div class="box-header">
              <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
               <!--tools box--> 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
               <!--/. tools--> 
            </div>
             <!--/.box-header--> 
            <div class="box-body pad">
              <!--<form>-->
                <textarea class="textarea" name="page_content" placeholder="Page Content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              <!--</form>-->
            </div>
</div>
                      </div>
<!--submit and cancel button-->
                     <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8"><input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                        <?php echo anchor('login/UserLoggedIn', 'Cancel', 'class="btn btn-warning"'); ?>
                    </div>
                </div>  
</form>


<div style="display: none;">
    <div id="cal-bin-opts"><?php echo $cal_bin_type_option?></div>
    <div id="waste-bin-opts"><?php echo $waste_bin_type_option?></div>
</div>
<!--original javascript-->
<script>
     var $blockObj = {css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }};

        //        $(document).ajaxStart($.blockUI($blockObj)).ajaxStop($.unblockUI);

        $(document).on('change', '#section_id', function() {
            var _val = $(this).val();
            if (_val == 2) {
                $('#typeofbin').slideDown();
                $('#typeofcalendar').slideUp();

                $('#bin-detail').slideUp();
                $('#detail-contents').slideDown();
                $('#bin_type').html($('#waste-bin-opts').html());
                update_bin_type_color($('#bin_type').val());
                

            } else if (_val == 3) {
                $('#typeofcalendar').slideDown();
                calendar_type_toggle($('#type_of_calendar').val());

                $('#typeofwaste').slideUp();
                $('#bin-detail').slideDown();
                
                $('#detail-contents').slideUp();
                $('#bin_type').html($('#cal-bin-opts').html());
                update_bin_type_color($('#bin_type').val());
                

            } else {
                $('#typeofwaste').slideUp();
                $('#typeofcalendar').slideUp();
                $('#typeofbin').slideUp();

                $('#bin-detail').slideUp();
                $('#detail-contents').slideDown();

            }
        });
        $(document).on('change', '#type_of_calendar', function() {
            var _cval = $(this).val();
            calendar_type_toggle(_cval);
        });

        $(document).on('change', '#bin_type', function() {
            update_bin_type_color($(this).val());

        });

        //check for type of calendar
        if ($('#type_of_calendar').val() == 1) {
//            $('#bin-detail').show();
        } else {
//            $('#bin-detail').hide();
        }
        // check for type of section
        if ($('#section_id').val() == 2) {
                $('#typeofbin').show();
//                $('#typeofcalendar').slideUp();
//
//                $('#bin-detail').slideUp();
//                $('#detail-contents').slideDown();
            
        } else if ($('#section_id').val() == 3) {
            
                $('#typeofcalendar').show();
                calendar_type_toggle($('#type_of_calendar').val());
                $('#bin-detail').show();
                $('#detail-contents').hide();
        } else {
            $('#typeofwaste').hide();
            $('#typeofcalendar').hide();
        }
        
        if($.trim($('#bin-color').text()) == "")
            update_bin_type_color($('#bin_type').val());

        $('#page_form').validationEngine();
    
    function update_bin_type_color(bin_type_id) {
        $.ajax({
            url: "<?php echo site_url('ajax/get_bin_type_color') ?>",
            data: {bin_type_id: bin_type_id,section_id: $('#section_id').val()},
            type: 'POST',
            beforeSend: function() {
                $.blockUI($blockObj);
            },
            success: function(data) {
                
                if (data.status == 'ok') {
                    $('#bin-color').html(data.html);
                    $.unblockUI();
                }

            }
        });

    }

    function calendar_type_toggle(val) {
        if (val == 1) {
            $('#typeofbin').slideDown();
        } else {
            $('#typeofbin').slideUp();
        }

    }
</script>
<!--<script>
//
//$(document).on('change',"#section_id", function(){
//    alert(this.value);
//    if(this.value==3){
//        $('#typeofcalendar').attr('style','display: initial');
//         $('#detail-contents ').attr('style','display: none');   
//        }
//});  
  var $blockObj = {css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }};
 
        //        $(document).ajaxStart($.blockUI($blockObj)).ajaxStop($.unblockUI);
 
        $(document).on('change', "#section_id", function() {
            var _val = $(this).val();
             alert("original = "+_val);    
            if (_val == 2) {
                  alert("original = "+_val);    
                $('#typeofbin').slideDown();
                $('#typeofcalendar').slideUp();
                    
                $('#bin-detail').slideUp();
                $('#detail-contents').slideDown();
                $('#bin_type').html($('#waste-bin-opts').html());
             
            update_bin_type_color($('#bin_type').val());
                 

            } else if (_val == 3) {
             
                $('#typeofcalendar').slideDown();
                calendar_type_toggle($('#type_of_calendar').val());

                $('#typeofwaste').slideUp();
                $('#bin-detail').slideDown();
                $('#detail-contents').slideUp();
                $('#bin_type').html($('#cal-bin-opts').html());
                update_bin_type_color($('#bin_type').val());
                   alert("original = "+_val);

            } else {
                  
                $('#typeofwaste').slideUp();
                $('#typeofcalendar').slideUp();
                $('#typeofbin').slideUp();

                $('#bin-detail').slideUp();
                $('#detail-contents').slideDown();
alert("original = "+_val);
            }
        });
       
    $(document).on('change', '#type_of_calendar', function() {
            var _cval = $(this).val();
            calendar_type_toggle(_cval);
        });

        $(document).on('change', '#bin_type', function() {
            update_bin_type_color($(this).val());

        });

        //check for type of calendar
        if ($('#type_of_calendar').val() == 1) {
            $('#bin-detail').show();
        } else {
            $('#bin-detail').hide();
        }
        // check for type of section
        if ($('#section_id').val() == 2) {
                $('#typeofbin').show();
//                $('#typeofcalendar').slideUp();
//
//                $('#bin-detail').slideUp();
//                $('#detail-contents').slideDown();
            
        } else if ($('#section_id').val() == 3) {
            
                $('#typeofcalendar').show();
                calendar_type_toggle($('#type_of_calendar').val());
                $('#bin-detail').show();
                $('#detail-contents').hide();
        } else {
            $('#typeofwaste').hide();
            $('#typeofcalendar').hide();
        }
        
        if($.trim($('#bin-color').text()) == "")
            update_bin_type_color($('#bin_type').val());

        $('#page_form').validationEngine();
   
    function update_bin_type_color(bin_type_id) {
         alert("update_bin_type_color func" + bin_type_id);
        $.ajax({
            url: "<?php echo base_url('index.php/ajax/get_bin_type_color') ?>",
            data: {bin_type_id: bin_type_id,section_id: $('#section_id').val()},
            type: 'POST',
            beforeSend: function() {
                $.blockUI($blockObj);
            },
            success: function(data) {
                
                if (data.status == 'ok') {
                    $('#bin-color').html(data.html);
                    $.unblockUI();
                }
                  
            }
        });
        }
        

//function is working
    function calendar_type_toggle(val) {
        alert("val = " + val);
        if (val == 1) {
            $('#typeofbin').slideDown();
        } else {
            $('#typeofbin').slideUp();
        }

    }
  </script>
  -->