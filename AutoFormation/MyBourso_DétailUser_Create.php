
<body>
    </br>
    <h1> Crée un utilisateur </h1>
    <a href="MyBourso_ListeUser.php"> acces a la liste des utilisateurs  </a>

        <form action="MyBourso_DétailUser_Insertion.php" method="post">

            

            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" >

            </p>

            <p>
                <label for="prenom">Prenom :</label>
                <input type="text" id="prenom" name="prenom" >

            </p>

            <p>
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" >

            </p>

            <p>
                <label for="motpasse">Mot de passe :</label>
                <input type="text" id="motpasse" name="motpasse" >

            </p>

            <p>
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" >

            </p>

            <p>
                <label for="id_client">N° Clients :</label>
                <input type="text" id="id_client" name="id_client">

            </p>

            <p>
                <label for="date_cloture">Date cloture :</label>
                
                
                <input type="text" id="date_cloture" name="date_cloture">

            </p>

            <p><input type="submit" value="Ajouter"></p>

        </form>

</body>

