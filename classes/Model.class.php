<?php

abstract class Model
{
    public $scriptspresent;
    protected $templates = array(
        'top' => 'templates/html_begin.php',
        'head' => 'templates/head.php',
        'footer' => 'templates/footer.php',
        'bottom' => 'templates/html_end.php'
    );
    protected $page_error_list = array(
        'user_not_exist' => "The username does not exist.<br>Please register or try again.",
        'username_exist' => "That username is already in use.<br>Please choose another one.",
        'email_exist' => "That email address is already in use.<br>Please choose another one.",
        'pass_not_match' => "The username and password do not match.<br>Please try again.",
        'error' => "Something unexpected happened, give me a moment"
    );
    protected $page_error;
    protected $style;
    protected $script;
    protected $map;

    /**
     * Public functions for views and controllers to update from *this*
     */
    public function getLink($controller, $action, $params = null)
    {
        $link = 'index.php?c=' . $controller . '&a=' . $action;
        if (isset($params) || !empty($params))
            foreach ($params as $key => $param)
                $link .= '&' . $key . '=' . $param;
        return $link;
    }

    /**
     */

    public function exists($var)
    {
        return isset($var) && !empty($var);
    }

    public function addScript($script)
    {
        $this->scriptspresent = TRUE;
        $this->script[] = $script;
    }

    public function setMap($set = false)
    {
        $this->map = $set;
    }

    /**
     * Public functions for views to update from *this*
     */
    public function getstyle()
    {
        return $this->style;
    }

    /**
     * Public functions for controllers to update *this*
     */
    public function setstyle($style)
    {
        $this->style = $style;
    }

    public function getscript()
    {
        return $this->script;
    }

    /**
     */

    public function getTemplate($template)
    {
        return $this->templates[$template];

    }

    public function getTemplates()
    {
        return $this->templates;

    }
    public function getPageError()
    {
        return $this->page_error;
    }

    public function setPageError($errorcode='error'){
        if (array_key_exists($errorcode , $this->page_error_list))
            $this->page_error = $this->page_error_list[$errorcode];
    }

    public function showMap()
    {
        return $this->map;
    }

    /**
     * Private functions for models to dynamically set templates
     */
    protected function addTemplate($index, $template)
    {
        $this->templates[$index] = 'templates/' . $template;
    }
    /**
     */
}

?>