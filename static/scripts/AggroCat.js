const API_HOSTNAME = "https://nathcat.net:5050";

function get_leaderboard(callback) {
    fetch(API_HOSTNAME + "/GetCurrent")
    .then((r) => r.json())
    .then(callback);
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