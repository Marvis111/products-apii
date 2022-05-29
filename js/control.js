const body = document.querySelector('body'), 
      minus = body.querySelector('.qty i.bx-minus')  
      add = body.querySelector('.qty i.bx-plus'),
      qty = body.querySelector('.qty .form-control');


add.addEventListener('click', () => {
    qty.value++; 
})
minus.addEventListener('click', () => { 
    if(qty.value < 1){
        qty.value.innerHMTL = '0';
    }else{
        qty.value--;
    }
})












