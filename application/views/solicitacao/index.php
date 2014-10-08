<!-- main container -->
<div class="content">

	<!-- upper main stats -->
	<div id="main-stats">

		<div class="row stats-row">

			<div class="col-md-5 col-sm-4 stat">
				<div class="data">
					<span class="number"><?=$pacotes_pendentes;?></span>
					Pacotes Pendentes
				</div>
			</div>

			<div class="col-md-5 col-sm-3 stat last">
				<div class="data">
					<span class="number"><?=$pacotes_7dias;?></span>
					Total de Pacotes nos últimos 7 dias
				</div>

			</div>
		</div>
	</div>

	
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
					<h4>Solicitação &nbsp;
					<?
					if($this->session->userdata('user_type')=='admin'){
					?><a href="<?=site_url($this->router->class.'/adicionar');?>" class='btn btn-success'>Adicionar</a>
					<? } ?>
					</h4>
				</div>

				
			</div>

			<div class="row filter-block">
				&nbsp;
			</div>
			

			<div class="row">
				<table class="table table-hover table-striped">
					<thead>
					<tr>	
					<th class="col-md-1">
							<a href="<?=site_url($url."/".$busca."/id/".$ordered['order']);?>">
								ID
								<span class="grid20 pull-right  <?=($ordered['key']=='id')?(($ordered['order']=='desc')?'seta-cima':'seta-baixo'):'';?>" />&nbsp;</span>
							</a>
					</th>
					<th class="col-md-3">
							<a href="<?=site_url($url."/".$busca."/ponto/".$ordered['order']);?>">
								Ponto
								<span class="grid20 pull-right <?=($ordered['key']=='ponto')?(($ordered['order']=='desc')?'seta-cima':'seta-baixo'):'';?>" />&nbsp;</span>
							</a>
					</th>
					
					<th class="col-md-1">
						<a href="<?=site_url($url."/".$busca."/status/".$ordered['order']);?>">
							Status
							<span class="grid20 pull-right <?=($ordered['key']=='status')?(($ordered['order']=='desc')?'seta-cima':'seta-baixo'):'';?>" />&nbsp;</span>
							</a>
					</th>
					<th class="col-md-4">Ações</th>
					</tr>
					</thead>
				
					<tbody>
						<form method="post" id="frmBusca" action="<?=site_url($url);?>">
						<tr>
							<td><input type="text" name="id" value="<?=@$search['id'];?>" placeholder="ID" class="form-control" /></td>
							<td><input type="text" name="ponto" value="<?=@$search['ponto'];?>" placeholder="Filtrar por Ponto" class="form-control" /></td>
							<td>
								<select name="status" class="form-control" id="onChange">
									<option value="">Filtrar por Status</option>
									<?=select_status(@$search['status']);?>
								</select>
							</td>
							
							<td>
								<input type="submit" name="btSubmit" value="Filtrar" class="btn btn-primary" id="buscar" />
								<input type="button" name="btClear" value="Limpar" class="btn btn-info" id="limpa_busca" />
							</td>
						</tr>
						<? if($lista){ ?>
						<? foreach($lista as $row){ ?>
						<tr class="first">
							<td>
								<?=$row['id'];?>
							</td>
							<td>
								<?
								if(in_array($this->session->userdata('user_type'),array('usuario','admin'))){ ?>
								<a href="<?=site_url('ponto/visualizar/'.$row['ponto_id']."/".$row['ponto_hash']);?>"><?=$row['ponto_nome'];?></a>
								<? } else{?>
								<?=$row['ponto_nome'];?>
								<? } ?>
							</td>
							<td>
								<?=status_solicitacao($row['status_id']);?>
							</td>
							<td>
								<a class="btn btn-xs btn-warning" href="<?=site_url($this->router->class.'/visualizar/'.$row['id'].'/'.$row['hash']);?>"><i class="icon-edit"></i>&nbsp;Contato</a> &nbsp;
							   
								<? if(in_array($this->session->userdata('user_type'),array('ponto')) && $row['status_id']!=3){ ?>
								<a class="btn btn-xs btn-info retirado" href="<?=site_url($this->router->class.'/retirado/'.$row['id'].'/'.$row['hash']);?>"><i class='icon-check'></i>&nbsp;Retirado&nbsp;</a>
								<? } ?>
								
								<? if(in_array($this->session->userdata('user_type'),array('usuario', 'admin'))){ ?>
								<a class="btn btn-xs btn-danger cancelar" href="<?=site_url($this->router->class.'/cancelar/'.$row['id'].'/'.$row['hash']);?>"><i class='icon-remove-circle'></i>&nbsp;Cancelar</a>
								<? } ?>
							</td>
						</tr>
						<? } ?>
						<? }else{ ?>
						<tr class="first">
							<td colspan="6"><p> Nenhum pedido encontrado, clique no botão para adicionar.</p></td>
						</tr>
						<? } ?>
					</tbody>
				</table>
			</div>

		</div>
		
		<?=$paginacao;?>
		
		<!-- end orders table -->
	</div>
</div>
<!-- end main container -->
