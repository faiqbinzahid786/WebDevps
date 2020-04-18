
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



<li style="width: 100%;" <?php if($tab === 'food_list'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/food/food_list"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>	รายการอาหาร </a></li>

<li style="width: 100%;" <?php if($tab === 'food_category'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/food/food_category"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>	ประเภทอาหาร </a></li>




	
</ul>


		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">	
<li style="width: 100%;" <?php if($tab == 'showproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/food/show_food">
<span class="glyphicon glyphicon-link" aria-hidden="true"></span>	หน้า Page แสดงรายการอาหารที่มีรูปทั้งหมด </a></li>





	
</ul>


</div>
	</div>







	</div>


