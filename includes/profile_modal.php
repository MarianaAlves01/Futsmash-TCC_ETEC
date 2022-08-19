<!-- Histórico de transação-->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Detalhes da transação</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Data: <span id="date"></span>
                <span class="pull-right">Transação: <span id="transid"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  <th>Produto</th>
                  <th>Preço</th>
                  <th>Tamanho</th>
                  <th>Quantidade</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="4" text-align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>






<!-- Editar perfil -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Atualizar conta</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                
              <!--Campo do nome-->
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Primero Nome</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>

                <!--Campo do sobrenome-->
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Sobrenome</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>

                <!--Campo do email-->
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>

                <!--Campo da senha-->
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Senha</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>

                <!--Campo do número de contato-->
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contato</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
                    </div>
                </div>

                <!--Campo da cidade-->
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">Cidade</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>" placeholder="Ex.: Itamaracá">
                    </div>
                </div>

                <!--Campo do bairro-->
                <div class="form-group">
                    <label for="district" class="col-sm-3 control-label">Bairro</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="district" name="district" value="<?php echo $user['district']; ?>" placeholder="Ex.: Eldourado">
                    </div>
                </div>

                <!--Campo do CEP -->
                <div class="form-group">
                    <label for="cep" class="col-sm-3 control-label">CEP</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $user['cep']; ?>" placeholder="Ex.: 12570-000">
                    </div>
                </div>

                <!--Campo do endereço-->
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Endereço</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>" placeholder="Ex.: Rua dos Bobos, 0">
                    </div>
                </div>

                <!--Campo do Estado/UF-->
                <div class="form-group">
                    <label for="uf" class="col-sm-3 control-label">Uf</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="uf" name="uf" value="<?php echo $user['uf']; ?>" placeholder="Ex.: PE">
                    </div>
                </div>

                <!--Campo da foto
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Foto de perfil</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>-->
                <hr>
                
                <!--Campo da senha atual (para salvar as alterações)-->
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Senha atual</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Isira sua senha para salvar as atualizações" required>
                    </div>
                </div>
            </div>

            <!--Botões para sair e salvar-->
            <div class="modal-footer">
              <button type="button" style="color: white;" class="btn pull-left noo" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
              <button type="submit" style="color: white;" class="btn noo" name="edit"><i class="fa fa-check-square-o"></i> Atualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>