const $ = function(selector){
    return (document.querySelectorAll(selector).length > 1) ? 
        document.querySelectorAll(selector):document.querySelectorAll(selector)[0]
}.bind(document)



let loadFuncTables = () => {
    for(var i=0;i<$('.table').length;i++){
        $('.table')[i].addEventListener('click', function(el){
            $('#inTable').value = el.target.innerHTML
        })
    }          
}

