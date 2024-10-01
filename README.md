# Tarefas
Projeto de gestão de tarefas, feito nas aulas do curso de Aprendizagem em Programador de Sistemas do SENAI.<br>
Feito seguindo o padrão MVC e Orientação a Objetos, na linguagem PHP e banco de dados MySQL.<br><br>
![image](https://github.com/user-attachments/assets/b432ed80-0c65-48c9-aa37-3b7c7bdee2a7)

### Setup do banco de dados
```sql
CREATE DATABASE atividades;
USE atividades;
CREATE TABLE tarefas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT,
        prazo DATE,
        prioridade INTEGER(1),
        concluida BOOLEAN
    );
CREATE TABLE anexos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tarefa_id INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    arquivo TEXT,
    CONSTRAINT fk_tarefa_anexo FOREIGN KEY (tarefa_id) REFERENCES tarefas(id)
);
```
