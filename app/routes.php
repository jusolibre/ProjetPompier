<?php
// Routes

$app->get('/', App\Action\HomeAction::class);

$app->get('/presences', App\Action\PresencesAction::class);

$app->get('/addPompier', App\Action\AddPompierAction::class);

$app->get('/deletePompier', App\Action\DeletePompierAction::class);

$app->get('/historique', App\Action\HistoriqueAction::class);

$app->post('/addPompier', App\Model\AddPompierModel::class);

$app->post('/modPompier', App\Model\ModPompierModel::class);

$app->post('/createRoom', App\Api\CreateRoomApi::class);

$app->post('/deleteRoom', App\Api\DeleteRoomApi::class);

$app->post('/joinRoom', App\Api\JoinRoomApi::class);

$app->post('/login', App\Api\loginApi::class);

$app->get('/getallpompier', App\Model\GetPompierModel::class);

$app->post('/deletePompier', App\Model\DeletePompierModel::class);
