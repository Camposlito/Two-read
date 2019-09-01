<?php
$_SESSION['status'] = false;
 ?>
 <style>
 body{font-family: color:#666; font-size:14px; color:#333}
 li,ul,body,input{margin:0; padding:0; list-style:none}
 #login-form{width:350px; background:#FFF; margin:0 auto; margin-top:70px; background:#f8f8f8; overflow:hidden; border-radius:7px}
 .form-header{display:table; clear:both}
 .form-header label{display:block; cursor:pointer; z-index:999}
 .form-header li{margin:0; line-height:60px; width:175px; text-align:center; background:#eee; font-size:18px; float:left; transition:all 600ms ease}

 /*sectiop*/
 .section-out{width:700px; float:left; transition:all 600ms ease}
 .section-out:after{content:''; clear:both; display:table}
 .section-out section{width:350px; float:left}

 .login{padding:20px}
 .ul-list{clear:both; display:table; width:100%}
 .ul-list:after{content:''; clear:both; display:table}
 .ul-list li{ margin:0 auto; margin-bottom:12px}
 .input{background:#fff; transition:all 800ms; width:247px; border-radius:3px 0 0 3px; font-family: 'Ropa Sans', sans-serif; border:solid 1px #ccc; border-right:none; outline:none; color:#999; height:40px; line-height:40px; display:inline-block; padding-left:10px; font-size:16px}
 .input,.login span.icon{vertical-align:top}
 .login span.icon{width:50px; transition:all 800ms; text-align:center; color:#999; height:40px; border-radius:0 3px 3px 0; background:#e8e8e8; height:40px; line-height:40px; display:inline-block; border:solid 1px #ccc; border-left:none; font-size:16px}
 .input:focus:invalid{border-color:red}
 .input:focus:invalid+.icon{border-color:red}
 .input:focus:valid{border-color:green}
 .input:focus:valid+.icon{border-color:green}
 #check,#check1{top:1px; position:relative}
 .btn{transition: .2s; border:none; outline:none; background:#0099CC; border-bottom:solid 4px #006699; font-family: 'Ropa Sans', sans-serif; margin:0 auto; display:block; height:40px; width:100%; padding:0 10px; border-radius:3px; font-size:16px; color:white}
 .btn:hover{background:#00cc99; border-bottom:solid 4px #008060; color:white}

 .social-login{padding:15px 20px; background:#f1f1f1; border-top:solid 2px #e8e8e8; text-align:right}
 .social-login a{display:inline-block; height:35px; text-align:center; line-height:35px; width:35px; margin:0 3px; text-decoration:none; color:#FFFFFF}
 .form a i.fa{line-height:35px}
 .fb{background:#305891} .tw{background:#2ca8d2} .gp{background:#ce4d39} .in{background:#006699}
 .remember{width:50%; display:inline-block; clear:both; font-size:14px}
 .remember:nth-child(2){text-align:right}
 .remember a{text-decoration:none; color:#666}

 .hide{display:none}

 /*swich form*/
 #signup:checked~.section-out{margin-left:-350px}
 #login:checked~.section-out{margin-left:0px}
 #login:checked~div .form-header li:nth-child(1),#signup:checked~div .form-header li:nth-child(2){background:#e8e8e8}
 #logo{position: relative; left: 50%; right: 50%; margin-left: -50px; margin-right: -50px}
 #bg-logo{background-color: white}
</style>

<div id="login-form">
  <div id="bg-logo">
    <div id="logo">
      <img src="lib/2R.png" alt="logo" height="110" width="110">
    </div>
    <br>
</div>

 <input type="radio" checked id="login" name="switch" class="hide">
 <input type="radio" id="signup" name="switch" class="hide">

 <div>
 <ul class="form-header">
 <li><label for="login"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Entre<label for="login"></li>
 <li><label for="signup"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Cadastre-se</label></li>
 </ul>
 </div>

 <div class="section-out">
 <section class="login-section">
 <div class="login">
 <form action="entrar.php" method="post">
 <ul class="ul-list">
 <li><input id="email" name="email" type="email" required class="input" placeholder="Seu Email"/><span class="icon"> <b id="icone">@</b> </span></li>
 <li><input id="senha" name="senha" type="password" required class="input" placeholder="Senha"/><span class="icon" id="olho"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span></li>
 <li> <a href="content.php?_location=forgot-pass&erro=null">Esqueci a senha</a> </li>
 <br><br><br><br>
 <li><input type="submit" value="ENTRAR" class="btn"></li>
 </ul>
 </form>
 </div>

 <div class="social-login"> &nbsp;

 </div>
 </section>

 <section class="signup-section">
 <div class="login">
   <form action="cadastro.php" method="post">
   <ul class="ul-list">
   <li><input id="nome" name="nome" type="text" required class="input" placeholder="Nome Completo"/><span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></li>
   <li><input id="email" name="email" type="email" required class="input" placeholder="Seu Email"/><span class="icon"> <b id="icone">@</b> </span></li>
   <li><input id="senha" name="senha" type="password" required class="input" placeholder="Senha"/><span class="icon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span></li>
   <br><br><br>
   <li><input type="submit" value="CADASTRAR" class="btn"></li>
   </ul>
   </form>
 </div>

 <div class="social-login"> &nbsp;

 </div>
 </section>
 </div>

 </div>
<!-- ERROS DE CREDENCIAL -->
 <?php if($_GET["erro"] == "email"): ?>
 <div class="container">
   <div class="alert alert-danger erro" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
     <span class="sr-only">Erro:</span>
     &nbsp;&nbsp;Endereço de email inválido
   </div>
 </div>
 <?php endif; ?>

 <?php if($_GET["erro"] == "senha"): ?>
 <div class="container">
   <div class="alert alert-danger erro" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
     <span class="sr-only">Erro:</span>
     &nbsp;&nbsp;Senha inválida
   </div>
 </div>
 <?php endif; ?>

 <?php if($_GET["erro"] == "cadastro"): ?>
 <div class="container">
   <div class="alert alert-danger erro" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <span class="glyphicon glyphicon-exclamation-sign erro-icon" aria-hidden="true"></span>
     <span class="sr-only">Erro:</span>
     &nbsp;&nbsp;Endereço de email já cadastrado
   </div>
 </div>
 <?php endif; ?>

<script>
$( "#olho" ).mousedown(function() {
  $("#senha").attr("type", "text");
});

$( "#olho" ).mouseup(function() {
  $("#senha").attr("type", "password");
});

$( "#olho" ).mouseout(function() {
  $("#senha").attr("type", "password");
});
</script>
