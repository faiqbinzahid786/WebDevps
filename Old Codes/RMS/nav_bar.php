<?php

//Project Heading - Hidden while printing
echo "<div class='container-fluidser NonPrintable'>
  <br>
  <h1><strong>The Restaurant Management System®</strong></h1> <br>
</div>
<!--Hiding element while printing-->
 <style type='text/css' media='print'>
    .NonPrintable
    {
      display: none;
    }
  </style>

";

//Nav Bar or Menu Bar
echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>
        <div class='container-fluid' id='1'>
        <span class='cover'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php'>RST Managment&nbsp &nbsp </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='menu.php'>Menu</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='add_menu.php'>&nbsp;Add Dishes</a>
            </li>
			<!-- Dropdown -->
            <li class='nav-item dropdown nav navbar-nav navbar-right'>
                <a class='nav-link' href='edit_menu.php' id='navbardrop' data-toggle='dropdown'>Edit Dishes</a>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='edit_menu.php'>All</a>
                    <a class='dropdown-item' href='edit_id.php'>Dish ID</a>
                    <a class='dropdown-item' href='edit_name.php'>Dish Name</a>
					<a class='dropdown-item' href='edit_ingred.php'>Ingredients</a>
					<a class='dropdown-item' href='edit_price.php'>Price</a>
                </div>
            </li>
			<li class='nav-item'>
                <a class='nav-link' href='rem_menu.php'>Remove Dishes</a>
            </li>
			<li class='nav-item'>
                <a class='nav-link' href='cond_display.php'>Conditional Display</a>
            </li>
            <li>
                <a class='nav-link'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;         
                </a>
            </li>
           <!-- Dropdown -->
            <li class='nav-item dropdown nav navbar-nav navbar-right'>
                <a class='nav-link' href='index.php' id='navbardrop' data-toggle='dropdown'>Documentation</a>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='index.php'>Menu</a>
					<a class='dropdown-item' href='index.php'>Add Dishes</a>
					<a class='dropdown-item' href='index.php'>Edit Dishes</a>
					<a class='dropdown-item' href='index.php'>Remove Dishes</a>
                </div>
            </li>
        </ul>
    </div>
  </span>
</nav>";

?>