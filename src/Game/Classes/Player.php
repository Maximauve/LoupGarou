<?php

use Roles\Role;

class Player extends Role
{
    private string $name;

    private Role $role;

    private bool $alive = true;

    public function __construct(string $name, Role $role)
    {
        $this->name = $name;
        $this->role = $role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getAlive(): bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): void
    {
        $this->alive = $alive;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }
}