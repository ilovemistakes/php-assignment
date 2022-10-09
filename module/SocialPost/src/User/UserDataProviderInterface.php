<?php

namespace SocialPost\User;

/**
 * This interface describes a provider for the
 * user credentials to use in API calls. It keeps
 * the entire SocialPost module independent from
 * the main application. In SocialPost module
 * we don't care about AuthService, User model,
 * etc. We just need somebody to give us user name
 * and email.
 */
interface UserDataProviderInterface
{
    public function getUserName(): string;
    public function getUserEmail(): string;
}
