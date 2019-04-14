const $ = function(selector){
    return (document.querySelectorAll(selector).length > 1) ? 
        document.querySelectorAll(selector):document.querySelectorAll(selector)[0]
}.bind(document)

<<<<<<< HEAD

=======
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
// ---> Mesa
let loadFuncTables = () => {    
    $('.table').forEach(table => table.onclick = () => {
        $('#inTable').value = table.innerHTML
    })
}

<<<<<<< HEAD



// ---> Cardápio
let loadModalProducts = () => {
          
    $('.product').forEach(product => product.onclick = () => {
        // $('#inImageProduct').src = product.children[0].currentSrc;
        $('#inDescriptionProduct').innerHTML = product.children[1].innerHTML;
        $('#inPriceProduct').innerHTML =  product.children[2].innerHTML;
    });

   
=======
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
>>>>>>> 67ebd63a43468dd5b059fe8990be87831f078dd4
}

let lessProduct = () => {
    if($('#inAmount').value > 1 )
        $('#inAmount').value--;
}

let moreProduct = () => {
    $('#inAmount').value++;
}