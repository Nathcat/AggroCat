function get_leaderboard(callback) {
    fetch("https://data.nathcat.net/data/get-leaderboard-state.php", {
        method: "POST",
        body: JSON.stringify({
            "leaderboardId": "5",
            "orderBy": "DESC"
        })
    }).then((r) => r.json()).then((r) => { callback(r.results); });
}

function get_user(id, callback) {
    fetch("https://data.nathcat.net/sso/user-search.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "id": id
        })
    })
    .then((r) => r.json())
    .then((r) => {
        if (r.status === "success") {
            callback(r.results[id]);
        }
        else {
            console.error("AuthCat returned nothing for user with id " + id);
        }
    })
}