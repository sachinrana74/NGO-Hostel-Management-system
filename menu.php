<!DOCTYPE html>
<html>

<script type="style/css">
#wrap	{
	width: 100%; /* Spans the width of the page */
	height: 50px; 
	margin: 0; /* Ensures there is no space between sides of the screen and the menu */
	z-index: 99; /* Makes sure that your menu remains on top of other page elements */
	position: relative; 
	background-color: #366b82;
	}

.navbar	{
	height: 50px;
        padding: 0;
	margin: 0;
	position: absolute; /* Ensures that the menu doesn’t affect other elements */
	border-right: 1px solid #54879d; 
	}

	.navbar li 	{
			height: auto;
			width: 150px;  /* Each menu item is 150px wide */
			float: left;  /* This lines up the menu items horizontally */
			text-align: center;  /* All text is placed in the center of the box */
			list-style: none;  /* Removes the default styling (bullets) for the list */
			font: normal bold 12px/1.2em Arial, Verdana, Helvetica;  
			padding: 0;
			margin: 0;
			background-color: #366b82;
                        }

.navbar a	{							
		padding: 18px 0;  /* Adds a padding on the top and bottom so the text appears centered vertically */
		border-left: 1px solid #54879d; /* Creates a border in a slightly lighter shade of blue than the background.  Combined with the right border, this creates a nice effect. */
		border-right: 1px solid #1f5065; /* Creates a border in a slightly darker shade of blue than the background.  Combined with the left border, this creates a nice effect. */
		text-decoration: none;  /* Removes the default hyperlink styling. */
		color: white; /* Text color is white */
		display: block;
		}
		
.navbar li:hover, a:hover {background-color: #54879d;} 

.navbar li ul 	{
		display: none;  /* Hides the drop-down menu */
		height: auto;									
		margin: 0; /* Aligns drop-down box underneath the menu item */
		padding: 0; /* Aligns drop-down box underneath the menu item */			
		}				

.navbar li:hover ul 	{
                        display: block; /* Displays the drop-down box when the menu item is hovered over */
                        }
						
.navbar li ul li a 	{
		border-left: 1px solid #1f5065; 
		border-right: 1px solid #1f5065; 
		border-top: 1px solid #74a3b7; 
		border-bottom: 1px solid #1f5065; 
		}
				
.navbar li ul li a:hover	{background-color: #366b82;}

														
								
</script>
<div id="wrap">
		  <ul class="navbar">
			 <li><a href="#">Home</a></li>
			 <li><a href="#">Retrievals</a>
				<ul>
				   <li><a href="#">Data Listing</a></li>
				   <li><a href="#">Web Scheduling</a></li>
				   <li><a href="#">Google Maps Application</a></li>
				</ul>         
			 </li>
			 <li><a href="#">Reporting</a>
				<ul>
				   <li><a href="#" >Ad Hoc Report</a></li>
				   <li><a href="#">Drill Down Report</a></li>
				   <li><a href="#">Ranking Report</a></li>
				</ul>         
			 </li>
			 <li><a href="#">Business Intelligence</a>
				<ul>
				   <li><a href="#">Business Dashboard</a></li>
				   <li><a href="#">Web Pivot Table</a></li>
				   <li><a href="#">Interactive Report</a></li>
				   <li><a href="#">What-If Analysis</a></li>
				</ul>         
			 </li>
			 <li><a href="#">Data Maintenance</a>
				<ul>
				   <li><a href="#">Database CRUD</a></li>
				   <li><a href="#">Database Update</a></li>
				   <li><a href="#">Order Entry</a></li>
				   <li><a href="#">Drag-and-Drop Application</a></li>
				</ul>         
			 </li>
			 <li><a href="#">B2B Portal</a>
				<ul>
				   <li><a href="#">B2B Portal</a></li>
				   <li><a href="#">Secure Data-Driven Listings</a></li>
				   <li><a href="#">Secure Shopping Cart</a></li>
				</ul>         
			 </li>
		  </ul>
</div>
</html>