<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $db->query("INSERT INTO tbl_member (role_fk, group_fk, firstname, lastname, street, zip, town, birthday, phone) 
                    VALUES ('".$_POST["role"]."', '".$_POST["group"]."', '".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["street"]."', '".$_POST["zip"]."', '".$_POST["town"]."', '".date("Y-m-d", strtotime($_POST["birthday"]))."', '".$_POST["phone"]."')");
    }
?>
<form class="form" method="POST">
    <select class="form__input" name='role'>
        <?php
            foreach ($GLOBALS['roles'] as $id => $title) {
                echo "<option value='".$id."'>".$title."</option>";
            }
        ?>
    </select>
    <select class="form__input" name='group'>
        <?php
            foreach ($GLOBALS['groups'] as $id => $title) {
                echo "<option value='".$id."'>".$title."</option>";
            }
        ?>
    </select>
    <input class="form__input" type="text" name="firstname" placeholder="Vorname">
    <input class="form__input" type="text" name="lastname" placeholder="Nachname">
    <input class="form__input" type="text" name="street" placeholder="Strasse">
    <input class="form__input" type="text" name="zip" placeholder="PLZ">
    <input class="form__input" type="text" name="town" placeholder="Ortschaft">
    <input class="form__input" type="text" name="birthday" placeholder="Geburtstag">
    <input class="form__input" type="text" name="phone" placeholder="Telefon">
    <input class="form__input" type="submit" value="Speichern">
</form>