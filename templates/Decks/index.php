<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deck $newDeck
 * @var \App\Model\Entity\Deck[] $decks
 */
?>
<style>
    .card a {
        color: white;
    }
</style>
<div class="row">
    <?php foreach ($decks as $deck):?>
    <div class="col-sm-3">
        <div class="card text-white border-<?= h($deck->style)?>" style="min-height: 80vh">
            <div class="card-header bg-<?= h($deck->style)?> mb-3">
                <?= h($deck->name)?>
                <div class="float-end">
                    <?= $this->Form->postLink(
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>',
                        [
                            'action' => 'delete',
                            $deck->id,
                        ],
                        ['escapeTitle' => false,]
                    )?>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Cras justo odio
                        </div>
                        <span class="badge bg-primary rounded-pill" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                              <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                            </svg>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <div class="col-sm-3">
        <div class="card text-white">
            <div class="card-header  bg-primary mb-3">Header</div>
            <div class="card-body">
                <h5 class="card-title">Primary card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= __('New Deck')?></h5>
                <?= $this->Form->create($newDeck, [
                    'url' => [
                        'action' => 'add',
                    ]
                ]) ?>
                    <?php
                    echo $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('style', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                        'options' => [
                            'primary' => 'primary',
                            'secondary' => 'secondary',
                            'success' => 'success',
                            'danger' => 'danger',
                            'warning' => 'warning',
                            'info' => 'info',
                        ]
                    ]);
                    ?>
                <?= $this->Form->button(__('Create'), [
                    'class' => 'btn btn-primary',
                ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
