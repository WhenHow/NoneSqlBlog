<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ChillyBlues - Internet Professionals</title>
<link rel="stylesheet" href="<?php echo(TEMPLATE_URL.'/')?>css/960.css" type="text/css" />
<link rel="stylesheet" href="<?php echo(TEMPLATE_URL.'/')?>css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo(TEMPLATE_URL.'/')?>css/style.css" type="text/css" />
<!--[if IE]>
<link rel="stylesheet" href="css/ie_slidefix.css" type="text/css" />
<![endif]-->
<style type="text/css">

body {
	background: #f9fafb url(images/bg.gif) top repeat-x;
}

</style>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/jquery.cycle.min.all.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/jquery.easing.names.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/TitilliumText15L_100-TitilliumText15L_400.font.js"></script>
<script type="text/javascript" src="<?php echo(TEMPLATE_URL.'/')?>js/custom.js"></script>
<script type="text/javascript">

countdownFrom = 15;

slideSpeed = 2000;
slideTimeout = 10000;



/* dont' edit anyting below here unless you're sure about what you're doinf  */


$(window).load(function () {
  	getStarted()
});

Cufon.replace('http://chillyblues.chillyorange.com/h1');
Cufon.replace('http://chillyblues.chillyorange.com/h2');

slidesPause = 0;

function getStarted(){
   	
   	if(countdownFrom > 0) {
   	
		cdown = setInterval(function(){
	
			if(countdownFrom == 0) {
			
				clearInterval(cdown);
			
				$('#rightCorner').click(function(){
					
					if(slidesPause == 0) {
						
						$('#slides').cycle('pause');
						$('#rightCorner').css("background", "url(../images/slideNavRight.gif) bottom no-repeat");
						slidesPause = 1;
						
					} else {
							
						$('#slides').cycle('resume');
						$('#rightCorner').css("background", "url(../images/slideNavRight.gif) top no-repeat");
						slidesPause = 0;
						
					}	
				});
			
				//hide beforeSlideshow
			
				$('#displayIn').animate({opacity:0}, 2000, function(){
				
					$('#displayIn').css("background", "url(images/mainDisplayBG.jpg) no-repeat bottom");
				
					$('#beforeSlideshow').css("display", "none");
					$('#slideshow').css("display", "block");
				
					$('#displayIn').animate({opacity:1}, 3000);
				
					//configfure spacer element in slnavBG
				
					//activate slideshow
					$('#slides').cycle({ 
    					fx:     'scrollHorz',
    					speed:	slideSpeed,
    					timeout: slideTimeout, 
    					delay:  -2000,
    					next:   '#next', 
    					prev:   '#previous',
    					pager:  '#slnav',
    					easing: 'backinout'
   					});
   				
   					$('#slnavSpacer').css("width", 880 - (24*$('div#slides>div.slide').length));
				
					$('.slide').css("background", "none");
				})
			
			} else {
			
				countdownFrom = countdownFrom - 1;
			
				$('#count')[0].innerHTML = countdownFrom;
			
			}
	
		}, 1000);
	
	} else if(countdownFrom == -1) {
	
		$('#rightCorner').click(function(){
					
			if(slidesPause == 0) {
						
				$('#slides').cycle('pause');
				$('#rightCorner').css("background", "url(../images/slideNavRight.gif) bottom no-repeat");
				slidesPause = 1;
						
			} else {
							
				$('#slides').cycle('resume');
				$('#rightCorner').css("background", "url(../images/slideNavRight.gif) top no-repeat");
				slidesPause = 0;
						
			}	
		});
		
		$('#displayIn').css("background", "url(images/mainDisplayBG.jpg) no-repeat bottom");
				
		$('#beforeSlideshow').css("display", "none");
		$('#slideshow').css("display", "block");
		
		//activate slideshow
		$('#slides').cycle({ 
    		fx:     'scrollHorz',
    		speed:	slideSpeed,
    		timeout: slideTimeout, 
    		delay:  -2000,
    		next:   '#next', 
    		prev:   '#previous',
    		pager:  '#slnav',
    		easing: 'backinout'
   		});
   				
   		$('#slnavSpacer').css("width", 880 - (24*$('div#slides>div.slide').length));
				
		$('.slide').css("background", "none");
	
	} else {
		
		$('#countdown').css("visibility", "hidden");
		
	}
}

</script>
</head>

<body>
	<div class="container_16" id="main">
			
		<div class="grid_16" id="top">
			<a href="#" id="qsm">quick select menu <img id="down" src="images/dropdowntriangle.gif" alt="dropdown" /><img id="up" src="images/dropdowntriangle_.gif" alt="dropdown" /></a>
			<div id="qsmContainer">
				<div id="qsmTop"></div>
				<div id="qsmMiddle">
					<div id="search">
						<input type="text" value="search site" onfocus="if(this.value == 'search site'){this.value = ''}" />
						<img src="images/search.gif" alt="search" />
					</div>
					<div class="clear"></div>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="projects.html">projects</a></li>
						<li><a href="#">services</a></li>
						<li>
							<a href="blog.html">News</a>
							<ul>
								<li><a href="post.html">First newsitem</a></li>
								<li><a href="post.html">Second newsitem</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div><!-- /#qsmMiddle -->
				<div id="qsmBottom"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="grid_16" id="logo">
			<a href="index.html"><img src="images/logo.gif" alt="ChillyBlues" /></a>
		</div>
		<div class="clear"></div>
		
		<div class="grid_16" id="navigation">
			<ul>
				<li><a href="index.html" class="current"><span>home</span></a></li>
				<li><a href="about.html"><span>about</span></a></li>
				<li><a href="projects.html"><span>projects</span></a></li>
				<li><a href="#"><span>services</span></a></li>
				<li><a href="contact.html"><span>contact</span></a></li>
			</ul>
			<div id="triSlideContainer"><img src="images/currentarrow.gif" alt="arrow" /></div>
		</div>
		<div class="clear"></div>
		
		<div class="grid_16" id="mainDisplay">
		
			<div id="displayIn">
			
				<div id="beforeSlideshow">
					<div id="countdown">slideshow starting in &nbsp;&nbsp;<span id="count"><script type="text/javascript">document.write(countdownFrom)</script></span></div>
					<h1>We're all kinds of awesome!</h1>
					<div class="clear"></div>
					<h2>With over 15 years of experience, we build jaw-dropping, fingerlicking-good stuff for the Internet.</h2>
					<div class="clear"></div>
					<div id="buttons">
						<a href="about.html" class="button_aa" id="leftButton"><span>find out more about us</span></a>
						<a href="#" class="button_aa" id="rightButton"><span>get a free quote now</span></a>
					</div>
				</div>
			
				<div id="slideshow">
					<div id="slideNav">
						<div id="leftCorner"></div>
						<div id="rightCorner"></div>
						<div id="slnav"><div id="slnavSpacer"></div></div>
					</div>
					<div>
						<div id="previous"></div>
						<div id="next"></div>
					
						<div id="slides"><!-- this is the main container for your slides -->
						
							<div class="slide">
								<div class="caption">
									<h2>Themeforest1</h2>
									<p>
									Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Vivamus mattis convallis turpis. In hac habitasse platea dictumst. Aliquam dignis sim tinci dunt nunc nec venenatis.
									</p>
								</div>
								<div class="sImCon">
									<img src="slideshow/slide1.jpg" alt="slide1" />
								</div>
							</div>
							<div class="slide">
								<div class="caption">
									<h2>Themeforest2</h2>
									<p>
									Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Vivamus mattis convallis turpis. In hac habitasse platea dictumst. Aliquam dignis sim tinci dunt nunc nec venenatis.
									</p>
								</div>
								<div class="sImCon">
									<img src="slideshow/slide1.jpg" alt="slide1" />
								</div>
							</div>
							<div class="slide">
								<div class="caption">
									<h2>Themeforest3</h2>
									<p>
									Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Vivamus mattis convallis turpis. In hac habitasse platea dictumst. Aliquam dignis sim tinci dunt nunc nec venenatis.
									</p>
								</div>
								<div class="sImCon">
									<img src="slideshow/slide1.jpg" alt="slide1" />
								</div>
							</div>
							<div class="slide">
								<div class="caption">
									<h2>Themeforest1</h2>
									<p>
									Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Vivamus mattis convallis turpis. In hac habitasse platea dictumst. Aliquam dignis sim tinci dunt nunc nec venenatis.
									</p>
								</div>
								<div class="sImCon">
									<img src="slideshow/slide1.jpg" alt="slide1" />
								</div>
							</div>
							<div class="slide">
								<div class="caption">
									<h2>Themeforest2</h2>
									<p>
									Lorem ipsum dolor sit amet, consectetur adipisc ing elit. Vivamus mattis convallis turpis. In hac habitasse platea dictumst. Aliquam dignis sim tinci dunt nunc nec venenatis.
									</p>
								</div>
								<div class="sImCon">
									<img src="slideshow/slide1.jpg" alt="slide1" />
								</div>
							</div>
					
						</div><!-- /#slides -->
					
					</div><!-- /#slideshow -->
					
				</div><!-- /#displayIn -->
			
			</div>
		</div><!-- /#mainDisplay -->
		<div class="clear"></div>
		
	</div><!-- /#main -->
		<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>	
	<div class="container_16" id="content">
		
		<div class="grid_11 content" id="two_col">
			<h2>ChillyBlues: topnotch web builders</h2>
			<p>
			<img src="images/aboutus.jpg" alt="aboutus" />ChillyBlues is a clean, business-oriented template with a blue, orange and 
			grey shaded color theme. ChillyBlues is escpecially suitable for tech and web companies looking to strengthen their online presence. It includes features
			like an extremely flexible, yet easy to customize slider; 8 fully coded pages
			(nothing but 100% valid, table-less, XHTML 1.0), a fully functional contact
page; and much more!
			</p>
			<p>
			The has numerous features and is easy to configure and customize thanks to the nicely layered and grouped PSD files and clear <a href="documentation/index.html">documentation</a>. For more info and features, have a look <a href="about.html">here</a>. 
			</p>
		</div><!-- /#left -->
		<div class="grid_5 news" id="one_col">
			<h2>News &amp; Events</h2>
			<ul>
            <?php
                for($i = 0; $i<count($SideContent)&&SIDE_BOX_LIMIT;$i++){
            ?>
			<li>
				<a href="<?php echo($SideContent[$i]['Url'])?>" title = "<?php echo($SideContent[$i]['PostTitle'])?>"><?php echo( mb_substr($SideContent[$i]['PostTitle'],0,10,'UTF-8').'...')?></a>
			</li>
            <?php }?>
			</ul>
		</div>
		<div class="clear"></div>
		
	</div><!-- /#content -->
		
	<div id="footerwrapper">
		
		<div class="container_16">
		
			<div class="grid_16" id="footer">
<span id="address"><b>ChillyBlues Web Solutions</b> - Somewherestreet 22 12345 Somewhere Town - phone: 000 123 456 789 - @: info@chillyblues.com</span>
			
				<div>
					<ul class="services">
						<li>web design</li>
						<li>design customization</li>
						<li>CMS systems</li>
					</ul>
					<ul class="services">
						<li>Wordpress themes/setups</li>
						<li>Slicing PSD's into HTML/WP</li>
						<li>code/html optimization</li>
					</ul>
					<ul class="links" id="first">
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="http://www.cssmoban.com/">Portfolio</a></li>
					</ul>
					<div id="copyright">&copy; 2013 ChillyBlues - All rights reserved. <a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></div>
				</div>
			 
			</div>
			<div class="clear"></div>
			
		</div>
		
	</div><!-- /#footerwrapper -->
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>
