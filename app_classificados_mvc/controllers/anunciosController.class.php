<?php

class anunciosController extends Controller {
    public function index() {
        $dados = [];

        $Anuncio = new Anuncio();
        $dados['anuncios'] = $Anuncio->readAll();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ". BASE_URL . "login");
            exit;
        }


        $this->loadTemplate("anuncios", $dados);
    }

    public function add() {
        $dados = [];

        $Anuncio = new Anuncio();

        $Categoria = new Categoria();
        $dados['categoria'] = $Categoria->readAll();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ". BASE_URL . "login");
            exit;
        }

        if(isset($_POST['txt-titulo']) && empty($_POST['txt-titulo'])) {
            $dados['txt_titulo'] = false;
            $estado = addslashes($_POST['select-estado']);
            $categoria = addslashes($_POST['select-categoria']);
        } else {
            if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {
                $titulo = addslashes($_POST['txt-titulo']);
                $dados['txt_titulo_tmp'] = $titulo;
                $valor = addslashes($_POST['txt-valor']);
                $descricao = addslashes($_POST['txt-descricao']);
                $estado = addslashes($_POST['select-estado']);
                $categoria = addslashes($_POST['select-categoria']);
        
                if(!empty($categoria) && !empty($valor) && !empty($descricao) && $estado != "") {
                    $dados['campos_vazio'] = false;
                    if($Anuncio->create(utf8_decode($titulo), utf8_decode($categoria), $valor, utf8_decode($descricao), utf8_decode($estado))) {
                        $dados['add_anuncio'] = true;
                    } else {
                        $dados['add_anuncio'] = false;
                    }
                } else if(empty($categoria)) {
                    $dados['select_categoria'] = false;
                } else if(empty($valor)) {
                    $dados['txt_valor'] = false;
                } else if(empty($descricao)) {
                    $dados['txt_descricao'] = false;
                } else if($estado == "") {
                    $dados['select_estado'] = false;
                }
            }
        }

        if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {
            $dados['txt_titulo_tmp'] = $titulo;
        }

        if(isset($_POST['select-categoria']) && !empty($_POST['select-categoria'])) {
            $dados['select_categoria_tmp'] = $categoria;
        }

        if(isset($_POST['txt-valor']) && !empty($_POST['txt-valor'])) {
            $dados['txt_valor_tmp'] = $valor;
        }

        if(isset($_POST['txt-descricao']) && !empty($_POST['txt-descricao'])) {
            $dados['txt_descricao_tmp'] = $descricao;
        }

        if(isset($_POST['select-estado']) && !empty($_POST['select-estado'])) {
            $dados['select_estado_tmp'] = $estado;
        }

        $this->loadTemplate("add-anuncio", $dados);
    }

    public function editar($id) {
        $dados = [];

        if(empty($_SESSION['cLogin'])) {
            header("Location: ". BASE_URL . "login");
            exit;
        }

        $Anuncio = new Anuncio();
        $Categoria = new Categoria();
        $dados['categoria'] = $Categoria->readAll();

        if(isset($id) && !empty($id)) {
            if(isset($_POST['txt-titulo']) && empty($_POST['txt-titulo'])) {
                $dados['txt_titulo'] = false;
                $estado = addslashes($_POST['select-estado']);
                $categoria = addslashes($_POST['select-categoria']);
            } else {
                if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {
                    $titulo = addslashes($_POST['txt-titulo']);
                    $valor = addslashes($_POST['txt-valor']);
                    $descricao = addslashes($_POST['txt-descricao']);
                    $estado = addslashes($_POST['select-estado']);
                    $categoria = addslashes($_POST['select-categoria']);
                    if(isset($_FILES['fotos'])) {
                        $fotos = $_FILES['fotos'];
                    } else {
                        $fotos = [];
                    }
    
                    if(!empty($categoria) && !empty($valor) && !empty($descricao) && !empty($estado)) {
                        $dados['campos_vazio'] = false;
                        $Anuncio->update($id, utf8_decode($titulo), utf8_decode($categoria), $valor, utf8_decode($descricao), utf8_decode($estado), $fotos);
                    } else if(empty($categoria)) {
                        $dados['txt_categoria'] = false;
                    } else if(empty($valor)) {
                        $dados['txt_valor'] = false;
                    } else if(empty($descricao)) {
                        $dados['txt_descricao'] = false;
                    } else if(empty($estado)) {
                        $dados['txt_estado'] = false;
                    }
                }
            }
        
            $dados['anuncio'] = $Anuncio->readOne($id);
        } else {
            header("Location: ". BASE_URL ."anuncios");
        }

        $this->loadTemplate("editar-anuncio", $dados);
    }

    public function excluir($id) {
        if(empty($_SESSION['cLogin'])) {
            header("Location: ". BASE_URL . "login");
            exit;
        }
        
        $Anuncio = new Anuncio();
        
        if(isset($id) && !empty($id)) {
            echo "to aqui";
            $Anuncio->delete($id);
        }
        header("Location: ". BASE_URL ."anuncios");
    }

    public function excluirFoto($id) {
        if(empty($_SESSION['cLogin'])) {
            header("Location: ". BASE_URL . "login");
            exit;
        }
        
        $Anuncio = new Anuncio();
        
        if(isset($id) && !empty($id)) {
            $id_anuncio = $Anuncio->deletePhoto($id);
        }
        
        if(isset($id_anuncio)) {
            header("Location: ". BASE_URL ."anuncios/editar/". $id_anuncio);
        } else {
            header("Location: ". BASE_URL ."anuncios");
        }
    }
}

?>