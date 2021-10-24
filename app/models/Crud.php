<?php

namespace app\models;

class Crud extends Connection
{

  function create_cliente()
  {
    session_start();
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $situacao_cliente = filter_input(INPUT_POST, 'situacao_cliente', FILTER_SANITIZE_STRING);


    $conn = $this->connect();
    $sql = ('INSERT INTO `clientes`(`nome`, `cpf`, `data_nasc`, `telefone`, `ativo`) VALUES (:nome, :cpf, :data_nasc, :telefone, :situacao_cliente)');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, \PDO::PARAM_STR);
    $stmt->bindParam(':data_nasc', $data_nasc, \PDO::PARAM_STR);
    $stmt->bindParam(':telefone', $telefone, \PDO::PARAM_STR);
    $stmt->bindParam(':situacao_cliente', $situacao_cliente, \PDO::PARAM_STR);

    $stmt->execute();


    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Cliente</strong> cadastrado com sucesso! 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }

    return $stmt;
    //exit();
  }

  function create_pedido()
  {
    session_start();
    $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
    $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
    $situacao_pedido = filter_input(INPUT_POST, 'situacao_pedido', FILTER_SANITIZE_STRING);
    $status_pedido = filter_input(INPUT_POST, 'status_pedido', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('INSERT INTO `pedidos`(`produto`, `valor`, `data`, `cliente_id`, `pedido_status_id`, `ativo`) VALUES (:produto, :valor, NOW(), :cliente, :status_pedido, :situacao_pedido)');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto', $produto, \PDO::PARAM_STR);
    $stmt->bindParam(':valor', $valor, \PDO::PARAM_STR);
    $stmt->bindParam(':cliente', $cliente, \PDO::PARAM_STR);
    $stmt->bindParam(':situacao_pedido', $situacao_pedido, \PDO::PARAM_STR);
    $stmt->bindParam(':status_pedido', $status_pedido, \PDO::PARAM_STR);

    $stmt->execute();


    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Pedido</strong> cadastrado com sucesso! 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }

    return $stmt;
  }

  function create_imagen()
  {
    session_start();
    $pedido = filter_input(INPUT_POST, 'pedido', FILTER_SANITIZE_STRING);
    $imagen_pedido = filter_input(INPUT_POST, 'imagen_pedido', FILTER_SANITIZE_STRING);
    $capa = filter_input(INPUT_POST, 'capa', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('INSERT INTO `pedidos_imagens`(`pedido_id`, `imagen`, `capa`) VALUES (:pedido, :imagen_pedido, :capa)');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pedido', $pedido, \PDO::PARAM_STR);
    $stmt->bindParam(':imagen_pedido', $imagen_pedido, \PDO::PARAM_STR);
    $stmt->bindParam(':capa', $capa, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Imagen Pedido</strong> cadastrado com sucesso! 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }

    return $stmt;
  }

  function get_clientes()
  {
    $conn = $this->connect();
    $sql = ("SELECT *  FROM clientes ");

    $stmt = $conn->query($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $clientes_inativos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $clientes_inativos;
  }

  function get_clientes_inativos()
  {
    $conn = $this->connect();
    $sql = ("SELECT *  FROM clientes WHERE ativo = 0 ORDER BY id DESC");

    $stmt = $conn->query($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $clientes_inativos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $clientes_inativos;
  }

  function get_clientes_ativos()
  {
    $conn = $this->connect();
    $sql = ("SELECT *  FROM clientes WHERE ativo = 1 ORDER BY id DESC");

    $stmt = $conn->query($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $clientes_inativos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $clientes_inativos;
  }

  function get_status_pedido()
  {
    $conn = $this->connect();
    $sql = ("SELECT *  FROM pedido_status  ORDER BY id ASC");

    $stmt = $conn->query($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $status_pedido = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $status_pedido;
  }

  function get_pedidos()
  {
    $conn = $this->connect();
    $sql = ("SELECT p.id,p.produto,p.valor,p.data,c.nome,ps.descricao
    FROM pedidos AS p, clientes AS c, pedido_status AS ps
    WHERE p.cliente_id = c.id AND p.pedido_status_id = ps.id AND p.valor > 100.00 ORDER BY p.id DESC");

    $stmt = $conn->query($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $pedidos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    return $pedidos;
  }

  function excluir_cliente_ativo()
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('DELETE FROM `clientes`  WHERE `id` = :id AND `ativo` = 1');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> excluido com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } else {
      $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> com pedido em andamento! falha ao excluir.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

    return $stmt;
  }

  function excluir_cliente_inativo()
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('DELETE FROM `clientes`  WHERE `id` = :id AND `ativo` = 0');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> excluido com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } else {
      $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> com pedido em andamento! falha ao excluir.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

    return $stmt;
  }

  function excluir_pedido()
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('DELETE FROM `pedidos` WHERE `id` = :id');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pedido</strong> excluido com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

    return $stmt;
  }

  function inativarCliente()
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('UPDATE `clientes` SET `ativo`= 0 WHERE `id` = :id');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

    return $stmt;
  }

  function ativarCliente()
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $conn = $this->connect();
    $sql = ('UPDATE `clientes` SET `ativo`= 1 WHERE `id` = :id');
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->RowCount() > 0) {
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cliente</strong> atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

    return $stmt;
  }
}
