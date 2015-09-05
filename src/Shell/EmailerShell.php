<?php
namespace App\Shell;

//use Cake\Mailer\Email;
use Cake\Network\Email\Email;
use Cake\Console\Shell;

class EmailerShell extends Shell {

	public function main() {

		$this->loadModel('Comms');
		$comms = $this->Comms->find('all')
			->select(['Comms.id', 'Comms.dest', 'Comms.subject', 'Comms.body', 'Users.email'])
			->contain('Users')
			->where([
				'OR' =>[
					['comms_status_id' => COMM_NEW],
					['comms_status_id' => 0] //awkward way to catch incorrect status
				]
			])
			->limit(10)
			->toArray();

		foreach ($comms as $comm) {
			//TODO: correct this unreliable and inflexible way to send emails
			Email::deliver(COMPANY_EMAIL, $comm->subject, $comm->body, [
				'from' => $comm->user->email,
				'transport' => 'default',
				'domain' => WEBSITE_DOMAIN
			]);
			$this->Comms->patchEntity($comm, ['comms_status_id' => COMM_COMPLETED]);
			$this->Comms->save($comm);
		}
	}

}
