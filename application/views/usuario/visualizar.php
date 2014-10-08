<!-- main container -->
<div class="content">
	<div id="pad-wrapper" class="new-user">
		<div class="row header">
			<div class="col-md-12">
				<div class="col-md-12">
				<? if($this->router->method ==  'index'){?>
				<h3>Dados</h3>
				<? }else{ ?>
				<h3><?=strtoupper($this->router->method);?> USUÁRIO</h3>
				<? } ?>
			</div>
			</div>                
		</div>
		
		<? if($erro){ ?>
		<div class="alert alert-danger">
			<?=$erro;?>
		</div>
		<? } ?>
		
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
				<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" >
					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nome:</label>
						<div class="col-md-10 viewText">
							<?=set_value('nome', @$row['nome'], $this->input->post('nome')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">E-mail:</label>
						<div class="col-md-10 viewText">
							<?=set_value('email', @$row['email'], $this->input->post('email')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">RG:</label>
						<div class="col-md-10 viewText">
							<?=set_value('rg', @$row['rg'], $this->input->post('rg')); ?>
						</div>
					</div>


					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">CPF:</label>
						<div class="col-md-10 viewText">
							<?=set_value('cpf', @$row['cpf'], $this->input->post('cpf')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nascimento:</label>
						<div class="col-md-10 viewText">
							<?=set_value('nascimento', @$row['nascimento'], $this->input->post('nascimento')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Telefone:</label>
						<div class="col-md-10 viewText">
							<?=set_value('telefone', @$row['telefone'], $this->input->post('telefone')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Celular:</label>
						<div class="col-md-10 viewText">
							<?=set_value('celular', @$row['celular'], $this->input->post('celular')); ?>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Endereço GoogleMaps:</label>

						 <div class="col-md-10 viewText field-box">
	                        <!--<label>Endereço no GoogleMaps:</label>-->
	                        <div class="address-fields complete-address">
	                            <?=set_value('endereco_completo', @$row['endereco_completo'], $this->input->post('endereco_completo')); ?>
	                            <br />

	                            <div class="row">
	                                <div class="col-lg-6 col-md-5 col-sm-6">
	                                    <label>Endereço</label>
	                                    <?=set_value('logradouro', @$row['logradouro'], $this->input->post('logradouro')); ?>
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Número:</label>
	                                    <?=set_value('numero', @$row['numero'], $this->input->post('numero')); ?>
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Complemento:</label>
	                                    <?=set_value('complemento', @$row['complemento'], $this->input->post('complemento')); ?>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>CEP:</label>
	                                    <?=set_value('cep', isset($row['cep'])?$row['cep']:$this->input->post('cep',FALSE),$this->input->post('cep',FALSE)); ?>
	                                </div>
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>Bairro</label>
	                                    <?=set_value('bairro', @$row['bairro'], $this->input->post('bairro')); ?>
	                                </div>
	                                <div class="col-lg-6 col-md-5 col-sm-6">
	                                    <label>Cidade:</label>
	                                    <?=set_value('cidade', @$row['cidade'], $this->input->post('cidade')); ?>
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Estado:</label>
										<?=set_value('estado', @$row['estado'], $this->input->post('estado')); ?>
	                                </div>
	                            </div>
	                            
	                        </div>
	                    </div>
                	</div>

					<hr />
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						  <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- end main container -->
