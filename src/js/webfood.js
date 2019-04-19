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
let loadOrderValue = () => {
    let valor = 0

    if($('.priceItem span') != null)
        if($('.priceItem span').length > 1)
            $('.priceItem span').forEach(elem => {
                valor += parseFloat(elem.innerHTML)
            })
        else
            valor += parseFloat($('.priceItem span').innerHTML)

    $('#btnEnviar').value = 'Confirmar (R$ ' + valor +')'
}

let updatePrice = (operator, id) => {
    let priceFix = document.querySelector(`#${id} .priceFix`).value;
    let qtde = document.querySelector(`#${id} .amountOrderItems .txtAmountOrderItems`).value; 

    let price = eval(`${priceFix} ${operator} ${qtde} `);

    document.querySelector(`#${id} .priceOrderItems span`).innerHTML = price;
}

let updatePriceAmount = () => {
    let operation = {
        '+': id => updatePrice('*', id),
        '-': id => updatePrice('*', id)
    }

    if($('.order_items div') != null)
        if($('.order_items div').length > 1)
            $('.order_items div').forEach(elem => {
                updatePriceAmountV2(elem, operation)
            });
        else {
            var elem = $('.order_items div')
            updatePriceAmountV2(elem, operation)
        }
}

let updatePriceAmountV2 = (elem, operation) => {
    for (let item of elem.childNodes) {
        item.onclick = () => {
            if(item.value == '+')
                ++item.previousElementSibling.value
            else
                if(item.nextElementSibling.value > 1)
                    --item.nextElementSibling.value

            let id = item.parentNode.parentNode.id;

            if(item.value != undefined)
                operation[item.value](id);

            loadOrderValue()
        }
    }
}