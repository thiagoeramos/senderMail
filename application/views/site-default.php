<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<base href="<?=base_url('local_business')?>/" target="_blank">
		<title>RetireAqui - Recebimento de compras online!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="geo.placename" content="WC1B, london">
		<meta name="geo.position" content="-23.674223;-46.5436" />
		
		<link rel="stylesheet" href="<?=base_url("assets/bootstrap/css/bootstrap.css");?>" type="text/css">
		<link rel="stylesheet" href="<?=base_url("assets/css/style.css");?>" type="text/css">
		<link rel="stylesheet" href="<?=base_url("local_business/css/themes/css/custom.css")?>" type="text/css">
		<link rel="stylesheet" href="<?=base_url("local_business/js/perfect-scrollbar-0.3.3/perfect-scrollbar.css");?>" type="text/css" />
		
		<!--[if lt IE 9]>
			<link rel="stylesheet" href="<?=base_url("local_business/css/themes/bootstrap_ie7.css");?>" type="text/css">
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<style type="text/css">
			.renatao{ font-size:11px; }
		</style>

		<script type="text/javascript">
			var ENVIRONMENT = '<?=ENVIRONMENT?>';
		</script>
	</head>

	<body>
		
		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-lg-5 col-md-5 col-xs-12" style="height: 500px;background: red;"></div>
				
				<div class="col-lg-7 col-md-7 hidden-xs hidden-sm" style="height: 500px; background: blue;"></div>
				
			</div>
			
		</div>
		
		<div id="fb-root"></div>
		<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/jquery.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/jquery.mousewheel.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/perfect-scrollbar-0.3.3/perfect-scrollbar.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/global.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/facebook_all.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/formularios.js")?>"></script>
		<script type="text/javascript" src="<?=base_url("local_business/js/stylesheetToggle.js")?>"></script>
		<script type="text/javascript" src="<?=site_url('theme/js/jquery.mask.js');?>"></script>

		<script>

			$(function() {
				$.stylesheetInit();
				$('#color_switcher .box').bind('click',
					function(e) {
						$.stylesheetSwitch($(this).data('scheme'));
						return false;
					}
				);
			});

			window.fbAsyncInit = function() {
				FB.init({
					appId      : '1426683947600625', // App ID
					channelUrl : '//retireaqui.com/channel.html', // Channel File
					status     : true, // check login status
					cookie     : true, // enable cookies to allow the server to access the session
					xfbml      : true  // parse XFBML
				});

				/* Check se esta logado no face, não vamos deixar por hora */
				// FB.getLoginStatus(function(response) {
				// 	if (response.status === 'connected') {

				// 		var uid = response.authResponse.userID;
				// 		var token = response.authResponse.accessToken;

				// 		/*FB.api('/me', function(response) {
				// 			if(response.email.length>0)
				// 				$.fn.VerificaCadastroFB(response.name, token, uid, response.email);
				// 			else
				// 				$.fn.VerificaCadastroFB(response.name, token, uid, '');
				// 		});*/
				// 	}
				// });
			};

			// Load the SDK Asynchronously
			(function(d){
			var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement('script'); js.id = id; js.async = true;
			js.src = "//connect.facebook.net/pt_BR/all.js";
			ref.parentNode.insertBefore(js, ref);
			}(document));
		</script>
		
	</body>
</html>	
