<?php
// Listagem de Membros da Célula
    echo "<section class='members-list'>";
    echo "<h2>Membros da Célula</h2>";

    // Adicione lógica para listar membros da célula
    // Você pode usar uma tabela ou qualquer outra estrutura

    echo "<table class='table' border=1>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Cargo</th>";
    echo "<th colspan=2>Ações</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Exemplo de dados de membros (substitua com sua lógica)
    Database_Connect();
    $db_con = Database_ReturnHandle();
    $result = mysqli_query($db_con, "SELECT `name`, `userid`, `email`, `account_type` FROM `users` WHERE `cell_member` = '$cellId' ORDER BY `account_type` ASC;");
    if(!mysqli_num_rows($result))
    {
        echo "<h3>Não há membros nesta célula ainda. <a href='select_new_leader.php' target='_blank'>Torne alguém líder</a></h3>";
        exit();
    }
    
    while($member = mysqli_fetch_array($result))
    {
        $userid = $member['userid'];
        $name = $member['name'];
        $email = $member['email'];
        $account_Type = $member['account_type'];
        $role = ($account_Type == ACCOUNT_TYPE_LEAD_MEMBER) ? "Líder" : "Membro"; 
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$role</td>";
        echo "<td>";
        if($account_Type == ACCOUNT_TYPE_LEAD_MEMBER) echo "<button class='btn-custom'>Retirar Líder</button>";
        else echo "<button class='btn-custom' onclick='MakeLeader($userid)' >Tornar Líder</button>";
        echo "<td>
                <a class='common-a' href='send_email.php?member_id=$userid' target='_blank' class='btn btn-success'>Enviar E-mail</a>
            </td>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</section>";

    echo "<script>
        function MakeLeader(userid)
        {
            var request = new XMLHttpRequest();
            request.open('GET', 'manage_leader.php?action=add&id=' + userid + '&cellId=$cellId');
            request.send()
            request.onreadystatechange = () =>
            {
                if(request.readyState === 4)
                {
                    window.location.href = 'index.php?action=edit&id=$cellId&cell_name=$cellName';
                }
            }
        }
    </script>"

?>