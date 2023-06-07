<?php

	// your functions may be here
function openLog() : array
//не знаю как заставить читать выбранный файл вместо постоянного
{
    $f=fopen('logs/logs 2023-07-06.txt', 'r');
    $str = fread($f, filesize('logs/logs 2023-07-06.txt'));
    $lines=(explode("\n", $str));

    unset ($lines[count($lines)-1]);
    $logs = [];
    foreach ($lines as $line)
    {
        $logs[] = appStrToArr($line);
    }
    return $logs;
}

function appStrToArr(string $str): array
{
//   $str=rtrim($str);
    $parts=explode(';', $str);
    return ['dt'=>$parts[0],'ip'=>$parts[1],'url'=>$parts[2],'method'=>$parts[3]];
}

function checkFileExtension(string $name) : bool
{
    return preg_match('/.*\.txt$/', $name);
}
function editArticles(string $title, string $content) : bool
{
    $articles = getArticles();
    $id=(int)($_GET['id'] ?? '');
    $articles[$id] = [
        'id' => $id,
        'title' => $title,
        'content' => $content
    ];
    saveArticles($articles);
    return true;

}
function addLog () : bool
{
    $currDay=date('Y-d-m', strtotime('now'));
    if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST');
    {
    for ($date=$currDay; $date==$currDay;$date++)
    {
        $ip=$_SERVER['REMOTE_ADDR'];
        $uri=$_SERVER['REQUEST_URI'];
        $method=$_SERVER['REQUEST_METHOD'];
        $ref=0;
        $dt=date("Y-d-m H:i:s");
        $log="$dt;$ip;$uri;$method\n";
        $f=fopen('logs/logs '.$currDay.'.txt', 'a');
        fwrite($f, $log);
        fclose($f);
    }
    return true;
    }
}

	/* start --- black box */
	function getArticles() : array
    {
		return json_decode(file_get_contents('db/articles.json'), true);
	}

	function addArticle(string $title, string $content) : bool
    {
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

	function removeArticle(int $id) : bool
    {
		$articles = getArticles();

		if(isset($articles[$id]))
		{
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function saveArticles(array $articles) : bool
    {
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}
	/* end --- black box */