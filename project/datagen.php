<?php
require_once("config.php");




/*

for ($i = 1; $i < 1200; $i++) {
    $randomDepartment= get_random_Department();

$query="update profile set `department`='$randomDepartment' where `id` ='$i'";
print $query;
$conn= Utilities::getDbConnection();
$conn->query($query);
print "<br>";
}
*/

for ($i = 1; $i < 1200; $i++) {
    $randomDepartment= get_random_gender();

$query="update profile set `gender`='$randomDepartment' where `id` ='$i'";
print $query;
$conn= Utilities::getDbConnection();
$conn->query($query);
print "<br>";
}


function get_random_gender() {

    /// Naming convention of variable in this function is not good.
    $departments=array(
        "M",
        "F"
            );
        //srand(time()) ;
        
        
            $randomDepartment=  rand(0, count($departments)-1);
           //var_dump($randomDepartment);
        
            return $departments[$randomDepartment]; 
}


function get_random_Department() {

    $departments=array(
"Department 1",
"Department 2",
"Department 3",
"Department 4",
"Department 5",
"Department 6",
"Department 7",
"Department 8",
"Department 10",

    );
//srand(time()) ;


    $randomDepartment=  rand(0, count($departments)-1);
   //var_dump($randomDepartment);

    return $departments[$randomDepartment];
}




exit();
$host = 'localhost';
$db   = 'apudirectory';
$user = 'root';
$pass = 'zareef';
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Set up the DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Begin the transaction
    $pdo->beginTransaction();

    for ($i = 1; $i <= 1000; $i++) {
        /*
        $username = "username_$i";
        $first_name = "FirstName$i";
        $last_name = "LastName$i";
        $full_name = "$first_name $last_name";
        $department = "Department$i";
        $title = "Title$i";
        $description = "Description for $username with a maximum length of 1024 characters.";
        $gender = ($i % 2 == 0) ? 'Female' : 'Male';
        $status = 1; // Assuming '1' means active
*/

$username = "username_$i".Utilities::randomString(4);
$first_name = "FirstName$i".Utilities::randomString(4);
$last_name = "LastName$i".Utilities::randomString(4);
$full_name = "$first_name $last_name";
$department = "Department$i".Utilities::randomString(4);
$title = "Title$i".Utilities::randomString(4);
$description = "Description for $username with a maximum length of 1024 characters.";//.Utilities::randomString(400);
$gender = ($i % 2 == 0) ? 'Female' : 'Male';
$status = 1; // Assuming '1' means active

        
        // Insert into the `user` table
        $userStmt = $pdo->prepare("INSERT INTO `users` (username) VALUES (:username)");
        $userStmt->execute(['username' => $username]);

        // Insert into the `profile` table
        $profileStmt = $pdo->prepare("INSERT INTO `profile` (
            username, first_name, last_name, department, title, description, gender, full_name, status
        ) VALUES (
            :username, :first_name, :last_name, :department, :title, :description, :gender, :full_name, :status
        )");
        $profileStmt->execute([
            'username'   => $username,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'department' => $department,
            'title'      => $title,
            'description'=> $description,
            'gender'     => $gender,
            'full_name'  => $full_name,
            'status'     => $status
        ]);
    }

    // Commit the transaction
    $pdo->commit();
    
    echo "records successfully inserted into the user and profile tables.";
} catch (\PDOException $e) {
    // Roll back the transaction if something failed
    $pdo->rollBack();
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>
