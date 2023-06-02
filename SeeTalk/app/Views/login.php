<div class="container-grid">
    <form action="login" method="post" id="connexion">
        <h2 class="title">Connexion</h2>
        <div class="col-form">
            <div class="col">
                <div class="label-input">
                    <label for="pseudo">Pseudo:</label>
                    <input type="text" name="pseudo">
                </div>
                <div class="label-input">
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" name="mdp" id="pwd">
                </div>
                <div id="showPassword">
                    <label for="showPassword">Show Password</label>
                    <input type="checkbox" onclick="showPassword()">
                </div>
            </div>
        </div>
        <input class="submit-button" type="submit" value="valider">
    </form>
</div>

<script>
    function showPassword() {
        const x = document.getElementById("pwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>