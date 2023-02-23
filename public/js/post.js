document.querySelectorAll('.datalist').forEach((elem)=>{
    elem.addEventListener('change', select)
});

function select(e){
    let show = e.target;//posted_zoo_show
    let foption = e.target.nextElementSibling;//zoo_foptions
    let hidden = foption.nextElementSibling;//posted_zoo_hide
    let foptions = show.list.options;
    
    for(let i = 0; i<foptions.length; i++){
        let val = foption.options[i].value;
        if(val == e.target.value){
            let id = foption.options[i].getAttribute('data-id');
            hidden.setAttribute('value', id);
            return;
        }else {
            hidden.setAttribute('value', "");
        }
    }
    
}

if(document.formEdit){
    let z = document.getElementById('posted_zoo_hide');
    let zshow = document.getElementById('posted_zoo_show');
    let zval = z.getAttribute('data-val');
    let a = document.getElementById('posted_animal_hide');
    let ashow = document.getElementById('posted_animal_show');
    let aval = a.getAttribute('data-val');
    
    zshow.setAttribute('value', zval);
    ashow.setAttribute('value', aval);
}


//
document.querySelectorAll('.preview').forEach((elem)=>{
    elem.addEventListener('change', imgPreview)
});

function imgPreview(e) {
    let target = e.currentTarget;
    let input = target.files[0];
    let label = document.getElementById('imgLabel');
    let img = document.getElementById('preview_area');
    let name = document.getElementById('file_name');
    
    if(input != "undefined" && input != null){
        
        let fileReader = new FileReader();
        fileReader.onload = (function(){
            img.src = fileReader.result;
        });
        fileReader.readAsDataURL(input);
        img.classList.add('is_show');
        label.innerHTML = "画像変更";
        name.innerHTML = input.name;
        name.classList.add('is_show');
        
    }else {
        img.src = "";
        label.innerHTML = "画像未選択";
        img.classList.remove('is_show');
        name.classList.remove('is_show');
    }
}