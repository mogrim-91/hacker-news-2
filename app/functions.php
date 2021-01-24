<?php

declare(strict_types=1);

function authenticated(): bool
{
    return isset($_SESSION['loggedIn']['username']);
}
