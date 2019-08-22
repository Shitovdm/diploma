<?php

/**     @author Shitov Dmitry
 *      Скрипт производит поэтапный вызов bash скриптов для обновления системы.
 * 
 * 
 */

$act = $_POST["act"];

//  Проверка соединения с интернетом.
if($act === "checkConnection"){
    $x = fsockopen('yandex.ru', 80, $err, $ern, 1);
    if(!$x){
        //  Соединения нет.
        //echo 'false';
        $Text = "Нет соединения с интернетом. Установка обновлений невозможна.";
        $NextAction = 0;
    }else{ 
        //  Соединение есть.
        //echo 'true';
        //$Text = exec('whoami');
        //$Text = "Загрузка необходимых компонентов...";
        //$NextAction = "Проверка наличия обновлений...";
        //$NextAction = "syncRepo";
        $NextAction = 0;
        //exec("sudo chmod -R 777 /var/www/html/upgrade/text.sh");
        //exec("sudo chmod +x /var/www/html/upgrade/text.sh");
        //$Text .= exec("./file.sh");
        //mkdir('/test1', 0777, true);
        //exec("/var/www/html/upgrade/test.sh");
        //
        $Text = exec("ls");
        
        //exec("cd upgrade");
        //exec("mkdir newdir");
        
        //$res = exec("/var/www/html/service/test.sh");
        //chmod("file.sh", 0755);
        sleep(1);
    }
}

// Установка прав на исполнение bash скриптов.
/*if($act === "setPermissions"){
    exec("/etc/apache2/exec.sh");
    //exec("sudo ./permission.sh");
    
    sleep(2);
    $Text = $resp . "\n Синхронизация с сервером...";
    $NextAction = 0;
    //$NextAction = "syncRepo";
}*/

//  Скачивание последних обновлений.
/*if($act === "syncRepo"){
    //$Text = shell_exec('sudo ./update.sh');
    //$Text = shell_exec("/var/www/html/service/update.sh 2>&1");
    $res = exec("/var/www/html/service/copy_repo.sh");
    $Text = $res . " Установка обновлений...";
    $NextAction = "moveFiles";
    sleep(1);
}

//  Позиционирование файлов по нужным папкам.
if($act === "moveFiles"){
    //$Text = shell_exec('sudo ./update.sh');
    //$Text = shell_exec("/var/www/html/service/update.sh 2>&1");
    $res = exec("/var/www/html/service/ret/service/bash/move_files.sh");
    $Text = $res . " Установка обновлений окончена!";
    $NextAction = 0;
    sleep(1);
}*/

$response = array(
    "text" => $Text,
    "nextAction" => $NextAction
);

echo(json_encode($response));

?>