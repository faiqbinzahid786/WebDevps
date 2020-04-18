
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



<li style="width: 100%;" <?php if($tab === 'productlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productlist"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
อาหาร<br/>เครื่องดื่ม </a></li>

<li style="width: 100%;" <?php if($tab == 'stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/stock">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
สินค้าสต๊อก </a></li>

<li style="width: 100%;" <?php if($tab == 'stockmat'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/stockmat">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
วัตถุดิบ<br/>คงเหลือ </a></li>

 <li style="width: 100%;" <?php if($tab === 'productother'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productother"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
ออฟชั่นเสริม </a></li>

<!-- <li style="width: 100%;" <?php if($tab === 'importproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/importproduct"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
<?=$lang_productintostock?> </a></li> -->




<li style="width: 100%;" <?php if($tab === 'productcategory'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productcategory"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_productcategory?> </a></li>




<li style="width: 100%;" <?php if($tab === 'productcategorykitchen'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productcategorykitchen"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
ครัว </a></li>


<!-- <li style="width: 100%;" <?php if($tab === 'supplier'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/supplier"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?=$lang_supplierstock?> </a></li>

<li style="width: 100%;" <?php if($tab === 'zone'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/zone"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
Zone ขาย </a></li> -->

</ul>


		</div>
	</div>


	<!-- <div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">
<li style="width: 100%;" <?php if($tab == 'showproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/showproduct">
<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
<?=$lang_productpagepic?> </a></li>


</ul>


</div>
	</div> -->


	</div>
