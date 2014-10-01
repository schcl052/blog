<?php
namespace Blog\V1\Rest\Post;

/**Post Resource Factory
 * @package Blog\V1\Rest\Post
 */
class PostResourceFactory
{
    /**
     * invoke the Post Resource Factory
     * @param  $services
     * @return \Blog\V1\Rest\Post\PostResource
     */
    public function __invoke($services)
    {
        $mapper = $services->get('Blog\V1\Rest\Post\PostMapper');
        return new PostResource($mapper);
    }
}
