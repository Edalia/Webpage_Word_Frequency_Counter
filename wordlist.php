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
                
                foreach(array_unique($_SESSION['words_array']) as $word){?>

                    <tr>
                        <td><?php echo $word; ?></td>
                        <td><?php echo word_frequency($_SESSION['words_array'],$word)?></td>
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