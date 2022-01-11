<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <h5 class="card-header">Web Page Scrapper</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Input the URL of the page</p>
                                        <form action='downloadtext.php' method='post'>
                                            <div class="mb-3">
                                                https:// <input type='text' name='urlLink' placeholder="example.com" required>
                                            </div>
                                            <div class="mb-3">
                                                <input class="btn btn-primary" type='submit' value='Check Words' name=uploadURL />
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Upload the web page (.html) file</p>
                                        <form action='downloadtext.php' method='post' enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="file" name="uploadPage" required id="file-input" />
                                            </div>
                                            <div class="mb-3">
                                                <input class="btn btn-primary" type='submit' value='Check Words' name=uploadSubmit />
                                            </div>
                                        </form>
                                </div>
                            </div>  
                        </div>
                        </div>
                    </div> 
                </div>
        </div>       
    </div>
</body>

</html>