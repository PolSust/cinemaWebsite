<?php
include "components/head.php"
?>

<body>
    <div class="container">

        <header>
            <h1 class="text-center"><?= $title ?></h1>
        </header>

        <nav class="nav">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
            <a class="nav-link" aria-current="page" href="#">Link</a>
        </nav>

        <main><?= $content ?></main>

    </div>
</body>

</html>