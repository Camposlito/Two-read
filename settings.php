<div class=" config-conta">
  <span class="glyphicon glyphicon-cog rotate text-config-span" aria-hidden="true"></span>
  <span class="text-config">Configurações da Conta</span>
</div>
<div class="container">
  <div class="page-header">
    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; <?php echo $_SESSION["nome_user"]; ?> &nbsp; • &nbsp; <?php echo $_SESSION["email"]; ?></h1>
  </div>
  <br><br><br>
  <ul class="nav nav-pills nav-stacked config-new">
    <li role="presentation" class="pill active"><a href="#"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Minha Conta</a></li>
    <li role="presentation" class="pill"><a href="#"> <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>&nbsp; Alterar E-mail &nbsp; </a></li>
    <li role="presentation" class="pill"><a href="#"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp; Alterar Senha</a></li>
  </ul>

  <div class="main config-new">
    conteudo kkk nome
  </div>

  <div class="main config-new">
    conteudo kkk email
  </div>

  <div class="main config-new">
    conteudo kkk senha
  </div>

</div>
<script>
$('li.pill').click(function(){
  if ($('li.pill').hasClass('active')) {
    $('li.pill').removeClass('active');
  }
  $(this).toggleClass('active');
});
</script>
