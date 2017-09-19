<?php

namespace app;

require_once 'trait.php';

class Car
{
	use Engine;

	protected function move($distance, $speed, $direction)
	{
		// 1. a
//		$this->startTheEngine();

		// 2. b
		$direction = mb_strtolower($direction);
		if ($direction == 'вперед') {
			$this->firstTransmission();
		} elseif ($direction == 'назад') {
			$this->reverseGear();
		}

		// 3. c
		$time = $distance / $speed;
		$engineTemperature = 0;
		for ($i = 1; $i <= $distance; $i++) {
			if (empty($i % 2)) {
				$engineTemperature += 1;
			}
			if ($i == 20 && $speed >= 20 && $direction == 'вперед') {
				$this->secondTransmission();
				echo '<br>';
			}
			// && method_exists(secondTransmission())
			echo 'Ви проїхали ' . $i . ' км. температура двигуна ' . $engineTemperature . '<br>';
			$engineTemperature = $this->coolingTheEngine($engineTemperature);
//			echo $i%2 . ' - ' . $i . '<br>';
		}
//		$this->offTheEngine();
		echo 'Час поїздки ' . $time . ' сек. ' . '<br>';

//		$direction = mb_strtolower($direction);
//		$travel_time = round($distance / $speed, 2);
//
//		echo 'Включение двигателя.<br>';

//
//		if ($engineTemperature < $this->engine_overheats) {
//			echo 'Движение ' . $direction . ' ' . $travel_time . ' сек.' . '<br>';
//		} elseif ($speed > $this->engine_overheats) {
//			echo 'Движение ' . $direction . ' ' . $travel_time . ' сек. при включенном охлаждении' . '<br>';
//		}
//
//		echo '';
//		echo $distance . '<br>';
//		echo $speed . '<br>';
//		echo $direction . '<br>';
	}
}


class NIVA extends Car
{
	use TransmissionManual;
	public $distance = 40;
	public $speed = 40;
	private $direction = 'Вперед';

	public function __construct()
	{
		parent::startTheEngine();
		parent::move($this->distance, $this->speed, $this->direction);
		parent::offTheEngine();
	}
}
