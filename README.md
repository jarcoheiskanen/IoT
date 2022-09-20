# Raspberry
<h2>12.9.2022</h2>
  <h3>Aloitetetaan IoT</h3>

  ![Suunnitelma](https://github.com/jarcoheiskanen/IoT/blob/main/Images/Testi.png)

  <h3>Ryhmätyö (Jerry, Jarco)</h3>
    Aloitettiin Raspberryn asennus, ladattiin Raspberryn asennus SD kortille, siirrettiin ja aukaistiin se toisella läppärillä. Tehtiin tunnukset raspberryyn ja ladatiin päivitykset. Päivityksen jälkeen rebootattiin kone, ja asennus oli valmis. Asennuksen jälkeen aloitettiin tekemään toista asennusta command promptissa, ja tehtiin seuraavasti.
    
    1. Päivitettiin packages.
    2. Ladattiin apache2.
    3. Ladattiin php.
    4. Ladattiin mariadb.
    5. Ladattiin php-mysql connector.
    6. Restartattiin apache2.
    8. Testatiin serveriä.

  <h3>15.9.2022</h3>
  Annettiin tiedoston /var/www/html muokkaukseen lupa, ja vaihdettiin Index.html > Index.php tiedostoksi.
  Aloitettiin tekemään tietokantaa. Tehtiin tietokantapalvelimeen omat tietokannat (Jarco_SMarket ja Jerry_SMarket), ja molempiin omat taulukot (Jarco_Liike ja Jerry_Liike).
    
    1. Syötä terminaaliin "sudo mariadb".
    2. Syötä, CREATE DATABASE tietokannan nimi.
    3. Käytä tietokantaa syöttämällä "use tietokannan nimi"
    4. Tee taulukko tietokantaan, "CREATE TABLE taulukon nimi (id int AUTO_INCREMENT NOT NULL PRIMARY KEY, arvo boolean, aika datetime);
    5. PRAMA TABLE_INFO(taulukon nimi)
    6. INSERT INTO taulukon nimi (arvo, aika) VALUES (true, now()) on esimerkki miten taulukkoon voi lisätä asioita.
    7. SELECT * FROM taulukon nimi. Näyttää taulukon sisällön.

  <h3>19.9.2022</h3>
  Tehtiin liikesensori pelkällä Raspberryllä.
  <details>
    <summary>
      Koodi:
    </summary>
  
      ## -- Lisää libraryt koodiin
      import time
      import RPi.GPIO as GPIO
      
      ## -- Lisää variablet, ja aloittaa setupin GPIO:on
      pin = 4
      GPIO.setmode(GPIO.BCM)
      GPIO.setup(pin, GPIO.IN)
      
      ## -- Function, joka hakee ajan.
      def getTime():
        result = time.localtime()
        time_string = time.strftime("%m/%d&%y/, %H:%M:%S:", result)
        return time_string
        
      ## -- Kokeilee jos koodissa on virheitä, jos ei se aloittaa loopin joka ei lopu koskaan.
      try:
        while True:
          timeResult = getTime()
          if GPIO.input(pin):
            print("Liikettä: "+ str(timeResult))
          else:
            print("Ei liikettä: "+ str(timeResult))
          time.sleep(2.5)
      except:
        print("-")
        GPIO.cleanup()
  </details>
  
    <h3>20.9.2022</h3>
    <b>EEPROM</b>: Lyhenne sanoista "Electrically erasable programmable read-only memory" ja on eräänlainen tietokoneissa käytettävä haihtumaton muisti.
    <b>UART</b>: Universal asynchronous receiver/transmitter. Tietokonelaite asynkroniseen sarjantaviestintään, jossa datamuoto ja lähetysnopeudet ovat konfiguroitavisssa.__
    <b>I2C</b>: Synkroninen moniohjain pakettikytkentäinen yksipäinen sajraviestintäväylä, jonka Philips Semiconductors keksi vuonna 1982.
    <b>SIP</b>: Session Initiation Protocol. Käytetään ääni-, ja video- ja viestintäsovelluksia sisältävien viestintätuntojen aloittamiseen, ylläpitoon ja lopettamiseen.
    <b>Mitä eroa on I2C ja SIP:llä?</b>: SIP on monikäyttöisempi kuin I2C.
