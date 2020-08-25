
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

include_once 'web-service/entity/portfoliop';
include_once 'web-service/dao/PortfolioDaoImpl.php';
include_once 'web-service/util/DBConnector.php';

header('content-type:application/json');
$name = filter_input(INPUT_POST, 'name');
$fe_user_id = filter_input(INPUT_POST, 'fe_user_id');
$level = filter_input(INPUT_POST, 'level');
$type = filter_input(INPUT_POST, 'type');
$participation = filter_input(INPUT_POST, 'participation');
$description = filter_input(INPUT_POST, 'description');
$certificate = filter_input(INPUT_POST, 'certificate');
$jsonData = array();

if (isset($name) && !empty($name)) {
    $portfolioDao = new portfolioDaoImpl();
    $portfolio = new portfolio();
    $portfolio->setName($name);
    $portfolio->setFeUserId($fe_user_id);
    $portfolio->setLevel($level);
    $portfolio->setType($type);
    $portfolio->setparticipation($participation);
    $portfolio->setDescription($description);
    $portfolio->setCertificate($certificate);

    $response = $portfolio->addPortfolio($portfolio);

    if ($response) {
        $jsonData['status'] = 1;
        $jsonData['message'] = "Add data success";
    } else {
        $jsonData['status'] = 2;
        $jsonData['message'] = "Error add data";
    }


} else {
    $jsonData['status'] = 0;
    $jsonData['message'] = "Missing data for input";
}

echo json_encode($jsonData);