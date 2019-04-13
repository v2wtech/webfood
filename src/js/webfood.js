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
let loadModalProducts = () => {
          
    $('.product').forEach(product => product.onclick = () => {
        // $('#inImageProduct').src = product.children[0].currentSrc;
        $('#inDescriptionProduct').innerHTML = product.children[1].innerHTML;
        $('#inPriceProduct').innerHTML =  product.children[2].innerHTML;
    });

   
}

let lessProduct = () => {
    if($('#inAmount').value > 1 )
        $('#inAmount').value--;
}

let moreProduct = () => {
    $('#inAmount').value++;
}