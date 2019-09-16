<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	<style>	html { overflow-y: scroll; } </style>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/all.min.css">
        <title> Pracownicy </title>
		
    </head>
    <body>
	<div class="container">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?table"><b>Baza pracownicy</b></a>
  
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if(isset($_GET['table'])&&$_GET['table']=='etaty') echo 'active' ?>" href="index.php?table=etaty" >Etaty <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(isset($_GET['table'])&&$_GET['table']=='pracownicy') echo 'active' ?>" href="index.php?table=pracownicy">Pracownicy  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(isset($_GET['table'])&&$_GET['table']=='zespoly') echo 'active' ?>" href="index.php?table=zespoly" >Zespoły  <span class="sr-only">(current)</span></a>
      </li>

    </ul>
	<a data-toggle="tooltip" data-placement="bottom" title="dodaj" class="btn btn-success btn-sm" href="">Dodawanie:  <i class="fas fa-user-plus"></i> </a>
  </div>
</nav>



        <div class="row">
            <div class="col-12 mt-5">

        <?php
        require 'connect.php';
		
        try {
			
            $pdo = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $database . ';port=' . $port, $username, $password);

            if(isset($_GET['add'])){
                $stmt = $pdo->prepare('INSERT INTO pracownicy (nazwisko, imie, etat) VALUES(
                                    :nazwisko,
                                    :imie,
                                    :etat)'); 

                $stmt->bindValue(':nazwisko', 'Kowalski', PDO::PARAM_STR);
                $stmt->bindValue(':imie', 'Jan', PDO::PARAM_STR);
                $stmt->bindValue(':etat', 'DYREKTOR', PDO::PARAM_STR);

                $ilosc = $stmt->execute();
            }
            
            if(isset($_GET['delete'])){
                $stmt = $pdo->prepare('DELETE FROM pracownicy WHERE id_prac = :id'); 

                $stmt->bindValue(':id', $_GET['delete'], PDO::PARAM_STR);

                $ilosc = $stmt->execute();
            }
			
			if((isset($_GET['table']))&&$_GET['table']=='etaty')
			{
				$stmt = $pdo->query('SELECT * FROM etaty');
            echo '	<table class="table">
					  <thead>
						<tr>
						<th scope="col">#</th>
						  <th scope="col">NAZWA</th>
						  <th scope="col">PLACA_OD</th>
						  <th scope="col">PLACA_DO</th>
						  <th scope="col">Operacje</th>
						</tr>
					  </thead>
					';
			$i = 1;
            foreach ($stmt as $row) {
				
                echo '<tbody> 
				<th scope="row">'.$i++.'</th> <td>' . $row['NAZWA'] . '</td> <td>' . $row['PLACA_OD'] . '  </td> <td>' . $row['PLACA_DO'] .  '</td> <td> <a data-toggle="tooltip" data-placement="bottom" title="Edycja" class="btn btn-primary btn-sm" href="index.php?table=pracownicy?add='.$row['NAZWA'].'"><i class="fas fa-user-edit"></i> </a>   <a data-toggle="tooltip" data-placement="bottom" title="Usuwanie" class="btn btn-danger btn-sm" href="index.php?table=pracownicy?delete='.$row['NAZWA'].'"> <i class="far fa-trash-alt"></i></a>
				</td>
				</tbody>';
            }
			
			echo '</table>';
            $stmt->closeCursor();
            echo '</ul>';
			}
			
			if((isset($_GET['table']))&&$_GET['table']=='pracownicy')
			{
				$stmt = $pdo->query('SELECT * FROM pracownicy');
				
            echo '	<table class="table">
					  <thead>
						<tr>
						  <th scope="col">ID</th>
						  <th scope="col">Imie</th>
						  <th scope="col">Nazwisko</th>
						  <th scope="col">Etat</th>
						  <th scope="col">Operacje</th>
						</tr>
					  </thead>
					';
            foreach ($stmt as $row) {
                echo '<tbody> 
				<td>'.$row['ID_PRAC'].'</td> <td>' . $row['IMIE'] . '  </td> <td>' . $row['NAZWISKO'] .  '</td> <td> '.$row['ETAT'].' </td> <td> <a data-toggle="tooltip" data-placement="bottom" title="Edycja" class="btn btn-primary btn-sm" href="index.php?table=pracownicy?add='.$row['ID_PRAC'].'"> <i class="fas fa-user-edit"></i> </a>  <a data-toggle="tooltip" data-placement="bottom" title="Usuwanie" class="btn btn-danger btn-sm" size=30px href="index.php?table=pracownicy&delete='.$row['ID_PRAC'].'"> <i class="far fa-trash-alt"></i></a>
				</tbody>';
            }
			
			echo '</table>';
            $stmt->closeCursor();
            echo '</ul>';
			}
			
			if((isset($_GET['table']))&&$_GET['table']=='zespoly')
			{
				$stmt = $pdo->query('SELECT * FROM zespoly');
            echo '	<table class="table">
					  <thead>
						<tr>
						  <th scope="col">ID_ZESP</th>
						  <th scope="col">NAZWA</th>
						  <th scope="col">ADRES</th>
						  <th scope="col">Operacje</th>
						</tr>
					  </thead>
					';
            foreach ($stmt as $row) {
                echo '<tbody> 
				<tD>'.$row['ID_ZESP'].'</tD> <td>' . $row['NAZWA'] . '  </td> <td>' . $row['ADRES'] .  '</td> <td> <a data-toggle="tooltip" data-placement="bottom" title="Edycja" class="btn btn-primary btn-sm" href="index.php?table=pracownicy?add='.$row['NAZWA'].'"> <i class="fas fa-user-edit"></i> </a>   <a data-toggle="tooltip" data-placement="bottom" title="Usuwanie" class="btn btn-danger btn-sm" size=30px href="index.php?delete='.$row['ID_ZESP'].'"> <i class="far fa-trash-alt"> </i> </a>
				
				</tbody>';
            }
			
			echo '</table>';
            $stmt->closeCursor();
            echo '</ul>';
			}
            
        } catch (PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone.<br />';
        }
        ?>
        </div>
        </div>
		</div>
		
		<script src="js/jquery.js"> </script>
		<script src="js/popper.js"> </script>
		<script src="js/bootstrap.min.js"> </script>
		<script src="js/bootstrap.bundle.min.js"> </script>
		<script src="js/tooltip.js">  </script>
		
    </body>
</html>