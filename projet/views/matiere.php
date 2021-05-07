<?php
require_once __DIR__."/../controllers/matiere.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Brief5/views/css/style.css">
    <title>Matiere</title>
</head>
<body>
    
<?php
  include "navbar.php";
 ?>


    <div class="container mt-4">
        <h1 class="text-center">Matiere</h1>
        <a href="matiere/add" class="btn btn-primary float-end mb-4"><b>+</b> Ajouter Matiere</a>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                <th>id Matiere</th>
                <th>Nom de Matiere</th>  
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
                      <?php
                       
                        foreach($result as $row)
                        {
                        ?>
                        <tr>
                          <td><?=$row['IdM']?></td>
                          <td><?=$row['LibelleM']?></td>
                          <td class="text-center"><a class='btn btn-info btn-xs' href="matiere/update/<?=$row['IdM']?>" > Edit</a> <a href="matiere/delet/<?=$row['IdM']?>" class="btn btn-danger btn-xs"> Del</a></td>
                        </tr>
                        <?php
                        }
                        ?>
         </tbody> 
        </table>
        </div>
    </div>

    
    
</body>
</html>