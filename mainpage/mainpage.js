let submenu = document.getElementById("submenu");

function toggleMenu(){
    submenu.classList.toggle("open-menu")
}

document.querySelector("#button-create").addEventListener("click", function(){
    document.querySelector(".popup").classList.add("active");
})

document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

document.querySelector("#button-create-submit").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

const button = document.getElementById("button-create");
      button.addEventListener("click", (e) => {
        e.preventDefault;
        button.classList.add("animate");
        setTimeout(() => {
          button.classList.remove("animate");
        }, 600);
      });