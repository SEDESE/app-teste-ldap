<?php

namespace App\Ldap;

use LdapRecord\Models\Model;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements LdapAuthenticatable, Authenticatable
{
    use AuthenticatesWithLdap;

    public static array $objectClasses = [
        'inetOrgPerson',
    ];

    public function getAuthIdentifierName(): string { return 'uid'; }
    public function getAuthIdentifier(): mixed { return $this->getFirstAttribute('uid'); }
    public function getAuthPasswordName(): string { return 'password'; }
    public function getAuthPassword(): string { return ''; }
    public function getRememberToken(): ?string { return null; }
    public function setRememberToken($value): void {}
    public function getRememberTokenName(): string { return ''; }
}