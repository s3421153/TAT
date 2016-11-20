<?php

/* Created by Morgan Kovacic */

/*Returns true and sets the Permissions variable if the Username and
  Password exist in the currently opened database specified by link.*/
function tat_IsValidUser($link, $Username, $Password, &$Permissions) {
    $Permissions = "";
    if ($stmt = mysqli_prepare($link,
        "SELECT Permissions FROM user WHERE Username=? AND Password=?")) {
        $stmt->bind_param('ss', $Username, $Password);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array()) {
            $Permissions = $row['Permissions'];
            return true;
        }
    }
    else
        return false;
}

?>