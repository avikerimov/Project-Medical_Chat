<?php 

session_start();

if( isset($_SESSION['user_id']) ){
    header('location: ./');
}

require_once 'app/assist.php';

$errors = [ 'name' => '', 'email' => '', 'password' => '', 'image' => '', ];

$default_picture = 'images/default_picture_man.png';


if( isset($_POST['submit']) ){
    // echo '<pre>';
    // print_r($_POST);
    // die;
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $name = trim($name);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = trim($email);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = trim($password);
    $form_valid = true;
    // Connect to mysql server
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
    // Escapes special characters in a string for use in an SQL statement
    $name = mysqli_real_escape_string($link, $name);
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $image_name = 'default_picture_man.png';

    // validate name field
    if( !$name || mb_strlen($name) < 2 || mb_strlen($name) > 70){
        $errors['name'] = 'Name is required!';
        $form_valid = false;
    }

    // validate email field
    if(!$email){
        $errors['email'] = 'A valid email is required!';
        $form_valid = false;
    } elseif(check_email_exist($link, $email)){
        $errors['email'] = 'This email is already registered';
        $form_valid = false;
    }

    //validate password field
    if( !$password || strlen($password) < 8 || strlen($password) > 14 ){
        $errors['password'] = 'A valid password is required!';
        $form_valid = false;
    }

    //validate image file filed
    if( $form_valid && isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0 ){
        $max_file_size = 1024 * 1024 * 5;
        $file_format_type = [ 'png', 'jpeg', 'jpg', 'gif', 'bmp', ];

        if( isset($_FILES['image']['size']) && $_FILES['image']['size'] <= $max_file_size ){
            //Returns information about a file path
            $file_info = pathinfo($_FILES['image']['name']);
            
            if( in_array(strtolower($file_info['extension']), $file_format_type) ){

                if( is_uploaded_file($_FILES['image']['tmp_name']) ){
                    $image_name = date('d.m.Y.H.i.s') . '-' . generateRandomString(5);
                    $image_name .= '-' . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image_name);
                }
            } else {
                $form_valid = false;
                $errors['image'] = 'Image must be an image type';
            }
        } else {
            $form_valid = false;
            $errors['image'] = 'Image must be max 5MB';
        }
    } else if ( isset($_FILES['image']['error']) && $_FILES['image']['error'] != 4 ){
        $form_valid = false;
        $errors['image'] = 'No file was uploaded';
    }

    if( $form_valid ){
        $password = password_hash($password, PASSWORD_BCRYPT);
        //query for insert a new user
        $sql = "INSERT INTO users VALUES(null, '$name', '$email', '$password', '$image_name')";
        //execute query
        $result = mysqli_query($link, $sql);

        if( $result && mysqli_affected_rows($link) > 0 ){
            $_SESSION['user_id'] = mysqli_insert_id($link);
            $_SESSION['user_name'] = $name;
            header('location: login.php');
        }
    }
}

?>

<?php 
$page_title = $header2 = 'Register'; 
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
       <div class="col-6">
           <form action="" method="POST" autocomplete="on" novalidate="novalidate" enctype="multipart/form-data">
           <div class="mb-3">
               <span class="text-danger d-none d-lg-block must">&#42;</span> 
               <label class="d-none d-lg-block" for="name">Full Name:</label>                
               <input type="text" name="name" id="name" class="form-control" placeholder="First and Last Name" value="<?php holder_field_data('fullName') ?>">
               <span class="text-danger"><?= $errors['name']; ?></span>
           </div>
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
                            Must include: <br>
                            &#8226; At least 1 Upercase Character <br>
                            &#8226; Must be between 8-14 Chars
                        </span>
                    </i>  
                    Password:                      
                </label>
               <input type="password" name="password" id="password" class="form-control" placeholder="Password">
               <span class="text-danger"><?= $errors['password']; ?></span>
           </div>
           <div class="mb-3">
               <label class="d-none d-lg-block" for="image">Profile Picture:</label>
               <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="displayImg(this)">
               <span class="text-danger"><?= $errors['image']; ?></span>
           </div>
           <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-outline-success">Register</button>
            </div>
            </form>
       </div>
       <div class="col-6 position-relative">   
            <img id="prewimg" src="<?= $default_picture ?>" class="position-absolute top-50 start-50 translate-middle" width="150px">
       </div>
   </div>
</main>


    
<?php require_once 'tpl/footer.php' ?>