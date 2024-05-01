<?php
require "vendor/autoload.php";
use App\Controllers\AgendamentosController;

if (isset($_GET['funcao']) && !empty($_GET['funcao'])) {
    $controller = new App\Controllers\AgendamentosController();

    switch ($_GET['funcao']) {
        case 'cadastro':
            $controller->incluir();
            break;
        case 'atualizar':
            $controller->editar();
            break;
        case 'excluir':
            $controller->excluir($_GET['id']);
            break;
        default:
            echo "Função não reconhecida.";
            break;
    }
} else {
    echo "Função não especificada.";
}
?>
