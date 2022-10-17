<html>

    <?php
        session_start();
    ?>

    <!-- Headeri -->
    <head>
        <title>Support</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style/style.css" rel="stylesheet">
    </head>

    <!-- Body -->
    <body>
        <div class="mainBackground">
            <center>

                <!-- Otsikko -->

                <h1 class="mainTitle">SUPPORT</h1><br>

                <img src="images/skul_outline.png" alt="skull emoj" class="skull"><br><br>
                <img src="images/skul2.png" alt="skull scare" class="skull2"><br><br>

                <a href="index.php"><button class="buttonVar">BACK TO MAIN PAGE</button></a><br><br>

                <!-- FORM -->
                <button class="collapsible" style="border: 2px solid #ccd6dd; border-radius: 5px;">Expand Form</button>
                <div class="content"><br>
                    <form action="action.php" method="post" enctype="text/plain" name="asasddsa" class="formStyle">

                        <h2 style="font-family: Courier New;">What's the problem?</h2>
                        <textarea rows="20" cols="50" style="font-family: Courier New; width: 80%; height: 100px; resize: none;" id="info" name="info" maxlength="120" required></textarea><br><br>

                        <button inline="true" class="actionButton" style="background-color: rgb(255, 119, 119);">RESET</button>
                        <button type="submit" value="Send" inline="true" class="actionButton" style="background-color: lightgreen;">LÄHETÄ</button><br>
                        
                    </form>
                </div>


                <!-- Ala Otsikko -->

                <h2 style="font-family: Courier New;">Chat Wall:</h2>

                <form action="header.php" method="post" class="messageBox">
                    <input id="nameText" type="text" class="answerBox" name="fname" placeholder="Name here." maxlength="10" required><br><br>
                    <textarea id="messageText" rows="20" cols="50" style="font-family: Courier New; width: 80%; height: 100px; resize: none;" name="info" maxlength="80" required placeholder="Type your message here."></textarea><br>
                    <button type="submit" value="Submit" id="sendMessage" inline="true" class="actionButton" style="background-color: lightgreen;">SEND</button><br>
                </form>

                <?php

                // Laitetaan muuttujat, ja niille arvot.
                include 'config.php';
                $conn = new mysqli($servername, $username, $password, $dbname); // Yhteys databaseen

                // Katsotaanko toimiiko yhteys vai ei, jos toimii se jatkaa ohjelmaa, jos ei se antaa sivulle viestin.

                if ($conn->connect_error){
                    die("😭😭 Connection failed 😭😭" . $conn->connection_error);
                }

                // Yhteys toimii, joten jatkaa ohjelmaa. Asettaa SQL komennon ja syöttää sen.

                $sql = "SELECT username, message, aika FROM Chat ORDER BY -id ASC";
                $data = $conn->query($sql);
                $savingData = "['Element', '😭😭😭😭😭😭😭😭😭😭😭', { role: 'style' } ],"

                // Antaa sivulle kaikki tiedot muuttujan "data" sisältä ja syöttää ne sivulle.

                ?>
                <table id="dataList">
                    <style>

                    table, th, td {
                        border-radius: 5px;
                    }

                    table {
                        border: 1px solid #ccd6dd;
                        font-family: Courier New;
                        width: 75%;
                    }

                    th {
                        font-size: 24px;
                        background-color: rgb(255,255,255);
                    }

                    td, th {
                        border: 1px solid #edf7ff;
                        text-align: left;
                        padding: 5px;
                    }

                    tr:nth-child(even) {
                        border: 1px solid #edf7ff;
                        background-color: rgb(240, 240, 240);
                    }

                    </style>
                    <tr>
                        <th>User & Message</th>
                        <th>Date</th>
                    </tr>
                <?php
                    while($row = $data->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo ("<strong><font size='3'>" . $row["username"] . "</font></strong>: " . $row["message"])?></td>
                        <td><?php echo $row["aika"]?></td>
                    </tr>
                    <?php
                    }
                ?>
                </table>
                <?php

                // Sulkee yhteyden.
                $conn->close();

                ?><br>

            </center><br>

            <script>
                var coll = document.getElementsByClassName("collapsible");
                var buttonVar = document.getElementsByClassName("buttonVar")
                var i;
                
                for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.maxHeight){
                            content.style.maxHeight = null;
                        } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                        } 
                    });
                }
    
            </script>

        </div>
    </body>

</html>