<!--BLOG SCRIPT--->
<script>
function insert_comment()
{
	var body = $('.body').val();
	if(body == '')
	{
		alert('text filed must have a value!');	
		return false;
	}
	else
	{
		location.href = '<?php echo base_url();?>site/insert_post'
	}
	
}
</script>
<!--BLOG SCRIPT END--->
<!---------BLOG PAGE--------->
<div id="blog_page">
	<header class="acountheader" style="color: green;border: 0px;"><h1 style="font-size: 20px;">Blog</h1></header>
	<!--POst Area--->
	<section  id="blog_post"  class="post_area" style="float: left;border: 1px solid gray;padding: 2px;">
			<?php echo form_open('site/insert_post');
			$body = array('name'=>'post',
							'rows'=>'5.5',
							'placeholder'=>'Post Here',
							'class'=>'body',
							'cols'=>54);
			$bodyfake = array('name'=>'body',
							'rows'=>'2',
							'placeholder'=>'Post Here',
							'class'=>'bodyfake',
							'cols'=>54);
			?>
			<input type="hidden" name="hide_n" value="<?php echo $user;?>"/>
			<ul>
				<li><?php echo form_textarea($body); ?></li>
				<li><?php echo form_textarea($bodyfake); ?></li>
				<li><input value="Post" type="submit" name="submit" class="botton_post" ></li>
			</ul>
			<?php echo form_close();?>
	</section>
	<!--end--->
	
	<!----display post----->
<script>
function add_comment(id){
	$(document).ready(function (){
		$('#box_'+id+'').show();
		$('.post_comment'+id+'').show();
		$('.show'+id+'').hide();
		$('#box_'+id+'').focus();
	});	
}
function to_comment(id){
	var entry_id = id;
	var comment = $('#box_'+id+'').val();
	var hide_id = $('.ce').val();
	var insert = 'http://localhost/thesis/site/add_comment/'+entry_id+'/'+comment+'/'+hide_id;
	//var display = 'http://localhost/thesis/site/get_comment'+entry_id;
	if(comment == '')
	{
		alert('cannot add blank input!');
		$('#box_'+id+'').focus();
		return false;
	}
	else
	{
		location.href = insert;
	}
}
</script>
	<section  id="poser">
			<?php if($post->num_rows() == 0)
			{
				echo '<li style="color: #444;">No Post !</li>';
			}
			else
			{
			foreach($post->result() as $row): ?>
			
			<?php
				foreach($select->result() as $them):
				if($them->id == $row->by){
			;?>
				<li class="title" style="float: left"><h4><?php echo $them->first_name; ?>&nbsp;<?php echo $them->last_name;} ?></h4></li>		
			<?php endforeach;?>
			
			<ul id="body">
				<span style="color: #686A6E; font-family: tahoma;"><?php echo $row->body; ?></span>
				<li style="font-size: 11px;color: #000;"><?php echo $row->time; ?></li>
			</ul>
				<?php $comment = array('name'=>'comment','class'=>'box','id'=>'box_'.$row->id,'rows'=>2,'cols'=>61);?>
				<li><?php echo form_textarea($comment);?></li>
				<input type="hidden" class="ce" name="hide_id" value="<?php echo $user;?>" />
				<li class="show_comments">
					<a class="show<?php echo $row->id;?>" href="javascript: add_comment(<?php echo $row->id;?>)">Comment</a>
					<a class="post_comment<?php echo $row->id;?>" style="display: none;" href="javascript: to_comment(<?php echo $row->id;?>)">&nbsp;Add Comment</a>
				</li>	
				<?php 
				$my_comment = $this->db->query('SELECT * FROM comments WHERE entry_id='.$row->id.' ORDER BY ID DESC');
				foreach($my_comment->result() as $comment):
				if($comment->by_user == $user)
				{?>
			<article>
				<ul style="float: left;width: 450px;margin: 2px;margin-bottom: 20px;background: #CCC0C5;">
					<li style="padding-left: 10px;border-bottom: 1px solid #1182F4;width: 50px;color:#1182F4;"><h4>you</h4></li>
					<li style="font-size: 11px;float: left;padding: 2px;"><?php echo $comment->comment;?></li>
				</ul>
				   <?php }else{?>
				<ul style="float: left;width: 450px;margin: 2px;background: #CCC0C5;">
					<li style="padding-left: 10px;border-bottom: 1px solid #333;width: 80px"><h4><?php echo $them->first_name; ?>&nbsp;<?php echo $them->last_name;?></h4></li>
					<li style="font-size: 11px;float: left;padding: 2px"><?php echo $comment->comment;?></li>
				</ul>
					<?php }?>
				
				<?php endforeach;?>
				<?php endforeach; 
				}?>
			</article>
	</section>
	<!-----end----->
	<!-----ANOUNCEMENT MY ADMIN----->
	<?php
		$anounced = $this->db->query("SELECT a.by_admin, a.anounced, b.admin_id, b.name, b.lastname  FROM anounced a JOIN admin_user b ORDER BY a_id DESC");
	?>
	<section id="anounced_area">
		<header><h3>Anounced Section</h3></header>
		<?php foreach($anounced->result() as $a):?>
		<ul>
			<?php if($a->admin_id == $a->by_admin){?>
			<li style="padding-left: 10px;border-bottom: 1px solid #ccc;"><h4>Admin :&nbsp;<?php echo $a->name;?> &nbsp;<?php echo $a->lastname;?></h4></li>
			<li id="an"><?php echo $a->anounced;}?></li>
		</ul>
		<?php
			endforeach;
		 ?>
	</section>
	<!-----end----->
	
</div>
<!---------END BLOG PAGE--------->



