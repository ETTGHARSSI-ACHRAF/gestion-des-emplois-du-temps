
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Brief5/views/css/inscri.css">
    <title>Inscripton</title>
</head>
<body>
    <h1 class="text-center">Inscription</h1>
    <form method="POST" action="enseignant/creat" >
        <div class="mb-3 col-10 ms-5 pt-2">
          <label  class="form-label">NOM</label>
          <input type="text" class="form-control input"   name="nom">
        </div>
        <div class="mb-3 col-10 ms-5">
            <label  class="form-label">PRENOM</label>
            <input type="text" class="form-control input" name="prenom" >
        </div>
        <div class="mb-3 col-10 ms-5">
            <label  class="form-label">EMAIL</label>
            <input type="email" class="form-control input" name="email" >
        </div>
        <div class="mb-3 col-10 ms-5">
          <label  class="form-label">Password</label>
          <input type="password" class="form-control input" name="password">
        </div>
        <div class="mb-3 col-10 ms-5">
        <label  class="form-label">MATIERE</label>
        <select class="form-select input" name="matiere">
        <option></option>
        <?php
                        
                        foreach($result as $row)
                        {
                        ?>
                        <option value="<?=$row['IdM']?>"><?=$row['LibelleM']?></option>
                        <?php
                        }
                        ?>

          </select>
        </div>
        <input type="submit"   value="Inscrire" class="btn btn-primary  col-10 ms-5 mb-3" name="inscri">
      </form>
</body>
</html>