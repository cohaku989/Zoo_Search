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