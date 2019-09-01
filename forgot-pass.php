<div class="container">
  <div class="row forgot-title">
    Esqueceu a senha?
  </div>
  <div class="row forgot-txt">
    Não se preocupe! Informe seu email de cadastro, o mesmo utilizado para acesso ao site, que lhe enviaremos as instruções para a troca da senha por email.
  </div>
  <form action="send-email.php" method="post">
    <div class="input-group row">
      <span class="input-group-addon" id="basic-addon1"> <b><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></b> </span>
      <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">
    </div>
    <div class="row">
      <input type="submit" class="btn-enviar-email btn-success" name="enviar" value="Enviar">
    </div>
  </form>
  <!-- ERRO DE CREDENCIAL EMAIL -->
  <?php if($_GET["erro"] == "email"): ?>
  <div class="erro-forgot-pass">
    <div class="alert alert-danger erro" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
      <span class="sr-only">Erro:</span>
      &nbsp; E-mail inválido
    </div>
  </div>
  <?php endif; ?>
</div>
