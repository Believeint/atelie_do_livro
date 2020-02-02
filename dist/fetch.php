<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "adm371", "testdb");
$connect->set_charset("utf8");
$output = '';
if(isset($_POST["query"]))
{
    echo "Recebido";
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM tbl_usuario 
  WHERE nomeUsuario LIKE '%".$search."%'
  OR profissaoUsuario LIKE '%".$search."%' 
 ";
}
else
{
    $query = "
  SELECT * FROM tbl_usuario ORDER BY idUsuario
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Id</th>
     <th>Nome</th>
     <th>Profissão</th>

    </tr>
 ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
   <tr>
    <td>'.$row["idUsuario"].'</td>
    <td>'.$row["nomeUsuario"].'</td>
    <td>'.$row["profissaoUsuario"].'</td>
 
   </tr>
  ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}

?>