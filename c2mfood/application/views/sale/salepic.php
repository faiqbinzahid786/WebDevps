<?php
if($_SESSION['printer_type']=='1'){
	$pt_width = '380px';
}else{
	$pt_width = '550px';
}
?>



<?php
if($_SESSION['printer_type']=='1'){
	$slipwidth = '190px';
}else{
	$slipwidth = '250px';
}
?>




<style type="text/css">
	.product_box:hover{

box-shadow: 0 1px 2px #000;

	}
</style>

<div class="lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

<!-- <?php if($_SESSION['user_type']=='10'){?>
<div class="col-md-12 text-center panel panel-default" style="font-size:25px;">
		ลูกค้าสั่งอาหาร โต๊ะ {{table_name}}
</div>
<?php } ?> -->



<input type="hidden" value="{{Discount_lastfunc()}}">

<div class="col-sm-8 col-md-8">



<form class="form-inline" style="float: left;">


<?php if($_SESSION['user_type']!='10'){?>
<div class="form-group">
<button  ng-if="table_name != ''" type="submit" ng-click="Opentable()" class="btn btn-primary btn-lg" placeholder="" title="<?=$lang_search?>"  style="width: 100%;padding-left: 5px;padding-right: 5px;">

<span>
 {{table_name | limitTo:6}}
</span>
	 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	</button>
</div>

<div class="form-group">
<button  ng-if="table_name != ''" type="submit" ng-click="Opentablemove()" class="btn btn-warning btn-lg" placeholder="" title="<?=$lang_search?>"  style="width: 100%;padding-left: 5px;padding-right: 5px;">

<span>
	<?php echo $lang_movetable;?>
</span>
	</button>
</div>
<?php } ?>


<div class="form-group">
<select class="form-control" name="product_category_id" ng-model="product_category_id" style="height: 45px;width: 123px;font-size: 20px;" ng-change="Selectcat(product_category_id)">
<option value="0">
หมวดหมู่
</option>
<option ng-repeat="y in categorylist" value="{{y.product_category_id}}" style="font-size:30px;">
						{{y.product_category_name}}
					</option>
				</select>
			</div>




<div class="form-group">
<input id="product_name_search" ng-model="product_name_search"
class="form-control" placeholder="ค้นหา" style="height: 45px;width: 100px;font-size: 20px;" ng-change="searchproductlist(product_name_search)">
</div>






<!-- <div class="form-group">
<input id="customer_name" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 110px;font-size: 20px;" readonly="">
</div>
<div class="form-group">
<button type="submit" ng-click="Opencustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control" placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
</div>

<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->






</form>


<?php if($_SESSION['user_type']<'9'){?>
<form class="form-inline" style="float: right;">
<div class="form-group">
<input type="text" id="customer_name" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 100px;font-size: 20px;" readonly="">
</div>
<div class="form-group">
 <button type="hidden" ng-click="Opencustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control" placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
</div>
<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>


<!-- <div class="form-group">
<select class="form-control" ng-model="sale_type"  style="height: 45px;width: 150px;font-size: 20px;">
	<option value="1">
		<?=$lang_retail?>
	</option>

</select>
</div> -->



<!-- <div class="form-group" style="font-size: 20px;">
<input type="checkbox" ng-model="reserv" ng-true-value="1" ng-false-value="0" style="height: 35px;width: 35px;"><?=$lang_bookitem?>
</div> -->

</form>
<?php } ?>



<input type="hidden" name="" ng-model="customer_id">

<br /><br /><br />


<div style="height: 580px;overflow: auto;">




<div class="col-xs-4 col-sm-4 col-md-2 panel panel-default product_box" ng-repeat="x in productlist" style="height: 200px;cursor: pointer;padding-right: 0px;padding-left: 0px;" ng-click="Openselectproductnum(x,$index)" >
<!-- <span style="float: left;">{{x.product_code}}</span> -->
<div class="panel-body " style="padding: 0px;">


<center>
<img ng-if="x.product_image != ''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" class="img img-responsive" style="height: 140px;" title="{{x.product_name}}">

<img ng-if="x.product_image == ''" ng-src="<?php echo $base_url;?>/pic/df.png" class="img img-responsive" style="height: 140px;" title="{{x.product_name}}">

<p></p>
{{x.product_name}}
<br />

<div ng-if="x.product_price_discount==0.00" style="color: red;font-weight: bold;">
<span ng-if="sale_type=='1'">{{x.product_price | number:2}}</span>
<span ng-if="sale_type=='2'">{{x.product_wholesale_price | number:2}}</span>
</div>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='1'">
<strike>
{{x.product_price | number:2}}
</strike>
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='2'">
<strike>
{{x.product_wholesale_price | number:2}}
</strike>
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='1'" style="color: red;font-weight: bold;">
{{x.product_price-x.product_price_discount | number:2}}
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='2'" style="color: red;font-weight: bold;">
{{x.product_wholesale_price-x.product_price_discount | number:2}}
</span>



</center>

</div>
</div>




<?php if($_SESSION['user_type']!='10'){?>
<div class="col-sm-3 col-md-2">
<div ng-click="Addproductrank()" class="panel-body  panel panel-default product_box" style="height: 100px;cursor: pointer;background-color: #eee;">


<center>
ปักหมุดอาหาร<br />
<span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 30px;"></span>

</center>

</div>


<div ng-show="productlist.length != '0'" ng-click="Delproductrank()" class="panel-body  panel panel-default product_box" style="height: 75px;cursor: pointer;background-color: #eee;">


<center>
<?=$lang_removeitem?><br />
<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span>

</center>

</div>



</div>
<?php } ?>








</div>


	</div>



<div class="col-sm-4 col-md-4">


	<table width="100%">
	<tbody>
		<tr >

			<td>
		<form class="form-inline">


<?php if($_SESSION['user_type']<'9'){ ?>
<div class="form-group">
<select class="form-control" ng-model="pay_type" style="height: 45px;width: 150px;font-size: 20px;background-color:orange;color:#fff;">
	<option value="1">
		<?=$lang_cash?>
	</option>
	<!-- <option value="2">
		<?=$lang_transfer?>
	</option> -->
	<option value="3">
		<?=$lang_creditcard?>
	</option>
	<!-- <option value="4">
		<?=$lang_owe?>
	</option> -->
	<option value="5">
		<?=$lang_qrpayment?>
	</option>

	<!-- <option value="6">
		กระเป๋าเงิน
	</option> -->

</select>
</div>
<?php } ?>


<div class="form-group" style="float: right;">

<?php if(isset($_SESSION['shift_user_id']) && $_SESSION['user_id']==$_SESSION['shift_user_id']){?>
<button ng-click="Closeshiftnow()"  class="btn btn-lg btn-info" style="font-weight:bold">ปิดกะ (<?php if(isset($_SESSION['shift_id'])){echo $_SESSION['shift_id'];} ?>)</button>
<?php }else{
	if(isset($_SESSION['shift_user_name']) && $_SESSION['user_type']!='10'){
echo 'เปิดกะโดย: '.$_SESSION['shift_user_name'];
}

 } ?>
</div>
<!-- <div class="form-group" style="float: right;">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->


</form>

<!--
<form>
<input type="text" class="form-control" ng-model="product_code" style="text-align: right;height: 47px;background-color:#dff0d8;font-size: 20px;" placeholder="<?=$lang_barcode?>">


			</td>
			<td>

<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
</form>-->
			</td>
			</tr>
			<tr>

				<td colspan="2">

					<span  ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</span>

				</td>
			</tr>
			</tbody>
			</table>










<br />
<div class="panel panel-default">
	<div class="panel-body ">

		<span style="font-weight: bold;">
			<?php echo $lang_table;?> {{table_name}}
		</span>


<?php if($_SESSION['user_type']<'9'){ ?>
<div style="height: 250px;overflow: auto;">
<?php } ?>
<?php if($_SESSION['user_type']>='9'){ ?>
	<div style="height: 350px;overflow: auto;">
<?php } ?>

<table class="table table-hover">

	<tbody>
		<tr ng-repeat="x in listsale" style="background-color:#eee;">
	<td style="width: 1px;">

		<?php
if($_SESSION['user_type']=='1'){ ?>
		<button class="btn btn-default btn-xs" ng-click="Editpush(x)">
<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button>
	<?php } ?>

<?php
if($_SESSION['user_type']=='4'){ ?>
<button class="btn btn-default btn-xs" ng-click="Editpushadmin(x)">
<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button>
	<?php } ?>


</td>
			<td>
<!-- <input type="text" placeholder="0"  ng-model="x.product_sale_num" style="width:20px;text-align: right;"> -->
{{x.product_sale_num}}
</td>

			<td>

<span   ng-if="x.so_order !='0'" style="color: #337ab7;font-weight: bold;">
	{{x.product_name}}
	<br />
	{{x.note_order}}
</span>
<span   ng-if="x.so_order =='0'">
	{{x.product_name}}
	<br />
	{{x.note_order}}
</span>


<input type="hidden" ng-model="x.product_id">

			</td>

<td>

<span ng-if="x.status=='1'">
<i style="color:orange;font-size:10px;">กำลังทำ</i>
</span>
<span ng-if="x.status=='2'">
<i style="color:green;font-size:10px;">เสร็จแล้ว</i>
</span>

</td>

			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>


			<td style="width: 1px;">
	<?php
if($_SESSION['user_type']!='4' && $_SESSION['user_type']!='10'){ ?>
<button ng-if="x.so_order=='0'" class="btn btn-danger btn-xs" ng-click="Deletepush(x)">x</button>
<button ng-if="x.so_order!='0'" class="btn btn-default btn-xs" ng-click="Deletepushadmin(x)">x</button>

	<?php } ?>


<?php
if($_SESSION['user_type']=='4'){ ?>
	<button class="btn btn-default btn-xs" ng-click="Deletepushadmin(x)">x</button>
	<?php } ?>


	<?php
	if($_SESSION['user_type']=='10'){ ?>
		<button ng-if="x.so_order=='1' && x.product_sale_num=='1'" class="btn btn-default btn-xs" ng-click="Deletepushadmin(x)">x</button>
		<?php } ?>


			</td>


		</tr>





		<tr>
		<td colspan="3" align="right"><?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
		<tr >
		<td colspan="4" align="right">
		<?=$lang_vat?>
		{{vatnumber}} %
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
			<td></td>
		</tr>

		<tr >
		<td colspan="4" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>




<?php
}
?>




<!-- <tr ng-hide='true'>
		<td colspan="4" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_vat?></td>

		</tr>


		<tr ng-show="addvat">
		<td colspan="2" align="right">
		<?=$lang_vat?>
		 <input type="number" ng-model="vatnumber" style="width:50px;text-align: right;">
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
		</tr>

		<tr ng-show="addvat">
		<td colspan="2" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr> -->




	</tbody>
</table>

</div>





<table  class="table">
	<tbody>

<tr>
		<td colspan="2" style="font-weight: bold;font-size: 70px;color: green;text-align: center;vertical-align:middle;">
		<span ng-show="discount_percent=='0'">
	{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
	</span>

	<span ng-show="discount_percent=='1'">
	{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
	</span>

		</td>
</tr>


<?php if($_SESSION['user_type']<'9'){ ?>
	<tr ng-if="customer_product_score_all > '0'">
		<td colspan="2">
			<button class="btn btn-info btn-sm" ng-click="Showproduct_pointmodal()" style="width: 100%;font-size: 16px;">
				ใช้คะแนน ({{customer_product_score_all | number}})
			</button>
	</td>
</tr>

<?php } ?>





<?php if($_SESSION['user_type']<'100'){ ?>
<tr>
	<td colspan="2" ng-if="printer_ul =='0'">

			<button type="submit" ng-disabled="clickprintorder" ng-if="checkorder != '0'" class="btn btn-info btn-sm" ng-click="Printorder()" style="width: 100%;font-size: 16px;">ส่ง Order เข้าครัว</button>

			<button type="submit" ng-if="checkorder == '0'" class="btn btn-default btn-sm"  style="width: 100%;font-size: 16px;" disabled="">ส่ง Order เข้าครัว</button>

		</td>

		<td colspan="2" ng-if="printer_ul !='0' && printer_order_type=='0'">

			<button type="submit" ng-disabled="clickprintorder" ng-if="checkorder != '0'" class="btn btn-info btn-sm" ng-click="Printorderip()" style="width: 100%;font-size: 16px;">ส่ง Order เข้าครัว</button>

			<button type="submit" ng-if="checkorder == '0'" class="btn btn-default btn-sm"  style="width: 100%;font-size: 16px;" disabled="">ส่ง Order เข้าครัว</button>

		</td>


		<td colspan="2" ng-if="printer_ul !='0' && printer_order_type=='1'">

			<button type="submit" ng-if="checkorder != '0'" class="btn btn-info btn-sm" ng-click="Printorderipmodal()" style="width: 100%;font-size: 16px;">ส่ง Order เข้าครัว</button>

			<button type="submit" ng-if="checkorder == '0'" class="btn btn-default btn-sm"  style="width: 100%;font-size: 16px;" disabled="">ส่ง Order เข้าครัว</button>

		</td>
<?php } ?>



</tr>





</tbody>
</table>




<?php if($_SESSION['user_type']<'9'){?>
<table  class="table">
	<tbody>

<tr  ng-hide="servicechargelist.servicecharge_percent=='0'">
	<td>

<button class="btn btn-default" style="width:100%;text-align:center;" ng-click="Addpushproductcode(servicechargelist.product_code,'','servicecharge')">
Service Charge {{servicechargelist.servicecharge_percent}}%
</button>

	</td>
</tr>

<tr  ng-hide="vatlist.vat_percent=='0'">
	<td>

<button class="btn btn-default" style="width:100%;text-align:center;" ng-click="Addpushproductcode(vatlist.product_code,'','servicecharge','vat')">
VAT {{vatlist.vat_percent}}%
</button>

	</td>
</tr>


<tr>
<td>
ส่วนลดท้ายบิล <select ng-model="discount_percent">
	<option value="0"><?=$lang_mo?></option>
	<option value="1">%</option>
</select>



<div ng-show="discount_percent=='0'">
<input type="number" class="form-control" ng-model="discount_last" placeholder="<?=$lang_discount_last?>" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
<span ng-if="discount_last!='0'" style="font-weight: normal;">{{(discount_last*100)/(Sumsaleprice() + (Sumsaleprice() * vatnumber/100)) | number:2 }} %</span>
</div>


<div ng-show="discount_percent=='1'">
<input type="number" class="form-control" ng-model="discount_last_percent" placeholder="<?=$lang_dis?> %" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">

<span ng-if="discount_last_percent!='0'" style="font-weight: normal;">{{(Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100) | number:2 }} <?=$lang_currency?></span>
</div>



</td>

		</tr>



<tr>
	<td colspan="2">
		<button ng-disabled="listsale==''" type="submit" ng-if="printer_ul =='0'" class="btn btn-warning btn-sm" ng-click="Checkbill()" style="width: 100%;font-size: 16px;"><?php echo $lang_checkbill;?></button>


<button ng-disabled="listsale==''" type="submit" ng-if="printer_ul !='0'" class="btn btn-warning btn-sm" ng-click="Checkbillip()" style="width: 100%;font-size: 16px;"><?php echo $lang_checkbill;?></button>



	</td>
</tr>


		<tr >

			<td colspan="2">
				<span ng-if="customer_wallet > '0'">

				<button ng-disabled="listsale==''" type="submit" class="btn btn-lg btn-info" ng-click="Opengetmoneyfromwalletmodal()" style="width:100%;">
			<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>({{customer_wallet | number}}) ชำระเงินจากกระเป๋า
				</button>
				<br /><br />
				</span>

				<button ng-disabled="listsale==''" ng-click="Opengetmoneymodal()" class="btn btn-lg btn-primary" style="width:100%;font-size:30px;font-weight:bold;">
				รับเงิน</button>

		</td>
		</tr>

	</tbody>
</table>
<?php } ?>






<div class="modal fade" id="Addproductrankmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_additem?></h4>
			</div>
			<div class="modal-body">
	<input type="text" name="" ng-model="searchproductrank" ng-change="Searchproductranklist(searchproductrank)" placeholder="ค้นหาชื่อสินค้า" class="form-control">
<table class="table table-hover">
	<thead>
		<tr style="background-color: #ddd;">
			<th><?=$lang_additem?></th>
			<th><?=$lang_productname?></th>
			<th><?=$lang_price?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productranklist">
			<th><button class="btn btn-success btn-xs" ng-click="Addproductranksave(x)">+ <?=$lang_additem?></button>

			</th>

			<th>{{x.product_name}}</th>
			<th>{{x.product_price}}</th>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>














<div class="modal fade" id="Opengetmoneymodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body" style="height:600px;">


<center>


							<input type="text" class="form-control" ng-model="money_from_customer" placeholder="รับเงินจากลูกค้า" style="text-align: right;height: 70px;background-color:#dff0d8;font-size: 40px;font-weight:bold;">



<br />
<div ng-click="Addnumbermoney('1')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	1
</div>
<div ng-click="Addnumbermoney('2')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	2
</div>
<div ng-click="Addnumbermoney('3')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	3
</div>
<div ng-click="Addnumbermoney('4')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	4
</div>



<div ng-click="Addnumbermoney('5')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	5
</div>
<div ng-click="Addnumbermoney('6')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	6
</div>
<div ng-click="Addnumbermoney('7')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	7
</div>
<div ng-click="Addnumbermoney('8')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	8
</div>


<div ng-click="Addnumbermoney('9')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	9
</div>
<div ng-click="Addnumbermoney('0')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	0
</div>
<div ng-click="Addnumbermoney('20')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	20
</div>
<div ng-click="Addnumbermoney('50')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	50
</div>


<div ng-click="Addnumbermoney('100')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	100
</div>
<div ng-click="Addnumbermoney('500')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	500
</div>
<div ng-click="Addnumbermoney('1000')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	1000
</div>
<div ng-click="Addnumbermoney('x')" class="col-xs-3 col-sm-3 col-md-3 btn btn-warning" style="font-size:20px;font-weight:bold;height: 70px;">
x <br />	ลบทั้งหมด
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<br /><br />
</div>

<button type="submit"  class="col-xs-12 col-sm-12 col-md-12 btn btn-success" style="font-size:40px;font-weight:bold;height: 70px;" id="savesale" ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">
	ยืนยันชำระเงิน
</button>

</center>



			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">ปิดหน้าต่าง</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Opengetmoneyfromwalletmodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body" style="height:100px;">


<center>

<button type="submit"  class="col-xs-12 col-sm-12 col-md-12 btn btn-success" style="font-size:40px;font-weight:bold;height: 70px;" id="savesale" ng-click="Savesale('wallet',Sumsalepricevat(),discount_last )">
	ยืนยันชำระเงินจากกระเป๋า
</button>

</center>



			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">ปิดหน้าต่าง</button>

			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="Delproductrankmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_removeitem?></h4>
			</div>
			<div class="modal-body">

<table class="table table-hover">
	<thead>
		<tr style="background-color: #ddd;">
			<th><?=$lang_removeitem?></th>
			<th><?=$lang_productname?></th>
			<th><?=$lang_price?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<th><button class="btn btn-default btn-xs" ng-click="Delproductranksave(x)">- <?=$lang_removeitem?></button></th>
			<th>{{x.product_name}}</th>
			<th>{{x.product_price}}</th>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>













<div class="modal fade" id="Showproduct_pointmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เลือกอาหาร/เครื่องดื่ม ฟรี</h4>
			</div>
			<div class="modal-body">
<center><h1>คะแนนที่มี {{customer_product_score_all | number}}</h1></center>
<table class="table table-hover">
	<thead>
		<tr style="background-color: #ddd;">
			<th>เลือก</th>
			<th>อาหาร/เครื่องดื่ม</th>
			<th>จำนวน</th>
			<th>คะแนนที่จะหัก</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in product_point_list">

			<th><button  ng-if="x.point_use <= ParsefloatFunc(customer_product_score_all)" class="btn btn-default btn-sm" ng-click="Addpushproductcode(x.product_code,x)">เลือก</button></th>
			<th>{{x.product_name}}</th>
			<th>1</th>
			<th>{{x.point_use | number}}</th>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>










<div class="modal fade" id="Openfull">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">





<table width="100%">
	<tbody>
		<tr>

			<td align="left">
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_searchproductnameorscan?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>
				<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td style="font-size: 50px;font-weight: bold;">
				<span style="color: red">{{Sumsalepricevat() | number:2 }}</span> <?=$lang_currency?>
			</td>
			<td align="right"  width="10%">
			<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>
		</td>

		</tr>
	</tbody>
</table>


<hr />
<div style="height: 350px;overflow: auto;" id="Openfulltable">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;"><?=$lang_rank?></th>

			<th style="text-align: center;width: 250px;"><?=$lang_productname?></th>
			<th style="text-align: center;width: 100px;"><?=$lang_barcode?></th>
			<th style="text-align: center;width: 150px;"><?=$lang_saleprice?></th>

			<th width="100px;" style="text-align: center;width: 100px;"><?=$lang_discountperunit?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_qty?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_priceall?></th>
			<th style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale" style="font-size: 20px;">
			<td  style="width: 50px;" align="center">{{$index+1}}</td>

			<td style="width: 250px;">

  {{x.product_name}}


<input type="hidden" ng-model="x.product_id">

			</td>
<td align="center" style="width: 100px;">{{ x.product_code }}</td>


			<td align="right" style="width: 150px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width: 100px;"><input type="" placeholder="<?=$lang_discount?>" class="form-control" ng-model="x.product_price_discount" style="text-align: right;"></td>
			<td align="right" style="width: 80px;"><input type="" placeholder="<?=$lang_qty?>" class="form-control" ng-model="x.product_sale_num" style="text-align: right;width: 80px;"></td>

			<td style="width: 50px;" align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>
			<td><button class="btn btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>


		<tr style="font-size: 20px;">
		<td colspan="5" align="right"><?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;">
		<td colspan="8" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_addvat?></td>

		</tr>


		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right">
		vat
		 <input type="number" ng-model="vatnumber" style="width: 50px;text-align: right;">
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>

	</tbody>
</table>


</div>

<hr />
<table  class="table table-hover" width="100%">
	<tbody>
	<tr style="font-size: 20px;">
		<td align="right"><?=$lang_all?></td>

			<td align="right" style="font-weight: bold;"><?=$lang_qty?> {{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;"><?=$lang_summary?> <span style="color: red">{{Sumsalepricevat() | number:2 }}</span> <?=$lang_currency?></td>
<td></td>
		</tr>
		</tbody>
		</table>

<table  class="table table-hover" width="100%">
	<tbody>




		<tr  style="font-size: 20px;">
		<td   width="25%" align="right"><?=$lang_getmoney?>:</td>
			<td>
			<form>
			<input type="text" id="money_from_customer2" class="form-control" ng-model="money_from_customer" placeholder="<?=$lang_moneyfromcus?>" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">



		</td>
		<td width="35%"> <?=$lang_moneychange?>: <b>{{money_from_customer - Sumsalepricevat() | number:2}} <?=$lang_currency?></b></td>
		<td align="right" width="10%"><button type="submit" class="btn btn-success btn-lg" id="savesale2" ng-click="Savesale(money_from_customer,Sumsalepricevat())"><?=$lang_getmoneyenter?></button></td>
</form>

		</tr>
	</tbody>
</table>





			</div>

		</div>
	</div>
</div>




<div class="modal fade" id="Openchangemoney">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title"><?=$lang_moneychange?></h4>
			</div>
			<div class="modal-body text-center">
		<h1 style="color: red;font-weight: bold;font-size: 70px;">
		{{changemoney | number:2}}
		</h1>
<br />


<button ng-if="printer_ul !='0'" class="btn btn-primary btn-lg" ng-click="printDivminiip()" style="font-size:39px;font-weight: bold;"><?=$lang_receipt?></button>

<button ng-if="printer_ul =='0'" class="btn btn-primary btn-lg" ng-click="printDivmini()" style="font-size:39px;font-weight: bold;"><?=$lang_receipt?></button>

<hr />
<button type="button" class="btn btn-default" ng-click="clickokafterpay()"><?=$lang_close?></button>



<!-- <button class="btn btn-default" ng-click="printDivfull()"><?=$lang_billfull?></button> -->
			</div>

		</div>
	</div>
</div>













<hr />



</div>
</div>






<div class="modal fade" id="Opencustomer">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_searchcus?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="customer_name" class="form-control" placeholder="ค้นหา รหัสสมาชิก หรือชื่อ" style="height: 45px;font-size: 20px;">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg" placeholder="" title="Enter"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-default btn-lg" placeholder="" title="ไปหน้าลูกค้า" target="_blank">ไปหน้าลูกค้า</a>
</div>
</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?=$lang_select?></th>
			<th style="text-align:center;"><?=$lang_memberid?></th>
			<th style="text-align:center;"><?=$lang_cusname?></th>
			<th style="text-align:center;">คะแนน</th>
			<th style="text-align:center;">เงินในกระเป๋า</th>
			<th style="text-align:center;">เติมเงิน</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in customerlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Selectcustomer(x)">
<?=$lang_select?>
			</button></td>
			<td style="text-align:center;">{{x.cus_add_time}}</td>
			<td style="text-align:center;">{{x.cus_name}}</td>
			<td style="text-align:center;">{{x.product_score_all | number}}</td>
			<td align="right"><b>{{x.wallet | number}}</b> บาท</td>
			<td align="center"><button class="btn btn-info" ng-click="Addwalletmodal(x)">เติมเงิน</button> </td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Addwalletmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">

<center>
<h3><b>เติมเงินให้ <br /> {{addwallet_cus_name}} </b>
<br />
{{addwallet_cus_add_time}}
</h3>
<form>
<input type="number" ng-model="addwallet_money" placeholder="0" class="form-control" style="width:150px;font-size:40px;height:50px;">
<br />
<button type="submit" ng-show="addwallet_money" class="btn btn-success btn-lg" ng-click="Addwalletconfirm()">ยืนยัน</button>
</form>
</center>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>






<div style="position: absolute; opacity: 0.0;">

<div class="modal fade" id="Addwalletmodalprint">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body" id="section-to-print-addwallet" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">


	<center>
	<td width="250px" align="center">
		<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
	</td>
	</tr>
	</table>
	</center>

			<b><span style="font-size: 30px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

			<br />
	<?php echo $_SESSION['owner_address']; ?>
	<br />
	โทร     <?php  echo ' '.$_SESSION['owner_tel']; ?>

	<br />
	____________________________________________
	<br />
<b>กระเป๋าเงิน คุณ {{addwallet_cus_name}} </b>
<br />
รหัสสมาชิก {{addwallet_cus_add_time}}
<br />
เติมเงินใหม่ <b> {{ParsefloatFunc(addwallet_money) | number}} </b> บาท
<br />
ยอดเงินคงเหลือ <b> {{ParsefloatFunc(addwallet_wallet)+ParsefloatFunc(addwallet_money) | number}} </b> บาท

<br />
________________________________________________________
		<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>

<?=$lang_day?>    {{adddate}}

<br />


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>

</div>





<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productlist?></h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="ค้นหารหัสหรือชื่อสินค้า" style="width:300px;" class="form-control">
<br />
<div style="overflow: auto;height: 400px;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคา</th><th>ส่วนลดต่อหน่วย</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success">เลือก</button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_price_discount | number:2}}</td>
		</tr>
	</tbody>
</table>
</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_saleproductlist?></h4>

			</div>
			<div class="modal-body" id="section-to-print">



		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
			<br />

<b><?=$lang_table?>: {{table_name_getone}}</b>
	Order: {{sale_runno}}


<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"><?=$lang_rank?></th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<!-- <th style="width:100px;"><?=$lang_barcode?></th> -->
			<th style="width:100px;"><?=$lang_saleprice?></th>
			<th style="width:100px;"><?=$lang_discountperunit?></th>
			<th style="width:100px;"><?=$lang_qty?></th>
			<th style="width:100px;"><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td style="width:300px;">{{x.product_name}}</td>
			<!-- <td align="center" style="width:50px;">{{x.product_code}}</td> -->
			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="4"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>



	<?php
if($_SESSION['owner_vat_status']=='1'){
?>
 <tr ng-if="vat3=='0'">
		<td align="right" colspan="5"><?=$lang_vat?> {{<?=$_SESSION['owner_vat']?>}}%</td>
		<td style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>




		<tr ng-if="vat3=='0'">
		<td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr ng-if="vat3=='0'">
		<td align="right" colspan="5">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>


<tr ng-if="vat3!='0'">
		<td align="right" colspan="5"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="5">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>



<?php
}
?>





<?php
if($_SESSION['owner_vat_status']=='2'){
?>
 <tr ng-if="vat3!='0'">
		<td align="right" colspan="5"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="5">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

<?php
}
?>




<!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="5"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->

		<tr><td align="right" colspan="5"><?=$lang_discount?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="5"><?=$lang_sumall?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>
		<tr><td align="right" colspan="5"><?=$lang_getmoney?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr><td align="right" colspan="5"><?=$lang_moneychange?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer3-(sumsalevat-discount_last2) | number:2}}</td></tr>
	</tbody>
</table>





			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Openonemini"   style="visibility: hidden;">
	<div class="modal-dialog modal-sm"  style="width:<?php echo $slipwidth;?>;">
		<div class="modal-content">
			<div class="modal-body">
			<div  id="section-to-print">
		<center>
			<table>
	<tr>
<td align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
</tr>
</table>
		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>


<?php if($_SESSION['owner_tax_number'] != ''){ ?>
		<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<?php } ?>


		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />


			________________
				<br />


				<span ng-if="cus_id != null">
				<table width="100%">
					<tr>
						<td><?=$lang_cusname?></td>
						<td>{{cus_name}}</td>
					</tr>
					<tr>
						<td colspan="2"><?=$lang_address?>: {{cus_address_all}}</td>
					</tr>
					<tr>
						<td>เงินในกระเป๋า</td>
						<td>{{cus_wallet | number}}</td>
					</tr>
					<tr>
						<td>คะแนนสะสม</td>
						<td>{{cus_score | number}}</td>
					</tr>
				</table>

								________________
				</span>


<?=$lang_receipt?></button>
<br />
<?=$lang_table?>: {{table_name}}
<br />


ชำระโดย
<span ng-if="pay_type_slip=='1'">เงินสด</span>
<span ng-if="pay_type_slip=='2'"><?=$lang_transfer?></span>
<span ng-if="pay_type_slip=='3'"><?=$lang_creditcard?></span>
<span ng-if="pay_type_slip=='4'"><?=$lang_owe?></span>
<span ng-if="pay_type_slip=='5'"><?=$lang_qrpayment?></span>
<span ng-if="pay_type_slip=='6'">กระเป๋าเงิน Wallet</span>

<br />





<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->


<!--
<span ng-if="cus_name != ''">
___________________________
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>  -->

	<?=$lang_productservice?>

</center>

<table class="table" style="width: 100%;font-size:14px;">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">

			<td align="left"> {{x.product_name}}</td>
			<td align="center">{{x.product_sale_num}}  x {{x.product_price|number:2}}</td>
			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td colspan="2"  align="right"><?=$lang_summary?>:</td>


			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>

<tr ng-if="vat3 > '0'">
<td><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(vat3/100) | number:2}}</td>
		</tr>


		<tr  ng-if="vat3 > '0'">
		<td><?=$lang_pricesumvat?></td>
		<td align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

		<tr>

		<td colspan="2" align="right"><?=$lang_discount?>:</td>
		<td align="right">{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td colspan="2" align="right"><?=$lang_sumall?>:</td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


		<tr>

		<td colspan="2" align="right"><?=$lang_getmoney?>:</td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>

		<td colspan="2" align="right"><?=$lang_moneychange?>:</td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td>
	</tr>

<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
<td colspan="2" align="right"><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td colspan="2" align="right"><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>


</tbody>
</table>

<!-- __________________________________________
<table width="100%">
	<tbody>
		<tr ng-repeat="c in lastbillcat">
			<td style="text-align: left;">{{c.catname}}</td>
			<td>{{c.num}}</td>
			<td>{{c.pricevalue}}</td>
		</tr>

	</tbody>
</table> -->

<center>
________________
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />
Order: {{sale_runno}}
<br />

<?=$lang_day?>พิมพ์: {{adddate}}

<br />

<?=$_SESSION['footer_slip']?>

<br />
________________
</center>
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>







	</div>


<?php if($_SESSION['user_type'] < '9'){?>
 <div class="col-sm-12 col-md-12">
	<div class="col-sm-12 col-md-12 panel panel-default">
	<div class="panel-body">

รายการขายล่าสุด

<?php if($_SESSION['user_type']=='4'){?>
 <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut">
	<?=$lang_showdel?>
</div>
<?php } ?>

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')" class="form-control" placeholder="<?=$lang_search?>">
</div>
 <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />




<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th><?=$lang_runno?></th>


			<th><?=$lang_table?></th>

			 <th><?=$lang_cusname?></th>

			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			 <th><?=$lang_vat?> Exclude</th>
			<th><?=$lang_pricesumvat?></th>
<?php
}
?>

			<th><?=$lang_discount?></th>
			<th><?=$lang_sumall?></th>
			<th><?=$lang_getmoney?></th>
			<th><?=$lang_moneychange?></th>
			<th><?=$lang_payby?></th>
			<th><?=$lang_day?></th>
			<th  ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button></td>

<td>{{x.table_name}}</td>

<td>{{x.cus_name}}</td>

			<td  align="right">{{x.sumsale_num | number}}</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			 <td  align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
	<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}</td>

<?php
}
?>



			<td  align="right">{{x.discount_last | number:2}}</td>
			<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>
			<td  align="right">{{x.money_from_customer | number:2}}</td>
			<td  align="right">{{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}</td>

			<td>
<span ng-if="x.pay_type=='1'">เงินสด</span>
<span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
<span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>
<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
<span ng-if="x.pay_type=='6'">กระเป๋าเงิน Wallet</span>
			</td>


			<td>{{x.adddate}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
		</tr>
	</tbody>
</table>


<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="perpage" id="perpage" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

<?=$lang_page?>
<select name="selectthispage" id="selectthispage" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


</div>
	</div>
	</div>
<?php } ?>








<div class="modal fade" id="Opentable">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">


				<button ng-if="table_id!=''" type="button" class="btn btn-default" ng-click="Closeopentablemodal()" style="float: right;">ปิดหน้าต่าง</button>


<?php if($_SESSION['user_type']<'9'){?>
				<a style="float: right;" href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-warning" target="_blank">เพิ่ม ลบ แก้ไข รายการอาหาร</a>
<?php } ?>



				<h4 class="modal-title"><?php echo $lang_selecttable;?></h4>
<input type="text" ng-model="searchtablename" placeholder="ค้นหา"  class="form-control" style="width:200px;height:50px;font-size:25px;font-weight:bold;"/>
			</div>
			<div class="modal-body" style="height: 450px;overflow: scroll;">

<center ng-show="confirmcloseshiftnowok == '1' && cshiftnow=='0'">

<h1><b>ปิดกะส่งยอดเงิน</b></h1>

<input type="number" ng-model="shift_money_end" class="form-control" placeholder="เงินทั้งหมดในลิ้นชัก x.xx" style="font-size:25px;font-weight:bold;width:350px;height:60px;" />
<br>
	<button ng-show="shift_money_end" ng-click="Confirmcloseshiftnow()" class="btn btn-lg btn-success" style="font-size:50px;font-weight:bold">ยืนยันการปิดกะ</button>
<hr />

<button  ng-click="Canclecloseshiftnow()" class="btn btn-sm btn-default" style="font-size:50px;font-weight:bold" >ขายต่อ</button>





</center>


<?php if(!isset($_SESSION['shift_id'])) {?>
<center ng-show="shiftnow == '0'">

<?php if(isset($_SESSION['shift_id_old'])){ ?>



	<?php

$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
	echo 'เงินในลิ้นชักสุดท้าย('.number_format($_SESSION['shift_money_end_old'],2).') - เงินเริ่มต้น('.number_format($_SESSION['shift_money_start_old'],2).') = ส่วนต่าง('.$moneyshiftchange.')'

	?>


<br />

	<button  type="submit" ng-if="printer_ul =='0'" ng-click="Openbillcloseday()" class="btn btn-info btn-lg"   >พิมพ์บิลปิดยอดกะ <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

	<button ng-if="printer_ul !='0' " type="button" class="btn btn-info btn-lg" ng-click="Openbillclosedayip()" >พิมพ์บิลปิดยอดกะ <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

<hr />
<?php } ?>



<?php if($_SESSION['user_type'] < '9'){ ?>
<h1><b>เปิดกะใหม่</b></h1>
<br>
<input type="number" ng-model="shift_money_start" class="form-control" placeholder="เงินเริ่มต้นในลิ้นชัก x.xx" style="font-size:25px;font-weight:bold;width:350px;height:60px;" />
<br>
<button ng-show="shift_money_start" ng-click="Openshiftnow()" class="btn btn-lg btn-info" style="font-size:50px;font-weight:bold">เปิดกะใหม่</button>
<h1>	<?php echo date('d/m/Y H:i:s',time()); ?> </h1>

<?php }else{
	echo '<h1><b>กรุณารอเปิดกะ</b></h1>';
} ?>




</center>


<?php } ?>


<div  ng-show="shiftnow == '1' && confirmcloseshiftnowok == '0'" class="col-sm-4 col-sm-4 col-md-3" ng-repeat="x in tablelist | filter:searchtablename">



<span ng-if="x.table_id == null"  class="btn btn-default" ng-click="Selecttable(x)" style="width: 100%;">
<b style="float:right;color:#000;">ว่าง</b>
<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>
<br />
</center>
</span>


<span ng-if="x.table_id != null && x.number_of_order=='0' && x.food_table_status=='0'"  class="btn btn-primary" ng-click="Selecttable(x)" style="width: 100%;">
<b style="float:right;color:#fff;">กำลังรับประทาน</b>
<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

			{{Getdatenowtotime(datenow - x.adddate)}}

</center>
</span>

<span ng-if="x.table_id != null && x.number_of_order!='0' && x.food_table_status=='0'"  class="btn btn-warning" ng-click="Selecttable(x)" style="width: 100%;">
<b style="float:right;color:#fff;">{{x.number_of_order}} ออเดอร์ใหม่</b>

<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>
	{{Getdatenowtotime(datenow - x.adddate)}}

</center>
</span>


<span ng-if="x.table_id != null && x.food_table_status!='0'"  class="btn btn-info" ng-click="Selecttable(x)" style="width: 100%;">
<b style="float:right;color:#fff;">เช็คบิลแล้ว</b>

<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

			{{Getdatenowtotime(datenow - x.adddate)}}
</center>
</span>





<br /><br />
</div>




			</div>
			<div class="modal-footer">

				<center>
					<a href="<?php echo $base_url;?>" class="btn btn-lg btn-default">
						ไปหน้าแรก
					</a>


				<a href="<?php echo $base_url;?>/logout" class="btn btn-lg btn-default">
<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
					ออกจากระบบ</a>
				</center>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Opentablecus2mer">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">


			</div>
			<div class="modal-body">

<div ng-repeat="x in tablelist">


		<span ng-if="x.food_table_id == '<?php if(isset($_SESSION['food_table_id'])){ echo $_SESSION['food_table_id'];} ?>'"  class="btn btn-default" ng-click="Selecttable(x)" style="width: 100%;">
		<center>

					<h1 style="font-weight: bold;">{{x.food_table_name}}</h1>


					<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

		</center>
		</span>


</div>




			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Openselectproductnum">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_qty?> </h4>
			</div>
			<div class="modal-body">

<table class="table" width="100%">
	<tr>
<td valign="top">
<center>
	<h1>{{product_name_num}}</h1>

<select ng-model="productaddqty" class="form-control" style="font-size: 50px;font-weight: bold;text-align: center;width: 100px;height: 70px;background-color:orange;color:#fff;">

	<?php
for($i=1;$i<=100;$i++){
echo '<option value="'.$i.'">'.$i.'</option>';
}
	?>


</select>

	<br />
	<br />

<textarea class="form-control" ng-model="note_order" placeholder="โน๊ต... เผ็ด ไม่เผ็ด... อาหารนอกเมนู">
</textarea>

</center>

</td>
<td width="30%" valign="top">
<div style="height: 250px;overflow: auto;">

<span ng-if="getproductpotlist.length!='0' || getproductpotlistshowall.length!='0'">ออฟชั่น
<br />
</span>

<span ng-repeat="x in getproductpotlist">
<button ng-click="Addpottoproduct(x)" class="btn btn-warning btn-lg" style="margin-right: 2px;margin-bottom: 2px;">
+ {{x.product_ot_name}}
({{x.product_ot_price | number}})
</button>
<br />
</span>

<span ng-if="getproductpotlistshowall.length!='0'">
<br />
</span>

<span ng-repeat="x in getproductpotlistshowall">
<button ng-click="Addpottoproduct(x)" class="btn btn-warning btn-lg" style="margin-right: 2px;margin-bottom: 2px;">
+ {{x.product_ot_name}}
({{x.product_ot_price | number}})
</button>
<br />
</span>

</div>

</td>
	</tr>
</table>



<center>

<button type="button" class="btn btn-success btn-lg" ng-click="Addpushproductcode(productcode)"  style="font-size:50px;font-weight:bold;"><?=$lang_confirm?></button>

	<button type="button" class="btn btn-default btn-lg" data-dismiss="modal"  style="font-size:50px;font-weight:bold;">ยกเลิก</button>
</center>

			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>











<div class="modal fade" id="Opentablemove">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ย้ายจากโต๊ะ <b>{{table_name}}</b> ไปโต๊ะ</h4>
			</div>
			<div class="modal-body" style="height: 450px;overflow: scroll;">


<div class="col-sm-4 col-sm-4 col-md-3" ng-repeat="x in tablelist">

<div ng-if="x.table_id == null"  class="col-md-12 btn btn-default" ng-click="Selecttablemove(x)" style="width: 100%;">
<span style="float:right;">ว่าง</span>
<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

</center>
</div>


<div ng-if="x.table_id != null"  class="col-md-12 btn btn-primary" ng-click="Selecttablemove(x)" style="width: 100%;">
<span style="float:right;">ไม่ว่าง</span>
<center>

			<h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


			<h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

</center>
</div>


<div class="col-md-12">
<BR />
</div>
</div>




			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Opencheckbill"   style="visibility: hidden;">
	<div class="modal-dialog modal-sm" style="width:<?php echo $slipwidth;?>;">
		<div class="modal-content">

			<div class="modal-body">
	<div  id="section-to-print">
<center>
<table>
	<tr>
<td align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
</tr>
</table>

		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>



<?php if($_SESSION['owner_tax_number'] != ''){ ?>
		<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<?php } ?>



		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
________________
<br />
<b><?=$lang_bill?></b>
<br />
<b><?=$lang_table?>: {{table_name}}</b>
</center>


<table class="table" style="width: 100%;font-size:14px;">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale">
			<td align="left">{{x.product_name}}</td>
			<td align="center">{{x.product_sale_num}}</td>
			<td align="right">{{(x.product_price-x.product_price_discount)*x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">

			<?=$lang_all?>:
			</td>
			<td align="right">

 {{Sumsaleprice() | number:2}}
			</td>
		</tr>





		<?php
if($_SESSION['owner_vat_status']=='2'){
?>
		<tr >
		<td colspan="2" align="right">
		<?=$lang_vat?>
		<?=$_SESSION['owner_vat']?> %
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * <?=$_SESSION['owner_vat']?>/100) | number:2 }}
			</td>

		</tr>


	<tr >
		<td colspan="2" align="right">
		ยอดรวม vat
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * <?=$_SESSION['owner_vat']?>/100)+Sumsaleprice() | number:2 }}
			</td>

		</tr>



<?php
}
?>



	<tr>
			<td colspan="2" align="right">
			<?=$lang_discount?>:
			</td>
			<td align="right">

<span ng-show="discount_percent=='0'">
		{{discount_last | number:2 }}
		</span>

		<span ng-show="discount_percent=='1'">
		{{Sumsaleprice()*(discount_last_percent/100) | number:2 }}
		</span>

			</td>
		</tr>




		<tr>
			<td colspan="2" align="right" style="font-size: 18px;font-weight: bold;">
				<?=$lang_payment?>:
			</td>
			<td align="right" style="font-size: 18px;font-weight: bold;">
				<span ng-show="discount_percent=='0'">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
		</span>

		<span ng-show="discount_percent=='1'">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
		</span>
			</td>
		</tr>
	</tbody>
</table>

 <center>
________________
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />

<?=$lang_day?>: <?php echo date('d-m-Y',time())?>

<br />
________________
</center>



</div>



			</div>
			<div class="modal-footer">
<button type="button" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>

			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Openbillcloseday">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-body">
<form class="form-inline">
<div class="form-group">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div> -->



</form>
		<div  id="section-to-print">
<center>
					<table style="table-layout: fixed;">
	<tr>
<td width="150px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
</tr>
</table>
		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>


<?php if($_SESSION['owner_tax_number'] != ''){ ?>
		<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<?php } ?>


	<br />

<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
________________
<br />
<?=$lang_billclostday?> กะที่ <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
<br/>
เริ่ม: <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
<br />
ถึง: <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
<br />
<?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
echo 'เงินในลิ้นชักสุดท้าย( '.number_format($_SESSION['shift_money_end_old'],2).' )
<br /> เงินเริ่มต้น( '.number_format($_SESSION['shift_money_start_old'],2).' )
<br />= ส่วนต่าง( '.$moneyshiftchange.' )';
}
?>
<br />

<span ng-if="shiftclose_addwallet[0].money_add != null">
..............................
<br />
เพิ่มเงินเข้ากระเป๋า Wallet ({{shiftclose_addwallet[0].money_add | number}})
<br />
</span>
..............................

</center>

<table class="" style="width: 100%;"  ng-repeat="x in openbillclosedaylista">

	<tbody>
		<tr style="font-weight:bold;">
			<td><i>{{x.product_category_name2}}</i></td>
			<td>
				{{x.product_sale_num2}}
			</td>
			<td align="right">{{x.product_price2 | number:2}}</td>
		</tr>
		<tr ng-repeat="y in openbillclosedaylist_product" ng-if="y.product_category_id2==x.product_category_id2">
<td> <li>- {{y.product_name2}} </li></td>
<td>{{y.product_sale_num2}}</td>
<td align="right">{{y.product_price2 | number:2}}</td>
		</tr>

</tbody>
</table>

<center>..............................</center>
 <table class="" style="width: 100%;">

	<tbody>

        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_discount?></td>
			<td align="right">{{x.discount_last2 | number:2}}</td>

		</tr>
	</tbody>
</table>

<center>..............................</center>
<table class="" style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td>
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
			<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
			<span ng-if="x.pay_type=='6'">กระเป๋าเงิน Wallet</span>
		</td>

			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
     </tbody>
</table>
<center>..............................</center>
    <table class="" style="width: 100%;">
	<tbody>
        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_all?></td>
			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
	</tbody>
</table>

<center>
________________
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />

<?=$lang_day?><?=$lang_print?>: <?php echo date('d-m-Y H:i:s',time())?>

<br />
________________
</center>


</div>

			</div>
			<div class="modal-footer">
	<button type="button" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>


	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>
	</div>
</div>















<div style="position: absolute; opacity: 0.0;">

<div class="modal fade" id="Openbillclosedayip">
	<div class="modal-dialog" style="width: 790px;">
		<div class="modal-content">

			<div class="modal-body">
<form class="form-inline">
<div class="form-group">

<center>
<button ng-show="printer_ul !='0'" ng-click="printDiv2ip('billclose')" type="button" class="btn btn-primary" ><?=$lang_print?></button>
</center>

</div>


</form>


		<div  id="section-to-print-billclose" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

<center>
<td width="250px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
</td>
</tr>
</table>
</center>

		<b><span style="font-size: 30px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
____________________________________________
<br />
<?=$lang_billclostday?> กะที่ <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
<br/>
เริ่ม: <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
<br />
ถึง: <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
<br />
<?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
echo 'เงินในลิ้นชักสุดท้าย( '.number_format($_SESSION['shift_money_end_old'],2).' )
<br /> เงินเริ่มต้น( '.number_format($_SESSION['shift_money_start_old'],2).' )
<br /> ส่วนต่าง( '.$moneyshiftchange.' )';
}
?>
<br />
<span ng-if="shiftclose_addwallet[0].money_add != null">
____________________________________________
<br />
เพิ่มเงินเข้ากระเป๋า Wallet ({{shiftclose_addwallet[0].money_add | number}})
<br />
</span>
____________________________________________


<table class="" style="width: 100%;"  ng-repeat="x in openbillclosedaylista">

	<tbody>
		<tr style="font-weight:bold;">
			<td><i>{{x.product_category_name2}}</i></td>
			<td>
				{{x.product_sale_num2}}
			</td>
			<td align="right">{{x.product_price2 | number:2}}</td>
		</tr>
		<tr ng-repeat="y in openbillclosedaylist_product" ng-if="y.product_category_id2==x.product_category_id2">
<td> <li>- {{y.product_name2}} </li></td>
<td>{{y.product_sale_num2}}</td>
<td align="right">{{y.product_price2 | number:2}}</td>
		</tr>

</tbody>
</table>

____________________________________________
 <table style="width: 100%;">

	<tbody>

        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_discount?></td>
			<td align="right">{{x.discount_last2 | number:2}}</td>

		</tr>
	</tbody>
</table>

____________________________________________
<table  style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td>
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
			<span ng-if="x.pay_type=='5'">QR Payment</span>
			<span ng-if="x.pay_type=='6'">กระเป๋าเงิน Wallet</span>
		</td>

			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
     </tbody>
</table>
____________________________________________
    <table  style="width: 100%;">
	<tbody>
        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_all?></td>
			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
	</tbody>
</table>


____________________________________________
		<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>

<?=$lang_day?>: <?php echo date('d-m-Y H:i:s',time())?>
<br />
____________________________________________



</div>

			</div>
			<div class="modal-footer">
	<button type="button" ng-if="printer_ul =='0'" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>




	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>
	</div>
</div>

</div>
















<div class="modal fade" id="Editpushmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไข {{product_name_edit}}</h4>
			</div>
			<div class="modal-body">



	<center ng-show="checkadminpassedit=='1'">
	ยืนยันการแก้ไข {{dataforedit.product_name}} <br />กรุณากรอก รหัสผ่าน Admin ร้าน
	<br />
	<input type="password" ng-model="adminpass" class="form-control">
	<br />
	<button type="button" class="btn btn-success btn-lg" ng-click="Editpush(dataforedit)">ยืนยัน</button>
	<span ng-if="addminpasswrongedit=='1'" style="color: red;">
		<br />
รหัสผ่าน Admin ร้าน ผิด กรุณากรอกใหม่
	</span>
</center>





<center ng-show="checkadminpassedit==''">
	<h1>
<input type="text" ng-model="product_name_edit" class="form-control" style="font-size: 30px;height: 50px;">
	</h1>


note
<textarea ng-model="product_note_order_edit" class="form-control" placeholder="โน๊ต เผ็ด ไม่เผ็ด อาหารนอกเมนู">
</textarea>
<br />
	ราคา
	<input type="text" ng-model="product_price_edit" class="form-control" style="width: 200px;font-size: 30px;text-align: right;height: 50px;">
	<br/>
	จำนวน
	<select ng-model="product_sale_num_edit" class="form-control" style="width: 100px;font-size: 30px;height: 50px;">


		<?php
for($i=1;$i<=100;$i++){
echo '<option value="'.$i.'">'.$i.'</option>';
}
	?>


	</select>
	<br />
	<button class="btn btn-success btn-lg" ng-click="Editpushsave()">บันทึก</button>
</center>




			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="printorder">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body">


<button ng-repeat="x in listorder_cat" class="btn btn-default" ng-click="Showordercat_print(x)">
	{{x.product_category_name}}
</button>

<div  id="section-to-print2">
<center>
<h3><b><?=$lang_table?>: {{table_name}}</b></h3>

{{product_category_name_order}}
</center>


<table class="table" style="width: 100%;font-size: 18px;font-weight: bold;">
	<tbody>
<tr ng-repeat="x in listorder" ng-if="product_category_id_order=='' || product_category_id_order==x.product_category_id">
			<td align="left">{{x.product_name}}
<span ng-if="x.note_order !=''">({{x.note_order}})</span>
			</td>
			<td align="right">{{x.product_sale_num}}</td>
		</tr>



	</tbody>
</table>
 <center style="font-size: 12px;">
{{listorder[0].adddate}}

<br />
________
</center>



</div>





			</div>
			<div class="modal-footer">
<button type="button" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>

			</div>
		</div>
	</div>
</div>











<div style="position: absolute; opacity: 0.0;">
<div class="modal fade" id="printorderipmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">


<button ng-repeat="x in listorder_cat" class="btn btn-default" ng-click="Showordercat_print(x)">
	{{x.product_category_name}}
</button>

<div  id="section-to-print-order" style="width: <?php echo $pt_width;?>;font-size: 26px;text-align: left;background-color: #fff;overflow:visible !important;">


<b style="float:left;font-size:30px;"><?=$lang_table?>: {{table_name}}</b>


{{product_category_name_order}}



<table class="table table-hover" width="100%">
<tr ng-repeat="x in listorder" ng-if="product_category_id_order=='' || product_category_id_order==x.product_category_id">
			<td style="float:left;">{{x.product_name}} [by {{x.name}}]

<i ng-if="x.note_order !=''">
<br />
	({{x.note_order}})</i>
			</td>

			<td align="left">{{x.product_sale_num | number}}</td>
		</tr>




</table>
 <center>
{{listorder[0].adddate}}

<br />
________
</center>



</div>





			</div>
			<div class="modal-footer">
<button type="button" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>

			</div>
		</div>
	</div>
</div>
</div>

















<div style="position: absolute; opacity: 0.0;">
<div class="modal fade" id="Opencheckbillip">
	<div class="modal-dialog modal-lg" style="margin-top: 0px;margin-bottom: 0px;">
		<div class="modal-content">

			<div class="modal-body">

	<div  id="section-to-print-bill" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

	<table width="100%">
	<tr>
<td width="250px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
</td>
</tr>
</table>


<b>	<?php echo $_SESSION['owner_name']; ?> </b>

<br /><?php echo $_SESSION['owner_address']; ?>


	<br />	<?php echo $_SESSION['owner_tel']; ?>

<br />

________________________________________________________

<table width="100%">
	<tr>
		<td width="33%"></td>
		<td width="33%"><b><?=$lang_bill?></b></td>
		<td width="33%"></td>
	</tr>
	<tr>
		<td width="33%"></td>
		<td width="33%"><b><?=$lang_table?>: {{table_name}}</b></td>
		<td width="33%"></td>
	</tr>
</table>

________________________________________________________

<table style="width: 100%;font-size: 30px;">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale">
			<td style="text-align: left;width:50%;">{{x.product_name}}</td>
			<td align="left" style="font-size: 25px;">{{x.product_sale_num}}  x {{x.product_price|number:2}}</td>
			<td align="right" style="font-size: 25px;">{{(x.product_price-x.product_price_discount)*x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align: left;">

			<?=$lang_all?>:
			</td>
			<td align="right">

 {{Sumsaleprice() | number:2}}
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="text-align: left;">
			<?=$lang_discount?>:
			</td>
			<td align="right">

<span ng-show="discount_percent=='0'">
		{{discount_last | number:2 }}
		</span>

		<span ng-show="discount_percent=='1'">
		{{Sumsaleprice()*(discount_last_percent/100) | number:2 }}
		</span>

			</td>
		</tr>
		</tbody>
</table>

<table width="100%">
<tbody>
		<tr>
			<td style="font-size: 35px;font-weight: bold;text-align: left;">
				<?=$lang_payment?>

				</td>


				<td ng-show="discount_percent=='0'" align="right"  style="font-size: 40px;font-weight: bold;text-align: right;">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
		</td>

		<td ng-show="discount_percent=='1'"  align="right"  style="font-size: 40px;font-weight: bold;text-align: right;">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
		</td>


		</tr>
	</tbody>
</table>


________________________________________________________
		<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>

<?=$lang_day?>: <?php echo date('d-m-Y',time())?>

<br />
________________________________________________________




</div>




			</div>
			<div class="modal-footer">
<button type="button" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>

			</div>
		</div>
	</div>
</div>

</div>







<div style="position: absolute; opacity: 0.0;">
<div class="modal fade" id="Openoneminiip">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
			<div  id="section-to-print-slip" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

		<table width="100%">
	<tr>
<td width="250px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
</td>
</tr>
</table>

		<b><span>	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />

<?php if($_SESSION['owner_tax_number']!=''){?>
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<br />
<?php } ?>
			________________________________________________________

			<br />

<span ng-if="cus_id != null">
<table width="100%">
	<tr>
		<td><?=$lang_cusname?></td>
		<td>{{cus_name}}</td>
	</tr>
	<tr>
		<td colspan="2"><?=$lang_address?>: {{cus_address_all}}</td>
	</tr>
	<tr>
		<td>เงินในกระเป๋า</td>
		<td>{{cus_wallet | number}}</td>
	</tr>
	<tr>
		<td>คะแนนสะสม</td>
		<td>{{cus_score | number}}</td>
	</tr>
</table>

				________________________________________________________
</span>

				<table width="100%">
					<tr>
						<td width="30%"></td>
						<td width="60%"><b><?=$lang_receipt?></b></td>
						<td width="30%"></td>
					</tr>
					<tr>
						<td width="30%"></td>
						<td width="60%"><?=$lang_table?>: {{table_name}}</td>
						<td width="30%"></td>
					</tr>
				</table>

ชำระโดย:
								<span ng-if="pay_type_slip=='1'">เงินสด</span>
								<span ng-if="pay_type_slip=='2'"><?=$lang_transfer?></span>
								<span ng-if="pay_type_slip=='3'"><?=$lang_creditcard?></span>
								<span ng-if="pay_type_slip=='4'"><?=$lang_owe?></span>
								<span ng-if="pay_type_slip=='5'"><?=$lang_qrpayment?></span>
								<span ng-if="pay_type_slip=='6'">กระเป๋าเงิน Wallet</span>

								<br />
		________________________________________________________

<table style="width: 100%;font-size: 30px;">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">

			<td style="text-align: left;width:50%;"> {{x.product_name}}</td>
			<td align="left" style="font-size: 25px;">{{x.product_sale_num}} x {{x.product_price|number:2}}</td>
			<td align="right" style="font-size: 25px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td colspan="2"  style="text-align: left;"><?=$lang_summary?>:</td>


			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>




<?php
if($_SESSION['owner_vat_status']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>

<!-- <tr ng-if="vat3 > '0'">
<td><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(vat3/100) | number:2}}</td>
		</tr>


		<tr  ng-if="vat3 > '0'">
		<td><?=$lang_pricesumvat?></td>
		<td align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->

		<tr>

		<td colspan="2" style="text-align: left;"><?=$lang_discount?>:</td>
		<td align="right">{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td colspan="2" style="text-align: left;"><?=$lang_sumall?>:</td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


		<tr>

		<td colspan="2" style="text-align: left;"><?=$lang_getmoney?>:</td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>

		<td colspan="2" style="text-align: left;"><?=$lang_moneychange?>:</td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td>
	</tr>


	<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
<td colspan="2" align="right"><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td colspan="2" align="right"><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>


</tbody>
</table>
<!-- __________________________________________
<table width="100%">
	<tbody>
		<tr ng-repeat="c in lastbillcat">
			<td style="text-align: left;">{{c.catname}}</td>
			<td>{{c.num}}</td>
			<td>{{c.pricevalue}}</td>
		</tr>

	</tbody>
</table> -->
________________________________________________________
<table width="100%">
	<tbody>

		<tr style="font-size: 40px;">

		<td style="text-align: left;"><?=$lang_sumall?>:</td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>
	</tbody>
</table>
________________________________________________________
<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>
Order: {{sale_runno}}
<br />
<?=$lang_day?>: {{adddate}}
<br />
<span style="text-align:left;"><?=$_SESSION['footer_slip']?></span>
<br />
________________________________________________________
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>
</div>










<div class="modal fade" id="Openbillclosedayx">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-body">
<form class="form-inline">
<div class="form-group">
<input type="text" id="daynow" name="daynow" ng-model="daynow" class="form-control" placeholder="<?=$lang_day?>" ng-change="Openbillcloseday()" style="text-align: center;font-size: 18px;font-weight: bold;width: 100%;">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div> -->



</form>
		<div  id="section-to-print-billclosex">
<center>
		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
___________________________
<br />
<?=$lang_billclostday?>
<br/>
<?=$lang_day?>: {{daynow}}

<br />.....................................................
</center>

<table class="" style="width: 100%;"  ng-repeat="x in openbillclosedaylista">

	<tbody>
		<tr style="font-weight:bold;">
			<td><i>{{x.product_category_name2}}</i></td>
			<td>
				{{x.product_sale_num2}}
			</td>
			<td align="right">{{x.product_price2 | number:2}}</td>
		</tr>
		<tr ng-repeat="y in openbillclosedaylist_product" ng-if="y.product_category_id2==x.product_category_id2">
<td> <li>- {{y.product_name2}} </li></td>
<td>{{y.product_sale_num2}}</td>
<td align="right">{{y.product_price2 | number:2}}</td>
		</tr>

</tbody>
</table>




<center>.....................................................</center>
 <table class="" style="width: 100%;">

	<tbody>

        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_discount?></td>
			<td align="right">{{x.discount_last2 | number:2}}</td>

		</tr>
	</tbody>
</table>

<center>.....................................................</center>
<table class="" style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td>
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
		</td>

			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
     </tbody>
</table>
<center>.....................................................</center>
    <table class="" style="width: 100%;">
	<tbody>
        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_all?></td>
			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
	</tbody>
</table>

<center>
___________________________
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />

<?=$lang_day?><?=$lang_print?>: {{adddate}}

<br />
___________________________
</center>


</div>

			</div>
			<div class="modal-footer">
	<button ng-if="printer_ul =='0'" type="button" class="btn btn-primary" ng-click="printbillclose()"><?=$lang_print?></button>

	<button ng-if="printer_ul !='0'" type="button" class="btn btn-primary" ng-click="printbillcloseip()"><?=$lang_print?></button>


	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>
	</div>
</div>


















<div class="modal fade" id="printing">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body">
				<center><h1 style="color: orange;font-weight: bold;">กำลังปริ้น...</h1></center>
			</div>

		</div>
	</div>
</div>



<div class="modal fade" id="printingorder">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body">
<center><h1 style="color: blue;font-weight: bold;">กำลังปริ้น...Order</h1></center>


</div>


		</div>
	</div>
</div>








<div class="modal fade" id="Checkadminpass">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


<center>
	ยืนยันการลบ {{datafordelete.product_name}} <br />กรุณากรอก รหัสผ่าน Admin ร้าน
	<br />
	<input type="password" ng-model="adminpass" class="form-control">
	<br />
	<button type="button" class="btn btn-success btn-lg" ng-click="Deletepush(datafordelete)">ยืนยัน</button>
	<span ng-if="addminpasswrong=='1'" style="color: red;">
		<br />
รหัสผ่าน Admin ร้าน ผิด กรุณากรอกใหม่
	</span>
</center>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





















	</div>




			<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.listsale = [];
$scope.money_from_customer = '';
$scope.customer_id = '0';
$scope.product_code = '';
$scope.listone = [];


$scope.addvat = false;
$scope.vatnumber = 0;

$scope.sale_type = '1';
$scope.pay_type = '1';
$scope.discount_last = 0;
$scope.reserv = '0';

$scope.discount_percent = '0';
$scope.discount_last_percent = 0;

$scope.product_category_id = '0';

$scope.table_name = '';
$scope.table_id = '';


$scope.productaddqty = '1';

$("#daynow").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.daynow = '<?php echo date('d-m-Y',time());?>';


$("#daynow2").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.daynow2 = '<?php echo date('d-m-Y',time());?>';




$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};

$scope.MathceilFunc = function(data){
return Math.ceil(data);
};




<?php
if($_SESSION['owner_vat_status']=='0' || $_SESSION['owner_vat_status']=='1'){
?>

	$scope.vatnumber = 0;

<?php
}else if($_SESSION['owner_vat_status']=='2'){
?>

     $scope.vatnumber = <?=$_SESSION['owner_vat']?>;

<?php
}
?>










$scope.Getdiscountfrombuy = function(){

$http.get('<?php echo $base_url;?>/salesetting/setting_etc/getdiscountfrombuy')
       .then(function(response){
          $scope.discountfrombuylist = response.data[0];
console.log($scope.discountfrombuylist.money_if);
console.log($scope.discountfrombuylist.money_will_discount);
        });
};
$scope.Getdiscountfrombuy();


$scope.Getservicechargevat = function(){

$http.get('<?php echo $base_url;?>/salesetting/setting_etc/getservicecharge')
       .then(function(response){
          $scope.servicechargelist = response.data[0];
        });


				$http.get('<?php echo $base_url;?>/salesetting/setting_etc/getvat')
				       .then(function(response){
				          $scope.vatlist = response.data[0];
				        });


};
$scope.Getservicechargevat();









$scope.Addproductrank = function(){
$('#Addproductrankmodal').modal('show');
$scope.getproductlist();
};

$scope.Searchproductranklist = function(s){

	if(s==''){

$scope.productranklist = [];

}else{
   	$http.post("Salepic/Searchproductlist",{
	searchproduct: s
	}).success(function(data){
          $scope.productranklist = data;

        });

}

};

$scope.Addproductranksave = function(x){

console.log($scope.productlist);
if($scope.productlist.length !=  '0'){
rank = $scope.productlist.length - 1;
product_rank = $scope.productlist[rank].product_rank + 1;
}else{
product_rank = '1';
}

	$http.post("Salepic/Addproductranksave",{
	product_rank: product_rank,
	product_id: x.product_id
	}).success(function(data){
  toastr.success('<?=$lang_success?>');
  $scope.getproductlist();
        });

};




$scope.Delproductrank = function(){
$('#Delproductrankmodal').modal('show');
$scope.getproductlist();
};


$scope.Delproductranksave = function(x){

	$http.post("Salepic/Delproductranksave",{
	product_id: x.product_id
	}).success(function(data){
  toastr.success('<?=$lang_success?>');
  $scope.getproductlist();
        });

};


$scope.Getdatatable = function(){
$http.get('<?php echo $base_url;?>/food/Food_order/get_table')
       .then(function(response){
          $scope.tablelist = response.data.list;

        });

};







$scope.Opentablecus2mer = function(){
$('#Opentablecus2mer').modal({backdrop: "static", keyboard: false});
$scope.Getdatatable();

};








$scope.Selecttable = function(x){
$('#Opentable').modal('hide');
$('#Opentablecus2mer').modal('hide');

$scope.table_name = x.food_table_name;
$scope.table_id = x.food_table_id;
$scope.opentablemodal = '0';

$http.post("Salepic/Getproductlisttable",{
	table_id: x.table_id
	}).success(function(data){

     $scope.listsale = data;
     $scope.Checkcountorder();
//alert(data);


        });

};



$scope.Selecttablerload = function(){

$http.post("Salepic/Getproductlisttable",{
	table_id: $scope.table_id
	}).success(function(data){

     $scope.listsale = data;
     $scope.Checkcountorder();
//alert(data);
        });

};


$scope.Getdatenowtotime = function (x) {

    var sec_num = parseInt(x, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+' ชม. '+minutes+' นาที '+seconds+' วินาที';
}



$scope.Getdatenow = function() {
	$scope.datenow = Math.round(+new Date()/1000);
};

$scope.opentablemodal = '1';
$scope.Getdatatable();
$scope.Getdatenow();

$scope.Closeopentablemodal = function() {
	$scope.opentablemodal='0';
	$('#Opentable').modal('hide');
}





$scope.Opentable = function(){
$('#Opentable').modal({backdrop: "static", keyboard: false});
$scope.Getdatatable();

$scope.Getdatenow();
$scope.Reloadtablelist();

$scope.opentablemodal = '1';
};





$scope.Showproduct_pointmodal = function() {
	$('#Showproduct_pointmodal').modal('show');
	$http.get('<?php echo $base_url;?>/salesetting/Product_point/get')
	       .then(function(response){
	          $scope.product_point_list = response.data.list;

	        });

}





$scope.Reloadtablelist = function() {
	$http.get('<?php echo $base_url;?>/food/Food_order/get_table_reload')
	       .then(function(response){
	          $scope.tablelist = $scope.tablelist;

	        });
}









<?php if(isset($_SESSION['shift_id'])){?>
setInterval(function () {
	if($scope.opentablemodal!='1'){
$scope.Selecttablerload();
}

<?php if($_SESSION['user_type']<'10'){?>
if($scope.opentablemodal=='1'){
$scope.Getdatatable();

}
<?php } ?>


}, 300000);



setInterval(function () {

<?php if($_SESSION['user_type']<'10'){?>
if($scope.opentablemodal=='1'){
$scope.Getdatenow();
$scope.Reloadtablelist();
}
<?php } ?>



}, 100000);
<?php } ?>



$scope.Opentablemove = function(){
$('#Opentablemove').modal('show');
$http.get('<?php echo $base_url;?>/food/Food_order/get_table')
       .then(function(response){
          $scope.tablelist = response.data.list;

        });
};

$scope.Selecttablemove = function(x){

$http.post("Salepic/Moveproductlisttable",{
	old_table_id: $scope.table_id,
	new_table_id: x.food_table_id
	}).success(function(data){

     $scope.listsale = data;
     $scope.Checkcountorder();

        });


$('#Opentablemove').modal('hide');
$scope.table_name = x.food_table_name;
$scope.table_id = x.food_table_id;


};


$scope.Settablestatusone = function() {
	$http.post("Salepic/Settablestatusone",{
		food_table_id: $scope.table_id
	}).success(function(data){
				});
}



$scope.Checkbill = function(){
$('#Opencheckbill').modal('show');
$scope.Settablestatusone();
setTimeout(function(){
$scope.printDiv2();
 }, 1000);


 setTimeout(function(){
 $('#Opencheckbill').modal('hide');
}, 1000);


};





$scope.Checkbillip = function(){
$('#Opencheckbillip').modal('show');

$scope.Settablestatusone();


setTimeout(function(){
$scope.printDiv2ip('bill');
 }, 1000);

};



$scope.printbillcloseip = function(){
$('#Openbillclosedayip').modal('show');
setTimeout(function(){
$scope.printDiv2ip('billclose');
 }, 1000);

};



$scope.Openbillcloseday = function(){
$('#Openbillcloseday').modal('show');



$http.post("Salepic/Openbillclosedaylist_product",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylist_product = data;

			});



	$http.post("Salepic/Openbillclosedaylista",{
	daynow: $scope.daynow,
	}).success(function(data){

     $scope.openbillclosedaylista = data;

        });

	$http.post("Salepic/Openbillclosedaylistb",{
	daynow: $scope.daynow,
	}).success(function(data){

     $scope.openbillclosedaylistb = data;

        });


	$http.post("Salepic/Openbillclosedaylistc",{
	daynow: $scope.daynow,
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });



				$http.post("Salepic/Shiftclose_addwallet",{
				daynow: $scope.daynow2,
				}).success(function(data){

					 $scope.shiftclose_addwallet = data;

							});




};




$scope.Openbillclosedayip = function(){
$('#Openbillclosedayip').modal('show');


$http.post("Salepic/Openbillclosedaylist_product",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylist_product = data;

			});



	$http.post("Salepic/Openbillclosedaylista",{
	daynow: $scope.daynow2,
	}).success(function(data){

     $scope.openbillclosedaylista = data;

        });

	$http.post("Salepic/Openbillclosedaylistb",{
	daynow: $scope.daynow2,
	}).success(function(data){

     $scope.openbillclosedaylistb = data;

        });


	$http.post("Salepic/Openbillclosedaylistc",{
	daynow: $scope.daynow2,
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });



				$http.post("Salepic/Shiftclose_addwallet",{
				daynow: $scope.daynow2,
				}).success(function(data){

					 $scope.shiftclose_addwallet = data;

							});






								setTimeout(function(){
								$scope.printDiv2ip('billclose');
								 }, 1000);



};










$scope.getcategory = function(){

$http.get('<?php echo $base_url;?>/warehouse/Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.getcategory();




$scope.Searchcustomer = function(){
$http.post("Salepage/Customer",{
	cus_name: $scope.customer_name
	}).success(function(data){
$scope.customerlist = data;

        });
};








$scope.clickokafterpay = function(){
$('#Openchangemoney').modal('hide');
$('#Openonemini').modal('hide');
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();

	$.ajax({
    type: 'POST',
    dataType: 'json',
    data: 1,
    url: '127.0.0.1:8088/open',
    error: function() {
        //alert('Could not open cash drawer');
    },
    success: function() {
        //do something else
    }
});
};





$scope.getcashierprinterip = function(){

$http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;
					$scope.printer_order_type = response.data[0].printer_order_type;

        });
   };
$scope.getcashierprinterip();





$scope.printDiv2ip = function(x){
	window.scrollTo(0, 0);
	//window.print();
//$('#Openbillcloseday').modal('show');

toastr.info('กำลังปริ้น...');

if(x =='bill'){

	var element = $("#section-to-print-bill"); // global variable
}else if(x == 'slip'){

	var element = $("#section-to-print-slip");
	//$scope.Opencashdrawer();
}else if(x == 'billclose'){

	var element = $("#section-to-print-billclose");

}else if(x == 'order'){

	var element = $("#section-to-print-order");

}else if(x == 'addwallet'){

	var element = $("#section-to-print-addwallet");

}


console.log(element);

var getCanvas; // global variable
         html2canvas(element, {
width: 1000,
height: 10000,
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: 'http://localhost/c2mprinter/c2mpt/interface/lan.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip,
						 printer_ul: $scope.printer_ul,
						 printer_name: $scope.printer_name,
						 x:x
           },
      type: 'post',
      success: function (response) {
               console.log(response);
        $('#printing').modal('hide');
        $('#Opencheckbillip').modal('hide');
        //$('#Openbillclosedayip').modal('hide');
        $('#Openoneminiip').modal('hide');
				$('#printorderipmodal').modal('hide');
				$('#Addwalletmodalprint').modal('hide');

      }
    });
$('#Opencheckbillip').modal('hide');
//$('#Openbillclosedayip').modal('hide');
$('#Openoneminiip').modal('hide');
$('#Addwalletmodalprint').modal('hide');

             }
         });





};









$scope.Printorderip = function(){

$scope.clickprintorder = true;

$http.post("Salepic/Getproductlistorder",{
	table_id: $scope.table_id
	}).success(function(data){

toastr.info('กำลังส่งออเดอร์...');

	url_order = 'http://localhost/c2mprinter/c2mpt/interface/order.php';

$http.post(url_order,{
	data: data,
	base_url: '<?php echo $base_url;?>'
	}).success(function(data2){
      $scope.Deleteallorder()
     $scope.listorder = data;
		 $scope.clickprintorder = false;
        });




        });





$('#printingorder').modal('hide');



};






$scope.printDiv2 = function(){
	window.scrollTo(0, 0);
	window.print();

};

$scope.printDivfull = function(){
$('#Openone').modal('show');
$scope.Getone($scope.list[0]);
setTimeout(function(){
$scope.printDiv();
 }, 1000);
};



$scope.printDivmini = function(){


$('#Openonemini').modal('show');
$scope.Getonemini($scope.list[0]);
setTimeout(function(){
$scope.printDiv();
 }, 1000);


};



$scope.printDivminiip = function(){
$('#Openoneminiip').modal('show');
$scope.Getonemini($scope.list[0]);
setTimeout(function(){
$scope.printDiv2ip('slip');
 }, 1000);

};




$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Opencustomer = function(){
	$scope.customer_id = '0';
	$scope.customer_name = '';
	$scope.cus_address_all = '';
	$scope.customer_wallet = '0';
	$scope.customer_product_score_all = '0';
$('#Opencustomer').modal('show');
	$scope.Searchcustomer();
};


$scope.Addwalletmodal = function(x){

	$scope.addwallet_cus_id = x.cus_id;
	$scope.addwallet_cus_name = x.cus_name;
	$scope.addwallet_cus_add_time = x.cus_add_time;
	$scope.addwallet_wallet = x.wallet;


$('#Addwalletmodal').modal('show');

};




$scope.Addwalletconfirm = function(){
console.log(parseFloat($scope.addwallet_wallet)+parseFloat($scope.addwallet_money));
if(parseFloat($scope.addwallet_wallet)+parseFloat($scope.addwallet_money) < 0){
	toastr.warning('กรอกตัวเลขไม่ถูกต้อง...');
}else{
	$http.post("Salepic/Addwalletconfirm",{
	cus_id: $scope.addwallet_cus_id,
	wallet: $scope.addwallet_money
	}).success(function(data){
		toastr.success('เติมเงินสำเร็จ...');
		$('#Addwalletmodal').modal('hide');
		$('#Addwalletmodalprint').modal('show');
		$scope.Searchcustomer();

		setTimeout(function(){
		$scope.printDiv2ip('addwallet');
		 }, 1000);

	//	$scope.addwallet_money = null;

			});

	}



};





$scope.Selectcustomer = function(x){
$scope.customer_id = x.cus_id;
$scope.customer_name = x.cus_name;
$scope.customer_product_score_all = x.product_score_all;
$scope.customer_wallet = x.wallet;
$scope.cus_address_all = x.cus_address + ' ' +  ' <?=$lang_tel?>: ' + x.cus_tel;
$('#Opencustomer').modal('hide');
$('#customer_name').prop('disabled',true);
$('#cus_address_all').prop('disabled',true);

console.log($scope.customer_product_score_all);
};

$scope.Refresh = function(){
$scope.customer_id = '0';
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.customer_wallet = '0';
$scope.customer_product_score_all = false;
//$scope.listsale = [];
//$scope.money_from_customer = '';

//$('#customer_name').prop('disabled',false);
//$('#cus_address_all').prop('disabled',false);
//$('#savesale').prop('disabled',false);
//$('#savesale2').prop('disabled',false);
//$('#money_from_customer').prop('disabled',false);
//$('#money_from_customer2').prop('disabled',false);
//$scope.sale_type = '1';
//$scope.pay_type = '1';
//$scope.discount_last = 0;
//$scope.reserv = '0';

//$scope.discount_percent = '0';
//$scope.discount_last_percent = 0;

//$scope.table_name = '';
//$scope.table_id = '';
//$('#Opentable').modal({backdrop: "static", keyboard: false});

// $http.post("Salepic/Delallproductlisttable",{
// 	table_id: $scope.table_id
// 	}).success(function(data){
//
//      $scope.listsale = data;
//
//         });


};

$scope.getproductlist = function(){

$http.get('Salepage/Getproductlist')
       .then(function(response){
          $scope.productlist = response.data;

        });
   };
$scope.getproductlist();


$scope.Selectcat = function(id){
   if(id=='0'){
   	$scope.getproductlist();
   }else{

   	$http.post("Salepic/Getproductlistcat",{
	product_category_id: id
	}).success(function(data){
          $scope.productlist = data;

        });

   }

   };


  $scope.searchproductlist = function(searchproduct){

   	$http.post("Salepic/Searchproductlist",{
	searchproduct: searchproduct
	}).success(function(data){
          $scope.productlist = data;

        });
   };





$scope.Addpushproduct = function(){
$scope.listsale.push({
	product_id: '0',
	product_name: '<?=$lang_selectproduct?>',
	product_price: '0',
	product_score: '0',
	product_sale_num: '1',
	product_price_discount: '0'
});
};


$scope.Openselectproductnum = function(x,index){
$scope.productaddqty = '1';
$scope.productcode = x.product_code;
$scope.product_name_num = x.product_name;
$scope.product_price = x.product_price;
$('#Openselectproductnum').modal('show');
$scope.note_order = '';

$scope.product_price_add = 0;
$scope.productdataindex = index;
$http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlist",{
product_id: x.product_id
}).success(function(data){

$scope.getproductpotlist = data;


});


$http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlistshowall",{
}).success(function(data){

$scope.getproductpotlistshowall = data;
});




};






$scope.Addpottoproduct = function(x){

$scope.product_price_add = parseFloat($scope.product_price_add)+parseFloat(x.product_ot_price);

if(x.product_ot_price == 0){
	x.product_ot_price = '';
}

//$scope.product_name_num = $scope.product_name_num + ' [' +x.product_ot_name+' '+x.product_ot_price+']';
$scope.product_name_num = $scope.product_name_num + ' [' +x.product_ot_name+ ']';

};












$scope.Addpushproductcode = function(product_code,x,servicecharge,vat){





	$('#Openselectproductnum').modal('hide');
$http.post("Salepage/Findproduct",{
	cus_id: $scope.customer_id,
	product_code: product_code
	}).success(function(data){

		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{

	if($scope.sale_type=='1'){
		product_price = data[0].product_price;
	}else if($scope.sale_type=='2'){
		product_price = data[0].product_wholesale_price;
	}



	if(x){
		$('#Showproduct_pointmodal').modal('hide');
		product_price = '0';
		$scope.customer_product_score_all = $scope.customer_product_score_all-x.point_use;



		$http.post("Salepic/Useproductpoint",{
			cus_id: $scope.customer_id,
			gift_id: x.gift_id,
			product_id: x.product_id,
			product_code: x.product_code,
			product_name: x.product_name,
			point_use: x.point_use
			}).success(function(data){


		        });






	}


	if(servicecharge=='servicecharge'){

		$scope.product_name_num = $scope.servicechargelist.product_name+' '+$scope.servicechargelist.servicecharge_percent+'%';
		$scope.product_price_add = Math.round($scope.Sumsaleprice()*($scope.servicechargelist.servicecharge_percent/100));

	}


	if(vat=='vat'){

		$scope.product_name_num = $scope.vatlist.product_name+' '+$scope.vatlist.vat_percent+'%';
		$scope.product_price_add = Math.round($scope.Sumsaleprice()*($scope.vatlist.vat_percent/100));

	}




if($scope.product_name_num){
	$scope.product_name_num = $scope.product_name_num;
	$scope.product_price_add = $scope.product_price_add;
}else{
	$scope.product_name_num = x.product_name;
	$scope.product_price_add = '0';
}


/*if(data[0].product_stock_num < 1){
toastr.warning('<?=$lang_outofstock?>');
}else{*/

/*if(data[0].product_stock_num <= 10){
toastr.info(data[0].product_name + ' <?=$lang_balance?> '+ data[0].product_stock_num +' <?=$lang_piece?>');
}*/

$scope.listsale.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_name: $scope.product_name_num,
	product_score: data[0].product_score,
	product_price: parseFloat(product_price)+parseFloat($scope.product_price_add),
	product_sale_num: $scope.productaddqty,
	product_price_discount: data[0].product_price_discount
});

//}




$http.post("Salepic/Addproductlisttable",{
	table_id: $scope.table_id,
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_name: $scope.product_name_num,
	product_score: data[0].product_score,
	product_price: parseFloat(product_price)+parseFloat($scope.product_price_add),
	product_sale_num: $scope.productaddqty,
	product_price_discount: data[0].product_price_discount,
	note_order: $scope.note_order
	}).success(function(data){
	$scope.listsale = [];
     $scope.listsale = data;
$scope.Checkcountorder();
//alert(data);

        });










$scope.cannotfindproduct = false;

}
$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });





};





$scope.checkadminpassedit = '';
$scope.Editpush = function(x){

$scope.dataforedit = x;

$('#Editpushmodal').modal({show:true});

$scope.s_ID_edit = x.s_ID;
$scope.product_name_edit = x.product_name;
$scope.product_id_edit = x.product_id;
$scope.product_price_edit = x.product_price;
$scope.product_sale_num_edit = x.product_sale_num;
$scope.product_code_edit = x.product_code;
$scope.product_price_discount_edit = x.product_price_discount;
$scope.product_score_edit = x.product_score;



if($scope.adminpass==''){

$scope.checkadminpassedit = '1';

}else{

//$scope.listsale.splice(index, 1);

$http.post("Salepic/Checkadminpass",{
	adminpass: $scope.adminpass
	}).success(function(data){

console.log(data);

if(data>'0'){

$scope.adminpass = '';
$scope.addminpasswrongedit = '';
$scope.checkadminpassedit = '';

}else{

$scope.addminpasswrongedit = '1';
$scope.adminpass = '';

}



	 });



}







};













$scope.Editpushadmin = function(x){
$('#Editpushmodal').modal({show:true});
$scope.s_ID_edit = x.s_ID;
$scope.product_name_edit = x.product_name;
$scope.product_id_edit = x.product_id;
$scope.product_price_edit = x.product_price;
$scope.product_sale_num_edit = x.product_sale_num;
$scope.product_code_edit = x.product_code;
$scope.product_price_discount_edit = x.product_price_discount;
$scope.product_score_edit = x.product_score;
$scope.product_note_order_edit = x.note_order;


};











$scope.Editpushsave = function(){
$('#Editpushmodal').modal('hide');


$http.post("Salepic/Editpushsavetable",{
	s_ID: $scope.s_ID_edit,
	table_id: $scope.table_id,
	product_id: $scope.product_id_edit,
	product_name: $scope.product_name_edit,
	product_price: $scope.product_price_edit,
	product_sale_num: $scope.product_sale_num_edit,
	product_code: $scope.product_code_edit,
	product_price_discount: $scope.product_price_discount_edit,
	product_score: $scope.product_score_edit,
	note_order: $scope.product_note_order_edit
	}).success(function(data){

     $scope.listsale = data;

        });
};



$scope.adminpass='';

$scope.Deletepush = function(x){

$scope.datafordelete = x;

if($scope.adminpass==''){

$('#Checkadminpass').modal('show');

}else{

//$scope.listsale.splice(index, 1);

$http.post("Salepic/Checkadminpass",{
	adminpass: $scope.adminpass
	}).success(function(data){

console.log(data);

if(data>'0'){

$http.post("Salepic/Delproductlisttable",{
	table_id: $scope.table_id,
	table_name: $scope.table_name,
	s_ID: x.s_ID,
	product_id: x.product_id,
	product_name: x.product_name
	}).success(function(data){

     $scope.listsale = data;
   $scope.Checkcountorder();
//alert(data);
$('#Checkadminpass').modal('hide');
$scope.adminpass='';
$scope.addminpasswrong = '';
        });

}else{

$scope.addminpasswrong = '1';
$scope.adminpass = '';

}



	 });



}




};








$scope.Deletepushadmin = function(x){

$http.post("Salepic/Delproductlisttable",{
	table_id: $scope.table_id,
	table_name: $scope.table_name,
	s_ID: x.s_ID,
	product_id: x.product_id,
	product_name: x.product_name
	}).success(function(data){
		$scope.listsale = [];
     $scope.listsale = data;
   $scope.Checkcountorder();

        });


};







$scope.Checkcountorder = function(){
$http.post("Salepic/Checkproductlisttable",{
	table_id: $scope.table_id
	}).success(function(data){

     $scope.checkorder = data[0].check_order;

//alert(data);

        });

};













$scope.Deleteallorder = function(key){
if(key=='savesale'){
	savesale = '1';
}else{
	savesale = '0';
}

$http.post("Salepic/Printproductlisttable",{
	table_id: $scope.table_id,
	savesale: savesale
	}).success(function(data){

     $scope.listsale = data;
  $scope.Checkcountorder();
//alert(data);

        });

};



$scope.Printorder = function(){

$scope.clickprintorder = true;

$http.post("Salepic/Getproductlistorder",{
	table_id: $scope.table_id
	}).success(function(data){

 $scope.Deleteallorder();
     $scope.listorder = data;
$('#printorder').modal('show');
$scope.clickprintorder = false;
/*setTimeout(function(){
$scope.printDiv2();
 }, 1000);*/

        });




				$http.post("Salepic/Getproductlistorder_cat",{
					table_id: $scope.table_id
					}).success(function(data){
				     $scope.listorder_cat = data;

				        });

				$scope.product_category_id_order = '';
				$scope.product_category_name_order = '';

				};











				$scope.Printorderipmodal = function(){

					$scope.clickprintorder = true;


				$http.post("Salepic/Getproductlistorder",{
					table_id: $scope.table_id
					}).success(function(data){

				 $scope.Deleteallorder();
				     $scope.listorder = data;
				$('#printorderipmodal').modal('show');

				setTimeout(function(){
				$scope.printDiv2ip('order');
				 }, 1000);

$scope.clickprintorder = false;

				        });





$http.post("Salepic/Getproductlistorder_cat",{
	table_id: $scope.table_id
	}).success(function(data){
     $scope.listorder_cat = data;

        });

$scope.product_category_id_order = '';
$scope.product_category_name_order = '';

};



$scope.Showordercat_print = function(x){
$scope.product_category_id_order = x.product_category_id;
$scope.product_category_name_order = x.product_category_name;
};






$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};

$scope.Selectproduct = function(y,index){
$scope.listsale[index].product_id = y.product_id;
$scope.listsale[index].product_code = y.product_code;
$scope.listsale[index].product_name = y.product_name;
$scope.listsale[index].product_price = y.product_price;
$scope.listsale[index].product_price_discount = y.product_price_discount;
$('#Modalproduct').modal('hide');

};



 $scope.Sumsalenum = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};


 $scope.Sumsalediscount = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_price_discount);
 });
    return total;
};


$scope.Sumproduct_score = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_score * item.product_sale_num);
 });
    return total;
};


 $scope.Sumsaleprice = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);

 });

  return total;

};









$scope.Sumsalepricevat = function(){
var total = 0;
 angular.forEach($scope.listsale,function(item){
total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);
 });
total2 = total+(total*($scope.vatnumber/100));

    return total2;
};


$scope.Mathceil = function(x){
return Math.ceil(x);

};

$scope.Mathceildown = function(x){
return Math.floor(x);

};

$scope.Savesale = function(wallet,sumsalepricevat,discount_last){

if(wallet=='wallet'){
	if($scope.customer_wallet >= ($scope.Sumsalepricevat() - $scope.discount_last)){
	$scope.money_from_customer=$scope.Sumsalepricevat() - $scope.discount_last;
	$scope.pay_type = '6';
}else{
	toastr.warning('กรุณาเติมเงินในกระเป๋าก่อนชำระเงิน...');
}


}

	if($scope.discount_last_percent!=0){
$scope.discount_last = 	($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber/100))*($scope.discount_last_percent/100);

}

	if($scope.listsale == '' || $scope.listsale[0].product_id=='0' ){
		toastr.warning('<?=$lang_addproductlistplz?>');
	}else if($scope.money_from_customer ==''){
toastr.warning('<?=$lang_getmoneyplz?>');
	}else if($scope.money_from_customer < $scope.Sumsalepricevat()-$scope.discount_last ){
toastr.warning('<?=$lang_getmoneymoreplz?>');
}else if(isNaN($scope.money_from_customer) == true ){
toastr.warning('<?=$lang_getmoneynumberplz?>');
}else if($scope.money_from_customer-$scope.Sumsalepricevat() >= 1000  ){
toastr.warning('<?=$lang_moneychangenotmore1000?>');
}else{

		if($scope.discount_last_percent!=0){
$scope.discount_last = 	($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber/100))*($scope.discount_last_percent/100);
}

$('#Opengetmoneymodal').modal('hide');
$('#Opengetmoneyfromwalletmodal').modal('hide');

toastr.info('กำลังบันทึกการขาย...');

$('#savesale').prop('disabled',true);
$('#savesale2').prop('disabled',true);
$('#money_from_customer').prop('disabled',true);
$('#money_from_customer2').prop('disabled',true);
$http.post("Salepage/Savesale",{
	listsale: $scope.listsale,
	table_id: $scope.table_id,
	table_name: $scope.table_name,
	cus_name: $scope.customer_name,
	cus_id: $scope.customer_id,
	cus_address_all: $scope.cus_address_all,
	sumsale_discount: $scope.Sumsalediscount(),
	sumsale_num: $scope.Sumsalenum(),
	vat: $scope.vatnumber,
	product_score_all: $scope.Sumproduct_score(),
	sumsale_price: $scope.Sumsaleprice(),
	money_from_customer: $scope.money_from_customer,
	money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope.discount_last) ,
	sale_type: $scope.sale_type,
	pay_type: $scope.pay_type,
	reserv: $scope.reserv,
	discount_last: $scope.discount_last,
	shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
	}).success(function(data){

toastr.success('บันทึกการขายสำเร็จ...');

$scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope.discount_last);

$('#Openchangemoney').modal({backdrop: "static", keyboard: false});
$('#savesale').prop('disabled',false);
$('#savesale2').prop('disabled',false);
$('#money_from_customer').prop('disabled',false);
$('#money_from_customer2').prop('disabled',false);

$scope.Refresh();
$scope.getlist();
$scope.Deleteallorder('savesale');
$scope.Checkcountorder();
$scope.pay_type = '1';
$scope.discount_last = 0;
$scope.listsale = [];
        });
}

};





$scope.Opengetmoneymodal = function(){
$('#Opengetmoneymodal').modal('show');
$scope.money_from_customer = '';

};


$scope.Opengetmoneyfromwalletmodal = function(){

	if($scope.customer_wallet >= ($scope.Sumsalepricevat() - $scope.discount_last)){
	$('#Opengetmoneyfromwalletmodal').modal('show');
}else{
	toastr.warning('กรุณาเติมเงินในกระเป๋าก่อนชำระเงิน...');
}


};








$scope.Addnumbermoney = function(x){

if($scope.money_from_customer=='' && x==0){
	$scope.money_from_customer = '';
}else if(x < 10){
	$scope.money_from_customer = $scope.money_from_customer+x;
}else if(x > 10){

	$scope.money_from_customer = x;
}else if(x == 'x'){
	$scope.money_from_customer = '';
}else{

}


};





$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Salepage/gettoday",{
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
$scope.list = data.list;
$scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');



$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.table_name_getone = x.table_name;
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });




};


$scope.Getonemini = function(x){
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_id = x.cus_id;
$scope.cus_name = x.cus_name;
$scope.cus_score = x.cus_score;
$scope.cus_wallet = x.wallet;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.pay_type_slip = x.pay_type;
        });


$http.post("Salelist/Getonecat",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.lastbillcat = response;
//console.log(response);
        });

};


$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);
$http.post("Salelist/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno,
	product_score_all: x.product_score_all,
	cus_id: x.cus_id
}).success(function(response){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });

};


$('.lodingbefor').css('display','block');








$scope.shiftnow = '0';
$scope.confirmcloseshiftnowok = '0';
$scope.cshiftnow = '0';

<?php if(isset($_SESSION['shift_id'])) {?>
	$scope.shiftnow = '1';
	$scope.cshiftnow = '0';
	<?php } ?>

$scope.Openshiftnow = function(){

	if(isNaN($scope.shift_money_start) == true ){
		toastr.warning('กรุณากรอกตัวเลข');
	}else{

$http.post("Salepic/Openshiftnow",{
shift_money_start:$scope.shift_money_start
}).success(function(response){

window.location.href = '<?php echo $base_url;?>/sale/salepic';
        });

			}


};


$scope.Confirmcloseshiftnow = function(){
$('#Opentable').modal({backdrop: "static", keyboard: false});
$scope.shiftnow = '0';
$scope.cshiftnow = '1';
$scope.table_id = '';
$scope.confirmcloseshiftnowok = '0';


if(isNaN($scope.shift_money_end) == true ){
	toastr.warning('กรุณากรอกตัวเลข');
}else{
$http.post("Salepic/Confirmcloseshiftnow",{
shift_money_end:$scope.shift_money_end
}).success(function(response){

window.location.href = '<?php echo $base_url;?>/sale/salepic';
        });
}




};


$scope.Closeshiftnow = function(){
$('#Opentable').modal({backdrop: "static", keyboard: false});
$scope.confirmcloseshiftnowok = '1';
};

$scope.Canclecloseshiftnow = function(){
$scope.shiftnow = '1';
$scope.confirmcloseshiftnowok = '0';
$scope.cshiftnow = '0';
};








$scope.Discount_lastfunc = function(){
var total3 = 0;

angular.forEach($scope.listsale,function(item){
total3 += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);

});

if($scope.discountfrombuylist && $scope.discountfrombuylist.money_will_discount!='0'){
$scope.discount_last = Math.ceil(parseFloat(total3 * parseFloat($scope.discountfrombuylist.money_will_discount)) / parseFloat($scope.discountfrombuylist.money_if));
}

};




<?php if($_SESSION['user_type']=='10'){?>
if($scope.table_name==''){
   	$scope.Opentablecus2mer();
   }
	<?php } ?>


	<?php if($_SESSION['user_type']!='10'){?>
	if($scope.table_name==''){
	   	$scope.Opentable();
	   }
		<?php } ?>







});






</script>
