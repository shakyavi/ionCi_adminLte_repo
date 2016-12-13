
<div class="col-lg-12">
	<?php //$this->load->view('admin/list'); ?>
    <div class="box">
	<header>
		<div class="icons"><i class="fa fa-table"></i></div>
		<h5><?php echo $title?></h5>
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
		<table class="table table-bordered table-condensed table-hover table-striped dataTable" id="section_tbl">
		  <thead>
			<tr>
				<th style="width:30px;" >#</th>
				<th>Section </th>
				<th>Parent Section</th>
				<th style="width:85px;" >Status</th>
				<th style="width:90px;" >Action</th>
				<th>Type</th>
			</tr>
		  </thead>

		<tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php if($sections): ?>
				<?php foreach($sections as $key=>$val): ?>
			<tr class="odd">
				<td><?php echo ++$key; ?></td>
				<td><?php echo $val->title; ?></td>
				<td><?php echo $val->parent_section; ?></td>
                                <td style="text-align: center;"><input type="checkbox"  <?php echo $val->status ? "checked": ''; ?> class="ajax-toggle switch" data-toggle-href="<?php echo base_url('admin_sections/ManageSections/toggle_status/'); ?>" data-id="<?php echo $val->id; ?>" data-size="mini" data-on-color="success" data-off-color="danger" ></td>
				<td style="text-align: center;">
					<!--<a href="<?php // echo base_url('admin/sections/orders/'.$val->section_id); ?>" class="btn btn-default btn-xs btn-round" data-toggle="tooltip" title="Orders"><i class="fa fa-shopping-cart"></i> </a>-->
					<a href="<?php echo base_url('index.php/admin_sections/ManageSections/edit/'.$val->id); ?>" class="btn btn-default btn-xs btn-round" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
					<!--<a href="<?php // echo base_url('admin/section/delete/'.$val->id); ?>" class="btn btn-default btn-xs btn-round" onclick='if(!confirm("Are you sure to delete?")) return false;' data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i> </a>-->
				</td>
                                <td><?php echo $val->type !== '2' ? 'default' : 'user defined'?></td>
			</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		</table>
                <ul class="pagination">
            <li><?php echo $this->pagination->create_links();?></li>
            </ul>
		
	</div>
</div>
</div>