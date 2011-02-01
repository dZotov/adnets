<?php

define("FORM_TEXT", 01);
define("FORM_PASSWORD", 03);
define("FORM_SELECT", 04);
define("FORM_CHECKBOX", 05);
define("FORM_RADIO", 06);
define("FORM_FILE", 10);
define("FORM_MEMO", 11);
define("FORM_MEMO_COUNTER", 12);
define("FORM_PHONE", 30);
define("FORM_DATE", 31);
define("FORM_CB_ARRAY", 32);
define("FORM_RAD_ARRAY", 33);
define("FORM_COUNTRY", 34);
define("FORM_MULTIPLE", 34);


$GLOBALS['FORM_NONVALIDABLES'] = array(
    FORM_RADIO,
    FORM_CHECKBOX,
    FORM_FILE,
);

$GLOBALS['FORM_NONSAVEABLES'] = array(
    FORM_FILE,
);

define("AUTO", 0);

class Form {

    public $HTML = array();
    public $message = array();
    public $fails = 0;
    public $wrong = 0;
    public $srcentity;
    public $tgtentity;
    public $tplentity;
    public $name;
    public $valuesforentity = array();
    public $valuesfortemplate = array();
    public $fields = array();
    public $frompersist = false;
    public $thissection = array();
    public $groupHTML = "";
    public $grouptitle = "";
    public $groupname = "";
    public $groupvalid = 2;
    public $groupfirst = 0;
    public $groupvalidation = '';

    function __construct($name = NULL, $tgtentity = NULL, $tplentity = NULL) {
        $this->name = $name;
        $this->tgtentity = $tgtentity;
        $this->tplentity = $tplentity;
        if (is_object($tgtentity)) {
            $this->srcentity = ($tgtentity->GetId()) ? $tgtentity : $tplentity;
        } else {
            $this->srcentity = $tplentity;
        }
    }

    function FromPersist() {
        $this->frompersist = true;
    }

    function GetDefaultValue($name, $type, $options) {
        if ($name === NULL) {
            return NULL;
        };
        if ($this->frompersist)
            $name = $this->name . '.' . $name;

        if (($this->srcentity) && ($this->srcentity->Get("$name") !== NULL))
            $default = $this->srcentity->Get("$name");
        else
            $default = get($options, '_def');

        //~ if ($type==FORM_RADIO) {
        //~ $value1=substr(strrchr($name, "_"),1);
        //~ $name=substr($name,0,strlen($name)-strlen($value1)-1);
        //~ }

        if ($type == FORM_CB_ARRAY) {
            $value = get_param_cbarray($name, get($options, '_list', array()), $default);
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $value[$k] = "[{$v}]";
                }
                $value = implode(",", $value);
            }
            return $value;
        }
        if ($type == FORM_DATE)
            return get_param_date($name, $default);
        if ($type == FORM_CHECKBOX) {
            $value = get_param_checkbox($name, $default);
            if ($value == 'on')
                $value = 1;
            return $value;
        }
        if ($type == FORM_MULTIPLE) {
            $value = get_param($name, $default);
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $value[$k] = "[{$v}]";
                }
                $value = implode(",", $value);
            }
            return $value;
        }
        return get_param($name, $default);
    }

    function DefaultValue($name, $type, $options, $asdefault=False) {
        $s = $this->GetDefaultValue($name, $type, $options);
        $e = $s;
        if ($type == FORM_CHECKBOX) {
            $e == ($s) ? 1 : 0;
        }
        if ($type == FORM_MULTIPLE) {
            $name == str_replace("[]", "", $name);
        }
        if (($name != '') && (!in_array($type, $GLOBALS['FORM_NONSAVEABLES']))) {
            if (!get($options, '_nosave')) {
                $s = $this->valuesforentity[$name] = $e;
                if ($asdefault)
                    $this->valuesfortemplate[$name] = $e;
            }
        }

        return $s;
    }

    public function Select($name = NULL, $value = NULL, $options = array()) {
        $res = "";

        $options['name'] = $name;

        if (isset($options['onblur']) && !isset($options['onchange']))
            $options['onchange'] = $options['onblur'];

        $res = "<select " . attribs2string($options) . " id=\"_form_" . $name . "\">";

        if (!isset($options['_list']))
            throw new exception("Не определён ключ _list для поля $name");

        foreach ($options['_list'] as $ival => $ititle) {
            $c = ("$value" == "$ival") ? " selected = \"selected\"" : "";
            $res .= "<option value=\"$ival\"$c>  $ititle &nbsp;</option>";
        }

        $res .= "</select>";

        return $res;
    }

    function Input($type, $name = NULL, $value = NULL, $options = array()) {
        if (!is_null($name))
            $options['name'] = $name;
        if (!is_null($value))
            $options['value'] = htmlQuote($value);
        $options['type'] = $type;

        if ($type == 'checkbox' || $type == 'radio') {
            $class = get($options, 'class', 'border_none');
        } else {
            $class = get($options, 'class', 'form');
        }

        return '<input class="' . $class . '"' . attribs2string($options) . " />";
    }

    function ControlHTML($type, $name, $value = NULL, $options=array()) {
        if (get($options, '_static'))
            $options['disabled'] = 'disabled';

        switch ($type) {
            case FORM_MULTIPLE:
                $options['multiple'] = 'multiple';

                if (!isset($options['size'])) {
                    $options['size'] = 5;
                }
                $value = explode(",", $value);
                foreach ($value as $k => $v) {
                    $value[$k] = str_replace(array("[", "]"), array("", ""), $v);
                }
                $control_html = '<select name="' . $name . '[]" ' . attribs2string($options) . ' id="_form_' . $name . '" multiple>';
                foreach ($options['_list'] as $k => $v) {
                    $c = (in_array($k, $value)) ? " selected = \"selected\"" : "";
                    $control_html .= "<option value=\"$k\"$c> $v &nbsp;</option>";
                }
                $control_html .= '</select>';
                break;

            case FORM_TEXT:
                if (!isset($options['size']))
                    $options['size'] = 50;
                $labels = get($options, '_toplabels');
                $toplabels = get($options, '_toplabels', array());
                $bottomlabel = get($options, '_bottomlabels');
                $pre_label = get($options, '_prelabels');
                $post_label = get($options, '_postlabels');
                $control_html = '';
                $control_html = '<table border="0" align="left" cellpadding="0">';

                $disabled = get($options, 'disabled');
                if ($disabled)
                    $options['style'] = 'background-color:#E8E8E8';

                $control_html = $this->Input("text", $name, $value, $options);

                break;

            case FORM_PASSWORD:
                if (!isset($options['size']))
                    $options['size'] = 50;
                $control_html = $this->Input("password", $name, $value, $options);
                break;

            case FORM_SELECT:
                $control_html = '<table><tr>';

                $disabled = get($options, 'disabled');
                if ($disabled)
                    $options['style'] = 'background-color:#E8E8E8';

                $pre_label = get($options, '_prelabels');
                if ($pre_label)
                    $control_html .= '<td class="padl3">' . $pre_label . '</td>';

                $control_html .= '<td>' . $this->Select($name, $value, $options) . '</td>';

                $post_label = get($options, '_postlabels');
                if ($post_label)
                    $control_html .= '<td class="padl3">' . $post_label . '</td>';

                $control_html .= '</tr></table>';
                break;

            case FORM_CHECKBOX:
                if ($value != '' && $value != "off" && $value != "0")
                    $options['checked'] = "checked";
                else
                    unset($options['checked']);

                $control_html = $this->Input('checkbox', $name, NULL, $options);
                //~ $control_html = '<table><tr>';
                //~ $control_html .= '<td>'.$this->Input('checkbox',$name,NULL,$options).'</td>';
                //~ if(isset($options['_postlabels'])) {
                //~ $control_html .= '<td>'.$options['_postlabels'].'</td>';
                //~ }
                //~ $control_html .= '</tr></table>';
                break;

            case FORM_RADIO:
                $value1 = substr(strrchr($name, "_"), 1);
                $name1 = substr($name, 0, strlen($name) - strlen($value1) - 1);
                if ($value == $value1)
                    $options['checked'] = "checked";
                else
                    unset($options['checked']);

                $control_html = $this->Input('radio', $name1, $value1, $options);
                break;

            case FORM_FILE:
                $hint = '';
                if (isset($options['_hint']))
                    $hint = $options['_hint'];
                $options['style'] = 'height:20px';
                $control_html = $this->Input("file", $name, $value, $options);
                $control_html .= "<table align=\"left\"><tr><td class=\"s11\">" . $hint . "</td></tr><tr><td>";
                $control_html .= "</td></tr></table>";
                break;

            case FORM_MEMO :
                $options['name'] = $name;
                $labels = get($options, '_toplabel');
                $toplabels = get($options, '_toplabels', array());
                $class = get($options, 'class', 'form');
                $control_html = '';
                if ($toplabels) {
                    $control_html = '<table border="0" align="left" class="vat"><tr><td><span class="gray">' . $toplabels . '</span></td></tr>';
                    $control_html .= '<tr><td><textarea class="' . $class . '"' . attribs2string($options) . '>' . htmlQuote($value) . '</textarea></td></tr></table>';
                } else {
                    $control_html .= '<table border="0" align="left" class="vat"><tr><td><textarea class="' . $class . '"' . attribs2string($options) . '>' . htmlQuote($value) . '</textarea></td></tr></table>';
                }
                break;

            case FORM_MEMO_COUNTER:
                $options['name'] = $name;
                $maxchar = get($options, '_maxchar', 1000);
                $control_html = "<table border=0>";

                $control_html .= "<tr><td><textarea onkeyup=\"javascript: charcount('$name', $maxchar)\" id=\"_form_$name\" onchange=\"javascript: charcount('$name',$maxchar)\" class=\"form\" " . attribs2string($options) . ">" . htmlQuote($value) . "</textarea></td></tr>";
                $control_html .= "<table width=\"100%\" class=\"pad0\" cellpadding=0><tr><td><a href=\"javascript: javascript: clearmemo('{$name}')\">Clear</a></td><td><table align=\"right\" cellpadding=0 cellspacing=0 class=\"pad0\"><tr><td><input size=\"2\" id=\"{$name}__charcounter\" disabled=\"disabled\" value=\"" . strlen($value) . "\" /></td><td><span class=\"s11\"> of $maxchar</span></td></tr></table>";
                $control_html .= "</td></tr></table>";
                break;

            //~ case FORM_MEMO_COUNTER :
            //~ $options['name'] = $name;
            //~ $class = get($options, 'class', 'form');
            //~ $control_html = '';
            //~ $control_html .= '<table border="0" align="left" class="vat"><tr><td><textarea class="'.$class.'"'.attribs2string($options).' id="_memo_'.$name.'">'.htmlQuote($value).'</textarea></td></tr>';
            //~ $control_html .= '<tr><td><input type="text" size="2" id="_memo_counter_'.$name.'" value="'.strlen($value).'"></td></tr>';
            //~ $control_html .= "</table>";
            //~ break;

            case FORM_DATE :
                $valarr = explode('-', $value);
                $y = intval(get($valarr, 0, date("Y")));
                $m = intval(get($valarr, 1));
                $d = intval(get($valarr, 2));

                $ta_d = array("" => "");
                for ($i = 1; $i <= 31; $i++)
                    $ta_d[$i] = $i;
                $ta_m = array("" => "");
                for ($i = 1; $i <= 12; $i++)
                    $ta_m[$i] = $i;
                $ta_y = array("" => "");
                for ($i = 2007; $i <= date("Y"); $i++)
                    $ta_y[$i] = $i;
                $opts_d = $options;
                $opts_m = $options;
                $opts_y = $options;
                $opts_d['_list'] = $ta_d;
                $opts_m['_list'] = $ta_m;
                $opts_y['_list'] = $ta_y;

                $pre_label = get($options, '_prelabels');
                $post_label = get($options, '_postlabels');

                $control_html = '<table cellpadding="0" border="0"><tr>';

                if ($pre_label)
                    $control_html .= '<td>' . $pre_label . '</td>';

                if ($GLOBALS['LANGUAGE'] && strtolower($GLOBALS['LANGUAGE']) == 'ru') {
                    $control_html .= "</td><td class=\"padl5\"> " . $this->Select("{$name}_0", $d, $opts_d)
                            . '<td class="padl3">' . $this->Select("{$name}_1", $m, $opts_m)
                            . "</td><td class=\"padl3\"> " . $this->Select("{$name}_2", $y, $opts_y) . '</td>';
                } else {
                    $control_html .= '<td class="padl5">' . $this->Select("{$name}_1", $m, $opts_m)
                            . "</td><td class=\"padl3\"> " . $this->Select("{$name}_0", $d, $opts_d)
                            . "</td><td class=\"padl3\"> " . $this->Select("{$name}_2", $y, $opts_y) . '</td>';
                }

                if ($post_label)
                    $control_html .= '<td>' . $post_label . '</td>';
                $control_html .= '</tr></table>';
                break;

            case FORM_CB_ARRAY:
                $control_html = '<table cellpadding="2" border="0" class="cb_list">';
                $list = get($options, '_list', array());
                $label = get($options, '_label', '');
                if ($label) {
                    $control_html .= '<tr><td colspan="2">' . $label . '</td></tr>';
                }


                $values = array();
                $els = array();
                if (get($this->tgtentity->attr, $name)) {
                    $els = explode(",", get($this->tgtentity->attr, $name));
                }

                foreach ($els as $k => $v) {
                    $v = str_replace(array("[", "]"), array("", ""), $v);
                    $values[$k] = $v;
                }

                $i = 0;
                foreach ($list as $k => $v) {
                    if (($i % get($options, '_perrow', 1000)) == 0) {
                        if ($i)
                            $control_html.='</tr>';
                        $control_html.='<tr>';
                    }

                    if (in_array($k, $values)) {
                        $options['checked'] = "checked";
                    } else {
                        unset($options['checked']);
                    }

                    $control_html .= '';
                    $control_html .= '<td>' . $this->Input('checkbox', $name . "_$k", NULL, $options) . '</td>';
                    $control_html .= '<td class="padr5">' . $v . "</td>";
                    $i++;
                }

                $control_html .= "</tr></table>";
                break;

            case FORM_RAD_ARRAY:
                $control_html = '<table class="cb_list">';
                $list = get($options, '_list', array());
                $opt = get($options, '_opt', array());

                $i = 0;
                foreach ($list as $k => $v) {
                    $radio_options = $options;
                    if (($i % get($options, '_perrow', 1000)) == 0) {
                        if ($i)
                            $control_html .= '</tr>';
                        $control_html .= '<tr>';
                    }

                    if ($k == $value) {
                        $radio_options['checked'] = "checked";
                    } else {
                        unset($radio_options['checked']);
                    }

                    if (get($opt, $k)) {
                        foreach ($opt[$k] as $ok => $ov) {
                            $radio_options[$ok] = $ov;
                        }
                    }

                    $control_html .= '';
                    $control_html .= '<td>' . $this->Input('radio', $name, $k, $radio_options) . '</td>';
                    $control_html .= '<td class="padr5">' . $v . "</td>";
                    $i++;
                }

                $control_html .= "</tr></table>";



                //~ $labels=get($options,'_prelabels') || get($options,'_postlabels');
                //~ $prelabels=get($options,'_prelabels',array());
                //~ $postlabels=get($options,'_postlabels',array());
                //~ for($i=0;$i<intval(get($options,'_n',1));$i++) {
                //~ if (($i % get($options,'_perrow',1000))==0) {
                //~ if ($i) $control_html.='</tr>';
                //~ $control_html.='<tr>';
                //~ }
                //~ $radval=get($radvals,$i,$i);
                //~ $options1 = get($options,$i,array());
                //~ if (!isset($options1['id'])) {
                //~ $options1['id'] = get($options, 'id', $name).'_'.$i;
                //~ }
                //~ $id = $options1['id'];
                //~ if ($value==$radval)
                //~ $options1['checked']="checked";
                //~ else
                //~ unset($options1['checked']);
                //~ $control_html.="<td>".$this->Input('radio',$name,''.$radval,$options1)."</td>";
                //~ if ($labels)
                //~ $control_html.="<td><label for=\"$id\">".get($postlabels,$radval,'')."</label></td>";
                //~ }   
                //~ $control_html=$control_html."</tr></table>";
                break;

            default :
                throw new exception("Такое поле не существует: $type for $name");
        }

        //~ if (get($options,'_static')) $control_html.="<input type=\"hidden\" name=\"".htmlQuote($name)."\" value=\"$value\" />";

        $res = get($options, '_pretext', '');
        $label = get($options, '_prelabel') || get($options, '_postlabel');
        if ($label)
            $res.="<label>";
        $res.=get($options, '_prelabel', '');
        $res.=$control_html;
        $res.=get($options, '_postlabel', '');
        if ($label)
            $res.="</label>";
        $res.=get($options, '_posttext', '');
        return $res;
    }

    function Hidden($name, $value) {
        $this->HTML[$name] = array('field' => "<input type=\"hidden\" name=\"" . htmlQuote($name) . "\" value=\"$value\" />");
        $this->valuesforentity[$name] = $value;
        $this->fields[] = $name;
        $this->thissection[] = $name;
    }

    public function SetsError(&$title, $options = array()) {
        global $ERRROS;
        $this->fails++;
        $this->wrong++;
        $field = '<span class="reenter">' . $title . '</span>';
        $this->error = true;
        $GLOBALS['ERRORS'][] = "Incorrect filled the {$field} field";
    }

    function Field($type, $title0, $name, $options=array(), $pattern=NULL) {

        $this->error = false;
        $this->fields[] = $name;
        $this->thissection[] = $name;
        $error = '';
        $failed = false;

        $value = get($options, '_value', AUTO);
        if ($pattern == NULL)
            $pattern = get($options, '_pattern');

        $asdefault = get($options, '_asdef');
        if ($asdefault == AUTO)
            $asdefault = get_param("{$name}__asdef", 0);

        if ($value == AUTO)
            $value = $this->DefaultValue($name, $type, $options, $asdefault);


        $title = $title0;
        if (count($_POST) && !in_array($type, $GLOBALS['FORM_NONVALIDABLES'])) {
            if (!is_null($value)) {
                if (!is_null($pattern)) {

                    switch ($type) {
                        case FORM_SELECT:
                            if ($value != $pattern)
                                break;
                            $this->SetsError($title);
                            break;

                        case FORM_RAD_ARRAY:
                            if ($value != $pattern)
                                break;
                            $this->SetsError($title);
                            break;

                        default:
                            if (!preg_match($pattern, $value)) {
                                $this->SetsError($title);
                            }
                    }
                }
            } elseif (!isset($_POST[$name]) && get($options, '_mandatory')) {
                $this->SetsError($title);
                $this->fails++;
                $failed = true;
            } elseif (get($options, '_mandatory')) {
                $this->fails++;
                $failed = true;
            }
        }

        if ($title)
            $title.=":<sup class=\"mandatory\">" . ((get($options, '_mandatory')) ? "*" : " ") . "</sup>";


        $help = get($options, 'help');
        if ($help) {
            $help = '<div class="padt5" style="display: none;" id="_help_' . $name . '"><div class="pad5 help_block">' . $help . '</div></div>';
            $title .= ' (<a href="javascript: show_hide(\'_help_' . $name . '\')">?</a>)';
        }

        $error = $this->error ? '<span class="red">' . get($options, '_msg') . '</span>' : '';

        $this->HTML[$name] = array(
            'title' => $title,
            'field' => $this->ControlHTML($type, $name, $value, $options, $asdefault),
            'name' => $name,
            'error' => $error,
            'help' => $help,
            'options' => $options,
        );
    }

    function SubField($type, $name, $options = array(), $pattern = NULL) {
        $this->fields[] = $name;

        $value = get($options, '_value', AUTO);
        if ($pattern == NULL)
            $pattern = get($options, '_pattern');

        $asdefault = get($this->groupoptions, '_asdef');
        if ($asdefault == AUTO)
            $asdefault = get_param($name . '__asdef', 0);
        if ($value == AUTO)
            $value = $this->DefaultValue($name, $type, $options, $asdefault);

        if (!in_array($type, $GLOBALS['FORM_NONVALIDABLES'])) {
            if (!is_null($value)) {
                if (!is_null($pattern) && !preg_match($pattern, $value)) {
                    $this->groupvalid = 0;
                }
            } elseif (get($this->groupoptions, '_mandatory')) {
                $this->groupvalid = 0;
            }
        }

        $goptions = $this->groupoptions;

        $js_validation = get($goptions, '_jsvalid');
        $control_html = '<td>' . $this->ControlHTML($type, $name, $value, $options) . '</td>';

        $this->iteration++;
        $this->groupHTML.=$control_html;
        $this->groupfirst = 0;
    }

# SubField()

    function SubText($text) {
        $this->groupHTML.=$text;
    }

    function Section($name, $title) {
        $this->HTML[$name] = array(
            'title' => "<b>$title</b>",
            'field' => '&nbsp;'
        );
    }

    function Filled() {
        return (count($_POST)) and (!$this->fails);
    }

    function SetMessage($msg) {
        $this->message[] = $msg;
    }

    function SaveToEntity() {
        foreach ($this->valuesforentity as $key => $value) {
            $this->tgtentity->Set($key, $value);
        }
    }

    function Persist() {
        foreach ($_POST as $key => $val)
            $_SESSION["posted_" . $this->name . "_$key"] = $val;

        $_SESSION['posted_' . $this->name] = true;
    }

    function UnPersist() {
        foreach ($this->fields as $key)
            unset($_SESSION["posted_" . $this->name . "_$key"]);
        unset($_SESSION['posted_' . $this->name]);
    }

    function CompactFields() {
        $r = $this->thissection;
        $this->thissection = '';
        return $r;
    }

}

?>