<?php
/**
 * @author 1772012 - Kafka Febianto Agiharta
 */
class PortfolioController
{
    public function index()
    {
        //  Code block below for delete
        $command = filter_input(INPUT_GET, 'cmd');

        if (isset($command) && $command == 'delete') {
            $name = filter_input(INPUT_GET, 'name');
            if (isset($name)) {

                $sendData = array('name' => $name);
                $wsResponse = Utility::curl_post(ApiService::DELETE_PORTFOLIO_URL, $sendData);
                $response = json_decode($wsResponse);
                if ($response->status == 1) {
                    echo
                        '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Data successfully deleted</strong>' .
                        '</div>';
                } else {
                    echo
                        '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Data failed to delete</strong>' .
                        '</div>';
                }
            }
        }


        //  Code block below for insert
        $isSubmitted = filter_input(INPUT_POST, 'btnSubmit');

        if (isset($isSubmitted)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $user_id = $_SESSION['user_session_id'];
            $level = filter_input(INPUT_POST, 'txtLevel');
            $type = filter_input(INPUT_POST, 'txtType');
            $participation = filter_input(INPUT_POST, 'txtParticipation');
            $description = filter_input(INPUT_POST, 'txtdescription');

            if (isset($_FILES['txtCertificate']['name'])) {
                $targetDirectory = 'uploads/';
                $fileExtension = pathinfo($_FILES['txtCertificate']['name'], PATHINFO_EXTENSION);
                $newFilename = $name . '.' . $fileExtension;
                $targetFile = $targetDirectory . $newFilename;

                if ($_FILES['txtCertificate']['size'] > 1024 * 2048) {
                    echo '<div class="bg-info">Upload error! File size exceed 2 MB</div>';
                } else {
                    move_uploaded_file($_FILES['txtCertificate']['tmp_name'], $targetFile);
                }

                $certificate = $newFilename;

                $sendData = array('name' => $name, 'user_id' => $user_id, 'level' => $level, 'type' =>
                    $type, 'participation' => $participation, 'description' => $description, 'certificate' => $certificate);
                $wsResponse = Utility::curl_post(ApiService::ADD_PORTFOLIO_URL, $sendData);
                $response = json_decode($wsResponse);

                if ($response->status == 1) {
                    echo
                        '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data successfuly added</strong> Category of: ' . $name .
                        '</div>';
                } else {
                    echo
                        '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data failed to add</strong> Category of: ' . $name .
                        '</div>';
                }

            } else {

                $sendData = array('name' => $name, 'user_id' => $user_id, 'level' => $level, 'type' =>
                    $type, 'participation' => $participation, 'description' => $description, 'certificate' => '');
                $wsResponse = Utility::curl_post(ApiService::ADD_PORTFOLIO_URL, $sendData);
                $response = json_decode($wsResponse);

                if ($response->status == 1) {
                    echo
                        '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data successfuly added</strong> Category of: ' . $name .
                        '</div>';
                } else {
                    echo
                        '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data failed to add</strong> Category of: ' . $name .
                        '</div>';
                }

            }
        }

        //  Fetch all data

        $wsResponseBook = Utility::curl_get(ApiService::ALL_PORTFOLIO_URL, array());
        $portfolios = json_decode($wsResponseBook);

        include_once 'pages/portfolio_page.php';
    }
}