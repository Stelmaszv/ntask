from tkinter import*
import tkinter.messagebox
class item:
    def __init__(self, data):
        self.data=data
class objectlist:
    def showitems(self):
        string=''
        for i in range(0, len(self.__items) ):
            string +=' Color :  '+self.__items[i].data[0]
            string +=' type  :  '+self.convertype(self.__items[i].data[1])
            string += ' v1   :  '+str(self.__items[i].data[2])
            if self.__items[i].data[1] == 1:
                string += ' v2 : ' + str(self.__items[i].data[3])
            string += ' sefece area : ' + str(self.__items[i].data[4])
            string +='\n'
        return string
    def convertype(self,el):
        switcher = {
            0: "squere",
            1: "rectangle",
            2: "circle",
        }
        return switcher.get(el, "nothing")
    def objectcount(self):
        return len(self.__items)
    def rerturnArray(self):
        return self.items
    def setitem(self,array):
        self.__items=array;


