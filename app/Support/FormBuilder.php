<?php

namespace App\Support;

use Carbon\Carbon;
use Collective\Html\FormBuilder as CollectiveFormBuilder;
use Collective\Html\HtmlBuilder;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ViewErrorBag;

/**
 * Helper methods for rendering form elements. Will render errors as well.
 */
class FormBuilder extends CollectiveFormBuilder
{
    /**
     * @var
     */
    protected $errors;

    /**
     * FormBuilder constructor.
     * @param HtmlBuilder $html
     * @param UrlGenerator $url
     * @param Factory $view
     * @param $csrfToken
     */
    public function __construct(HtmlBuilder $html, UrlGenerator $url, Factory $view, $csrfToken)
    {
        parent::__construct($html, $url, $view, $csrfToken);

    }

    /**
     * Open up a new HTML form.
     *
     * @param  array $options
     *
     * @return string
     */
    public function open(array $options = [])
    {
        if (array_key_exists('errors', $options)) {
            $this->errors = $options['errors'];
            unset($options['errors']);
        }

        return parent::open($options);
    }

    /**
     * Close a HTML form
     * @return string
     */
    public function close()
    {
        $this->errors = null;

        return parent::close();
    }


    /**
     * Create a form label element.
     *
     * @param  string $name
     * @param  string $value
     * @param  array $options
     * @param bool $escape_html
     *
     * @return string
     */
    public function label($name, $value = null, $options = [], $escape_html = true)
    {
        $options = $this->addClass('col-form-label', $options);

        $html = parent::label($name, $value, $options, $escape_html);

        if (array_key_exists('help', $options)) {
            $html .= '&nbsp;<span class="glyphicon glyphicon-info-sign " data-toggle="tooltip-right" title="' . $options['help'] . '"></span>';
        }

        return $html;
    }

    /**
     * Generate HTML for text input type.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     *
     * @return string
     */
    public function text($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = parent::text($name, $value, $options);
        $html = $this->tryAddingInputAddOn($html, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML for number input type.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     *
     * @return string
     */
    public function number($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = parent::number($name, $value, $options);
        $html = $this->tryAddingInputAddOn($html, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML for search input type.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     *
     * @return string
     */
    public function search($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = parent::input('search', $name, $value, $options);
        $html = $this->tryAddingInputAddOn($html, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML for email input type.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     *
     * @return string
     */
    public function email($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = parent::email($name, $value, $options);
        $html = $this->tryAddingInputAddOn($html, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML for password input type.
     *
     * @param string $name
     * @param array $options
     *
     * @return string
     */
    public function password($name, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = parent::password($name, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML for select element.
     *
     * @param  string $name
     * @param  array $list
     * @param  string $selected
     * @param array $selectAttributes
     * @param array $optionsAttributes
     * @param array $options
     * @return string
     * @internal param array $options
     */
    public function select($name, $list = [], $selected = null, array $selectAttributes = [],array $optionsAttributes = [], array $options = [])
    {
        $selectAttributes = $this->addClass('form-control', $selectAttributes);

        $html = parent::select($name, $list, $selected, $selectAttributes, $optionsAttributes);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Generate HTML of select input of supported locales.
     *
     * @param null $selected Defaults to default locale.
     * @return string
     */
    public function supportedLocales($selected = null)
    {
        $locales = [];

        foreach (\LaravelLocalization::getSupportedLocales() as $key => $locale) {
            $locales[$key] = $locale['native'];
        }

        if (is_null($selected)) {
            $selected = \LaravelLocalization::getDefaultLocale();
        }

        return $this->select('locale_iso', $locales, $selected, ['class' => 'chosen']);
    }

    /**
     * Create a select box field with options to disable specific items
     *
     * @param  string $name
     * @param  array $list
     * @param  string $selected
     * @param  array $options
     *
     * @return string
     */
    public function custom_select($name, $list = [], $selected = null, $options = [])
    {
        // Custom: add bootstrap form classes
        $options = $this->addClass('form-control', $options);

        // When building a select box the "value" attribute is really the selected one
        // so we will use that when checking the model or session for a value which
        // should provide a convenient method of re-populating the forms on post.
        $selected = $this->getValueAttribute($name, $selected);

        $options['id'] = $this->getIdAttribute($name, $options);

        if (!isset($options['name'])) {
            $options['name'] = $name;
        }

        // We will simply loop through the options and build an HTML value for each of
        // them until we have an array of HTML declarations. Then we will join them
        // all together into one single HTML element that can be put on the form.
        $html = [];

        $disable = null;
        if (array_key_exists('disable', $options)) {
            $disable = $options['disable'];

            // unset custom disable key
            unset($options['disable']);
        }

        foreach ($list as $value => $display) {
            $html[] = $this->custom_getSelectOption($display, $value, $selected, $disable);
        }

        // Once we have all of this HTML, we can join this into a single element after
        // formatting the attributes into an HTML "attributes" string, then we will
        // build out a final select statement, which will contain all the values.
        $options = $this->html->attributes($options);

        $list = implode('', $html);

        $html = "<select{$options}>{$list}</select>";
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Get the select option for the given value.
     *
     * @param  string $display
     * @param  string $value
     * @param  string $selected
     * @param  string $disable
     *
     * @return string
     */
    public function custom_getSelectOption($display, $value, $selected, $disable)
    {
        if (is_array($display)) {
            return $this->custom_optionGroup($display, $value, $selected, $disable);
        }

        return $this->custom_option($display, $value, $selected, $disable);
    }

    /**
     * Create an option group form element.
     *
     * Custom:
     * Added $disabled parameter.
     *
     * @param  array $list
     * @param  string $label
     * @param  string $selected
     * @param  string $disable
     *
     * @return string
     */
    protected function custom_optionGroup($list, $label, $selected, $disable)
    {
        $html = [];

        foreach ($list as $value => $display) {
            $html[] = $this->custom_option($display, $value, $selected, $disable);
        }

        return '<optgroup label="' . e($label) . '">' . implode('', $html) . '</optgroup>';
    }

    /**
     * Create a select element option.
     *
     * Custom:
     * Added $disable parameter.
     *
     * @param  string $display
     * @param  string $value
     * @param  string $selected
     * @param  string $disable
     *
     * @return string
     */
    protected function custom_option($display, $value, $selected, $disable)
    {
        $selected = $this->getSelectedValue($value, $selected);
        $disabled = $this->getDisableValue($value, $disable);

        $options = ['value' => e($value), 'selected' => $selected, 'disabled' => $disabled];

        return '<option' . $this->html->attributes($options) . '>' . e($display) . '</option>';
    }

    /**
     * Determine if the value is disabled.
     *
     * @param  string $value
     * @param  string $disable
     *
     * @return string
     */
    protected function getDisableValue($value, $disable)
    {
        if (is_array($disable)) {
            return in_array($value, $disable) ? 'disabled' : null;
        }

        return ((string)$value == (string)$disable) ? 'disabled' : null;
    }

    /**
     * Generate HTML for textarea element.
     *
     * @param string $name
     * @param null $value
     * @param array $options
     *
     * @return string
     */
    public function textarea($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $html = '';
        $html .= parent::textarea($name, $value, $options);
        $html .= $this->addErrors($name);


        return $html;
    }

    /**
     * Generate HTML for checkbox input type.
     *
     * @param string $name
     * @param int $value
     * @param null $checked
     * @param array $options
     *
     * @return string
     */
    public function checkbox($name, $value = 1, $checked = null, $options = [])
    {
        if (!array_key_exists('id', $options)) {
            $options['id'] = $name;
        }

        $html = parent::checkbox($name, $value, $checked, $options);

        return $html;
    }

    /**
     * Generate HTML for file input type.
     *
     * @param string $name
     * @param array $options
     *
     * @return string
     */
    public function file($name, $options = [])
    {
        $html = parent::file($name, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */
    public function btn_group_open($options = [])
    {
        $options = $this->addClass('btn-group btn-group-toggle', $options);
        return $this->toHtmlString('<div' . $this->html->attributes($options) . ' data-toggle="buttons">');
    }

    /**
     * Generate HTML for closing button group.
     *
     * @return string
     */
    public function btn_group_close()
    {
        return '</div>';
    }

    /**
     * @param $type
     * @param $name
     * @param $value
     * @param $btnLabelValue
     * @param bool $btnLabelIcon
     * @param string $btnLabelIconClass
     * @param array $inputOptions
     * @param array $btnOptions
     * @return string
     */
    public function btn_group_btn($type, $name, $value, $btnLabelValue, $btnLabelIcon = false, $btnLabelIconClass = '', $inputOptions = [], $btnOptions = [])
    {
        $html = $this->toHtmlString('<label' . $this->html->attributes($btnOptions) . '>');
        $html .= $this->input($type, $name, $value, $inputOptions);
        $html .= $this->toHtmlString($btnLabelIcon ? '<i class="fa ' . $btnLabelIconClass .'"></i> ' . $btnLabelValue : $btnLabelValue);
        $html .= $this->toHtmlString('</label>');
        return $html;
    }

    /**
     * @param $model
     * @param $inputOptionsTrue
     * @param $inputOptionsFalse
     * @return string
     */
    public function published_at($model, $inputOptionsTrue, $inputOptionsFalse)
    {
        $html = $this->btn_group_open(['class' => 'w-100']);
        $html .= $this->btn_group_btn('radio', 'active', 1, __("b::$model.label.yes"), true, 'fa-check', $inputOptionsTrue, ['class' => 'btn btn-outline-secondary w-50']);
        $html .= $this->btn_group_btn('radio', 'active', 0, __("b::$model.label.no"), true, 'fa-ban', $inputOptionsFalse, ['class' => 'btn btn-outline-secondary w-50']);
        $html .= $this->btn_group_close();

        return $html;
    }

    /**
     * Generate HTML for opening form group.
     *
     * @param string $name
     * @return string
     */
    public function group_open($name = '')
    {
        $class = 'form-group';

        if (!empty($name)) {


            $arrayDottedName = str_replace(['[', ']'], ['.', ''], $name);

            if ($this->errors instanceof ViewErrorBag && (count($this->errors->get($name)) > 0 || $this->errors->get($arrayDottedName))) {
                $class .= ' has-error';
            } elseif (is_object($this->errors) && ($this->errors->has($name) || $this->errors->has($arrayDottedName))) {
                $class .= ' has-error';
            }
        }

        $class .= ' ' . $name;

        return '<div class="' . $class . '">';
    }

    /**
     * Generate HTML for closing form group.
     *
     * @return string
     */
    public function group_close()
    {
        return '</div>';
    }

    /**
     * Generate HTML for date input.
     *
     * @param $name
     * @param null|string|Carbon $value
     * @param array $options
     *
     * @return string
     */
    public function date($name, $value = null, $options = [])
    {
        $options = $this->addClass('form-control', $options);

        $value = $this->getValueAttribute($name, $value);

        if ($value instanceof Carbon) {
            $value = $value->format('d-m-Y');
        }

        $html = parent::input('date', $name, $value, $options);

        if (!array_key_exists('before', $options)) {
            $options['before'] = '<label for="' . $name . '"><i class="glyphicon glyphicon-calendar"></i></label>';
        }

        $html = $this->tryAddingInputAddOn($html, $options);
        $html .= $this->addErrors($name);

        return $html;
    }

    /**
     * Checks if 'before' or 'after' option is set and adds an input add-on.
     *
     * @param array $options
     *
     * @return string
     */
    protected function tryAddingInputAddOn($html, $options = [])
    {
        if (array_key_exists('before', $options) || array_key_exists('after', $options)) {
            $html = '
			<div class="input-group">
				' . (array_key_exists('before', $options) ? '<div class="input-group-addon">' . $options['before'] . '</div>' : '') . '
				' . $html . '
				' . (array_key_exists('after', $options) ? '<div class="input-group-addon">' . $options['after'] . '</div>' : '') . '
			</div>';
        }

        return $html;
    }

    /**
     * Combines given class name with class names in options.
     *
     * @param string $class
     * @param array $options
     *
     * @return array
     */
    protected function addClass($class, $options = [])
    {
        if (!array_key_exists('class', $options)) {
            $options['class'] = $class;
        } elseif (strpos($class, $options['class']) === false) {
            $options['class'] .= ' ' . $class;
        }

        return $options;
    }

    /**
     * Add HTML for error message to $this->errors.
     *
     * @param string $name
     *
     * @return string
     */
    private function addErrors($name)
    {
        if (!is_null($this->errors)) {
            if ($this->errors->has($name)) {
                return '<span class="validation-error">' . $this->errors->first($name) . '</span>';
            }
            $arrayDotted = str_replace(['[', ']'], ['.', ''], $name);
            if ($this->errors->has($arrayDotted)) {
                return '<span class="validation-error">' . $this->errors->first($arrayDotted) . '</span>';
            }
        }

        return '';
    }

}
