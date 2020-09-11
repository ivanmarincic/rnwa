<?php
try {
    ini_set('soap.wsdl_cache_enabled', 0);
    ini_set('soap.wsdl_cache_ttl', 0);
    $sClient = new SoapClient('http://localhost/wsdl/bank.wsdl',
        array('cache_wsdl' => WSDL_CACHE_NONE, 'trace' => 1)
    );
    $q = "";
    if (!empty($_POST)) {
        $q = $_POST['q'];
    }
    $response = $sClient->listEmployees($q);
    $sClient->__getLastRequest();

} catch (SoapFault $e) {
    var_dump($e);
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Banka baza</title>
</head>
<body>
<div class="col-12 header">
    <h1 class="col-8">Banka</h1>
</div>
<div class="row">
    <div class="col-9">
        <div class="main_frame">
            <div class="search_form">
                <form id="form" action="./employees.php" method="post">
                    <input type="text" name="q">
                    <button type="submit">Pretraži</button>
                </form>
            </div>
            <div class="frame1">
                <?php
                foreach ($response as $row) {
                    echo "<hr><div>
<p>$row[0] $row[1],$row[2],$row[3]</p>
</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
