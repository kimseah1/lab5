<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
    <?php
        $connect = new mysqli("localhost", "root", "", "lab_5");
	
		if($connect->connect_errno)
		{
			die('Could not connect: ' .$connect->connect_errno);
		}
        $query = "SELECT * FROM users_tab WHERE userid = '".$_POST["email"]."' AND password='".$_POST["password"]."'";
        $sql_result = $connect->query($query);
        if ($sql_result->num_rows == 0) {
            header("Location: login.php");
            # no user in db
        }
        while($row = $sql_result->fetch_assoc()) {
            echo 'we have db results';
            if ($row["role"]=='S')
            {
                header("Location: student_index.html");
            }

            if ($row["role"]=='P')
            {
                header("Location: Prof_index.html");
            }
            


        }
    ?>
</body>