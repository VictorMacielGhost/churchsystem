<?php
    Database_Connect();
    $db_connection = Database_ReturnHandle();

    // Obtenha o ID da célula da URL
    $userId = $_SESSION[USER_DATA_ID];
    $cellIdQuery = mysqli_query($db_connection, "SELECT `cell_member` FROM `users` WHERE `userid` = '$userId';");
    $cellId = mysqli_fetch_array($cellIdQuery);
    $cellId = $cellId['cell_member'];

    // Recupere detalhes da célula
    $cellDetailsQuery = "SELECT * FROM cells WHERE cell_id = $cellId";
    $cellDetailsResult = mysqli_query($db_connection, $cellDetailsQuery);

    if (!$cellDetailsResult) {
        die("Erro ao obter detalhes da célula: " . mysqli_error($db_connection));
    }

    $cellDetails = mysqli_fetch_assoc($cellDetailsResult);

    // Lista de membros da célula
    $membersQuery = "SELECT `userid`, `name`, `email` FROM `users` WHERE `cell_member` = '$cellId' AND `account_type` <> 2";
    $membersResult = mysqli_query($db_connection, $membersQuery);
?>
    <!-- Opções para o Líder da Célula -->
    <section class="leader-options">
        <h2>Opções para o Líder</h2>

        <button class="btn btn-primary">Adicionar Membro</button>
        <button class="btn btn-danger">Remover Membro</button>
        <a href="" class="btn btn-success">Verificar E-mails</a>
    </section>

    <!-- Lista de Membros -->
    <section class="members-list">
        <h2>Membros da Célula</h2>

        <!-- Adicione lógica para listar membros da célula -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Membro</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($member = mysqli_fetch_assoc($membersResult)) {
                        echo "<tr>";
                        echo "<td>{$member['userid']}</td>";
                        echo "<td>{$member['name']}</td>";
                        echo "<td>{$member['email']}</td>";
                        echo "<td>";
                        echo "<button class='btn btn-success'>Enviar E-mail</button> ";
                        echo "<button class='btn btn-danger'>Remover Membro</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

</main>
