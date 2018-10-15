<?php

# Form View Wrapper + Validation
# Usage:
#   $flash = new form();
#
#   $errors is reserved variable
#
#   //Draw a bootstrap input
#  $form->input('CLASS.NAME', $params = []);


$errors = [];

class form {

    function input($field, $params = []) {
        global $errors;

        //$field should always have '.'
        $name = explode('.', $field);
        $label = ucwords(str_replace(['.', '_'], ' ', $name[1]));
        $input = 'input';

        $params += [
            'class' => 'form-control',
            'label' => $label,
            'type' => 'text',
            'value' => isset($_POST[$name[0]][$name[1]]) ? $_POST[$name[0]][$name[1]] : '',
            'options' => []
        ];

        // start writing html
        if ($params['type'] == 'radio'):
            $html = "";
            foreach ($params['options'] as $key => $value):
                $html .= "<label class='radio-inline' ><input required type='radio' name='{$name[0]}[{$name[1]}]' ";

                if ($params['value'] == $key):
                    $html .= "checked";
                endif;

                $html .= " value=" . $key . " />"
                        . $value . " </label>";
            endforeach;
        else:
            if ($params['options']):
                $input = 'select';
            endif;

            $html = "<label class='control-label' for='{$name[1]}'>{$params['label']}:</label>
            <$input name='{$name[0]}[{$name[1]}]' id='{$name[1]}' ";
            unset($params['label']);

            foreach ($params as $k => $v):
                if (is_array($v)):
                    continue;
                endif;
                if (is_numeric($k)):
                    $html .= $v . "='" . $v . "' ";
                else:
                    $html .= $k . "='" . $v . "' ";
                endif;
            endforeach;

            if ($params['options']):
                $html .= " ><option value=''>Please Choose</option>";

                foreach ($params['options'] as $option):
                    $html .= "<option ";
                    if ($params['value'] == current($option)):
                        $html .= "selected";
                    endif;

                    $html .= " value=" . current($option) . ">"
                            . next($option) . "</option>";
                endforeach;

                $html .= "</select>";
            else:
                $html .= " />";
            endif;
        endif;

        // show error message (beta)
        $has = '';
        if (isset($errors[$name[0]][$name[1]])):
            $html .= '<span class="help-block">' . $errors[$name[0]][$name[1]] . '</span>';
            $has = 'has-error';
        endif;

        // enclose in a form-group
        $html = "<div class='form-group $has'>" . $html . "</div>";

        return $html;
    }

}

$form = new form();
