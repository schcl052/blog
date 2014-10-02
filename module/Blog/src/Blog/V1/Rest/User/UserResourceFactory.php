<?php
namespace Blog\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Blog/V1/Rest/User/UserMapper');
        return new UserResource($mapper);
    }
}
