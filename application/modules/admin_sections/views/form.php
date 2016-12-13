<div class="col-lg-12">
	<div class="box">
	<header>
		<div class="icons"><i class="fa fa-edit"></i></div>
		<h5><?php echo $edit ? 'Edit' : 'Add'; ?> section</h5>
		<div class="toolbar">
		  <nav style="padding: 8px;">
			<a class="btn btn-default btn-xs collapse-box" href="javascript:;">
			  <i class="fa fa-minus"></i>
			</a> 
			<a class="btn btn-default btn-xs full-box" href="javascript:;">
			  <i class="fa fa-expand"></i>
			</a> 
		  </nav>
		</div>
	</header>
	<div class="body">
		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		  <div class="form-group <?php echo form_error('title')?'has-error':''?>">
			<label for="title" class="control-label col-lg-3">Title *</label>
			<div class="col-lg-7">
				<input type="text" id="title" placeholder="Title" name="title" class="form-control" value="<?php echo set_value("title", $edit ? $section_detail->title : ''); ?>" >
				<?php echo form_error('title'); ?>
			</div>
		  </div>
		  <div class="form-group">
			<label for="parent_id" class="control-label col-lg-3">Parent Section *</label>
			<div class="col-lg-7">
				<?php echo $parent_sections; ?>
				<?php echo form_error('parent_id'); ?>
			</div>
		  </div><!-- /.form-group -->
<!--		  <div class="form-group <?php // echo form_error('content')?'has-error':''?>">
			<label for="content" class="control-label col-lg-3">Content</label>
			<div class="col-lg-7">
				<textarea id="content" placeholder="Content" name="content" class="form-control" ><?php // echo set_value("content", $edit ? $section_detail->content : ''); ?></textarea>
				<?php // echo form_error('content'); ?>
			</div>
		  </div>		  -->
		  <div class="form-group">
			<label for="status" class="control-label col-lg-3">Status *</label>
			<div class="col-lg-7">
				<input type="checkbox" name="status" class="switch switch-small"  value="1" <?php echo set_checkbox('status', '1', ($edit) ? ($section_detail->status ? TRUE : FALSE) : TRUE); ?> data-on-color="success" data-off-color="danger" >
				<?php echo form_error('status'); ?>
			</div>
		  </div><!-- /.form-group -->
		  <div class="form-group">
			  <div class="col-sm-offset-3 col-sm-8"><input type="submit" name="submit" class="btn btn-primary" value="Submit" />
				  <?php echo anchor('admin_sections/ManageSections', 'Cancel', 'class="btn btn-warning"'); ?>
			  </div>
		  </div>
		</form>		
	</div>
</div>
</div>