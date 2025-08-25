# Sistema de Gerenciamento de Listas de Compras

## 📋 Sobre o Projeto

Este é um sistema web desenvolvido em Laravel para gerenciamento de listas de compras, onde usuários podem criar categorias, produtos e organizar suas compras de forma eficiente.

## 🚀 Funcionalidades Implementadas

### 🔐 Sistema de Autenticação Refatorado
- **AuthService**: Centralização da lógica de autenticação
- **Validação de credenciais** com segurança aprimorada
- **Gerenciamento de sessões** otimizado
- **Hash de senhas** implementado corretamente

### 📁 CRUD Completo de Categorias
- **Criação** de novas categorias
- **Listagem** de categorias do usuário
- **Edição** de categorias existentes
- **Exclusão** com confirmação
- **Visualização detalhada** de cada categoria
- **Controle de acesso** (usuários só gerenciam suas próprias categorias)

### 👤 Gerenciamento de Usuários Expandido
- **UserServices** com métodos CRUD completos
- **Atualização de perfil** de usuário
- **Validação de dados** aprimorada

## 🏗️ Arquitetura e Padrões Implementados

### Camada de Services
Toda a lógica de negócio foi centralizada em Services seguindo as melhores práticas:

- **`AuthService`**: Gerencia autenticação e autorização
- **`UserServices`**: Operações relacionadas aos usuários
- **`CategoryService`**: Operações CRUD para categorias

### Injeção de Dependência
- Controllers recebem Services via constructor injection
- Facilita testes unitários e manutenibilidade
- Reduz acoplamento entre camadas

### Validação de Dados
- **Form Requests** para validação consistente
- **CategoryRequest**: Validação específica para categorias
- **UserRequest**: Validação para dados de usuários

## 📂 Estrutura de Arquivos Criados/Modificados

### Novos Arquivos
```
app/
├── Services/
│   ├── AuthService.php          # Serviço de autenticação
│   └── CategoryService.php      # Serviço de categorias
├── Http/
│   └── Requests/
│       └── CategoryRequest.php  # Validação de categorias
resources/views/app/categories/
├── index.blade.php             # Listagem de categorias
├── create.blade.php            # Formulário de criação
├── edit.blade.php              # Formulário de edição
└── show.blade.php              # Visualização detalhada
```

### Arquivos Modificados
```
app/Http/Controllers/
├── AuthController.php          # Refatorado para usar AuthService
├── CategoryController.php      # CRUD completo implementado
└── UserController.php          # Integração com UserServices
app/Services/
└── UserServices.php            # Expandido com novos métodos
routes/
└── web.php                     # Rotas de categorias adicionadas
```

## 🛠️ Tecnologias Utilizadas

- **Laravel 11**: Framework PHP
- **Blade**: Engine de templates
- **Bootstrap**: Framework CSS (via CDN)
- **Font Awesome**: Ícones
- **MySQL**: Banco de dados
- **Git**: Controle de versão

## 📋 Pré-requisitos

- PHP 8.2 ou superior
- Composer
- MySQL/MariaDB
- Node.js (para assets)

## 🚀 Instalação

1. **Clone o repositório**
   ```bash
   git clone https://github.com/Caldonha/Trabalho-PHP.git
   cd reges-webiii
   ```

2. **Instale as dependências**
   ```bash
   composer install
   npm install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure o banco de dados**
   - Edite o arquivo `.env` com suas credenciais do banco
   - Execute as migrações:
   ```bash
   php artisan migrate
   ```

5. **Compile os assets**
   ```bash
   npm run build
   ```

6. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

## 🎯 Como Usar

### Autenticação
1. Acesse `/register` para criar uma conta
2. Faça login em `/login`
3. Acesse o dashboard em `/app/dashboard`

### Gerenciamento de Categorias
1. No dashboard, acesse "Categorias"
2. Clique em "Nova Categoria" para criar
3. Preencha título e descrição (opcional)
4. Use os botões de ação para visualizar, editar ou excluir

## 🔒 Segurança

- **Autenticação obrigatória** para áreas protegidas
- **Controle de propriedade** de recursos
- **Validação de dados** em todas as entradas
- **Hash de senhas** com bcrypt
- **Proteção CSRF** em formulários

## 🧪 Testes

Para executar os testes:
```bash
php artisan test
```

## 📝 Rotas Disponíveis

### Autenticação
- `GET /login` - Formulário de login
- `POST /login` - Processar login
- `GET /register` - Formulário de registro
- `POST /register` - Processar registro
- `GET /app/logout` - Logout

### Área Protegida
- `GET /app/dashboard` - Dashboard principal
- `GET /app/profile/edit` - Editar perfil
- `PUT /app/profile` - Atualizar perfil

### Categorias (Resource Routes)
- `GET /app/categories` - Listar categorias
- `GET /app/categories/create` - Formulário de criação
- `POST /app/categories` - Criar categoria
- `GET /app/categories/{id}` - Visualizar categoria
- `GET /app/categories/{id}/edit` - Formulário de edição
- `PUT /app/categories/{id}` - Atualizar categoria
- `DELETE /app/categories/{id}` - Excluir categoria

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 👨‍💻 Autor

**Caldonha** - [GitHub](https://github.com/Caldonha)

---

## 📈 Próximas Implementações

- [ ] CRUD de Produtos
- [ ] CRUD de Listas de Compras
- [ ] Relacionamento Produto-Lista
- [ ] Dashboard com estatísticas
- [ ] API REST
- [ ] Testes automatizados completos
- [ ] Deploy automatizado

---

*Desenvolvido com ❤️ usando Laravel*
