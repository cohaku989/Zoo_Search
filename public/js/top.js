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


//top-price
document.querySelectorAll('.p-priceAge_item').forEach((elem)=>{
  elem.addEventListener('click', tabFn);
});

document.querySelectorAll('.p-priceEach_item').forEach((elem)=>{
  elem.addEventListener('click', tabFn);
});

function tabFn(e){
  let target = e.currentTarget;
  let ages = document.querySelectorAll('.p-priceAge_item');
  let prices = document.querySelectorAll('.p-priceEach_item');
  let others = document.querySelectorAll('.p-priceZoo');
  
    let ageatv;
    for(let age of ages){
      let tr = age.classList.contains('is_active');
      if(tr){
        ageatv = true;
      }
    }
    
    let priceatv;
    for(let price of prices){
      let tr = price.classList.contains('is_active');
      if(tr){
        priceatv = true;
      }
    }
    
    let othershow; 
    for(let other of others){
      let tr = other.classList.contains('is_show');
      if(tr){
        othershow = true;
      }
    }
    
  if(target.classList.contains('p-priceAge_item')){
    let pricetab = document.getElementById('p-priceEach');
    let tageatv = target.classList.contains('is_active');
    let ptabshow = pricetab.classList.contains('is_show');
    let ptabflag = pricetab.classList.contains(target.id + 'flag');
    let del = target.id.slice(0, -1);
    let all = document.getElementById(del);
    
    for(let age of ages){
      
      if(!tageatv && !priceatv && !othershow && !ageatv && !ptabshow && !ptabflag && (age.id != target.id)){
        
        target.classList.add('is_active');
        pricetab.classList.add('is_show' , target.id + 'flag');
        all.classList.add('is_show');
        return;
        
      }else if(tageatv && !priceatv && othershow && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        
        target.classList.remove('is_active');
        pricetab.classList.remove('is_show', target.id + 'flag');
        all.classList.remove('is_show');
        return;
        
      }else if(!tageatv && !priceatv && othershow && ageatv && ptabshow && !ptabflag && (age.id != target.id)){
        for(let other of others){
          age.classList.remove('is_active');
          pricetab.classList.remove(age.id + 'flag');
          other.classList.remove('is_show');
                  
          pricetab.classList.add(target.id + 'flag');
          target.classList.add('is_active');
          all.classList.add('is_show');
        }
      }else if(!tageatv && priceatv && othershow && ageatv && ptabshow && !ptabflag && (age.id != target.id)){
        for(let price of prices){
          for(let other of others){
            other.classList.remove('is_show');
            age.classList.remove('is_active');
            price.classList.remove('is_active');
            pricetab.classList.remove(age.id + 'flag');
                  
            target.classList.add('is_active');
            pricetab.classList.add('is_show' , target.id + 'flag');
            all.classList.add('is_show');
          }
        }
      }else if(tageatv && priceatv && othershow && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        for(let price of prices){
          for(let other of others){
            other.classList.remove('is_show');
            age.classList.remove('is_active');
            price.classList.remove('is_active');
            pricetab.classList.remove(age.id + 'flag', 'is_show');
          }
        }
      }else if(tageatv && !priceatv && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        for(let price of prices){
          age.classList.remove('is_active');
          price.classList.remove('is_active');
          pricetab.classList.remove(age.id + 'flag', 'is_show');
        }
      }else if(!tageatv && priceatv && ageatv && ptabshow && !ptabflag && (age.id != target.id)){
        for(let price of prices){
          age.classList.remove('is_active');
          price.classList.remove('is_active');
          pricetab.classList.remove(age.id + 'flag');
          target.classList.add('is_active');
          pricetab.classList.add(target.id + 'flag');
        }
      }
    }
    
  }else if(target.classList.contains('p-priceEach_item')){
    let flagnm = target.parentElement.className.split(' ');
    let count = -1;
    let num;
    
    for(let flag of flagnm ){
      count +=1;
      let flags = flag.indexOf('flag');
      if(flags != -1){
        num = count;
      }
    }

    let flag = flagnm[num].toString();
    let ageId = flag.replace('flag', '');
    let priceId = target.id;
    let tcontent = document.getElementById(ageId + priceId);
    let tprice = target.classList.contains('is_active');
    let tshow = tcontent.classList.contains('is_show');
    let del = flag.slice(0, -5);
    let all = document.getElementById(del);

    for(let price of prices){
      
      if(!tprice && !tshow && all.classList.contains('is_show') && (price.id != target.id) && !priceatv){
        target.classList.add('is_active');
        all.classList.remove('is_show');
        tcontent.classList.add('is_show');
      }else if(tprice && tshow && !all.classList.contains('is_show') ){
        target.classList.remove('is_active');
        tcontent.classList.remove('is_show');
        all.classList.add('is_show');
      }else if(!tprice && !tshow && !all.classList.contains('is_show') && othershow && priceatv && (target.id != price.id)){
        for(let other of others){
          price.classList.remove('is_active');
          other.classList.remove('is_show');
          target.classList.add('is_active');
          tcontent.classList.add('is_show');
        }
      }
    }
  }
  
}