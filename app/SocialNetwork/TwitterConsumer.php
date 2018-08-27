<?php

namespace App\SocialNetwork;

use App\SocialNetwork\Interfaces\SocialNetworkConsumerInterface;
use App\SocialNetwork\Interfaces\SocialNetworkProfileInterface;

class TwitterConsumer implements SocialNetworkConsumerInterface
{

    private $twitterProfile;

    public function __construct(SocialNetworkProfileInterface $snp)
    {
        $this->twitterProfile = $snp;
    }


    /**
     * @return mixed
     */
    public function getProfile($profile): SocialNetworkProfileInterface
    {

        $html = \Sunra\PhpSimple\HtmlDomParser::file_get_html("https://twitter.com/$profile", false, null, 0);

        if ($html) {
            $this->twitterProfile->profile = $profile;

            $this->twitterProfile->name = $this->getName($html);

            $this->twitterProfile->description = $this->getDescription($html);

            $this->twitterProfile->image_url = $this->getImage($html);
        }

        return $this->twitterProfile;
    }

    /**
     * @param $html
     * @return mixed
     */
    private function getName($html)
    {
        $name = $html->find('a[class=ProfileHeaderCard-nameLink]');

        return $name[0]->plaintext;
    }

    /**
     * @param $html
     * @return string
     */
    private function getDescription($html)
    {
        $description = $html->find('p[class=ProfileHeaderCard-bio]');

        return strip_tags($description[0]);
    }

    /**
     * @param $html
     * @return mixed
     */
    private function getImage($html)
    {
        $image = $html->find('img[class=ProfileAvatar-image]');

        return $image[0]->src;
    }
}
