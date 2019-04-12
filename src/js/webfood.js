const $ = function(selector){
    return (document.querySelectorAll(selector).length > 1) ? 
        document.querySelectorAll(selector):document.querySelectorAll(selector)[0]
}.bind(document)

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