<?php declare(strict_types=1);

namespace App\UI\Default\Presenters;

use App\UI\Default\Form\ContactForm;
use App\UI\Default\Form\ContactFormFactory;
use Nette\Application\UI\Presenter;
use Nette\DI\Attributes\Inject;


final class SluzbyPresenter extends Presenter
{
	#[Inject]
	public ContactFormFactory $contactFormFactory;

	public function actionDefault(): void
	{
		$this->template->servicesHeader = '';
		$this->template->services = true;
	}


	protected function createComponentContactForm(): ContactForm
	{
		return $this->contactFormFactory->create();
	}
}
