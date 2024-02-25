<h2>Células Disponíveis</h2>

        <!-- Add New Cell Form -->
        <form action="register_cell.php" method="post">
            <label for="newCellName">Nova Célula:</label>
            <input type="text" id="newCellName" name="newCellName" required>
            <button type="submit">Adicionar</button>
        </form>

        <!-- Display Cells in a Table -->
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Célula</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Display cells fetched from the database
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['cell_id']}</td>";
                        echo "<td>{$row['cell_name']}</td>";
                        echo "<td>";
                        echo "<a href='?action=view&id={$row['cell_id']}&cell_name={$row['cell_name']}' class='btn btn-primary'>Visualizar</a> ";
                        echo "<a href='?action=edit&id={$row['cell_id']}&cell_name={$row['cell_name']}' class='btn btn-info'>Editar</a> ";
                        echo "<a href='?action=remove&id={$row['cell_id']}&cell_name={$row['cell_name']}' class='btn btn-danger'>Remover</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Details of the Selected Cell -->
    <section class="cell-details">
        <?php
            // Check if the "action" and "id" parameters are present in the URL
            if (isset($_GET['action']) && isset($_GET['id'])) {
                $action = $_GET['action'];
                $cellId = $_GET['id'];
                $cellName = (isset($_GET['cell_name'])) ? $_GET['cell_name'] : "";

                // Display different content based on the action
                switch ($action) {
                    case 'view':
                        // Here you can retrieve and display cell details
                        echo "<h2>Detalhes da Célula: $cellName</h2>";
                        include "view.php";
                        // Additional logic for viewing details
                        break;

                    case 'edit':
                        // Here you can retrieve and display cell details for editing
                        echo "<h2>Editar Célula: $cellName</h2>";
                        // Additional logic for editing details
                        include "edit.php";
                        break;

                    case 'remove':
                        // Here you can display a confirmation message before removing the cell
                        echo "<h2>Remover Célula: $cellName</h2>";
                        echo "<p>Você tem certeza que deseja remover esta célula?</p>";
                        echo "<a class='common-a' href='?action=confirmRemove&id=$cellId'>Sim</a> ";
                        echo "<a class='common-a' href='?action=cancelRemove&id=$cellId'>Cancelar</a>";
                        break;

                    case 'confirmRemove':
                        // Here you can perform the actual removal of the cell from the database
                        echo "<h2>Célula Removida</h2>";
                        // Perform the actual removal of the cell from the database
                        Database_Connect();
                        $db_connection = Database_ReturnHandle();

                        $deleteQuery = "DELETE FROM cells WHERE cell_id = $cellId";
                        $deleteResult = mysqli_query($db_connection, $deleteQuery);

                        if ($deleteResult) {
                            echo "<script>window.location.href = 'index.php'</script>";
                        } else {
                            echo "<h2>Erro ao Remover Célula</h2>";
                            echo "<p>Ocorreu um erro ao remover a célula. Por favor, tente novamente.</p>";
                            // Additional error handling
                        }
                        // Additional logic for removing the cell
                        break;

                    case 'cancelRemove':
                        // Here you can display a message indicating that removal was canceled
                        echo "<h2>Remoção Cancelada</h2>";
                        // Additional logic for canceling removal
                        break;

                    default:
                        // Handle other actions or invalid action
                        echo "<p>Ação inválida</p>";
                        break;
                }
            } else {
                // If no action or ID parameter is present, display a message or instruction
                echo "<p>Selecione uma ação ou uma célula para visualizar.</p>";
            }
        ?>