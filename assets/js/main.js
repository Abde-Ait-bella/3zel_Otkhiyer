const containerPanier = document.getElementsByClassName('containerPanier');
const layoutSidenav = document.getElementById('layoutSidenav');
const body = document.getElementsByTagName('body');


const togglePanier = () =>{
    containerPanier[0].classList.toggle('d-none');
}

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// layoutSidenav.addEventListener('click',   () => {
//     addProduct_popup.classList.add('d-none');
// })

const  openPopup = () =>{
    console.log('test');
    addProduct_popup.classList.toggle('d-none');
}
