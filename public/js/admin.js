let buttonOpen = document.getElementsByClassName("showSidebar");
let buttonClose = document.getElementsByClassName("hideSidebar");

let text = document.getElementById("randomText");

for(let i=0; i < buttonOpen.length; i++){
    buttonOpen[i].addEventListener("click", ()=>{
        mainBox.style.visibility = "visible";
        if(buttonOpen[i].value != 0){
            text.innerHTML = "Edit Data";
        }
        else{
            text.innerHTML = "Create New Data";
        }
    });
}

for(let i = 0; i < buttonClose.length; i++){
    buttonClose[i].addEventListener("click", ()=>{
        mainBox.style.visibility = "hidden";
    });
}