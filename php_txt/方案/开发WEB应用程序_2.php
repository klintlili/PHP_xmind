<?php # Script 2.2 - header.html
// This page begins the HTML header for the site.

// Check for a $page_title value:
if (!isset($page_title)) $page_title = 'Default Page Title';
?><!DOCTYPE HTML>
<html>

<head>
  <title><?php echo $page_title; ?></title>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.html">colour<span class="logo_colour">blue</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php?p=about">About</a></li>
          <li><a href="index.php?p=this">This</a></li>
          <li><a href="index.php?p=that">That</a></li>
          <li><a href="index.php?p=contact">Contact</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5>January 1st, 2010</h5>
        <p>2010 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
        </ul>
        <h3>Search</h3>
        <form method="get" action="index.php" id="search_form">
		<!-- 表单中使用了GET方法，action属性指向索引页面index.php，因为所有的请求都会通过引导文件。-->
          <p>
            <input type="hidden" name="p" value="search" />
            <input class="search" type="text" name="terms" value="Search..." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
	<!-- End of header. -->