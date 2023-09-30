import tkinter as tk
from tkinter import Menu
from alunos import cadastroAluno

def criar_tela_cadastro_aluno():
    cadastroAluno.abrir_tela_cadastro_aluno()

janela = tk.Tk()
janela.title("Menu de Alunos")

menubar = Menu(janela)

menu_alunos = Menu(menubar, tearoff=0)
menu_alunos.add_command(label="Cadastro", command=criar_tela_cadastro_aluno)

menubar.add_cascade(label="Alunos", menu=menu_alunos)

janela.config(menu=menubar)

janela.mainloop()