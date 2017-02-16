<!DOCTYPE html>
<html>
    <head>
        <title>
            Silverjack
        </title>
        <style type="text/css">
            @import "root.css";
        </style>
        <?PHP
            include 'Silverjack-Display.php'
        ?>
    </head>
    <body>
        <div id="silverjack_Board">
            <!--Silverjack Display Stuff Here-->

            <?PHP
                display();
            ?>

        </div>
        <div>
            <div id="Play_Again_Button">
               <!--Button should just refresh page-->         
            </div>
        </div>
    </body>
</html>