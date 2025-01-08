const containerPanier = document.getElementsByClassName('containerPanier')
const btn_submit = document.getElementById('btn_submit')
const layoutSidenav = document.getElementById('layoutSidenav')
const body = document.getElementsByTagName('body')
const form = document.forms['productForm']

const togglePanier = () => {
  containerPanier[0].classList.toggle('d-none')
}

window.addEventListener('DOMContentLoaded', event => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector('#sidebarToggle')

  if (sidebarToggle) {
    sidebarToggle.addEventListener('click', event => {
      event.preventDefault()
      document.body.classList.toggle('sb-sidenav-toggled')
      localStorage.setItem(
        'sb|sidebar-toggle',
        document.body.classList.contains('sb-sidenav-toggled')
      )
    })
  }
})

// layoutSidenav.addEventListener('click',   () => {
//     addProduct_popup.classList.add('d-none');
// })

const togglePopup = () => {
  btn_submit.innerText = 'Ajouter'
  btn_submit.classList.replace('btn-warning', 'btn-danger')

  addProduct_popup.classList.toggle('d-none')
}

const cancel_popup = () => {
  togglePopup()
  form.reset()
}

const editeProduct = data => {
    togglePopup()
    
  btn_submit.innerText = 'Modifier'
  btn_submit.classList.add('text-white')
  btn_submit.classList.replace('btn-danger', 'btn-warning')


  const input_name = document.getElementById('name')
  const input_quantity = document.getElementById('quantite')
  const input_description = document.getElementById('description')
  const input_price = document.getElementById('prix')

  input_name.value = data.product_name
  input_quantity.value = data.product_quantity
  input_description.value = data.product_description
  input_price.value = data.product_price

  input_name.style.color = 'rgba(112, 112, 112, 0.56)'
  input_quantity.style.color = 'rgba(112, 112, 112, 0.56)'
  input_description.style.color = 'rgba(112, 112, 112, 0.56)'
  input_price.style.color = 'rgba(112, 112, 112, 0.56)'

  form.action = `/shop_product/updateProduct?id=${data.product_id}`
}
