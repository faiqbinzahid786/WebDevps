
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




<li style="width: 100%;" <?php if($tab === 'user_owner'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/apartmentmanager/user_owner"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_staff?> </a></li>


<li style="width: 100%;" <?php if($tab === 'brand'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/apartmentmanager/brand"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	<?=$lang_brand?> </a></li>
	





<hr />

<li style="width: 100%;" <?php if($tab == 'stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/apartmentmanager/stock">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	<?=$lang_lookroom?></a></li>



<li style="width: 100%;" <?php if($tab === 'report_user'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/apartmentmanager/report_user"  style="font-size: 13px;"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?=$lang_salereportstaff?> </a></li>


<li style="width: 100%;" <?php if($tab === 'report_brand'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/apartmentmanager/report_brand"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>	<?=$lang_salereportbrand?> </a></li>
	



	
</ul>


		</div>
	</div>

	</div>
