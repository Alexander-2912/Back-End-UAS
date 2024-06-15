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


const dropdowns = document.querySelectorAll('.dropdown')

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector('.select')
  const caret = dropdown.querySelector('.caret')
  const menu = dropdown.querySelector('.menu')
  const options = dropdown.querySelectorAll('.menu li')
  const selected = dropdown.querySelector('.selected')

  select.addEventListener('click', () => {
    select.classList.toggle('select-clicked')
    caret.classList.toggle('caret-rotate')
    menu.classList.toggle('menu-open')

  })

  options.forEach(option => {
    option.addEventListener('click', () => {
      selected.innerText = option.innerText;
      select.classList.remove('select-clicked')
      caret.classList.remove('caret-rotate')
      menu.classList.remove('menu-open')
      options.forEach(option => {
        option.classList.remove('active')
      })
      option.classList.add('active')
    })
  })
})