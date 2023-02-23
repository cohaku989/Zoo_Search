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
document.querySelectorAll('.c-animal_classItem').forEach(function(elem){
   elem.addEventListener('click', anmlFn);
});

document.querySelectorAll('.c-animal_orderItem').forEach(function(elem){
   elem.addEventListener('click', anmlFn);
});

function anmlFn(e){
    let prnt = e.currentTarget;
    let pid = prnt.id;
    let anmlcs = document.querySelectorAll('.c-animal_classItem');
    let anmlos = document.querySelectorAll('.c-animal_orderItem');
    let anmlfs = document.querySelectorAll('.c-animal_familyItem');
    
        let active = prnt.classList.contains('is_active');
        for(let anmlc of anmlcs){
            if(anmlc.id == pid && !active){
                anmlc.classList.add('is_active');
            }else if(anmlc.id == pid && active){
                anmlc.classList.remove('is_active');
            }else if(anmlc.id != pid && prnt.classList.contains('c-animal_classItem')){
                anmlc.classList.remove('is_active');
            }
        }
        
        for(let anmlo of anmlos){
            let show = anmlo.parentElement.classList.contains('is_show');
            let child = anmlo.classList.contains(pid);
            
            if(!active && child){
                anmlo.parentElement.classList.add('is_show');
            }else if(active && child && show){
                anmlo.parentElement.classList.remove('is_show');
            }else if(!child && prnt.classList.contains('c-animal_classItem')){
                anmlo.parentElement.classList.remove('is_show');
            }
        }
        
        for(let anmlo of anmlos){
            if(anmlo.id == pid && !active){
                anmlo.classList.add('is_active');
            }else if(anmlo.id == pid && active){
                anmlo.classList.remove('is_active');
            }else if(anmlo.id != pid){
                anmlo.classList.remove('is_active');
            }
        }
        
        for(let anmlf of anmlfs){
            let show = anmlf.parentElement.classList.contains('is_show');
            let child = anmlf.classList.contains(pid);
            
            if(!active && child){
                anmlf.parentElement.classList.add('is_show');
            }else if(active && child && show){
                anmlf.parentElement.classList.remove('is_show');
            }else if(!child){
                anmlf.parentElement.classList.remove('is_show');
            }
        }

}

document.querySelectorAll('.links').forEach((elem)=>{
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