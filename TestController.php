<?php

use Services\CountDeliveryService;

$fastDeliveryService = new CountDeliveryService('fast_delivery_api_url');
$slowDeliveryService = new CountDeliveryService('slow_delivery_api_url');

// произвольные данные
$shipments = [['sourceKladr' => 'source1', 'targetKladr' => 'target1', 'weight' => 3.0],
    ['sourceKladr' => 'source2', 'targetKladr' => 'target2', 'weight' => 7.0],];

$results = [];

foreach ($shipments as $shipment) {
    $fastDeliveryResult = $fastDeliveryService->calculateFastDelivery($shipment['sourceKladr'], $shipment['targetKladr'], $shipment['weight']);
    $slowDeliveryResult = $slowDeliveryService->calculateSlowDelivery($shipment['sourceKladr'], $shipment['targetKladr'], $shipment['weight']);

    $formattedResults = ['fast_delivery' => ['price' => $fastDeliveryResult['price'],
        'date' => $fastDeliveryResult['date'],
        'error' => $fastDeliveryResult['error'],],
        'slow_delivery' => ['price' => $slowDeliveryResult['price'],
            'date' => $slowDeliveryResult['date'],
            'error' => $slowDeliveryResult['error'],],];

    $results[] = $formattedResults;
}

print_r($results);
