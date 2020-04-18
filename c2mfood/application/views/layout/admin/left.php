
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">
	

	<div class="panel panel-default">
		<div class="panel-body">
		
		<ul class="nav nav-pills">	




<li style="width: 100%;" <?php if($tab === 'store_manager'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/admin/store_manager"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	<?=$lang_manager?> </a></li>

<li style="width: 100%;" <?php if($tab === 'change_password'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/admin/change_password"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>	<?=$lang_changepassword?> </a></li>



	
</ul>


		</div>
	</div>

	</div>
