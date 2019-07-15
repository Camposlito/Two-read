<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="shortcut icon" href="lib/2R.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php pageTitle();?></title>
    <?php headinclude();?>
  </head>
  <body ondragstart='return false'>
    <?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="content.php?_location=main"> <img src="lib/2R.png" alt="icone" width="45" height="45"> </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php loginProfile($_SESSION['status']); ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php mainContent(); ?>
    <?php endinclude(); ?>
    <footer class="footer">
      <div class="text-center">
        © 2019 | CEFET/RJ - Maracanã | 4BINFO
      </div>
    </footer>
  </body>
</html>
<script type="text/javascript">
function bloquear(e){return false}
function desbloquear(){return true}
document.onselectstart=new Function (&quot;return false&quot;)
if (window.sidebar){document.onmousedown=bloquear
document.onclick=desbloquear}
</script>
