const containerPanier = document.getElementsByClassName('containerPanier')
const btn_submit = document.getElementById('btn_submit')
const layoutSidenav = document.getElementById('layoutSidenav')
const body = document.getElementsByTagName('body')
const form = document.forms['productForm']
const btn_order = document.getElementById('btn_order')

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


const dataOrderProduct = []
const prics = []
const dataOrder = {
    customers_id: user_id,
    order_quantity: Object.keys(dataCart).length
  }

Object.entries(dataCart).map(([key, value]) => {
  dataOrderProduct.push({
    product_id: value.product_id,
    product_quantity: 1
  })
})

Object.entries(dataCart).map(([key, value]) => {
  prics.push({
    price: value.product_price
  })
})


const addQuantity = (index) => {
  const div_qauntity = document.getElementById(index)
  console.log(prics[index])

  let totalDefault = 0
  let total = 0

  if (dataOrderProduct[index]?.product_quantity) {
    quant = dataOrderProduct[index]?.product_quantity + 1
  } else {
    quant = 2
  }

  Object.entries(prics).map(([index, value]) => {
    totalDefault += value.price
  })

  dataOrderProduct[index].product_quantity = quant
  total = dataOrderProduct[index]?.product_quantity * dataCart[index]?.product_price

  totalfinal = totalDefault - prics[index].price + total
  prics[index].price = total
  btn_order.innerText = `Commander ( ${totalfinal} ) MAD`
  div_qauntity.innerText = dataOrderProduct[index]?.product_quantity
}

console.log(dataOrderProduct)
console.log(dataOrder)

const moinQuantity = (index) => {
  const div_qauntity = document.getElementById(index)

  let totalfinal = 0
  let totalDefault = 0
  let totalmoin = 0

  if (
    dataOrderProduct[index]?.product_quantity &&
    dataOrderProduct[index]?.product_quantity > 1
  ) {
    quant = dataOrderProduct[index]?.product_quantity - 1
  } else {
    quant = 1
  }

  Object.entries(prics).map(([index, value]) => {
    totalDefault += value.price
  })

  dataOrderProduct[index].product_quantity = quant
  totalmoin +=
  dataOrderProduct[index]?.product_quantity * dataCart[index]?.product_price

  totalfinal = totalDefault - prics[index].price + totalmoin
  console.log(totalfinal)
  prics[index].price = totalmoin
  btn_order.innerText = `Commander ( ${totalfinal} ) MAD`
  div_qauntity.innerText = dataOrderProduct[index]?.product_quantity

 
}

const sendDataOrder = () =>{
        fetch('/shop_product/addOrder', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                orders : dataOrder,
                order_product : dataOrderProduct
            }),
        })
            .then(response => response.json())
            .then(response => {
                if(response.success == "success"){
                    togglePanier();
                    alert('yeess');
                }else{
                    alert("noo");
                }
            }
            )
            .catch(error => console.error('Error test:', error));
}
  