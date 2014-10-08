<!-- main container -->
<div class="content">
	<div id="pad-wrapper" class="new-user">
		<div class="row header">
			<div class="col-md-12">
				<? if($this->router->method ==  'index'){?>
				<h3>Dados</h3>
				<? }else{ ?>
				<h3><?=strtoupper($this->router->method);?> PONTO</h3>
				<? } ?>
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
				<form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Foto</label>
						<div class="col-md-10">
							<? if(isset($row['foto']) && strlen($row['foto'])>4){
								echo "<a target='_blank' href='".site_url('assets/uploads/ponto/'.$row['foto'])."'>".$row['foto']."</a><br>";
							}?>
							
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nome</label>
						<div class="col-md-10">
							<?=set_value('nome', @$row['nome'], $this->input->post('nome')); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							<?=set_value('email', @$row['email'], $this->input->post('email')); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="facebook" class="col-md-2 control-label">Facebook</label>
						<div class="col-md-10">
							<?=($_POST) ? $_POST['facebook'] : @$row['facebook']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="twitter" class="col-md-2 control-label">Twitter</label>
						<div class="col-md-10">
							<?=($_POST) ? $_POST['twitter'] : @$row['twitter']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Site</label>
						<div class="col-md-10">
							<?=($_POST) ? $_POST['site'] : @$row['site']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Descrição</label>
						<div class="col-md-10">
						  <?=set_value('descricao', @$row['descricao'], $this->input->post('descricao')); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Endereço</label>
						
						 <div class="col-md-10 field-box">
	                        <label>Endereço no GoogleMaps:</label>
	                        <div class="address-fields complete-address">	
	                            <?=set_value('endereco_completo', @$row['endereco_completo'], $this->input->post('endereco_completo')); ?>
	                            <br /><br />
	                            
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

					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Horário de Funcionamento</label>
						<div class="col-md-8">
							
							<label for="hora_inicio_seg_sex">Segunda - Sexta</label><br>

								<?
									$hora_inicio = (isset($row['hora_inicio_seg_sex'])) ? $row['hora_inicio_seg_sex'] : 0;

									echo $hora_inicio;
								?>
							
							até

								<?
									$hora_fim = (isset($row['hora_fim_seg_sex'])) ? $row['hora_fim_seg_sex'] : 0;
									
									echo $hora_fim;
								?>
							
							<br><br>
							
							<label for="hora_inicio_sabado">Sábados</label><br>
								<?
									$hora_inicio = (isset($row['hora_inicio_sabado'])) ? $row['hora_inicio_sabado'] : 0;

									echo $hora_inicio;
								?>

							até

								<?
									$hora_fim = (isset($row['hora_fim_sabado'])) ? $row['hora_fim_sabado'] : 0;

									echo $hora_fim;
								?>

							<br><br>
							
							<label for="hora_inicio_domingo">Domingos</label><br>

								<?
									$hora_inicio = (isset($row['hora_inicio_domingo'])) ? $row['hora_inicio_domingo'] : 0;

									echo $hora_inicio;
								?>

							até

								<?
									$hora_fim = (isset($row['hora_fim_domingo'])) ? $row['hora_fim_domingo'] : 0;

									echo $hora_fim;
								?>

							<br><br>
							
							<label for="hora_inicio_feriado">Feriados</label><br>

								<?
									$hora_inicio = (isset($row['hora_inicio_feriado'])) ? $row['hora_inicio_feriado'] : 0;

									echo $hora_inicio;
								?>
							</select>
							até
							
								<?
									$hora_fim = (isset($row['hora_fim_feriado'])) ? $row['hora_fim_feriado'] : 0;

									echo $hora_fim;
								?>

							
						</div>
					</div>
					
					<hr />
					<div class="row">
						<div class="col-md-10 col-md-offset-2">
							<table class='table table-bordered table-striped' id='table_regra' style="background: #fff;">
								<thead>
									<tr>
										<th>Descrição</th>
										<th>Valor</th>
									</tr>
								</thead>
								<tbody>
									<? if (isset($regras) and $regras != false){ foreach($regras as $regra){ ?>
										<tr>
											<td>
												<span><?=$regra['descricao'];?></span>
											</td>
											<td>
												<span"><?=money($regra['valor']);?></span>
											</td>
										</tr>
									<? }} ?>
								</tbody>
							</table>
						</div>
					</div>
					
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
