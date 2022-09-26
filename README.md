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
  
  <b>EEPROM</b>: Lyhenne sanoista "Electrically erasable programmable read-only memory" ja on muistimoduuli circuit moduulissa. Löytyy arduinosta.<br />
  
  <b>UART</b>: Universal asynchronous receiver/transmitter. Protokolla tarkoittaa sarjaliikenteen, joka tapahtuu kahdella linjalla tai digitaalisella nastalla, jotka ovat RX (nasta0) ja TX (nasta1). Arduino sisältää USB-sarjamuntimen, jonka avulla mikro-ohjain alijärjetelmä voi olla suoraan yhteydessä tietokoneeseen (esim. raspberry PI:hin)<br />
  
  <b>I2C</b>: Synkroninen moniohjain pakettikytkentäinen yksipäinen sajraviestintäväylä. <br />
  
  <b>SIP</b>: Session Initiation Protocol. Käytetään ääni-, ja video- ja viestintäsovelluksia sisältävien viestintätuntojen aloittamiseen, ylläpitoon ja lopettamiseen.<br />
  
  <b>Mitä eroa on I2C ja SIP:llä?</b>: SIP on monikäyttöisempi kuin I2C.<br />

  <details>
    <summary>
      Lista:
    </summary>
  
      apt-get update: Hakee päivityksen
      clear: Tyhjentää terminaalin
      date: Näyttää päivämäärän ja ajan
      find / -name esimerkki.txt: Etsii nimellä tietokoneesta tiedostoa.
      nano example.txt: Voi kontrolloida tiedostoa
      poweroff: Sammuttaa koneen
      raspi-confg: Aukaisee raspin configuration työkalun
      reboot: Uudelleen aukaisee koneen
      shutdown -h now: Sulkeutuu asettaman ajan päästä
      shutdown -h 01:22: Sulkeutuu 01:22
      startx: Aloittaa server X
      
      cat esimerkki.txt: Aukaista tai tehdä tiedosto
      cd/abc/xyz: Path directory
      ls -l: Listaa sovellukset
      mkdir esimerkki:_polku: Tekee directoryn
      mv XXX: ei ole komento
      rm esimerkki.txt: Poistaa tiedoston
      scp user@10.0.0.32:/some/path/tiedosto.txt: Kopioi tiedostoja kahden paikan välillä
      touch example.txt: Muuttaa timestamppiä
      
      ifconfig: Näyttää netin tiedot
      iwconfig: Langattoman netin tiedot
      iwlist wlan0 scan: Scannaa langattoman yhteyden
      iwlist wlan0 | grep ESSID: -
      nmap: Näytäää mitä serviceitä on auki
      ping: Näyttää yhteyden ja sen tarkkuuden nettiin
      wget https://www.website.com/example.txt: Hakee tietoa nettisivusta
      
      
      cat /proc/meminfo: Memoryn info
      cat /proc/partitions: Näyttää väliseinät
      cat /proc/version: Näyttää versiot
      df -h: Näyttää paljon tilaa on jäljellä
      df /: Näyttää tilaa tietyllä systeemillä
      dpkg - -get-selections | grep XXX:              ---- 
      dpkg - -get-selections                          ----
      free: Näyttää käytettävän memoryn
      hostname -l                                     ----
      lsusb: Näyttää tietoja USB laitteista
      UP key: Näyttää aikaisemmat syötetyt komennot terminaaliin
      vcgencmd measure_temp: Näyttää koneen lämpötilan
      vcgencmd get_mem arm && vcgencmd get_mem gpu: Arm Memoryn käyttö ja GPU memoryn käyttö
      
  </details>
  
  <details>
    <summary>
      Tehtävä:
    </summary>
  
      Raspberryn lämpötila: $ vcgencmd measure_temp
      Kuinka paljon vapaata tilaa on jäljellä: $ df -Bm
      Miten vaihdetaan polusta toiseen: $ cd ~
  
  </details>

  <h3>22.9.2022 Testi</h3>
  
  Tehtiin tunnukset "Ohjelmoinnin perusteet" tehtävä sivuun ja tehtiin niitä tehtäviä.
  
   <details>
    <summary>
      Tehtävä 1:
    </summary>
  
      #1. Tietokanta (10min)
        - A) Kun olet palvelimen sisällä, voit käyttää komentoa "$ SHOW DATABASES;" terminaalissa. (Näyttää kaikki tietokannat palvelimen sisältä)
        - B) Kun olet tietokannan sisällä, voit käyttää komentoa "$ DESC listanNimi;". (Näyttää kaikki tiedot taulukosta)
    </summary>
   </details>
   
   #2. String + muuttuja-harjoitus (30min)
     <details>
       <summary>
         Tehtävä 2:
       </summary>
         import time
         import datetime
         import mariadb
         import RPi.GPIO as GPIO



         inputPin = 4
         sleepTime = 5



         GPIO.setmode(GPIO.BCM)
         GPIO.setup(inputPin, GPIO.IN)



         conn = mariadb.connect(user="jaje", password="JarcoJerry1", host="localhost", database="SMarket")
         cur = conn.cursor()



         try:
             while True:

                 inputType = GPIO.input(inputPin)
                 curTime = datetime.datetime.now()

                 #sqlStr = "INSERT INTO Liike (arvo, aika) VALUES({boolean}, '{timeCurrently}')".format(boolean = inputType, timeCurrently = curTime)
                 #sqlStr = "INSERT INTO Liike (arvo, aika) VALUES(%s, '%s')" % (inputType, curTime)
                 sqlStr = f"INSERT INTO Liike (arvo, aika) VALUES({inputType}, '{curTime}')"

                 print(sqlStr)
                 cur.execute(sqlStr)
                 conn.commit()

                 time.sleep(sleepTime)

         except:
             print("Ei toimi")

         conn.close()
     </details>
      
  #3. DHTII -harjoitus (1,5h)
       - A) 

