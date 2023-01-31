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
