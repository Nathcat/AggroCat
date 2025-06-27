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
    <script src="/static/scripts/AggroCat.js"></script>
</head>

<body>
    <div id="page-content" class="content">
        <?php include("header.php"); ?>

        <div class="main">
            <div id="leaderboard" class="content-card column">

            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>

<script>
    get_leaderboard((data) => {
        if (data.length !== 0) {
            for (let i = 0; i < data.length; i++) {
                let userRecord = data[i];
                document.getElementById("leaderboard").innerHTML += "<div class='user-record row align-center'><div class='row' style='align-items: center; justify-content: end; width: 100%; height: 100%; margin-right: 25px;'><div class='small-profile-picture'><img src='https://cdn.nathcat.net/pfps/" + userRecord.pfpPath + "'></div></div><div class='column' style='width: 100%; height: 100%; justify-content: center;'><h2><b>" + userRecord.fullName + "</b></h2><p><i>" + userRecord.username + "</i></p></div><h1>" + userRecord.value + "</h1></div>"
            }
        }
        else {
            $("#leaderboard").html("<h1 style='width: 100%; text-align: center;'>No one has aggravated Nathan recently!</h1>");
        }
    });
</script>

</html>