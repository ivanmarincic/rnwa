<?php
try {
    // get the q parameter from URL
    $s = $_REQUEST["s"];
    $rows = "";
    $db = new mysqli("localhost", "root", "", "bank");
    if ($db) {

        $sql = "SELECT e.EMP_ID, e.FIRST_NAME, e.LAST_NAME, e.TITLE, d.NAME as DEPARTMENT FROM employee e INNER JOIN department d on d.DEPT_ID = e.DEPT_ID WHERE 1=1";
        if ($s) {
            $sql .= " AND (e.FIRST_NAME LIKE '%" . $s . "%' OR e.LAST_NAME LIKE '%" . $s . "%')";
        }
		
        $result = $db->query($sql) or die("Doslo je do problema prilikom izvrsavanja upita...");
        $n = mysqli_num_rows($result);
        if ($n > 0) {
            while ($myrow = mysqli_fetch_row($result)) {
                $rows .= "<div id=\"" . $myrow[0] . "\">" . $myrow[1] . " " . $myrow[2] . ", " . $myrow[3] . ", " . $myrow[4] . "</div>";

            }
        } else {
            echo "<b>Nema podataka<b>";
        }
    } else {
        echo "<b>Nije proslo spajanje<b>";
    }
    echo $rows;
} catch (Exception $e) {
    echo print_r($e, TRUE);
}
?>
