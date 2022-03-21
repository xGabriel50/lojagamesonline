<?php
session_start();
function inserirUsuario($conn,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compleusu,$senhausu,$pinusu){
    $salto = ['cost' => 8 ];
    
    $senhacrip = password_hash($senhausu, PASSWORD_BCRYPT, $salto);
    
    $query = "INSERT INTO `tbusuario` (`idusu`, `nomeusu`, `emailusu`, `foneusu`, `tipousu`, `cpfusu`, `cepusu`, `numusu`, `compleusu`, `senhausu`, `pinusu`) VALUES (NULL, '{$nomeusu}', '{$emailusu}', '{$foneusu}', '{$tipousu}', '{$cpfusu}', '{$cepusu}', '{$numusu}', '{$compleusu}', '{$senhacrip}', '{$pinusu}')";
    $dados = mysqli_query($conn,$query);
    return $dados; 
}

function visuUsuarioNome($conn,$nomeusu){
    $query = "select * from tbusuario where nomeusu like '%{$nomeusu}%'";
    $resultado = mysqli_query($conn, $query);
    return $resultado;  
}

function visuUsuarioEmail($conn, $emailusu){
    $query = "select * from tbusuario where emailusu like '%{$emailusu}%'";
    $resultado = mysqli_query($conn, $query);
    return $resultado; 
}
function visuUsuarioCodigo($conn, $codigousu){
    $query = "select * from tbusuario where idusu = {$codigousu}";
    $resultado = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado; 
}
function alterarUsuario($conn,$codigousu,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compleusu){
    $query = "update tbusuario set 
    nomeusu='{$nomeusu}', 
    emailusu='{$emailusu}', 
    foneusu = '{$foneusu}',
    tipousu = '{$tipousu}',
    cpfusu='{$cpfusu}',
    cepusu='{$cepusu}',
    numusu='{$numusu}',
    compleusu='{$compleusu}' where idusu = '{$codigousu}'";
    $resultado = mysqli_query($conn, $query);
    return $resultado;
}
function deletarUsuario($conn,$codigousu){
    $query = "delete from tbusuario where idusu='{$codigousu}'";
    $resultado = mysqli_query($conn,$query);
    return $resultado;
}
function verificaAcesso($conn,$emaiç,$senha){
  $query = "Select * from tbusuario where emailusu='{$emailusu}'";
  $resultado = mysqli_query($conn,$query);
  if (mysqli_num_rows($resultado) > 0){
      $row = mysqli_fetch_assoc($resultado);
      if(password_verify($senha,$row["senhausu"]))}
      $_SESSION["email"] = $row["emailusu"];
      return $row["emailusu"];

  }else{
      return "Acesso negado1";
  }else{
    return "Acesso negado2";
    
  }
  return "Acesso negado3";


  } 
}
function usarAcesso(){
    $acesso = isset ($_SESSION["email"]);
    if $acesso
}
?>