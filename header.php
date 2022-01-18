<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    var show = true;
    $('#show_hide_all').click(function() {
      if (show) {
        $('td').hide();
        $('td strong').parents('tr').find('*').show();
      } else {
        $('td').show();
      }
      show = !show;
    });
  });
</script>
<body>
    <div class="container">
        <div class="card text-center">
            <h5 class="card-header">Web Page Scrapper</h5>