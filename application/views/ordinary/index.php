<script>
	$(document).ready(function (){
		$('#show').click(function (){
			$('#letter').slideToggle();
		});
		$('#show_inbox').click(function (){
			$('#messages').slideToggle();
		});
	});
function send(o_id){
	var o_name = $('#o_name').val();
	var o_message = $('#o_message').val();
	var location = '<?php echo base_url();?>ordinary_user/send_message/'+o_id;
	if(o_name == '' && o_message == ''){
		alert('Dont live blank if you want to send to message!');
		return false;
	}
	if(o_name == ''){
		alert('name important!');
		$('#o_name').focus();
		return false;
	}
	if(o_message == ''){
		alert('message important!');
		$('#o_message').focus();
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: location,
			data:{
				'o_name':o_name,
				'o_message':o_message
				},
			dataType: "json",
			success: function(){
				alert('message is sent to ADMIN');
				$('#o_name').val('');
				$('#o_message').val('');
			}
		});
	}
}
function search(){
	var s_val = $('#search').val();
	if(s_val == ''){
		alert('could not search empty box!');
		$('#search').focus();
		return false;
	}
	else
	{
		location.href = '<?php echo base_url();?>ordinary_user/search/'+s_val;
	}
}
</script>
<div id="ordinary">
	<section>
		<article>
			<ul id="s">
				<li style="float: right;margin-right: 10px;"><?php echo anchor('ordinary_user/logout','Logout');?></li>
				<li style="float: left;margin-left: 205px">
					<input type="text" id="search" name="search" placeholder="Your Model" />
					<input onclick="javascript: search()" type="submit" value="Search" style="margin: 0px; height: 17px;width: 50px"/>
				</li>
				<li id="show_inbox">Show Messages</li>
			</ul>
			<ul id="products">
				<?php 
				if($alldata->num_rows() == 0 )
				{
					echo '<li class="img_title">no data found</li>';
				}
				else
				{?>
				<?php foreach($alldata->result() as $row):?>
				<ul id="info">
				<li><img style="float: left;"><img src="<?php echo base_url();?>assets/upload_image/thumb/<?php echo $row->images;?>" title="<?php echo $row->product_title;?>"></li>
				<li id="in">Title :<?php echo $row->product_title;?></li><br />
				<li id="in">Price :<?php echo $row->product_price;?></li><br />
				<li id="in">Model :<?php echo $row->product_model;?></li><br />
				<li id="in">Serial :<?php echo $row->product_stocks;?></li><br />
				<li id="in">Stocks:<?php echo $row->product_serial;?></li><br />
				<li id="indes">Decription:<?php echo $row->product_description;?></li>
				</ul>
				
				<?php endforeach;}?>
			</ul>
			<article id="l">
				<ul  id="letter">
				<?php
					$name = array('name'=>'name','id'=>'o_name','placeholder'=>'name');
					$message = array('name'=>'message','id'=>'o_message','placeholder'=>'message','rows'=>7,'cols'=>'34');
				?>
				<li><?php echo form_input($name);?></li>
				<li><?php echo form_textarea($message);?></li>
				<li><input onclick="javascript: send(<?php echo $o_id;?>)" type="submit" value="Send" style="margin-left:210px" id="send" /></li>
				</ul>
				<ul id="messages">
				<?php 
					foreach($rep->result() as $r):
					$we = $this->db->query('SELECT * FROM admin_user WHERE admin_id ='.$r->r_f_id.'');
					foreach($we->result() as $xa):	
					if($r->r_f_id == $xa->admin_id){
				?>
					<li>From Admin&nbsp;:&nbsp;<?php echo $xa->name;?>&nbsp;<?php echo $xa->lastname;?></li>
					<li>message : <?php echo $r->replay;?></li>
				<?php }endforeach;?>
				<?php endforeach;?>
				</ul>
			</article>
			<li id="show">Send Letter</li>
		</article>
	</section>
</div>