<?php 


$arr=repitShift(2,['a','b','c']);
 
for($i=0;$i<count($arr);$i++){
	 $error=3;
	 $worning=3;
	echo "$i. $arr[$i]<br>";
	$plan=$arr[$i];
	for($j=0;$j<strlen($plan);$j++){
		switch($plan[$j]){
			case 'a':
				$worning+=1;
			break;
			case 'b':
				$worning+=-2;
				$error+=1;
			break;
			case 'c':
				$error+=-2;
			break;
			
		}
		if($error<0 || $worning<0)
			break;
	}
	if($error==0 && $worning==0){
		echo "$i";
		break;
	}
		
	
	
}
function repitShift($countStep,$massAlphabet)
	{
			//$countStep - длина комбинации (длина комбинации указывает на количество подмассивов)
			//$massAlphabet - массив символов
	$countCharactersInAlphabet = count($massAlphabet);//записали количество символов
	$countCombinations = pow($countCharactersInAlphabet,$countStep);//записали количество комбинаций (количество комбинаций также указывает на длину подмассива)
	$arrayСountStepToCountCombinations = array();//объявляем массив, состоящий из подмассивов в количестве $countStep, а подмассивы будут размера countCombinations.
	for ($currentArrayСountStepToCountCombinations=0;$currentArrayСountStepToCountCombinations<$countStep;$currentArrayСountStepToCountCombinations++)//запускаем цикл от 0 до длинны комбинации.
		{
		$i = -1;//в переменную i кинули -1
		while (count($arrayСountStepToCountCombinations[$currentArrayСountStepToCountCombinations])<>$countCombinations)//заполняем подмассивы буквами алфавита, покак в каждом подмассиве будет столько же букв, сколько и комбинаций
			{
			for ($y=0;$y<$countCharactersInAlphabet;$y++)//цикл от 0 до количества символов в алфавите. То есть перебираем символы алфавита.
				{
				for($r=0;$r<(pow($countCharactersInAlphabet,$currentArrayСountStepToCountCombinations));$r++)//цикл от 0 до количества символов в степени x. Тут решаем, сколько нам нужно записать конкретных символов.
					{
					$i++;//инкрементировали $i
					$arrayСountStepToCountCombinations[$currentArrayСountStepToCountCombinations][$i]=$massAlphabet[$y];//обратились к iтой ячейки подмассива и присвоили ей y-ковую букву алфавита.
					}
				}
			}
		}
	for ($currentCombinations=0;$currentCombinations<$countCombinations;$currentCombinations++)//от k=0 до количества комбинаций.
		{
		for ($currentStep=0;$currentStep<$countStep;$currentStep++)//цикл от нуля до длины комбинации
			{
			$arrayCombinations[$currentCombinations].=$arrayСountStepToCountCombinations[$currentStep][$currentCombinations];
			}
		}
	return $arrayCombinations;
	}
	?>