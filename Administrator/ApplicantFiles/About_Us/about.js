function myFunction() {
   var x = document.getElementById("myNavBar");
   if (x.className === "navbar") {
     x.className += " responsive";
   } else {
     x.className = "navbar";
   }
}

// SPECIALIZATION SECTION
window.raw = 0;

function visa_categories() {
  window.raw = 0;
  selector();
}

function exchange_visitor() {
  window.raw = 1;
  selector();
}

function selector() {
  if (window.raw === 0) {
    document.getElementById("visa_categories").style.display = "flex";
    document.getElementById("exchange_visitor").style.display = "none";

    document.getElementById("visa_button").style.color = "goldenrod";
    document.getElementById("visa_button").style.transition = "all 0.5s";
    document.getElementById("visa_button").style.borderBottom = "2px solid teal";

    
    document.getElementById("exchange_button").style.color = "black";
    document.getElementById("exchange_button").style.transition = "all 0.5s";
    document.getElementById("exchange_button").style.borderBottom = "none";
  }
  if (window.raw === 1) {
    document.getElementById("visa_categories").style.display = "none";
    document.getElementById("exchange_visitor").style.display = "flex";

    document.getElementById("visa_button").style.color = "black";
    document.getElementById("visa_button").style.transition = "all 0.5s";
    document.getElementById("visa_button").style.borderBottom = "none";

    
    document.getElementById("exchange_button").style.color = "goldenrod";
    document.getElementById("exchange_button").style.transition = "all 0.5s";
    document.getElementById("exchange_button").style.borderBottom = "2px solid teal";
  }
  console.log(window.raw);
}

function reveal_body1() {
  var x = document.getElementById("content_body1");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}

// EXCHANGE SECTION
function show_body1() {
  var x = document.getElementById("panel_body1");
  var y = document.getElementById("exchange_body1");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body2() {
  var x = document.getElementById("panel_body2");
  var y = document.getElementById("exchange_body2");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body3() {
  var x = document.getElementById("panel_body3");
  var y = document.getElementById("exchange_body3");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body4() {
  var x = document.getElementById("panel_body4");
  var y = document.getElementById("exchange_body4");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body5() {
  var x = document.getElementById("panel_body5");
  var y = document.getElementById("exchange_body5");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body6() {
  var x = document.getElementById("panel_body6");
  var y = document.getElementById("exchange_body6");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body7() {
  var x = document.getElementById("panel_body7");
  var y = document.getElementById("exchange_body7");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
  }
}

function show_body8() {
  var x = document.getElementById("panel_body8");
  var y = document.getElementById("exchange_body8");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
    z.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
    z.style.width = "65%";
  }
}

function show_body9() {
  var x = document.getElementById("panel_body9");
  var y = document.getElementById("exchange_body9");
  if (x.style.display === "flex") {
    x.style.display = "none";
    y.style.width = "65%";
    z.style.width = "65%";
  } else {
    x.style.display = "flex";
    y.style.width = "90%";
    z.style.width = "65%";
  }
}