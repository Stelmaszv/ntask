from tkinter import messagebox
class abstractvalid:
    def __init__(self,object,index):
        self._data=object
        self.errorlist = 0
        self._var = self._data.arr[index].get();
    def abstractvalid(self):
        pass
    def valid(self):
        emptyError='fields ' + self.classname() + ' is epmty'
        if isinstance(self._var, str):
            if len(self._var) > 0:
                return self.abstractvalid()
            else:
                return emptyError
        else:
            if self._var > 0:
                return self.abstractvalid()
            else:
                return emptyError
    def classname(self):
        return  self.__class__.__name__;
class type(abstractvalid):
    def valid(self):
        if self._var<=-1 or self._var>=3:
            self.errorlist = 1
            return 'type must be in rage 0-2'
class v2(abstractvalid):
    def valid(self):
        if self._data.arr[1].get() == 1 and  self._var<1:
            self.errorlist = 1
            return 'v2 is undefined for rectangle !'
class uqniq(abstractvalid):
    def valid(self):
        items=self._data.itemslist
        uniq=0
        for item in range(0, len(items)):
            for i in range(0, len(self._data.arr)):
                if items[item].data[i] == self._data.arr[i].get():
                    uniq=uniq+1
        if uniq == len(self._data.arr):
            self.errorlist = 1
            return 'This Geometric shape is not uqniq'
class mainvalidate:
    def __init__(self,object):
        self._errorlist=[]
        validator=validObserver()
        validator.attach(abstractvalid(object,0))
        validator.attach(type(object,1))
        validator.attach(abstractvalid(object,2))
        validator.attach(v2(object,3))
        validator.attach(uqniq(object, 3))
        validator.notify()
        self._errorlist=validator.returnErros()

    def ifValaidated(self):
        if len(self._errorlist)==0:
            return 1
        return 0
    def returnErrors(self):
        returnvar=''
        for x in self._errorlist:
            returnvar+=x+'\n'
        messagebox.showerror("Vlid Error",returnvar)

class validObserver:
    def __init__(self):
        self._observers = []
        self._errorList=[]
    def attach(self, observer):
        if observer not in self._observers:
            self._observers.append(observer)
    def notify(self):
        for observer in self._observers:
            Data=observer.valid()
            if observer.errorlist:
                self._errorList.append(Data)
    def returnErros(self):
        return self._errorList
