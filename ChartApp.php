<head>
	<style>
	body{
		font-family: 'Rubik', sans-serif;
	}
	button{
		border: none;
		height: 30px;
		box-shadow: -1px 1px grey;
		font-family: 'Rubik', sans-serif;
		margin: 4px 4px 4px 4px;
	}
	input[type=text]{
		border: none;
		height: 30px;
		background: #eee;
		border: solid 1px #aaa;
		font-family: 'Rubik', sans-serif;
	}
	input[type=datetime-local]{
		border: none;
		height: 30px;
		background: #eee;
		border: solid 1px #aaa;
		font-family: 'Rubik', sans-serif;
	}
	select{
		border: none;
		height: 30px;
		background: #eee;
		border: solid 1px #aaa;
		font-family: 'Rubik', sans-serif;
	}
	input[type=submit]{
		border: none;
		width: 100px;
		height: 30px;
		box-shadow: -1px 1px grey;
		color: white;
		background: #23b9f3;
		font-family: 'Rubik', sans-serif;
		margin: 4px 4px 4px 4px;
	}
	h3{
		margin-top:0px;
		margin-bottom:0px;
	}
	#chart{
		display: inline-block;
		width: 1000px;
		height: 700px;
	}
	#form{
		display: inline-block;
		margin-top: 20px;
		margin-left: 30px;
		vertical-align: top;
	}
	#channelList{
		overflow: auto;
		height: 150;
		width: 300;
		background: white;
	}
	#titleString{
		font: 26px sans-serif;
		text-align: center;
		vertical-align: middle;
		width: 940px;
	}
	#padding-div{
		height: 10px;
	}
	#export-buttons{
		margin-left: 30px;
	}
	#loading_bar{
		width : 300px;
		margin: 300px 400px 400px 350px;
		vertical-align: middle;
	}
	#logo_div {
		margin-bottom: 0px;
		text-align: bottom;
		width: 500px;
		margin-left: auto;
		margin-right: auto;
	}
	#logo_text {
		display: inline-block;
		margin-right: 30px;
		margin-top: 30px;
		vertical-align: top;
	}
	#logo {
		display: inline-block;
		vertical-align: middle;
		height: 75px;
	}
	h1{
		font-family: 'Lato', sans-serif;
	}
	</style>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
	<h1 style="margin-top:30px;">Chart Maker</h1>
	
	<div id="chart">
		<progress id="loading_bar"></progress>
		<div id="padding-div"></div>
		<div id="titleString" hidden> <?php echo $_POST["title"]; ?></div>
		<div id="logo_div" hidden>
			<h2 id="logo_text">Brought to you by</h2>
			<a href="http://www.shadowtv.com/"><img id="logo" src="shadowtv.logo.png"></img></a>
		</div>
	</div>
	
	<div id="form" style="display:none;">
		<form action="ChartApp.php" method="POST">
		
			Select channel(s): <span style="color:red;">*</span><br>
			<div id="channelList";>
				<input type="checkbox" name="channels[1]"   value=1   <?php if (array_key_exists(1,   $_POST["channels"])) {echo("checked");}?>>CNBC</input><br>
				<input type="checkbox" name="channels[2]"   value=2   <?php if (array_key_exists(2,   $_POST["channels"])) {echo("checked");}?>>NBC - New York</input><br>
				<input type="checkbox" name="channels[3]"   value=3   <?php if (array_key_exists(3,   $_POST["channels"])) {echo("checked");}?>>CNN</input><br>
				<input type="checkbox" name="channels[4]"   value=4   <?php if (array_key_exists(4,   $_POST["channels"])) {echo("checked");}?>>ABC - New York</input><br>
				<input type="checkbox" name="channels[5]"   value=5   <?php if (array_key_exists(5,   $_POST["channels"])) {echo("checked");}?>>CBS - New York</input><br>
				<input type="checkbox" name="channels[6]"   value=6   <?php if (array_key_exists(6,   $_POST["channels"])) {echo("checked");}?>>Fox - New York</input><br>
				<input type="checkbox" name="channels[8]"   value=8   <?php if (array_key_exists(8,   $_POST["channels"])) {echo("checked");}?>>C-SPAN</input><br>
				<input type="checkbox" name="channels[9]"   value=9   <?php if (array_key_exists(9,   $_POST["channels"])) {echo("checked");}?>>PBS</input><br>
				<input type="checkbox" name="channels[10]"  value=10  <?php if (array_key_exists(10,  $_POST["channels"])) {echo("checked");}?>>FOXNEWS</input><br>
				<input type="checkbox" name="channels[12]"  value=12  <?php if (array_key_exists(12,  $_POST["channels"])) {echo("checked");}?>>MSNBC</input><br>
				<input type="checkbox" name="channels[13]"  value=13  <?php if (array_key_exists(13,  $_POST["channels"])) {echo("checked");}?>>C-SPAN 2</input><br>
				<input type="checkbox" name="channels[15]"  value=15  <?php if (array_key_exists(15,  $_POST["channels"])) {echo("checked");}?>>Fox - Boston</input><br>
				<input type="checkbox" name="channels[16]"  value=16  <?php if (array_key_exists(16,  $_POST["channels"])) {echo("checked");}?>>CBS - Boston</input><br>
				<input type="checkbox" name="channels[17]"  value=17  <?php if (array_key_exists(17,  $_POST["channels"])) {echo("checked");}?>>ABC - Boston</input><br>
				<input type="checkbox" name="channels[18]"  value=18  <?php if (array_key_exists(18,  $_POST["channels"])) {echo("checked");}?>>NBC - Boston</input><br>
				<input type="checkbox" name="channels[21]"  value=21  <?php if (array_key_exists(21,  $_POST["channels"])) {echo("checked");}?>>ABC - Philadelphia</input><br>
				<input type="checkbox" name="channels[22]"  value=22  <?php if (array_key_exists(22,  $_POST["channels"])) {echo("checked");}?>>NBC - Philadelphia</input><br>
				<input type="checkbox" name="channels[23]"  value=23  <?php if (array_key_exists(23,  $_POST["channels"])) {echo("checked");}?>>CBS - Philadelphia</input><br>
				<input type="checkbox" name="channels[30]"  value=30  <?php if (array_key_exists(30,  $_POST["channels"])) {echo("checked");}?>>NBC - Washington</input><br>
				<input type="checkbox" name="channels[282]" value=282 <?php if (array_key_exists(282, $_POST["channels"])) {echo("checked");}?>>C-SPAN 3</input><br>
			</div><br>

			<select name="chart_type" onchange="changeForm()">
				<option value=0>Line chart</option>
				<option value=1>Bar graph</option>
			</select><br><br>

			Approximate date range (in UTC time) : <span style="color:red;" >*</span><br>
			From :                             <input id="startDate1" type="datetime-local" name="startDate1" value= <?php echo("\"".$_POST["startDate1"]."\"");?> required> <button onclick="set_startDate_now1()" type="button">Set to now</button><br><br>
			To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input id="endDate1"   type="datetime-local" name="endDate1"   value= <?php echo("\"".$_POST["endDate1"]."\"");?>   required> <button onclick="set_endDate_now1()"   type="button">Set to now</button><br><br>

			<div id="lineChartForm">
				Split data by:
				<input type = "radio" name="split_time_by" value=1  <?php if ($_POST["split_time_by"] == 1) {echo("checked");}?>>Hours
				<input type = "radio" name="split_time_by" value=24 <?php if ($_POST["split_time_by"] == 24){echo("checked");}?>> Days<br><br>
				Data:
				<input type = "radio" name="data_type" value="Count" <?php if ($_POST["data_type"] == "Count"){echo("checked");}?>> Count
				<input type = "radio" name="data_type" value="Average sentiment" <?php if ($_POST["data_type"] == "Average sentiment"){echo("checked");}?>> Average sentiment<br><br>
			</div>

			<div id="barChartForm" hidden>
				Graph style:
				<input type = "radio" name="chart_style" value=1 <?php if ($_POST["chart_style"] == 1){echo("checked");}?>> Grouped bars
				<input type = "radio" name="chart_style" value=0 <?php if ($_POST["chart_style"] == 0){echo("checked");}?>> Stacked bars<br><br>
				Number of results: <span style="color:red;" >*</span><br>
				<input type="number" name="num" value="<?php echo($_POST["num"]); ?>"><br><br>
				Extra stopwords (split with spaces):<br>
				<input type="text" name="extraStopWords" value="<?php echo("\"".$_POST["extraStopWords"]."\""); ?>"><br><br>
			</div>
			
			Searchwords (split with spaces): <span  id="temp" style="color:red;" >*</span><br>
			<input id="search_words" type="text" name="SearchWords" value=<?php echo("\"".$_POST["SearchWords"]."\""); ?> required><br><br>
			
			Title for graph:<br>
			<input type="text" name="title" value=<?php echo("\"".$_POST["title"]."\""); ?>><br><br>
			
			Include chart details:
			<input type="hidden"   name="include_details" value=0 />
			<input type="checkbox" name="include_details" value=1 <?php if ($_POST["include_details"] == 1){echo("checked");}?>><br><br>

			<input type="submit" value="Submit">
		</form>
	</div>
	
	<div id="export-buttons">
		<button onclick="make_img('png')"  type="button">Convert current graph to png</button>
		<button onclick="make_img('jpeg')" type="button">Convert current graph to jpeg</button>
	</div>

	<?php
		/* Initializing */
		//changing server settings
		set_time_limit(300);
		ini_set("memory_limit", "1024M"); // or you could use 1G
		date_default_timezone_set('UTC');

		//initalizing variables
		$channel_list = ["Blank", "CNBC", "NBC - New York", "CNN", "ABC - New York", "CBS - New York", "FOX - New York", "BLANK", "C-SPAN", "PBS", "FOXNEWS", "BLANK", "MSNBC", "C-SPAN 2", "BLANK", "FOX - Boston", "CBS - Boston", "ABC - Boston", "NBC - Boston", "BLANK", "BLANK", "ABC - Philadelphia", "NBC - Philadelphia", "CBS - Philadelphia"];
		$UTC = new DateTimeZone("UTC");
		$temp_token = login();

		//making variables from form data
		$start = new DateTime($_POST["startDate1"], $UTC);
		$start = $start->format("Y-m-d\TH:i:s.000\Z");
		$end = new DateTime($_POST["endDate1"], $UTC);
		$end = $end->format("Y-m-d\TH:i:s.000\Z");
		$search_words = [];
		$search_words = preg_split("/[\s,%?.-:>\"']+/", strtoupper($_POST["SearchWords"]));

		/*Start chart creation*/
		if($_POST["chart_type"] == 0){
			/* Line chart creation*/
			
			//setting up line chart specific variables
			$interval_value = 60 * 60 * $_POST["split_time_by"]; //is either 1 (single hour) or 24(single day)

			//write firstline to csv file (adds channel names and search words for the graph's legend)
			$fp = fopen("ChartApp.csv", "w");
			$terms = ["date"];
			$channel_and_words = [];
			foreach ($search_words as $search_word){
				foreach ($_POST["channels"] as $channel){
					$line_name = $channel_list[$channel]." ".$search_word;
					array_push($terms, $line_name);
					array_push($channel_and_words, $line_name);
				}
			}
			fputcsv($fp, $terms);
			fclose($fp);

			//write rest of lines to csv (adding the actual data for each search word on each channel)
			$fp = fopen("ChartApp.csv", "a");
			$num_of_data_points = abs(strtotime($start) - strtotime($end)) / $interval_value;
			$data_point_counter = 0;

			while($data_point_counter < $num_of_data_points){
				//creating variables for each data point
				
				//values: all the values collected (it is unordered)
				//temp_array: the ordered and completed result, it is pushed to the csv file
				$values = [];
				$temp_array = [];
			
				//temp_middle: middle of the interval being checked to be used by the x axis label
				if($interval_value > 60 * 60 * 2){ //check if the interval is days or hours
					//days
					$temp_middle = createTimeStamp($start, .5, 1, $data_point_counter, $interval_value);
				}
				else{
					//hours
					$temp_middle = createTimeStamp($start, .5, 2,$data_point_counter, $interval_value);
				}
				$temp_array[0] = $temp_middle;

				//temp_start: the start of the interval being checked
				$temp_start = createTimeStamp($start, 0, 0,$data_point_counter, $interval_value);

				//temp_end: the end of the interval being checked
				$temp_end = createTimeStamp($start, 1, 0, $data_point_counter, $interval_value);

				//check every search word over this interval 
				foreach ($search_words as $search_word){
					foreach(array_keys($_POST["channels"]) as $channel){
						$channel_and_word = $channel_list[$channel]." ".$search_word;
						if($_POST["data_type"] == "Count"){//check if the type of data you are supposed to collect is the word count or the average sentiment
							//word count
							$values[$channel_and_word] = createLineChartData($search_word, $temp_start, $temp_end, $channel, $temp_token);
						}
						else{
							//average sentiment
							$values[$channel_and_word] = createLineChartSentimentData($search_word, $temp_start, $temp_end, $channel, $temp_token);
						}
					}
				}

				//format data into csv line
				foreach ($channel_and_words as $line_name){
					if(array_key_exists($line_name, $values)){ //check if the word was said at all in this interval
						//said
						array_push($temp_array, $values[$line_name]);
					}
					else{
						//not said
						array_push($temp_array, 0);
					}
				}

				//put line into csv file
				fputcsv($fp, $temp_array);

				//iterate to next interval
				$data_point_counter = $data_point_counter + 1;
			}
		}
		else{
			/* Bar graph creation*/
			
			//Define Stopwords
			$stopWords = ['[',']','THE', 'ANNOUNCER', 'ALREADY', 'WELCOME', 'ASKED', 'LIKELY', 'THOUGH', 'SPEAK', 'ALMOST', 'TYPE', 'CENTER', 'CALLER', 'BECOME', 'FORAWRD', 'THEYVE', 'ALONG', 'HOST', 'ACT', 'MATTER', 'SECOND', 'ABSOLUTELY','ANYONE', 'TALKED', 'PRETTY', 'DATA', 'QUOTE', 'EFFECTS', 'BREAKING', 'DURING', 'COVERED', 'KNOWS', 'ALREADY', 'WORKS', 'CAMERAS', 'REASON', 'POSSIBLE', 'WOULDNT', 'ANYONE', 'ACTIONS', 'SEEMS', 'CLOSE', 'CALLING', 'NEEDS', 'POSSIBLE', 'CERTAINLY', 'SENSE', 'ACCORDING', 'INTERVIEW', 'M', 'EITHER', 'JOURNAL', 'PLATFORM', 'YORK', 'BUY', 'ISSUES', 'FUTURE', 'QUICKLY', 'BOARD', 'CHANGE',  'THREE', 'HANDS', 'NEEDED', 'YOUVE', 'MILLION', 'MISSED', 'OTHERS', 'CAPACITY', 'DAILY', 'ROAD', 'STRONGER', 'MAD', 'NOTE', 'CONTENT',  'SET', 'UNDERSTAND','BUILDING', 'FUN', 'RATES', 'SELL', 'WATCHING', 'PRESS', 'COURSE', 'WANTED', 'SECRET', 'JOSH', 'OBVIOUSLY', 'LESS', 'COUPLE', 'GETS', 'DAVID', 'MIDDLE', 'AHEAD', 'SORT', 'HUNDREDS', 'IDEA', 'CLEAR', 'OPEN', 'MOMENT', 'BRIEFING', 'TERMS', 'TERM', 'EXCHANGE', 'TRADING', 'JOINS', 'MAKES', 'RETURN', 'VALUE', 'MARKETS', 'PAID', 'BANK', 'CIALIS', 'GETS', 'TIM', 'BOX', 'PIECE', 'EARNINGS', 'SPONSORSHIP', 'COUPLE', 'INTEREST', 'KENNY', 'SINCE', 'WOMAN', 'END', 'NUMBERS', 'JIM', 'SMALL', 'SQUAWK', 'COMPLETE', 'POST', 'LEAVE', 'DEAL', 'COMPANIES', 'YESTERDAY', 'BELL', 'FINANCIAL', 'STOCK', 'COMPANY', 'JOBS', 'OPENING', 'KIDS', 'AREA', 'BILL', 'WIN', 'BLOOD', 'RACE', 'PAY', 'RUNNING', 'SITUATION', 'NOTHING', 'BRING', 'FACE', 'MONTHS', 'SERIOUS', 'HAPPENING', 'LATEST', 'QUESTIONS', 'CAUGHT', 'REACTION', 'HIT', 'WEEKS', 'BAD', 'TRAIL', 'MEDICAL', 'PUBLIC', 'PROBABLY', 'BREAK', 'OUTSIDE', 'ABLE', 'MINUTES', 'AMERICA', 'HAPPEN', 'BETWEEN', 'ONCE', 'FEDERAL', 'ACROSS', 'HEARD', 'AMERICANS', 'GOVERNOR', 'WASNT', 'TRAINING', 'HEART', 'COM', 'FOUND', 'REAL', 'ANYTHING', 'UNITED', 'WANTS', 'UNTIL', 'UNDER', 'EXACTLY', 'MIGHT', 'ROOM', 'SEARCH', 'JOINING', 'ISNT', 'REPORT', 'SUPPORT', 'GROUP', 'INCLUDING', 'ISSUE', 'HEARING', 'MONEY', 'TAKEN', 'PAST', 'HAND', 'LEAST', 'FACILITY', 'DEPARTMENT', 'PLUS', 'IMPORTANT', 'WORKED', 'LINE', 'TOOK', 'LATER', 'CHARGES', 'EVERYONE',  'PROBLEM', 'HOUR', 'BEHIND', 'TOGETHER', 'JOB', 'CALLED', 'LEFT', 'INFORMATION', 'COMES', 'SAME', 'TOLD', 'CALL', 'D', 'CUT', 'WHETHER', 'CAME' ,'GROUND','TALKING', 'STATES', 'AMERICAN', 'WITHOUT', 'FREE', 'AGAINST', 'FORMER','WOMEN', 'MEN', 'DOCTOR', 'COVERAGE', 'COUNTRY', 'USED','VICTOZA', 'LAW', 'POINT', 'POOL', 'SOMEBODY', 'PLAN', 'HUMIRA', 'CAMPAIGN', 'STATE', 'TIMES', 'STAY', 'WONT', 'EVERYTHING', 'ENOUGH', 'MYSELF', 'WISH', 'TOP', 'ENERGY', 'LAUGHS', 'MAKING', 'MAN', 'SECURITY', 'DING', 'HAIR', 'MMM', 'FACT', 'ROUND', 'PARTY', 'WORTH', 'HELPS', 'SLEEP', 'BOOK', 'EARLY', 'MONTH', 'PAIN', 'BOTH', 'LOCAL', 'FEELING', 'MAYBE', 'LOOKS', 'TV', 'NARRATOR', 'LEARN', 'DA', 'HOURS', 'PLANS', 'THOU', 'PHONE', 'BELIEVE', 'SKIN', 'NUMBER', 'HEAR', 'OWN', 'FOREVER', 'YET', 'PLACE',  'QUESTION', 'SOMEONE', 'EACH', 'HOO', 'THOUGHT', 'HEAR', 'FEET', 'F', 'BASE', 'POWER', 'FAR', 'HOT', 'PLAYING', 'DOESNT', 'INSIDE', 'R', 'P', 'FALL', 'TOOLS', 'EVERYBODY', 'ARMS', 'OHH', 'WHOLE', 'AINT', 'FRIENDS', 'AUDIENCE', 'CAUSE', 'MOVE', 'STARTED', 'HUH', 'BYE', 'BIT', 'RUN', 'SELF',  'CARE', 'EVEN', 'ANOTHER', 'BODY', 'EVER', 'OOH', 'KEEP','TRY', 'C', 'FRIEND', 'CITY', 'HIGH', 'FOOD', 'SIDE', 'O', 'LA','PLAY', 'CASE', 'HAPPENED', 'OK', 'STORY', 'NICE', 'BEST', 'GETTING', 'G', 'DOOR', 'LIVE', 'LONG', 'AWAY', 'REMEMBER', 'LAST', 'FIND', 'SYSTEM', 'HARD', 'CAR', 'HELP', 'STOP', 'MEAN', 'ASK', 'MOST', 'AGAIN', 'WAIT','LIFE', 'TEAM', 'WORLD', 'OLD', 'FAMILY', 'WORK', 'WORKING', 'NA', 'MR', 'FOUR', 'FIVE', 'SEVEN', 'EIGHT', 'NINE', 'TEN', 'BIG', 'LITTLE', 'MORNING', 'ALSO', 'U', 'GUY', 'A', 'YOULL', 'TO', 'AND', 'SHES', 'BETTER', 'SAYING', 'DOES', 'WHERE', 'OF', 'IN', 'FOR', 'WAS', 'ON', 'IS', 'THAT', 'IT', 'BE', 'SAYS', 'PERSON', 'THEY', 'WITH', 'YOU', 'THIS', 'WERE', 'WE', 'ARE', 'THEIR', 'I', 'AT', 'THEM', 'BUT', 'BY', 'YOUR', 'OUR', 'HAVE', 'MORE', 'FROM', 'ITS', 'ABOUT', 'NOT', 'HE', 'ALL', 'TONIGHT', 'NEWS', 'ONLY', 'AN', 'WILL', 'HAS', 'CAN', 'WHEN', 'THERE', 'AFTER', 'NOW', 'OUT', 'UP', 'WHO', 'NO', 'BEEN', 'SAY', 'HIS', 'GET', 'MY', 'KNOW', 'DO', 'WHAT', 'RIGHT', 'OVER', 'HAD', 'TODAY', 'OR', 'SO', 'IF', 'TOO', 'BACK', 'DONT', 'MAY', 'OTHER', 'HOW', 'WHY', 'THERES', 'FEW', 'SOME', 'WAY', 'US', 'THINK', 'STILL', 'REPORTER', 'NEW', 'ONE', 'AIR', 'PEOPLE', 'THAN', 'MANY', 'LIKE', 'DAYS', 'IM', 'THANK', 'YES', 'GONNA', 'OH', 'ME', 'APPLAUSE', 'JUST', 'WELL', 'REALLY', 'YOURE', 'THATS', 'GOOD', 'SEE', 'GO', 'AM', 'GREAT', 'JUST', 'GOING', 'YEAH', 'LOOK', 'WHATS', 'DID', 'HES', 'WOW', 'BEFORE', 'HI', 'TAKE', 'SOMETHING', 'COME', 'NAME', 'BE', 'DAY', 'B', 'COULD', 'WOULD', 'FEEL', 'TIME', 'IVE', 'TELL', 'SAID', 'MUCH', 'SURE', 'CANT', 'ILL', 'SEEN', 'DONE', 'DOING', 'ID', 'SHOULD', 'WANT', 'NEVER', 'GIVE', 'BECAUSE', 'DOWN', 'LOOKING', 'WHOO', 'VERY', 'GUYS', 'WATCH', 'AS', 'HEY','NEXT', 'TAKES', 'LETS', 'WHOA', 'GOT', 'WEEK', 'THING', 'HERE', 'NEED', 'THOSE', 'INTO', 'FIRST', 'SHOW', 'MAKE', 'READY', 'HER', 'ER', 'THEN', 'THEYRE', 'WHILE', 'S', 'SHE', 'EVERY', 'PUT', 'OKAY', 'HAVING', 'HOLD', 'AROUND', 'THANKS', 'TAKING', 'SUCH', 'E', 'T', 'ALWAYS', 'NIGHT', 'ONE', 'TWO', 'LOT', 'SAW', 'WHICH', 'HIM', 'WENT', 'COMING', 'OFF', 'THROUGH', 'YOURSELF', 'THINGS', 'MADE', 'PART', 'BEING', 'HELLO', 'ND', 'THESE', 'N', 'ELSE', 'TH', 'STARTS', 'AGO', 'TALK', 'DIDNT', 'ANY', 'USE', 'ANY', 'ACTUALLY', 'MUST', 'WEVE','LET', 'RE'];
			//$stopWords = ['[',']','THE', 'TO', 'AND', 'A', 'OF', 'IN', 'THAT', 'IS', 'IT', 'FOR','ON', 'ARE', 'HAVE', 'THIS', 'WAS', 'AT', 'WITH', 'BE', 'WHAT', 'SO', 'AS', 'ITS', 'NOT', 'DO', 'BUT', 'THERE', 'YOU', 'YOUR', 'I', 'WE', 'HE', 'SHE', 'HER', 'HIM', 'THEY'];
			
			//Add extra stop words from User input
			$extraStopWords = preg_split("/[\s]+/", strtoupper($_POST["extraStopWords"]));
			$stopWords = array_merge($stopWords, $extraStopWords);

			//Get Text blocks from API (returns one array perchannel, arrays contain text block from whole range).
			$results = createBarChartData($temp_token);

			//Calculate Top Ten Words for channels and in general (in general so that I can order the bars by overall occurence count)
			//Count word occurences in text blocks (split text blocks into arrays and then loop through the arrays)
			$dict = [];
			$channel_counts = [];
			foreach($results as $result){
				//split textblock into array
				$channel_dict = [];
				$text = preg_replace("/[-:|$,%?.-:>\"']+/", "", $result);
				$words = preg_split("/[\s,%?.-:>\"']+/", $text);

				//loop through array and count word occurences
				foreach ($words as $word){
					if($search_words[0] == "" || in_array($word, $search_words)){
						if (!in_array($word, $stopWords)){
							//add to overall count
							if(array_key_exists($word, $dict)){
								$dict[$word] = $dict[$word] + 1;
							}
							else{
								$dict[$word] = 1;
							}
							//add to specific channel count
							if(array_key_exists($word, $channel_dict)){
								$channel_dict[$word] = $channel_dict[$word] + 1;
							}
							else{
								$channel_dict[$word] = 1;
							}
						}
					}
				}
				//push to array which will be written to csv
				array_push($channel_counts, $channel_dict);
			}

			//sort and slice overall dictionary to get overall top ten words
			arsort($dict, SORT_NUMERIC);
			$dict = array_slice($dict, 0, $_POST["num"]); 

			//start writing data to csv file
			$fp = fopen('ChartApp.csv', 'w');

			//write firstline (channel names and searchwords for the graph's legend)
			$terms = ["index","nameterm"];
			foreach ($_POST["channels"] as $channel){
				array_push($terms, $channel_list[$channel]);
			}
			fputcsv($fp, $terms);
			
			//write the rest of the lines to csv (the actual data)
			$counter = 1;
			foreach($dict as $key => $value) {
				$values = [$counter,$key];
				foreach ($channel_counts as $c_count){
					if (array_key_exists($key, $c_count)){ //check if this channel had occurences of the word at all
						//had occurences
						array_push($values, $c_count[$key]);
					}
					else{
						//no occurences
						array_push($values, "0");
					}
				}
				//write line to file and increment
				fputcsv($fp, $values);
				$counter = $counter + 1;
			}
		}

		/*Helper functions*/
		
		function login(){
			/*outputs a token to use with other shadowtv reperio API functions*/
			
			// create curl resource
			$ch = curl_init();
			// login
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api.shadowtv.net/reperio/login");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = array("username" => "shadowtv", "password" => "630ninth");
			$data_string = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
			);
 
 			//close curl resource to free up system resources and then return output
			$output = json_decode(curl_exec($ch));
			curl_close($ch);
			return $output->{'token'};
		}

		function createBarChartData($token){
			/*returns a large text block from form variables, will be counted to create bar chart data*/
			
			// create curl resource
			$ch = curl_init();
			$texts = [];
			foreach ($_POST["channels"] as $channel){
				$text = "";
				$UTC = new DateTimeZone("UTC");
				$interval = new DateInterval('PT1H');

				//divide range by hours
				$daterange = new DatePeriod(new DateTime($_POST['startDate1'], $UTC), $interval ,new DateTime($_POST['endDate1'], $UTC));
				foreach($daterange as $datetime){
					$url = "http://api.shadowtv.net/reperio/v1/captions/".$channel."/".$datetime->format('Y-m-d\TH:i:s').".000Z/3599?include=captions,body";
					curl_setopt($ch, CURLOPT_URL, $url );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Authorization: '.$token)
					); 
					$text .= " ";
					$text .= json_decode(curl_exec($ch))->{'body'};
				}

				//divide last hour into minutes
				$interval = new DateInterval('PT1M');
				$End = new DateTime($_POST['endDate1'], $UTC);
				$minuteStart = new DateTime($_POST['startDate1'], $UTC);
				$diffInterval = $minuteStart->diff($End);
				$hours = $diffInterval->h;
				$minuteStart->add(new DateInterval('PT'.$hours.'H'));
				$daterange = new DatePeriod($minuteStart, $interval ,new DateTime($_POST['endDate2'], $UTC));
				foreach($daterange as $datetime){
					$url = "http://api.shadowtv.net/reperio/v1/captions/".$channel."/".$datetime->format('Y-m-d\TH:i:s').".000Z/60?include=captions,body";
					curl_setopt($ch, CURLOPT_URL, $url );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Authorization: '.$token)
					);
					$text .= " ";
					$text .= json_decode(curl_exec($ch))->{'body'};
				}
				array_push($texts, strtoupper($text));
			}
			
			// close curl resource to free up system resources 
			curl_close($ch); 
			return $texts;
		}

		function createLineChartData($query, $lowerDate, $upperDate, $channels, $token){
			/*returns an array of hit results for the search term
			  All parameters are needed, $query is just a string of the query (only single query words allowed)
			  $lowerdate and $upperdate should be in "yyy-MM-dd'T'HH:mm:ss.SSS'Z'" format
			  $channels should be an array of each channel number
			  $token is just the token string
			*/
			
			// create curl resource
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api.shadowtv.net/reperio/v1/search");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = array("query" => $query, "filter" => ["channels" => [$channels]], "dateRange" => ["lowerDateUTC" => $lowerDate, "upperDateUTC" => $upperDate]);
			$data_string = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string),
				'Authorization: '.$token)
			);
			$output = json_decode(curl_exec($ch));
			
			// close curl resource to free up system resources
			curl_close($ch);
			$expected_hits_count = (2 * $output->{'hitCount'});
			return $output->{'hitCount'};
		}

		function createLineChartSentimentData($query, $lowerDate, $upperDate, $channels, $token){
			/*returns an array of hit results for the search term
			  All parameters are needed, $query is just a string of the query (only single query words allowed)
			  $lowerdate and $upperdate should be in "yyy-MM-dd'T'HH:mm:ss.SSS'Z'" format
			  $channels should be an array of each channel number
			  $token is just the token string
			*/
			
			// create curl resource
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api.shadowtv.net/reperio/v1/search");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = array("query" => $query, "filter" => ["channels" => [$channels]], "dateRange" => ["lowerDateUTC" => $lowerDate, "upperDateUTC" => $upperDate], "documentSize" => 5);
			$data_string = json_encode($data);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string),
				'Authorization: '.$token)
			);
			$output = json_decode(curl_exec($ch));

			// close curl resource to free up system resources
			curl_close($ch);
			
			//get sentiments
			$hits = $output->{'hits'};
			$sentiments = [];
			require_once __DIR__ . '/phpInsight-master/autoload.php';
			$sentiment = new \PHPInsight\Sentiment();

			//check sentiment for each hit
			foreach ($hits as $hit){
				array_push($sentiments, ($sentiment->score($hit->{'body'})['pos'] + (-1 * $sentiment->score($hit->{'body'})['neg'])));
			}
			
			return array_sum($sentiments) / max(1,count($sentiments));
		}

		function createTimeStamp($start, $addition, $format, $data_point_counter, $interval_value){
			/*formats a time into a timestamp based on the specified interval*/
			
			$UTC = new DateTimeZone("UTC");
			$time_setter = new DateTime('0000-00-00T00:00', $UTC);
			$temp_stamp = strtotime($start) + ($interval_value * ($data_point_counter + $addition));
			$temp_stamp = $time_setter->setTimestamp($temp_stamp);
			if($format == 0){
				$temp_stamp = $temp_stamp->format('Y-m-d\TH:i:s.000\Z');
			}
			else{ if($format == 1){
					//interval is days
					$temp_stamp = $temp_stamp->format('Ymd');
				}
				else{
					//interval is hours
					$temp_stamp = $temp_stamp->format('Ymd\TH');
				}
			}
			return $temp_stamp;
		}
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script src="./d3/d3.js"></script>
	<script src="ChartApp.js"></script>
	<script src="ChartLineApp.js"></script>
	<script type="text/javascript" src="html2canvas.js"></script>
	<script type="text/javascript" src="html2canvas.svg.js"></script>
	<script type="text/javascript">
		/* Button functions */
		
		//change form between bar chart or line graph
		var changeForm = function(){
			$( "#barChartForm" ).toggle();
			$( "#temp" ).toggle();
			$( "#lineChartForm" ).toggle();

			//toggle search_words
			if($("#search_words").prop('required')){
				$("#search_words").prop('required', false);
			}
			else{
				$("#search_words").prop('required', true);
			}
		}

		//convert current chart to an image
		var make_img = function(input) {
			html2canvas($("#chart"), {
				onrendered: function(canvas) {
					theCanvas = canvas;
					document.body.appendChild(canvas);

					// Convert and download as image
					$("#img-out").append(canvas);
					var img = canvas.toDataURL("image/"+input+";base64;");
					window.open(img,"","width=1000,height=700");
					// Clean up
					document.body.removeChild(canvas);
				},
				background: "white"
			});
		}

		var set_startDate_now1 = function() {
			document.getElementById('startDate1').value = new Date().toISOString().slice(0,-8);
		}
		
		var set_endDate_now1 = function() {
			document.getElementById('endDate1').value = new Date().toISOString().slice(0,-8);
		}

		/*Initializing functions*/
		
		//loading functions (making everything appear after the loading finishes)
		$( "#form" ).toggle();
		$( "#loading_bar" ).toggle();
		$( "#logo_div" ).toggle();
		$( "#titleString" ).toggle();
		var y_text = "<?php echo($_POST["data_type"]); ?>";
		//check if chart details should appear
		if(<?php echo($_POST["include_details"]); ?> > 0){
			$("#logo_div").after("<h3> Chart Details </h3><br> StartDate: "+String(<?php echo("\"".$_POST["startDate1"]."\""); ?>)+"<br>EndDate: "+String(<?php echo("\"".$_POST["endDate1"]."\""); ?>)+"<br>Search Words: "+String(<?php echo("\"".$_POST["SearchWords"]."\""); ?>)+"<br><br>");
		}
		
		//check what the initial type of chart form should be, based on the last result
		if ( <?php echo($_POST["chart_type"]); ?> == 1){$("select").val('1'); changeForm();}
		
		//create chart based off submitted form selection
		if(<?php echo($_POST["chart_type"]); ?> == 0){
			if(<?php echo($_POST["split_time_by"]); ?> > 2){
				make_line_chart(y_text);
			}
			else{
				make_hourly_line_chart(y_text);
			}

		}
		else{
			if(<?php echo($_POST["chart_style"]); ?> > 0){
				make_bar_chart();
			}
			else{
				make_stacked_bar_chart();
			}
		}
	</script>
</body>