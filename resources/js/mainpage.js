// Mendapatkan elemen submenu berdasarkan ID "submenu"
let submenu = document.getElementById("submenu");

// Fungsi untuk mengalihkan status tampilan submenu
function toggleMenu(){
    submenu.classList.toggle("open-menu")
}

// Menambahkan event listener untuk tombol dengan ID "button-create"
document.querySelector("#button-create").addEventListener("click", function(){
    document.querySelector(".popup").classList.add("active");
})

// Menambahkan event listener pada tombol close dalam popup
document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

// Menambahkan event listener untuk tombol submit dalam popup
document.querySelector("#button-create-submit").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

// Mendapatkan tombol dengan ID "button-create"
const button = document.getElementById("button-create");
      button.addEventListener("click", (e) => {
        e.preventDefault;
        button.classList.add("animate");
        setTimeout(() => {
          button.classList.remove("animate");
        }, 600);
      });

// Mendapatkan semua elemen dengan kelas "dropdown"
const dropdowns = document.querySelectorAll('.dropdown')

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector('.select')
  const caret = dropdown.querySelector('.caret')
  const menu = dropdown.querySelector('.menu')
  const options = dropdown.querySelectorAll('.menu li')
  const selected = dropdown.querySelector('.selected')

  // Menambahkan event listener untuk saat klik pada ".select"
  select.addEventListener('click', () => {
    select.classList.toggle('select-clicked')
    caret.classList.toggle('caret-rotate')
    menu.classList.toggle('menu-open')

  })

  // Menambahkan event listener untuk setiap opsi dalam dropdown
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