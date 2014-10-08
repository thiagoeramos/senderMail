<!-- main container -->
<div class="content">
	<div id="pad-wrapper">
		
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
		<!--    orders table -->
		<div class="table-wrapper orders-table section">
			<div class="row head">
				<div class="col-md-12">
					<h4>Solicitação &nbsp; <a href="<?=site_url($this->router->class.'/adicionar');?>" class='btn btn-success'>Adicionar</a></h4>
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
							<th class="col-md-3">
								<span class="line"></span>
								Usuário
							</th>
							<th class="col-md-3">
								<span class="line"></span>
								Ponto
							</th>
							<th class="col-md-2">
								<span class="line"></span>
								Tipo de Pacote
							</th>
							<th class="col-md-1">
								<span class="line"></span>
								Status
							</th>
							<th class="col-md-2">
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
								<?=$row['usuario_nome'];?>
							</td>
							
							<td>
								<?=$row['ponto_nome'];?>
							</td>
							<td>
								<?=$row['pacote_nome'];?>
							</td>
							<td>
								<?=status_solicitacao($row['status_id']);?>
							</td>
							<td>
							   <a href="<?=site_url($this->router->class.'/visualizar/'.$row['id'].'/'.$row['hash']);?>"><i class="icon-edit"></i>Visualizar</a> &nbsp; 
							   <a class="apagar" href="<?=site_url($this->router->class.'/apagar/'.$row['id'].'/'.$row['hash']);?>"><i class='icon-remove-circle'></i> Deletar</a>
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