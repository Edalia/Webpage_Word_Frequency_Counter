<?php

//external HTML DOM parser

require 'simple_html_dom.php';

//if($_POST['urlLink'] != ""){
    
    //$link_submit = 'http://'.$_POST['urlLink'];
    $link_submit = 'https://en.wikipedia.org/wiki/Wiki';

    $link_html_page = file_get_html($link_submit);
    
    //$link_html_page->find('p') an array of paragraphs on the page
    //for every paragraph element in the page (string), split the string into individual words

    // foreach($link_html_page->find('p') as $string_element){

    //     $words_array = explode(" ", $string_element->plaintext);
        



    //     print_r($words_array);
    
    // }



    //remove punctuation and standardize the case of every word in string
    function standard_string($string){
        
        //convert string to camelcase
        $string = ucwords($string);

        //keep letters and numbers
        $string = preg_replace('/[^a-z]+/i', ' ', $string);

        return $string;

    }

    //check frequency of words in string array
    function word_frequency($array,$string){

        $freq_values = array_count_values($array);
        
        //check if string exists in array
        if (in_array( $string ,$array )){
            $count = $freq_values[$string];

            if($count == 1){
                return "Unique";
            }else if($count > 1){
                return $count;
            }
            
         
        }else{
            return "Not present";
        }
       
    }



    $paragraph = $link_html_page->find('p',2);
    $para_string = $paragraph->plaintext;

    $words_array = explode(" ",standard_string($para_string));



    foreach($words_array as $word){
        echo $word."<br>";   
    }

    // for($i=0; $i<count($link_html_page->find("p")) ;$i++){

    //     $para_string = $link_html_page->find("p",$i)->plaintext;

    
    //     $words_array = explode(" ",$para_string);

    
    //     print_r($string_array);

    // }



    
//}


?>