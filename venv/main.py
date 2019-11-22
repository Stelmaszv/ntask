from tkinter import*
import tkinter.messagebox
from count import mianCount
from validate import mainvalidate
from objectscolection  import objectlist,item
class Start:
    def __init__(self,root):
        self.objl = objectlist()
        self.items=[]
        self.mianview([]);
    def count(self):
        valid=mainvalidate(self)
        if valid.ifValaidated():
            addobject=mianCount(self)
        else:
            valid.returnErrors()
    def mianview(self,items):
        width = 1980
        height = 1050
        self.itemslist=items
        self.root = root
        self.root.title("ntask")
        self.root.geometry("1980x1050")
        self.root.config(bg="cadet blue")

        self.arr = []
        self.arr = [StringVar(), IntVar(), IntVar(), IntVar()]

        self.MainFrame = Frame(self.root, bg="cadet blue")
        self.MainFrame.grid();

        self.TitFrame = Frame(self.MainFrame, bd=2, padx=54, pady=8, bg="Ghost White", relief=RIDGE)
        self.TitFrame.pack(side=TOP)
        self.lblTit = Label(self.TitFrame, font=('arial', 47, 'bold'), text='ntask python version', bg="Ghost White")
        self.lblTit.grid()
        self.contFrame(items)
        self.form()


    def form(self):
        width = 1980
        height = 1050
        self.ButtonFrameL = Frame(self.MainFrame, bd=2, width=width / 2, height=height, padx=18, pady=10,bg="Ghost White", relief=RIDGE)
        self.ButtonFrameL.pack(side=LEFT)
        self.colorname = Label(self.ButtonFrameL, font=('arial', 20, 'bold'), text='Color', bg="Ghost White")
        self.colorname.grid(row=0, column=1)
        self.inputcolor = Entry(self.ButtonFrameL, font=('arial', 20, 'bold'), textvariable=self.arr[0], width=39)
        self.inputcolor.grid(row=1, column=1)

        self.typename = Label(self.ButtonFrameL, font=('arial', 20, 'bold'),text='Geometric shape type:   0 squere 1 rectangle 2 circle', bg="Ghost White")
        self.typename.grid(row=2, column=1)
        self.inputtype = Entry(self.ButtonFrameL, font=('arial', 20, 'bold'), textvariable=self.arr[1], width=39)
        self.inputtype.grid(row=3, column=1)

        self.v1 = Label(self.ButtonFrameL, font=('arial', 20, 'bold'),text='side wall or height or radius of the circle', bg="Ghost White")
        self.v1.grid(row=4, column=1)
        self.inputv1 = Entry(self.ButtonFrameL, font=('arial', 20, 'bold'), textvariable=self.arr[2], width=39)
        self.inputv1.grid(row=5, column=1)

        self.v2 = Label(self.ButtonFrameL, font=('arial', 20, 'bold'), text='secund side wall (only if rectangle)',
                        bg="Ghost White")
        self.v2.grid(row=6, column=1)
        self.inputv2 = Entry(self.ButtonFrameL, font=('arial', 20, 'bold'), textvariable=self.arr[3], width=39)
        self.inputv2.grid(row=7, column=1)

        self.submit = Button(self.ButtonFrameL, text="Add new", width=39, command=self.count)
        self.submit.grid(row=8, column=1)
    def contFrame(self,itemslist):
        width = 1980
        height = 1050
        self.objl.setitem(self.itemslist)
        self.RightFrame = Frame(self.MainFrame, bd=2, width=10000, height=height, padx=18, pady=10,bg="Ghost White", relief=RIDGE)
        self.title = Label(self.RightFrame, font=('arial', 20, 'bold'),text='List of objects :', bg="Ghost White")
        self.title.grid(row=0, column=0)
        self.title = Label(self.RightFrame, font=('arial', 20, 'bold'),text=len(self.itemslist), bg="Ghost White")
        self.title.grid(row=0, column=1)
        self.title = Label(self.RightFrame, font=('arial', 20, 'bold'),text=self.objl.showitems(), bg="Ghost White")
        self.title.grid(row=1, column=0)
        self.RightFrame .pack(side=RIGHT)
if __name__=='__main__':
    root=Tk()
    application=Start(root)
    root.mainloop();
