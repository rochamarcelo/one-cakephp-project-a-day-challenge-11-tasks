<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{

    /**
     * Add method
     *
     * @param string|null $deckId The user deck id
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(string $deckId)
    {
        $this->request->allowMethod(['post', 'put']);
        $deck = $this->Tasks->Decks->get($deckId);
        $task = $this->Tasks->newEmptyEntity();
        $task = $this->Tasks->patchEntity($task, $this->request->getData());
        $task->deck_id = $deck->id;
        if ($this->Tasks->save($task)) {
            $this->Flash->success(__('The task has been saved.'));
        } else {
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }

        return $this->redirect([
            'controller' => 'Decks',
            'action' => 'index'
        ]);
    }
}
