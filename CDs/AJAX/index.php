<html>

    <head>

        <title>PHP MVC Frameworks - Search Engine</title>

        <script type="text/javascript" src="/auto_complete.js"></script>

    </head>

    <body>

        <h2>PHP MVC Frameworks - Search Engine</h2>

        <p><b>Type the first letter of the PHP MVC Framework</b></p>

        <form method="POST" action="index.php">

            <p><input type="text" size="40" id="txtHint"  onkeyup="showName(this.value)"></p>

        </form>

        <p>Matches: <span id="txtName"></span></p>

    </body>

</html>