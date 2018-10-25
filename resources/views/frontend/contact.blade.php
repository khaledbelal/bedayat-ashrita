@extends('layouts.remix')

@section('title')
    اتصل بنا
@endsection

@section('content')
 <div class="under_header">
	<!-- <img src="{{ URL('/templates/remix/images/assets/ramadan.jpg') }}" alt="#"> -->
</div><!-- under header -->

<div class="page-content back_to_up " > 
	<div class="row row-fluid clearfix "> 
		<div class="span8 posts">
			<div class="def-block clearfix">
				<h4> اترك لنا رسالة </h4><span class="liner"></span>
				<p>يسعدنا ويشرفنا مراسلتكم لنا .. </p>
				<form method="post" id="contactForm" action="<?php echo URL::route('send-message'); ?>">
					<div class="clearfix">
						<div class="grid_6 alpha fll"><input type="text" name="senderName" id="senderName" placeholder="اسمك *" class="requiredField" /></div>
						<div class="grid_6 omega flr"><input type="text" name="senderEmail" id="senderEmail" placeholder="بريدك الالكتروني *" class="requiredField email" /></div>
					</div>
					<div><textarea name="message" id="message" placeholder="الرسالة *" class="requiredField" rows="8"></textarea></div>
					<input type="submit" id="sendMessage" name="sendMessage" value="ارسال الرسالة" />
					<span id="return_status">  </span>
       			 	{{ csrf_field() }} 
				</form><!-- end form -->
			</div><!-- def block -->
		</div><!-- span8 posts -->

		<div class="span4 sidebar">
			<div class="def-block widget">
				<h4> طرق اخرى للتواصل </h4><span class="liner"></span>
				<div class="widget-content">  
					<p>بريد الكتروني: <strong>me@khaledbelal.com</strong></p>
				</div><!-- widget content -->
			</div><!-- def block widget details -->

			<!--div class="def-block widget">
				<h4> NewsLetters </h4><span class="liner"></span>
				<div class="widget-content">
					<p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
					<form id="newsletters" method="post" action="http://feedburner.google.com/fb/a/mailverify" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=sevenpsd', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="email" onfocus="if (this.value=='Type Your Email') this.value = '';" onblur="if (this.value=='') this.value = 'Type Your Email';" value="Type Your Email" placeholder="Type Your Email" required="required">
						<button type="submit"><i class="icon-ok"></i></button>
           			 	{{ csrf_field() }} 
					</form>
				</div>--><!-- widget content -->
			<!--</div>--><!-- def block widget NewsLetters --> 
		</div><!-- span4 sidebar --> 
	</div><!-- row clearfix --> 
</div><!-- end page content -->
@endsection

 @section('page_level_js') 
 <script type="text/javascript">
	
</script>
@endsection