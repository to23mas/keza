<?php

declare(strict_types=1);

namespace App\UI\Default\Form;

final readonly class ContactFormData
{

	public function __construct(
		public string $name,
		public string $email,
		public string $subject,
		public string $message,
	) {}
}
