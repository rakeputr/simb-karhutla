<?php

class FlashSession
{
  private static string $key = 'flash_message';

  public static function get(): ?string
  {
    if (!self::isAny()) {
      return null;
    }

    $message = $_SESSION['flash_message'];

    self::reset();

    return $message;
  }

  public static function set(string $message): void
  {
    $_SESSION[self::$key] = $message;
  }

  public static function isAny(): bool
  {
    return isset($_SESSION[self::$key]);
  }

  public static function reset(): bool
  {
    if (self::isAny()) {
      unset($_SESSION[self::$key]);
      return true;
    }

    return false;
  }
}
