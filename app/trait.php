<?php

namespace app;

trait Engine
{
	public $engine_overheats = 90;
	public $horsepower = 2;

	public function startTheEngine()
	{
		echo 'Двигун включаэться' . '<br>';
	}

	public function offTheEngine()
	{
		echo 'Двигун виключаэться' . '<br>';
	}

	public function coolingTheEngine($t)
	{
		if ($t == $this->engine_overheats) {
			$t -= 10;
			echo 'Двигун охолоджуэться до ' . $t . '<br>';
		}
		return $t;
	}
}

trait goBack
{
	public function reverseGear()
	{
		echo 'Движение назад.<br>';
	}
}

trait TransmissionAuto
{
	use goBack;

	public function frontTransmission()
	{
		echo 'Движение вперед.<br>';
	}
}

trait TransmissionManual
{
	use goBack;

	public function firstTransmission()
	{
		echo 'Первая передача';
	}

	public function secondTransmission()
	{
		echo "Вторая передача";
	}
}


