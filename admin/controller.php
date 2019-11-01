<?php 
    //capturando os dados da url
    //ex.: admin/departamento/cadastrar/listar
    //model=departamento & action-listar
    $router = $_GET['model'].$_GET['action'];
    $view = "";

    switch($router){
    //router = departamentolistar

        case 'departamentocadastrar':
            include "actions/cadastrar-depar.php";
            $view = "form-departamento.php";
            break;

        case 'departamentolistar':
            include "actions/lista-departamento.php";
            $view = "lista-departamento.php";
            break;

        case 'clientelistar':
            include "actions/lista-clientes.php";
            $view = "lista-cliente.php";
            break;

        case 'clientevizualizar':
            include "actions/buscar-cliente-id.php";
            $view = "vizualizar-cliente-id.php";
            break;
        
        
        case 'produtocadastrar':
            include "actions/cadastrar-produto.php";
            include "actions/lista-departamento.php";
            $view = "form-produto.php";
            break;
            
        case 'usuariocadastrar':
            include "actions/cadastrar-usuarios.php";
            $view = "form-usuario.php";
            break;

        case 'usuariolistar':
            include "actions/lista-usuario.php";
            $view = "lista-usuario.php";
            break;

        case 'usuariovizualizar';
            include "actions/buscar-usuario-id.php";
            $view = "vizualiza-usuario-id.php";
            break;

            case 'produtolistar';
            include "actions/produto-lista.php";
            $view = "lista-produto.php";
            break;

       




        default:
            echo "default";
        break; 
    }

    include "view/header.php";
    include "view/{$view}";
    include "view/mensagem.php";
    include "view/footer.php";
?>

