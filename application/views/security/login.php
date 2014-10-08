<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Detail Admin - Sign in</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="<?=site_url('theme/css/bootstrap/bootstrap.css');?>" rel="stylesheet" />
    <link href="<?=site_url('theme/css/bootstrap/bootstrap-overrides.css');?>" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/layout.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/elements.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/icons.css');?>" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/lib/font-awesome.css');?>" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?=site_url('theme/css/compiled/signin.css');?>" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
            var ENVIRONMENT = '<?=ENVIRONMENT?>';
            var host='<?=site_url();?>';
        </script>

</head>
<body>
    <div class="login-wrapper">
        <div class="box">
            
            <? if($error){ ?>
			<div class="col-xs-12">
				<div class="alert alert-danger">
					<?=$error;?>
				</div>
			</div>
            <? } ?>
            
            <div class="content-wrap">
                <form method="post">
                <h6>Login</h6>
                    <input class="form-control" name="email" type="text" value="<?=set_value('email', $this->input->post('email')); ?>" placeholder="E-mail">
                    <input class="form-control" name="password" type="password" placeholder="Sua Senha">
                    
                    <input class="btn-glow primary login" type="submit" value="Efetuar Login" />
                </form>

                <br />
                <div class="row-fluid leave-gap">
                    <div class="span12">
						<center>
							<a href="#" title="Conecte-se usando o Facebook" id='logar-painel-facebook'>
								<img src='<?=base_url("local_business/css/images/btn-face.png");?>' />
							</a>
						</center>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="fb-root"></div>

	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?=site_url('theme/js/bootstrap.min.js');?>"></script>
    <script src="<?=site_url('theme/js/theme.js');?>"></script>

    <script type="text/javascript" src="<?=base_url("local_business/js/facebook_all.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("local_business/js/formularios.js")?>"></script>


        <script>

          
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
                //  if (response.status === 'connected') {

                //      var uid = response.authResponse.userID;
                //      var token = response.authResponse.accessToken;

                //      /*FB.api('/me', function(response) {
                //          if(response.email.length>0)
                //              $.fn.VerificaCadastroFB(response.name, token, uid, response.email);
                //          else
                //              $.fn.VerificaCadastroFB(response.name, token, uid, '');
                //      });*/
                //  }
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