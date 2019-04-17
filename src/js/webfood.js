const $ = function(selector){
    return (document.querySelectorAll(selector).length > 1) ? 
        document.querySelectorAll(selector):document.querySelectorAll(selector)[0]
}.bind(document)



// ---> Menu

let loadMenuOptions = () => {
    $('#menu-hamburguer').addEventListener('click', function(){
        if($('#menu-hamburguer').checked == true)
            $('.side-nav').style.width = '300px';
        else
            $('.side-nav').style.width = '0';
    })
}

// ---> Mesa
let loadFuncTables = () => {    
    $('.table').forEach(table => table.onclick = () => {
        $('#inTable').value = table.innerHTML
    })
}

// ---> Cardápio
let loadProductsCategory = () => {
    $('.category').forEach(category => category.onclick = () => category.nextElementSibling.classList.toggle('products-close'))
}

let loadModalProducts = () => {
    $('.product').forEach(product => product.onclick = () => {
        $('#inIdProduct').value = product.children[0].value
        $('#inDescriptionProduct').innerHTML = product.children[2].innerHTML;
        $('#inPriceProduct').innerHTML =  product.children[3].innerHTML;
    });  
}

let lessProduct = () => {
    if($('#inAmount').value > 1 )
        $('#inAmount').value--;
}

let moreProduct = () => {
    $('#inAmount').value++;
}

// ---> Meu Pedido 
let loadAddNFunctions = () => {
    $('.btnLess').forEach(btnLess => btnLess.onclick = (el) => {
        if(el.target.nextElementSibling.innerHTML > 1)
            el.target.nextElementSibling.innerHTML--
    })
    
    $('.btnMore').forEach(btnMore => btnMore.onclick = (em) => {
        em.target.previousElementSibling.innerHTML++
    })
}

let loadAddFunctions = () => {
    $('.btnLess').onclick = (el) => {
        if(el.target.nextElementSibling.innerHTML > 1)
            el.target.nextElementSibling.innerHTML--

    }
    
    $('.btnMore').onclick = (em) => {
        em.target.previousElementSibling.innerHTML++   
    }
}

let loadValorTotal = () => {
    // var total = 0;
    // for(var i=0;i<$('.priceOrderItems').length;i++){
    //     var preco = parseFloat($('.priceOrderItems')[i].innerHTML.replace('R$ ', ''))
    //     var quantidade = parseInt($('.txtAmountOrderItems')[i].innerHTML)
    //     total += preco*quantidade
    //     $('#valorTotal').innerHTML = 'R$ ' + total
    //     console.log(preco + ' x ' + quantidade + ' = ' + total)
    // }
}


