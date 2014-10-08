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
							<input type="file" name="foto" placeholder="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Nome</label>
						<div class="col-md-10">
							<input type="text" name="nome" class="form-control" value="<?=set_value('nome', @$row['nome'], $this->input->post('nome')); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							<input type="text" name="email" class="form-control" value="<?=set_value('email', @$row['email'], $this->input->post('email')); ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="facebook" class="col-md-2 control-label">Facebook</label>
						<div class="col-md-10">
							<input type="text" name="facebook" class="form-control" value="<?=($_POST) ? $_POST['facebook'] : @$row['facebook']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="twitter" class="col-md-2 control-label">Twitter</label>
						<div class="col-md-10">
							<input type="text" name="twitter" class="form-control" value="<?=($_POST) ? $_POST['twitter'] : @$row['twitter']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Site</label>
						<div class="col-md-10">
							<input type="text" name="site" class="form-control" value="<?=($_POST) ? $_POST['site'] : @$row['site']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Descrição</label>
						<div class="col-md-10">
						  <textarea id="inputContent1" class="form-control" placeholder="Descrição completa da cidade" rows="5" name="descricao"><?=set_value('descricao', @$row['descricao'], $this->input->post('descricao')); ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="inputContent1" class="col-md-2 control-label">Endereço</label>
						
						 <div class="col-md-10 field-box">
	                        <label>Localizar no GoogleMaps:</label>
	                        <div class="address-fields complete-address">	
	                            <input type="text" class="form-control" id="autocomplete" name="endereco_completo" value="<?=set_value('endereco_completo', @$row['endereco_completo'], $this->input->post('endereco_completo')); ?>">
	                            <br /><br />
	                            
	                            <div class="row">
	                                <div class="col-lg-6 col-md-5 col-sm-6">
	                                    <label>Endereço</label>
	                                    <input name="logradouro" id="route" class="form-control " type="text" placeholder="Rua/Avenida" value="<?=set_value('logradouro', @$row['logradouro'], $this->input->post('logradouro')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Número:</label>
	                                    <input name="numero" id="street_number" class="form-control number" type="text" placeholder="Número" value="<?=set_value('numero', @$row['numero'], $this->input->post('numero')); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-3 col-sm-3">
	                                    <label>Complemento:</label>
	                                    <input name="complemento" id="complemento" class="form-control" type="text" placeholder="Complemento" value="<?=set_value('complemento', @$row['complemento'], @$_POST['complemento']); ?>" />
	                                </div>
	                            </div>
	                            
	                            <div class="row">
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>CEP:</label>
	                                    <input name="cep" id="postal_code" class="form-control" type="text" placeholder="CEP" value="<?=set_value('cep', @$row['cep'], $this->input->post('cep',FALSE)); ?>" />
	                                </div>
	                                <div class="col-lg-3 col-md-4 col-sm-3">
	                                    <label>Bairro</label>
	                                    <input name="bairro" id="bairro" class="form-control " type="text" placeholder="Bairro" value="<?=set_value('bairro', @$row['bairro'], $this->input->post('bairro')); ?>" />
	                                </div>
	                                <div class="col-lg-6 col-md-5 col-sm-6">
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

					<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=<?=GA_KEY?>"></script>

					
					<div class="form-group">
						<label for="inputName1" class="col-md-2 control-label">Horário de Funcionamento</label>
						<div class="col-md-8">
							
							<label for="hora_inicio_seg_sex">Segunda - Sexta</label><br>
							<select name="hora_inicio_seg_sex" class="select2" style='width: 20%'>
								<?
									$hora_inicio = (isset($row['hora_inicio_seg_sex'])) ? $row['hora_inicio_seg_sex'] : 0;
									$hora_inicio = ($_POST) ? $_POST['hora_inicio_seg_sex'] : $hora_inicio;
									
									format_select(horas(), $hora_inicio);
								?>
							</select>
							até
							<select name="hora_fim_seg_sex" class="select2" style='width: 20%'>
								<?
									$hora_fim = (isset($row['hora_fim_seg_sex'])) ? $row['hora_fim_seg_sex'] : 0;
									$hora_fim = ($_POST) ? $_POST['hora_fim_seg_sex'] : $hora_fim;
									
									format_select(horas(), $hora_fim);
								?>
							</select>
							<br><br>
							
							<label for="hora_inicio_sabado">Sábados</label><br>
							<select name="hora_inicio_sabado" class="select2" style='width: 20%'>
								<?
									$hora_inicio = (isset($row['hora_inicio_sabado'])) ? $row['hora_inicio_sabado'] : 0;
									$hora_inicio = ($_POST) ? $_POST['hora_inicio_sabado'] : $hora_inicio;
									
									format_select(horas(), $hora_inicio);
								?>
							</select>
							até
							<select name="hora_fim_sabado" class="select2" style='width: 20%'>
								<?
									$hora_fim = (isset($row['hora_fim_sabado'])) ? $row['hora_fim_sabado'] : 0;
									$hora_fim = ($_POST) ? $_POST['hora_fim_sabado'] : $hora_fim;
									
									format_select(horas(), $hora_fim);
								?>
							</select>
							<br><br>
							
							<label for="hora_inicio_domingo">Domingos</label><br>
							<select name="hora_inicio_domingo" class="select2" style='width: 20%'>
								<?
									$hora_inicio = (isset($row['hora_inicio_domingo'])) ? $row['hora_inicio_domingo'] : 0;
									$hora_inicio = ($_POST) ? $_POST['hora_inicio_domingo'] : $hora_inicio;
									
									format_select(horas(), $hora_inicio);
								?>
							</select>
							até
							<select name="hora_fim_domingo" class="select2" style='width: 20%'>
								<?
									$hora_fim = (isset($row['hora_fim_domingo'])) ? $row['hora_fim_domingo'] : 0;
									$hora_fim = ($_POST) ? $_POST['hora_fim_domingo'] : $hora_fim;
									
									format_select(horas(), $hora_fim);
								?>
							</select>
							<br><br>
							
							<label for="hora_inicio_feriado">Feriados</label><br>
							<select name="hora_inicio_feriado" class="select2" style='width: 20%'>
								<?
									$hora_inicio = (isset($row['hora_inicio_feriado'])) ? $row['hora_inicio_feriado'] : 0;
									$hora_inicio = ($_POST) ? $_POST['hora_inicio_feriado'] : $hora_inicio;
									
									format_select(horas(), $hora_inicio);
								?>
							</select>
							até
							<select name="hora_fim_feriado" class="select2" style='width: 20%'>
								<?
									$hora_fim = (isset($row['hora_fim_feriado'])) ? $row['hora_fim_feriado'] : 0;
									$hora_fim = ($_POST) ? $_POST['hora_fim_feriado'] : $hora_fim;
									
									format_select(horas(), $hora_fim);
								?>
							</select>
							
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
										<th width="150">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<? if(@$_POST['descricao_regra']){ foreach($_POST['descricao_regra'] as $k => $post){ ?>
										<tr>
											<td>
												<input name='descricao_regra[<?=$k?>]' type='hidden' value='<?=$post;?>'/>
												<span id="valor_span_<?=$k;?>"><?=$post;?></span>
											</td>
											<td>
												<input name='valor_regra[<?=$k?>]' type='hidden' value='<?=@$_POST['valor_regra'][$k];?>'/>
												<span id="valor_span_<?=$k;?>"><?=@$_POST['valor_regra'][$k];?></span>
											</td>
											<td>
												<input name='id_regra[<?=$k?>]' type='hidden' value='<?=@$_POST['id_regra'][$k];?>'/>
												<a href="javascript:" class="edit_regra2 btn btn-xs btn-info">Editar</a>&nbsp;&nbsp;
												<a href="javascript:" class="delete_regra btn btn-xs btn-danger">Deletar</a>
											</td>
										</tr>
									<? } } ?>
									
									<? if (!$_POST and isset($regras)){ $count = 1; foreach($regras as $regra){ ?>
										<tr>
											<td>
												<input name='descricao_regra[<?=$count?>]' type='hidden' value='<?=$regra['descricao'];?>'/>
												<span id="descricao_span_<?=$count;?>"><?=$regra['descricao'];?></span>
											</td>
											<td>
												<input name='valor_regra[<?=$count?>]' type='hidden' value='<?=money($regra['valor']);?>'/>
												<span id="valor_span_<?=$count;?>"><?=money($regra['valor']);?></span>
											</td>
											<td>
												<input name='id_regra[<?=$count?>]' type='hidden' value='<?=$count;?>'/>
												<a href='javascript:' class='edit_regra2 btn btn-xs btn-info'>Editar</a>
												<a href='javascript:' class='delete_regra btn btn-xs btn-danger'>Deletar</a>
											</td>
										</tr>
									<? ++$count; }} ?>
								</tbody>
							</table>
						</div>
					</div>
					<hr />
					<div class="row"><br />
						<h4>Preencha os campos abaixo para adicionar Regras</h4><br />
		
						<div class="form-group col-md-4">
							<label>Descrição:</label>
							<input id="descricao" name="descricao_form" class="form-control" type="text" placeholder="Descrição" value="" />
						</div>
						
						<div class="form-group col-md-4" style="margin-left:10px;">
							<label>Valor:</label>
							<input id="valor" name="valor" class="form-control dinheiro_real" type="text" placeholder="Valor" value="" style="width:100%;" />
						</div>
						<div class="form-group col-md-2" style="margin-top:20px;">
							<input id="add_regra" type="button" style="margin-left: 5px;" class="btn btn-primary btn-ls pull-right" value="Adicionar" />
							<input type="button" style='display:none; margin-left: 5px;' class="save_edit_regra btn btn-primary btn-ls pull-right" value="Editar" />
							<input type="button" style='display:none;' class="cancel_edit_regra btn btn-primary btn-ls pull-right" value="Cancelar" />
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-10">
							
						</div>
						
					</div>
					<hr />
					<div class="form-group">
						<div class="col-md-offset-10">
						  <button type="submit" class="btn btn-default"><?=($this->router->method == 'editar' || $this->router->method == 'index') ? 'Editar' : 'Cadastrar';?></button> &nbsp; <a href="#" class='voltar'>Voltar</a>
						</div>
					</div>
				</form>
			</div>
			<!-- side right column -->
			<div class="col-md-3 form-sidebar">
				<div class="alert alert-info">
					<i class="icon-lightbulb pull-left"></i>
					Preencha o horário de funcionamento do ponto!
				</div>                        
				<h6 id='label-endereco'>Endereço é obrigatório, e precisa ter o numero do ponto!</h6>
				<div class="alert alert-info">
					<i class="icon-lightbulb pull-left"></i>
					Salve os dados para efetivar as modificações de regras
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
