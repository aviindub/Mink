<?php
/**
 * Created by PhpStorm.
 * User: Avi.Goldberg
 * Date: 12/27/13
 * Time: 11:28 AM
 */

namespace Behat\Mink;


use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Exception\ExpectationException;

/**
 * Mink web assertions tool extended to wait for elements to load.
 * Polls the dom with each assertion and only throws the exception
 * once the timeout has been reached.
 *
 * Note that this subclass only implements waiting on the assertions
 * for page content. Cookie, response code, session address, and similar
 * will not wait.
 *
 * @author Avi Goldberg <aviindub@gmail.com>
 */
class WaitingWebAssert extends WebAssert
{

    /**
     * @param callable $assertion
     * @param array $args
     * @param int $timeout
     *
     * @throws Exception
     * @throws ElementNotFoundException
     * @throws ExpectationException
     */
    public function waitingWrapper($assertion, $args, $timeout = 20)
    {
        $start = time();
        while (TRUE) {
            try {
                call_user_func_array(array($this, "parent::$assertion"), $args);
            }
            catch (Exception $e) {
                if (($e instanceof ElementNotFoundException || $e instanceof ExpectationException)
                  && ($timeout < (time() - $start))) {
                    sleep(1);
                    continue;
                }
                throw $e;
            }
            return;
        }
    }

    /**
     * Checks that current page contains text.
     *
     * @param string $text
     *
     * @throws ResponseTextException
     */
    public function pageTextContains($text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that current page does not contains text.
     *
     * @param string $text
     *
     * @throws ResponseTextException
     */
    public function pageTextNotContains($text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that current page text matches regex.
     *
     * @param string $regex
     *
     * @throws ResponseTextException
     */
    public function pageTextMatches($regex)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that current page text does not matches regex.
     *
     * @param string $regex
     *
     * @throws ResponseTextException
     */
    public function pageTextNotMatches($regex)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that page HTML (response content) contains text.
     *
     * @param string $text
     *
     * @throws ExpectationException
     */
    public function responseContains($text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that page HTML (response content) does not contains text.
     *
     * @param string $text
     *
     * @throws ExpectationException
     */
    public function responseNotContains($text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that page HTML (response content) matches regex.
     *
     * @param string $regex
     *
     * @throws ExpectationException
     */
    public function responseMatches($regex)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that page HTML (response content) does not matches regex.
     *
     * @param $regex
     *
     * @throws ExpectationException
     */
    public function responseNotMatches($regex)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that there is specified number of specific elements on the page.
     *
     * @param string  $selectorType element selector type (css, xpath)
     * @param string  $selector     element selector
     * @param integer $count        expected count
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function elementsCount($selectorType, $selector, $count, Element $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element exists on the current page.
     *
     * @param string  $selectorType element selector type (css, xpath)
     * @param string  $selector     element selector
     * @param Element $container    document to check against
     *
     * @return NodeElement
     *
     * @throws ElementNotFoundException
     */
    public function elementExists($selectorType, $selector, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element does not exists on the current page.
     *
     * @param string  $selectorType element selector type (css, xpath)
     * @param string  $selector     element selector
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function elementNotExists($selectorType, $selector, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element contains text.
     *
     * @param string $selectorType element selector type (css, xpath)
     * @param string $selector     element selector
     * @param string $text         expected text
     *
     * @throws ElementTextException
     */
    public function elementTextContains($selectorType, $selector, $text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element does not contains text.
     *
     * @param string $selectorType element selector type (css, xpath)
     * @param string $selector     element selector
     * @param string $text         expected text
     *
     * @throws ElementTextException
     */
    public function elementTextNotContains($selectorType, $selector, $text)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element contains HTML.
     *
     * @param string $selectorType element selector type (css, xpath)
     * @param string $selector     element selector
     * @param string $html         expected text
     *
     * @throws ElementHtmlException
     */
    public function elementContains($selectorType, $selector, $html)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific element does not contains HTML.
     *
     * @param string $selectorType element selector type (css, xpath)
     * @param string $selector     element selector
     * @param string $html         expected text
     *
     * @throws ElementHtmlException
     */
    public function elementNotContains($selectorType, $selector, $html)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific field exists on the current page.
     *
     * @param string $field field id|name|label|value
     * @param Element $container    document to check against
     *
     * @return NodeElement
     *
     * @throws ElementNotFoundException
     */
    public function fieldExists($field, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific field does not exists on the current page.
     *
     * @param string $field field id|name|label|value
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function fieldNotExists($field, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific field have provided value.
     *
     * @param string $field field id|name|label|value
     * @param string $value field value
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function fieldValueEquals($field, $value, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific field have provided value.
     *
     * @param string $field field id|name|label|value
     * @param string $value field value
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function fieldValueNotEquals($field, $value, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific checkbox is checked.
     *
     * @param string $field field id|name|label|value
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function checkboxChecked($field, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }

    /**
     * Checks that specific checkbox is unchecked.
     *
     * @param string $field field id|name|label|value
     * @param Element $container    document to check against
     *
     * @throws ExpectationException
     */
    public function checkboxNotChecked($field, /*Element*/ $container = null)
    {
        $this->waitingWrapper(__FUNCTION__, func_get_args());
    }
} 