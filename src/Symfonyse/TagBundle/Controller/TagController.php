<?php

namespace Symfonyse\TagBundle\Controller;

use Symfonyse\TagBundle\Entity\Tag;
use Symfonyse\CoreBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * Class TagController
 *
 * @author Tobias Nyholm
 *
 */
class TagController extends BaseController
{
    /**
     *
     * @Template
     *
     * @return array
     */
    public function entryAction($permalink)
    {
        if (null === $file = $this->get('symfonyse.tag.content_provider')->getFile($permalink)) {
            throw $this->createNotFoundException();
        }

        $tag=new Tag($file);

        return array(
            'tag'=>$tag,
        );
    }
} 