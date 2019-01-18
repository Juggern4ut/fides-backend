<?php
    $q = $db->query("SELECT firstname, lastname, street, zip, town, birthday, phone FROM tbl_member WHERE member_id = '".$_GET["member"]."' LIMIT 1");
    $res = $q->fetch_assoc();
    echo "<br>";
    echo $res["firstname"]."<br>";
    echo $res["lastname"]."<br>";
    echo $res["street"]."<br>";
    echo $res["zip"]."<br>";
    echo $res["town"]."<br>";
    echo $res["birthday"]."<br>";
    echo $res["phone"]."<br>";
?>