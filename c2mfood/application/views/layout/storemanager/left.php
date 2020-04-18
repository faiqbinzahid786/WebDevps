
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




<li style="width: 100%;" <?php if($tab === 'user_owner'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/user_owner"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_staff?> </a></li>


<li style="width: 100%;" <?php if($tab === 'brand'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/storemanager/brand"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_brand?> </a></li>
	



	


	
</ul>


		</div>
	</div>

	</div>
