<?php

class Connect 
{
    
    private $con;
    
    function Connect($server,$username,$password,$dbname)
    {
        $this->con = mysqli_connect($server,$username,$password,$dbname);
    }
    
    function excutequery($query)
    {
        return mysqli_query($this->con,$query);
    }
    
    function getrowsnum($query)
    {
        $result = $this->excutequery($query);
        return mysqli_num_rows($result);
    }
    
    function closecon()
    {
        mysqli_close($this->con);
    }
    
}

?>