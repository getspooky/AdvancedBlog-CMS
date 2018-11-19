<?php

namespace App\form;

use Kris\LaravelFormBuilder\Form;

class Checkout extends Form
{
    public function buildForm()
    {
        // Add fields here...
        $this
            ->add('name', 'text',[
                "class"=>"input is-primary"
            ])
            ->add('lyrics', 'text')
            ->add('publish', 'text');

    }
}
