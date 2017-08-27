<html>  
<head></head>  
<link rel="stylesheet" href="css/style.css"/>
<body>  
    <table width="100%" cellpadding="5">
       
        <tr><td colspan="2"><?php include_once("headerView.php");?></td></tr>
        <tr>
            <td width="1%" valign="top">
                
            </td>
            <td > 
               <?php
                    if(isset($arrFinalTeam['error']))
                    {
                        echo "<span class='error'>".$arrFinalTeam['error']."</span>";
                    }
                    else 
                    { ?>        
                        <table cellspacing="1" cellpadding="10" width="100%">  
                        <tbody>
                            <tr><th colspan="6" align="left">Roster Bot</th>
                            <tr><th colspan="3" align="left">Total Salary: <?php echo array_sum(array_keys($arrFinalTeam)); ?></th>
                            <th colspan="3" align="left">Total Players :<?php echo count($arrFinalTeam); ?></th></tr>
                            <tr><th>Pool ID</th><th align='left'>Player Name</th><th align='right'>Agility</th><th align='right'>Speed</th><th align='right'>Strength</th><th align='right'>Attribute Score</th></tr></tbody>  
                            <?php   
                                if(is_array($arrFinalTeam))
                                {
                                    foreach ($arrFinalTeam  as $key=>$arrPlayer)  
                                    {  
                                        echo "<tr><td>".$arrPlayer['poolId']."</td>";
                                        echo "<td>".$arrPlayer['name']."</td>";
                                        echo "<td align='right'>".$arrPlayer['agility']."</td>";
                                        echo "<td align='right'>".$arrPlayer['speed']."</td>";
                                        echo "<td align='right'>".$arrPlayer['strength']."</td>";
                                        echo "<td align='right'>".$arrPlayer['total_score']."</td></tr>";
                                    }              
                                }
                            ?>  
                        </tbody>    
                    </table>  
        <?php }?>
            </td>
        </tr>
        <tr><th align="center" colspan="2">&copy; Copyright 2017  </th></tr>
            
    </table>
</body>  
</html>  
