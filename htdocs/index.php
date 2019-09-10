<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pracownicy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">          
        <a class="navbar-brand" href="index.php">Baza danych</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="falsaria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-items">
            <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                <a class="nav-link active" href="index.php">Pracownicy</a>
            </li>
            <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                <a class="nav-link" href="index.php?table=etaty">Etaty</a>
            </li>
            <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                <a class="nav-link" href="index.php?table=zespoly">Zespoły</a>
            </li>
            </ul>
        </div>
    </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <?php
                        require 'connect.php';

                        try {
                            $pdo = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $database . ';port=' . $port, $username, $password);
                            





                            if(isset($_GET['table']) && $_GET['table']=='zespoly')
                            {
                                $stmt = $pdo->query('SELECT * FROM zespoly');                            echo '<ul>';
                                foreach ($stmt as $row) {
                                    echo '<li>' . $row['NAZWA'] . '<a href="index.php?delete=' . $row['NAZWA'] ."</a>"; }
                                $stmt->closeCursor();
                                echo '</ul>';
                            }
                            else if(isset($_GET['table']) && $_GET['table']=='etaty')
                            {
                                $stmt = $pdo->query('SELECT * FROM etaty');
                                echo '<ul>';
                                foreach ($stmt as $row) {
                                    echo '<li>' . $row['NAZWA'] . '<a href="index.php?delete=' . $row['NAZWA'] ."</a>"; }
                                $stmt->closeCursor();
                                echo '</ul>';
                            }
                            else 
                            {
                                $stmt = $pdo->query('SELECT * FROM pracownicy');
                                echo '<ul>';
                                foreach ($stmt as $row) {
                                    echo '<li>' . $row['IMIE'] . '<a href="index.php?delete=' . $row['IMIE'] ."</a>"; }
                                $stmt->closeCursor();
                                echo '</ul>';
                            }
/*                            if(!isset($_GET['table'] || $_GET['table']!='etaty'){                                $stmt = $pdo->query('SELECT * FROM pracownicy');
                                $stmt = $pdo->query('SELECT * FROM pracownicy');
                                echo '<ul>';
                                foreach ($stmt as $row) {
                                    echo '<li>' . $row['IMIE'] . ' ' . $row['NAZWISKO'] . ' <a href="index.php?delete='.$row['ID_PRAC'].'">usuń</a></li>';
                                }
                                $stmt->closeCursor();
                                echo '</ul>';
                                }
*/











                        } catch (PDOException $e) {
                            echo '<div class="alert alert-danger" role="alert">Połączenie nie mogło zostać utworzone.<br /></div>';
                        }
                    ?>
                </div>
            </div>
        </div>

        

        <script src="js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
