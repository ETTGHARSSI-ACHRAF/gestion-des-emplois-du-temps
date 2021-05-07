
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Brief5/views/css/style.css">
    <title>Groupe</title>
</head>
<body>

<?php
  include "navbar.php";
 ?>
      


    <div class="container mt-4">
        <h1 class="text-center">Groupe</h1>
        <a href="groupe/add" class="btn btn-primary float-end mb-4"><b>+ Ajouter Groupe</b></a>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                <th>id Groupe</th>
                <th>Nom de Groupe</th>
                <th>L'effectif de groupe</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                        
                        foreach($result as $row)
                        {
                        ?>
                        <tr>
                          <td><?=$row['IdG']?></td>
                          <td><?=$row['LibelleG']?></td>
                          <td><?=$row['effectifG']?></td>
                          <td class="text-center"><a class='btn btn-info btn-xs' href="groupe/update/<?=$row['IdG']?>" > Edit</a> <a href="groupe/delet/<?=$row['IdG']?>" class="btn btn-danger btn-xs"> Del</a></td>
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