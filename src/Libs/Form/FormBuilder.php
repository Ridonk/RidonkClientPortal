<?php
/**
 * Created by PhpStorm.
 * User: georgeddunbar
 * Date: 11/4/17
 * Time: 7:19 AM
 */

namespace Ridonk\ClientPortal\Libs\Form;


class FormBuilder {
    public static function formSubmit($title, $value) {
        return '<input type="submit" id="' . $title . '" value="' . $value . '"><br />';
    }

    public static function formRadioList(Array $options) {
        $form = '';
        foreach ($options as $optionKey => $optionValue) {
            $form .= '<input type="radio" id="' . $optionKey . '" name="' . $optionKey . '" value="' . $optionValue . '">' . $optionValue . '<br />';
        }
        return $form;
    }

    public static function formTextArea($title, $placeholder = '', $id = '') {
        // Build label for new form item
        $form = '<label for="' . $id . '">' . $title . '</label><br />';
        $form .= '<textarea name="' . $id . '" id="' . $id . '" placeholder="' . $placeholder . '" rows="5" cols="40"></textarea><br />';
        return $form;
    }

    public static function formTextField($title, $id, $placeholder = '') {
        // Build label for new form item
        $form = '<label for="' . $id . '">' . $title . '</label><br />';
        // Build input=text
        $form .= '<input type="text" name="' . $id . '" id="' . $id . '" placeholder="' . $placeholder . '"><br />';
        return $form;
    }
}