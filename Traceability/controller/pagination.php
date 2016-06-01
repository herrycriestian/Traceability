<?php 

function showPagination($tableName, $limit = 20)
{
    $countTotalRow = mysql_query('SELECT COUNT(*) AS total FROM `'.$tableName.'`');
    $queryResult = mysql_fetch_assoc($countTotalRow);
    $totalRow = $queryResult['total'];
 
    $totalPage = ceil($totalRow / $limit);
 
    $page = 1;
    while ($page <= $totalPage) 
    {
        echo '<a href="?page='.$page.'&perPage='.$limit.'">'.$page.'</a>';
        if ($page < $totalPage)
            echo " | ";
 
        $page++;
    }
}
?>