<?php
//фэйл
include_once ('models/functions.php');
$files=scandir('logs');
$logs= array_filter($files, function ($f)
{
    return is_file("logs/$f") && checkFileExtension($f);
});

?>
    <div class="logs">
        <?  foreach ($logs as $id=>$log): ?>
            <a href="logs.php?id=<?=$id?>"><?=$log?></a>
        <?endforeach;?>
    </div>
<?php

/*
$logs = openLogs();
?>

<table>
    <tr>
        <td>Date</td>
        <td>IP</td>
        <td>URL</td>
        <td>Method</td>
    </tr>
    <? foreach ($logs as $log): ?>
        <tr>
            <td><?= $log['dt'] ?></td>
            <td><?= $log['ip'] ?></td>
            <td><?= $log['url'] ?></td>
            <td><?= $log['method'] ?></td>
        </tr>
    <? endforeach; ?>
</table>
*/
