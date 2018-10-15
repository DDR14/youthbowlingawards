<?php

# Flash Wrapper
# Usage:
#   $flash = new flash();
#
#   //ERROR
#  $flash->error

class flash {

    private $template = '<div class="alert alert-dismissible alert-MESSAGE_CLASS">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<h4 class="alert-heading">MESSAGE_TITLE</h4>
<p class="mb-0">MESSAGE_TEXT</p>
</div>';
    private $render = '';

    function error($message) {
        $this->make_block('Error', 'danger', $message);
    }

    function info($message) {
        $this->make_block('Information', 'info', $message);
    }

    function success($message) {
        $this->make_block('Success', 'success', $message);
    }
    
    function warning($message) {
        $this->make_block('Warning', 'warning', $message);
    }

    function make_block($title, $class, $message) {
        $this->render = str_replace([
            'MESSAGE_TITLE',
            'MESSAGE_CLASS',
            'MESSAGE_TEXT'
                ], [
            $title,
            $class,
            $message
                ], $this->template);
    }

    function render() {
        echo $this->render;
        $this->render = '';
    }

}

$flash = new flash();
