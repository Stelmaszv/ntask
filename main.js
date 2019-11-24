const form=$(".form");
const select=$(".type")
const var2=$(".secundval")
const erroslist=$(".erroslist")
const PI=3.1415
$(document).ready(function(){
    select.on("change", function(){
        if(select.val()==='1'){
            var2.slideDown('slow');
        }else{
            var2.slideUp('slow');
        }
    });
    let colectionlist = new colection()
    form.on("submit",function(e){
        e.preventDefault()
        valid= new validate()
        if(valid.ifvalid()){
            mian = new maincount(select,colectionlist,form)
        }else{
            valid.showEroor()
        }
        
    })
})
class item{
    constructor(data){
        this.data=data
    }
}
class colection{
    #objects=[]
    #objectsList=$(".objectsList");
    #errorlistElement=$(".erroslist");
    add(item){
        if(this.ifunique(item)){
            this.#objects.push(item)
            this.showItems()
        }else{
            this.#errorlistElement.html('')
            this.#errorlistElement.slideDown()
            this.#errorlistElement.append('<li>This objects is not unique</li>')
        }
    }
    ifunique(el){
        let index=0
        let color=false
        let type=false
        let v1=false
        let v2=false
        for(let item of this.#objects){
            if(this.#objects[index].data.color==el.data.color ){
                color=true
            }
            if(this.#objects[index].data.type==el.data.type){
                type=true
            }
            if(this.#objects[index].data.v1==el.data.v1){
                v1=true
            }
            if(this.#objects[index].data.v2==el.data.v2){
                v2=true
            }
            index=index+1
        }
        if(color && type && v1  && type!=1){
            return false
        }
        if(color && type && v1 && v2 && type==1){
            return false
        }
        return true
    }
    showItems(){
        this.#errorlistElement.slideUp()
        this.#objectsList.html('')
        this.#errorlistElement.html('')
        for(let item of this.#objects){
            this.#objectsList.append( '<li><span>color:<b>'+item.data.color+'</b>,type:<b>'+this.convertInt(item.data.type)+'</b>,v1:<b>'+item.data.v1+'</b>,v2:<b>'+item.data.v2+'</b>,surfacearea:<b>'+item.data.surfacearea+'</b></span></li>' )
        }
    }
    convertInt(el){
        switch(el){
            case '0':
                return 'square'
            break
            case '1':
                return 'rectangle'
            break
            case '2':
                return 'circle'
            break
        }
    }
}
class count {
    constructor() {
        if (this.constructor === count) {
            throw new TypeError('Abstract class "count" cannot be instantiated directly.'); 
        }
    }
    count(){}
}
class countSquare extends count{
    count(){
        let var1=$(".v1").val()
        return var1*var1;
    }
}
class countRectangle extends count{
    count(){
        let var1=$(".v1").val()
        let var2=$(".v2").val()
        return var1*var2;
    }
}
class countCircle extends count{
    count(){
        let var1=$(".v1").val()
        return var1*var1*PI;
    }
}
class maincount{
    constructor(select,colection,form){
        let objects = [new countSquare,new countRectangle,new countCircle]
        let surfacearea=objects[select.val()].count()
        colection.add(new item({'color':$(".color").val(),'type':$(".type").val(),'v1':$(".v1").val(),'v2':$(".v2").val(),'surfacearea':surfacearea}))
    } 
}
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
        if(this.item.val()==1 && var2.val()<1){
            this.stan=true;
            return 'v2 is undefined for rectangle !'
        }
    }
}
class validate{
    #errorlist=[]
    #errorlistElement=$(".erroslist");
    constructor(){
        let validateList=new validatorobserver();
        validateList.add(new mianvalid('.color'))
        validateList.add(new validType('.type'))
        validateList.add(new mianvalid('.v1'))
        validateList.validateStart();
        this.#errorlist=validateList.errors
    }
    ifvalid(){
       if(!this.#errorlist.length){
           return true;
       }
       return false
    }
    showEroor(){
        this.#errorlistElement.slideDown()
        this.#errorlistElement.html('')
        for(let item of this.#errorlist){
            this.#errorlistElement.append( '<li>'+item+'</li>' )
        }
    }
}
class validatorobserver{
    #validators=[]
    constructor(){
        this.errors=[]
    }
    add(object) {
        this.#validators.push(object)    
    }
    validateStart(){
        for(let item of this.#validators){
            let el=item.valid();
            if(item.stan){
                this.errors.push(el)
            }
        }
    }
}