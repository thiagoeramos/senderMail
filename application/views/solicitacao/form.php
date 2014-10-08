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
				<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="usuario_id" class="col-md-2 control-label">Usuário</label>
						<div class="col-md-8">
							<select name="usuario_id" class="select2" style='width: 20%' <? if($this->router->method == 'visualizar'){ echo  'disabled="disabled"'; }?> >
								<?
									$usuario_id = (isset($row['usuario_id'])) ? $row['usuario_id'] : 0;
									$usuario_id = ($_POST) ? $_POST['usuario_id'] : $usuario_id;
									
									format_select($usuarios, $usuario_id);
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ponto_id" class="col-md-2 control-label">Ponto</label>
						<div class="col-md-8">
							<select name="ponto_id" class="select2" style='width: 20%' <? if($this->router->method == 'visualizar'){ echo  'disabled="disabled"'; }?> >
								<?
									$ponto_id = (isset($row['ponto_id'])) ? $row['ponto_id'] : 0;
									$ponto_id = ($_POST) ? $_POST['ponto_id'] : $ponto_id;
									
									format_select($pontos, $ponto_id);
								?>
							</select>
						</div>
					</div>
					
					<? if($this->router->method == 'visualizar'){ ?>
					
					<div class="form-group">
						<label for="pacote_id" class="col-md-2 control-label">Status</label>
						<div class="col-md-8">
							<p><?=status_solicitacao($row['status_id']);?></p>
						</div>
					</div>
					
					<div class="form-group">
						<label for="status_id" class="col-md-2 control-label">Alterar Status</label>
						<div class="col-md-8">
							<select name="status_id" class="select2" style='width: 20%' >
								<?
									$status_id = ($_POST) ? $_POST['status_id'] : 0;
									select_chenge_status($row['status_id'], $status_id, $this->session->userdata('user_type'));
								?>
							</select>
						</div>
					</div>
					<? } ?>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<button type="submit" class="btn btn-default"><?=($this->router->method == 'editar') ? 'Editar' : ($this->router->method == 'visualizar') ? 'Salvar': 'Cadastrar';?></button> &nbsp; <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
				</form>
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