<?php

namespace App\Auth;

/**
 * This interface represents an application-wide
 * authentication guard meant to be used across
 * the application (e.g. in the profile controller).
 */
interface AuthServiceInterface {
    /**
     * Returns currentry authenticated user.
     */
    public function getUser(): User;
}
