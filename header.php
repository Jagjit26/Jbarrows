<?php // Site Settings 
	
	// Global
	$site_title = 'Sales Training That Gets To The Point | J. Barrows';
	$site_description = 'John Barrows is the Sales trainer to the leading tech companies';
	$site_meta = '';
	// Contact Info
	$linkedin = '';
	$facebook = '';
	$twitter = 'johnbarrows21';
	$contact_no = '(617) 529-5252';
	$contact_email = 'jsingh@essencesoftwares.com';
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<title><?php echo $site_title; ?></title>
<meta charset="utf-8" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="keywords" content="<?php echo $site_meta; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, user-scalable=1" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" type="image/gif" href="assets/imgs/favicon.gif" />

<script src="assets/js/jquery.js"></script>
<script src="assets/js/scrollto.js"></script>
<script src="assets/js/easing.js"></script>
<script src="assets/js/custom.js"></script>
<script>document.createElement('section');var duration=1000,easing='easeInOutExpo';</script>
<!--[if lt IE 9]>
<script>
  document.createElement('header');
  document.createElement('nav');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('footer');
</script>
<![endif]-->

<script type="text/javascript">
	$(document).ready(function(){
			$.getJSON("https://api.twitter.com/1/statuses/user_timeline/johnbarrows21.json?count=2&include_rts=1&callback=?", function(data) {
				var date=(data[0].created_at).split("+");
     			$("#tweet1").html(data[0].text);
				$("#tweet2").html(data[1].text);
			});
	});
	</script>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39229043-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
</head>
<body>

	<header>
		<div class="inner">
			<nav>
				<ul>
					<li><a href="#intro">Home</a></li>
					<li><a href="#training">Training</a></li>
					<li><a href="#testimonial">Testimonials</a></li>
					<li><a href="#results">Results</a></li>
					<li><a href="#john">About</a></li>
					
					<li class="last"><a href="#contact">Contact</a></li>
					<a href="/blog">Blog</a></li>
				</ul>
			</nav>
		</div><!-- /.inner -->
	</header>
	
	<div id="wrapper">
	