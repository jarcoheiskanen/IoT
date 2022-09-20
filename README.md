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
  
      apt-get update
      clear
      date
      find / -name esimerkki.txt
      nano example.txat
      poweroff
      raspi-confg
      reboot
      shutdown -h now
      shutdown -h 01:22:
      startx
      
      cat esimerkki.txt
      cd/abc/xyz
      ls -l
      mkdir esimerkki:_polku
      mv XXX
      rm esimerkki.txt
      scp user@10.0.0.32:/some/path/tiedosto.txt
      touch example.txt
      
      ifconfig
      iwconfig
      iwlist wlan0 scan
      iwlist wlan0 | grep ESSID
      nmap
      ping
      wget https://www.website.com/example.txt
      
      
      cat /proc/meminfo
      cat /proc/partitions
      cat /proc/version
      df -h
      df /
      dpkg - -get-selections | grep XXX
      dpkg - -get-selections
      free
      hostname -l
      lsusb
      UP key
      vcgencmd measure_temp
      vcgencmd get_mem arm && vcgencmd get_mem gpu
      
  </details>
  
  <details>
    <summary>
      Tehtävä:
    </summary>
  
      Raspberryn lämpötila: $ vcgencmd measure_temp
      Kuinka paljon vapaata tilaa on jäljellä: $ df -Bm
      Miten vaihdetaan polusta toiseen: $ cd ~
  
  </details>
