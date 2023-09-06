<?php

namespace Services;
class CountDeliveryService
{
    private $baseUrl;


    /**
     * Конструктор.
     *
     * @param string $baseUrl URL, по которому будет идти запрос
     */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }


    /**
     * Рассчитывает стоимость и сроки доставки для "Быстрой доставки".
     *
     * @param string $sourceKladr КЛАДР откуда везем
     * @param string $targetKladr КЛАДР куда везем
     * @param float $weight Вес отправления в кг
     * @return array Массив с данными о доставке в формате:
     *  - 'price' (float): стоимость доставки
     *  - 'date' (string): дата доставки в формате 'YYYY-MM-DD'
     *  - 'error' (string|null): описание ошибки, если ошибка произошла, или null в случае успеха
     */
    public function calculateFastDelivery(string $sourceKladr, string $targetKladr, float $weight): array
    {
        // Здесь эмулируем запрос к API "Быстрой доставки"
        $result = [
            'price' => 250.0,
            'date' => '2023-09-10',
            'error' => null,
        ];
        return $result;
    }


    /**
     * Рассчитывает стоимость и сроки доставки для "Медленной доставки".
     *
     * @param string $sourceKladr КЛАДР откуда везем
     * @param string $targetKladr КЛАДР куда везем
     * @param float $weight Вес отправления в кг
     * @return array Массив с данными о доставке в формате:
     *  - 'price' (float): стоимость доставки
     *  - 'date' (string): дата доставки в формате 'YYYY-MM-DD'
     *  - 'error' (string|null): описание ошибки, если ошибка произошла, или null в случае успеха
     */
    public function calculateSlowDelivery(string $sourceKladr, string $targetKladr, float $weight): array
    {
        // Здесь эмулируем запрос к API "Медленной доставки"
        $result = [
            'price' => 150.0 * $this->calculateCoefficient($weight), // Замените на реальные данные
            'date' => '2023-09-15',
            'error' => null,
        ];
        return $result;
    }


    /**
     * Рассчитывает коэффициент для "Медленной доставки" на основе веса.
     *
     * @param float $weight Вес отправления в кг
     * @return float Коэффициент для расчета стоимости "Медленной доставки"
     */
    private function calculateCoefficient(float $weight): float
    {
        // Рассчитываем коэффициент для "Медленной доставки" на основе веса
        return $weight < 5 ? 1.2 : 1.5;
    }
}
