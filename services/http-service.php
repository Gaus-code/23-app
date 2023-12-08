<?php
function redirect(string $url)
{
	header("Location: $url");
}