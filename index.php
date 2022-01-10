<html>

<body>
    <div>
        <!--Submission via link input-->
        <form action='downloadtext.php' method='post'>
            <input type='text' name='urlLink' required>
            <br>
            <input type='submit' value='Check Words' name=uploadURL />
        </form>
        <!--Submission via page upload-->
        <form action='downloadtext.php' method='post' enctype="multipart/form-data">
        <input type="file" name="uploadPage" required>
            <br>
            <input type='submit' value='Check Words' name=uploadSubmit />
        </form>
    </div>
</body>
</html>