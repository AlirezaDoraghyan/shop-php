function menu() {
  var men = document.getElementById('menu').getElementsByTagName('ul')[0].getElementsByTagName('ul');
  var c = "<img src='<?php bloginfo('template_url'); ?>/images/round-arrow_drop_down-24px.svg' id='imggo'>"
  for (var i = 0; i < men.length; i++) {
    men[i].parentNode.firstChild.innerHTML = men[i].parentNode.firstChild.innerHTML + c;
  }
}
function menue() {
  var men = document.getElementById('menua').getElementsByTagName('ul')[0].getElementsByTagName('ul');
  var c = "<img src='<?php bloginfo('template_url'); ?>/images/round-arrow_drop_down-24px.svg' id='imggo'>"
   for (var i = 0; i < men.length; i++) {
     men[i].parentNode.firstChild.innerHTML = men[i].parentNode.firstChild.innerHTML + c;
   }
}
function logo() {
  document.getElementById("logoarea").style.left="0";
  //document.getElementById("boxinos").style.bottom="-22";
  //document.getElementById("indext").style.right="0";
}
