<?php declare(strict_types=1);

namespace App\UI\Default\Presenters;

use App\UI\Default\Form\ContactForm;
use App\UI\Default\Form\ContactFormFactory;
use Nette\Application\UI\Presenter;
use Nette\DI\Attributes\Inject;


final class HomePresenter extends Presenter
{
	#[Inject]
	public ContactFormFactory $contactFormFactory;

	public function actionDefault(): void
	{
		$this->template->motto = 'Keza to je záruka jistoty a kvality rychlé pomoci';
		$this->template->servicesHeader = 'Naše služby';
		$this->template->team = true;
	}

	protected function createComponentContactForm(): ContactForm
	{
		return $this->contactFormFactory->create();
	}

	public function actionLanding(): void 
	{
		$this->template->motto = 'Keza to je záruka jistoty a kvality rychlé pomoci';
	}
}
