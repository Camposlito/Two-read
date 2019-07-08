<div class="container">
  <div class="page-header">
    <h1>&nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <small><i>&nbsp;&nbsp;<?php echo $_SESSION["nome_user"]; ?></i></small> </h1>
  </div>
  <br>
  <h2><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp;&nbsp;Seus Textos:</h2>
  <br>
  <div id="textos">
    <?php divTextos($_SESSION["id_user"]); ?>
  </div>
  <div id="newbtn">
    <button type="button" class="btn btn-default btn-lg" id="btnplus" data-toggle="modal" data-target="#addTxt">
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo Texto
    </button>
  </div>
  <div class="block-white">  </div>
</div>
<!-- modal add txt -->
<div class="modal fade" id="addTxt" tabindex="-1" role="dialog" aria-labelledby="addTextModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button onclick="clearbox(1)" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Novo texto</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="new-txt.php">
          <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <div class="form-group">
            <label for="nome" class="control-label">Nome do texto*</label>
            <input type="text" class="form-control bold" id="nome" name="nome" placeholder="">
          </div>
          <div class="form-group">
            <label for="txt" class="control-label">Texto*</label>
            <textarea class="form-control" id="txt" name="txt" rows="10" placeholder="..."></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> &nbsp; Adicionar</button>
            <button onclick="clearbox(1)" type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp; Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal apagar txt -->
<div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center danger"> <span class="glyphicon glyphicon-trash"></span> </h4>
      </div>
      <div class="modal-boby">
        <h5 class="text-center">Deseja mesmo apagar este texto?</h5>

      </div>
      <div class="modal-footer">
        <form action="out-txt.php" method="post">
          <input type="hidden" id="idDelete" name="idDelete" value="">
          <button type="submit" class="btn btn-success">Sim</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function apagar(id_txt){
  document.getElementById("idDelete").value = id_txt;
}
function clearbox(resp){
  if(resp==1){
    var n = document.getElementById("nome");
    var t = document.getElementById("txt");
    n.value = "";
    t.value = "";
  }
}
</script>
