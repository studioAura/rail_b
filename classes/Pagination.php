<?php 
class Pagination{
	//Блок переменных достуных только внутри класса .
	private $SQL_SETTING; // Параметры подключения к БД.
	private $CONNECT; //Указатель на соединение с MySQL.
	private $COUNTRECORD; //Количество выводимых записей на странице.
	private $SQL; // Исходный SQL запрос.
	private $NUMBERPAGE; //Номер текущей страницы.
	private $VIEWALL; //Флаг - показать все страницы. 
	private $PARAMNAME; //Имя параметра в GET запросе например "page".
	private $LINKCOUNT; //количество выводимых ссылок на страницы в пайджере.
	private $PAGINATOR; //сформировананный навигатор, готовый к выводу.
	// конструктор класса
	public function  __construct($arr,$sql){
		foreach($arr[0] as $attr=>$val){ //Проверяем всели необходимые параметры подключения к БД переданы.
			if(strlen(trim($val))==0 && $attr!='password') return false;// если один из параметров не передан, завершаем работу.
		}
		
		//инициализируем переменные класса
		$this->SQL_SETTING=$arr[0];//Записываем в переменную класса настройки для подключения.
		$this->SQL=$sql;//Записываем в переменную исходный запрос.
		$this->COUNTRECORD=$arr[1]['countRecordOnPage'];//Записываем в переменную класса количество выводимых записей на странице
		$this->NUMBERPAGE=$arr[1]['numberPage'];//Записываем в переменную класса номер текущей страницы.
	    $this->VIEWALL=$arr[1]['viewAll'];//Записываем в переменную флаг "Показать все".
		$this->PARAMNAME=$arr[1]['paramName'];
		$this->LINKCOUNT=$arr[1]['linkCount'];
        
		//инициализируем соединение с БД
		if($this->initConectionBD()){ //если соединение успешно установленно
			if(!$this->VIEWALL) $this->calcDataPage();// если нет влага "Показать все", вычисляем позицию нужной страницы
			$this->PAGINATOR=$this->getPage();
			mysql_close($this->CONNECT);
		}
		else return false;
		
		return true;
	} 
	
	public function getPagination(){
	
		return $this->PAGINATOR; 
	}

	private function initConectionBD(){
		// если удаоль подключиться к БД
		if($this->CONNECT=@mysql_connect($this->SQL_SETTING['host'],$this->SQL_SETTING['user'],$this->SQL_SETTING['password']))
		{
			//выбираем таблицу для дальнейшей работы
			if(mysql_select_db($this->SQL_SETTING['name_bd'], $this->CONNECT) or die(mysql_error())) return true;
		}
		else{
		 echo "Ошибка подключения к БД!";
		}
			
		return false; //если что - то пошло не так , возвращаем false 
	}
	
	
	private function calcDataPage(){
	
		$result = mysql_query($this->SQL) or die (mysql_error());// выполняем исходный запрос к БД 
		$count=mysql_numrows($result); //узнаем количество возвращенных записей
		$maxCountRecOnPage=ceil($count/$this->COUNTRECORD);//Вычисляем максимально доступное количество страниц
		$this->maxCountRecOnPage=$maxCountRecOnPage;
		if($maxCountRecOnPage<=($this->NUMBERPAGE-1)){ // если максимальное количество страниц меньше чем номер запрашиваемой			$pos=$maxCountRecOnPage-1;
				$pos=$maxCountRecOnPage-1; // то запросим у MySql последнюю доступную страницу
			}	
		elseif(0>=($this->NUMBERPAGE-1)){ //если номер запрашиваемой страницы, меньше либо равен 0
					$pos=0; //то запросим у MySql первую доступную страницу
				}		
			else{ // если запрашиваемая страница попадает в диапазон существующих
					$pos=$this->NUMBERPAGE-1; //то запросим у MySql нужную страницу
				}	
		
		// к запросу дописываем параметр вывода записей с нужной позиции, и их количесвто
		
		
		$this->SQL=$this->SQL." LIMIT ".$pos*$this->COUNTRECORD.", ".$this->COUNTRECORD;
		echo $this->SQL;
	}
	
	//получаем страницу, и выводим ее
	private function getPage(){
		$result = mysql_query($this->SQL) or die (mysql_error());// выполняем запрос к БД		
		$table = "<table border='1'>";	// начинаем формировать таблицу, для вывода полученных данных
		if($row = mysql_fetch_assoc($result)){// получаем первую строку данных		
		$table .= "<tr>";		
		foreach(array_keys($row)as $theader){ // для каждого поля создаем заголовок в таблице
			$table .= "<th>".$theader."</th>";
		}		
		$table .= "</tr>";		
		$table .= "<tr>";			
		foreach($row as $data){//также добавляем полученную строку данных в соответствующие поля таблицы 
		$table .= "<td>".$data."</td>";
		}
		$table .= "</tr>";			
		}
		while ($row = mysql_fetch_assoc($result)){//все оставшиеся строки, добавляем в таблицу 
			
			$odd++%2==0? $odd_class="odd":$odd_class=""; 
			$table .= "<tr class='".$odd_class."'>";			
			foreach($row as $data){
				$table .= "<td>".$data."</td>";
			}		
			$table .= "</tr>";
		}		
		$table .= "</table> ";		
		$page .= $table;
		if(!$this->VIEWALL) $page .= $this->createPagination(); //К странице конкатенируем пагинацию

		return $page;
	}
	
	
	private function createPagination(){
		//формирование  навигатора		
		//если текущая страница, выходит за рамки допустимых, то показываем первую доступную с нужной стороны.
		if($this->NUMBERPAGE<=0)$this->NUMBERPAGE=1; // если текущая страница меньше первой то показываем всегда перву.
		if($this->NUMBERPAGE>$this->maxCountRecOnPage)$this->NUMBERPAGE=$this->maxCountRecOnPage;// если текущая страница больше последней то показываем всегда последнюю.
		
		//создаем кнопки для навигатора
		if($this->NUMBERPAGE>1){ // если не первая страница
		$prev="<a class='nav_button' href='?".$this->PARAMNAME."=".($this->NUMBERPAGE-1)."'><</a>";// создаем сслыку на предыдущую
		$first="<a class='nav_button' href='?".$this->PARAMNAME."=1'><<</a>";	// создаем сслыку на первую
		}
		if($this->NUMBERPAGE<$this->maxCountRecOnPage){ // если не последняя страница
		$next="<a class='nav_button' href='?".$this->PARAMNAME."=".($this->NUMBERPAGE+1)."'>></a>";// создаем сслыку на следующую
		$last="<a class='nav_button' href='?".$this->PARAMNAME."=".$this->maxCountRecOnPage."'>>></a>";// создаем сслыку на последнюю
		}
		
		//средняя часть навигатора , вывод ссылок по половине от общего числа выводимых, по обе стороны текущей страницы
			for($i=($this->NUMBERPAGE-floor($this->LINKCOUNT/2)); $i<=($this->NUMBERPAGE+floor($this->LINKCOUNT/2)); $i++){
				$class="linkPage"; //всем ссылкам назначается класс
				if($i==$this->NUMBERPAGE)$class="activ"; //если ссылка идет на текущую то ей присваивается особый класс
				if($i<=0){ // формирование ссылок на добавочные с конца страницы 				
				$lastpages="<a class='".$class."' href='?".$this->PARAMNAME."=".(abs($i)+$this->NUMBERPAGE+floor($this->LINKCOUNT/2)+1)."'>".(abs($i)+$this->NUMBERPAGE+floor($this->LINKCOUNT/2)+1)."</a>".$lastpages;
				$leftpoint=""; //если начали добавлять  страницы, убираем точки с другого конца
				$noleftpoint=true;// флаг о том что точки слева убраны			
				}
				if($i>$this->maxCountRecOnPage){ // формирование ссылок на добавочные с начала страницы 
				$firstpages="<a class='".$class."' href='?".$this->PARAMNAME."=".abs($i-$this->maxCountRecOnPage-$this->NUMBERPAGE+floor($this->LINKCOUNT/2))."'>".abs($i-$this->maxCountRecOnPage-$this->NUMBERPAGE+floor($this->LINKCOUNT/2))."</a>".$firstpages;
				$norightpoint=true;//если начали добавлять  страницы, убираем точки с другого конца
				$rightpoint="";// флаг о том что точки справа убраны
				}
			
				if($i>0 && $i<=$this->maxCountRecOnPage){ //если формируемая ссылка попадает в интервал допустимых страниц 
				if(!$noleftpoint)$leftpoint="<span class='point'>...</span>"; //добавляем точки слева от списка
				$pager.="<a class='".$class."' href='?".$this->PARAMNAME."=".$i."'>".$i."</a>";//создаем ссылку
				if(!$norightpoint)$rightpoint="<span class='point'>...</span>"; //добавляем точки справа от списка
				}
			}
		//склеиваем все сгенерированные части навигатора
		$navigator=$first.$prev.$leftpoint.$firstpages.$pager.$lastpages.$rightpoint.$next.$last;
		// возвращаем полученный список страниц
		return $navigator;
	}
}		