<?php
    include 'db.php';
    $db = mysqli_connect($database_ip, $database_username, $database_password, $database_name);
    if (!$db) {
        echo "Error: Unable to connect to MySQL.".PHP_EOL;
        echo "Debugging errno: ".mysqli_connect_errno().PHP_EOL;
        echo "Debugging error: ".mysqli_connect_error().PHP_EOL;
        exit;
    }

    $GLOBALS['groups'] = array();
    $q = $db->query("SELECT group_id, title FROM tbl_group");
    while($res = $q->fetch_assoc()){
        $GLOBALS['groups'][$res['group_id']] = $res['title'];
    }

    $GLOBALS['roles'] = array();
    $q = $db->query("SELECT role_id, title FROM tbl_role");
    while($res = $q->fetch_assoc()){
        $GLOBALS['roles'][$res['role_id']] = $res['title'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fides - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
</head>
<body>
    <nav class="navigation">
        <div class="navigation__button">Menü</div>
        <ul class="navigation__list">
            <?php
                foreach ($GLOBALS['groups'] as $id => $title) {
                    echo "<li class=\"navigation__element\"><a href=\"/?group=".$id."\" class=\"navigation__link\">".$title."</a></li>";
                }
            ?>
        </ul>
    </nav>
    <main class="main">
        <img src="/img/logo.png" />
        <?php
            if(isset($_GET["add"])){
                include 'add_form.php';
            }elseif(isset($_GET["group"]) && !isset($_GET["member"])){
                include 'member_list.php';
            }elseif(isset($_GET["group"]) && isset($_GET["member"])){
                include 'member_details.php';
            }
        ?>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>