function openNav() {
  document.getElementById("mySidebar").style.width = "260px";
  document.getElementById("main").style.marginLeft = "260px";
  document.getElementById("navbtn").style.visibility="hidden";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("navbtn").style.visibility="visible";
}
