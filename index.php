<!doctype html>
<html class="no-js" lang="" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><!-- Title 50-60 characters --></title>

    <meta name="description" content="Roughly 155 Characters">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta itemprop="name" content="The Name or Title Here">
    <meta itemprop="description" content="This is the page description">
    <meta itemprop="image" content="http://www.example.com/image.jpg">
    <link href="https://plus.google.com/XXX" rel="author">
    <!-- if an author exists on G+ -->
    <link href="https://plus.google.com/XXX" rel="publisher">
    <!-- if a business page exists on G+ -->

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Page Title">
    <meta name="twitter:description" content="Page description less than 200 characters">
    <meta name="twitter:creator" content="@author_handle">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="http://www.example.com/image.jpg">

    <meta property="og:title" content="Title Here" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.example.com/" />
    <meta property="og:image" content="http://example.com/image.jpg" />
    <meta property="og:description" content="Description Here" />
    <meta property="og:site_name" content="Site Name, i.e. Moz" />
    <meta property="fb:admins" content="Facebook numeric ID" />

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <style type="text/css">
    	/* Above-The-Fold-Styles go here */
    </style>
    <link rel="stylesheet" href="css/app.css">
    <!--<link rel="stylesheet" href="css-min/app.css">-->

    <!-- Get customized modernizr from http://modernizr.com/download/ -->
    <script src="vendor/modernizr.custom.67687.js"></script>
</head>

<body>
    <!-- Prebuild Content with Emmet -->
    <!--header[role="banner"]+(nav[role="navigation"]>ul>li*5>a[href="#" title="Fill me for link No.$!"]{Navi0$})+(main[role="main"]>(ul.breadcrumbs>li[itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"]*3>a[title="Breadcrumb$" href="#" itemprop="url"]>span[itemprop="title"]{Breadcrumb$})+h1>lorem3)+aside[role="complementary"]+footer[role="contentinfo"]-->

    <header role="banner"></header>
    <nav role="navigation">
    	<ul>
    		<li><a href="#" title="Fill me for link No.1!">Navi01</a></li>
    		<li><a href="#" title="Fill me for link No.2!">Navi02</a></li>
    		<li><a href="#" title="Fill me for link No.3!">Navi03</a></li>
    		<li><a href="#" title="Fill me for link No.4!">Navi04</a></li>
    		<li><a href="#" title="Fill me for link No.5!">Navi05</a></li>
    	</ul>
    </nav>

		<?php
		// Mobile Detect. Examples: https://github.com/serbanghita/Mobile-Detect/wiki/Code-examples
		session_start();

		require_once 'vendor/mobile-detect/Mobile_Detect.php';

		function layoutTypes()
		{
		  return array('classic', 'mobile', 'tablet');
		}
		function initLayoutType()
		{
	    // Safety check.
	    if (!class_exists('Mobile_Detect')) { return 'classic'; }
	    $detect = new Mobile_Detect;
	    $isMobile = $detect->isMobile();
	    $isTablet = $detect->isTablet();
	    $layoutTypes = layoutTypes();
	    // Set the layout type.
	    if ( isset($_GET['layoutType']) ) {
	        $layoutType = $_GET['layoutType'];
	    } else {
	        if (empty($_SESSION['layoutType'])) {
	            $layoutType = ($isMobile ? ($isTablet ? 'tablet' : 'mobile') : 'classic');
	        } else {
	            $layoutType =  $_SESSION['layoutType'];
	        }
	    }
	    // Fallback. If everything fails choose classic layout.
	    if ( !in_array($layoutType, $layoutTypes) ) { $layoutType = 'classic'; }
	    // Store the layout type for future use.
	    $_SESSION['layoutType'] = $layoutType;
	    return $layoutType;
		}

		$layoutType = initLayoutType();

		?>

		<?php if(!isset($_GET['page'])): ?>

    <main role="main">
    	<ul class="breadcrumbs">
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb1" itemprop="url"><span itemprop="title">Breadcrumb1</span></a></li>
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb2" itemprop="url"><span itemprop="title">Breadcrumb2</span></a></li>
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb3" itemprop="url"><span itemprop="title">Breadcrumb3</span></a></li>
    	</ul>
    	<h1>Version 01 <?php echo $layoutType; ?></h1>
    	<p>You can go to page <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=two">two</a>.</p>
    </main>

		<?php endif; ?>

		<?php if(isset($_GET['page']) && $_GET['page']=='two'): ?>

    <main role="main">
    	<ul class="breadcrumbs">
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb1" itemprop="url"><span itemprop="title">Breadcrumb1</span></a></li>
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb2" itemprop="url"><span itemprop="title">Breadcrumb2</span></a></li>
    		<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" title="Breadcrumb3" itemprop="url"><span itemprop="title">Breadcrumb3</span></a></li>
    	</ul>
    	<h1>Version 02 <?php echo $layoutType; ?></h1>
    	<p>You can go back to page <a href="<?php echo $_SERVER['PHP_SELF']; ?>">one</a>.</p>
    </main>

		<?php endif; ?>

		<aside role="complementary"></aside>
    <footer role="contentinfo"></footer>

    <!-- adjust jQuery version for googleapis file -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="vendor/bower/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="js/app.js"></script>
    <!--<script src="js-min/app.pkgd.js"></script>-->
    <!-- searchAction for Google's Search Box in the SERPs. Change example.com and input's name. -->
    <script type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite","url": "http://www.example.com/","potentialAction": {"@type": "SearchAction","target": "http://example.com/search/?search-terms={search-terms}", "query-input": "required name=search-terms"}}</script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID and "example.com" to be your URL. -->
    <script>(function(e,t,n,r,i,s,o){e["GoogleAnalyticsObject"]=i;e[i]=e[i]||function(){(e[i].q=e[i].q||[]).push(arguments)},e[i].l=1*new Date;s=t.createElement(n),o=t.getElementsByTagName(n)[0];s.async=1;s.src=r;o.parentNode.insertBefore(s,o)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create","UA-XXXXXXX-X","example.com");ga("set","anonymizeIp",true);ga('require', 'displayfeatures');ga("send","pageview")</script>
</body>

</html>
