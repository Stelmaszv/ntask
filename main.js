const form=$(".form");
const select=document.querySelector('.type')
const var2=document.querySelector('.secundval')
select.addEventListener("change", function(){
    if(select.value==='rectangle'){
        var2.style.display='block';
    }else{
        var2.style.display='none';
    }
});
form.on("submit",function(e){
    e.preventDefault()
    valid= new validate()
    if(valid.ifvalid()){
        
    }else{
        valid.showEroor()
    }
})
class mianvalid{
  constructor(item){
    this.item=$(item)
    this.stan=false
    this.name=this.item.attr('name')
  }
  valid(){
    if(!this.item.val()){
        this.stan=true;
        return 'field '+this.name+' is undefined'
    }
    return this.set()
  }
  set(){}
}
class validType extends mianvalid{
    set(){
        let var2=$(".v2")
        if(this.item.val()=='rectangle' && var2.val()<1){
            this.stan=true;
            return 'v2 is undefined for rectangle !'
        }
    }
}
class validate{
    constructor(){
        let validateList=new validatorobserver();
        validateList.add(new mianvalid('.color'))
        validateList.add(new validType('.type'))
        validateList.add(new mianvalid('.v1'))
        validateList.validateStart();
        this.errorlist=validateList.errors
        this.errorlistElement=$(".erroslist");
    }
    ifvalid(){
        return false
    }
    showEroor(){
        this.errorlistElement.html('')
        for(let item of this.errorlist){
            this.errorlistElement.append( '<li>'+item+'</li>' )
        }
    }
}
class validatorobserver{
    constructor(){
        this.validators=[]
        this.errors=[]
    }
    add(object) {
        this.validators.push(object)    
    }
    validateStart(){
        for(let item of this.validators){
            let el=item.valid();
            if(item.stan){
                this.errors.push(el)
            }
        }
    }
}