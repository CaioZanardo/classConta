<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Minha Conta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body class="bg-secondary text-light">
  <div class="bg-danger">
    <div class="container p-3">
      <div class="display-3 text-center">Minha Conta</div>
    </div>
  </div>

  <div class="container d-flex flex-column align-items-center justify-content-center p-5">
    <form class="col-6 mb-5" method="POST">
      <div class="row mb-5">
        <label for="valor" class="form-label">Incluir ao saldo</label>
        <input type="number" class="form-control" id="valor" name="valor" value="0" min="0" />
      </div>

      <div class="row gap-2 justify-content-center">
        
        <div class="row gap-2 justify-content-center">
        <button type="submit" name="reset" class="btn btn-primary col-4">
        Reset Saldo
        </button>
      </div>
        <div class="row gap-2 justify-content-center">
        <button type="submit" name="calcular" class="btn btn-primary col-4">
          Enviar
        </button>
      </div>
    </form>
    </div>
    <?php 
    $saldo = 0;
    if(isset($_POST["valor"])){
      $reset = isset($_POST['reset']) ? 1 : 0;
      $valor = $_POST['valor'];
    
      if (true == $reset){
        session_start();
        unset($_SESSION['minhaConta']);
      }else{
        require("Conta.php");
        session_start();
    
            
        if (!isset($_SESSION['minhaConta'])) {
            $_SESSION['minhaConta'] = new Conta();
        }
         
        $_SESSION['minhaConta']->setCredito($_POST['valor']);
        $saldo = $_SESSION['minhaConta']->getSaldo();
      }
    }
     
?>
  <p>Seu saldo atual é: <?= $saldo?></p>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>
</html>