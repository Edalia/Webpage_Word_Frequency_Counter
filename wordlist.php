<?php
  
  require 'downloadtext.php';
  session_start();

  if(isset($_SESSION['words_array'])){
?>
<html>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <div>
        <table style="width:100%">
            <thead>
                <?php //echo "Page :".$link_submit;?>
                <th>Word</th>
                <th>Frequency</th>
            </thead>
            <tbody>
                <?php 
                
                    //check frequency of values and add to array - word(key), frequency(value)
                    $words_and_frequency =array_count_values($_SESSION['words_array']);
               
                    //sort array in descending order based on value (frequency)
                    arsort($words_and_frequency);

                    foreach(array_unique($words_and_frequency) as $word => $frequency){?>
                    
                    <tr>
                        <td><?php echo $word; ?></td>
                        <td><?php echo word_frequency($frequency); ?></td>
                    </tr>
                    

                <?php }?>
            </tbody>

        </table>
    </div>
</body>

</html>
<?php 

}else{
    header('Location:index.php');
}
?>