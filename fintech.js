let accB = document.getElementById("bal");
let accH = "XXXXXX";
let actualB = document.getElementById("bal").textContent;
//let CtB = 50045925
function hdb() {
  if (accB.textContent === accH) {
    accB.textContent = actualB;
  } else {
    accB.textContent = accH;
  }
}
