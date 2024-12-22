<?php

declare(strict_types=1);

namespace App\UI\Default\Form;

interface ContactFormFactory
{

	public function create(): ContactForm;
}
