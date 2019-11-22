from tkinter import*
import tkinter.messagebox
import turtle
from objectscolection import item
class Count():
    # abstract method
    def __init__(self, object):
        self._data= object.arr
    def surfacearea(self):
        pass
    def classname(self):
        return  self.__class__.__name__;
class squere(Count):
    # overriding abstract method
    def surfacearea(self):
        return self._data[2].get()*self._data[2].get()

class rectangle(Count):
    # overriding abstract method
    def surfacearea(self):
        return self._data[2].get()*self._data[3].get()

class circle(Count):
    # overriding abstract method
    def surfacearea(self):
        pi=3.14
        return self._data[2].get() * self._data[2].get()*pi


class mianCount:
    def __init__(self,object):
        self.__object=object
        object.MainFrame.destroy()
        self.__objectslist = []
        self.__objectslist = [squere(object), rectangle(object), circle(object)]
        surfacearea_Objdata =self.__objectslist[object.arr[1].get()].surfacearea()
        type = self.__objectslist[object.arr[1].get()].classname()
        self.__data=[object.arr[0].get(),object.arr[1].get(),object.arr[2].get(),object.arr[3].get(),surfacearea_Objdata]

        self.__MainFrame = Frame(self.__object.root, bg="cadet blue")
        self.__MainFrame.grid();

        self.__TitFrame = Frame(self.__MainFrame, bd=2, padx=54, pady=8, bg="Ghost White", relief=RIDGE)
        self.__TitFrame.pack(side=TOP)
        mess = 'New Geometric shape has been created '
        color = 'Color : ' + object.arr[0].get()
        surfacearea = 'Surfacearea : ' + str(surfacearea_Objdata)
        type = 'type : ' + str(type)
        self.__lblTit = Label(self.__TitFrame, font=('arial', 47, 'bold'), text=mess, bg="Ghost White")
        self.__lblTit.grid(row=0, column=1)

        self.__colorname = Label(self.__TitFrame, font=('arial', 20, 'bold'), text=color, bg="Ghost White")
        self.__colorname.grid(row=1, column=1)

        self.__colorname = Label(self.__TitFrame, font=('arial', 20, 'bold'), text=surfacearea, bg="Ghost White")
        self.__colorname.grid(row=3, column=1)

        self.__colorname = Label(self.__TitFrame, font=('arial', 20, 'bold'), text=type, bg="Ghost White")
        self.__colorname.grid(row=4, column=1)

        self.__submit = Button(self.__TitFrame, text="Add new", width=39, command=self.addtoCollection)
        self.__submit.grid(row=5, column=1)

    def addtoCollection(self):
        self.__MainFrame.destroy()
        self.__object.items.append(item(self.__data))
        self.__object.mianview(self.__object.items)





