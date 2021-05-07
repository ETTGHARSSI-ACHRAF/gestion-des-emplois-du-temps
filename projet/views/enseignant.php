
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Enseignant</title>
</head>
<body>
<a href="http://localhost/Brief5/login/logaut" class="btn btn-info float-end m-3">déconnecter</a>
<h6 class=" m-3">bonjour MR : <?=$_SESSION['nomE']?></h6>

<div class="container mt-4">
        <h1 class="text-center">votre Cours</h1>
        <a href="enseignant/add" class="btn btn-primary float-end mb-4"><b>+ Ajouter Cour</b></a>
        <div class="row col-md-12 col-md-offset-2 custyle">
        <table class="table">
        <thead>
        
            <tr>
                
                <th>id Cour</th>
                <th>Date de Cour</th>
                <th>Dure de Cour</th>
                <th>Nom de Groupe</th>
                <th>Nom de Salle</th>
                <th>effectif de groupe</th>
                
                <th class="text-center">Action</th>
            </tr>
        </thead>
       
        <tbody>
            <?php
                foreach($result as $row){
            ?> 
            <form action="enseignant/update" method="post">
            <tr>
            <td>
                <label><?=$row['IdC']?></label>
                <input type="hidden" name="idc" value="<?=$row['IdC']?>">
            </td>
            <td>
                <label><?=$row['DateC']?></label>
                <input type="date" name="date" value="<?=$row['DateC']?>" style="display:none">
            </td>
            <td>
                <label><?=$row['DureC']?></label>
                <select class="form-select input" name="dure" style="display:none">
                    <option ></option>
                    <option value="8">8-10</option>
                    <option value="10">10-12</option>
                    <option value="14">14-16</option>
                    <option value="16">16-18</option>
                  </select>
            </td>
            <td>
                <label><?=$row['LibelleG']?></label>
                <select class="form-select input" name="groupe" style="display:none">
                <option></option>
                        <?php
                        
                        foreach($result4 as $row1)
                        {
                        ?>
                        <option value="<?=$row1['IdG']?>"><?=$row1['LibelleG']?></option>
                        <?php
                        
                        }
                        ?>
                </select>
            </td>
            <td>
                <label><?=$row['LibelleS']?></label>
                <select class="form-select input" name="salle" style="display:none">
                        <option></option>
                        <?php
                        foreach($result5 as $row2)
                        {
                        ?>
                        <option value="<?=$row2['IdS']?>"><?=$row2['LibelleS']?></option>
                        <?php
                        }
                        ?>
          </select>
            </td>
            <td><label><?=$row['effectifG']?></label></td>
            <td class="text-center">
                <a class='btn btn-info btn-xs' onclick='edit(this)' > Edit</a> <a href="enseignant/delete/<?=$row['IdC']?>" class="btn btn-danger btn-xs"> Del</a>
                <input type="submit" class='btn btn-success btn-xs' name="update" value="Save" style="display:none"> <a onclick="cansel(this)" class="btn btn-warning btn-xs" style="display:none">Cansel</a>
            </td>
            </tr>
            </form>
            <?php
                }
            ?>
         </tbody>
         
        </table>
        </div>
    </div>
</body>
<script src="http://localhost/Brief5/views/js/editTable.js"></script>
</html>