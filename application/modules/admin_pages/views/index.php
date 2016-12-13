<div class="col-lg-12">
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
            <?php 
            //echo $count;
   //         echo "pg <br><br>";
    //var_dump(get_object_vars($pg[0]));
       //     echo "<br>pages <br><br><br>";
    //var_dump(get_object_vars($pages[0]));
            //echo implode(":", $pages);?>
    <div class="body">
        <table class="table table-bordered table-condensed table-hover table-striped" id="page_tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Page</th>
                    <th>Section</th>
                    <th style="width:85px;" >Status</th>
                    <th style="width:90px;" >Action</th>
                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php if ($pages): ?>
                    <?php foreach ($pages as $key => $val): ?>
                        <tr class="odd">
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo $val->page_title; ?></td>
                            <td><?php echo $val->section; ?></td>
                            <td class="center"><input type="checkbox"  <?php echo $val->page_status ? "checked" : ''; ?> class="ajax-toggle switch" data-toggle-href="<?php echo base_url('admin/pages/toggle_status/'); ?>" data-id="<?php echo $val->id; ?>" data-size="mini" data-on-color="success" data-off-color="danger" ></td>
                            <td class="center">
                                <a href="<?php echo base_url('index.php/admin_pages/ManagePages/edit/' . $val->id); ?>" class="btn btn-default btn-xs btn-round" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                               <a href="<?php echo base_url('index.php/admin_pages/ManagePages/delete/' . $val->id); ?>" class="btn btn-default btn-xs btn-round" onclick='if (!confirm("Are you sure to delete?"))
                                            return false;' data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <ul class="pagination pagination-sm">
            <li><?php echo $this->pagination->create_links();?></li>
            </ul>
    </div>
</div>
</div>