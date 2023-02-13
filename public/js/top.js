document.querySelectorAll('.c-placeGroup').forEach(function(elem){
    elem.style.display = "none";
});

function clickFn(id){
  let pref = id.substr(1);
  let each = document.getElementById('e' + pref);
  let all = document.getElementById('all');
  if(each.style.display = "none"){
    all.style.display = "none";
    each.style.display = "block";
  }
}

function backFn(id){
  let pref = id.substr(1);
  let each = document.getElementById('e' + pref);
  let all = document.getElementById('all');
  if(all.style.display = "none"){
    each.style.display = "none";
    all.style.display = "block";
  }
}

document.querySelectorAll('.c-place_zoo').forEach(function(elem){
  elem.style.display = "none";
});
function zooFn(_this){
  let zoo_name = _this.nextElementSibling;
  
  if(zoo_name.style.display == "none"){
    zoo_name.style.display = "block";
    
  }else if(zoo_name.style.display == "block"){
    zoo_name.style.display = "none";
  }
}

document.querySelectorAll('.p-priceAge_item').forEach((elem)=>{
  elem.addEventListener('click', ageFn);
});

document.querySelectorAll('.p-priceEach_item').forEach((elem)=>{
  elem.addEventListener('click', priceAgeFn);
});

function ageFn(e){
  let _this = e.currentTarget;
  let setting = _this.id.slice(0, -1);
  let othera = document.querySelectorAll('.p-priceAge_item');
  let otherp = document.querySelectorAll('.p-priceEach_item');
  let otherz = document.querySelectorAll('.p-priceZoo');
  let zoo = document.getElementById(setting);
  let prnt = _this.parentElement;
  let next = prnt.nextElementSibling;
  let children = next.children;
  let child = [...children];
  
  for(let elem of child){
    let setting =  _this.id + elem.id ; 
    let zoo = document.getElementById(setting);
    if(elem.classList.contains('is_active') && !_this.classList.contains('is_active') ){
      
      for(let e of otherp){
        if(elem.classList.contains('is_active') && !_this.classList.contains('is_active') && e.classList.contains('is_active') ){
          elem.classList.remove('is_active');
          _this.classList.add('is_active');
          zoo.classList.remove('is_show');
          zoo.classList.add('is_show');
          
          for(let e of otherz){
            if(!(e.id == zoo.id)){
              e.classList.remove('is_show');
            }
          }
        }
      }
      
      for(let e of othera){
        if(!(e.id == _this.id)){
          e.classList.remove('is_active');
        }
      }
      
    }
  }
  
  if(!_this.classList.contains('is_active')){
    for(let elem of othera){
      if(!(elem.id == _this.id)){
        elem.classList.remove('is_active');
      }
    }
    
    for(let elem of otherz){
      if(!(elem.id == zoo.id)){
        elem.classList.remove('is_show');
      }
    }
    
    if(!(zoo.classList.contains('is_show')) && !(_this.classList.contains('is_active')) ){
      _this.classList.add('is_active');
      zoo.classList.add('is_show');
    }
  }
  
}

function priceAgeFn(e){
  let _this = e.currentTarget;
  let prnt = _this.parentElement;
  let next = prnt.previousElementSibling;
  let children = next.children;
  let child = [...children];
  let othera = document.querySelectorAll('.p-priceEach_item');
  let otherp = document.querySelectorAll('.p-priceZoo');
  
    for(let elem of child){
      if(elem.classList.contains('is_active')){
        let setting = elem.id + _this.id; 
        let zoo = document.getElementById(setting);
        
        for(let elem of othera){
          if(!(elem.id == _this.id)){
            elem.classList.remove('is_active');
          }
        }
        
        for(let elem of otherp){
          if(!(elem.id == zoo.id)){
            elem.classList.remove('is_show');
          }
        }
    
        if(!(zoo.classList.contains('is_show')) && !(_this.classList.contains('is_active')) ){
          _this.classList.add('is_active');
          zoo.classList.add('is_show');
        }
      }
    }
  
}

