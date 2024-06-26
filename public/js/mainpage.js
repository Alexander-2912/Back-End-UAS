// Mendapatkan elemen submenu berdasarkan ID
let submenu = document.getElementById("submenu");

// Fungsi untuk mengganti status class 'open-menu' pada submenu
function toggleMenu(){
    submenu.classList.toggle("open-menu")
}

// Menambahkan event listener pada tombol "#button-create" untuk menampilkan popup
document.querySelector("#button-create").addEventListener("click", function(){
    document.querySelector(".popup").classList.add("active");
})

// Menambahkan event listener pada tombol tutup popup
document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

// Menambahkan event listener pada tombol submit pada popup untuk menyembunyikan popup setelah disubmit
document.querySelector("#button-create-submit").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
})

// Animasi tombol create dengan menambah dan menghapus class 'animate'
const button = document.getElementById("button-create");
      button.addEventListener("click", (e) => {
        e.preventDefault;
        button.classList.add("animate");
        setTimeout(() => {
          button.classList.remove("animate");
        }, 600);
      });

// Mengatur dropdown pada menu navigasi
const dropdowns = document.querySelectorAll('.dropdown')

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector('.select')
  const caret = dropdown.querySelector('.caret')
  const menu = dropdown.querySelector('.menu')
  const options = dropdown.querySelectorAll('.menu li')
  const selected = dropdown.querySelector('.selected')
// Menambahkan event listener untuk mengganti status dropdown saat diklik
  select.addEventListener('click', () => {
    select.classList.toggle('select-clicked')
    caret.classList.toggle('caret-rotate')
    menu.classList.toggle('menu-open')

  })
    // Menambahkan event listener pada setiap opsi dropdown

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

// Menunggu dokumen selesai dimuat sebelum menambahkan event listener pada form

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('cardForm');
      // Menambahkan event listener untuk menghindari pengiriman form dan reload halaman

  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form from submitting and reloading the page
      createItem(); // Call the function to create the card
  });
});

// Fungsi untuk membuat kartu berdasarkan input dari form
function createItem(){
  
  let date = document.getElementById("date").value;
  let description = document.getElementById("description").value;
  let important = document.getElementById("important").checked;

    // Membuat elemen wrapper untuk kartu
  let wrapper = document.createElement("div");
  wrapper.classList.add("card-wrapper")

    // Menambahkan warna latar belakang jika penting
  if(important == true){
    wrapper.style.backgroundColor ="#3fc4bd"
  }

    // Membuat elemen untuk tanggal kartu
  let cardDate = document.createElement("div")
  cardDate.classList.add("card-date")

  let spanDate = document.createElement("span")
  spanDate.classList.add("date-text")
  spanDate.textContent = date

    // Membuat elemen untuk deskripsi kartu
  let desc = document.createElement("div")
  desc.classList.add("card-description")

  let spanDesc = document.createElement("span")
  spanDesc.textContent = description

    // Menggabungkan elemen-elemen ke dalam wrapper
  wrapper.appendChild(cardDate)
  wrapper.appendChild(desc)
  cardDate.append(spanDate)
  desc.append(spanDesc)

    // Menambahkan wrapper ke dalam tabel data
  document.getElementById("table-list-data").appendChild(wrapper)
}