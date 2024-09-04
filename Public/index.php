<?php

session_start();


class App
{
    
    
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home'; #if statement:  if URL doesnt exist return to home page
        $URL = explode("/", $URL);
        return $URL;
    }
    
    
    private function loadController()
    {
        $URL = splitURL();
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        if (file_exists($filename)) 
        {
            require $filename;
        }else {
            $filename = "../app/controllers/_404.php";
            // echo "controller not found.";
            require $filename;
        }
    }
    
}

function show($stuf){
    echo "<prep>";
    print_r($stuf);
    echo "<prep>";
}

loadController();


