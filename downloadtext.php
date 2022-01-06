<?php

//external HTML DOM parser
require 'simple_html_dom.php';

if($_POST['urlLink'] != ""){
    
    $link_submit = 'https://en.wikipedia.org/wiki/'.$_POST['urlLink'];

    $link_html_page = file_get_html($link_submit);
    
    //remove punctuation and standardize the case of every word in string
    function standard_string($string){
        
        //convert string to lowercase
        $string = strtolower($string);

        //keep letters and numbers
        $string = preg_replace('/[^a-z]+/i', ' ', $string);

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


    //merge paragraph array elements to single string
    $paragraph_merge_string = join(" ",$link_html_page->find("p"));


    //add words from merged paragraph to array
    $words_array = explode(" ",standard_string($paragraph_merge_string));

    
    //output single instances of words
    foreach(array_unique($words_array) as $word){

         echo $word." ".word_frequency($words_array,$word)."<br>"; 
                
    }

    echo "Page :".$link_submit;

}


?>