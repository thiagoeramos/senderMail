<!-- main container -->
<div class="content">
	<div id="pad-wrapper" class="new-user">
		<div class="row header">
			<div class="col-md-12">
				<? if($this->router->method ==  'index'){?>
				<h3>Dados</h3>
				<? }else{ ?>
				<h3><?=strtoupper($this->router->method);?> DADOS DO EMAIL</h3>
				<? } ?>
			</div>                
		</div>
	
		<? if($this->session->userdata('mensagem')){
			
			$mensagem  = $this->session->userdata('mensagem');
			$class 		= 'erro';
			
			$this->session->unset_userdata('mensagem');
			
			if($mensagem['retorno'] == 1){
				$class = 'alert alert-success';
			}
		?>
		
		<div class="<?=$class;?>">
			<p><?=$mensagem['mensagem'];?></p>
		</div>
	
		<? } ?>
		
		
		<div class="row form-wrapper">
			<!-- left column -->
			<div class="col-md-9 with-sidebar">
				<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

					
					<div class="form-group">
						  <?=$row['corpo']; ?>					
					</div>					
					
					<hr />			
				
					
					<div class="form-group">
						<div class="col-md-offset-10">
						<a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
					
				</form>
			</div>
				
			
		</div>
	</div>
</div>
<!-- end main container -->
