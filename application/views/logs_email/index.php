<!-- main container -->
<div class="content">
	<div id="pad-wrapper">
		
		<? if($this->session->userdata('mensagem')){

			$mensagem  = $this->session->userdata('mensagem');
			$class 		= 'alert alert-danger';
	
			$this->session->unset_userdata('mensagem');
	
			if($mensagem['retorno'] == 1){
				$class = 'alert alert-success';
			}
			
		?>
		
		<div class="<?=$class;?>">
			<p><?=$mensagem['mensagem'];?></p>
		</div>
	
		<? } ?>
		<!--    orders table -->
		<div class="table-wrapper orders-table section">
			<div class="row head">
				<div class="col-md-12">
					<h4>Log de Emails enviados &nbsp;</h4>
				</div>
			</div>

			<div class="row filter-block">
				&nbsp;
			</div>
			
			<? if($lista){ ?>
			<div class="row">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="col-md-1">
								ID
							</th>
							<th class="col-md-1">
								Tipo de usuário Logado
							</th>
							
							<th class="col-md-2">
								<span class="line"></span>
								Data de envio
							</th>					
							</th>
							<th class="col-md-1">
								<span class="line"></span>
								Ações
							</th>
						</tr>
					</thead>
					<tbody>
						<? foreach($lista as $row){ ?>
						<tr class="first">
							<td>
								<?=$row['id'];?>
							</td>
							<td>
								<?=$row['tipo_usuario'];?>
							</td>
							<td>
								<?=mysql_br_time($row['criado']);?>
							</td>							
						
							<td>							  
							   <a class="btn btn-xs btn-warning" href="<?=site_url($this->router->class.'/visualizar/'.$row['id'].'/'.$row['hash']);?>"><i class="icon-search"></i>&nbsp;Visualizar</a> &nbsp; 							  
							</td>
						</tr>
						<? } ?>
					</tbody>
				</table>
			</div>
			<? }else{ ?>
			<p> Nenhuma ponto, clique no botão para adicionar.</p>
			<? } ?>
		</div>
		
		<?=$paginacao;?>
		
		<!-- end orders table -->
	</div>
</div>
<!-- end main container -->
