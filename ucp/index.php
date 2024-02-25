<?php
    include "../source/process/main.php";
    if(!IsUserLogged())
    {
        echo "
            <script>
                window.location.href = '../login/';
            </script>
            <noscript>
                <h1>Você não está logado(a)!</h1>
                <a href='../login/'>Logar</a>
            </noscript>
        ";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCP - Sistema da Igreja</title>
    <!-- Inclua o link para o seu arquivo CSS aqui -->
    <link rel="stylesheet" href="../source/styles/global.css">
</head>
<body>

<header>
    <h1>UCP - Sistema da Igreja</h1>
    <div>
    </div>
</header>

<?php
    WriteHeaders();
?>

<main>
    <h1>Dados do Usuário</h1>
    <!-- Adicione o conteúdo principal da sua UCP aqui -->
    <section>
        <h2>Tipo Conta: <?php
            $account_type = $_SESSION[USER_DATA_ACCOUNT_TYPE];
            switch($account_type)
            {
                case ACCOUNT_TYPE_ANY:
                    echo "Usuário";
                    break;
                case ACCOUNT_TYPE_ADMIN:
                    echo "Administrador/Pastor";
                    break;
                case ACCOUNT_TYPE_MEMBER:
                    echo "Membro de célula";
                    break;
                case ACCOUNT_TYPE_LEAD_MEMBER:
                    echo "Líder de célula";
                    break;
                default:
                    echo "Desconhecido";
            }
        
        ?></h2>
        <!-- Adicione informações e formulários do perfil do usuário aqui -->
    </section>

    <section>
        <h2>Usuário: <?php echo $_SESSION[USER_DATA_NAME]; ?></h2>
        <!-- Liste os próximos eventos da igreja aqui -->
    </section>

    <section>
        <h2>E-mail: <?php echo $_SESSION[USER_DATA_EMAIL]; ?></h2>
        <!-- Adicione informações sobre doações e formulários de doação aqui -->
    </section>
    <p>Algumas informações podem ser alteradas no menu de configuração</p>
</main>

<!-- <footer>
     Adicione informações do rodapé, como direitos autorais ou links adicionais, aqui 
    <p>&copy; 2023 Sistema da Igreja. Todos os direitos reservados.</p>
</footer> -->

</body>
</html>

