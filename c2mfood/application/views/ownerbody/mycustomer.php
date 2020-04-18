<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

<div class="panel panel-default">
	<div class="panel-body">


<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_cusnamelist?> ({{allmycustomer | number:0}} <?=$lang_person?>) <a class="btn btn-primary"  style="float: right" ng-click="Openaddnewcus()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></a></font>

<hr />

<div style="float: right">

<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>


<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="searchtype">
<option value="0">รหัสบัตร</option>
	<option value="1"><?=$lang_cusname?></option>
	<option value="2"><?=$lang_tel?></option>
	<option value="3">อีเมล์</option>
	<option value="4"><?=$lang_birthday?></option>
</select>
</div>
<div class="form-group">
<input ng-show="searchtype != '4'" type="text" name="search" ng-model="searchtext" class="form-control" placeholder="<?=$lang_searchkeyword?>">
<input ng-show="searchtype == '4'" type="text" name="search" ng-model="searchtext" class="form-control"  placeholder="<?=$lang_daymonth?> 03-01">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchsubmit()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->
<div class="form-group">
<button type="submit" ng-click="Refreshsubmit(searchtype,searchtext,'1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>


<br />
<table class="table table-hover" id="headerTable">
	<thead>
		<tr style="background-color: #eee">

			<th width="5px" class="visible-sm visible-md visible-lg">
			<?=$lang_rank?></th>
			<th width="5px"><?=$lang_contact?></th>
			<th><?=$lang_name?></th>

			<th><?=$lang_tel?></th>
			<th class="visible-sm visible-md visible-lg">อีเมล์</th>
			<th class="visible-sm visible-md visible-lg"><?=$lang_birthday?></th>
			<th><?=$lang_membercard?></th>
			<th>เงินในกระเป๋า Wallet</th>
			<th><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in mycustomer">
			<td ng-if="selectpage=='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)+(perpage*(selectpage-1))}}</td>
<td> <button class="btn btn-success btn-xs" ng-click="Contactmodal(x)">
<?=$lang_cuscontactlist?></button> </td>


			<td><button class="btn btn-default btn-xs" ng-click="Detail(x)">{{x.cus_name}}</button></td>

			<td>{{x.cus_tel}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_email}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_birthday}}</td>


<td width="70px">

<a class="btn btn-default btn-xs" target="_blank" href="<?php echo $base_url;?>/card?code={{x.cus_add_time}}&cus_name={{x.cus_name}}"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> <?=$lang_membercard?> {{x.cus_add_time}}</a>


			</td>
<td align="right">{{x.wallet | number}} บาท</td>

			<td width="70px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecustomer" ng-click="Delete(x.cus_id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>

		</tr>

	</tbody>
</table>

<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getmycustomer(searchtype,searchtext,'',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="500">500</option>
	<option value="1000">1000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getmycustomer(searchtype,searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>



</form>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>





	</div>
</div>






<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addcus?></h4>
			</div>
			<div class="modal-body">


<div class="row">

	<div class="col-md-12">
		<input type="text" placeholder="รหัสสมาชิก" name=""  ng-model="cus_add_time" class="form-control" required>

	</div>


	<div class="col-md-12">
		<br />
	</div>


<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress">
</textarea>
</div>



<div class="col-md-12" >
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode">

</div>




<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>"  name="" class="form-control" ng-model="custel">
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime" name="datetime" class="form-control" ng-model="cusbirthday">

</div>

	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail" >
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>



	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark">
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="savenewcustomer" ng-click="SaveSubmit(cusname,cusaddress,custel,cusemail,cusremark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>






<div class="modal fade" id="modaldetail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_cusdetail?></h4>
			</div>
			<div class="modal-body">


<div class="row">

	<div class="col-md-12">
		<input type="text" placeholder="รหัสสมาชิก" name="" class="form-control" ng-model="cus_add_time"  disabled>

	</div>

	<div class="col-md-12">
		<br />
	</div>

<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname"  disabled>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress" disabled>
</textarea>
</div>



<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode" disabled>

</div>

<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>"  name="" class="form-control" ng-model="custel" disabled>
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime2" name="datetime2" class="form-control" ng-model="cusbirthday" disabled>

</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail" disabled>
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex" disabled>
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group" disabled>
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level" disabled>
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark" disabled>
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_cusedit?></h4>
			</div>
			<div class="modal-body">


<div class="row">
	<div class="col-md-12">
		<input type="text" placeholder="รหัสสมาชิก" name="" class="form-control" ng-model="cus_add_time" required>

	</div>

	<div class="col-md-12">
		<br />
	</div>

<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress">
</textarea>
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="รหัสไปรษณีย์" name="" class="form-control" ng-model="cusaddresspostcode">

</div>

<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>"  name="" class="form-control" ng-model="custel">
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime3" name="datetime3" class="form-control" ng-model="cusbirthday">

</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="อีเมล์" name="" class="form-control" ng-model="cusemail">
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark">
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="EditSubmit(cusid,cusname,cusaddress,custel,cusemail,cusremark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>


<div class="modal fade" id="modalecontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
<button class="btn btn-primary" ng-click="Newcontactmodal(cusid)"><span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
				<?=$lang_cuscontactlist?> / {{cusname}}</h4>

			</div>
			<div class="modal-body">

<div class="row">

<div class="col-md-12">
<div class="text-right"><input type="checkbox" ng-model="showdel">
<?=$lang_showdel?></div>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;font-size: 10px;">
			<th><?=$lang_detail?></th>
			<th><?=$lang_cuscontactchanel?></th>
			<th><?=$lang_cusgrade?></th>
			<th><?=$lang_cusproductservice?></th>
			<th><?=$lang_cusreasonbuy?></th>
			<th><?=$lang_cusreasonnotnuy?></th>
			<th><?=$lang_day?></th>
			<th><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="c in contactlistone">
			<td>{{c.contact_list_detail}}</td>
			<td>{{c.contact_from_name}}</td>
			<td>{{c.contact_grade_name}}</td>
			<td>{{c.product_service_name}}</td>
			<td>{{c.customer_reasonbuy_name}}</td>
			<td>{{c.customer_reasonnotbuy_name}}</td>
			<td>{{c.addtime}}</td>
			<td width="70px"><button class="btn btn-warning btn-xs" ng-click="Contactedit(c)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-xs" ng-show="showdel" ng-click="Contactdelete(c)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
		</tr>
	</tbody>
</table>
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>

			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaleaddcontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addnewcontact?> / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="<?=$lang_detailcontact?>"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value="">-<?=$lang_selectchanel?>-</option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value="">-<?=$lang_selectgrade?>-</option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value="">-<?=$lang_selectproductservice?>-</option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value="">-<?=$lang_selectreasonbuy?>-</option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value="">-<?=$lang_selectreasonnotbuy?>-</option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContact()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>















<div class="modal fade" id="modaleditcontact">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_editcontact?> / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="<?=$lang_detailcontact?>"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value=""><?=$lang_cuscontactchanel?></option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value=""><?=$lang_cusgrade?></option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value=""><?=$lang_cusproductserviceneed?></option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value=""><?=$lang_cusreasonbuy?></option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value=""><?=$lang_cusreasonnotnuy?></option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContactedit()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>














</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtype = '0';
$scope.searchtext = '';
$scope.selectthispage = '1';

$("#datetime").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime2").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime3").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.pagealladd = [];



$scope.Defaultdata = function(){

$http.get('Customergroup/get')
       .then(function(response){
          $scope.customergroup = response.data.list;

        });

$http.get('Customerlevel/get')
       .then(function(response){
          $scope.customerlevel = response.data.list;

        });

$http.get('Customersex/get')
       .then(function(response){
          $scope.customersex = response.data.list;

        });


};

$scope.perpage = '10';
$scope.getmycustomer = function(searchtype,searchtext,page,perpage){
   if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$http.post('Mycustomer/get',{
'searchtype': searchtype || '',
'searchtext': searchtext || '',
'page': page,
'perpage': perpage
})
       .success(function(data){
          $scope.mycustomer = data.list;
          $scope.pageall = data.pageall;
           $scope.allmycustomer = data.all;
$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });
$('.lodingbefor').css('display','block');

   };
$scope.getmycustomer();


$scope.Refreshsubmit = function(){
$scope.getmycustomer('','');
$scope.searchtype = '0';
$scope.searchtext = '';
$scope.perpage = '10';
};




$scope.Openaddnewcus = function(){
	$('#modal-id').modal({backdrop: "static", keyboard: false});
	$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';
$scope.cus_add_time = '';

$scope.Defaultdata();
$scope.districtlist = [];
$scope.amphurlist = [];

};






$scope.SaveSubmit = function(cusname,cusaddress,custel,cusemail,cusremark){

	if(cusname != ''){

$("#savenewcustomer").prop("disabled",true);
$http.post("Mycustomer/save",{
	'cus_add_time': $scope.cus_add_time,
	'cusname': cusname,
	'cusaddress': cusaddress,
	'custel': custel,
	'cusemail': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cusremark': cusremark
	}).success(function(data){

$("#savenewcustomer").prop("disabled",false);
toastr.success('<?=$lang_success?>');
$scope.cus_add_time = '';
$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';
$scope.districtlist = [];
$scope.amphurlist = [];

$('#modal-id').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};





$scope.Delete = function(cusid){


$http.post("Mycustomer/delete",{
	'cus_id': cusid
	}).success(function(data){

toastr.success('<?=$lang_success?>');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });


};


$scope.Detail = function(x){
$('#modaldetail').modal('show');

$scope.Defaultdata();


$scope.cusid = x.cus_id;
$scope.cus_add_time = x.cus_add_time;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;

};




$scope.Editrow = function(x){
$('#modaledit').modal('show');

$scope.Defaultdata();


$scope.cusid = x.cus_id;
$scope.cus_add_time = x.cus_add_time;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;

};



$scope.EditSubmit = function(cusid,cusname,cusaddress,custel,cusemail,cusremark){


$http.post("Mycustomer/update",{
	'cus_id': cusid,
	'cus_add_time': $scope.cus_add_time,
	'cus_name': cusname,
	'cus_address': cusaddress,
	'cus_tel': custel,
	'cus_email': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cus_remark': cusremark
	}).success(function(data){

toastr.success('<?=$lang_success?>');
$('#modaledit').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });


};




$scope.Getforcontact = function(){

$http.get('contactfrom/get')
       .then(function(response){
          $scope.contactfrom = response.data.list;

        });

$http.get('contactgrade/get')
       .then(function(response){
          $scope.contactgrade = response.data.list;

        });

$http.get('Productservice/get')
       .then(function(response){
          $scope.productservice = response.data.list;

        });


$http.get('Customerreasonbuy/get')
       .then(function(response){
          $scope.customerreasonbuy = response.data.list;

        });

$http.get('Customerreasonnotbuy/get')
       .then(function(response){
          $scope.customerreasonnotbuy = response.data.list;

        });
};


$scope.Contactlistonefunc = function(cus_id){
$http.post("Contactlist/getone",{
	'cus_id': cus_id
	}).success(function(data){
$scope.contactlistone = data.list;
        });
};

$scope.Contactmodal = function(x){
$('#modalecontact').modal('show');
$scope.cusname = x.cus_name;
$scope.cusid = x.cus_id;

$scope.Contactlistonefunc(x.cus_id);

};

$scope.Newcontactmodal = function(cusid){
$('#modaleaddcontact').modal({backdrop: "static", keyboard: false});

$scope.Getforcontact();
$scope.contact_list_id = '';
$scope.contact_list_detail = '';
$scope.contact_grade_id = '';
$scope.contact_from_id = '';
$scope.customer_reasonbuy_id = '';
$scope.customer_reasonnotbuy_id = '';
$scope.product_service_id = '';
$scope.cusid = cusid;

};

$scope.SaveContact = function(){
$http.post("Contactlist/add",{
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleaddcontact').modal('hide');


        });
};


$scope.Contactedit = function(c){
	$('#modaleditcontact').modal('show');
	$scope.Getforcontact();
	$scope.contact_list_id = c.contact_list_id;
$scope.contact_list_detail = c.contact_list_detail;
$scope.contact_grade_id = c.contact_grade_id;
$scope.contact_from_id = c.contact_from_id;
$scope.customer_reasonbuy_id = c.customer_reasonbuy_id;
$scope.customer_reasonnotbuy_id = c.customer_reasonnotbuy_id;
$scope.product_service_id = c.product_service_id;
$scope.cusid = c.cus_id;
};



$scope.SaveContactedit = function(){

$http.post("Contactlist/update",{
	'contact_list_id': $scope.contact_list_id,
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleditcontact').modal('hide');


        });
};


$scope.Contactdelete = function(c){

$http.post("Contactlist/delete",{
	'contact_list_id': c.contact_list_id,
	'cus_id': c.cus_id,
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc(c.cus_id);

        });
};




$scope.DownloadExcel = function(){

$http.post("Mycustomer/excel",{
	'excel': '1',
	'searchtype': $scope.searchtype || '',
	'searchtext': $scope.searchtext || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.Searchsubmit = function(){
$scope.getmycustomer($scope.searchtype,$scope.searchtext,'1',$scope.perpage);
};



});
	</script>
