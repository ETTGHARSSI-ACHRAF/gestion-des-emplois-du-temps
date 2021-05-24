var i=0;
function add(){
    
    var form = document.getElementById("form");
    var lebelle = document.getElementById("lebelle");
    if( lebelle.value!='')
    {
        form.innerHTML+=' <div class="result d-flex " ><div class="form-group col-3 m-2"><input type="text" class="form-control" value="'+lebelle.value+'" name="name'+i+'" ></div></div>';
        i++;
    }else
    {
        alert('Tous les champs sont obligatoires.');
    }
    
}