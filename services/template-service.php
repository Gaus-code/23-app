<?php
/**
 * @throws Exception
 */
function renderTemplate(string $path, array $variables = []): string
{
	if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $path))
	{
		return 'Invalid template path';
	}
	$absolutePath = ROOT . "/views/$path.php";

	if (!file_exists($absolutePath))
	{
		return 'Invalid template path';
	}

	extract($variables);

	ob_start();

	require $absolutePath;

	return ob_get_clean();
}

function truncate(string $text, ?int $maxLength = null): string
{
	if ($maxLength === null)
	{
		return  $text;
	}

	$cropped = substr($text, 0, $maxLength);
	if ($cropped !== $text)
	{
		return "$cropped...";
	}

	return $text;
}

function convertTime($messageTime): string
{
	if ($messageTime === null)
	{
		return $messageTime;
	}

	return date('H:i', strtotime($messageTime));
}