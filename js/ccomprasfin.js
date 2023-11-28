const btnCart = document.querySelector('.container-cart-icon')
const containerCartProducts = document.querySelector('.container-cart-products')

btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})

const cartInfo = document.querySelector('.cart-product')
const filaColumna = document.querySelector('.row-product')

const productList = document.querySelector('.container-items')

//variable de areglos de productos
var listaProducto = [];


const valorTotal = document.querySelector('.total-pagar')

const contadorProductos = document.querySelector('#contador-productos')
// const carroContNav = document.querySelector('#contadorCarro')



productList.addEventListener('click', e => {

    if (e.target.classList.contains('btn-carrito')) {
        const productos = e.target.parentElement
        const infoProducto = {
            cantidad: 1,
            nombre: productos.querySelector('h2').textContent,
            precio: productos.querySelector('p').textContent

        };



        const existe = listaProducto.some(producto => producto.nombre === infoProducto.nombre)
        if (existe) {
            const productos = listaProducto.map(conproducto => {
                if (conproducto.nombre === infoProducto.nombre) {
                    conproducto.cantidad++;


                    return conproducto
                } else {
                    return conproducto
                }
            })



            listaProducto = [...productos]
        } else {



            listaProducto = [...listaProducto, infoProducto];
        }

        const lista01 = {
            nom: productos.querySelector('h2').textContent,
            pre: productos.querySelector('p').textContent,
            cant: 1
        };


        mostrarHtml();
    }
});

filaColumna.addEventListener('click', (e) => {
    if (e.target.classList.contains('icon-close')) {
        const productoaca = e.target.parentElement
        const nombre = productoaca.querySelector('p').textContent
        listaProducto = listaProducto.filter(
            productoaca => productoaca.nombre !== nombre
        );
        console.log(listaProducto)
        mostrarHtml();
    }

});

filaColumna.innerHTML = '';

//nueva funcion para mostrar html
const mostrarHtml = () => {

    //limpiar html
    filaColumna.innerHTML = '';
    let total = 0;
    let totalProducto = 0;

    ///
    //getCookie();
    // listaProducto = JSON.parse(listaProducto);
    
    ///


    listaProducto.forEach(producto => {

        const contenedorProducto = document.createElement('div')
        contenedorProducto.classList.add('cart-product')
        contenedorProducto.innerHTML = `        
        <div class="info-cart-product">
        <span class="cantidad-producto-carrito">${producto.cantidad}</span>
        <p class="titulo-producto-carrito">${producto.nombre}</p>
        <span class="precio-producto-carrito">${producto.precio}</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        `;

        filaColumna.append(contenedorProducto);
        total = total + parseInt(producto.cantidad * producto.precio.slice(1));
        totalProducto = totalProducto + producto.cantidad;

    });
    valorTotal.innerText = `$${total}`;
    contadorProductos.innerText = totalProducto;

};
