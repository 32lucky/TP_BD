<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
    <link rel="stylesheet" href="style-client.css">
</head>
<body>
   
    <form class="form" action="add_client.php" method="POST">
    <p class="title">Be a client </p>
        <div class="flex">
        <label id="firstname" >
            <input class="input" type="text" name="name"   placeholder="" required="">
            <span>Firstname</span>
        </label>

       
    </div>  
            
    <label>
        <input class="input" type="text"  name="address"placeholder="" required="">
        <span>Adress</span>
    </label> 
        
    <label>
        <input class="input" type="text" name="phone_number" placeholder="" required="">
        <span>Phone number</span>
    </label>
    <label><input class="input" type="email" name="email" placeholder="" required="">
        <span>Email</span></label>
    <label >
    <input class="input" type="password" name="password" placeholder="" required="">
        <span>Password</span>
    </label>
    
    <button class="submit" value="Add Client">Submit</button>
</form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'db.php';
        
        
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        
        $stmt = $pdo->prepare("INSERT INTO client_table ( name, address, phone_number,Email,Password) VALUES (?, ?, ?, ?,?)");
        $stmt->execute([ $name, $address, $phone_number,$email,$password]);
        
        header("Location: ../home.html");
        exit();
    }
    ?>
</body>
</html>
