<?php include "header.php"; ?>

<div class="card-body">
                    <div class="row">
                    <p class="card-text">Extracts words from a html page and lists the frequency of the words on the page.</p>
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
                        <b>OR</b>
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

<?php include "footer.php"; ?>