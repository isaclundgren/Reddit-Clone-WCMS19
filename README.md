To run this project<br/>
#composer install<br/>
#npm install && npm run dev <br/>
#php artisan migrate<br/>

<hr>



A Naive approach trying to build a small copy of reddit.com using Laravel. <br/>
The app is fully validated and the user will be notified with flashes when something is succesfully created.<br/>
The user will also be notified with flashes when a required field is missing. <br/>

There is an index page where all Subreddits and related posts are showing. From there you can either view all posts belonging to a subreddit or choose to view a single post and choose to comment something. <br/>

The user of this app can: <br/>

#Create Subreddits<br/>
#Create Posts with pictures that belongs to a subreddit<br/>
#Delete and update posts which is accessed through a user panel<br/>
#Comment posts<br/>

<hr>

The admin of this app is by default set to false in the DB. The owner of the app can set this to true in DB.

The admin of this app can <br/>

#Access all the registred users through the admin panel. <br/>
#Delete and update all posts which is created by users. <br/>

<hr>

Functionallity which at the moment don't exists is: <br/>

#Search function<br/>
#Vote function<br/>
#Profile pictures<br/>
#Better use of guards and roles.<br/>
#Better frontend structure

<hr>

Feel free to fork and improve on this app. <br/>

