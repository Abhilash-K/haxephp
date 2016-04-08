#Example SQLite database

In a previous example we used a simple flat-file 'database'.
An SQLite database is really a database but the lite version. It's the local database for a lot of (mobile)apps.

We will be using [SPOD macros](http://old.haxe.org/manual/spod)
Check more info in the [about](about.md).


_The code used in this example can be found [here](https://github.com/MatthijsKamstra/haxephp/tree/master/10sqlite/code)._


## How to start

Create a folder named **foobar** (please use a better name; any name will do) and create folders **bin** and **src**.
See example below:

```
+ foobar
	+ bin
	+ src
		- Main.hx
	- php.hxml
```



## The Main.hx

This example is getting to big to post here, so if you want to check out the complete file go and check out [Main.hx](https://github.com/MatthijsKamstra/haxephp/tree/master/10sqlite/code/Main.hx) 


First we need a database, so I wrote a class that creates one for you: `DBStart.hx`.
This class generates random users.

```
	// Open a connection
	var cnx = sys.db.Sqlite.open("mybase.ddb");

	// Set as the connection for our SPOD manager
	sys.db.Manager.cnx = cnx;

	// initialize manager
	sys.db.Manager.initialize();

	// Create the "user" table
	if ( !sys.db.TableCreate.exists(User.manager) ) {
		sys.db.TableCreate.create(User.manager);
	}

	// Fill database with users
	for (i in 0 ... 10) {
		var user = createRandomUser();
		user.insert();
	}
	
	// close the connection and do some cleanup
	sys.db.Manager.cleanup();

	// Close the connection
	cnx.close();

```
The function `createRandomUser()` does exactly what you would expect, if you really want to know, check the source code.

So a user!  
We have used a typedef before, this looks very simular.  
The strange stuff here are the types, they are not the default types that Haxe uses.  
Read more about that: [creating-a-spod](http://old.haxe.org/manual/spod#creating-a-spod)

```
import sys.db.Types;

class User extends sys.db.Object {
    public var id : SId;
    public var name : SString<32>;
    public var birthday : SDate;
    public var phoneNumber : SNull<SText>;
}

```

So now we have a database, lets check out the code to get the data from the database:

`Main.hx`

```
	// Open a connection
	var cnx = sys.db.Sqlite.open("mybase.ddb");

	// Set as the connection for our SPOD manager
	sys.db.Manager.cnx = cnx;

	// initialize manager
	sys.db.Manager.initialize();

	for (i in 0 ... User.manager.all().length) {
	 	var _user = User.manager.get(i);		
	 	if(_user != null) trace(_user.name);
	}	

	// close the connection and do some cleanup
	sys.db.Manager.cleanup();

	// Close the connection
	cnx.close();
```



## The Haxe build file, php.hxml

There are a lot of different arguments that you are able to pass to the Haxe compiler.
These arguments can also be placed into a text file of one per line with the extension hxml. This file can then be passed directly to the Haxe compiler as a build script.

```
# // php.hxml
-cp src
-main Main
-php bin/www
-dce full
```


## Build php with Haxe

To finish and see what we have, build the file and see the result

1. Open your terminal
2. `cd ` to the correct folder where you have saved the `php.hxml` 
3. type `haxe php.hxml`
4. press enter


And if everything went according to plan, you should see something simular like this:

![](screenshot.png)


You could build everything directly in the terminal.

```
haxe -cp src -main Main -php bin/www -dce full
```

It will have the same result




## More info

- <http://api.haxe.org/sys/db/Sqlite.html>
- <http://old.haxe.org/doc/neko/spod>
- <http://old.haxe.org/manual/spod>


