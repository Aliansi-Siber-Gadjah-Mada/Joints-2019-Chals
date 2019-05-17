<?php require __DIR__ . "/layouts/header.php"; ?>

    <div class="container">
        <h1>Dashboard</h1>
        <form action="/fighter/upload" method="post" enctype="multipart/form-data">
            <b>Choose your fighter:</b>
            <p>Fighter Name: <input type="text" name="title"></p>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
            <p>*Only accept JPG files</p>
            <?php if ($uploadMsg !== null): ?>
                <br>
                <p><?php echo $uploadMsg; ?></p> 
            <?php endif; ?>
        </form>
    </div>

    <?php if ($_SESSION['auth']['user']['is_admin'] == '1'): ?>
        <div class="container">
            <h1>List Fighters:</h1>
            <div id="fighters">

            </div>
        </div>

        <script>
            $.get('/fighter/all', function(data, status){
                data.forEach(function (item, index) {
                    $('#fighters').append('<p><a href="/fighter/get?src=' + item.src + '">' + item.src + '</a></p>');
                });
            });
        </script>
    <?php endif; ?>

<?php require __DIR__ . "/layouts/footer.php"; ?>