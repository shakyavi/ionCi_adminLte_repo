<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--><html class="" lang="<?php echo $lang; ?>"> <!--<![endif]--><head>
		<meta charset="<?php echo $meta_charset; ?>">
		<title><?php echo $site_title; ?></title>
		<meta name="description" content="<?php echo $site_description; ?>" />
		<meta name="keywords" content="<?php echo $site_keywords; ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon" >
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/apple-touch-icon.png" />
		
		<?php echo $meta_tag; ?>
		<?php echo $styles; ?>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

		<!-- JS -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/modernizr.custom.14425.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/selectivizr.js"></script>
		<script type='text/javascript'> var base_url = '<?php echo base_url(); ?>'; //base_url </script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
		<!--<script type="text/javascript" src="<?php // echo base_url() ?>assets/scripts/plugins/jquery/jquery-1.10.2.min.js"></script>-->  
		<script src="<?php echo base_url(); ?>assets/scripts/js_loader/script.min.js"></script>
		<?php echo $scripts_header; ?>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/plugins/validation/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/plugins/validation/additional-methods.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/main.js"></script> 

		<script src="<?php echo base_url(); ?>assets/scripts/utilities.js"></script>
		<script type="text/javascript">
			$script(base_url + "assets/scripts/fitness_calendar/fitness_calendar_model.js", function() {
				$script(base_url + "assets/scripts/fitness_calendar/fitness_calendar.js", function() {
				});
			});
		</script>
        <script>
			$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		</script>
<!--		<script> 
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 

		ga('create', 'UA-46957755-1', 'fitnesscalendar.com.au'); 
		ga('send', 'pageview'); 

		</script>-->
	</head>
	<body>
		<?php $this->load->view('template/blocks/header'); ?>

		<section>
			<?php $this->load->view('template/blocks/slider'); ?>
			<?php $this->load->view('search/blocks/search_block'); ?>
			<div class="container">
				<?php echo $content; ?>
                <?php if(!empty($advertise_footer)):?>
                <div class="advertisement">
                <?php 
                $image_properties = array(
                      'src' => site_url('assets/uploads/advertisements/'.$advertise_footer->advertise_image),
                      'alt' => $advertise_footer->advertise_name,
                     // 'class' => 'post_images',
                      'width' => '1180',
                      'height' => '100',
                      'title' => $advertise_footer->advertise_name,
                );
				if($advertise_footer->advertise_link && $advertise_footer->advertise_link != '#'){
                	echo anchor($advertise_footer->advertise_link,img($image_properties));	
				}else{
					echo img($image_properties);	
				}
                ?>
                </div>  
                <?php endif;?>
            </div>
		</section>

		<?php $this->load->view('template/blocks/footer'); ?>
		
		<!--for info popup-->
		<a class="hide" id="info-modal-popup" href="#info-modal" role="button" data-toggle="modal"></a>
		<div id="info-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3></h3>
		</div>
		<div class="modal-body"></div>
		</div>
		<!--end info popup-->
		<div id="loading_ajax" style="display: none;">
			<div class="loading-overlay">
				<div id="loading-page">
					<img src="<?php echo base_url('assets/img/ajax-loader_blue.gif'); ?>" alt="loading">
				</div>
			</div>
		</div>

		<?php echo $scripts_footer; ?>
	</body>
</html>

