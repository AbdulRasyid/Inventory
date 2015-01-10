<script>
	$(document).ready(function (){
		$('#userlist_area').hide().delay(3500).fadeIn();
		$('.s_delete').delay(3500).hide("slow");
		$('#front_cover').hide();
		$('#admin_list_area').hide();
	});
</script>
<article class="s_delete">
	<code class="check">
	</code>
	<h2>
		<?php echo $sucees_update;?>
	</h2><br>
	<h3 style="float: left;color: red;font-size: 13px">user<?php echo '&nbsp;'.$user_id;?>&nbsp;</h3>
	<p style="float: left">He/She will noe continue to use your system</p>
	</article>
<!---FRONT COVER-->
<div id="front_cover">
</div>
<!---END-->

<!--ADMINLIST-->
<script>
//admin
function update_admin(admin_id){
		var admin_id = admin_id;
		var username = $('#username_up_'+admin_id+'').val();
		var password = $('#password_up_'+admin_id+'').val();

		if(username == '' && password == '')
		{
			alert('all input are required required!');
			return false;
		}
		if(username == '')
		{
			alert('username required!');
			$('input#username_up_'+admin_id+'').focus();
			return false;
		}
		if(password == '')
		{
			alert('password required!');
			$('input#password_up_'+admin_id+'').focus();
			return false;
		}
		else
		{
			var location = '<?php echo base_url ();?>main_controller/update_admin/'+admin_id;
			$.ajax({
				type: "POST",
				url: location,
				data: {
					'username':username,
					'password':password
				},
				dataType: "json",
				success: function admin(){
					$('#username_up_'+admin_id+'').val('');
					$('#password_up_'+admin_id+'').val('');
					alert('acount has been Updated!');
				}
			});
		}
}
function delete_admin(admin_id){
    if(confirm('Are you sure you want to Delete this Admin'))
    {
        location.href = '<?php echo base_url ();?>main_controller/delete_admin/'+admin_id;
    }
}
</script>
<?php if($my_id == 1){?>
<div id="admin_list_area">
	<table>	
		<tr>
			<td colspan="6">
				<header><h2>ADMIN RECORDS</h2></header>
				(<?php echo $admin_list->num_rows();?>)Admin found in the list
			</td>
		</tr>
		<tr class="titles">
			<td class="top_title">Admin no</td>
			<td class="top_title">Name</td>
			<td class="top_title">Lastname</td>
			<td class="top_title">Username</td>
			<td class="top_title">Password</td>
			<td class="top_title">Action</td>
		</tr>
	<?php foreach($admin_list->result()as $admin):?>
		<?php
		if($admin_list->num_rows()==0)
		echo '<code>no admin found</code>';
		?>
		<?php
			$new_username = array('name'=>'my_new_username', 'id'=>'username_up_'.$admin->admin_id.'');
			$new_password = array('name'=>'my_new_password','id'=>'password_up_'.$admin->admin_id.'');
		?>
		<tr>
			<td class="id_list"><?php echo $admin->admin_id;?></td>
			<td class="info_list"><?php echo $admin->name;?></td>
			<td class="info_list"><?php echo $admin->lastname;?></td>
			<td class="info_list"><?php echo form_input($new_username); ?></td>
			<td class="info_list"><?php echo form_password($new_password); ?></td>
			<td class="info_list">
		<?php if($admin->admin_id == $my_id){?>
			<input type="submit" value="update" onclick="javascript: update_admin(<?php echo $admin->admin_id;?>)" />
			<input type="submit" class="del_btn" onclick="javascript: delete_admin(<?php echo $admin->admin_id;?>)" value="">
			</td>
		</tr>
		<?php }else{ ?>
			<input type="submit" value="update" disabled="disable" onclick="javascript: sorry(<?php echo $admin->admin_id;?>)" />
			<input type="submit" class="del_btn" onclick="javascript: delete_admin(<?php echo $admin->admin_id;?>)" value="">
	<?php } endforeach;?>
		<tr>
			<td class="bottom_space" colspan="6">
			</td>
		</tr>
	</table>
</div>		
<?php }else{;?>
<div id="admin_list_area">
	<table>	
		<tr>
			<td colspan="6">
				<header><h2>ADMIN RECORDS</h2></header>
				(<?php echo $admin_list->num_rows();?>)Admin found in the list
			</td>
		</tr>
		<tr class="titles">
			<td class="top_title">Admin no</td>
			<td class="top_title">Name</td>
			<td class="top_title">Lastname</td>
			<td class="top_title">Username</td>
			<td class="top_title">Password</td>
			<td class="top_title">Action</td>
		</tr>
	<?php foreach($admin_list->result()as $admin):?>
		<?php
		if($admin_list->num_rows()==0)
		echo '<code>no admin found</code>';
		?>
		<?php
			$new_username = array('name'=>'my_new_username', 'id'=>'username_up_'.$admin->admin_id.'');
			$new_password = array('name'=>'my_new_password','id'=>'password_up_'.$admin->admin_id.'');
		?>
		<tr>
			<td class="id_list"><?php echo $admin->admin_id;?></td>
			<td class="info_list"><?php echo $admin->name;?></td>
			<td class="info_list"><?php echo $admin->lastname;?></td>
			<td class="info_list"><?php echo form_input($new_username); ?></td>
			<td class="info_list"><?php echo form_password($new_password); ?></td>
			<td class="info_list">
		<?php if($admin->admin_id == $my_id){ ?>
			<input type="submit" value="update" onclick="javascript: update_admin(<?php echo $admin->admin_id;?>)" />
			</td>
		</tr>
		<?php }else{ ?>
			<input type="submit" value="update" disabled="disable" onclick="javascript: update_admin(<?php echo $admin->admin_id;?>)" />
		<?php } ;?>
	<?php endforeach;?>
		<tr>
			<td class="bottom_space" colspan="6">
			</td>
		</tr>
	</table>
</div>
<?php };?>
<!--END-->

<!---USERLIST-->
<script>
//user
function update_user(user_id){
	var user_id = user_id;
	var location = '<?php echo base_url ();?>main_controller/update_user/'+user_id;
	var username = $('.user_username_'+ user_id +'').val();
	var password = $('.user_password_'+user_id+'').val();
	
	if(username == '' && password == '')
		{
			alert('all input are required required!');
			return false;
		}
		if(username == '')
		{
			alert('username required!');
			$('input.user_username_'+ user_id +'').focus();
			return false;
		}
		if(password == '')
		{
			alert('password required!');
			$('input.user_password_'+user_id+'').focus();
			return false;
		}
		else
		{
			$.ajax({
				type: "POST",
				url: location,
				data: {
					'username':username,
					'password':password
				},
				dataType: "json",
				success: function user(){
					$('.user_username_'+ user_id +'').val('');
					$('.user_password_'+user_id+'').val('');
					alert('acount has been Updated!');
				}
			});
		}
	
 
}
//delete
function delete_user(user_id){
    if(confirm('Are you sure you want to Delete this User'))
    {
        location.href = '<?php echo base_url ();?>main_controller/delete_user/'+user_id;
    }
}

</script>
<div id="userlist_area">
	<table>	
		<tr>
			<td colspan="6">
				<header><h2>USER RECORDS</h2></header>(
				<?php echo $user_list->num_rows();?>)User's found in the list
			</td>
		</tr>
		<tr class="titles">
			<td class="top_title">User no</td>
			<td class="top_title">Name</td>
			<td class="top_title">Lastname</td>
			<td class="top_title">Username</td>
			<td class="top_title">Password</td>
			<td class="top_title">Action</td>
		</tr>
	<?php foreach($user_list->result() as $user):?>
		<?php
		if($user_list->num_rows()==0)
		echo 'no users found';
		?>
		<?php
			$user_username = array('name' =>'u_username','class'=>'user_username_'.$user->id.'');
			$user_password = array('name' =>'u_password','class'=>'user_password_'.$user->id.'');
		?>
		<tr>
			<td class="id_list"><?php echo $user->id;?></td>
			<td class="info_list"><?php echo $user->first_name;?></td>
			<td class="info_list"><?php echo $user->last_name;?></td>
			<td class="info_list"><?php echo form_input($user_username);?></td>
			<td class="info_list"><?php echo form_password($user_password);?><td class="info_list">
			<a href="javascript: update_user(<?php echo $user->id;?>)">Update</a> |
			<input type="submit" class="del_btn" onclick="javascript: delete_user(<?php echo $user->id;?>)" value="">
			</td>
		</tr>
	<?php endforeach;?>
		<tr>
			<td class="bottom_space" colspan="6">
			</td>
		</tr>
	</table>
</div>
</frameset>
<!---END-->