<!DOCTYPE html>
<html>

<head>
    <title>AggroCat</title>

    <link rel="stylesheet" href="https://nathcat.net/static/css/new-common.css">
    <link rel="stylesheet" href="/static/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="page-content" class="content">
        <?php include("header.php"); ?>

        <div class="main">
            <div class="content-card column">
                <?php
                $conn = new mysqli("localhost:3306", "aggro", "", "AggroCat");
                $q = $conn->prepare("SELECT SSO.Users.username AS 'username', SSO.Users.fullName AS 'fullName', SSO.Users.pfpPath AS 'pfpPath', `value` FROM AggroIndex JOIN SSO.Users ON AggroIndex.id = SSO.Users.id ORDER BY `value` DESC");
                $q->execute();
                $set = $q->get_result();

                while ($u = $set->fetch_assoc()) {
                    echo "<div class='user-record row align-center'><div class='small-profile-picture' style='place-self: end; margin-right: 25px;'><img src='https://cdn.nathcat.net/pfps/" . $u["pfpPath"] . "'></div><div class='column' style='width: 100%; height: 100%; justify-content: center;'><h2><b>" . $u["fullName"] . "</b></h2><p><i>" . $u["username"] . "</i></p></div><h1>" . $u["value"] . "</h1></div>";
                }
                ?>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>

</html>