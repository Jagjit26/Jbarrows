<?php
include_once('./twitter.php');

$tweets = get_twitter_feeds('johnmbarrows');
$tweetcount = 2;
?>	



<footer>
		<section id="contact">
			<div class="topfoot">
				<div class="inner">
					<div class="one_third">
                    	<h3><a href="https://twitter.com/johnmbarrows" class="black" target="_blank"><img src="assets/imgs/twitter.png" class="twitter" />Follow Me on Twitter</a></h3>
                        <?php
						if (is_array($tweets) && count($tweets) >0) {
				for ($i = 0; $i < $tweetcount; $i++ ) {
			?>
                        <p><a href="https://twitter.com/johnmbarrows" class="blue baskerville-bold" target="_blank">@johnmbarrows</a> <span><?php echo $tweets[$i]->text; ?></span></p>
			<?php
			}	
			}
			?>
                     </div>
                    
                    <!--<div class="one_third">
                    	<h3>Latest from the blog</h3>
                        <h5 class="blue baskerville-bold">Dolor Sit Amet</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse neque leo, hendrerit vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse neque leo, hendrerit vel.</p>
                    </div>-->
               
                   <div class="one_third">
                    	<h3>Check out your free sales tips</h3>
                        <a href="http://www.salesfromthestreets.com" target="_blank" ><img class="sfts" src="assets/imgs/sfts.png" /></a>
                    </div>
                    
                    <div class="one_third last">
                    	<h3>Connect with me</h3>
                        <p class="blue footer">617-850-9007 / <a href="mailto:john@jbarrows.com" class="blue footer" target="_blank">john@jbarrows.com</a></p>
                        <a href="http://eepurl.com/xA1mr" target="_blank" class="blue footer">Sign up for my monthly tips email!</a>
                        <br />
                        <address>
                        	<span>© 2013 j.barrows,LLC </span>
                            <span>10 Post Office Square, 8th Floor <br />Boston, MA 02109</span>
                        </address>
                    </div>
                    
					<div class="clear"></div>                    
					
				</div><!-- /.inner -->
			</div><!-- /.topfoot -->
		</section><!-- /#contact -->
	</footer>
	
	
	
	</div><!-- /#wrapper -->

	<nav>
		<a href="#intro" class="back_top">Back top</a>
	</nav>

<style>
.overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 99999; }
.form { background: #fff; border: 2px solid #000; padding: 50px; width: 790px; height: auto; //min-height: 380px;}
.form-info { font-weight: 100; display: inline-block; width: 340px; margin-right: 50px; vertical-align: text-top;}
.form-info h2 { font-size: 32px; line-height: 35px; padding-bottom: 20px;}
.the-form { padding-left: 50px; border-left: 1px solid #c3c3c3; min-height: 500px; height: auto; display: inline-block; width: 340px; vertical-align: text-top;}
.the-form label { clear: both; display: block;}
.the-form .medium { width: 95%; height: 28px; font-size: inherit; padding: 5px; border: 1px solid #ccc; border-radius: 3px; background: url('assets/imgs/inputbg.jpg') repeat-x left -2px;}
.the-form select { border: 1px solid #ccc; height: 35px; width: 50%; background: url('assets/imgs/selectbg.jpg') repeat-x; padding: 5px; font-size: inherit;}
.the-form .submit-btn { border: 0; display: inline-block; cursor: pointer; width: 137px; height: 34px; font-size: 0; background: url('assets/imgs/submitbtn.png') no-repeat;}
.the-form .cancel-form { position: relative; top: 5px; margin-left: 10px; margin-top: 5px;}

.error_message  { color: #8A1F11; height: 22px; line-height: 22px; padding: 5px 10px; margin-bottom: 10px; border: 1px solid #FBC2C4; background: #FBC2C4; font-size: 13px;}

#success { display: none; }
#success h2 { padding-bottom: 20px;}
.thankyou { margin: 10% auto; text-align: center; width: 430px;}
.thankyou .okaybtn { display: inline-block; font-size: 0; position: relative; width: 137px; height: 34px; background: url('assets/imgs/okbtn.png') no-repeat;}
</style>

<div class="overlay">

	<div class="form">

		<div id="success">
			<div class="thankyou">
				<h2>YOUR REQUEST HAS BEEN SENT.</h2>
				<p>I will contact you shortly.</p>
				
				<p><a href="javascript:void(0)" class="okaybtn">Ok</a></p>
			</div>
		</div>

		<div class="form-info">
			<h2>Thank You For Your Interest!</h2>
			<p>Please fill out this form and I’ll get back to you as soon as possible to schedule a brief call where we can talk about what you’re looking for and determine if it makes sense for us to take the next steps.</p>
			<p>Sincerely,</p>
			<p>John Barrows</p>
		</div>
		<div class="the-form">
			<div id="message"></div>
			<form method="post" action="contact.php" name="contactform" id="contactform">
				<p><label>Name</label>
				<input type="text" name="name" id="name" class="medium">
				</p>
				<p><label>Company</label>
				<input type="text" name="company" id="company" class="medium">
				</p>
				<p><label>Email</label>
				<input type="email" name="email" id="email" class="medium">
				</p>
				<p><label>Phone</label>
				<input type="tel" name="phone" id="phone" class="medium">
				</p>
				<p><label># of Sales Reps</label>
				<select id="reps">
					<option value="">Select</option>
					<option value="1-10">1-10</option>
					<option value="11-20">11-20</option>
				</select>
				</p>
				<p><input type="checkbox" checked="checked" id="weekly" name="weekly"> Sign me up for monthly sales tip email</p>
				<p><input type="submit" id="submit" class="submit-btn" value="SUBMIT"> <a href="javascript:void(0)" class="cancel-form">Cancel</a></p>
			</form>
		</div>
	</div>
	
</div>

<script src="assets/js/jquery.1.7.2.js"></script>
<script src="assets/js/lbox.js"></script>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="assets/js/stretch.js"></script>

<script>
jQuery(document).ready(function($){
	$('#intro').backstretch([
		'assets/imgs/intro.jpg'
	], {
		fade: 400,
		duration: 2500
	});
	
	$('#john').backstretch([
		'assets/imgs/john.jpg'
	], {
		fade: 100,
		duration: 2500
	});
 $(window).resize(function(){

  $('.form').css({
   position:'absolute',
   left: ($(window).width() 
     - $('.form').outerWidth())/2,
   top: ($(window).height() 
     - $('.form').outerHeight())/2
  });
		
 });
  $(window).resize();
  $('a.open-form').click(function(){
	  $('.overlay, .form').fadeIn();
	  $(window).resize();
  });
  $('a.cancel-form, a.okaybtn').click(function(){
	  $('.overlay, .form').fadeOut();
	  $('#contactform').find('.medium, select, input[type="radio"]').val('');
  });

	$('#contactform').submit(function(){
	
		var action = $(this).attr('action');
		
		$("#message").show(function() {
		$('#message').hide();
		
 		$('#submit')
			.after('<img src="assets/ajax-loader.gif" class="loader" />')
			.attr('disabled','disabled');
		
		$.post(action, { 
			name: $('#name').val(),
			company: $('#company').val(),
			email: $('#email').val(),
			phone: $('#phone').val(),
			reps: $('#reps').val(),
			weekly: $('#weekly').val(),
		},
			function(data){
				document.getElementById('message').innerHTML = data;
				$('#message').show();
				$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit').removeAttr('disabled'); 
				if(data.match('success') != null) 
				$('#success').fadeIn('slow');
				if(data.match('success') != null) 
				$('.form-info, .the-form').hide();
			}
		);
		
		});
		
		return false; 
	
	});

});
</script>

</body>
</html>