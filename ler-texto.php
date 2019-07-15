<?php
$id_txt = $_POST["id_txt"];
$text = mostrarTxt($id_txt, "pt");
$text_en = mostrarTxt($id_txt, "en");
 ?>
<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-sm-6">
        <a href="content.php?_location=profile">
          <button type="button" class="btn-gt" onmouseover="bigImg('btn-arrow')" onmouseout="normalImg('btn-arrow')"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id="btn-arrow"></span> &nbsp; Voltar</button>
        </a>
      </div>
      <div class="col-sm-6 text-right">
        <button data-toggle="modal" data-target="#editar" type="button" class="btn btn-primary" onmouseover="bigImg('btn-pencil')" onmouseout="normalImg('btn-pencil')">Editar &nbsp; <span class="glyphicon glyphicon-edit" aria-hidden="true" id="btn-pencil"></span></button>
      </div>
    </div>
    <div class="row">
      <h1 class="text-center pre"><?php echo getNomeTxt($id_txt); ?></h1>
    </div>
  </div>
  <div class="row page-header">
    <div class="col-sm-6 text-right">
      <h2>Original</h2>
      <h4 class="pre txt-original"> <?php echo $text; ?> </h4>
    </div>
    <div class="col-sm-6 text-left">
      <h2>Traduzido</h2>
      <h4 class="pre"> <?php echo $text_en; ?> </h4>
    </div>
  </div>
  <div class="block-white">  </div>
</div>
<!-- modal editar txt -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button onclick="clearbox(1)" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Editar texto</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="save-txt.php">
          <input type="hidden" name="id_txt" id="id_txt" value="<?php echo $id_txt; ?>">
          <div class="form-group">
            <label for="nome" class="control-label">Nome do texto*</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo getNomeTxt($id_txt); ?>">
          </div>
          <div class="form-group">
            <label for="txt" class="control-label">Texto</label>
            <textarea class="form-control" id="txt" name="txt" rows="20"> <?php echo $text; ?> </textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button onclick="clearbox(1)" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
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
