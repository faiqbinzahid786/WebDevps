

	<?php
if($_SESSION['user_type']=='1' || $_SESSION['user_type']=='9' || $_SESSION['user_type']=='10'){
	echo '<script>
window.location = "'.$base_url.'/sale/salepic";
	</script>';
	}?>


<?php
if($_SESSION['user_type']=='2'){
		echo '<script>
window.location = "'.$base_url.'/warehouse/productlist";
	</script>';
	}
	?>


	<?php
	if($_SESSION['user_type']=='15'){
			echo '<script>
	window.location = "'.$base_url.'/sale/chef";
		</script>';
		}
		?>


		<?php
		if($_SESSION['user_type']=='20'){
				echo '<script>
		window.location = "'.$base_url.'/sale/chef_foranyone";
			</script>';
			}
			?>






<style type="text/css">
	body{
		background-color: #eee;
	}
</style>
<div class="container text-center">

<div class="col-md-12">


<!-- <center>

	<a href="<?php echo $base_url;?>/sale/salebill" class="btn btn-success"  style="font-size: 15px;font-weight: bold;width: 250px;">
<span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_billreserv?>
</a>
</center> -->


<br />

<div class="col-md-6" ng-app="firstapp" ng-controller="Index">


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/sale/salereportshift" title="ดูยอดขายรวม">
<div class="panel" style="height: 200px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<b>ยอดขายกะที่ <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(ยังไม่ได้เปิดกะ)';} ?></b>
<br />



	<h3><?=$lang_foodbill?>: <b>{{saletodaytable[0].numtable | number}}</b></h3>




	<h3><?=$lang_list?>: <b>{{saletoday[0].sumnum | number}}</b>
<br /><br />
	<?=$lang_income?>: <b>{{saletoday[0].sumprice | number:2}}</b></h3>

</div>
</a>
</div>




<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/sale/salereport" title="ดูยอดขายรายการอาหาร">
<div class="panel" style="text-align: left;height: 200px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center>
	<center><b>ขายดีกะที่ <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(ยังไม่ได้เปิดกะ)';} ?></b>


<table width="90%">

<tr ng-repeat="x in productsaletoday">
	<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_numall | number}}</td>
</tr>


 </table>

 </center>

</div>
</a>
</div>


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/warehouse/stock" title="ดูสต๊อกวัตถุดิบคงเหลือ">
<div class="panel" style="text-align: left;height: 220px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>สต็อกคงเหลือ</b>

<table width="90%">
<tr ng-repeat="x in productoutofstock">
<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_stock_num | number}}</td>
</tr>

 </table>

 </center>

</div>
</a>
</div>


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/warehouse/stockmat" title="ดูสต๊อกวัตถุดิบคงเหลือ">
<div class="panel" style="text-align: left;height: 220px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>วัตถุดิบคงเหลือ</b>

<table width="90%">
<tr ng-repeat="x in productmatoutofstock">
<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_stock_num | number}}</td>
</tr>

 </table>

 </center>

</div>
</a>
</div>






</div>

<div class="col-md-6">

<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-warning"  style="font-size: 18px;font-weight: bold; width: 450px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 50px;"></span><br />
จอขายอาหาร/เครื่องดื่ม
</a>

<!-- <a href="<?php echo $base_url;?>/sale/salepage" class="btn btn-warning"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-record" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salelist?>
</a> -->



<!-- <a href="<?php echo $base_url;?>/sale/product_return" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-refresh" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_returnproduct?>
</a> -->


<br/><br/>



<a href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-warning"  style="font-size: 18px;font-weight: bold;width: 150px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 50px;"></span><br />
อาหาร/เครื่องดื่ม
</a>




<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-warning" style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 50px;"></span><br /> ลูกค้า
</a>


<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-warning"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 50px;"></span><br />
 รายงานการขาย
</a>


<br/><br/>





<a href="<?php echo $base_url;?>/food/food_table" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_managetable?>
</a>




<a href="<?php echo $base_url;?>/salesetting/discount" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_salesetting?>
</a>




<a href="<?php echo $base_url;?>/storemanager/user_owner" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_managestore?>
</a>


<br/><br/>




<a href="<?php echo $base_url;?>/printer/printercategory" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 450px;">
<span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size: 50px;"></span><br /> เครื่องปริ้น
</a>


</div>

<hr />

</div>
</div>







<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.Saletodaytable = function(){

$http.get('Home/Saletodaytable')
		 .then(function(response){
				$scope.saletodaytable = response.data;

			});
 };
$scope.Saletodaytable();




$scope.Saletoday = function(){

$http.get('Home/Saletoday')
		 .then(function(response){
				$scope.saletoday = response.data;

			});
 };
$scope.Saletoday();




$scope.Productsaletoday = function(){

$http.get('Home/Productsaletoday')
		 .then(function(response){
				$scope.productsaletoday = response.data;

			});
 };
$scope.Productsaletoday();


$scope.Productoutofstock = function(){

$http.get('Home/Productoutofstock')
		 .then(function(response){
				$scope.productoutofstock = response.data;

			});
 };
$scope.Productoutofstock();


$scope.Productmatoutofstock = function(){

$http.get('Home/Productmatoutofstock')
		 .then(function(response){
				$scope.productmatoutofstock = response.data;

			});
 };
$scope.Productmatoutofstock();



});
	</script>
