
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


	<div class="panel panel-default" style="font-size: 14px;">
		<div class="panel-body">


		<ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'salelist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salelist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?=$lang_salereportall?> </a></li>

<li style="width: 100%;" <?php if($tab === 'salereportshift'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereportshift"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
ยอดขายตามกะ
 </a></li>


<li style="width: 100%;" <?php if($tab === 'salereport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereport?>
 </a></li>


<!-- <li style="width: 100%;" <?php if($tab === 'salecustomerreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salecustomerreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?=$lang_cusstatsalelist?></a></li> -->


<!-- <li style="width: 100%;" <?php if($tab === 'returnreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/returnreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_reportreturnproduct?></a></li>  -->



<!-- <li style="width: 100%;" <?php if($tab === 'supplierreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/supplierreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportsupplier?></a></li> -->



<!-- <li style="width: 100%;" <?php if($tab === 'salesumaryreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salesumaryreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportsummary?></a></li> -->




<li style="width: 100%;" <?php if($tab === 'reportsumary'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumary"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
สรุปยอดขายทั้งหมด</a></li>


<li style="width: 100%;" <?php if($tab === 'reportsumaryday'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumaryday"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
กำไร รายวัน </a></li>

<li style="width: 100%;" <?php if($tab === 'reportsumarymonth'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumarymonth"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
กำไร รายเดือน </a></li>

</ul>

</div>

</div>



<div class="panel panel-default">
	 <div class="panel-body">


	 <ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'log_delete_order'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/log_delete_order"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
ประวัติการลบออเดอร์</a></li>



</ul>

</div>
</div>





 <div class="panel panel-default">
		<div class="panel-body">


		<ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'customerscore'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscore"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?=$lang_cuspoint?></a></li>


<li style="width: 100%;" <?php if($tab === 'customerscoreproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscoreproduct"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
คะแนนแลกสินค้า</a></li>



</ul>

</div>
</div>




<div class="panel panel-default">
	 <div class="panel-body">


	 <ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'addwalletlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/addwalletlist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
การเติมเงิน<br /> กระเป๋า wallet</a></li>


<li style="width: 100%;" <?php if($tab === 'usewalletlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/usewalletlist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
การใช้เงิน<br /> กระเป๋า wallet</a></li>




</ul>

</div>
</div>








</div>
