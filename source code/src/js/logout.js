$(document).ready(function(){

  // window.history.forward();
  // setTimeout("preventBack()", 0);
  // window.onunload=function(){null};

  $('#logout').click(function(){
    sessionStorage.clear();
    location.href = "login.html";
  });
})

