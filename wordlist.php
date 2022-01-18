<?php
  
  require 'downloadtext.php';
  require_once("../Webpage_Word_Frequency_Counter/lib/detectlanguage.php");
  use \DetectLanguage\DetectLanguage;

  session_start();

  DetectLanguage::setApiKey('5b3994e0e15708a702331d26cfb89564');

  
  if(isset($_SESSION['words_array'])){
?>

<?php include "header.php"; ?>

<div class="card-body">
  <div class="row">
    <div class="col">
        
      <?php  echo "The search found a total of ".count($_SESSION['words_array'])." words."; ?>
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
    <div class="col">
      The english words found were:
      
      <?php
      //detect languages of words from $_SESSION['words_array']
      $word_languages = DetectLanguage::detect($_SESSION['words_array']);
      
      echo var_dump($word_languages);




      // foreach($_SESSION['words_array'] as $word_detect){
        
      //   //detect english words on the page
      //   if(DetectLanguage::detect($word_detect) == "en"){
      //     echo $word."<br>";
      //   }else{
          
      //   }

      // }
      ?>
    </div> 
  </div>
</div>

<?php include "footer.php"; ?>      

<?php 

}else{
    header('Location:index.php');
}
?>