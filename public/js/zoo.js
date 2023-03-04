document.querySelectorAll('.c-anmlPrnt').forEach(function(elem){
    
    elem.addEventListener('click', function(){
        let prnt = this;
        let next = this.nextElementSibling;
        let children = next.children;
        let child = [...children];
        
        
        for(let i = 0; i<child.length; i++){
        
            if(!next.classList.contains("is_gshow") && child[i].classList.contains(prnt.id) ){
                next.classList.remove("close");
                next.classList.add("is_gshow", "open");
                break;
            }else if(next.classList.contains("is_gshow") && child[i].classList.contains(prnt.id) ){
                next.classList.add("close");
                window.setTimeout(function(){
                    next.classList.remove("is_gshow", "open");
                }, 480);
                break;
            }
        }
        
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
                anmlc.classList.remove('is_unactive');
                anmlc.classList.add('is_active');
            }else if(anmlc.id == pid && active){
                anmlc.classList.remove('is_active');
                anmlc.classList.add('is_unactive');
            }else if(anmlc.id != pid && prnt.classList.contains('c-animal_classItem')){
                anmlc.classList.remove('is_active');
            }
        }
        
        for(let anmlo of anmlos){
            let show = anmlo.parentElement.classList.contains('is_gshow');
            let child = anmlo.classList.contains(pid);
            
            if(!active && child){
                anmlo.parentElement.classList.remove('is_ungshow');
                anmlo.parentElement.classList.add('is_gshow');
            }else if(active && child && show){
                window.setTimeout(function(){
                    anmlo.parentElement.classList.remove('is_gshow');
                },  250);
                anmlo.parentElement.classList.add('is_ungshow');
            }else if(!child && prnt.classList.contains('c-animal_classItem')){
                anmlo.parentElement.classList.remove('is_gshow');
            }
        }
        
        for(let anmlo of anmlos){
            if(anmlo.id == pid && !active){
                anmlo.classList.remove('is_unactive');
                anmlo.classList.add('is_active');
            }else if(anmlo.id == pid && active){
                anmlo.classList.remove('is_active');
                anmlo.classList.add('is_unactive');
            }else if(anmlo.id != pid){
                anmlo.classList.remove('is_active');
            }
        }
        
        for(let anmlf of anmlfs){
            let show = anmlf.parentElement.classList.contains('is_gshow');
            let child = anmlf.classList.contains(pid);
            
            if(!active && child){
                anmlf.parentElement.classList.remove('is_ungshow');
                anmlf.parentElement.classList.add('is_gshow');
            }else if(active && child && show){
                window.setTimeout(function(){
                    anmlf.parentElement.classList.remove('is_gshow');
                }, 250);
                anmlf.parentElement.classList.add('is_ungshow');
            }else if(!child){
                anmlf.parentElement.classList.remove('is_gshow');
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
        next.classList.remove('is_unshow');
        next.classList.add('is_show');
    }else if(!next.classList.contains('is_show') && target.classList.contains('is_active')){
        next.classList.remove('is_unshow');
        next.classList.add('is_show');
    }else if(next.classList.contains('is_show') && target.classList.contains('is_active')){
        window.setTimeout(function(){
            next.classList.remove('is_show');
        }, 250);
        next.classList.add('is_unshow');
        target.classList.remove('is_active');
    }
}

//zoos/show
let fwrap = document.querySelectorAll('.p-zooCat_fWrap');
window.addEventListener('load', function(){
    fwrap.forEach((elem)=>{
        let children = elem.children;
        if(children.length == 1){
            elem.previousElementSibling.classList.add('is_none');
        }
    });
})


document.querySelectorAll('.p-zooCat_order').forEach((elem)=>{
   elem.addEventListener('click', animalCat); 
});

function animalCat (e){
    let target = e.currentTarget;
    let next = target.nextElementSibling;
    let show = next.classList.contains('is_gshow');
    let nextchild = next.children;
    let other = document.querySelectorAll('.p-zooCat_fWrap');
    
    for(let i = 0; i<other.length; i++){
        if(!show && nextchild.length > 1 && next == other[i]){
            next.classList.remove('fadeOut');
            next.classList.add('is_gshow', 'fadeIn');
        }else if(show && nextchild.length > 1 && next == other[i]){
            window.setTimeout(function(){
                next.classList.remove('is_gshow', 'fadeIn');
            }, 400);
            next.classList.add('fadeOut');
        }else if(!show && other[i].classList.contains('is_gshow') && next != other[i] && nextchild.length > 1){
            window.setTimeout(function(){
                other[i].classList.remove('is_gshow', 'fadeIn');
            }, 400);
            other[i].classList.add('fadeOut');
            next.classList.add('is_gshow', 'fadeIn');
        }
    }
}

document.querySelectorAll('.p-zooCat_class').forEach((elem)=>{
   elem.addEventListener('click', animalC); 
});

function animalC (e){
    let target = e.currentTarget;
    let next = target.nextElementSibling;
    let show = next.classList.contains('is_gshow');
    let other = document.querySelectorAll('.p-zooCat_oWrap');
    
    for(let i = 0; i<other.length; i++){
        if(!show != 0 && next == other[i]){
            
            target.classList.add('is_active');
            next.classList.remove('close');
            next.classList.add('is_gshow', 'open');
        }else if(show != 0 && next == other[i]){
            window.setTimeout(function(){
                next.classList.remove('is_gshow', 'open');
            }, 450);
            next.classList.add('close');
            target.classList.remove('is_active');
        }
    }
}