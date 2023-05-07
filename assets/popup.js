const submitButton = document.getElementById("submit");

submitButton.addEventListener('click',(event)=>{
    
   event.preventDefault();
   window.open("../popup.php", "_blank");
});