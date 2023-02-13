document.querySelectorAll(`[class^='c-anmlPrnt']`).forEach(function(elem){
    
    elem.addEventListener('click', function(){
        let prnt = this;
        let next = this.nextElementSibling;
        let children = next.children;
        let child = [...children];
        

        child.forEach(function(elem){
                if(elem.style.display == "block"){
                    if(elem.classList.contains(prnt.className)){
                        elem.style.display= "none"
                    }
                }else{
                    elem.style.display= "block"
                }
            
        })
        
    })
})


//zoos/{zoo} map settings
function initMap() {
    let target = document.getElementById('map');
    let geocoder = new google.maps.Geocoder();
    
    geocoder.geocode({ address: address }, function(results, status){
        if(status === 'OK' && results[0]){
            console.log(results[0].geometry.location);
            
            let map = new google.maps.Map(target, {
                center: results[0].geometry.location,
                zoom: 18
            });
            
            let marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                animation: google.maps.Animation.DROP
            });
            
        }
    });

}


//top_animal settings
document.querySelectorAll('.c-animalClass_each').forEach(function(elem){
   elem.addEventListener('click', anmlFn);
});

document.querySelectorAll('.c-animalOrder_each').forEach(function(elem){
   elem.addEventListener('click', anmlFn);
});

function anmlFn(e){
    let target = e.currentTarget;
    let id = target.id;
    let prnt = e.currentTarget.nextElementSibling;
    if(target.classList.contains('c-animalClass_each')){
        let child = prnt.querySelectorAll('.c-animalOrder_each');
        let otherPrnt = document.querySelectorAll('.c-animalClass_each');
        let otherChild = document.querySelectorAll('.c-animalOrder_each');
            for(let elem of otherPrnt){
                if(!(elem.id == id)){
                    elem.classList.remove('is_active');
                }
                elem.querySelectorAll('.c-animalOrder_each').forEach((e)=>{
                    if(!(elem.id == id) && !e.classList.contains('is_active') ){
                        elem.classList.remove('is_active');
                    }
                });
            };
            
            for(let elem of otherChild){
                let prnt1 = elem.parentElement;
                let gPrnt1 = prnt1.parentElement;
                
                //class
                if(!elem.classList.contains(id)){
                    gPrnt1.classList.remove('is_show');
                }
                if(!(elem.id == id)){
                    elem.classList.remove('is_active');
                }
        
            };
            
            target.classList.add('is_active');
            
            for(let elem of child){
                if(elem.classList.contains(id)){
                    prnt.classList.add('is_show');
                }
            };
    
    }else if(target.classList.contains('c-animalOrder_each')){
        let child = prnt.querySelectorAll('.c-animalFamily_each');
        let otherPrnt = document.querySelectorAll('.c-animalOrder_each');
        let otherChild = document.querySelectorAll('.c-animalFamily_each');
            for(let elem of otherPrnt){
                if(!(elem.id == id)){
                    elem.classList.remove('is_active');
                }
                elem.querySelectorAll('.c-animalOrder_each').forEach((e)=>{
                    if(!(elem.id == id) && !e.classList.contains('is_active') ){
                        elem.classList.remove('is_active');
                    }
                });
            };
            
            for(let elem of otherChild){
                let prnt1 = elem.parentElement;
                let gPrnt1 = prnt1.parentElement;
                
                //class
                if(!elem.classList.contains(id)){
                    gPrnt1.classList.remove('is_show');
                }
                if(!(elem.id == id)){
                    elem.classList.remove('is_active');
                }
        
            };
            
            target.classList.add('is_active');
            
            for(let elem of child){
                if(elem.classList.contains(id)){
                    prnt.classList.add('is_show');
                }
            };
    }
    
}

document.querySelectorAll('.c-postLink').forEach((elem)=>{
    elem.addEventListener('click', linkFn)
})

function linkFn(e){
    let target = e.currentTarget;
    let next = target.nextElementSibling;
    
    if(!next.classList.contains('is_show') && !target.classList.contains('is_active')){
        target.classList.add('is_active');
        next.classList.add('is_show');
    }else if(!next.classList.contains('is_show') && target.classList.contains('is_active')){
        next.classList.add('is_show');
    }else if(next.classList.contains('is_show') && target.classList.contains('is_active')){
        next.classList.remove('is_show');
        target.classList.remove('is_active');
    }
}