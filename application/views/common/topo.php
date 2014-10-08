<!DOCTYPE html>
<html>
<head>
	<title>RetireAqui - Painel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="<?=site_url('theme/css/bootstrap/bootstrap.css');?>" rel="stylesheet" />
    <link href="<?=site_url('theme/css/bootstrap/bootstrap-overrides.css');?>" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/layout.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/elements.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/icons.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/compiled/index.css');?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/lib/select2.css');?>">

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?=site_url('theme/css/lib/font-awesome.css');?>" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?=site_url('theme/css/compiled/new-user.css');?>" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
     .select2{
        width: 100%;
     }
     </style>
	
	<base href="<?=site_url();?>" />
	
		<script type="text/javascript">
			var ENVIRONMENT = '<?=ENVIRONMENT?>';
		</script>
</head>
<body>

<!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('ponto');?>"><img src="theme/img/logo.png" alt="logo" /></a>
        </div>
        <ul class="nav navbar-nav pull-right hidden-xs">
            
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-warning-sign"></i>
                    <span class="count"><?=(isset($notificacoes) and $notificacoes != false ) ? count($notificacoes) : 0;?></span>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>

                        <?php
                            echo '<div class="notifications">';
							if(isset($notificacoes) and $notificacoes != false){
								$count=1;
								foreach($notificacoes as $notificacao){
									
									echo '<h3><span>'.$count."</span> - ".$notificacao['mensagem'].'</h3>';
									$count++;
								}
							}else{
								echo '<h3>Nenhuma notificação</h3>';
							}
							echo '</div>';                       
                        ?>
                    
                    </div>
                </div>
            </li>
            <li class="settings hidden-xs hidden-sm">
                <a href="<?=site_url('security/logout');?>" role="button" title="Sair">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </header>
    <!-- end navbar -->
<?
if($this->session->userdata('user_type')=='admin'){ ?>

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li>
            <a href="<?=site_url('usuario');?>">
                <i class="icon-user"></i>
                <span>Usuarios</span>
            </a>
        </li>
        <li>
            <a href="<?=site_url('ponto');?>">
                <i class="icon-pushpin"></i>
                <span>Pontos</span>
            </a>
        </li>
		<!--<li>
            <a href="<?=site_url('pacote');?>">
                <i class="icon-map-marker"></i>
                <span>Pacotes</span>
            </a>
        </li>-->
		<li>
            <a href="<?=site_url('solicitacao');?>">
                <i class="icon-map-marker"></i>
                <span>Solicitações</span>
            </a>
        </li>
		
		<li>
            <a href="<?=site_url('logs_busca');?>">
                <i class="icon-map-marker"></i>
                <span>Logs de Busca</span>
            </a>
        </li>
		
		<li>
            <a href="<?=site_url('logs_email');?>">
                <i class="icon-map-marker"></i>
                <span>Logs de Emails</span>
            </a>
        </li>


		<li>
            <a href="<?=site_url('dados');?>">
                <i class="icon-book"></i>
                <span>Meus dados</span>
            </a>
        </li>
		
		
    </ul>
</div>
<!-- end sidebar -->
<? } ?>

<?
if(in_array($this->session->userdata('user_type'),array('ponto','usuario'))){ ?>

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
       
		<li>
            <a href="<?=site_url('solicitacao');?>">
                <i class="icon-map-marker"></i>
                <span>Solicitações</span>
            </a>
        </li>


		<li>
            <a href="<?=site_url('dados');?>">
                <i class="icon-book"></i>
                <span>Meus dados</span>
            </a>
        </li>
	

    </ul>
</div>
<!-- end sidebar -->
<? } ?>


    <div  id="deleteModal"  aria-hidden="false" aria-labelledby="deleteModalLabel" role="dialog" tabindex="-1" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id='modal-title-delete-chamado'>DELETAR REGISTOR</h4>
          </div>
          <div class="modal-body" id="modal-body-delete-chamado">
            <p>IMPORTANTE: Ao deletar você não poderá mais editar ou reativar</p>
            <p>Tem certeza disto?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            <button type="button" class="btn btn-primary" id='btn-confirm-delete' data-loading-text="Encerrando...">Tenho Certeza</button>
          </div>
        </div>
      </div>
    </div>
	
	<div  id="cancelModal"  aria-hidden="false" aria-labelledby="cancelModalLabel" role="dialog" tabindex="-1" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id='modal-title-delete-chamado'>Cancelar Solicitação</h4>
          </div>
          <div class="modal-body" id="modal-body-delete-chamado">
            <p>IMPORTANTE: Ao cancelar você não poderá mais editar ou reativar</p>
            <p>Tem certeza disto?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            <button type="button" class="btn btn-primary" id='btn-confirm-cancel' data-loading-text="Encerrando...">Tenho Certeza</button>
          </div>
        </div>
      </div>
    </div>
	
	<div  id="retirarModal"  aria-hidden="false" aria-labelledby="retirarModalLabel" role="dialog" tabindex="-1" class="modal fade in">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id='modal-title-delete-chamado'>Retirar Solicitação</h4>
				</div>
				<div class="modal-body" id="modal-body-delete-chamado">
					<p>Para finalizar esta solicitação informe o código do usuário:</p>
					<input type="text" class="form-control" placeholder="Código" name="code" value="" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
					<button type="button" class="btn btn-primary" id='btn-confirm-retirar' data-loading-text="Salvando...">Salvar</button>
				</div>
			</div>
		</div>
    </div>