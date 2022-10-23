<?php

/**
 * Hilfsfunktion um einfacher Redirecten zu können
 *
 * @param string $page Seite, zu der weitergeleitet werden soll
 * @return void
 */
function redirect(string $page)
{
    header('location: ' . URLROOT . '/' . $page, 302);
}
