function active() {
   div= document.querySelector(".links-bar");
    if (div.style.display === "block") {
        div.style.display = "none";
      } else {
        div.style.display = "block";
      }
}

function hide() {
    document.querySelector(".links").display="none";
}