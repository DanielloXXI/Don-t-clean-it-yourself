let selects = document.querySelectorAll('select');
selects.forEach((select)=>{
    select.addEventListener('change', function(evt){
        let div = document.createElement('div');
        div.innerHTML = `
        <div class="mt-2" style="width: 150px;>
            <label class="" for="reason">Причина отмены</label>
            <input class="form-control" type="text" name="reason" id="reason" required>
        </div>`;

        if(this.value==='Отменена'){
            this.after(div)
        }
        else if(this.nextElementSibling){
            this.nextElementSibling.remove()
        }
    })    
})       