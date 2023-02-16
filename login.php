<?php
    $title = 'User Login'; 

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'auther/config.php';
    
    if(isset($_POST['submit'])) {
        if($_POST['username'] == '' OR $_POST['password'] == '' ) {
            echo "Midagi puudu";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = $pdo->query("SELECT * FROM users WHERE username='$username'");
            $login->execute();
            $data = $login->fetch(PDO::FETCH_ASSOC);
            if($login->rowCount() > 0){
#                echo $login->rowCount();
                if(password_verify($password, $data['password'])) {
                    echo "logitud sisse";
                    $_SESSION['username'] = $username;
                    $_SESSION['userid'] = $result['id'];
                    header("Location: viewrecords.php");
                } else {
                    echo "email or parool vale";
                }
            } else {
                echo "email or parool vale";
            }

        }
    }
?>

<h1 class="text-center"><?php echo $title ?> </h1>
   
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="username">Username: * </label></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password">Password: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table><br/><br/>
        <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
        <a href="#"> Forgot Password </a>
            
    </form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>