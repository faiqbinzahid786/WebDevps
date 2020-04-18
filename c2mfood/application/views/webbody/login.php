

<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">


    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: green;border-style: dotted;border-width: 1px;">สมัครสมาชิกสำเร็จ!</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_cannotlogin?></p></div>
    	<?php } ?>

    	<?php if(isset($_GET['email'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_loginemailplz?></p></div>
    	<?php } ?>


<center>
	<?php
foreach ($getlogo as $key => $value) {

$logo = $value['owner_logo'];
$bgimg = $value['owner_bgimg'];
}
 ?>
<img src="<?php echo $base_url;?>/<?php echo $logo;?>" style="max-width: 300px;">
</center>


    		<div class="panel panel-warning">
			  	<div class="panel-heading" style="background-color: #fff;">
			    	<center><h1 class="panel-title" style="font-size: 35px;">โปรแกรมร้านอาหาร</h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form action="login_submit" method="post">
                    <fieldset>

<!-- <center>

  <style>
  .goog-te-gadget-simple{
    font-size: 20px;
  }
  </style>
                      <div id="google_translate_element"></div><script type="text/javascript">
                      function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'th', includedLanguages: 'th,en,id,km,lo,ms,my,vi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                      }
                      </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<br />
</center> -->

			    	  	<div class="form-group">





			    		    <input class="form-control" placeholder="<?=$lang_loginemail?>" name="email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="" style="height: 50px;font-size: 20px;">
			    		</div>

			    		<input id="submit"  class="btn btn-lg btn-warning btn-block" type="submit" value="<?=$lang_pagelogin?>" >
			    	</fieldset>
			      	</form>



			    </div>
			</div>
		</div>
	</div>
</div>




<style type="text/css">
	body{
		font-family: Tahoma;
		background-image: url("<?php echo $bgimg;?>");
		background-color: #f5f5f5;
	}
</style>






<script>

function Submit(){
$('#submit').prop('disabled',true);
};

var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.Submit = function(){
$('#submit').prop('disabled',true);
};

});


	</script>
