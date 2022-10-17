
<html>
    <!-- Headeri -->
    <head>
        <title>Alarm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Siirä data taulukkoon -->
        
        <div class="mainBackground">
        <center>

            <!-- Otsikko -->

            <h1 class="mainTitle">ALARM</h1><br>

            <!-- Ala Otsikko -->

            <img src="images/skul_outline.png" alt="skull emoj" class="skull"><br><br>
            <img src="images/skul2.png" alt="skull scare" class="skull2"><br><br>

            <!-- FORM -->
            <button class="collapsible" style="border: 2px solid #ccd6dd; border-radius: 5px;">Open Form</button>
            <div class="content"><br>
                <form
                
                action="https://www.salpaus.fi"
                method="post"
                enctype="text/plain"
                name="asasddsa"
                class="formStyle">

                    <h2 style="font-family: Courier New;">Contact Info:</h2>

                    <label for="fname" class="answerText">NAME:</label>
                    <input type="text" class="answerBox" id="fname" name="fname"><br><br>

                    <label for="cdate" class="answerText">DATE:</label>
                    <input type="date" class="answerBox"  id="cdate" name="cdate"><br><br>

                    <label for="nikä" class="answerText">AGE:</label>
                    <input type="number" class="answerBox"  id="nikä" name="nikä"><br><br>

                    <label for="tarvitsee" class="answerText">CARD NUMBER & CVI:</label>
                    <input type="text" class="answerBox"  id="tarvitsee" name="tarvitsee" required><br><br>

                    <label for="info" class="answerText">FEEDBACK:</label>
                    <textarea rows="20" cols="50" style="font-family: Courier New; width: 80%; height: 100px; resize: none;" id="info" name="info" maxlength="120"></textarea><br><br>

                    <button inline="true" class="actionButton" style="background-color: rgb(255, 119, 119);">RESET</button>
                    <button type="submit" value="Send" inline="true" class="actionButton" style="background-color: lightgreen;">SEND</button><br>
                    
                </form>
            </div><br>

            <!-- PHP -->

            <button class="collapsible" style="
                border: 2px solid #ccd6dd;
                border-radius: 5px;
            ">Open List</button>
            <div class="content">

                <!-- Ala Otsikko -->

                <h2 style="font-family: Courier New;">Data:</h2>

                <?php

                $muuttuja = '["Element", "Density", { role: "style" } ],
                ["Copper", 8.94, "#b87333"],
                ["Silver", 10.49, "silver"],
                ["Gold", 19.30, "gold"],
                ["Platinum", 21.45, "color: #e5e4e2"]';

                // Laitetaan muuttujat, ja niille arvot.
                include 'config.php';
                $conn = new mysqli($servername, $username, $password, $dbname); // Yhteys databaseen

                // Katsotaanko toimiiko yhteys vai ei, jos toimii se jatkaa ohjelmaa, jos ei se antaa sivulle viestin.

                if ($conn->connect_error){
                    die("😭😭 Connection failed 😭😭" . $conn->connection_error);
                }

                // Yhteys toimii, joten jatkaa ohjelmaa. Asettaa SQL komennon ja syöttää sen.

                $sql = "SELECT id, arvo FROM Liike ORDER BY -id LIMIT 10";
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
                        font-family: arial, sans-serif;
                        width: 25%;
                    }
                    
                    td, th {
                        border: 1px solid #edf7ff;
                        text-align: left;
                        padding: 10px;
                    }

                    tr:nth-child(even) {
                        border: 1px solid #edf7ff;
                        background-color: #ccd6dd;
                    }

                    </style>
                    <tr>
                        <th>id</th>
                        <th>arvo</th>
                    </tr>
                <?php
                    while($row = $data->fetch_assoc()){
                        $savingData = $savingData . "['" . $row["id"] . "', " . $row["arvo"] . ", 'rgb(255,55,55)'],"
                    ?>
                    <tr>
                        <td><?php echo $row["id"]?></td>
                        <td><?php echo $row["arvo"]?></td>
                    </tr>
                    <?php
                    }
                ?>
                </table>
                <?php

                // Sulkee yhteyden.
                $conn->close();

                ?><br>
            </div><br>

            <button class="collapsible" style="border: 2px solid #ccd6dd; border-radius: 5px;">Open Chart</button>
            <div class="content"><br>
                <div>
                    <div id="piechart" class="chart"></div>
                </div>
            </div><br>

            <!-- Nappula -->

            <button id="downloadButton" class="buttonVar">FREE DOWNLOAD</button><br><br>
            <a href="support.php"><button class="buttonVar">SUPPORT PAGE</button></a><br>

            <!-- Linkki -->

            <video width="320" height="240" class="video" controls>
                <source src="videos/tutorial.mp4" type="video/mp4">
            </video><br>

            <p style="font-family: bold 10pt, Courier New;">Powered by S-Ketju</p>
            <a href="https://www.s-ryhma.fi">Linkki</a>

            <div id="mydiv"></div>
        </center><br>

        <script>
            var getIP = function(json) {
                document.getElementById("downloadButton").onclick = function () {
                    document.getElementById("downloadButton").innerHTML = json.ip;
                    setTimeout(function() {
                        document.getElementById("downloadButton").textContent = "FREE DOWNLOAD";
                    },250)
                }
            }
        </script>

        <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>

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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            window.onresize = drawChart;

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    <?php
                        echo $savingData;
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                                { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                2]);

                var options = {
                    title: "Activity",
                    width: "75%",
                    height: "20%",
                    bar: {groupWidth: "95%"},
                    legend: { position: "left" },
                    fontName: "Courier New",
                    titleFontSize: 24,
                };

                var chart = new google.visualization.ColumnChart(document.getElementById("piechart"));
                chart.draw(view, options);

            }
        </script>

        </div>
    </body>
</html>