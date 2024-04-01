<?php
function statisticalManagement()
{
    $title = 'Quản lý thống kê';
    $view = "statistical/indexView";
    $script = '../scripts/e-chart';
    $style = '../styles/e-chart';
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
