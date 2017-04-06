<?php
// Routes

$app->get('/', App\Action\HomeAction::class);

$app->get('/presences', App\Action\PresencesAction::class);

$app->get('/addPompier', App\Action\AddPompierAction::class);

$app->get('/deletePompier', App\Action\DeletePompierAction::class);

$app->get('/historique', App\Action\HistoriqueAction::class);

$app->post('/addPompier', App\Model\AddPompierAction::class);

$app->post('/modPompier', App\Model\ModPompierAction::class);