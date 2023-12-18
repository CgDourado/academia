# tcc
Projeto de conclusão do curso TDS SENAI02 2023

# Instruções de Implementação

1. Baixar o Repositório:<br />
     - Clique no botão "Code" e escolha a opção "Download ZIP".<br />
     - Extraia o arquivo compactado e renomeie a pasta para "academia".<br />
     - Mova a pasta para o diretório "htdocs" do xampp.<br />

2. Configuração do Banco de Dados:<br />
     - Inicie o XAMPP e certifique-se de que os serviços Apache e MySQL estão ativos.<br />
     - Acesse http://localhost/phpmyadmin/ em seu navegador.<br />
     - Crie um novo banco de dados com o nome "gym".<br />
     - Selecione o banco de dados "gym" e vá para a aba "Importar".<br />
     - Escolha o arquivo "GYM.SQL" localizado na pasta "academia" e importe.<br />

3. Iniciar o Sistema:<br />
     - Abra o navegador e acesse http://localhost/academia/.<br />

# Funções da Aplicação

1. Login:<br />
     - Para acessar como DONO:
       - Usuário: carianij
       - Senha: cj123
     - Treinador:
       - Será possivel acessar como treinador somente quando o mesmo for criado; Através da aba de Treinadores

2. Funções:<br />
     - Dono:<br />
       - Cadastrar | Editar | Excluir os Clientes<br />
       - Criar | Editar | Excluir | Baixar os Treinos<br />
       - Cadastrar | Editar | Excluir os Treinadores<br />
       - O Dono consegue ver todos os clientes<br />
     - Treinador:<br />
       - Restritamente Editar os Clientes<br />
       - Criar | Editar | Excluir | Baixar os Treinos<br />
       - O treinador consegue ver somente os clientes que foram designados a ele<br />
      
# Requisitos 
     - Um computador com sistema operacional Windows
     - Conexão com internet basica
     - XAMPP instalado
     - Um navegador web
