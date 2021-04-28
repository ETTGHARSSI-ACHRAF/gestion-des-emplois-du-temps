<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Matiere</title>
</head>
<body>
  <h1 class="text-center mt-5 mb-5" >ajoueter les Matiere</h1>
  <form action="saveAdd" method="post" id="form">
  <div class="content d-flex justify-content-center" >
    <div class="form-group col-3 m-2">
      <input type="text" class="form-control" id="lebelle" placeholder="Lebeller"  >
    </div>
    <button class="btn btn-primary m-2" onclick="add()">+</button>
    <input type="submit" value="ADD" class="btn btn-primary m-2">
  </div>
</form>
</body>
<script src="http://localhost/Brief5/views/js/listeMatiere.js"></script>
</html>