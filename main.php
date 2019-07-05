<div class="header" onselectstart='return false'>
  <div class="text-center two-read">
    <span class="text1">TWO READ</span>
    <span class="text2"><img src="lib/2R.png" alt="icone" width="32" height="32"> </span>
  </div>
  <div class="icons-ini i1">
    <p>Bem vindo ao seu site de tradução e aprendizado em inglês</p>
    <br><br>
    <p>Saiba mais &nbsp;<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></p>
  </div>
  <br><br><br>
</div>
<div class="container" onselectstart='return false'>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 ">
        <img class="" src="lib/icons/globo.png" alt="Globo" >
      </div>
      <div class="col-sm-6 pd-top">
        <h3 class="bar-l fr text-intro">Com o grande crescimento do mercado internacional, pessoas do mundo todo buscam aprender outro idioma.
          No Brasil, um país em desenvolvimento, aprender outra língua é sinônimo de expandir fronteiras e de integração em âmbito global.</h3>
      </div>
    </div>
  </div>
  <br><br><br>
  <div class="row bg-fb">
<br><br>
    <div class="col-sm-6 pd-top">
      <h3 class="bar-l fl text-intro">Ver séries sem legendas. Ler livros inteiros em outro idioma. Conversar com pessoas de outros países.
        Todos esses objetivos são passíveis de serem alcançados; entretanto, um primeiro passo deve ser dado.</h3>
    </div>
    <div class="col-sm-6">
      <img class="" src="lib/icons/social-media.png" alt="social-media">
    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="col-sm-6">
      <img class="" src="lib/icons/comunicação.png" alt="comunicação">
    </div>
    <div class="col-sm-6 pd-top">
      <h3 class="bar-l fr text-intro">Nossa plataforma permite que você desenvolva seu aprendizado em um idioma estrangeiro ao mesmo tempo que lê seus textos favoritos.</h3>
    </div>
  </div>
  <br><br><br>
  <br><br><br>
</div>
<div class="icons-ini i2">
  <p>Acesse seus textos ou adicione alguns clicando no botão abaixo</p>
  <br><br><br><br><br><br><br><br><br><br>
  <div class="row text-center">
    <a href= <?php btnVerTexto($_SESSION['status']); ?>>
      <button type="button" class="btn-gt" onmouseover="bigImg('btn-arrow')" onmouseout="normalImg('btn-arrow')">Ver Textos  <span class="glyphicon glyphicon-menu-right " aria-hidden="true" id="btn-arrow"></span></button>
    </a>
  </div>
</div>
</div>
<script>
function bigImg(id) {
  var x = document.getElementById(id);
  x.style = "transition: .2s; transform: scale(1.45);";
}

function normalImg(id) {
  var x = document.getElementById(id);
  x.style = "transition: .2s; transform: scale(1);";
}
</script>
