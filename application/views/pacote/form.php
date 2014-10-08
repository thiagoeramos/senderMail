<!-- main container -->
<div class="content">
	<div id="pad-wrapper" class="new-user">
		<div class="row header">
			<div class="col-md-12">
				<h3><?=strtoupper($this->router->method);?> Pacote</h3>
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
				<form class="form-horizontal" method="post" role="form" >
					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nome</label>
						<div class="col-md-10">
							<input type="text" name="nome" class="form-control" value="<?=set_value('nome', @$row['nome'], $this->input->post('nome')); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Descrição</label>
						<div class="col-md-10">
							<textarea name="descricao" class="form-control"><?=set_value('descricao', @$row['descricao'], $this->input->post('descricao')); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						  <button type="submit" class="btn btn-default"><?=($this->router->method == 'editar') ? 'Editar' : 'Cadastrar';?></button> &nbsp; <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
				</form>
			</div>
			<!-- side right column -->
			<div class="col-md-3 form-sidebar">
				<div class="alert alert-info">
					<i class="icon-lightbulb pull-left"></i>
					Preencha todos os campos!
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end main container -->