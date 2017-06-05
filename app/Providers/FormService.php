<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 16/9/14
 * Time: 下午2:31
 */

namespace App\Providers;

use Form;
use Html;
use View;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class FormService extends ServiceProvider
{
    public function register()
    {
        $this->formText();
        $this->formCsrfToken();
        $this->formMethodField();
    }

    /**
     * {{Form::form_csrf_token()}}
     */
    private function formCsrfToken()
    {
        $handler = function () {

            return new HtmlString('<input type="hidden" name="_token" value="'.csrf_token().'">');;
        };
        Form::macro('form_csrf_token', $handler);
    }

    private function formMethodField()
    {
        $handler = function ($method) {

            return new HtmlString('<input type="hidden" name="_method" value="'.$method.'">');
        };

        Form::macro('form_method_field', $handler);
    }

    /**
     *  {{Form::form_text('88888','888')}}
     */
    private function formText()
    {
        $handler = function ($label, $name, $placeholder = '', $percent = 0.5, $modal = false) {

            return new HtmlString('<input type="hidden" name="_token" value="'.csrf_token().'">');;
        };
        Form::macro('form_text', $handler);
    }
}
