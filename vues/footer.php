<footer class="container">
  <p>&copy; Bibliothèque </p>
</footer>
<div class="modal fade" id="modalsup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez vous supprimer cette nationalité ?</p>
      </div>
      <div class="modal-footer">
        <a herf="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
        <a href="" class="btn btn-primary" id="btnsup">Supprimer</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript">
  $("a[data-suppression]").click(function(){
    var lien = $(this).attr("data-suppression");
    $("#btnsup").attr("href",lien);
  });
</script>
      
  </body>
</html>
<?php ob_end_flush(); ?>
