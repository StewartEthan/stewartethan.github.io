<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>Hours</title>

        <script type="text/javascript">
            function calcHours() {
                // Handle negative lunch time
                var lunch = document.getElementById('lunch').value;
                lunch = lunch == '' ? 0 : parseInt(lunch);
                if (lunch < 0) {
                    alert(
                        "There's no such thing as a negative lunch break!\n" +
                        "Enter zero or a positive number in the lunch input,\n" +
                        "or leave it empty for no lunch break."
                    );
                    return;
                }
                
                // Get the inputs
                var timeIn = document.getElementById('timeIn').value + "";
                var timeOut = document.getElementById('timeOut').value;

                // Parse into hour and minute sections
                var hourIn = parseInt(timeIn.substr(0, 2));
                var minIn = parseInt(timeIn.substr(3, 2));
                var hourOut = parseInt(timeOut.substr(0, 2));
                var minOut = parseInt(timeOut.substr(3, 2));
                
                // Handle out time < in time
                var invalidTime = (hourOut < hourIn) ||
                                  (minOut < minIn && hourOut === hourIn);
                if (invalidTime) {
                    alert(
                        "Time in cannot be later than time out.\n" + 
                        "Please adjust the value of time in or time out\n" +
                        "and try again."
                    );
                    return;
                }

                // Calculate the diffs
                var hourDiff = hourOut - hourIn;
                var minDiff = minOut - minIn;

                // Adjust for minDiff overlap
                if (minDiff < 0) {
                    hourDiff--;
                    minDiff = 60 + minDiff;
                }

                // Make the result a decimal number
                var hours = hourDiff + minDiff / 60;

                // Adjust for lunch
                lunch /= 60;
                hours -= lunch;

                // Display
                document.getElementById('hours').innerHTML = hours.toFixed(2) + " hours";
            }

            function updateResults() {
                var current = document.getElementById('hours').innerHTML;

                if (current != '') {
                    calcHours();
                }
            }
        </script>
    </head>

    <body>
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <nav id="nav-id" role="navigation">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/navigation.php'; ?>
            </nav>
            <main role="main">
                <div>
                    <h1>Hours Worked</h1>
                    <span id="explanation">
                        <span class="strong">Background</span><br>
                        As a web development intern paid by the hour, I have to calculate the 
                        hours I work each day and log them (we don't use a time clock). Lunch is 
                        taken on my own time (unpaid), and so I also have to account for that when 
                        I log my time for the day. After doing this with a calculator several 
                        times, I decided it would be easier to just input my in and out times and 
                        how long my lunch was, and have the answer calculated for me. And I figured, since I'm 
                        a developer, why not write it myself? So here is a simple app that will 
                        calculate the difference between the in and out times entered, and subtract lunch. 
                        If nothing is entered in the lunch input, 0 is assumed.
                        
                        <!--<span class="strong">Future Improvements</span><br>-->
                        <!--List of future improvements may go here-->
                    </span>
                    
                    <div class="input-group">
                        <label>Time in:</label><br>
                        <input type="time" id="timeIn" onchange="updateResults()"><br>
                    </div>

                    <div class="input-group">
                        <label>Time out:</label><br>
                        <input type="time" id="timeOut" onchange="updateResults()"><br>
                    </div>

                    <div class="input-group">
                        <label>Length of lunch:</label><br>
                        <input type="number" id="lunch" placeholder="(in minutes)" onchange="updateResults()"><br>
                    </div>

                    <button type="button" class="func-call" onclick="calcHours()">Calculate Hours</button>

                    <div id="hours"></div>
                </div>

<!--                <script type="text/javascript">
    document.getElementById('timeOut').value = new Date().getTime();
</script>-->
            </main>
            <footer role="contentinfo">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                <div>
                    <?php echo 'Last Update: ' . date(' j F, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>