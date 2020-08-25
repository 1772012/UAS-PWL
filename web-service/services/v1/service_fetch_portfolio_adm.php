
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

include_once 'web-service/entity/Portfolio.php';
include_once 'web-service/dao/PortfolioDaoImpl.php';
include_once 'web-service/util/DBConnector.php';


header('content-type:application/json');
$portfolioDao = new PortfolioDaoImpl();

$portfolio = $portfolioDao->fetchPortfolioData();
echo json_encode($portfolio);