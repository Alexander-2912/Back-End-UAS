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


document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('cardForm');
  
  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form from submitting and reloading the page
      createItem(); // Call the function to create the card
  });
});


function createItem(){
  
  let date = document.getElementById("date").value;
  let description = document.getElementById("description").value;
  let important = document.getElementById("important").checked;

  let wrapper = document.createElement("div");
  wrapper.classList.add("card-wrapper")

  if(important == true){
    wrapper.style.backgroundColor ="#3fc4bd"
  }

  let cardDate = document.createElement("div")
  cardDate.classList.add("card-date")

  let spanDate = document.createElement("span")
  spanDate.classList.add("date-text")
  spanDate.textContent = date

  let desc = document.createElement("div")
  desc.classList.add("card-description")

  let spanDesc = document.createElement("span")
  spanDesc.textContent = description

  wrapper.appendChild(cardDate)
  wrapper.appendChild(desc)
  cardDate.append(spanDate)
  desc.append(spanDesc)

  document.getElementById("table-list-data").appendChild(wrapper)
}