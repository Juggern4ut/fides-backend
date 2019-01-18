<?php
    echo "<table class='table'>";

        echo "<tr class='table__row'>";
            echo "<td class='table__cell table__cell--header' colspan='6'>".$GLOBALS['groups'][$_GET["group"]]."</td>";
        echo "</tr>";

        echo "<tr class='table__row'>";
            echo "<td class='table__cell table__cell--header'>Vorname</td>";
            echo "<td class='table__cell table__cell--header'>Nachname</td>";
            echo "<td class='table__cell table__cell--header'>Strasse</td>";
            echo "<td class='table__cell table__cell--header'>PLZ Ort</td>";
            echo "<td class='table__cell table__cell--header'>Telefon</td>";
            echo "<td class='table__cell table__cell--header'>Rolle</td>";
        echo "</tr>";

        $q = $db->query("SELECT m.member_id, m.firstname, m.lastname, m.street, m.zip, m.town, m.phone, r.title, r.role_id FROM tbl_member AS m LEFT JOIN tbl_group AS g ON m.group_fk = g.group_id LEFT JOIN tbl_role AS r ON m.role_fk = r.role_id WHERE g.group_id = '".$_GET["group"]."' ORDER BY r.role_id ASC, m.firstname ASC");
        while($res = $q->fetch_assoc()){
            echo "<tr class='table__row table__row--role-".$res['role_id']."'>";
                echo "<td class='table__cell'><a href='/?group=".$_GET["group"]."&member=".$res['member_id']."'>".$res['firstname']."</a></td>"; 
                echo "<td class='table__cell'>".$res['lastname']."</td>"; 
                echo "<td class='table__cell'>".$res['street']."</td>"; 
                echo "<td class='table__cell'>".$res["zip"]." ".$res["town"]."</td>";
                echo "<td class='table__cell'>".$res["phone"]."</td>";
                echo "<td class='table__cell'>".$res['title']."</td>"; 
            echo "</tr>";
        }
    echo "</table>";
    echo "<a href='/?add'>Mitglied hinzufügen</a>";
?>