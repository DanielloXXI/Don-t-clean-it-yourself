let previousChoice; // Кто был выбран в прошлый раз?
let div = document.createElement('div');
div.className = "another-input";
div.innerHTML = `
        <input type="text" name="another" class="form-control mb-2" id="exampleInputAnother1" aria-describedby="anotherHelp" value="clean6" required>
        <div class="invalid-feedback">
            Введите название другой услуги
        </div>`;
     
document.querySelectorAll('input[type="radio"][name="flexRadioDefault"]').forEach((button) => {
    button.addEventListener('change', function (evt) {
        if (this.checked) {
            if (this.className === "form-check-input another") {
                this.parentNode.after(div);
            } else if (previousChoice != null && previousChoice.className === 'form-check-input another') {
                div.remove();
            }
            previousChoice = this;
        }
    });
});

        



