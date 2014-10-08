<!-- main container -->
<div class="content">
	<div id="pad-wrapper" class="new-user">
		<div class="row header">
			<div class="col-md-12">
				<h3><?=strtoupper($this->router->method);?> Solicitação</h3>
			</div>                
		</div>
		
		<? if($erro){ ?>
		<div class="alert alert-danger">
			<?=$erro;?>
		</div>
		<? } ?>
		
		<div class="row form-wrapper">
			<!-- left column -->
			<div class="col-md-9 with-sidebar">
				<form method="post" role="form" enctype="multipart/form-data">
					
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th class="col-md-1">
									<label for="usuario_id" class="control-label">Pedido</label>
								</th>
								
								<th class="col-md-4">
									<label for="usuario_id" class="control-label">Ponto</label>
								</th>
								
								<th class="col-md-4">
									<label for="usuario_id" class="control-label">Usuário</label>
								</th>
								
								<? if($this->router->method == 'visualizar'){ ?>
								<th class="col-md-1">
									<label for="usuario_id" class="control-label">Usuário</label>
								</th>
								
								<? if(in_array($this->session->userdata('user_type'), array('admin')) and $row['status_id'] != 4 && $row['status_id'] != 3){ ?>
								<th class="col-md-2">
									<label for="usuario_id" class="control-label">Alterar Status</label>
								</th>
								<? } } ?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=$row['num_solicitacao'];?></td>
								<td>
									<? if(in_array($this->session->userdata('user_type'),array('admin')) and $row['status_id'] != 4){ ?>
									<select name="ponto_id" class="select2"  >
										<?
											$ponto_id = (isset($row['ponto_id'])) ? $row['ponto_id'] : 0;
											format_select($pontos, $ponto_id,'Selecione','id','razao_social');
										?>
									</select>
									
									<? }else{
										$ponto_id = (isset($row['ponto_id'])) ? $row['ponto_id'] : 0;	
										format_select_text($pontos, $ponto_id,'','id','razao_social');
									} ?>
								</td>
								<td>
									<? if(in_array($this->session->userdata('user_type'),array('admin')) and $row['status_id'] != 4){ ?>
									<select name="usuario_id" class="select2"  >
										<? 
											$usuario_id = (isset($row['usuario_id'])) ? $row['usuario_id'] : 0;
											format_select($usuarios, $usuario_id,'Selecione','id','nome');
										?>
									</select>
									<? }else{
										$usuario_id = (isset($row['usuario_id'])) ? $row['usuario_id'] : 0;	
										format_select_text($usuarios, $usuario_id);
									} ?>
								</td>
								<? if($this->router->method == 'visualizar'){ ?>
								<td>
									<?=status_solicitacao($row['status_id']);?>
								</td>
								
								<? if(in_array($this->session->userdata('user_type'), array('admin')) and $row['status_id'] != 4 && $row['status_id'] != 3){ ?>
								<td>
									<select name="status_id" class="select2"  >
										<?
											$status_id = ($_POST) ? $_POST['status_id'] : 0;
											select_chenge_status(@$row['status_id'], $status_id, $this->session->userdata('user_type'));
										?>
									</select>
								</td>
								<? } } ?>
							</tr>
						</tbody>
					</table>
					
					<br /><br />
					
					<? if($this->router->method != 'visualizar' || $this->session->userdata('user_type')=='admin'){ ?>
					<div class="form-group">
						<div class="col-md-offset-10 col-md-4">
							<button type="submit" class="btn btn-success"><?=($this->router->method == 'visualizar') ? 'Editar' : 'Cadastrar';?></button> &nbsp; <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
					<? } ?>
				</form>
				<br />
			<hr />
			<div class="row">
				
				
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
		
					<h2>Comentários</h2>
					<form class="form-horizontal" method="post" action="<?=site_url('solicitacao/comentar/'.$row['id'].'/'.$row['hash']);?>" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="pacote_id" class="col-md-2 control-label">Insira o seu comentário</label>
							<div class="col-md-8">
								<textarea class="form-control" name="comentario" rows="4" ></textarea>								
							</div>
						</div>
						<br /><br />
						<div class="form-group">
							<div class="col-md-offset-9">
								<button type="submit" class="btn btn-info">Comentar</button> 
							</div>
						</div>
					</form>
					
					<ul class="media-list">
						<? if($row['comments']){ foreach($row['comments'] as $comment){ ?>
							<li class="media">
								<div class="media-body">
									<h4 class="media-heading">
									<?
										if($comment['admin_nome'] != NULL) echo  $comment['admin_nome'];
										if($comment['usuario_nome'] != NULL) echo $comment['usuario_nome'];
										if($comment['ponto_nome_fantasia'] != '') { echo $comment['ponto_nome_fantasia']; }else{ echo $comment['ponto_razao_social']; }
									?>
									comentou:
									</h4>
									<p>
										<blockquote>	
											<?=$comment['comentario'];?>
											<footer>Postado em <?=mysql_br_time($comment['criado']);?></footer>				 
										</blockquote>
									</p> 
								</div>						
							</li>	   
						<? } } ?>
					</ul>
				</div>
			</div>
			
			
			<script type="text/javascript">
				$(function () {
					$(ob).attr("selected","selected").select2()
				});
			</script>
		</div>
	</div>
</div>
<!-- end main container -->
