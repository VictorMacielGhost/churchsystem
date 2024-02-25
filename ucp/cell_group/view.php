<?php
    $cellId = $_GET['id'];
    
    Database_Connect();
    $db_con = Database_ReturnHandle();

    $account_type_leader = ACCOUNT_TYPE_LEAD_MEMBER;
    
    $result = mysqli_query($db_con, 
    "SELECT 
        c.created_by, 
        c.created_date, 
    (SELECT 
        COUNT(*) 
    FROM `users` 
    WHERE `cell_member` = '$cellId')
    AS TotalMembers, 
    (SELECT 
        `name`
    FROM `users` 
    WHERE `cell_member` = '$cellId' AND `account_type` = '$account_type_leader' 
    LIMIT 1)
    AS LeaderName
    FROM cells 
    AS c
    WHERE c.cell_id = '$cellId';
    ");

    $data = mysqli_fetch_array($result);
    
    $name = "Desconhecido";
    GetUserNameById($data['created_by'], $name);
    
    echo "<p>Célula criada às  " . date("h:m:s d/m/Y", $data['created_date']) . " Por " . $name . "</p>"; 
    
    $name_lead = ($data['LeaderName']) ? $data['LeaderName'] : "(<a href='select_new_leader.php' target='_blank'>a célula não possui um líder. Selecione um aqui.</a>)";
    $total_members = $data['TotalMembers'];

    echo "<p>O líder da célula é $name_lead, e ela possui atualmente $total_members membros, incluindo o líder.</p>";
    echo "<p>Selecione o menu \"editar\" para nomear ou remover um líder, ou enviar notificações.</p>";

    echo "<br>";
    
    $query = mysqli_query($db_con, "SELECT `name`, `account_type` FROM `users` WHERE `cell_member` = '$cellId' ORDER BY `account_type` ASC;");
    
    if(!mysqli_num_rows($query)) die();
    echo "<p style='margin-top: 0px;'>Listando Membros da célula:</p>";

    echo "<table>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Cargo</th>";
    echo "</tr>";
    while($result = mysqli_fetch_array($query))
    {
        $name = $result['name'];
        $role = ($result['account_type'] == ACCOUNT_TYPE_LEAD_MEMBER) ? "Líder" : "Membro";
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$role</td>";
        echo "</tr>";
    }
    echo "</table>";

?>