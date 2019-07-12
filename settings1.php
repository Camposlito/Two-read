<div class="container">
  <div class="page-header">
    <h1><span class="glyphicon glyphicon-cog rotate" aria-hidden="true"></span> Configurações da Conta</h1>
  </div>
  <br><br><br>
  <form action="save.php" method="post">
    <div class="config form-group">
      <div class="row divider">
        <div class="col-sm-2">
          <label class="control-label" for="nome"><h4 id="n*"> Nome: </h4></label>
        </div>
        <div class="col-sm-4">
          <h4> <input class="input-config" type="text" disabled name="nome" id="nome" value="<?php echo $_SESSION["nome_user"]; ?>" size="40"> </h4>
        </div>
        <div class="col-sm-2">
          <h4> <button type="button" name="button" onclick="edit(nome)" class="input-config grow"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></h4>
        </div>
      </div>
      <div class="row divider">
        <div class="col-sm-2">
          <label class="control-label" for="nome"><h4 id="e*"> E-mail: </h4></label>
        </div>
        <div class="col-sm-4">
          <h4> <input class="input-config" type="email" disabled name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" size="40"> </h4>
        </div>
        <div class="col-sm-2">
          <h4> <button type="button" name="button" onclick="edit(email)" class="input-config grow"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></h4>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">
          <label class="control-label" for="senha"><h4 id="s*"> Senha: </h4></label>
        </div>
        <div class="col-sm-1">
          <span class="glyphicon glyphicon-eye-open grow" id="olho-config" aria-hidden="true"></span>
        </div>
        <div class="col-sm-4">
          <h4> <input class="input-config" type="password" disabled name="senha" id="senha" value="<?php echo $_SESSION["senha"]; ?>" size="40"> </h4>
        </div>
        <div class="col-sm-2">
          <h4> <button type="button" name="button" onclick="edit(senha)" class="input-config grow"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></h4>
        </div>
      </div>
    </div>
    <!-- ERRO DE CREDENCIAL -->
    <?php if($_GET["erro"] == "email"): ?>
    <div class="container">
      <div class="alert alert-danger erro" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
        <span class="sr-only">Erro:</span>
        Endereço de email já cadastrado
      </div>
    </div>
    <?php endif; ?>
    <br><br><br>
    <div class="row text-center" id="save">
      <button type="submit" class="btn-gt" onclick="rewrite()"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>  Salvar</button>
    </div>
  </form>
</div>
<script>
function edit(type){
  if (type == nome) {
    var config = document.getElementById("nome");
    document.getElementById("n*").innerHTML = "Nome*";
  }
  if (type == email) {
    var config = document.getElementById("email");
    document.getElementById("e*").innerHTML = "E-mail*";
  }
  if (type == senha) {
    var config = document.getElementById("senha");
    document.getElementById("s*").innerHTML = "Senha*";
  }
  var id = "#";
  id += config.id;
  config.value = "";
  config.placeholder = "Digite aqui..."
  $(id).removeAttr('disabled');
  $('#save').show();
}
function rewrite(){
  $('#nome').removeAttr('disabled');
  $('#email').removeAttr('disabled');
  $('#senha').removeAttr('disabled');
}
$('#save').hide();

$( "#olho-config" ).mousedown(function() {
  $("#senha").attr("type", "text");
});

$( "#olho-config" ).mouseup(function() {
  $("#senha").attr("type", "password");
});

$( "#olho-config" ).mouseout(function() {
  $("#senha").attr("type", "password");
});
</script>
