<?php
$ThisPage = $_SERVER['PHP_SELF'];
$ThisURL = $_SERVER['REQUEST_URI'];
$ThisHost = $_SERVER['HTTP_HOST'];								
include "config.php";

include $Site_Root . "system/class-citygrid.php";
include $Site_Root . "system/class-utility.php";
include $Site_Root . "system/class-flickr-photos.php";
include $Site_Root . "system/phpFlickr.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    
    <title><?php echo $Site_Name;?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<script type="text/javascript" src="http://static.citygridmedia.com/ads/scripts/v2/loader.js"></script>

    <!-- Le styles -->
    <link href="../bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <!-- This is for the Flickr Images -->
	<style>
	.img
		{
		display: inline-block;
		position: relative;
		text-decoration: none;
		}
	.img img
		{
		border: 1px solid #cccccc;
		padding: 10px;
		}
	img:hover { border-color: #aaaaaa; }
	.img div
		{
		background: #666666;
		color: #ffffff;
		opacity: .70;
		padding: 3px 0px;
		position: absolute;
		left: 0px;
		bottom: 25px;
		text-align: center;
		width: 100%;
		}
	.img:hover div { opacity: .90; }
	</style>
    
  </head>

  <body>

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <a class="brand" href="/index.php"><?php echo $Site_Name;?></a>
          <ul class="nav">
            <li class="active"><a href="/index.php">Home</a></li>
            <li><a href="/about.php">About</a></li>

            <li><a href="/contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
    
      <div class="sidebar">
        <div class="well">
        
			<ul>
          
			<?php
			// Get All Business Categories from Database
			//$utility = new utility($dbserver,$dbname,$dbuser,$dbpassword);
			//$BusinessCategories = $utility->getBusinessCategories();
			
			$myStore = $Site_Root . "system/business-categories-datastore.txt";
			$fh = fopen($myStore, 'r');
			//$BusinessCategories = fgets($Content);
			$BusinessCategories = fread($fh, filesize($myStore));

			$BusinessCategories = str_replace("\r","",$BusinessCategories);

			$BusinessCategory = json_decode($BusinessCategories);

			foreach($BusinessCategory as $category)
				{                              
				?><li><a href="/search.php?what=<?php echo $category->Name;?>"><?php echo $category->Name;?></a></li><?php
				}		
				
			//  Set a random Business Category for Use Elsewhere
			$FeatureCategory = $BusinessCategory[array_rand($BusinessCategory, 1)]->Name;				
			?>          

          </ul>     
          
        </div>
      </div>     
      
      <div class="content">
			
			<div class="row">      