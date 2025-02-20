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
        let records = Object.entries(data);

        if (records.length !== 0) {
            for (let i = 0; i < records.length; i++) {
                let userRecord = records[i];
                document.getElementById("leaderboard").innerHTML += "<div id='user-" + userRecord[0] + "' class='user-record row align-center'> <div></div> <div class='lds-ring'><div></div><div></div><div></div><div></div></div> <div></div> </div>"
                get_user(userRecord[0], (user) => {
                    $("#user-" + user["id"]).html("<div class='row' style='align-items: center; justify-content: end; width: 100%; height: 100%; margin-right: 25px;'><div class='small-profile-picture'><img src='https://cdn.nathcat.net/pfps/" + user.pfpPath + "'></div></div><div class='column' style='width: 100%; height: 100%; justify-content: center;'><h2><b>" + user.fullName + "</b></h2><p><i>" + user.username + "</i></p></div><h1>" + data[user["id"]] + "</h1>")
                });
            }
        }
        else {
            $("#leaderboard").html("<h1 style='width: 100%; text-align: center;'>No one has aggravated Nathan recently!</h1>");
        }
    });
</script>

</html>