<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("login/userLoggedIn/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                                                            <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("login/userLoggedIn/deactivate/".$user->id, lang('index_active_link')) : anchor("login/userLoggedIn/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("login/userLoggedIn/edit_user/".$user->id, 'Edit') ;?></td>
                        		</tr>
	<?php endforeach;?>
</table>
<!--create group-->
<p><?php echo anchor('register/create_user', lang('index_create_user_link'))?> | <?php echo anchor('login/userLoggedIn/create_group', lang('index_create_group_link'))?></p>
<!--logout button-->
<!--<br><br><input type ="button" name="LogOut" value="Log Out" onclick="location.href='logout'">-->
<br><br>
  <input type="button" value="LOG OUT" onclick="location.href='<?php echo base_url();?>index.php/login/userLoggedIn/logout'">
<!--<br><br><input type ="button" name="register" value="Register" onclick="location.href='<?php// echo base_url();?>index.php/register'">-->

<!--<br><br><input type ="button" name="cr_group" value="Create Group" onclick="location.href='UserLoggedIn/create_group'">-->

