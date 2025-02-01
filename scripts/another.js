let select = document.querySelector('select');
let div = document.createElement('div');
div.innerHTML = `
        <input type="text" name="another" class="form-control mb-2" id="exampleInputAnother1" aria-describedby="anotherHelp" placeholder='Что нужно сделать?' required>
        <div class="invalid-feedback">
            Введите название другой услуги
        </div>`;
div.setAttribute('class', 'another');
select.addEventListener('change', function () {
    if (this.value === 'Иная услуга') {
        this.after(div)
    }
    else if (this.nextElementSibling.className === 'another') {
        div.remove();
    }
})




