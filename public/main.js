function getTypeOfStudiumLocations(){
if(document.getElementById("TypeOfStudiumLocations").value!=""){

    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            document.getElementById("type_of_location").innerHTML=this.responseText;
        }
    }
    xhr.open("POST","getTypeOfStudiumLocations",false);
    var f=new FormData();
    f.append("_token",document.getElementsByName('_token')[0].value);
    f.append("id",document.getElementById("TypeOfStudiumLocations").value);
    xhr.send(f);
}else{
    document.getElementById("type_of_location").innerHTML="<option value=''>Choose A Type</option>";
}
}