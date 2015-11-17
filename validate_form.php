<?php


$form = new ProcessForm();
$form->field_rules = array(
	'field3'=>'required',
	'field4'=>'email|required',
	'field5'=>'number|min[0]|max[10000000]|required',
	'field6'=>'number|min[0]|max[1000000000]|required',
	'field7'=>'number|min[0]|max[100000000]|required',
	'field9'=>'required',
	'field10'=>'number|min[0]|max[100]|required',
	'field11'=>'number|min[1]|max[100]',
	'field12'=>'number|min[0]|max[100000000]|required',
     'field13'=>'number|min[0]|max[100000000]|required',
	'field14'=>'number|min[0]|max[10000000]|required',
	'field15'=>'number|min[0]|max[10000]|required',
	'field16'=>'number|min[0]|max[1000]|required',
	'field17'=>'number|min[0]|max[1000]|required',
	'field18'=>'number|min[1]|max[1000]|required',
	'field19'=>'number|min[0]|max[100]|required'
);
$form->validate();

class ProcessForm
{
    public $field_rules;
    public $error_messages;
    public $fields;
    private $error_list;
    private $is_xhr;


    function __construct()
    {
        $this->error_messages = array(
            'required' => 'This field is required',
            'email' => 'Please enter a valid email address',
            'number' => 'Please enter a numeric value',
            'url' => 'Please enter a valid URL',
            'pattern' => 'Please correct this value',
            'min' => 'Please enter a value larger than the minimum value',
            'max' => 'Please enter a value smaller than the maximum value'
        );
        $this->field_rules = array();
        $this->error_list = '';
        $this->fields = $_POST;
        $this->is_xhr = $this->xhr();
        // echo json_encode($this->field_rules);
    }



    function validate()
    {
        if (!empty($this->fields))
        {
            //Validate each of the fields
            foreach ($this->field_rules as $field => $rules)
            {
                $rules = explode('|', $rules);

                foreach ($rules as $rule)
                {
                    $result = null;

                    if (isset($this->fields[$field]))
                    {
                        $param = false;

                        if (preg_match("/(.*?)\[(.*?)\]/", $rule, $match))
                        {
                            $rule = $match[1];
                            $param = $match[2];
                        }

                        $this->fields[$field] = $this->clean($this->fields[$field]);

                        //if the field is a checkbox group create string
                        if (is_array($this->fields[$field]))
                            $this->fields[$field] = implode(', ', $this->fields[$field]);

                        // Call the function that corresponds to the rule
                        if (!empty($rule))
                            $result = $this->$rule($this->fields[$field], $param);

                        // Handle errors
                        if ($result === false)
                            $this->set_error($field, $rule);
                    }
                }
            }

            if (empty($this->error_list))
            {
                if ($this->is_xhr)
                    echo json_encode(array('status' => 'success'));

                $this->process();
            }
            else
            {
                if ($this->is_xhr)
                    echo json_encode(array('status' => 'invalid', 'errors' => $this->error_list));
                else echo $this->error_list;
            }
        }
    }




    function set_error($field, $rule)
    {
        if ($this->is_xhr)
        {
            $this->error_list[$field] = $this->error_messages[$rule];
        }
        else $this->error_list .= "<div class='error'>$field: " . $this->error_messages[$rule] . "</div>";
    }





    function xhr()
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
    }





    /** Validation Functions */
    function required($str, $val = false)
    {

        if (!is_array($str))
        {
            $str = trim($str);
            return ($str == '') ? false : true;
        }
        else
        {
            return (!empty($str));
        }
    }





    function email($str)
    {
        return (!preg_match("/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD", $str)) ? false : true;
    }





    function number($str)
    {
        return (!is_numeric($str)) ? false : true;
    }





    function min($str, $val)
    {
        return ($str >= $val) ? true : false;
    }





    function max($str, $val)
    {
        return ($str <= $val) ? true : false;
    }





    function pattern($str, $pattern)
    {
        return (!preg_match($pattern, $str)) ? false : true;
    }





    function clean($str)
    {
        $str = is_array($str) ? array_map(array("ProcessForm", 'clean'), $str) : str_replace('\\', '\\\\', strip_tags(trim(htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES))));
        return $str;
    }
}


?>
