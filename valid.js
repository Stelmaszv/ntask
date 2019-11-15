const select=document.querySelector('.type')
const form=document.querySelector('.form')
const var2=document.querySelector('.secundval')
select.addEventListener("change", function(){
    if(select.value==='rectangle'){
        var2.style.display='block';
    }else{
        var2.style.display='none';
    }
});


