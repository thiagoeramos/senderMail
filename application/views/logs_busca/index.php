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
					<h4>Log de buscas</h4>
				</div>
			</div>
			
			<div class="row filter-block">
			
			</div>
			
		
			<div class="row" id="chart_logs" >
				<div class="row">
						<div id="map_canvas" style="height:100%;"></div>
					</div>
			</div>			
		</div>

		
		<!-- end orders table -->
	</div>
</div>
<!-- end main container -->
