	<!-- scripts -->
    
    <!--<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?=site_url('theme/js/select2.min.js');?>"></script>
    <script src="<?=site_url('theme/js/bootstrap.min.js');?>"></script>
    <script src="<?=site_url('theme/js/jquery.base64.min.js');?>"></script>
    <script src="<?=site_url('theme/js/theme.js');?>"></script>
    <script src="<?=site_url('theme/js/jquery.maskMoney.js');?>"></script>

    <script src="<?=site_url('theme/js/function.js');?>"></script>
    


    <!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {
            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            $(".voltar").on('click',function(event){
                event.preventDefault();
                window.history.back();
                return false;
            });

            
            // acao para apagar registro
            var url_delete = '';
            
            $('.apagar').on('click', function(){
                
                url_delete = $(this).attr('href');
                $('#deleteModal').modal('show');
                $("#btn-confirm-delete").button('reset');
                
                return false;
            });
            
            
            $("#btn-confirm-delete").on('click', function(){
                $("#btn-confirm-delete").button('loading');
                
                window.location = url_delete;
                
                return false;
            });
            
            // acao para cancelar solicitacao
            var url_cancel = '';
            
            $('.cancelar').on('click', function(){
                
                url_delete = $(this).attr('href');
                $('#cancelModal').modal('show');
                $("#btn-confirm-cancel").button('reset');
                
                return false;
            });
            
            
            $("#btn-confirm-cancel").on('click', function(){
                $("#btn-confirm-cancel").button('loading');
                
                window.location = url_delete;
                
                return false;
            });
            
            // acao para retirar solicitacao
            var url_retirar = '';
            
            $('.retirado').on('click', function(){
                
                url_retirar = $(this).attr('href');
                $('#retirarModal').modal('show');
                $("#btn-confirm-retirar").button('reset');
                
                return false;
            });
            
            $("#btn-confirm-retirar").on('click', function(){
                
                if ($('input[name="code"]').val() == '') {
                    alert('Preencha o campo do código');
                    return false;
                }
                
                $("#btn-confirm-retirar").button('loading');
                
                window.location = url_retirar  + '/' + $('input[name="code"]').val();
                
                return false;
            });
            
        });
    </script>
</body>
</html>
