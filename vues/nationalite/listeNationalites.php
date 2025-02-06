<div class="container mt-5">
    
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="index.php?uc=nationalites&action=add" class = 'btn btn-success'>Créer une nationalité</a></div>    
    </div>
    <form action="index.php?uc=nationalites&action=list" method ="post" class = "border border-primary rounded p-3 mt-3">
        <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' placeholder = 'Saisir le libellé' name = 'libelle' value= "<?php echo $libelle?>">
            </div>
            <div class="col">
                <select name="continent" class ='form-control'>
                    <?php
                    echo "<option value='Tous'>Tous les continents</option>";
                    foreach($lesContinents as $continent){
                        $selection = $continent->getNum() == $continentSel ? 'selected' :'';
                        echo "<option value='".$continent->getNum()."'". $selection.">".$continent->getLibelle()."</option>";} 
                    ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class = "btn btn-success btn-block">Rechercher</button>
            </div>
        </div>
    </form>

<table class="table table-hover table-striped table-dark">
<thead>
    <tr class = "d-flex">
    <th scope="col" class= "col-md-2">Numéro</th>
    <th scope="col" class = "col-md-5">Libellé</th>
    <th scope="col" class = "col-md-2">Continent</th>
    <th scope="col" class = "col-md-3">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class = 'd-flex'>";
        echo "<td class = 'col-md-2'>$nationalite->numero</td>";
        echo "<td class = 'col-md-5'>$nationalite->libNation</td>";
        echo "<td class = 'col-md-2'>$nationalite->libContinent</td>";
        echo "<td class = 'col-md-3'>
            <a href='index.php?uc=nationalites&action=update&num=".$nationalite->numero."' class ='btn btn-success'>Modifier</a>
            <a href='#modalSup' data-toggle ='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression = 'index.php?uc=nationalites&action=delete&num='".$nationalite->numero."' class ='btn btn-danger'>Supprimer</a>
        </td>";
        //SupNationalite.php?num=$nationalite->num
        echo "</tr>";
    }
    ?>
  </tbody>
</table>
</div>