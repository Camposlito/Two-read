<div class=" config-conta">
  <span class="glyphicon glyphicon-cog rotate text-config-span" aria-hidden="true"></span>
  <span class="text-config">Configurações da Conta</span>
</div>
<div class="container">
  <div class="page-header">
    <h1>• &nbsp; <?php echo $_SESSION["nome_user"]; ?> &nbsp; • <span class="email-header">&nbsp; <?php echo $_SESSION["email"]; ?></span> </h1>
  </div>
  <br><br><br>
  <ul class="nav nav-pills nav-stacked config-new">
    <li role="presentation" onclick="appear(1)" class="pill active"><a href="#"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Minha Conta</a></li>
    <li role="presentation" onclick="appear(2)" class="pill"><a href="#"> <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>&nbsp; Alterar E-mail &nbsp; </a></li>
    <li role="presentation" onclick="appear(3)" class="pill"><a href="#"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; Alterar Senha</a></li>
  </ul>
<!-- formulário para editar nome -->
  <div class="main config-new nome">
    <span>Minha Conta</span>
    <form class="" action="save.php" method="post">
      <div class="row">
        <label for="nome" class="control-label">Nome</label>
        <input type="text" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      </div>
      <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
      <input type="hidden" name="senha" value="<?php echo $_SESSION["senha"]; ?>">
      <div class="row">
        <button type="submit">Salvar Alterações</button>
      </div>
    </form>
  </div>
<!-- formulário para editar email -->
  <div class="main config-new email">
    <span>Alterar E-mail</span>
    <form class="" action="save.php" method="post">
      <input type="hidden" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      <div class="row">
        <label for="email" class="control-label">E-mail</label>
        <input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>">
      </div>
      <div class="row">
        <label for="senha" class="control-label">Senha</label>
        <input type="password" name="senha" value="">
      </div>
      <div class="row">
        <button type="submit">Salvar Alterações</button>
      </div>
    </form>
  </div>
<!-- formulário para editar senha -->
  <div class="main config-new senha">
    <span>Alterar Senha</span>
    <form class="" action="save.php" method="post">
      <div class="row">
        <label for="nova-senha">Nova Senha</label>
        <input type="password" name="nova-senha" value="">
      </div>
      <div class="row">
        <label for="r-nova-senha">Repetir Senha</label>
        <input type="password" name="r-nova-senha" value="">
      </div>
      <div class="row">
        <label for="senha">Senha Atual</label>
        <input type="password" name="senha" value="">
      </div>
      <input type="hidden" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
      <div class="row">
        <button type="submit">Salvar Alterações</button>
      </div>
    </form>
  </div>

</div>
<div class="block-white">  </div>
<script>
$('li.pill').click(function(){
  if ($('li.pill').hasClass('active')) {
    $('li.pill').removeClass('active');
  }
  $(this).toggleClass('active');
});

function appear(resp){
  $('.main').hide();
  if (resp == 1) {
    $('div.nome').show();
  }
  if (resp == 2) {
    $('div.email').show();
  }
  if (resp == 3) {
    $('div.senha').show();
  }
}

function ini(){
  $('.main').hide();
  $('div.nome').show();
}

ini();
</script>
