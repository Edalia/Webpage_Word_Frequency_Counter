<?php
  
  require 'downloadtext.php';
  require_once("../Webpage_Word_Frequency_Counter/lib/detectlanguage.php");
  use \DetectLanguage\DetectLanguage;

  session_start();

  DetectLanguage::setApiKey('71c1cbbd150e8c75125d4df93ade0521');

  
  if(isset($_SESSION['words_array'])){
?>

<?php include "header.php"; ?>

<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">     
          <?php  echo "The search found a total of ".count(array_unique($_SESSION['words_array']))." words with ".count($_SESSION['words_array'])." word instances."; ?>
          <br>
          <br>
          <button class="btn btn-primary"  id="show_hide_all">Show/Hide all</button>
            
            <table class="table table-bordered">
              
              <thead>
                <th>Word</th>
                <th>Frequency</th>
              </thead>
              <tbody>
                <?php 
                  //check frequency of values and add to array - word(key), frequency(value)
                  $words_and_frequency =array_count_values($_SESSION['words_array']);
                  
                  //sort array in descending order based on value (frequency)
                  arsort($words_and_frequency);

                  foreach($words_and_frequency as $word => $frequency){?>
                      <tr>
                        <td><?php echo $word; ?></td>
                        <td><?php echo word_frequency($frequency); ?></td>
                      </tr>
                                        
                  <?php 
                    }?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <?php echo "Click to find english or non-english words from the page.(Limited to pages with 100 words or less)";?>
          <br><br>
          <form action='wordlist.php' method='post'>
            <div class="mb-3">
            <?php
              if(count(array_unique($_SESSION['words_array']))<=100){
            ?>
                <input class="btn btn-primary" type='submit' value="Get words' language" name=langSubmit />
            <?php
              }else{
            ?>
                <input class="btn btn-primary" type='submit' value="Get words' language" disabled/>
            <?php  
              }
            ?>
            </div>
          </form>
          <?php
            if(isset($_POST['langSubmit'])){
              if(count(array_unique($_SESSION['words_array']))<=100){
                  foreach(array_unique($_SESSION['words_array']) as $word_to_detect){
                    $language = DetectLanguage::simpleDetect($word_to_detect);

                    if($language == 'en'){

                      $english_words[] = $word_to_detect;

                    }else{
                      $non_english_words[] = $word_to_detect;
                    }
                  }
                  
                  if(count($english_words)<1){
          ?>
                  <div class="alert alert-primary" role="alert">
                    There were no english words found.
                  </div>
          <?php
                  }else{
                      echo "The english words found were: ";
          ?>
                  <ol>
          <?php
                  foreach($english_words as $english_word){
                          echo "<li>".$english_word."</li>";
                      }
                  }
          ?>
                  </ol>
                  <br>
          <?php
                  if(count($non_english_words)<1){
          ?>
                  <div class="alert alert-primary" role="alert">
                    There were no non-english words found.
                  </div>
          <?php
                  }else{
                    echo "The non-english words found were: ";
          ?>
                  <ol>
          <?php
                    foreach($non_english_words as $non_english_word){
                      echo "<li>".$non_english_word."</li>";
                    }
                  }
          ?>
                  </ol>
          <?php
              }
            }
          ?>
        </div>
      </div>   
    </div> 
  </div>
</div>

<?php include "footer.php"; ?>      

<?php 

}else{
    header('Location:index.php');
}
?>