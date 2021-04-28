var i=0;
function add(){
    
    var form = document.getElementById("form");
    var lebelle = document.getElementById("lebelle");
    var capaciter = document.getElementById("capaciter");
    if(capaciter.value!='' && lebelle.value!='')
    {
        form.innerHTML+=' <div class="result d-flex justify-content-center" ><div class="form-group col-3 m-2"><input type="text" class="form-control" value="'+lebelle.value+'" name="name'+i+'" ></div><div class="form-group col-3 m-2"><input type="number"  name="capaciter'+i+'" class="form-control" value="'+capaciter.value+'" ></div></div>';
        i++;
    }else
    {
        alert('Tous les champs sont obligatoires.');
    }
    
}