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
						<label for="inputName1" class="col-md-2 control-label">Nome</label>
						<div class="col-md-10">
							<input type="text" name="nome" class="form-control" value="<?=set_value('nome', @$row['nome'], $this->input->post('nome')); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							<input type="text" name="email" class="form-control" value="<?=set_value('email', @$row['email'], $this->input->post('email')); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">RG</label>
						<div class="col-md-10">
							<input type="text" name="rg" class="form-control" value="<?=set_value('rg', @$row['rg'], $this->input->post('rg')); ?>">
						</div>
					</div>


					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">CPF</label>
						<div class="col-md-10">
							<input type="text" name="cpf" class="form-control" value="<?=set_value('cpf', @$row['cpf'], $this->input->post('cpf')); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nascimento</label>
						<div class="col-md-10">
							<input type="text" name="nascimento" class="form-control" value="<?=set_value('nascimento', @$row['nascimento'], $this->input->post('nascimento')); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Telefone</label>
						<div class="col-md-10">
							<input type="text" name="telefone" class="form-control" value="<?=set_value('telefone', @$row['telefone'], $this->input->post('telefone')); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Celular</label>
						<div class="col-md-10">
							<input type="text" name="celular" class="form-control" value="<?=set_value('celular', @$row['celular'], $this->input->post('celular')); ?>">
						</div>
					</div>
					
					<hr />

					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Endereço GoogleMaps:</label>

						 <div class="col-md-10 field-box">
	                        <!--<label>Endereço no GoogleMaps:</label>-->
	                        <div class="address-fields complete-address">
	                            <input type="text" class="form-control" id="autocomplete" name="endereco_completo" value="<?=set_value('endereco_completo', @$row['endereco_completo'], $this->input->post('endereco_completo')); ?>">
	                            <br /><br />

	                            <div class="row">
	                                <div class="col-lg-6 col-md-5 col-sm-6">
	                                    <label>Endereço:</label>
	                                    <input name="logradouro" id="route" class="form-control " type="text" placeholder="Rua/Avenida" value="<?=set_value('logradouro', @$row['logradouro'], $this->input->post('logradouro')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Número:</label>
	                                    <input name="numero" id="street_number" class="form-control number" type="text" placeholder="Número" value="<?=set_value('numero', @$row['numero'], $this->input->post('numero')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Complemento:</label>
	                                    <input name="complemento" id="complemento" class="form-control" type="text" placeholder="Complemento" value="<?=set_value('complemento', @$row['complemento'], $this->input->post('complemento')); ?>" />
	                                </div>
	                            </div>
								<br />

	                            <div class="row">
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>CEP:</label>
	                                    <input name="cep" id="postal_code" class="form-control" type="text" placeholder="CEP" value="<?=set_value('cep', isset($row['cep'])?$row['cep']:$this->input->post('cep',FALSE),$this->input->post('cep',FALSE)); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>Bairro</label>
	                                    <input name="bairro" id="bairro" class="form-control " type="text" placeholder="Bairro" value="<?=set_value('bairro', @$row['bairro'], $this->input->post('bairro')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-5 col-sm-6">
	                                    <label>Cidade:</label>
	                                    <input name="cidade" id="locality" class="form-control" type="text" placeholder="Cidade" value="<?=set_value('cidade', @$row['cidade'], $this->input->post('cidade')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Estado:</label>
	                                    <input name="estado" id="administrative_area_level_1" class="form-control" type="text" placeholder="Estado"  value="<?=set_value('estado', @$row['estado'], $this->input->post('estado')); ?>" />
	                                </div>
	                            </div>
	                            <div class="row" style="display: none;">
	                                <div class="col-lg-6 col-md-6 col-sm-6">
	                                    <label>Latitude:</label>
	                                    <input id="latitude" name="latitude"  class="form-control" type="text" value="<?=set_value('latitude', @$row['latitude'], $this->input->post('latitude')); ?>" />
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-sm-6">
	                                    <label>Longitude:</label>
	                                    <input id="longitude" name="longitude" class="form-control" type="text" value="<?=set_value('longitude', @$row['longitude'], $this->input->post('longitude')); ?>" />
	                                    <input type="hidden" name="serializado" id="serializado" value="<?=set_value('serializado', @$row['serializado'], $this->input->post('serializado')); ?>" />
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                	</div>
					
					<hr />

					<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=<?=GA_KEY?>"></script>


					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nova Senha</label>
						<div class="col-md-4">
							<input type="text" name="password" class="form-control" value="<?=set_value('password', '', $this->input->post('password')); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Confirmar Nova Senha</label>
						<div class="col-md-4">
							<input type="text" name="confirm_password" class="form-control" value="<?=set_value('confirm_password', '', $this->input->post('confirm_password')); ?>">
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						  <button type="submit" class="btn btn-default"><?=($this->router->method == 'editar' || $this->router->method == 'index') ? 'Editar' : 'Cadastrar';?></button> &nbsp; <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
				</form>
			</div>
			<!-- side right column -->
			<div class="col-md-3 form-sidebar">
				<div class="alert alert-info">
					<i class="icon-lightbulb pull-left"></i>
					Ao resetar senha o usuário poderá não logar!
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end main container -->
