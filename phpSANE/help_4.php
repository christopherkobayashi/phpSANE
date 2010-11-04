<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="author" content="root">
<meta name="robots" content="noindex">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>phpSANE: help</title>
</head>
<body>

<?PHP

// Russian Help
// ============

$SCANIMAGE = "/usr/bin/scanimage";
$cmd = $SCANIMAGE . " -h";
$sane_help = `$cmd`;
unset($cmd);

$start = strpos($sane_help, "\nOptions specific to device") + 1;
if ($start !== FALSE)
{
  $sane_help = substr($sane_help, $start);
}

$start = strpos($sane_help, "\nType ``scanimage --help");
if ($start !== FALSE)
{
  $sane_help = substr($sane_help, 0, $start);
}

echo <<<EOT

<h1>
phpSANE: Помощь
</h1>

<h3>
Область сканирования
</h3>

<p>
Установите требуемые размеры сканирования, выбрав формат страницы.
</p>

<p>
Отметьте требуемую область сканирования, кликнув мышью в окне предварительного просмотра, указав в начале левый верхний угол, затем правый нижний угол требуемой области сканирования.
</p>


<h3>
Параметры сканирования
</h3>

<p>
Здесь доступны только основные параметры установки качества сканирования (--mode и --resolution), а также формат файла, в котором будет сохранено сканируемое изображение.
</p>

<h4>
Дополнительно :-
</h4>

<p>
Полный список возможных настроек сканирования для Вашего сканера (из: scanimage -h):-
</p>

<p>
<pre>
{$sane_help}
</pre>
</p>


<p>
Любые дополнительные опции сканирования вы можете ввести в поле "Дополнительные параметры"
</p>

<p>
NB. Все неподдерживаемые символы заменены на 'X'.
</p>

<p>
К примеру, для контроля яркости сканирования :-
</p>

<p>
Данное значение поля не является общим для всех сканеров.
Оно может быть указано как в процентах, так и в определенном номерном диапазоне (например -4..3).
</p>

<p>
Пример:<br>
--brightness=50%<br>
--brightness 2<br>
</p>


<h3>
Кнопки действий
</h3>

<h4>
Просмотр :-
</h4>

<p>
Отображает в низком разрешении для просмотра всю страницу целиком, для того, чтобы можно было выбрать требуемую область для сканирования.
</p>


<h4>
Сканировать :-
</h4>

<p>
Сканирует выбранную область и сохраняет ее в файл (графический или текстовый, если выбрано распознавание текста ("OCR")).
</p>


<h4>
OCR :- (доступно, если установлена программа 'gocr' (поддерживается только английский язык)).
</h4>

<p>
Сканируется, распознается и сохраняется в ASCII текстовый файл.
</p>

<p>
Рекомендуется использовать Оттенки серого с разрешением 300dpi или выше.
</p>


<h4>
Сброс :-
</h4>

<p>
Только перечитывание страницы.
</p>


<h4>
Очистить :-
</h4>

<p>
Сбросить все параметры в значения по умолчанию и очистить область предварительного просмотра.
</p>


<h3>
Команда сканирования
</h3>

<p>
Внизу страницы отображается командная строка с параметрами сканирования. Это позволяет вручную проверить правильность формата команды в случае ошибок.
</p>

EOT;

?>

</body>
</html>
