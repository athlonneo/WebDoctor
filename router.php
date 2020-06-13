<?php 
    session_start();
    $url = $_SERVER['REDIRECT_URL'];
    $baseURL = '/WebDoctor';

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch($url) {
            case $baseURL.'/login':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                echo $userCtrl->view_login();
                break;
            case $baseURL.'/register':
                require_once "controller/userController.php";
                $userCtrl = new UserController();            
                echo $userCtrl->view_register();
                break;
            case $baseURL.'/index':
                require_once "controller/userController.php";
                $userCtrl = new UserController();  
                echo $userCtrl->view_index();
                break;
            case $baseURL.'/result':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                $disCtrl->view_result();
                //$disCtrl->diagnose();
                //header('Location: result');
                break;    
            case $baseURL.'/diagnose':
                require_once "controller/DiseaseController.php";
                $userCtrl = new DiseaseController();  
                echo $userCtrl->view_diagnose();
                break;
            case $baseURL.'/profile':
                require_once "controller/userController.php";
                $userCtrl = new userController();  
                echo $userCtrl->view_profile();
                break;
            case $baseURL.'/changepass':
                require_once "controller/userController.php";
                $userCtrl = new userController();  
                echo $userCtrl->view_changepass();
                break;
            case $baseURL.'/adminpage':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();  
                echo $disCtrl->view_adminpage();
                break;
            case $baseURL.'/history':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController();  
                echo $disCtrl->view_history();
                break;
            case $baseURL.'/company':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                echo $userCtrl->view_company();
                break;
            case $baseURL.'/report':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController();  
                echo $disCtrl->view_report();
                break;
            case $baseURL.'/pdf':
                require_once "controller/pdf.php";
                $pdfCtrl = new PDFController();  
                $pdfCtrl->createPDF();
                break;
            case $baseURL.'/account':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                echo $userCtrl->view_account();
                break;
            case $baseURL.'/details':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController(); 
                echo $disCtrl->view_details();
                break; 
            case $baseURL.'/disease':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController(); 
                echo $disCtrl->view_disease();
                break; 
            default:
                header('Location: index');
                break;
        }
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch($url) {
            case $baseURL.'/login':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                $userCtrl->login();
                break;
            case $baseURL.'/register':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                $userCtrl->newUser();  
                break;
            case $baseURL.'/logout':
                session_destroy();
                header('Location: index');
                break;
            case $baseURL.'/diagnose':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController();  
                $disCtrl->diagnose();
                break;
            case $baseURL.'/upload':
                require_once "controller/uploadController.php";
                $uplCtrl = new UploadController();
                $uplCtrl->upload();
                header('Location: profile');
                break;
            case $baseURL.'/delete':
                require_once "controller/uploadController.php";
                $uplCtrl = new UploadController();
                $uplCtrl->delete();
                header('Location: profile');
                break;
            case $baseURL.'/changepass':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                $userCtrl->changePass(); 
                break;
            case $baseURL.'/newDisease':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                $disCtrl->newDisease();
                header('Location: adminpage');
                break;
            case $baseURL.'/newSymptom':
                require_once "controller/symptomController.php";
                $symCtrl = new SymptomController();
                $symCtrl->newSymptom();
                header('Location: adminpage');
                break;
            case $baseURL.'/linkDS':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                $disCtrl->linkDS();
                break;
            case $baseURL.'/delDS':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                $disCtrl->delDS();
                break;
            case $baseURL.'/result':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                echo $disCtrl->view_result();
                //$disCtrl->diagnose();
                //header('Location: result');
                break;
            case $baseURL.'/history':
                require_once "controller/DiseaseController.php";
                $disCtrl = new DiseaseController();  
                echo $disCtrl->view_history2();
                break;
            case $baseURL.'/delDisease':
                require_once "controller/diseaseController.php";
                $disCtrl = new DiseaseController();
                $disCtrl->delDisease();
                header('Location: adminpage');
                break;
            case $baseURL.'/delSymptom':
                require_once "controller/symptomController.php";
                $symCtrl = new SymptomController();
                $symCtrl->delSymptom();
                header('Location: adminpage');
                break;
            case $baseURL.'/account':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                echo $userCtrl->view_account_filtered();
                break;
            case $baseURL.'/deleteUser':
                require_once "controller/userController.php";
                $userCtrl = new UserController();
                $userCtrl-> deleteUser();
                header('Location: account');
                break; 
            default:
                echo '404 Not Found';
                break;
        } 
    }
?>