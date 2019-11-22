<?php 
 function fixErrorAndWarning($error,$warning){
	 $arr=array();
	 $countStepB=0;
	 $countStepC=0;
	 $totalStep=0;
	 $countStepB=(int)($warning/2);//1. Количеству шагов, типа B, присваиваем целую часть от деления на 2 количества предупреждений.
	 $warning=$warning%2;//Количество предупреждений приравниваем к остатку от деления количества предупреждений на два.
	 $error=$error+$countStepB;//Увеличиваем количество ошибок на количество шагов типа B.
	 $countStepC=(int)($error/2);//увеличиваем количетво шагов типа C на целую часть от деления количества ошибок.
	 $error=$error%2;//количество ошибок приравниваем к остатку от деления количества ошибок на два.
	 $totalStep=$countStepB+$countStepC;//Суммируем количество шагов типа B и C и получаем общее количество шагов.
 if($error==0 && $warning==1){
	 $totalStep+=6;
	 $arr[0]=$totalStep;
	 $arr[1]=$countStepB;
	 $arr[2]=$countStepC;
	 $arr[3]='A>>B>>A>>A>>B>>C=>избавились от ошибок и предупреждений!';
	 return $arr;
 }
 if($error==1 && $warning==1){
	 $totalStep+=3;
	 $arr[0]=$totalStep;
	 $arr[1]=$countStepB;
	 $arr[2]=$countStepC;
	 $arr[3]='A>>B>>C=>избавились от ошибок и предупреждений!';
	 return $arr;
 }
 if($error==0 && $warning==0){
	 $arr[0]=$totalStep;
	 $arr[1]=$countStepB;
	 $arr[2]=$countStepC;
	 $arr[3]='=>избавились от ошибок и предупреждений!';
	 return $arr;
 }
 if($error==1 && $warning==0){
	 $totalStep+=4;
	 $arr[0]=$totalStep;
	 $arr[1]=$countStepB;
	 $arr[2]=$countStepC;
	 $arr[3]='A>>A>>B>>C=>избавились от ошибок и предупреждений!';
	 return $arr;
 }
 }
	?>
