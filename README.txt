Chart App User Guide
Currently located at http://192.168.168.110:8000

There are two modes for the Charting App, "Bar Graph" and "Line Chart"

- Bar Graph
   - results show you the words said most frequently within the parameters defined
   - Filling out the form should allow the user to eaily customize the parameters of the chart defining number of results, extra stop words, and specific search words
   
   - It is recommended that the searches for this don't go over 20 hours, it shouldnt be an impossible task for the application, but it will take a long time to process and can stall the entire server for long periods of time
   - Keep in mind that adding more channels to the search has an additive affect on the amount of hours being searched for, Two channels with two 24 hour searches results in a 48 hour search
   - One benefit is that Number of Words returned does not affect the proformance of the application, You can just as easily make a graph with the top 100 words as you can with the top 10 words
   

- Line Chart
   - You can specify the time distance in between data points (days or hours) and the type of data you want returned
   - There are Two types of data you can return, Count and Sentiment

   -Count
      - shows the number of times a word is used over the selected time period on the selected channels
 
   -Sentiment
      - shows the average sentiment of a word when it was used over the selected time period on the selected channel

   - This graph can handle a much larger search and should be able to handle multiple month long searchs
   - That being said there is a limit to the size of a search that returns a quick response (I believe it to be about 4 months) and that adding multiple words and channels has an additive affect on this search (similar to the bar chart)
   - When searching over hours this limit goes down to about 2 days

   
 - With either mode, when the chart is finished. You can save it with the png or jpeg save button. 
	- the resulting png or jpeg will show up in a pop-up window, be sure to allow the site to give you pop-ups inorder to save your graphs
 


 This application uses d3 to draw the charts, and phpInsight to read sentiment data from the charts


 Any questions or comments email Cameron Abma at chabma@gmail.com
   