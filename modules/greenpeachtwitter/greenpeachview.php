<?php
class greenpeachwTwitterFeed extends oxWidget
{
    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'widget/sidebar/twitterfeed.tpl';

    /**
     * Simple class to retrieve a list of the latest
     * feeds from a users twitter feed.
     *
     * @return array An array containing the Twitter feed information
     *
     */
    public function getTwitterFeed()
    {
        $oConfig = $this->getConfig();

        try {
            $twitter = new Twitter(
                'BLHO9ZOpMdebqBV9Bzs7bfQBq',
                '5rWZxP67eayI9mVVIL2CsgZkiehs6gQhkYOWTlWpKXdSaXGzKi',
                '	1169494682-MAqmGH2rQ3LmFh6xS4ME12roriOO0GbQvtPVWgF',
                'lneWv6YpYqc5lwMsciZBJsBcgBTuHj1b9VWvE1PJUoPnG'
            );
        } catch (TwitterException $e) {
            print $e->getMessage();
            return array();
        }

        try {
            if ($statuses = $twitter->load(Twitter::ME)) {
                return $statuses;
            }
        } catch (InvalidArgumentException $e) {
            print $e->getMessage();
            return array();
        } catch (TwitterException $e) {
            print $e->getMessage();
            return array();
        }
    }
}
