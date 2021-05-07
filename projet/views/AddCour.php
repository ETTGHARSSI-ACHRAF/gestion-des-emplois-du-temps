
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
    <h1 class="text-center">Ajouter Cour</h1>
    <form method="POST" action="reservation" >
        <div class="mb-3 col-10 ms-5">
        <label  class="form-label">Salle</label>
        <select class="form-select input" name="salle">
            <option></option>
                        <?php
                        
                        foreach($result as $row)
                        {
                        ?>
                        <option value="<?=$row['IdS']?>"><?=$row['LibelleS']?></option>
                        <?php
                        }
                        ?>
          </select>
        </div>
        <div class="mb-3 col-10 ms-5">
            <label  class="form-label">Groupe</label>
            <select class="form-select input" name="groupe" >
                <option></option>
                        <?php
                        
                        foreach($result1 as $row)
                        {
                        ?>
                        <option value="<?=$row['IdG']?>"><?=$row['LibelleG']?></option>
                        <?php
                        }
                        ?>
              </select>
            </div>
            <div class="mb-3 col-10 ms-5">
                <label  class="form-label">Dure</label>
                <select class="form-select input" name="dure" >
                    <option></option>
                    <option value="8">8-10</option>
                    <option value="10">10-12</option>
                    <option value="14">14-16</option>
                    <option value="16">16-18</option>
                  </select>
                </div>
                <div class="mb-3 col-10 date">
                    <label  class="form-label">Date :</label>
                    <input type="date" name="date" class="input" >
                    </div>
        <input type="submit"   value="Ajouter" class="btn btn-primary  col-10 ms-5 mb-3" name="inscri">
        <label><?=$erreur?></label>
      </form>

</body>
</html>