
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

include_once 'web-service/entity/Portfolio.php';
include_once 'web-service/dao/PortfolioDaoImpl.php';
include_once 'web-service/util/DBConnector.php';


header('content-type:application/json');
$isbn = filter_input(INPUT_POST, 'isbn');
$jsonData = array();

if (isset($isbn) && !empty($isbn)) {
    $portfolio = new portfolioDaoImpl();
    $portfolio = new portfolio();
    $portfolio->setId($id);
    $response = $portfolio->deletePortfolio($portfolio);
    if ($response) {
        $jsonData['status'] = 1;
        $jsonData['message'] = "Delete data success";
    } else {
        $jsonData['status'] = 2;
        $jsonData['message'] = "Error delete data";
    }
} else {
    $jsonData['status'] = 0;
    $jsonData['message'] = "Missing data for delete";
}
echo json_encode($jsonData);