<script>
	$(document).ready(function (){
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#admin').hide();
		$('#front_cover').hide()
		$('#admin_list_area').hide();
		$('#userlist_area').hide();
		$('#alldata').hide();
		$('#manage_user').hide();
		$('#search').hide();
		$('#to_anounced').hide();
		$('#user').hide();
		
		$('#back').click(function (){
			$('#action_area').show();
			$('#admin').hide();
		});
		$('#back2').click(function (){
			$('#action_area').show();
			$('#user').hide();
		});
		$('#back3').click(function (){
			$('#action_area').show();
			$('#alldata').hide();
		});
		$('#back4').hide();
		$('').click(function (){
			
		});
	});
</script>

<!---ACTION AREA--->
<div id="action_area">
	<section>
		<article>
			<ul>
				<li id="add_admin">Add New Admin</li>
				<li id="add_user">Add New User</li>
				<li id="view_alldata">View All Data</li>
				<li id="manage">View Encoder Status</li>
				<li id="search_product">Search Product</li>
				<li id="anounced">Anounced</li>
			</ul>
		</article>
	</section>
</div>
<!---END-->

<!---Add ADMIN--->
<script>
function add_admin(){
	var f = $('#ad_firstname').val();
	var l = $('#ad_lastname').val();
	var u = $('#ad_username').val();
	var p = $('#ad_password').val();
	var p2 = $('#ad_password2').val();
	var location = '<?php echo base_url();?>main_controller/add_admin';
	if(f =='' && l=='' && u=='' && p == '' && p2 =='')
	{
		alert('all input must have a value!');
		return false;
	}
	if(f == '')
	{
		alert('username required!');
		$("input#ad_firstname").focus();
		return false;
	}
	if(l == '')
	{
		alert('password required!');
		$("input#ad_lastname").focus();
		return false;
	}
	if(u == '')
	{
		alert('username required!');
		$("input#ad_username").focus();
		return false;
	}
	if(p == '')
	{
		alert('password required!');
		$("input#ad_password").focus();
		return false;
	}
	if(p != p2)
	{
		alert('password did not match confirm password field !!');
		$("input#ad_password2").focus();
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: location,
			data: {
				'fname':f,
				'lname':l,
				'uname':u,
				'pword':p
			},
			dataType: "json",
			success: function user(){
				$('#ad_firstname').val('');
				$('#ad_lastname').val('');
				$('#ad_username').val('');
				$('#ad_password').val('');
				$('#ad_password2').val('');
				$('#check').show().delay(3000).fadeOut();
			}
		});
	}
}
</script>
<div id="admin">
	<h4 id="back" style="color: #000;margin: 20px;cursor: pointer">back</h4>
	<div id="check">
		<h3>Succesfully Added To The List</h3>
	</div>
	<table>
		<tr>
			<td><h2 style="border-bottom: 3px solid gray;padding-bottom: 10px;font-family: Arial, Helvetica, sans-serif;margin-bottom: 20px;">Add Admin</h2></td>
		</tr>
		<tr>
			<td>Firstname</td>
		</tr>
		<tr>
			<?php $firstname = array('name'=>'firstname_ad','id'=>'ad_firstname') ;?>
			<td><?php echo form_input($firstname) ;?></td>
		</tr>
		<tr>
			<td>Lastname</td>
		</tr>
		<tr>
			<?php $lastname = array('name'=>'lastname_ad','id'=>'ad_lastname') ;?>
			<td><?php echo form_input($lastname) ;?></td>
		</tr>
		<tr>
			<td>Username</td>
		</tr>
		<tr>
			<?php $username = array('name'=>'username_ad','id'=>'ad_username') ;?>
			<td><?php echo form_input($username) ;?></td>
		</tr>
		<tr>
			<td>Password</td>
		</tr>
		<tr>
			<?php $password = array('name'=>'password_ad','id'=>'ad_password') ;?>
			<?php $password2 = array('name'=>'password_ad2','id'=>'ad_password2','placeholder'=>'confirm password');?>
			<td><?php echo form_password($password) ;?></td><td><?php echo form_password($password2) ;?></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" onclick="javascript: add_admin()" value="Go" style="width:70px; margin-top: 10px;" /></td>
		</tr>
	</table>
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
<!---END-->

<!---Add user--->
<script>
function add_user(){
	var f = $('#us_firstname').val();
	var l = $('#us_lastname').val();
	var u = $('#us_username').val();
	var p = $('#us_password').val();
	var e = $('#us_email').val();
	var p2 = $('#us_password2').val();
	var location = '<?php echo base_url();?>main_controller/add_user';
	if(f =='' && l=='' && u=='' && p == '' && p2 =='')
	{
		alert('all input must have a value!');
		return false;
	}
	if(f == '')
	{
		alert('username required!');
		$("input#us_firstname").focus();
		return false;
	}
	if(l == '')
	{
		alert('password required!');
		$("input#us_lastname").focus();
		return false;
	}
	if(u == '')
	{
		alert('username required!');
		$("input#us_username").focus();
		return false;
	}
	if(p == '')
	{
		alert('password required!');
		$("input#us_password").focus();
		return false;
	}
	if(e == '')
	{
		alert('Email required!');
		$("input#us_email").focus();
		return false;
	}
	if(p != p2)
	{
		alert('password did not match confirm password field !!');
		$("input#us_password2").focus();
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: location,
			data: {
				'fname':f,
				'lname':l,
				'uname':u,
				'pword':p,
				'email':e
			},
			dataType: "json",
			success: function user(){
				$('#us_firstname').val('');
				$('#us_lastname').val('');
				$('#us_username').val('');
				$('#us_password').val('');
				$('#us_password2').val('');
				$('#us_email').val('');
				$('#check2').show().delay(3000).fadeOut();
			}
		});
	}
}
</script>

<div id="user">
	<h4 id="back2" style="color: #000;margin: 20px;cursor: pointer">back</h4>
	<div id="check2">
		<h3>Succesfully Added To The List</h3>
	</div>
	<table>
		<tr>
			<td><h2 style="border-bottom: 3px solid gray;padding-bottom: 10px;font-family: Arial, Helvetica, sans-serif;margin-bottom: 20px;">Add User</h2></td>
		</tr>
		<tr>
			<td>Firstname</td>
		</tr>
		<tr>
			<?php $firstname = array('name'=>'firstname_us','id'=>'us_firstname') ;?>
			<td><?php echo form_input($firstname) ;?></td>
		</tr>
		<tr>
			<td>Lastname</td>
		</tr>
		<tr>
			<?php $lastname = array('name'=>'lastname_us','id'=>'us_lastname') ;?>
			<td><?php echo form_input($lastname) ;?></td>
		</tr>
		<tr>
			<td>Username</td>
		</tr>
		<tr>
			<?php $username = array('name'=>'username_us','id'=>'us_username') ;?>
			<td><?php echo form_input($username) ;?></td>
		</tr>
		<tr>
			<td>Email Address</td>
		</tr>
		<tr>
			<?php $email = array('name'=>'email_us','id'=>'us_email') ;?>
			<td><?php echo form_input($email) ;?></td>
		</tr>
		<tr>
			<td>Password</td>
		</tr>
		<tr>
			<?php $password = array('name'=>'password_us','id'=>'us_password') ;?>
			<?php $password2 = array('name'=>'password_us2','id'=>'us_password2','placeholder'=>'confirm password');?>
			<td><?php echo form_password($password) ;?></td><td><?php echo form_password($password2) ;?></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" onclick="javascript: add_user()" value="Go" style="width:70px; margin-top: 10px;" /></td>
		</tr>
	</table>
</div>
<!---END-->

<!---ALL DATA-->
<!--JS SCRIPT FOR UPDATE/EDIT/DELETE A DATE-->
<script>
function edit_data(edit_id){
	var edit_id = edit_id;
	var newtitle = $('#newtitle_'+edit_id+'').val();
	var newPrice = $('#newPrice_'+edit_id+'').val();
	var newModel = $('#newModel_'+edit_id+'').val();
	var newSerial = $('#newSerial_'+edit_id+'').val();
	var newStocks = $('#newStocks_'+edit_id+'').val();
	var newDescription = $('#newDescription_'+edit_id+'').val();
	var edit_c_function = '<?php echo base_url();?>main_controller/edit_data/'+edit_id;
	$.ajax({
		type: "POST",
		url: edit_c_function,
		data:{
				'newtitle':newtitle ,
				'newPrice':newPrice ,
				'newModel':newModel , 
				'newSerial':newSerial ,
				'newStocks':newStocks ,
				'newDescription':newDescription
			 },
		dataType:"json",
		success: function(){
			alert('your data has been UPDATED!!');
		}
	});
}
//DELETE
function delete_data(delete_data){
	var del = delete_data;
	if(confirm('Are you sure you want to DELETE this RECORD?'))
	{
		location.href = '<?php echo base_url();?>main_controller/delete_data/'+del;
	}
	else
	{
		return false;
	}
}
//SHOW DATA
function showdata() {
		var model = $('#model').val();
		if(model == '')
		{
			alert('unable to find blank input !');
		}
		else
		{
			location.href = '<?php echo base_url(); ?>main_controller/search_data/'+model;
		}
}
</script>
<!--END -->
<div id="alldata">
		<table style="margin-left: 770px;">
			<tr>
				<td><input type="text" name="search" id="model" placeholder="search Model" /></td>
				<td><input onclick="javascript: showdata()" type="submit" name="submit" value="search" style="width: 70px;" /></td>
			</tr>
		</table>
	<h4 id="back3" style="color: #000;margin: 20px;cursor: pointer">back</h4>
		<?php 
		if($alldata->num_rows() == 0 )
		{
			echo '<li class="img_title">no data found</li>';
		}
		else
		{
		foreach($alldata->result() as $row):
		
		$newtitle = array('name'=>'newtitle','value'=>$row->product_title,'class'=>'edit_inputs','id'=>'newtitle_'.$row->product_id.'');
		$newPrice = array('name'=>'newPrice','value'=>$row->product_price,'class'=>'edit_inputs','id'=>'newPrice_'.$row->product_id.'');
		$newModel = array('name'=>'newModel','value'=>$row->product_model,'class'=>'edit_inputs','id'=>'newModel_'.$row->product_id.'');
		$newSerial = array('name'=>'newSerial','value'=>$row->product_serial,'class'=>'edit_inputs','id'=>'newSerial_'.$row->product_id.'');
		$newStocks = array('name'=>'newStocks','value'=>$row->product_stocks,'class'=>'edit_inputs','id'=>'newStocks_'.$row->product_id.'');
		$newDescription = array('name'=>'newDescription','value'=>$row->product_description,'rows'=>4,'cols'=>70,'id'=>'newDescription_'.$row->product_id.'');
		echo  '<div id="edit_info">';
		echo  '<table style="margin-left: 335px;">';
		echo  '<tr><td class="text"><td class="infotxt"><a href="javascript: edit_data('.$row->product_id.')" style="color: blue;">Update</a></td></td>';
		echo  '<td class="text"><td class="infotxt"><a href="javascript: delete_data('.$row->product_id.')" style="color: blue;padding-left: 50px;">Delete</a></td></td></tr>';
		echo  '</table>';
		echo  '<img><img src="'.base_url().'assets/upload_image/thumb/'.$row->images.'" title="'.$row->product_title.'">';
		echo  '<table id="files_area">';
		echo  '<tr><td class="text">Title</td><td class="infotxt">'.form_input($newtitle).'</td></tr>';
		echo  '<tr><td class="text">Price</td><td class="infotxt">'.form_input($newPrice).'</td></tr>';
		echo  '<tr><td class="text">Model</td><td class="infotxt">'.form_input($newModel).'</td></tr>';
		echo  '<tr><td class="text">Serial</td><td class="infotxt">'.form_input($newSerial).'</td></tr>';
		echo  '<tr><td class="text">Stocks</td><td class="infotxt">'.form_input($newStocks).'</td></tr>';
		echo  '<tr><td class="text">Decription<td class="infotxt">'.form_textarea($newDescription).'</td></td></tr>';
		echo  '</table>';
		echo  '</div>';
		
		endforeach;
		}
		?>
</div>
<!---END-->


<!---manage User-->
<script>
function user_search() {
		var email = $('#user_s').val();
		var user_id = $('#user_id').val();
		if(email == '')
		{
			alert('unable to find blank input !');
		}
		else
		{
			location.href = '<?php echo base_url(); ?>main_controller/search_user/'+user_id;
		}
}
</script>
<div id="manage_user">
	<ul style="margin-left: 110px; margin-top: 30px;margin-bottom: 30px;">
		<p>Input User Lastname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + ID</p>
		<input type="text" name="search" id="user_s" placeholder="search user" />
		<input type="text" name="search_id" id="user_id" placeholder="ID" style="width: 30px" />
		<input onclick="javascript: user_search()" type="submit" name="submit" value="search" style="width: 70px;" />
	</ul>
</div>
<!---END-->

<!---Search-->
<script>
function manual_search() {
		var model = $('#model_s').val();
		if(model == '')
		{
			alert('unable to find blank input !');
		}
		else
		{
			location.href = '<?php echo base_url(); ?>main_controller/search_data/'+model;
		}
}
</script>
<div id="search">
	<ul style="margin-left: 130px; margin-top: 30px">
		<p>Input product Model key</p>
		<input type="text" name="model" id="model_s" placeholder="Product Model" />
		<input onclick="javascript: manual_search()" type="submit" name="submit" value="search" style="width: 70px;" />
	</ul>
</div>
<!---END-->

<!---anounced-->
<script>
$(document).ready(function(){
	$('#click_me').click(function (){
		$('#click_me').hide();
		$('#real_textarea').fadeIn();
	});
	$('#post').click(function (){
		$('#loader').show().delay(2000).fadeOut();
	});
});
function anounced(admin){
	var admin_id = admin;
	var post_to = $('#post_to').val();
	var location = 'http://localhost/thesis/main_controller/anounced/'+admin;
	
	if (post_to == '')
	{
		alert('cant anounced an empty box!');
		$('textarea#post_to').focus();
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: location,
			data:{'body':post_to},
			dataType: "json",
			success: function(data){
				if(!data)
				{
					alert('error please login!');
				}
				else
				{
					alert('post success!');
					$('#post_to').val('');
				}
			}
		});
	}
}
</script>
<h4 id="back4" style="color: #000;margin: 20px;cursor: pointer">
	<a href="<?php echo base_url();?>main_controller/actions" style="text-decoration: none;color: #000;">back</a>
</h4>

<li id="loader"></li>
<div id="to_anounced">
	<li style="margin-bottom: 30px; border-bottom: 1px solid gray;width: 200px;float: left;"><h4>Anounced To Blog</h4></li>
	<section>
		<article>
			<textarea cols="73" id="click_me" placeholder="click to enlarge"></textarea>
			<?php
				$to = array('name'=>'post_to' ,'id'=>'post_to', 'placeholder'=>'Anounced','rows'=>5,'cols'=>72,'style'=>'margin-right: 3px;');
			?>
			<ul id="real_textarea" style="border: 1px solid #ccc; padding: 3px;display: none;">
				<li><?php echo form_textarea($to);?></li>
				<li style="margin-left: 500px;"><input onclick="javascript: anounced(<?php echo $admin_id;?>)" type="submit" name="post" value="POST" id="post" style="padding: 3px;width: 95px;border: 1px solid #ccc;cursor: pointer;" /></li>
			</ul>
		</article>
	</section>
</div>
<!---END-->
