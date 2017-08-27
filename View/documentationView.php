<html>  
<head></head>  
<link rel="stylesheet" href="css/style.css"/>
<body>  
    <table width="100%" cellpadding="5">
       
        <tr><td colspan="2"><?php include_once("headerView.php");?></td></tr>
        <tr>
            
            <td width="20%"> 
                <table border="0">
               <?php 
                
                if(is_array($arrData['classList']))
                {
                    
                    foreach($arrData['classList'] as $dirName=>$arrFileNames)
                    {   
                        echo "<tr><th align='left'>$dirName</th></tr>";
                        if(is_array($arrFileNames))
                        {
                            foreach($arrFileNames as $key=>$value)
                            {
                                echo "<tr><td><a href='index.php?page=documentation&className=".$value."&path=".$dirName."'>$value</td></tr>";
                            }
                        }
                    }
                }
               ?>
                </table>
            </td>
            <td width="80%" valign="top">
                <table width="80%">
                <?php                 
                if(isset($arrData['classDetails']) && is_array($arrData['classDetails']))
                {
                    
                    foreach($arrData['classDetails'] as $methodName=>$strComments)
                    {   
                        echo "<tr><th align='left'>$methodName</th><td>".nl2br($strComments)."</td></tr>";                        
                    }
                }
                else 
                {
                    echo "Click on file name in left navigation to see the documenation for each file"; 
                }
               ?>
               </table>
            </td>
        </tr>
        <tr><th align="center" colspan="2">&copy; Copyright 2017  </th></tr>
            
    </table>
</body>  
</html>  
