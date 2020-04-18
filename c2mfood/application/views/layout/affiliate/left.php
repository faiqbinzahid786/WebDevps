
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
<li style="width: 100%;" <?php if($tab == 'dashboard'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/affiliate/dashboard">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>	Dashboard Affiliate </a></li>

<li style="width: 100%;" <?php if($tab === 'withdraw'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/affiliate/withdraw"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>	ถอนเงิน </a></li>
	


<li style="width: 100%;" <?php if($tab === 'howtopromote'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/affiliate/howtopromote"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>	วิธีการโปรโมท </a></li>
	


	
</ul>


		</div>
	</div>

	</div>


