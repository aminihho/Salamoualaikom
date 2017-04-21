<?php

/**
 * Created by PhpStorm.
 * User: kourda
 * Date: 4/12/17
 * Time: 4:14 PM
 */

namespace SalammouAlikom\IFtarBundle\Twig\Extension;

use \Twig_Extension;
class VarsExtension extends \Twig_Extension
{
    public function getFilters(){
        return array('twig_json_decode' => new \Twig_Filter_Method($this, 'json_decode' ));
       // return new \Twig_SimpleFilter( 'twig_json_decode', array( $this, 'json_decode' ) );
        /*
         *    {% for tag in tags  %}
            {% set indice = 'tag_' ~ i %}
            {{ loop.index }}
            {% set i = i+1  %}
        {% endfor %}
         */
    }

    public function json_decode ($json){
        return json_decode($json, true);
    }

    public function getName(){
        return 'twig_json_decode';
    }
}