<?php

declare(strict_types=1);

namespace App\UI\Default\Form;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

final class ContactForm extends Control
{

	public function render(): void
	{
		$this->getTemplate()->setFile(__DIR__ . '/templates/contactForm.latte');
		$this->getTemplate()->render();
	}

	public function createComponentForm(): Form
	{
		$form = new Form;

		$form->addText('name', 'Jméno')
			->setRequired('Jméno je povinná položka')
			->addRule(Form::MaxLength, 'Maximální povolená délka jména je 50 znaků', 50);

		$form->addText('email', 'Email')
			->setRequired('Email je povinná položka')
			->addRule(Form::Email);

		$form->addText('subject', 'Předmět')
			->setRequired('Předmět je povinná položka')
			->addRule(Form::MaxLength, 'Maximální povolená délka předmětu je 50 znaků', 50);

		$form->addTextArea('message', 'Zpráva')
			->setRequired('Zpráva je povinná položka')
			->setHtmlAttribute('rows', '6')
			->addRule(Form::MaxLength, 'Maximální povolená délka zprávy je 2000 znaků', 2000);

		$form->addSubmit('submit', 'Odeslat zprávu');

		$form->onSuccess[] = [$this, 'formSucceeded'];

		return $form;
	}


	public function formSucceeded(ContactFormData $formData): void
	{
		$mailResult = mail(
			'info@deratizacekeza.com',
			$formData->subject,
			sprintf('%s - %s - %s', $formData->name, $formData->email, $formData->message),
		);

		if (! $mailResult) {
			$this->getPresenter()->flashMessage('Nepodařilo se zprávu odeslat. Chyba je pravděpodobně na straně poskytovatele webových stránek. Pokud nás chcete kontaktovat, použijte prosím telefonní číslo +420 737 652 948, nebo email info@deratizacekeza.cz.', 'fail');
			$this->getPresenter()->redirect('this');
		}

		$this->getPresenter()->flashMessage('Zprávu jsme obdrželi. Brzy vás kontaktujeme', 'success');
		$this->getPresenter()->redirect('this');
	}
}
