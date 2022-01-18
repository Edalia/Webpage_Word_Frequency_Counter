<?php

//external HTML DOM parser
require 'simple_html_dom.php';

        
    /**
     * Remove punctuation and standardize the case of every word in string
     * 
     * @param string  string from paragraphs
     * 
     * @return string camelcase string
     */
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

    /**
     * Check frequency of words in string array
     * 
     * @param int frequency value
     * 
     * @return string frequency statement
     */
    function word_frequency($frequency){

        if($frequency == 1){
            return "Appeared Once";
        }if($frequency == 2){
            return "Appeared twice";
        }
        else if($frequency > 2){
            return "Present ".$frequency." times.";
        }
           
}

    /**
     *  Extract words given the path/url of the web page
     * @param string web page $path
     * 
     */
    
    function scrap_words($path){
        $link_html_page = file_get_html($path);

        //check if html page is found
        if($link_html_page){
            
            //merge paragraph array elements to single string
            $paragraph_merge_string = join(" ",$link_html_page->find("p"));

            
            //check if merged paragraphs are empty- no words found, returns empty string
            if(empty($paragraph_merge_string)){

                echo "<script>
                        alert('No words were found in any paragraph.Try a different web page'); 
                        location.href= 'index.php';
                      </script>";

            }else{

                //start session variable to be used in wordlist.php
                session_start();

                //add words from merged paragraph to session array
                $_SESSION['words_array'] = explode(" ",standard_string($paragraph_merge_string));
                
                header("Location:wordlist.php");
            }

        }else{
            echo "<script>
                    alert('Page not Found'); 
                    location.href= 'index.php';
                  </script>";
        }

    }

    
//submission via url input
if(isset($_POST['urlLink'])){
    
    //check if submitted URL has https:
    if (strpos($_POST['urlLink'], "http") === 0) {

        //scrap page using url
        scrap_words($_POST['urlLink']);

    }else{
        //add https:// if URL lacks it
        scrap_words("https://".$_POST['urlLink']);
    }
}

//submission via page upload
if(isset($_POST['uploadSubmit'])){

    
    $upload_directory = "../Webpage_Word_Frequency_Counter/fileuploads/";

    //get file path
    $webpage_path = $upload_directory. basename($_FILES["uploadPage"]["name"]);

    //filetype variable
    $file_type = strtolower(pathinfo($webpage_path,PATHINFO_EXTENSION));

    //check if file type is html page
    if($file_type == "html") {

        //upload copy of file to directory
        copy($_FILES['uploadPage']['tmp_name'], $webpage_path);

        //scrap uploaded file
        scrap_words($webpage_path);

    }else{
        echo "<script>
                alert('File is not a web page'); 
                location.href= 'index.php';
            </script>";
    }
      
}


?>