<?php
if($_SESSION['printer_type']=='1'){
	$pt_width = '400px';
}else{
	$pt_width = '570px';
}
?>

<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index" style="font-size:30px;">

<center style="font-weight:bold;background-color:#fff;">
  จอ Chef ครัว: {{kitchen_name}}
</center>
<p></p>

<ul class="nav nav-tabs">
  <li class="active" style="background-color:#fff;">
    <a data-toggle="tab" href="#new">
      ({{list_new.length}}) มาใหม่
    </a></li>
  <li>
    <a data-toggle="tab" href="#doing" style="background-color:orange;color:#fff;">
      ({{list_doing.length}}) กำลังทำ
    </a></li>
  <li>
    <a data-toggle="tab" href="#success" style="background-color:green;color:#fff;">
    ({{list_success.length}}) เสร็จแล้ว
  </a></li>
</ul>

<div class="tab-content">
  <div id="new" class="tab-pane fade in active">


    <div class="panel panel-default">
      <div class="panel-body">
    <b>มาใหม่</b>
    <div>
    <table class="table table-hover">
    <thead>
    <tr>
    <th>ชื่ออาหาร</th>
    <th>จำนวน</th>
    <th>Note</th>
    <th>เวลา</th>
    <th>โต๊ะ</th>
    <th>สถานะ</th>
    </tr>
    </thead>

    <tbody>
    <tr ng-repeat="x in list_new">
    <td>
    <button class="btn btn-lg btn-primary" ng-click="Changestatus('1',x)" style="font-size:30px;font-weight:bold;">
    เริ่มทำ
    </button>

    {{x.product_name}}</td>
    <td>{{x.product_sale_num}}</td>
    <td>{{x.note_order}}</td>
    <td>{{x.adddate}}</td>
    <td>{{x.food_table_name}}</td>
    <td>มาใหม่


    <button style="float:right;" class="btn btn-lg btn-danger" ng-click="Changestatus('3',x)" style="font-size:30px;font-weight:bold;">
    ยกเลิก
    </button>



    </td>
    </tr>
    </tbody>

    </table>
    </div>

    </div>
    </div>




  </div>





  <div id="doing" class="tab-pane fade">


    <div class="panel panel-default">
    	<div class="panel-body" style="background-color:orange;">

    <b>กำลังทำ</b>
    <div>
        <table class="table table-hover" style="background-color:#fff;">
        <thead>
          <tr>
        <th>ชื่ออาหาร</th>
        <th>จำนวน</th>
        <th>Note</th>
        <th>เวลา</th>
        <th>โต๊ะ</th>
        <th>สถานะ</th>
          </tr>
        </thead>

        <tbody>
          <tr ng-repeat="x in list_doing">
            <td><button ng-if="printer_ul =='0'" class="btn btn-lg btn-success" ng-click="Changestatususb('2',x)" style="font-size:30px;font-weight:bold;">
            เสร็จแล้ว
            </button>


            <button ng-if="printer_ul !='0'" class="btn btn-lg btn-success" ng-click="Changestatus('2',x)" style="font-size:30px;font-weight:bold;">
            เสร็จแล้ว
            </button>

             {{x.product_name}}</td>
            <td>{{x.product_sale_num}}</td>
            <td>{{x.note_order}}</td>
            <td>{{x.adddate}}</td>
            <td>{{x.food_table_name}}</td>
            <td>{{x.status}}
              <button style="float:right;" class="btn btn-lg btn-default" ng-click="Changestatus('0',x)" style="font-size:30px;font-weight:bold;">
              ย้อนกลับ
              </button>
            </td>
          </tr>
        </tbody>

        </table>
    </div>

      </div>
    	</div>

  </div>





  <div id="success" class="tab-pane fade">

      <div class="panel panel-default">
        <div class="panel-body" style="background-color:green;">
      <b>ทำเสร็จแล้ว</b>
      <div>
      <table class="table table-hover"  style="background-color:#fff;">
      <thead>
      <tr>
      <th>ชื่ออาหาร</th>
      <th>จำนวน</th>
      <th>Note</th>
      <th>เวลา</th>
      <th>โต๊ะ</th>
      <th>สถานะ</th>
      </tr>
      </thead>

      <tbody>
      <tr ng-repeat="x in list_success">
      <td>{{x.product_name}}</td>
      <td>{{x.product_sale_num}}</td>
      <td>{{x.note_order}}</td>
      <td>{{x.adddate}}</td>
      <td>{{x.food_table_name}}</td>
      <td>ทำเสร็จแล้ว</td>
      </tr>
      </tbody>

      </table>
    </div>


      </div>
      </div>

  </div>

</div>








  <!-- <audio controls autoplay ng-if="list_new.length > list_new_length">
  	<source src="<?php echo $base_url;?>/media/sound/tingtong.mp3" type="audio/mpeg"></source>
  	<source src="<?php echo $base_url;?>/media/sound/tingtong.ogg" type="audio/ogg"></source>
  	Your browser isn't invited for super fun audio time.
  </audio> -->







  <div class="modal fade" id="Openorderusb">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" id="section-to-print" style="width: 570px;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

  <b>{{dataprint.food_table_name}}</b>
  <br />
  <b>( {{dataprint.product_sale_num}} ) {{dataprint.product_name}}</b>
  <br />
  note: {{dataprint.note_order}}
  <br />
  {{dataprint.adddate}}

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary"  ng-click="printDiv()">พิมพ์</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>







  <div style="position: absolute; opacity: 0.0;">

  <div class="modal fade" id="Openorder">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title"></h4>
  			</div>
  			<div class="modal-body" id="section-to-print-order" style="width: 570px;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

<b>{{dataprint.food_table_name}}</b>
<br />
<b>( {{dataprint.product_sale_num}} ) {{dataprint.product_name}}</b>
<br />
note: {{dataprint.note_order}}
<br />
{{dataprint.adddate}}

  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

  			</div>
  		</div>
  	</div>
  </div>

  </div>














	</div>




<script src="<?php echo $base_url;?>/js/createjs-2015.11.26.min.js"></script>
<script>
    createjs.Sound.registerSound("./click.mp3", "x");
    setTimeout(function () {
        createjs.Sound.play("x");
    }, 1000)
</script>

	<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.list_new_length = '0';

  $scope.getcashierprinterip = function(){

  $http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
         .then(function(response){
  					$scope.printer_ul = response.data[0].printer_ul;

          });
     };
  $scope.getcashierprinterip();







  $scope.get_kitchen = function(){

  $http.get('Chef/get_kitchen<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>')
         .then(function(response){
            $scope.kitchen_name = response.data[0].kitchen_name;
            $scope.kitchen_printer_ip = response.data[0].printer_ip;

          });
     };
  $scope.get_kitchen();



$scope.get_new = function(){

$http.get('Chef/get_new<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>')
       .then(function(response){
          $scope.list_new = response.data;

        });
   };
$scope.get_new();





$scope.get_doing= function(){

$http.get('Chef/get_doing<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>')
       .then(function(response){
          $scope.list_doing = response.data;

        });
   };
$scope.get_doing();





$scope.get_success = function(){

$http.get('Chef/get_success<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>')
       .then(function(response){
          $scope.list_success = response.data;

        });
   };
$scope.get_success();


$scope.Soundmp3 = function(){
  createjs.Sound.registerSound("<?php echo $base_url;?>/media/sound/tingtong.mp3", "x");
  createjs.Sound.play("x");

}



setInterval(function(){



  $scope.get_doing();
  $scope.get_success();
  $scope.get_new();

  if($scope.list_new.length > $scope.list_new_length){

  $scope.Soundmp3();
  }

$scope.list_new_length = $scope.list_new.length;


},5000);




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





$scope.Changestatususb = function(status,x) {

$scope.dataprint = x;

  $http.post("Chef/changestatus<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>",{
  status: status,
  k_ID: x.k_ID,
	s_ID: x.s_ID,
	product_id: x.product_id,
	table_id: x.table_id
  }).success(function(data){
    $scope.get_doing();
    $scope.get_success();
$scope.get_new();

if(status=='2'){
$('#Openorderusb').modal('show');

setTimeout(function(){
$scope.printDiv();
 }, 1000);


}


  });
};





$scope.Changestatus = function(status,x) {

$scope.dataprint = x;

  $http.post("Chef/changestatus<?php if(isset($_GET['id'])){echo '?id='.$_GET['id'];}?>",{
  status: status,
  k_ID: x.k_ID,
	s_ID: x.s_ID,
	product_id: x.product_id,
	table_id: x.table_id
  }).success(function(data){
    $scope.get_doing();
    $scope.get_success();
$scope.get_new();

if(status=='2'){
$('#Openorder').modal('show');

setTimeout(function(){
$scope.printDiv2ip();
 }, 1000);
}


  });
};




















$scope.printDiv2ip = function(x){
	window.scrollTo(0, 0);
	//window.print();
//$('#Openbillcloseday').modal('show');

toastr.info('กำลังปริ้น...');

	var element = $("#section-to-print-order"); // global variable

console.log(element);

var getCanvas; // global variable
         html2canvas(element, {
width: 1000,
height: 5000,
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lanchef.php',
      data: {
             imgdata:newData,
             kitchen_printer_ip: $scope.kitchen_printer_ip
           },
      type: 'post',
      success: function (response) {
               console.log(response);
        $('#Openorder').modal('hide');


      }
    });
$('#Openorder').modal('hide');

             }
         });





};














});
	</script>
