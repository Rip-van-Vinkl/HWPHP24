<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HW №1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="flex-container">
        <header>
            <div class="header">
                <?php include 'menu.inc.php' ?>
                <?php include 'logo.inc.php' ?>
            </div>
        </header>

        <main>
            <div class="hi">
                <h1> <?php echo $p ?> </h1>
            </div>

            <section>
                <div class="about-me">

                    <div class="fullname">

                        <p> Меня зовут
                            <?php echo $name, ' ', $surname . '<br>';
                            echo 'Я живу в городе', ' ', $city;  ?>
                        </p>

                        <p> Мне <?php echo $age; ?> года </p>

                    </div>


                    <div class="left-arrow">
                        <p style="font-size: 30px;">===== Капица меня мотивирует =====></p>
                    </div>


                    <div class="my-img">

                        <?php
                        echo "<img src='images/scuko.jpg' title='С.П. Капица'>";
                        ?>
                    </div>
                </div>
            </section>

            <section>
                <div class="knowledge">

                    <div class="my-true-knowledge">

                        <h2>Это я пытаюсь кодить:</h2>
                        <?php
                        echo "<img src='images/me.jpg' title='Мои навыки в php'>";
                        ?>

                    </div>

                    <div class="my-new-knowledge">
                        <p>В этом модуле мы научились:</p>
                            <?php include 'knowledge.inc.php' ?>
                        </ol>

                    </div>

                    <div class="free-place">
                        <p>место для вашей рекламы</p>
                    </div>
                </div>
            </section>


            <section>
                <div class="article">
                    <p class="text">
                        Место для статьи о PHP
                    </p>
                </div>
            </section>
        </main>

        <footer>
            <div class="footer">
                <?php include 'footer.inc.php' ?>
            </div>
        </footer>

    </div>

</body>

</html>