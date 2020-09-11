<?php
if (!extension_loaded("soap")) {
    dl("php_soap.dll");
}
ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("wsdl/bank.wsdl");
function listEmployees($q)
{

    $resultData = array();
    $conn = mysqli_connect("localhost", "root", "");
    if ($conn) {
        $result = mysqli_select_db($conn, "bank");
        if (!$result) {
            throw new SoapFault("Server", "Nije se spojio na bazu.");
        }
        $sql = "SELECT e.FIRST_NAME, e.LAST_NAME, e.TITLE, d.NAME as DEPARTMENT
        FROM employee as e
        INNER JOIN department d ON e.DEPT_ID = d.DEPT_ID";
        if ($q) {
            $sql .= " WHERE e.FIRST_NAME LIKE '%$q%' OR e.LAST_NAME LIKE '%$q%'";
        }
        $result2 = mysqli_query($conn, $sql);
        if (!$result2) {
            throw new SoapFault("Server", "Nije dohvatio rezultat.");
        }
        while ($row = mysqli_fetch_array($result2)) {
            $resultData[] = $row;
        }
        return $resultData;
        mysqli_close($conn);
    } else {
        throw new SoapFault("Server", "Nije se spojio na server baze.");
    }
}

function listTransactions($q)
{

    $resultData = array();
    $conn = mysqli_connect("localhost", "root", "");
    if ($conn) {
        $result = mysqli_select_db($conn, "bank");
        if (!$result) {
            throw new SoapFault("Server", "Nije se spojio na bazu.");
        }
        $sql = "SELECT t.TXN_ID, t.AMOUNT, DATE_FORMAT(t.TXN_DATE, '%d.%m.%Y') FROM acc_transaction t";
        if ($q) {
            $sql .= " WHERE date(t.TXN_DATE) = date('$q')";
        }
        $result2 = mysqli_query($conn, $sql);
        if (!$result2) {
            throw new SoapFault("Server", "Nije dohvatio rezultat.");
        }
        while ($row = mysqli_fetch_array($result2)) {
            $resultData[] = $row;
        }
        return $resultData;
        mysqli_close($conn);
    } else {
        throw new SoapFault("Server", "Nije se spojio na server baze.");
    }
}

$server->AddFunction("listEmployees");
$server->AddFunction("listTransactions");
$server->handle();
?>
