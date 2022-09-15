# Raspberry
<h2>12.9.2022</h2>
  <h3>Aloitetetaan IoT</h3>

  ![Suunnitelma](https://github.com/jarcoheiskanen/IoT/blob/main/Images/Testi.png)

  <h3>Ryhmätyö (Jerry, Jarco)</h3>
    Aloitettiin Raspberryn asennus, ladattiin Raspberryn asennus SD kortille, siirrettiin ja aukaistiin se toisella läppärillä. Tehtiin tunnukset raspberryyn ja ladatiin päivitykset. Päivityksen jälkeen rebootattiin kone, ja asennus oli valmis. Asennuksen jälkeen aloitettiin tekemään toista asennusta command promptissa, ja tehtiin seuraavasti.
    *1. Päivitettiin packages.
    #####2. Ladattiin apache2.
    #####3. Ladattiin php.
    #####4. Ladattiin mariadb.
    #####5. Ladattiin php-mysql connector.
    #####6. Restartattiin apache2.
    #####8. Testatiin serveriä.

  <h3>15.9.2022</h3>
  Annettiin tiedoston /var/www/html muokkaukseen lupa, ja vaihdettiin Index.html > Index.php tiedostoksi.
  Aloitettiin tekemään tietokantaa. Tehtiin tietokantapalvelimeen omat tietokannat (Jarco_SMarket ja Jerry_SMarket), ja molempiin omat taulukot (Jarco_Liike ja Jerry_Liike).
  #####1. Syötä terminaaliin "sudo mariadb".
  #####2. Syötä, CREATE DATABASE tietokannan nimi.
  #####3. Käytä tietokantaa syöttämällä "use tietokannan nimi"
  #####4. Tee taulukko tietokantaan, "CREATE TABLE taulukon nimi (id int AUTO_INCREMENT NOT NULL PRIMARY KEY, arvo boolean, aika datetime);
  #####5. PRAMA TABLE_INFO(taulukon nimi)
  #####6. INSERT INTO taulukon nimi (arvo, aika) VALUES (true, now()) on esimerkki miten taulukkoon voi lisätä asioita.
  #####7. SELECT * FROM taulukon nimi. Näyttää taulukon sisällön.
