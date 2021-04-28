<?php
    require_once __DIR__."/../controllers/salle.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Brief5/views/css/salleUpdate.css">
    <title>Update Salle</title>
</head>
<body>
<h3 class="text-center">Update Salle</h3>
<div>
      <div class="container addform mb-4 pb-2">
        
        
        <form action="http://localhost/Brief5/salle/saveUpdate" method="post">
              <div class=" col-12 d-flex  flex-column ">
              <div class=" mt-5">
                  <input type="hidden"  class="form-control" name="id" value="<?=$ids?>" id="name">
                </div>
                <div class=" mt-4">
                  <input type="text"  class="form-control" name="name" value="<?=$name?>" id="name">
                </div>
                <div class=" mt-4">
                  <input type="number" id="capaciter" class="form-control" name="capaciter" value="<?=$capaciter?>">
                </div>
                <div class=" mt-5">
                    <input type="submit" name="update" value="Update" id="btn" class="btn btn-primary  col-12">
                </div> 
              </div>
            
            </div>      
        </form>
        
    </div>
  </div>
</body>
</html>
   