<?php
  
  require 'downloadtext.php';
  session_start();

  if(isset($_SESSION['words_array'])){
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead>
                                <?php //echo "Page :".$link_submit;?>
                                <th>Word</th>
                                <th>Frequency</th>
                            </thead>
                            <tbody>
                                <?php 
                                    echo "There were a total of ".count($_SESSION['words_array'])." words.";
                                    
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
        </div>
    </div>
</body>

</html>
<?php 

}else{
    header('Location:index.php');
}
?>