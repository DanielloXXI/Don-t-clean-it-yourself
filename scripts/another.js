let select = document.querySelector('select');
let div = document.createElement('div');
div.innerHTML = `
        <input type="text" name="another" class="form-control mb-2" id="exampleInputAnother1" aria-describedby="anotherHelp" placeholder='Что нужно сделать?' required>
        <div class="invalid-feedback">
            Введите название другой услуги
        </div>`;
     
select.addEventListener('change', function(evt){
    if(this.value==='Иная услуга')this.after(div)
    else div.remove()
})    
        



