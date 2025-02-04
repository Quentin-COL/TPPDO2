<div class="container mt-5">
  <div class="row pt-3">
      <div class="col-9"><h2>Liste des continents</h2></div>
      <div class="col-3"><a href="index.php?uc=continents&action=add" class='btn btn-success'>Créer un continent</a></div>
    
  </div>
  <table class="table table-stripted table-hover">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
</div>
    <?php
    foreach($lesContinents as $continent){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$continent->getNum()."</td>";
        echo "<td class='col-md-8'>".$continent->getLibelle()."</td>";
        echo "<td class='col-md-2'>
          <a href='index.php?uc=continents&action=update&num=".$continent->getNum()."' class='btn btn-primary'><i class='lni lni-pencil-1'></i></a>
          <a href='#modalsup' data-toggle='modal' data-suppression='index.php?uc=continents&action=delete&num=".$continent->getNum()."' class='btn btn-danger'><i class='lni lni-trash-3'></i></a>
        </td>";
        echo "</tr>";

    }
    ?>
  </tbody>
</table>