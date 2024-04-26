<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametres</title>
    <link rel="stylesheet" href="css/settingspage.css">
</head>

<?php include "src/View/header_logged.php" ?>

<body>

  <div class="AccountSettings">
    <div class="Settings">
      <div class="Background">       
        <div class="TitleContainer">
        <form action='index.php' method="POST">
            <input type="hidden" name="action" value="homepage">
            <input type="image" src="images/arrow.svg" alt="GoBackArrowIcon"></img> 
        </form>         
        <h1 class="Parametres">Paramètres</h1>
        </div>
             
        <div class="SettingsContainer">
          <div class="PersonalData">    
            <div class="Background2">
              <img class="Photo" src="images/profileuser.svg">
              <div class="NomPrenom">Nom<br/>Prénom</div>
              <div class="Tel">
                <h2 class="telephone">Téléphone :</h2>
                <p class="nb">+33 X XX XX XX XX</p>
              </div>
              <div class="Mail">
                <h2 class="email">Mail :</h2>
                <p class="unistramail">xxxxxx@unistra.fr</p>
              </div>
              <div class="CalendarNumber">
                <h2 class="numcal">Numéro Calendrier :</h2>
                <p class="cal">0123456789</p>
              </div>      
            </div>
          </div>
          
          <div class="ButtonsContainer">
            <button class="ModifierInformationsPersonnelles" onclick="handleButtonClick()">Modifier mes informations personnelles</button>
            <button class="HistoriqueAnnuel" onclick="handleButtonClick()">Historique annuel</button>
            <button class="SuppressionCompte" onclick="handleButtonClick()">Supprimer mon compte</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
