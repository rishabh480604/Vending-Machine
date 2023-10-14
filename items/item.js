// var item_name=document.getElementsByClassName("item_name");
function desc(obj){
    // window.alert("function called");
    // create show and hidden of desc
    var desc=document.getElementById(obj);
    if(desc.style.display === "none"){
        desc.style.display="block";
    }else{
        desc.style.display="none";
    }
    

}