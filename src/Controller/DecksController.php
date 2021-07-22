<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Decks Controller
 *
 * @property \App\Model\Table\DecksTable $Decks
 * @method \App\Model\Entity\Deck[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $decks = $this->Decks->find()
            ->where([
                'user_id' => $this->request->getAttribute('identity')['id'],
            ])
            ->all();
        $newDeck = $this->Decks->newEmptyEntity();
        $this->set(compact('decks', 'newDeck'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deck = $this->Decks->newEmptyEntity();
        $this->request->allowMethod(['post', 'put']);
        $deck = $this->Decks->patchEntity($deck, $this->request->getData());
        $deck->user_id = $this->request->getAttribute('identity')['id'];
        if ($this->Decks->save($deck)) {
            $this->Flash->success(__('The deck has been saved.'));
        } else {
            $this->Flash->error(__('The deck could not be saved. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(string $id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->find()
            ->where([
                'id' => $id,
                'user_id' => $this->request->getAttribute('identity')['id'],
            ])
            ->firstOrFail();

        if ($this->Decks->delete($deck)) {
            $this->Flash->success(__('The deck has been deleted.'));
        } else {
            $this->Flash->error(__('The deck could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
