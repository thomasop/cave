const cellLinkS = document.querySelectorAll("td a");

cellLinkS.forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
    const modale = document.querySelector(".modale");
    modale.style.display = "block";
  });
});

var btnClose = document.querySelector(".burgerBtnClose");
if (btnClose) {
  btnClose.addEventListener("click", (e) => {
    e.preventDefault()
    const modale = document.querySelector(".modale");
    modale.style.display = "none";
  });
}