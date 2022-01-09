<?php

//external HTML DOM parser
require 'simple_html_dom.php';

    //remove punctuation and standardize the case of every word in string
    function standard_string($string){
        
        //convert string to lowercase
        $string = strtolower($string);

        //keep letters and numbers
        $string = preg_replace('/[^a-z]+/i', ' ', $string);

        //remove single letter characters
        $string = trim(preg_replace("/(^|\s+)(\S(\s+|$))+/", " ", $string));

        //return string in camelcase
        return ucwords($string);

    }

    //check frequency of words in string array
    function word_frequency($array,$string){

        $freq_values = array_count_values($array);
        
        //check if string exists in array
        if (in_array( $string ,$array )){
            $count = $freq_values[$string];

            if($count == 1){
                return "unique";
            }else if($count > 1){
                return $count;
            }
            
         
        }else{
            return "Not present";
        }
       
    }

//submission via url input
if(isset($_POST['urlLink'])){
    
    $link_submit = 'https://en.wikipedia.org/wiki/'.$_POST['urlLink'];


    $link_html_page = file_get_html($link_submit);
    
    //check if html page is found from search
    if($link_html_page){
        
        //merge paragraph array elements to single string
        $paragraph_merge_string = join(" ",$link_html_page->find("p"));

        //start session variable to be used in wordlist.php
        session_start();

        //add words from merged paragraph to session array
        $_SESSION['words_array'] = explode(" ",standard_string($paragraph_merge_string));

        header("Location:wordlist.php");

    }else{
        echo "<script>
                alert('Page not Found'); 
                location.href= 'index.php';
              </script>";
    }
    

}else{
    // echo "False";
}

//submission via page upload
if(isset($_POST['loadPage'])){
    echo 'abc';
}


?>