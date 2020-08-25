

<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

include_once 'web-service/entity/User.php';
include_once 'web-service/dao/userDaoImpl.php';
include_once 'web-service/util/DBConnector.php';

$Id = filter_input(INPUT_POST, 'Id');
$password = filter_input(INPUT_POST, 'password');

header('content-type:application/json');

$jsonData = array();

if (isset($Id) && isset($password) && !empty($Id) && !empty($password)) {
    $userDao = new userDaoImpl();

    $user = new User();
    $user->getFeUserId($Id);
    $user->setPassword(md5($password));
    $user = $userDao->login($user);

    if (isset($user) && $user != null && $user->getFeUserId() == $Id && $user->getPassword() == md5($password)) {
        $jsonData['status'] = 1;
        $jsonData['message'] = "Login Success!";
        $jsonData['user_data'] = $user;
    } else {
        $jsonData['status'] = 2;
        $jsonData['message'] = "Invalid username or password!";
    }
} else {
    $jsonData['status'] = 0;
    $jsonData['message'] = "Missing username or password!";
}
echo json_encode($jsonData);