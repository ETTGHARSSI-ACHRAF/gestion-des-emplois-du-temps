function edit(e)
{
    document.getElementById('dateLabel'+e).style.display="none";
    document.getElementById('date'+e).style.display="block";
    document.getElementById('dureLabel'+e).style.display="none";
    document.getElementById('dure'+e).style.display="block";
    document.getElementById('groupelabel'+e).style.display="none";
    document.getElementById('groupe'+e).style.display="block";
    document.getElementById('sallelabel'+e).style.display="none";
    document.getElementById('salle'+e).style.display="block";
    document.getElementById('btnedit'+e).style.display="none";
    document.getElementById('btndelet'+e).style.display="none";
    document.getElementById('btnsave'+e).style.display="inline-block";
    document.getElementById('btncansel'+e).style.display="inline-block";
    
}
function cansel(e)
{
    document.getElementById('dateLabel'+e).style.display="block";
    document.getElementById('date'+e).style.display="none";
    document.getElementById('dureLabel'+e).style.display="block";
    document.getElementById('dure'+e).style.display="none";
    document.getElementById('groupelabel'+e).style.display="block";
    document.getElementById('groupe'+e).style.display="none";
    document.getElementById('sallelabel'+e).style.display="block";
    document.getElementById('salle'+e).style.display="none";
    document.getElementById('btnedit'+e).style.display="inline-block";
    document.getElementById('btndelet'+e).style.display="inline-block";
    document.getElementById('btnsave'+e).style.display="none";
    document.getElementById('btncansel'+e).style.display="none";

}