import tkinter as tk
from tkinter import ttk
from tkcalendar import DateEntry

def faixa_selecionada(event):
    selected_option = combo.get()

def abrir_tela_cadastro_aluno():
    janela = tk.Tk()
    janela.title("Cadstro Aluno")

    nome_label = ttk.Label(janela, text='Nome Completo:')
    nome_label.grid(row=0, column=0, padx=10, pady=5, sticky='w')

    nome_entry = ttk.Entry(janela)
    nome_entry.grid(row=0, column=1, padx=10, pady=5, sticky='w')  
    idade_label = ttk.Label(janela, text='Data de Aniversário')
    idade_label.grid(row=1, column=0, padx=10, pady=5, sticky='w')

    idade_entry = DateEntry(janela, date_pattern='dd/mm/yyyy')
    idade_entry.grid(row=1, column=1, padx=10, pady=5, sticky='w')  

    faixa_label = ttk.Label(janela, text='Faixa:')
    faixa_label.grid(row=2, column=0, padx=10, pady=5, sticky='w')

    combo = ttk.Combobox(janela, values=['Branca', 'Branca Decidida', 'Laranja', 'Laranja Decidida', 
                                        'Amarela', 'Amarela Decidida', 'Camuflada', 'Camuflada Decidida',
                                        'Verde', 'Verde Decidida', 'Roxa', 'Roxa Decidida', 'Azul',
                                        'Azul Decidida', 'Marrom', 'Marrom Decidida', 'Vermelha',
                                        'Vermelha Decidida', 'Vermelha e Preta', 'Preta'])
    
    combo.grid(row=2, column=1, padx=10, pady=10, sticky='w')  
    combo.set('Selecione uma opção')
    combo.bind('<<ComboboxSelected>>', faixa_selecionada)

    contato_label = ttk.Label(janela, text='Contato:')
    contato_label.grid(row=3, column=0, padx=10, pady=5, sticky='w')

    contato_entry = ttk.Entry(janela)
    contato_entry.grid(row=3, column=1, padx=10, pady=5, sticky='w')

    contato_emergencia_label = ttk.Label(janela, text='Contato Emergência:')
    contato_emergencia_label.grid(row = 4, column=0, padx=10, pady=5, sticky='w')

    contato_emergencia_entry = ttk.Entry(janela)
    contato_emergencia_entry.grid(row=4, column=1, padx=10, pady=5, sticky='w')

    cpf_label = ttk.Label(janela, text='CPF:')
    cpf_label.grid(row=5, column=0, padx=10, pady=5, sticky='w')

    cpf_entry = ttk.Entry(janela)
    cpf_entry.grid(row=5, column=1, padx=10, pady=5, sticky='w')

    enedereco_label = ttk.Label(janela, text='Endereço:')
    enedereco_label.grid(row=6, column=0, padx=10, pady=5, stick='w')

    endereco_entry = ttk.Entry(janela)
    endereco_entry.grid(row=6, column=1, padx=10, pady=5, sticky='w')

    nome_responsavel_label = ttk.Label(janela, text='Nome do Resposável:')
    nome_responsavel_label.grid(row=0, column=3, padx=10, pady=5, sticky='w')

    nome_responsavel_entry = ttk.Entry(janela)
    nome_responsavel_entry.grid(row=0, column=5, padx=10, pady=5, sticky='w')

    historico_medico_label = ttk.Label(janela, text="Histórico Médico:")
    historico_medico_label.grid(row=1, column=3, padx=10, pady=5, sticky='w')

    historico_medico_entry = ttk.Entry(janela)
    historico_medico_entry.grid(row=1, column=5, padx=10, pady=5, sticky='w')


    janela.mainloop()
