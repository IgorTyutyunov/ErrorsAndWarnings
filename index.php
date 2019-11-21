<?php 

function checkCombination($combination,$error,$warning){
//функция определяет исправляет ли все ошибки и предупреждения комбинация шагов $combination.
//$combination это строка вида 'abcbcacba'.
//$error,$warning - это количество ошибок и предупреждений.
//шаг 'a'- исправляет 1W -> получает 2W
//шаг 'b'- исправляет 2W -> получает 1E
//шаг 'c'- исправляет 2E -> ничего не получает.
	$stepB=0;
	$stepC=0;
	if($warning>=3){
		$stepB+=(int)$warning/2;
		$error+=$stepB;
		$warning=$warning%2;
	}
	
	if($error>=3){
		$stepC+=(int)$error/2;
		$error=$error%2;
	}
	
	$countStep=strlen($combination);
	for($j=0;$j<$countStep;$j++){
		switch($combination[$j]){
			case 'a':
				$warning+=1;
			break;
			case 'b':
				$warning+=-2;
				$error+=1;
			break;
			case 'c':
				$error+=-2;
			break;
		}
		if($error<0 || $warning<0)
			break;
	}
	if($error==0 && $warning==0){
		return $countStep;
	}
	else
		return -1;
	 
};
echo repitShift(9,['a','b','c'],3,3);
 
 
 
function repitShift($countStep, $massAlphabet, $error, $warning)
	{
			//$countStep - длина комбинации, то есть количество шагов (длина комбинации указывает на количество подмассивов в массиве arrayСountStepToCountCombinations)
			//$massAlphabet - массив символов
			//$error - количество ошибок
			//$warning - количество предупреждений
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
				for($r=0;$r<(pow($countCharactersInAlphabet,$currentArrayСountStepToCountCombinations));$r++)//цикл от 0 до количества символов в степени номера шага. Тут решаем, сколько нам нужно записать конкретных символов.
					{
					$i++;//инкрементировали $i
					$arrayСountStepToCountCombinations[$currentArrayСountStepToCountCombinations][$i]=$massAlphabet[$y];//обратились к iтой ячейки подмассива и присвоили ей y-ковую букву алфавита.
					}
				}
			}
		}
	for ($currentCombinations=0;$currentCombinations<$countCombinations;$currentCombinations++)//Перебираем все комбинации
		{
		for ($currentStep=0;$currentStep<$countStep;$currentStep++)//формируем шаги комбинации и помещаем комбинацию в массив arrayCombinations
			{
			$arrayCombinations[$currentCombinations].=$arrayСountStepToCountCombinations[$currentStep][$currentCombinations];
			}
			if(checkCombination($arrayCombinations[$currentCombinations],$error,$warning)!=-1)
				return $arrayCombinations[$currentCombinations];
		}
	return -1;
	}
	?>