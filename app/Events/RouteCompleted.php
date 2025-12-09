<?php
class RouteCompleted
{
    public function __construct(public User $user, public Route $route) {}
}
