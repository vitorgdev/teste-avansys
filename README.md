## Regras Iniciais
1) Antes de começar o desenvolvimento faça um FORK desse repositório.
2) Após o FORK verifique se o repositório criado está público.
3) Arquitetura de desenvolvimento:
  - VUE.js;
  - Laravel 7 USANDO padrão REST;
  - Banco opcional;
# Arquitetura Utilizada
- Utilizei o padrão do Laravel para API Rest para Back-End
- Utilizei o VUE.JS para o Front-End
- Sem problemas com o back-end
- Algumas dificuldades em ferramentas do VUE.JS

## END POINT

# Inserir Operadora
 - http://127.0.0.1:8000/api/operator/add
# Deletar Operadora
- http://127.0.0.1:8000/api/operator/delete/{id}
# Editar Operadora
- http://127.0.0.1:8000/api/operator/update/{id}

# Encontrar operadora pelo status
- http://127.0.0.1:8000/api/operator/find/{status}

# Listar Operadora
- http://127.0.0.1:8000/api/operators

## MIGRATIONS

- Criei uma migration para criar a tabela dentro do banco de dados automaticamente
