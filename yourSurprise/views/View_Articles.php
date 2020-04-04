<body>
    <h1 id="main-title" class="text-center">VIDEO GAME ARE INSANES</h1>
    <?php
    while ($data=$req->fetch())
    {
        ?>
        <div class="container text-center article">
            <img  id="pic-article" class="f-w" src="pics/<?= htmlspecialchars($data['pic'])?>">
            <h2 id="article-title"><?= htmlspecialchars($data['title'])?></h2>
            <p id="content-article"><?= htmlspecialchars($data['content'])?></p>
            <hr>
            <p>Sent on: <?= htmlspecialchars($data['creation_date'])?></p>
            <div class="text-right">
                <a id="commentary-article" class="btn btn-dark btn-lg"  role="button" href="Commentaries.php?id=<?= htmlspecialchars($data['id'])?>">Comments</a>
            </div>
        </div>
        <?php   
    }
    $req->closeCursor();
    ?>
    <div class="mb row text-center">
        <?php
    $i=1;
    //while i inferior at the total of pages we create a new link for the next page
    for($i;  $i<=$TotalPages; $i++ )
    {   
        if($i==$_GET['page'])
        {   
            ?>
        <div id="active" class='col'>
            <p><?=$i?></p>
        </div>
            <?php
        }
        else {
            ?>
            <div class='col'>
            <a href="Articles.php?page=<?= htmlspecialchars($i)?>"><?=$i?></a>';
            </div>
        <?php
        }

    }
    ?>
</div>

</body>
</html>