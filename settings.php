<div class=" config-conta">
  <span class="glyphicon glyphicon-cog rotate text-config-span" aria-hidden="true"></span>
  <span class="text-config">Configurações da Conta</span>
</div>
<div class="container">
  <div class="page-header">
    <h1>• &nbsp; <?php echo $_SESSION["nome_user"]; ?> &nbsp; • <span class="email-header">&nbsp; <?php echo $_SESSION["email"]; ?></span> </h1>
  </div>
  <!-- ERRO DE CREDENCIAL SENHA -->
  <?php if($_GET["erro"] == "senha"): ?>
  <div class="erro-config">
    <div class="alert alert-danger erro" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
      <span class="sr-only">Erro:</span>
      &nbsp; Senha incorreta
    </div>
  </div>
  <?php endif; ?>
  <!-- ERRO DE CREDENCIAL EMAIL -->
  <?php if($_GET["erro"] == "email"): ?>
  <div class="erro-config">
    <div class="alert alert-danger erro" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
      <span class="sr-only">Erro:</span>
      &nbsp; E-mail já cadastrado
    </div>
  </div>
  <?php endif; ?>
  <br>
  <ul class="nav nav-pills nav-stacked config-new">
    <li role="presentation" onclick="appear(1)" class="pill active"><a href="#"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Minha Conta</a></li>
    <li role="presentation" onclick="appear(2)" class="pill"><a href="#"> <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>&nbsp; Alterar E-mail &nbsp; </a></li>
    <li role="presentation" onclick="appear(3)" class="pill"><a href="#"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; Alterar Senha</a></li>
  </ul>

<!-- formulário para editar nome -->
  <div class="main config-new nome">
    <div class="row">
      <span>Minha Conta</span>
    </div>
    <form class="" action="save.php" method="post">
      <div class="row">
        <input type="text" placeholder="Nome" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      </div>
      <input type="hidden" name="nova-senha" value="<?php echo $_SESSION["senha"]; ?>">
      <input type="hidden" name="r-nova-senha" value="<?php echo $_SESSION["senha"]; ?>">
      <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
      <input type="hidden" name="senha" value="<?php echo $_SESSION["senha"]; ?>">
      <div class="row">
        <button class="btn-salvar-alt btn-success" type="submit">Salvar Alterações</button>
      </div>
    </form>
  </div>
<!-- formulário para editar email -->
  <div class="main config-new email">
    <div class="row">
      <span>Alterar E-mail</span>
    </div>
    <form class="" action="save.php" method="post">
      <input type="hidden" name="nova-senha" value="<?php echo $_SESSION["senha"]; ?>">
      <input type="hidden" name="r-nova-senha" value="<?php echo $_SESSION["senha"]; ?>">
      <input type="hidden" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      <div class="row">
        <input type="text" placeholder="E-mail" name="email" value="<?php echo $_SESSION["email"]; ?>">
      </div>
      <div class="row">
        <input type="password" placeholder="Senha" name="senha" value="">
      </div>
      <div class="row">
        <button class="btn-salvar-alt btn-success" type="submit">Salvar Alterações</button>
      </div>
    </form>
  </div>
<!-- formulário para editar senha -->
  <div class="main config-new senha">
    <div class="row">
      <span>Alterar Senha</span>
    </div>
    <form class="" action="save.php" method="post">
      <div class="row">
        <input type="password" placeholder="Nova Senha" name="nova-senha" value="">
      </div>
      <div class="row">
        <input type="password" placeholder="Repetir Senha" name="r-nova-senha" value="">
      </div>
      <div class="row">
        <input type="password" placeholder="Senha Atual" name="senha" value="">
      </div>
      <input type="hidden" name="nome" value="<?php echo $_SESSION["nome_user"]; ?>">
      <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
      <div class="row">
        <button class="btn-salvar-alt btn-success" type="submit">Salvar Alterações</button>
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
