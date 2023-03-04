

document.querySelectorAll('.c-place_group').forEach(function(elem){
    elem.style.display = "none";
});

function clickFn(id){
  let pref = id.substr(1);
  let each = document.getElementById('e' + pref);
  let all = document.getElementById('all');
  if(!each.classList.contains('is_gshow')){
    all.classList.remove('is_gshow');
    all.classList.add('is_ungshow');
    each.classList.remove('is_ungshow');
    each.classList.add('is_gshow');
  }
}

function backFn(id){
  let pref = id.substr(1);
  let each = document.getElementById('e' + pref);
  let all = document.getElementById('all');
  if(all.classList.contains('is_ungshow')){
    each.classList.remove('is_gshow');
    each.classList.add('is_ungshow');
    all.classList.remove('is_ungshow');
    all.classList.add('is_gshow');
  }
}

document.querySelectorAll('.c-place_zoo').forEach(function(elem){
  elem.style.display = "none";
});
function zooFn(_this){
  let zoo_name = _this.nextElementSibling;
  
  if(zoo_name.style.display == "none"){
    zoo_name.classList.remove('fadeOut');
    zoo_name.style.display = "flex";
    zoo_name.classList.add('fadeIn');
    
  }else if(zoo_name.style.display == "flex"){
    zoo_name.classList.add('fadeOut');
    window.setTimeout(function(){
      zoo_name.style.display = "none";
    }, 400);
    zoo_name.classList.remove('fadeIn');
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
      let tr = other.classList.contains('is_gshow');
      if(tr){
        othershow = true;
      }
    }
    
  if(target.classList.contains('p-priceAge_item')){
    let pricetab = document.getElementById('p-priceEach');
    let tageatv = target.classList.contains('is_active');
    let ptabshow = pricetab.classList.contains('is_gshow');
    let ptabflag = pricetab.classList.contains(target.id + 'flag');
    let del = target.id.slice(0, -1);
    let all = document.getElementById(del);
    
    for(let age of ages){
      
      if(!tageatv && !priceatv && !othershow && !ageatv && !ptabshow && !ptabflag && (age.id != target.id)){
        
        target.classList.add('is_active');
        pricetab.classList.remove('is_ungshow');
        pricetab.classList.add('is_gshow' , target.id + 'flag');
        all.classList.remove('is_ungshow');
        all.classList.add('is_gshow');
        return;
        
      }else if(tageatv && !priceatv && othershow && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        
        target.classList.remove('is_active');
        window.setTimeout(function(){
          pricetab.classList.remove('is_gshow', target.id + 'flag');
          all.classList.remove('is_gshow');  
        }, 250);
        pricetab.classList.add('is_ungshow');
        all.classList.add('is_ungshow');
        return;
        
      }else if(!tageatv && !priceatv && othershow && ageatv && ptabshow && !ptabflag && (age.id != target.id)){
        for(let other of others){
          age.classList.remove('is_active');
          pricetab.classList.remove(age.id + 'flag');
          other.classList.remove('is_gshow');
                  
          pricetab.classList.add(target.id + 'flag');
          target.classList.add('is_active');
          all.classList.remove('is_ungshow');
          all.classList.add('is_gshow');
        }
      }else if(!tageatv && priceatv && othershow && ageatv && ptabshow && !ptabflag && (age.id != target.id)){
        for(let price of prices){
          for(let other of others){
            other.classList.remove('is_gshow');
            age.classList.remove('is_active');
            price.classList.remove('is_active');
            pricetab.classList.remove(age.id + 'flag');
                  
            target.classList.add('is_active');
            pricetab.classList.add('is_gshow' , target.id + 'flag');
            all.classList.remove('is_ungshow');
            all.classList.add('is_gshow');
          }
        }
      }else if(tageatv && priceatv && othershow && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        for(let price of prices){
          for(let other of others){
            age.classList.remove('is_active');
            price.classList.remove('is_active');
            window.setTimeout(function(){
              other.classList.remove('is_gshow');
              pricetab.classList.remove(age.id + 'flag', 'is_gshow');
            }, 250);
            pricetab.classList.add('is_ungshow');
            other.classList.add('is_ungshow');
          }
        }
      }else if(tageatv && !priceatv && ageatv && ptabshow && ptabflag && (age.id == target.id)){
        for(let price of prices){
          age.classList.remove('is_active');
          price.classList.remove('is_active');
          pricetab.classList.remove(age.id + 'flag', 'is_gshow');
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
    let tshow = tcontent.classList.contains('is_gshow');
    let del = flag.slice(0, -5);
    let all = document.getElementById(del);

    for(let price of prices){
      
      if(!tprice && !tshow && all.classList.contains('is_gshow') && (price.id != target.id) && !priceatv){
        target.classList.add('is_active');
        all.classList.remove('is_gshow', 'is_ungshow');
        tcontent.classList.remove('is_ungshow');
        tcontent.classList.add('is_gshow');
      }else if(tprice && tshow && !all.classList.contains('is_gshow') ){
        target.classList.remove('is_active');
        tcontent.classList.remove('is_gshow');
        all.classList.add('is_gshow');
      }else if(!tprice && !tshow && !all.classList.contains('is_gshow') && othershow && priceatv && (target.id != price.id)){
        for(let other of others){
          price.classList.remove('is_active');
          other.classList.remove('is_gshow');
          target.classList.add('is_active');
          tcontent.classList.remove('is_ungshow');
          tcontent.classList.add('is_gshow');
        }
      }
    }
  }
  
}

let bar = document.getElementById('humburger');
let nav = document.getElementById('sp_nav');

bar.addEventListener('click', function(e){
  
  if(!e.currentTarget.classList.contains('is_active')){
    e.currentTarget.classList.remove('is_unactive');
    e.currentTarget.classList.add('is_active');
    
    nav.classList.remove('is_hide');
    nav.classList.add('is_tshow');
  }else if(!e.currentTarget.classList.contains('is_unactive') && e.currentTarget.classList.contains('is_active')){
    e.currentTarget.classList.remove('is_active');
    e.currentTarget.classList.add('is_unactive');
    nav.classList.add('is_hide');
    nav.classList.remove('is_tshow');
  }else if(e.currentTarget.classList.contains('is_unactive') && !e.currentTarget.classList.contains('is_active')){
    e.currentTarget.classList.remove('is_unactive');
    e.currentTarget.classList.add('is_active');
    nav.classList.remove('is_hide');
    nav.classList.add('is_tshow');
  }
})