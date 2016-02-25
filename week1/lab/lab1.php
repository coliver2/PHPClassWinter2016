<!doctype html>
<body>
    <ul>

        <?php    //table begin ?>
    <table border="1">
        <?php for($tr = 1; $tr <= 10; $tr++): //loop for rows and columns?>
            <tr>
            <?php for($td = 1; $td <= 10; $td++):?>
                <td ><?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); //generate random color?>
                <td style = background-color:<?php echo $randColor?>> <span style="color: #ffffff;"><?php echo $randColor . "\n";?></span><br/><?php echo $randColor; ?> </td>
            <?php endfor; ?>                
            </tr>
        <?php endfor; ?>
        </table>
     
             
            



</body>
</html>