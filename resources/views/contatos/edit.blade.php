<form class="form-horizontal mt20" action="{{ route('contato.update') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name='id_pessoa' value="{{$contato->id_pessoa}}" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contato</h4>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label class='col-md-2 control-label'>Descrição</label>
                    <div class='col-md-10'>
                        <input required class='form-control' name='descricao' />
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-lg-2 control-label'>Tipo</label>
                    <div class='col-lg-10'>
                        <select class='form-control' name='tipo'>
                            <option value="" hidden>Selecione..</option>
                            <option value="Whatsapp">Whatsapp</option>
                            <option value="Telefone">Telefone</option>
                            <option value="Email">Email</option>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-md-2 control-label'>Telefone</label>
                    <div class='col-md-10'>
                        <input type="tel" class='form-control telefone' name='valor' />
                    </div>
                </div>
                <!-- <div class='form-group' ng-if="ctrl.contato.tipo == 'Email'">
						<label class='col-md-2 control-label'>Email</label>
						<div class='col-md-10'>
							<input class='form-control' type='email' name='valor' />
						</div>
					</div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</form>