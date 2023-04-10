function myFunction() {
   var x = document.getElementById("myNavBar");
   if (x.className === "navbar") {
     x.className += " responsive";
   } else {
     x.className = "navbar";
   }
}
function showContent(x) {
  var content1 = document.getElementById("content1").style;
  var content2 = document.getElementById("content2").style;
  var content3 = document.getElementById("content3").style;
  var content4 = document.getElementById("content4").style;
  var content5 = document.getElementById("content5").style;

  if (x == 1) {
    console.log(x);
    content1.display = "flex";
    content2.display = "none";
    content3.display = "none";
    content4.display = "none";
    content5.display = "none";
  }
  if (x == 2) {
    console.log(x);
    content1.display = "none";
    content2.display = "flex";
    content3.display = "none";
    content4.display = "none";
    content5.display = "none";
  }
  if (x == 3) {
    console.log(x);
    content1.display = "none";
    content2.display = "none";
    content3.display = "flex";
    content4.display = "none";
    content5.display = "none";
  }
  if (x == 4) {
    console.log(x);
    content1.display = "none";
    content2.display = "none";
    content3.display = "none";
    content4.display = "flex";
    content5.display = "none";
  }
  if (x == 5) {
    console.log(x);
    content1.display = "none";
    content2.display = "none";
    content3.display = "none";
    content4.display = "none";
    content5.display = "flex";
  }
}

function hideContent(x) {
  var content1 = document.getElementById("content1").style;
  var content2 = document.getElementById("content2").style;
  var content3 = document.getElementById("content3").style;
  var content4 = document.getElementById("content4").style;
  var content5 = document.getElementById("content5").style;

  console.log(x)
  content1.display = x;  
  content2.display = x;
  content3.display = x;
  content4.display = x;
  content5.display = x;
}


function revertStep(n) {
  var step1 = document.getElementById('step1').style;
  var step2 = document.getElementById('step2').style;
  var step3 = document.getElementById('step3').style;
  var step4 = document.getElementById('step4').style;
  var step5 = document.getElementById('step5').style;

  if (n == 0) {
    console.log(n);
    step1.color = 'white';
    step1.borderBottom = 'none';
    step1.transition = 'all 0.35s';
    step1.backgroundColor = 'transparent';

    step2.color = 'white';
    step2.borderTop= 'none';
    step2.transition = 'all 0.35s';
    step2.backgroundColor = 'transparent';
    
    step3.color = 'white';
    step3.borderBottom = 'none';
    step3.transition = 'all 0.35s';
    step3.backgroundColor = 'transparent';

    step4.color = 'white';
    step4.borderTop = 'none';
    step4.transition = 'all 0.35s';
    step4.backgroundColor = 'transparent';

    step5.color = 'white';
    step5.borderBottom = 'none';
    step5.transition = 'all 0.35s';
    step5.backgroundColor = 'transparent';
  }
}

function highlightStep(n) {
  var step1 = document.getElementById('step1').style;
  var step2 = document.getElementById('step2').style;
  var step3 = document.getElementById('step3').style;
  var step4 = document.getElementById('step4').style;
  var step5 = document.getElementById('step5').style;

  if (n == 1) {
    console.log(n);
    step1.color = 'gold';
    step1.transition = 'all 0.35s';
    step1.borderBottom = '2px solid gold';
    step1.textShadow = '0 2px 3px rgb(75, 75, 75)';
    step1.backgroundColor = 'rgba(255, 255, 255, 0.2)';
  }

  if (n == 2) {
    console.log(n);
    step2.color = 'gold';
    step2.transition = 'all 0.35s';
    step2.borderTop = '2px solid gold';
    step2.textShadow = '0 2px 3px rgb(75, 75, 75)';
    step2.backgroundColor = 'rgba(255, 255, 255, 0.2)';
  }

  if (n == 3) {
    console.log(n);
    step3.color = 'gold';
    step3.transition = 'all 0.35s';
    step3.borderBottom = '2px solid gold';
    step3.textShadow = '0 2px 3px rgb(75, 75, 75)';
    step3.backgroundColor = 'rgba(255, 255, 255, 0.2)';
  }

  if (n == 4) {
    console.log(n);
    step4.color = 'gold';
    step4.transition = 'all 0.35s';
    step4.borderTop  = '2px solid gold';
    step4.textShadow = '0 2px 3px rgb(75, 75, 75)';
    step4.backgroundColor = 'rgba(255, 255, 255, 0.2)';
  }step4

  if (n == 5) {
    console.log(n);
    step5.color = 'gold';
    step5.transition = 'all 0.35s';
    step5.borderBottom = '2px solid gold';
    step5.textShadow = '0 2px 3px rgb(75, 75, 75)';
    step5.backgroundColor = 'rgba(255, 255, 255, 0.2)';
  }
}

