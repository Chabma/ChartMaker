<head>
	<style>
	h3{
		margin-top:0px;
		margin-bottom:0px;
	}
	#chart{
		display: inline-block;
		width: 1000px;
		height: 800px;
	}
	#form{
		display: inline-block;
		margin-top: 20px;
		margin-left: 30px;
		vertical-align: top;
	}
	#channelList{
		overflow: scroll;
		height: 150; 
		width: 300;
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
	
	</style>
</head>
<body>
	<div id="chart">
		<progress id="loading_bar"></progress>
		<div id="padding-div"></div>
		<div id="titleString" hidden> <?php echo $_POST["title"]; ?></div>
		<div id="logo_div" hidden>
			<h2 id="logo_text"> Brought To You By</h2>
			<img id="logo" src="shadowtv.logo.png"></img>
		</div>
	</div>
	<div id="form" style="display:none;">
		<form action="ChartApp.php" method="POST">
			Select Channels:<br>
			<div id="channelList";>
				<input type="checkbox" name="channels[1]" value=1     <?php if ($_POST["channels"][1]){echo("checked");}?> >CNBC<br>
				<input type="checkbox" name="channels[2]" value=2     <?php if ($_POST["channels"][2]){echo("checked");}?>>NBC - New York<br>
				<input type="checkbox" name="channels[3]" value=3     <?php if ($_POST["channels"][3]){echo("checked");}?>>CNN<br>
				<input type="checkbox" name="channels[4]" value=4     <?php if ($_POST["channels"][4]){echo("checked");}?>>ABC - New York<br>
				<input type="checkbox" name="channels[5]" value=5     <?php if ($_POST["channels"][5]){echo("checked");}?>>CBS - New York<br>
				<input type="checkbox" name="channels[6]" value=6     <?php if ($_POST["channels"][6]){echo("checked");}?>>Fox - New York<br>
				<input type="checkbox" name="channels[8]" value=8     <?php if ($_POST["channels"][8]){echo("checked");}?>>C-SPAN<br>
				<input type="checkbox" name="channels[9]" value=9     <?php if ($_POST["channels"][9]){echo("checked");}?>>PBS<br>
				<input type="checkbox" name="channels[10]" value=10   <?php if ($_POST["channels"][10]){echo("checked");}?>>FOXNEWS<br>
				<input type="checkbox" name="channels[12]" value=12   <?php if ($_POST["channels"][12]){echo("checked");}?>>MSNBC<br>
				<input type="checkbox" name="channels[13]" value=13   <?php if ($_POST["channels"][13]){echo("checked");}?>>C-SPAN 2<br>
				<input type="checkbox" name="channels[15]" value=15   <?php if ($_POST["channels"][15]){echo("checked");}?>>Fox - Boston<br>
				<input type="checkbox" name="channels[16]" value=16   <?php if ($_POST["channels"][16]){echo("checked");}?>>CBS - Boston<br>
				<input type="checkbox" name="channels[17]" value=17   <?php if ($_POST["channels"][17]){echo("checked");}?>>ABC - Boston<br>
				<input type="checkbox" name="channels[18]" value=18   <?php if ($_POST["channels"][18]){echo("checked");}?>>NBC - Boston<br>
				<input type="checkbox" name="channels[21]" value=21   <?php if ($_POST["channels"][21]){echo("checked");}?>>ABC - Philadelphia<br>
				<input type="checkbox" name="channels[22]" value=22   <?php if ($_POST["channels"][22]){echo("checked");}?>>NBC - Philadelphia<br>
				<input type="checkbox" name="channels[23]" value=23   <?php if ($_POST["channels"][23]){echo("checked");}?>>CBS - Philadelphia<br>
				<input type="checkbox" name="channels[30]" value=30   <?php if ($_POST["channels"][30]){echo("checked");}?>>NBC - Washington<br>
				<input type="checkbox" name="channels[282]" value=282 <?php if ($_POST["channels"][282]){echo("checked");}?>>C-SPAN 3<br>
				
				
			</div><br>
  
			<select name="chart_type" onchange="changeForm()">
				<option value=0>Search Word Use Over Time</option>
				<option value=1>Find Top N words</option>
			</select><br><br>
   
			<div id="lineChartForm">
				Split Data By:
				<input type = "radio" name="split_time_by" value=1 <?php if ($_POST["split_time_by"] == 1){echo("checked");}?>> Hours
				<input type = "radio" name="split_time_by" value=24 <?php if ($_POST["split_time_by"] == 24){echo("checked");}?>> Days<br><br>
				Data: 
				<input type = "radio" name="data_type" value="count" <?php if ($_POST["data_type"] == "count"){echo("checked");}?>> Count
				<input type = "radio" name="data_type" value="sentiment" <?php if ($_POST["data_type"] == "sentiment"){echo("checked");}?>> Average Sentiment<br><br>
			</div>
			
			Approximate Date Range (In UTC Time):<br>
				From : <input id="startDate1" type="datetime-local" name="startDate1" value= <?php echo("\"".$_POST["startDate1"]."\""); ?> required> <button onclick="set_startDate_now1()" type="button">Set to now</button><br><br>
				To&nbsp;&nbsp;&nbsp;&nbsp; : <input id="endDate1" type="datetime-local" name="endDate1" value= <?php echo("\"".$_POST["endDate1"]."\""); ?> required> <button onclick="set_endDate_now1()" type="button">Set to now</button><br><br>
				
			<div id="barChartForm" hidden>
				Graph Style: 
				<input type = "radio" name="chart_style" value=1 <?php if ($_POST["chart_style"] == 1){echo("checked");}?>> Grouped Bars
				<input type = "radio" name="chart_style" value=0 <?php if ($_POST["chart_style"] == 0){echo("checked");}?>> Stacked Bars<br><br>
				Number of Results:<br>
				<input type="number" name="num" value="<?php echo($_POST["num"]); ?>"><br><br>
				Extra StopWords (split with spaces):<br>
				<input type="text" name="extraStopWords" value="<?php echo("\"".$_POST["extraStopWords"]."\""); ?>"><br><br>
			</div>
			SearchWords (split with spaces):<br>
			<input id="search_words" type="text" name="SearchWords" value=<?php echo("\"".$_POST["SearchWords"]."\""); ?> required><br><br>
			Title for Graph:<br>
			<input type="text" name="title" value=<?php echo("\"".$_POST["title"]."\""); ?>><br><br>
			Include Chart Details:
			<input type="hidden" name="include_details" value=0 />
			<input type="checkbox" name="include_details" value=1 <?php if ($_POST["include_details"] == 1){echo("checked");}?>><br><br>

			<input type="submit" value="Submit">
		</form>
	</div>
	<div id="export-buttons">
		<button onclick="make_png()" type="button">convert current graph to png</button>
		<button onclick="make_jpeg()" type="button">convert current graph to jpeg</button>
	</div>
	<?php

		//changing server settings
		set_time_limit(300);
		ini_set("memory_limit", "1024M"); // or you could use 1G

		//creating variables
		$channel_list = ["Blank", "CNBC", "NBC - New York", "CNN", "ABC - New York", "CBS - New York", "FOX - New York", "BLANK", "C-SPAN", "PBS", "FOXNEWS", "BLANK", "MSNBC", "C-SPAN 2", "BLANK", "FOX - Boston", "CBS - Boston", "ABC - Boston", "NBC - Boston", "BLANK", "BLANK", "ABC - Philadelphia", "NBC - Philadelphia", "CBS - Philadelphia"];
		$UTC = new DateTimeZone("UTC");
		$temp_token = login();
		//make variable from form data
		$start = new DateTime($_POST["startDate1"], $UTC);
		$start = $start->format("Y-m-d\TH:i:s.000\Z");
		$end = new DateTime($_POST["endDate1"], $UTC);
		$end = $end->format("Y-m-d\TH:i:s.000\Z");
		$search_words = [];
		$search_words = preg_split("/[\s,%?.-:>\"']+/", $_POST["SearchWords"]);
		
		
		if($_POST["chart_type"] == 0){
			//echo("line chart");
			//setting up line chart specific variables
			$interval_value = 60 * 60 * $_POST["split_time_by"]; //$_POST["split_time_by"] is either 1 (single hour) or 24(single day)
		
			//write firstline to csv( dynamically add channel and search names )
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
			fclose("ChartApp.csv");
	
			//write rest of lines to csv
			$fp = fopen("ChartApp.csv", "a");
			$num_of_data_points = abs(strtotime($start) - strtotime($end)) / $interval_value;
			$data_point_counter = 0;
			$time_setter = new DateTime('0000-00-00T00:00', $UTC);
			while($data_point_counter < $num_of_data_points){
				
				
				//values is all the values from this
				//temp_array is the ordered and completed result, it is pushed to the csv file
				$temp_array = [];
				$values = [];
				
				//temp_middle is for the x axis
				//temp_start is the start of the interval being checked
				//temp_end if the end of the interval being checked
				
				//temp_middle
				$temp_middle = strtotime($start) + ($interval_value * ($data_point_counter + .5));
				$temp_middle = $time_setter->setTimestamp($temp_middle);
				if($interval_value > 60 * 60 * 2){
					//interval is days
					$temp_middle = $temp_middle->format('Ymd');
				}
				else{
					//interval is hours
					$temp_middle = $temp_middle->format('Ymd\TH');
				}
				$temp_array[0] = $temp_middle;

				//temp_start
				$temp_start = strtotime($start) + ($interval_value * $data_point_counter);
				$temp_start = $time_setter->setTimestamp($temp_start);
				$temp_start = $temp_start->format('Y-m-d\TH:i:s.000\Z');
				//echo("start is : ".$temp_start."<br>");

				//temp_end
				$temp_end = strtotime($start) + ($interval_value * ($data_point_counter + 1));
				$temp_end = $time_setter->setTimestamp($temp_end);
				$temp_end = $temp_end->format('Y-m-d\TH:i:s.000\Z');
				//echo("end is : ".$temp_end."<br>");

				//check the data for every search word on this interval
				foreach ($search_words as $search_word){
					foreach(array_keys($_POST["channels"]) as $channel){
						$channel_and_word = $channel_list[$channel]." ".$search_word;
						if($_POST["data_type"] == "count"){
							//graph word count
							$values[$channel_and_word] = createLineChartData($search_word, $temp_start, $temp_end, $channel, $temp_token);
						}
						else{
							//graph sentiment
							$values[$channel_and_word] = createLineChartSentimentData($search_word, $temp_start, $temp_end, $channel, $temp_token);
						}
					}
				}
		
				//format data into csv line
				foreach ($channel_and_words as $line_name){
					if(array_key_exists($line_name, $values)){
						//in this interval the word from line_name was said on the channel from line_name (>0 occurences)
						array_push($temp_array, $values[$line_name]);
					}
					else{
						//in this interval the word from line_name was not said on the channel from line_name (0 occurences)
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
			//echo("bar chart");
			//Define Stopwords
			$stopWords = ['[',']','THE', 'ANNOUNCER', 'ALREADY', 'WELCOME', 'ASKED', 'LIKELY', 'THOUGH', 'SPEAK', 'ALMOST', 'TYPE', 'CENTER', 'CALLER', 'BECOME', 'FORAWRD', 'THEYVE', 'ALONG', 'HOST', 'ACT', 'MATTER', 'SECOND', 'ABSOLUTELY','ANYONE', 'TALKED', 'PRETTY', 'DATA', 'QUOTE', 'EFFECTS', 'BREAKING', 'DURING', 'COVERED', 'KNOWS', 'ALREADY', 'WORKS', 'CAMERAS', 'REASON', 'POSSIBLE', 'WOULDNT', 'ANYONE', 'ACTIONS', 'SEEMS', 'CLOSE', 'CALLING', 'NEEDS', 'POSSIBLE', 'CERTAINLY', 'SENSE', 'ACCORDING', 'INTERVIEW', 'M', 'EITHER', 'JOURNAL', 'PLATFORM', 'YORK', 'BUY', 'ISSUES', 'FUTURE', 'QUICKLY', 'BOARD', 'CHANGE',  'THREE', 'HANDS', 'NEEDED', 'YOUVE', 'MILLION', 'MISSED', 'OTHERS', 'CAPACITY', 'DAILY', 'ROAD', 'STRONGER', 'MAD', 'NOTE', 'CONTENT',  'SET', 'UNDERSTAND','BUILDING', 'FUN', 'RATES', 'SELL', 'WATCHING', 'PRESS', 'COURSE', 'WANTED', 'SECRET', 'JOSH', 'OBVIOUSLY', 'LESS', 'COUPLE', 'GETS', 'DAVID', 'MIDDLE', 'AHEAD', 'SORT', 'HUNDREDS', 'IDEA', 'CLEAR', 'OPEN', 'MOMENT', 'BRIEFING', 'TERMS', 'TERM', 'EXCHANGE', 'TRADING', 'JOINS', 'MAKES', 'RETURN', 'VALUE', 'MARKETS', 'PAID', 'BANK', 'CIALIS', 'GETS', 'TIM', 'BOX', 'PIECE', 'EARNINGS', 'SPONSORSHIP', 'COUPLE', 'INTEREST', 'KENNY', 'SINCE', 'WOMAN', 'END', 'NUMBERS', 'JIM', 'SMALL', 'SQUAWK', 'COMPLETE', 'POST', 'LEAVE', 'DEAL', 'COMPANIES', 'YESTERDAY', 'BELL', 'FINANCIAL', 'STOCK', 'COMPANY', 'JOBS', 'OPENING', 'KIDS', 'AREA', 'BILL', 'WIN', 'BLOOD', 'RACE', 'PAY', 'RUNNING', 'SITUATION', 'NOTHING', 'BRING', 'FACE', 'MONTHS', 'SERIOUS', 'HAPPENING', 'LATEST', 'QUESTIONS', 'CAUGHT', 'REACTION', 'HIT', 'WEEKS', 'BAD', 'TRAIL', 'MEDICAL', 'PUBLIC', 'PROBABLY', 'BREAK', 'OUTSIDE', 'ABLE', 'MINUTES', 'AMERICA', 'HAPPEN', 'BETWEEN', 'ONCE', 'FEDERAL', 'ACROSS', 'HEARD', 'AMERICANS', 'GOVERNOR', 'WASNT', 'TRAINING', 'HEART', 'COM', 'FOUND', 'REAL', 'ANYTHING', 'UNITED', 'WANTS', 'UNTIL', 'UNDER', 'EXACTLY', 'MIGHT', 'ROOM', 'SEARCH', 'JOINING', 'ISNT', 'REPORT', 'SUPPORT', 'GROUP', 'INCLUDING', 'ISSUE', 'HEARING', 'MONEY', 'TAKEN', 'PAST', 'HAND', 'LEAST', 'FACILITY', 'DEPARTMENT', 'PLUS', 'IMPORTANT', 'WORKED', 'LINE', 'TOOK', 'LATER', 'CHARGES', 'EVERYONE',  'PROBLEM', 'HOUR', 'BEHIND', 'TOGETHER', 'JOB', 'CALLED', 'LEFT', 'INFORMATION', 'COMES', 'SAME', 'TOLD', 'CALL', 'D', 'CUT', 'WHETHER', 'CAME' ,'GROUND','TALKING', 'STATES', 'AMERICAN', 'WITHOUT', 'FREE', 'AGAINST', 'FORMER','WOMEN', 'MEN', 'DOCTOR', 'COVERAGE', 'COUNTRY', 'USED','VICTOZA', 'LAW', 'POINT', 'POOL', 'SOMEBODY', 'PLAN', 'HUMIRA', 'CAMPAIGN', 'STATE', 'TIMES', 'STAY', 'WONT', 'EVERYTHING', 'ENOUGH', 'MYSELF', 'WISH', 'TOP', 'ENERGY', 'LAUGHS', 'MAKING', 'MAN', 'SECURITY', 'DING', 'HAIR', 'MMM', 'FACT', 'ROUND', 'PARTY', 'WORTH', 'HELPS', 'SLEEP', 'BOOK', 'EARLY', 'MONTH', 'PAIN', 'BOTH', 'LOCAL', 'FEELING', 'MAYBE', 'LOOKS', 'TV', 'NARRATOR', 'LEARN', 'DA', 'HOURS', 'PLANS', 'THOU', 'PHONE', 'BELIEVE', 'SKIN', 'NUMBER', 'HEAR', 'OWN', 'FOREVER', 'YET', 'PLACE',  'QUESTION', 'SOMEONE', 'EACH', 'HOO', 'THOUGHT', 'HEAR', 'FEET', 'F', 'BASE', 'POWER', 'FAR', 'HOT', 'PLAYING', 'DOESNT', 'INSIDE', 'R', 'P', 'FALL', 'TOOLS', 'EVERYBODY', 'ARMS', 'OHH', 'WHOLE', 'AINT', 'FRIENDS', 'AUDIENCE', 'CAUSE', 'MOVE', 'STARTED', 'HUH', 'BYE', 'BIT', 'RUN', 'SELF',  'CARE', 'EVEN', 'ANOTHER', 'BODY', 'EVER', 'OOH', 'KEEP','TRY', 'C', 'FRIEND', 'CITY', 'HIGH', 'FOOD', 'SIDE', 'O', 'LA','PLAY', 'CASE', 'HAPPENED', 'OK', 'STORY', 'NICE', 'BEST', 'GETTING', 'G', 'DOOR', 'LIVE', 'LONG', 'AWAY', 'REMEMBER', 'LAST', 'FIND', 'SYSTEM', 'HARD', 'CAR', 'HELP', 'STOP', 'MEAN', 'ASK', 'MOST', 'AGAIN', 'WAIT','LIFE', 'TEAM', 'WORLD', 'OLD', 'FAMILY', 'WORK', 'WORKING', 'NA', 'MR', 'FOUR', 'FIVE', 'SEVEN', 'EIGHT', 'NINE', 'TEN', 'BIG', 'LITTLE', 'MORNING', 'ALSO', 'U', 'GUY', 'A', 'YOULL', 'TO', 'AND', 'SHES', 'BETTER', 'SAYING', 'DOES', 'WHERE', 'OF', 'IN', 'FOR', 'WAS', 'ON', 'IS', 'THAT', 'IT', 'BE', 'SAYS', 'PERSON', 'THEY', 'WITH', 'YOU', 'THIS', 'WERE', 'WE', 'ARE', 'THEIR', 'I', 'AT', 'THEM', 'BUT', 'BY', 'YOUR', 'OUR', 'HAVE', 'MORE', 'FROM', 'ITS', 'ABOUT', 'NOT', 'HE', 'ALL', 'TONIGHT', 'NEWS', 'ONLY', 'AN', 'WILL', 'HAS', 'CAN', 'WHEN', 'THERE', 'AFTER', 'NOW', 'OUT', 'UP', 'WHO', 'NO', 'BEEN', 'SAY', 'HIS', 'GET', 'MY', 'KNOW', 'DO', 'WHAT', 'RIGHT', 'OVER', 'HAD', 'TODAY', 'OR', 'SO', 'IF', 'TOO', 'BACK', 'DONT', 'MAY', 'OTHER', 'HOW', 'WHY', 'THERES', 'FEW', 'SOME', 'WAY', 'US', 'THINK', 'STILL', 'REPORTER', 'NEW', 'ONE', 'AIR', 'PEOPLE', 'THAN', 'MANY', 'LIKE', 'DAYS', 'IM', 'THANK', 'YES', 'GONNA', 'OH', 'ME', 'APPLAUSE', 'JUST', 'WELL', 'REALLY', 'YOURE', 'THATS', 'GOOD', 'SEE', 'GO', 'AM', 'GREAT', 'JUST', 'GOING', 'YEAH', 'LOOK', 'WHATS', 'DID', 'HES', 'WOW', 'BEFORE', 'HI', 'TAKE', 'SOMETHING', 'COME', 'NAME', 'BE', 'DAY', 'B', 'COULD', 'WOULD', 'FEEL', 'TIME', 'IVE', 'TELL', 'SAID', 'MUCH', 'SURE', 'CANT', 'ILL', 'SEEN', 'DONE', 'DOING', 'ID', 'SHOULD', 'WANT', 'NEVER', 'GIVE', 'BECAUSE', 'DOWN', 'LOOKING', 'WHOO', 'VERY', 'GUYS', 'WATCH', 'AS', 'HEY','NEXT', 'TAKES', 'LETS', 'WHOA', 'GOT', 'WEEK', 'THING', 'HERE', 'NEED', 'THOSE', 'INTO', 'FIRST', 'SHOW', 'MAKE', 'READY', 'HER', 'ER', 'THEN', 'THEYRE', 'WHILE', 'S', 'SHE', 'EVERY', 'PUT', 'OKAY', 'HAVING', 'HOLD', 'AROUND', 'THANKS', 'TAKING', 'SUCH', 'E', 'T', 'ALWAYS', 'NIGHT', 'ONE', 'TWO', 'LOT', 'SAW', 'WHICH', 'HIM', 'WENT', 'COMING', 'OFF', 'THROUGH', 'YOURSELF', 'THINGS', 'MADE', 'PART', 'BEING', 'HELLO', 'ND', 'THESE', 'N', 'ELSE', 'TH', 'STARTS', 'AGO', 'TALK', 'DIDNT', 'ANY', 'USE', 'ANY', 'ACTUALLY', 'MUST', 'WEVE','LET', 'RE'];
			//$stopWords = ['[',']','THE', 'TO', 'AND', 'A', 'OF', 'IN', 'THAT', 'IS', 'IT', 'FOR','ON', 'ARE', 'HAVE', 'THIS', 'WAS', 'AT', 'WITH', 'BE', 'WHAT', 'SO', 'AS', 'ITS', 'NOT', 'DO', 'BUT', 'THERE', 'YOU', 'YOUR', 'I', 'WE', 'HE', 'SHE', 'HER', 'HIM', 'THEY'];
			
			//Add extra stop words from User input
			$extraStopWords = preg_split("/[\s]+/", strtoupper($_POST["extraStopWords"]));
			$stopWords = array_merge($stopWords, $extraStopWords);

			//Get Text arrays from API (One array PerChannel, array contain text block from whole range ).
			$results = createBarChartData($temp_token);

			//Calculate Top Ten Words for channels and in general
			//Count array occurences in arrays ( loop through the array )
			$dict = [];
			$large_text = "";
			$channel_counts = [];
			foreach($results as $result){
				$channel_dict = [];
				$text = preg_replace("/[-:|$,%?.-:>\"']+/", "", $result);
				$large_text = $large_text." ".$text;
				$words = preg_split("/[\s,%?.-:>\"']+/", $text);
				$channel_dict = array_count_values($words);
				//print_r($channel_dict);
				
				/*foreach ($words as $word){
					if($search_words[0] == "" || in_array($word, $search_words)){
						if (!in_array($word, $stopWords)){
							if(array_key_exists($word, $dict)){
								$dict[$word] = $dict[$word] + 1;
							}
							else{
								$dict[$word] = 1;
							}
							if(array_key_exists($word, $channel_dict)){
								$channel_dict[$word] = $channel_dict[$word] + 1;
							}
							else{
								$channel_dict[$word] = 1;
							}
						}
					}
				}*/
			foreach ( $stopWords as $stopword){
				unset($channel_dict[$stopword]);
			}	
			array_push($channel_counts, $channel_dict);
			}
			// sort and slice overall dictionary to get overall top ten words
			$large_words = preg_split("/[\s,%?.-:>\"']+/", $large_text);
			$dict = array_count_values($large_words);
			foreach ( $stopWords as $stopword){
				unset($dict[$stopword]);
			}
			
			arsort($dict, SORT_NUMERIC);

			$dict = array_slice($dict, 0, $_POST["num"]); 

			//Write to csv file
			$fp = fopen('ChartApp.csv', 'w');
			//write firstline ( dynamically add channel names )
			$terms = ["index","nameterm"];
			foreach ($_POST["channels"] as $channel){
				array_push($terms, $channel_list[$channel]);
			}
			fputcsv($fp, $terms);
			//write the rest of the lines to csv
			$counter = 1;
			foreach($dict as $key => $value) {
				$values = [$counter,$key];
				foreach ($channel_counts as $c_count){
					if (array_key_exists($key, $c_count)){
						//this channel had occurences of this word in the date range
						array_push($values, $c_count[$key]);
					}
					else{
						//no occurences of this word on this channel in the date range
						array_push($values, "0");
					}
				}
				//write line to file
				fputcsv($fp, $values);
				$counter = $counter + 1;
			}
		}

		
		function login(){
			// outputs a token to use with other shadowtv reperio API functions
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
 
			$output = json_decode(curl_exec($ch));
			// close curl resource to free up system resources 
			curl_close($ch);
		
			//debugging:
			//echo($output->{'token'});
			//echo("logged in<br>");
			return $output->{'token'};
		} 

		function createBarChartData($token){
			// returns a large text block from form variables, will be counted to create bar chart data
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
					//echo($datetime);
					$url = "http://api.shadowtv.net/reperio/v1/captions/".$channel."/".$datetime->format('Y-m-d\TH:i:s').".000Z/3599?include=captions,body";
					//echo($url);
					//echo($url.'<br>');
					curl_setopt($ch, CURLOPT_URL, $url );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
						'Authorization: '.$token)                                                                       
					); 
					$text .= " ";
					$text .= json_decode(curl_exec($ch))->{'body'};
					//echo("Finished a call to hour<br>");
					//echo($text);
				}
				//echo($text);
				#divide last hour into minutes
				$interval = new DateInterval('PT1M');
				$End = new DateTime($_POST['endDate1'], $UTC);
				$minuteStart = new DateTime($_POST['startDate1'], $UTC);
				$diffInterval = $minuteStart->diff($End);
				$hours = $diffInterval->h;
				$minuteStart->add(new DateInterval('PT'.$hours.'H'));
				$daterange = new DatePeriod($minuteStart, $interval ,new DateTime($_POST['endDate2'], $UTC));
				foreach($daterange as $datetime){
					//echo($datetime);
					$url = "http://api.shadowtv.net/reperio/v1/captions/".$channel."/".$datetime->format('Y-m-d\TH:i:s').".000Z/60?include=captions,body";
					//echo($url.'<br>');
					curl_setopt($ch, CURLOPT_URL, $url );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
						'Authorization: '.$token)                                                                       
					); 
					$text .= " ";
					$text .= json_decode(curl_exec($ch))->{'body'};
					//echo($text);
				}
				//echo("Finished a call to hour<br>");
				array_push($texts, strtoupper($text));
			}	
			// close curl resource to free up system resources 
			curl_close($ch); 
			//echo($text);
			return $texts;
		}

		function createLineChartData($query, $lowerDate, $upperDate, $channels, $token){
			//returns an array of hit results for the search term
			//All parameters are needed, $query is just a string of the query (only single query words allowed)
			//$lowerdate and $upperdate should be in "yyy-MM-dd'T'HH:mm:ss.SSS'Z'" format
			//$channels should be an array of each channel number
			//$token is just the token string
			// create curl resource
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api.shadowtv.net/reperio/v1/search");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = array("query" => $query, "filter" => ["channels" => [$channels]], "dateRange" => ["lowerDateUTC" => $lowerDate, "upperDateUTC" => $upperDate]);
			$data_string = json_encode($data);
			//echo("data being sent is :".$data_string."<br>");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string),
				'Authorization: '.$token)
			);
			$output = json_decode(curl_exec($ch));
			//echo("output1: ".json_encode($output)."<br><br>");
			// close curl resource to free up system resources
			curl_close($ch);
			$expected_hits_count = (2 * $output->{'totalIndexHits'});
			//echo($output->{'totalIndexHits'}."<br>");
			return $output->{'totalIndexHits'};
		}

		function createLineChartSentimentData($query, $lowerDate, $upperDate, $channels, $token){
			//returns an array of hit results for the search term
			//All parameters are needed, $query is just a string of the query (only single query words allowed)
			//$lowerdate and $upperdate should be in "yyy-MM-dd'T'HH:mm:ss.SSS'Z'" format
			//$channels should be an array of each channel number
			//$token is just the token string
			// create curl resource
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api.shadowtv.net/reperio/v1/search");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = array("query" => $query, "filter" => ["channels" => [$channels]], "dateRange" => ["lowerDateUTC" => $lowerDate, "upperDateUTC" => $upperDate]);
			$data_string = json_encode($data);
			//echo("data being sent is :".$data_string."<br>");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string),
				'Authorization: '.$token)
			);
			$output = json_decode(curl_exec($ch));
			//echo("output1: ".json_encode($output)."<br><br>");
			// close curl resource to free up system resources
			curl_close($ch);
			$hits = $output->{'hits'};
			$sentiments = [];
			require_once __DIR__ . '/phpInsight-master/autoload.php';
			$sentiment = new \PHPInsight\Sentiment();
			foreach ($hits as $hit){
				//echo("text: ".$hit->{'body'}."<br>");
				foreach($sentiment->score($hit->{'body'}) as $score){
					//echo ("score: ".$score."<br><br>");
					array_push($sentiments, $score);
				}
			}

			//echo($output->{'totalIndexHits'}."<br>");
			return array_sum($sentiments) / count($sentiments);
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
		//loading bar functions
		$( "#form" ).toggle();
		$( "#loading_bar" ).toggle();
		$( "#logo_div" ).toggle();
		$( "#titleString" ).toggle();
		
		
		//create chart based off submitted form selection
		if(<?php echo($_POST["chart_type"]); ?> == 0){
			if(<?php echo($_POST["split_time_by"]); ?> > 2){
				make_line_chart();
			}
			else{
				make_hourly_line_chart();
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
		if(<?php echo($_POST["include_details"]); ?> > 0){
			$("#logo_div").after("<h3> Chart Details </h3><br> StartDate: "+String(<?php echo("\"".$_POST["startDate1"]."\""); ?>)+"<br>EndDate: "+String(<?php echo("\"".$_POST["endDate1"]."\""); ?>)+"<br>Search Words: "+String(<?php echo("\"".$_POST["SearchWords"]."\""); ?>)+"<br><br>");
		}
	</script>
	<script type="text/javascript">
		//javascript page functions
		var changeForm = function(){
		$( "#barChartForm" ).toggle();
		$( "#lineChartForm" ).toggle();
		
		//toggle search_words
		if($("#search_words").prop('required')){
			$("#search_words").prop('required', false);
		}
		else{
			$("#search_words").prop('required', true);
		}	
		}

		var make_jpeg = function() {
			html2canvas($("#chart"), {
				onrendered: function(canvas) {
					theCanvas = canvas;
					document.body.appendChild(canvas);

					// Convert and download as image 
					$("#img-out").append(canvas);
					var img = canvas.toDataURL("image/jpeg;base64;");
					window.open(img,"","width=700,height=700");
					// Clean up
					document.body.removeChild(canvas);
				},
				background: "white"
			});
		}
		if ( <?php echo($_POST["chart_type"]); ?> == 1){$("select").val('1'); changeForm();}
		
		var make_png = function() {
			html2canvas($("#chart"), {
				onrendered: function(canvas) {
					theCanvas = canvas;
					document.body.appendChild(canvas);

					// Convert and download as image
					$("#img-out").append(canvas);
					var img = canvas.toDataURL("image/png;base64;");
					window.open(img,"","width=700,height=700");
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

	</script>
</body>