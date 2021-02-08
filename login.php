<?php 

session_start();

if( isset($_SESSION['user_id']) ){
    header('location: ./');
}

require_once 'app/assist.php';

$errors = [ 'email' => '', 'password' => '', 'notValid' => '', ];


if( isset($_POST['submit']) ){
    
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = trim($email);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = trim($password);
    $form_valid = true;
    
    // validate email field
    if(!$email){
        $errors['email'] = 'A valid email is required!';
        $form_valid = false;
    }
    
    //validate password field
    if( !$password || strlen($password) < 8 || strlen($password) > 14 ){
        $errors['password'] = 'A valid password is required!';
        $form_valid = false;
    }
    
    if( $form_valid ){
        // Connect to mysql server
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
        // Escapes special characters in a string for use in an SQL statement
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);
        //SELECT from SQL
        $sql = "SELECT * FROM users WHERE email = '$email'";
        //execute query
        $result = mysqli_query($link, $sql);

        //Gets the number of rows in a result
        if( $result && mysqli_num_rows($result) == 1 ){
            $user = mysqli_fetch_assoc($result);

            //Verifies that a password matches a hash
            if( password_verify($password, $user['password']) ){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('location: chats.php');
            } else {
                $errors['notValid'] = 'Wrong email or password';
            }
        } else {
                $errors['notValid'] = 'Wrong email or password';
        }
    }
}

?>

<?php 
$header2 = $page_title = 'Signin'; 
$back = './';
?>


<?php require_once 'tpl/header.php' ?>

<main>
   <div class="row">
       <div class="col-12 text-center">
           <?php require_once 'tpl/h1.php' ?>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam excepturi nemo dolorem, quia repellendus sapiente nam? Ipsa maiores praesentium, sint consequatur necessitatibus vitae reiciendis rem!</p>
       </div>
   </div>
   <div class="row">
       <div class="col-lg-6">
           <form action="" method="POST" autocomplete="on" novalidate="novalidate" enctype="multipart/form-data">           
           <div class="mb-3">
               <span class="text-danger d-none d-lg-block must">&#42;</span> 
               <label class="d-none d-lg-block" for="email">Email Address:</label>
               <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php holder_field_data('email') ?>">
               <span class="text-danger"><?= $errors['email']; ?></span>            
           </div>
           <div class="mb-3">
               <span class="text-danger d-none d-lg-block must">&#42;</span> 
               <label class="d-none d-lg-block" for="password">
                   <i class="far fa-question-circle toolTip">
                        <span class="toolTipText">
                            Must contain: <br>
                            &#8226; At least 1 Upercase Character <br>
                            &#8226; Must be between 8-14 Chars
                        </span>
                    </i>  
                    Password:                      
                </label>
               <input type="password" name="password" id="password" class="form-control" placeholder="Password">
               <span class="text-danger"><?= $errors['email']; ?></span>
            </div>           
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-outline-success">Login</button>
                <span class="text-danger"><?= $errors['notValid']; ?></span>
            </div>
            </form>
       </div>
       <div class="col-lg-6 d-none d-lg-block border-start">
               <h5>Don't have account?</h5>
               <p><a href="">Press Here</a> and make your own free acount now!</p>
       </div>
       <div class="d-lg-none border-top">
               <h5 class="mt-3">Don't have account?</h5>
               <p class="pressHere"><a href="register.php" >Press Here</a> and make your own free acount now!</p>
       </div>
   </div>
</main>
    
<?php require_once 'tpl/footer.php' ?>